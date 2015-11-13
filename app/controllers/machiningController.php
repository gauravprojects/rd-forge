<?php

class machiningController extends \BaseController
{



	public function index()
	{
		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		return View::make('machining.machine')
				->with('grades',$grades)
				->with('availableWorkOrderNo',$availableWorkOrder);
	}

	public function store()
	{
		$input_data= Input::all();

		$input_array_machining_table= array(
				'date' => date("Y-m-d"),
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

		return View::make('machining.confirm')->with('data',$last_record);

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
		//
	}


}
