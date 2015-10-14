<?php

class machiningController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('machining.machine');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input_data= Input::all();

		$input_array= array(
				'date' => date("Y-m-d"),
				'work_order_no' => $input_data['work_order_no'] ,
				'item'  	=> $input_data['item'],
				'heat_no'	=> $input_data['heat_no'],
				'quantity'	=>$input_data['quantity'],
				'machine_name'=>$input_data['machine_name'],
				'employee_name'=>$input_data['employee_name'],
				'grade' => $input_data['grade'],
				'weight'	=> $input_data['weight']
		);

		$input_response= Machining::insertData($input_array);

		//get last record

		$last_record= Machining::getLastRecord();
		return View::make('machining.confirm')->with('data',$last_record);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
