<?php

class WorkOrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /workorder
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('workOrder.work');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /workorder/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /workorder
	 *
	 * @return Response
	 */
	public function store()
	{
		$data_input=Input::all();

		$data_array= array(
			'customer_name' =>$data_input['customer_name'],
			'purchase_order_no'=>$data_input['purchase_order_no'],
			'purchase_order_date'=>$data_input['purchase_order_date'],
			'required_delivery_date'=>$data_input['required_delivery_date'],
			'inspection'=>$data_input['inspection'],
			'packing_instruction'=>$data_input['packing_instruction'],
			'testing_instruction'=>$data_input['testing_instruction'],
			'quatation_no'=>$data_input['quatation_no'],
			'remarks'=>$data_input['remarks']

		);

		$input_response= DB::table('work_order_details')->insert($data_array);

		//now fetch dis data to return to the array
		$last_input= DB::table('work_order_details')->orderBy('work_order_no','desc')->first();

		return View::make('workOrder.work2')->with('data',$last_input);


	}

	public function store_more()
	{
		$input_data=Input::all();
		//dd($input_array);


		$input_array1= array(
					'work_order_no'=>$input_data['work_order_no1'],
					'description'=>$input_data['description1'],
					'material_grade'=>$input_data['material_grade1'],
					'quantity' =>$input_data['quantity1'],
					'weight' => $input_data['weight1'],
					'remarks' => $input_data['remarks1']
		);

		$input_response1= DB::table('work_order_material_details')->insert($input_array1);
		//dd($input_response1);

		if(!($input_data['quantity2']== null) )
		{
			$input_array2= array(
				'work_order_no'=>$input_data['work_order_no2'],
				'description'=>$input_data['description2'],
				'material_grade'=>$input_data['material_grade2'],
				'quantity' =>$input_data['quantity2'],
				'weight' => $input_data['weight2'],
				'remarks' => $input_data['remarks2']
			);

			$input_response2= DB::table('work_order_material_details')->insert($input_array2);
		}

		if(!($input_data['quantity3']== null) )
		{
			$input_array3= array(
				'work_order_no'=>$input_data['work_order_no3'],
				'description'=>$input_data['description3'],
				'material_grade'=>$input_data['material_grade3'],
				'quantity' =>$input_data['quantity3'],
				'weight' => $input_data['weight3'],
				'remarks' => $input_data['remarks3']
			);

			$input_response3= DB::table('work_order_material_details')->insert($input_array3);
			dd("your work order registered");
		}
		dd();

	}

	/**
	 * Display the specified resource.
	 * GET /workorder/{id}
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
	 * GET /workorder/{id}/edit
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
	 * PUT /workorder/{id}
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
	 * DELETE /workorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}