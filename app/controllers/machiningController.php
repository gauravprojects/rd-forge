<?php

class machiningController extends BaseController
{



	public function index()
	{
		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
		return View::make('machining.machine')
				->with('grades',$grades)
				->with('heat_no',$heatNo_available_forging_weight)
				->with('availableWorkOrderNo',$availableWorkOrder);
	}

	public function store()
	{
		$input_data= Input::all();

		$input_array_machining_table= array(
				'date' => date('Y-m-d',strtotime($input_data['date'])),
				'work_order_no' => $input_data['work_order_no'] ,
				'item'  	=> $input_data['item'],
				'heat_no'	=> $input_data['heat_no'],
				'quantity'	=>$input_data['quantity'],
				'machine_name'=>$input_data['machine_name'],
				'grade' => $input_data['grade'],
				'weight'	=> $input_data['weight'],
				'remarks'=> $input_data['remarks']
		);

		$input_response_machining_table= Machining::insertData($input_array_machining_table);

		//get last record

		$last_record= Machining::getLastRecord();

		return View::make('machining.confirm')->with('last_record',$last_record);

	}

	public function show()
	{
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);
	}

	public function excel()
	{

		$all_data=Machining::getAllData();
		return View::make('machining.machining_report_excel')->with('data',$all_data);
	}

	public function update($id)
	{
			$machining_array = Machining::getRecord($id);

			$grades = Grades::getGrades();
			$heat_no = RawMaterial::getHeatNo();

		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
		return View::make('machining.machining_update')
			->with('grades',$grades)
			->with('heat_no',$heatNo_available_forging_weight)
			->with('availableWorkOrderNo',$availableWorkOrder)
			->with('machining_array',$machining_array);

	}


	public function update_store($id)
	{
		
		$machining = Input::all();

		$data_array_update = array(
					'work_order_no' => $machining['work_order_no'] ,
					'item'  	=> $machining['item'],
					'heat_no'	=> $machining['heat_no'],
					'quantity'	=>$machining['quantity'],
					'machine_name'=>$machining['machine_name'],
					'grade' => $machining['grade'],
					'weight'	=> $machining['weight'],
					'remarks'=> $machining['remarks']
					);

		$update_response= DB::table('machining_records')
							->where('machining_id',$machining['machining_id'])
							->update($data_array_update);


		$get_record_array= Machining::getRecord($machining['machining_id']);
		return View::make('machining.confirm_machining_update')->with('confirmations',$get_record_array);
	}

	public function destroy($id)
	{
		$delete_response= Machining::deleteRecord($id);
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);

	}

	public function search_display()
    {
        return View::make('search.machining_search')->with('data',Machining::getAllData());
    }

}
