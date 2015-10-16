<?php

class DrillingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /drilling
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('drilling.drill');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /drilling/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /drilling
	 *
	 * @return Response
	 */
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

	/**
	 * Display the specified resource.
	 * GET /drilling/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report')->with('data',$all_data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /drilling/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function excel()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report_excel')->with('data',$all_data);
	}

	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /drilling/{id}
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
	 * DELETE /drilling/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}