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
			'purchase_order_date' => date('Y-m-d',strtotime($data_input['purchase_order_date'])),
			'required_delivery_date' => date('Y-m-d',strtotime($data_input['required_delivery_date'])),
			'inspection' => $data_input['inspection'],
			'packing_instruction' => $data_input['packing_instruction'],
			'testing_instruction' => $data_input['testing_instruction'],
			'quatation_no' => $data_input['quatation_no'],
			'remarks' => $data_input['remarks'],
			'status' => '0'
		);

		WorkOrder::insertData($data_array);

		//now fetch dis data to return to the array
		$last_input = WorkOrder::getLastRecord();

		$grades= Grades::getGrades();
		$work_order_details= WorkOrder::getWorkOrderDetails($last_input->work_order_no);


		//all data form master table is taken and fed to the  cutting form
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();

		return View::make('workOrder.work2')
			->with('data',$last_input)
			->with('grades',$grades)
			->with('work_order_details',$work_order_details)
				->with('standard_size', $standard_sizes)
				->with('pressure', $pressure)
				->with('schedule', $schedule)
				->with('type', $type);;


	}



	public function details_add()
	{
		$data= Input::all();
		dd($data);
		$data_array= array(
			'work_order_no'=>$data['work_order_no'],
			'item_no' => $data['item_no'],
			'material_grade'=>$data['grade'],
			'size' =>$data['standard_size'],
			'pressure' => $data['pressure'],
			'type'=> $data['type'],
			'schedule' => $data['schedule'],
			'quantity' =>$data['quantity'],
			'weight' => $data['weight'],
			'remarks' => $data['remarks']
		);
        $input_response= DB::table('work_order_material_details')->insert($data_array);

        $last_record=DB::table('work_order_material_details')->orderBy('work_order_no', 'desc')->first();
		$work_order_details= WorkOrder::getOrderDetails($data['work_order_no']);
		$work_order_details= (array) $work_order_details[0];

		return View::make('workOrder.confirm')
				->with('data',$last_record)
				->with('work_order_details',$work_order_details);

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