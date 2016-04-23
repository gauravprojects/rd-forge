<?php

class WorkOrderController extends BaseController {

	public function index()
	{
		$grades= Grades::getGrades();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		
		return View::make('workOrder.work')
				->with('grades',$grades)
				->with('standard_size', $standard_sizes)
				->with('pressure', $pressure)
				->with('schedule', $schedule)
				->with('type', $type);
	}

	public function store()
	{
		$data_input=Input::all();

		$work_order_array= array(
			'work_order_no' => $data_input['work_order_no'],
			'customer_name' => $data_input['customer_name'],
			'purchase_order_no' => $data_input['purchase_order_no'],
			'purchase_order_date' => date('Y-m-d',strtotime($data_input['purchase_order_date'])),
			'required_delivery_date' => date('Y-m-d',strtotime($data_input['required_delivery_date'])),
			'inspection' => $data_input['inspection'],
			'packing_instruction' => $data_input['packing_instruction'],
			'testing_instruction' => $data_input['testing_instruction'],
			'quotation_no' => $data_input['quotation_no'],
			'remarks' => $data_input['remarks'],
			'status' => '0'
		);

		WorkOrder::insertData($work_order_array);
	
		for($i=0;$i<count($data_input['item_no']);$i++)
		{
				$work_order_material_array = array(
					'work_order_no' => $data_input['work_order_no'],
					'item_no' => $data_input['item_no'][$i],
					'material_grade' => $data_input['grade'][$i],
					'size' => $data_input['standard_size'][$i],
					'pressure' => $data_input['pressure'][$i],
					'type' => $data_input['type'][$i],
					'schedule' => $data_input['schedule'][$i],
					'quantity' => $data_input['quantity'][$i],
					'weight' => $data_input['weight'][$i],
					'remarks' => $data_input['remarks_mat'][$i]
				);

				$work_order_material_stock_array = array(
					'work_order_no' => $data_input['work_order_no'],
					'item_no' => $data_input['item_no'][$i],
					'size' => $data_input['standard_size'][$i],
					'pressure' => $data_input['pressure'][$i],
					'type' => $data_input['type'][$i],
					'schedule' => $data_input['schedule'][$i],
					'quantity' => $data_input['quantity'][$i],
					'weight' => $data_input['weight'][$i],
				);

				DB::table('work_order_material_details')->insert($work_order_material_array);
				DB::table('work_order_material_stock')->insert($work_order_material_stock_array);

		}

		$work_order_details= WorkOrder::getRecordByWorkOrderDetails($data_input['work_order_no']);
		$work_order_material_details= WorkOrder::getRecordByWorkOrderMaterialDetails($data_input['work_order_no']);


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
		$work_order_details = WorkOrder::getRecordByWorkOrderDetails($id);
		$work_order_material_details = WorkOrder::getRecordByWorkOrderMaterialDetails($id);
		$record = $work_order_details[0];
		$record_new = $work_order_material_details;

		$grades= Grades::getGrades();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		$status = Status::getStatus();
		

		return View::make('workOrder.work_update')
			->with('status',$status)
			->with('record',$record)
			->with('record_new',$record_new)
			->with('grades',$grades)
			->with('standard_size', $standard_sizes)
			->with('pressure', $pressure)
			->with('schedule', $schedule)
			->with('type', $type);
	}


	public function update_store()
	{

		$data_input = Input::all();

		$data_array = array(
			'customer_name' => $data_input['customer_name'],
			'purchase_order_no' => $data_input['purchase_order_no'],
			'purchase_order_date' => date('Y-m-d',strtotime($data_input['purchase_order_date'])),
			'required_delivery_date' => date('Y-m-d',strtotime($data_input['required_delivery_date'])),
			'inspection' => $data_input['inspection'],
			'packing_instruction' => $data_input['packing_instruction'],
			'testing_instruction' => $data_input['testing_instruction'],
			'quotation_no' => $data_input['quotation_no'],
			'remarks' => $data_input['remarks'],
			'status' => '0'
		);

		WorkOrder::updateRecord($data_array,$data_input['work_order_no']);
		WorkOrder::deleteRecordMaterialDetails($data_input['work_order_no']);

		$old_stock = WorkOrder::getOldStockDetails($data_input['work_order_no']);

		// var_dump($old_stock);

		WorkOrder::deleteStockMaterialDetails($data_input['work_order_no']);


		for($i=0;$i<count($data_input['item_no']);$i++)
		{
				$work_order_material_array = array(
					'work_order_no' => $data_input['work_order_no'],
					'item_no' => $data_input['item_no'][$i],
					'material_grade' => $data_input['grade'][$i],
					'size' => $data_input['standard_size'][$i],
					'pressure' => $data_input['pressure'][$i],
					'type' => $data_input['type'][$i],
					'schedule' => $data_input['schedule'][$i],
					'quantity' => $data_input['quantity'][$i],
					'weight' => $data_input['weight'][$i],
					'remarks' => $data_input['remarks_mat'][$i],
					'status' => $data_input['order_status'][$i]
				);

				$work_order_material_stock_array = array(
					'work_order_no' => $data_input['work_order_no'],
					'item_no' => $data_input['item_no'][$i],
					'size' => $data_input['standard_size'][$i],
					'pressure' => $data_input['pressure'][$i],
					'type' => $data_input['type'][$i],
					'schedule' => $data_input['schedule'][$i],
					'quantity' => $data_input['quantity'][$i],
					'weight' => $data_input['weight'][$i],
				);

				DB::table('work_order_material_details')->insert($work_order_material_array);
				DB::table('work_order_material_stock')->insert($work_order_material_stock_array);

		}

		foreach($old_stock as $os)
		{
			DB::table('work_order_material_stock')
			->where('work_order_no',$os->work_order_no)
			->where('item_no',$os->item_no)
			->decrement('quantity',$os->quantity);
		}


		$work_order_details= WorkOrder::getRecordByWorkOrderDetails($data_input['work_order_no']);
		$work_order_material_details= WorkOrder::getRecordByWorkOrderMaterialDetails($data_input['work_order_no']);


		return View::make('workOrder.confirm')
				->with('work_order_details',$work_order_details)
				->with('work_order_material_details',$work_order_material_details);


	}


	public function excel()
	{
		$all_records_work_order_details = WorkOrder::getAllRecordsWorkOrderDetails();
		$all_records_work_order_material_details = WorkOrder::getAllRecordsWorkOrderMaterialDetails();

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
		WorkOrder::deleteRecord($id);
		$all_records_work_order_details= WorkOrder::getAllRecordsWorkOrderDetails();
		$all_records_work_order_material_details=WorkOrder::getAllRecordsWorkOrderMaterialDetails();

		return View::make('workOrder.work_report')
			->with('work_order_details',$all_records_work_order_details)
			->with('work_order_material_details',$all_records_work_order_material_details);

	}

	public function getWorkOrderMaterial()
	{
		$work_order_no = Input::get('work_order_no');
		$details = DB::table('work_order_material_details')->where('work_order_no',$work_order_no)->get();
		return json_encode($details);
	}

	public function search_display()
    {
        return View::make('search.work_order_search');
    }

}