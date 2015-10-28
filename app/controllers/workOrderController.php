<?php

class WorkOrderController extends BaseController {

	public function index()
	{
		return View::make('workOrder.work');
	}

	public function store()
	{
		$data_input=Input::all();

		$data_array= array(
			'customer_name' => $data_input['customer_name'],
			'purchase_order_no' => $data_input['purchase_order_no'],
			'purchase_order_date' => $data_input['purchase_order_date'],
			'required_delivery_date' => $data_input['required_delivery_date'],
			'inspection' => $data_input['inspection'],
			'packing_instruction' => $data_input['packing_instruction'],
			'testing_instruction' => $data_input['testing_instruction'],
			'quatation_no' => $data_input['quatation_no'],
			'remarks' => $data_input['remarks']
		);

		WorkOrder::insertData($data_array);

		//now fetch dis data to return to the array
		$last_input = WorkOrder::getLastRecord();

		$grades= Grades::getGrades();
		$work_order_details= WorkOrder::getWorkOrderDetails($last_input->work_order_no);

		return View::make('workOrder.work2')
			->with('data',$last_input)
			->with('grades',$grades)
			->with('work_order_details',$work_order_details);


	}



	public function details_add()
	{
		$data= Input::all();

		$data_array= array(
			'work_order_no'=>$data['work_order_no'],
			'item_no' => $data['item_no'],
			'description'=>$data['description'],
			'material_grade'=>$data['grade'],
			'quantity' =>$data['quantity'],
			'weight' => $data['weight'],
			'remarks' => $data['remarks']
		);
        $input_response= DB::table('work_order_material_details')->insert($data_array);

        $last_record=DB::table('work_order_details')->orderBy('work_order_no', 'desc')->first();
        return View::make('workOrder.confirm')->with('data',$last_record);

	}


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