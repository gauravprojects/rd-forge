<?php

class DrillingController extends \BaseController {

	/*  ----------------------------------- FUNCTIONS USED ------------------------------------

		 

	*/



	public function index()
	{
		return View::make('drilling.drill');
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
			'employee_name'=>$input_data['employee_name'],
			'grade' => $input_data['grade']
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

		return View::make('drilling.confirm')->with('data',$last_record);

	}

	public function show()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report')->with('data',$all_data);
	}


	public function excel()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report_excel')->with('data',$all_data);
	}
}