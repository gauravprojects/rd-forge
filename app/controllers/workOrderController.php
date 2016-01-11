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
		$i=0;
		$count_rows= count($data['item_no']);
		for($i=0;$i<$count_rows;$i++)
		{
				$data_array = array(
					'work_order_no' => $data['work_order_no'][$i],
					'item_no' => $data['item_no'][$i],
					'material_grade' => $data['grade'][$i],
					'size' => $data['standard_size'][$i],
					'pressure' => $data['pressure'][$i],
					'type' => $data['type'][$i],
					'schedule' => $data['schedule'][$i],
					'quantity' => $data['quantity'][$i],
					'weight' => $data['weight'][$i],
					'remarks' => $data['remarks'][$i]
				);
				$input_response = DB::table('work_order_material_details')->insert($data_array);

		}

		// data from work order details for respective work order no
		$work_order_details= WorkOrder::getRecordByWorkOrderDeails($data['work_order_no'][0]);
		$work_order_material_details= WorkOrder::getRecordByWorkOrderMaterialDetails($data['work_order_no'][0]);


		return View::make('workOrder.confirm')
				->with('work_order_details',$work_order_details)
				->with('work_order_material_details',$work_order_material_details);

	}

	public function show()
	{
		$all_records_work_order_details= WorkOrder::getAllRecordsWorkOrderDetails();
		$all_records_work_order_material_details=WorkOrder::getAllRecordsWorkOrderMaterialDetails();
		return View::make('workOrder.work_report')
			->with('work_order_details',$all_records_work_order_details)
			->with('work_order_material_details',$all_records_work_order_material_details);
	}


	public function item_details($work_order_no)
	{
		$item_no_array= WorkOrder::respectiveItemNo($work_order_no);
		return $item_no_array;
	}

	public function update($id)
	{
		//to update entered work order
		$record=WorkOrder::getRecordByWorkOrderDeails($id);
		$record= $record[0];
		return View::make('workOrder.work_update')
			->with('record',$record);

		dd($record);

		dd("update called");
	}


	public function update_details($id)
	{
		dd("update functions called");
	}


	public function excel()
	{
		$all_records_work_order_details= WorkOrder::getAllRecordsWorkOrderDetails();
		$all_records_work_order_material_details=WorkOrder::getAllRecordsWorkOrderMaterialDetails();
		return View::make('workOrder.workOrder_report_excel')
			->with('work_order_details',$all_records_work_order_details)
			->with('work_order_material_details',$all_records_work_order_material_details);
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
		//dd($id);
		WorkOrder::deleteRecord($id);
		$all_records_work_order_details= WorkOrder::getAllRecordsWorkOrderDetails();
		$all_records_work_order_material_details=WorkOrder::getAllRecordsWorkOrderMaterialDetails();
		return View::make('workOrder.work_report')
			->with('work_order_details',$all_records_work_order_details)
			->with('work_order_material_details',$all_records_work_order_material_details);


	}

}