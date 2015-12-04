<?php

class DrillingController extends BaseController {

	/*  ----------------------------------- FUNCTIONS USED ------------------------------------

		 

	*/


	public function index()
	{
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		return View::make('drilling.drilling')
				->with('grades',$grades)
				->with('availableWorkOrderNo',$availableWorkOrder);
	}
	public function store()
	{
		$input_data= Input::all();

		$input_array_drilling_table= array(
			'date' => date("Y-m-d"),
			'work_order_no' => $input_data['work_order_no'] ,
			'item'  	=> $input_data['item'],
			'heat_no'	=> $input_data['heat_no'],
			'quantity'	=>$input_data['quantity'],
			'machine_name'=>$input_data['machine_name'],
			'grade' => $input_data['grade'],
			'remarks' => $input_data['remarks']
		);


		$input_response_drilling_table=Drilling::insertData($input_array_drilling_table);

		//get last record

		$last_record= Drilling::getLastRecord();

		// now insert remarks data using the mach_id obtained form last record

		$input_array_drilling_remarks= array(
			'drilling_id' => $last_record->drilling_id,
			'remarks' => $input_data['remarks']
		);

		$input_response_drilling_remarks= Drilling::getLastRecord();

		return View::make('drilling.confirm')->with('last_record',$last_record);

	}

	public function show()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report')->with('data',$all_data);
	}

	public function update($id)
	{
			$drilling_array = Drilling::getRecord($id);

			$grades = Grades::getGrades();

			return View::make('drilling.drilling_update')
			->with('drilling_array',$drilling_array)
			->with('grades',$grades);
	}


	public function update_store($id)
	{
		
		$drilling = Input::all();

		$data_array_update = array(
					'work_order_no' => $drilling['work_order_no'] ,
					'item'  	=> $drilling['item'],
					'heat_no'	=> $drilling['heat_no'],
					'quantity'	=>$drilling['quantity'],
					'machine_name'=>$drilling['machine_name'],
					'grade' => $drilling['grade'],
					'weight'	=> $drilling['weight'],
					'remarks'=> $drilling['remarks']
					);

		$update_response= DB::table('drilling_records')
							->where('drilling_id',$drilling['drilling_id'])
							->update($data_array_update);


		$get_record_array= Drilling::getRecord($drilling['drilling_id']);
		return View::make('drilling.confirm_drilling_update')->with('confirmations',$get_record_array);
	}



	public function excel()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report_excel')->with('data',$all_data);
	}
}