<?php

class machiningController extends BaseController
{

	public static function getStandardData()
		{
			$sizes = Sizes::getSizes();
			$heat_no = ForgingStock::getHeatNo();
			$standard_sizes = StandardSizes::getStandardSizes();
			$pressure = Pressure::getPressure();
			$schedule = Schedule::getSchedule();
			$type = DescriptionType::getType();
			$material_type = MaterialType::getMaterialType();

			return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,
				'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type,'material_type'=>$material_type);

		}


	public function index()
	{
		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		$heat_no = ForgingStock::getHeatNo();
		return View::make('machining.machine')
				->with('grades',$grades)
				->with('heat_no',$heat_no)
				->with('availableWorkOrderNo',$availableWorkOrder);
	}

	public function store()
	{
		$machining_input = Input::all();

		$machining_heat_no = explode("-",$machining_input['heat_no'])[0];
		$forging_size = explode("-",$machining_input['heat_no'])[1];
		$forging_pressure = explode("-",$machining_input['heat_no'])[2];
		$forging_type = explode("-",$machining_input['heat_no'])[3];
		$forging_schedule = explode("-",$machining_input['heat_no'])[4];

		$work_order_no = explode("-",$machining_input['item'])[0];
		$work_order_item_no = explode("-",$machining_input['item'])[1];
		$work_order_size = explode("-",$machining_input['item'])[2];
		$work_order_pressure = explode("-",$machining_input['item'])[3];
		$work_order_type = explode("-",$machining_input['item'])[4];
		$work_order_schedule = explode("-",$machining_input['item'])[5];

		$machining_array= array(
				'date' => date('Y-m-d',strtotime($machining_input['date'])),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,
				'heat_no'	=> $machining_heat_no,
				'forging_size' => $forging_size,
				'forging_pressure' => $forging_pressure,
				'forging_type' => $forging_type,
				'forging_schedule' => $forging_schedule,
				'quantity'  => $machining_input['quantity'],
				'machine_name'=>$machining_input['machine_name'],
				'grade' => $machining_input['grade'],
				'weight'	=> $machining_input['weight'],
				'remarks'=> $machining_input['remarks']
		);

		$machining_work_order_stock_array = array(

			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,
			'size' => $work_order_size,
			'pressure' => $work_order_pressure,
			'type' =>	$work_order_type,
			'schedule' =>	$work_order_schedule,
			'quantity'  => $machining_input['quantity'],
			'weight'	=> $machining_input['weight']

			);

		DB::beginTransaction();

		$whether_stock_present = MachiningStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

		try
		{
			if(!$whether_stock_present)
			{
				if(!Machining::insertData($machining_array))
					throw new Exception("Could not insert machining data",1);

				if(!MachiningStock::insertData($machining_work_order_stock_array))
					throw new Exception("Could not insert machining data",1);

				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Could not deduct forging data",1);

				else
					DB::commit();
			}
			else
			{
				if(!Machining::insertData($machining_array))
					throw new Exception("Could not insert machining data",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!MachiningStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$machining_input['quantity']))
					throw new Exception("Could not increment data for old heat number",1);

				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Could not deduct forging data",1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			var_dump($e);
			return 0;
		}
		//get last record

		$last_record = Machining::getLastRecord();

		return View::make('machining.confirm')->with('last_record',$last_record);

	}

	public function show()
	{
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);
	}

	public function excel()
	{

		$all_data = Machining::getAllData();
		return View::make('machining.machining_report_excel')->with('data',$all_data);
	}

	public function update($id)
	{
		$machining_array = Machining::getRecord($id);		

		$grades = Grades::getGrades();
		$heat_no = ForgingStock::getHeatNo();

		// shows index page for machining form
		$availableWorkOrder = WorkOrder::availableWorkOrderNo();
		$availableWorkOrderItem = WorkOrder::availableWorkOrderItemNo();
		
		return View::make('machining.machining_update')
			->with('grades',$grades)
			->with('heat_no',$heat_no)
			->with('availableWorkOrderNo',$availableWorkOrder)
			->with('availableWorkOrderItemNo',$availableWorkOrderItem)
			->with('machining_array',$machining_array);

	}

	public function update_store($id)
	{
		
		$machining_input = Input::all();

		$old_machining_heat_no = explode("-",$machining_input['old_machining_data'])[0];
		$old_forging_size = explode("-",$machining_input['old_machining_data'])[1];
		$old_forging_pressure = explode("-",$machining_input['old_machining_data'])[2];
		$old_forging_type = explode("-",$machining_input['old_machining_data'])[3];
		$old_forging_schedule = explode("-",$machining_input['old_machining_data'])[4];

		$old_work_order_no = explode("-",$machining_input['old_machining_work_order'])[0];
		$old_work_order_item_no = explode("-",$machining_input['old_machining_work_order'])[1];


		$machining_heat_no = explode("-",$machining_input['heat_no'])[0];
		$forging_size = explode("-",$machining_input['heat_no'])[1];
		$forging_pressure = explode("-",$machining_input['heat_no'])[2];
		$forging_type = explode("-",$machining_input['heat_no'])[3];
		$forging_schedule = explode("-",$machining_input['heat_no'])[4];

		$work_order_no = explode("-",$machining_input['item'])[0];
		$work_order_item_no = explode("-",$machining_input['item'])[1];
		$work_order_size = explode("-",$machining_input['item'])[2];
		$work_order_pressure = explode("-",$machining_input['item'])[3];
		$work_order_type = explode("-",$machining_input['item'])[4];
		$work_order_schedule = explode("-",$machining_input['item'])[5];

		$machining_array = array(
				'date' => date('Y-m-d',strtotime($machining_input['date'])),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,
				'heat_no'	=> $machining_heat_no,
				'forging_size' => $forging_size,
				'forging_pressure' => $forging_pressure,
				'forging_type' => $forging_type,
				'forging_schedule' => $forging_schedule,
				'quantity'  => $machining_input['quantity'],
				'machine_name'=>$machining_input['machine_name'],
				'grade' => $machining_input['grade'],
				'weight'	=> $machining_input['weight'],
				'remarks'=> $machining_input['remarks']
			);

		$machining_stock_array = array(	
					'work_order_no' => $work_order_no,
					'item'  	=> $work_order_item_no,
					'size' => $work_order_size,
					'pressure' => $work_order_pressure,
					'type' =>	$work_order_type,
					'schedule' =>	$work_order_schedule,
					'quantity'  => $machining_input['quantity'],
					'weight'	=> $machining_input['weight']
				);


		DB::beginTransaction();

		try{
			//Checks whether the stock of given heat,size,pressure,type and schedule is present or not in stock table
			$whether_stock_present = MachiningStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

			if(!$whether_stock_present)
			{
				if(!Machining::updateAllData($machining_input['machining_id'],$machining_array))
					throw new Exception("Could not update machining records data",1);

				//Insert data in the stock table
				if(!MachiningStock::insertData($machining_stock_array))
					throw new Exception("Could not insert machining data in the stock table",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!MachiningStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$machining_input['old_machining_quantity']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Decrements the raw material stock data weight on the basis of given heat and size
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Cannot update weight", 1);

				//Increments the raw material stock data weight on the basis of given old heat and size
				if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($old_machining_heat_no,$old_forging_size,$old_forging_pressure,$old_forging_type,$old_forging_schedule,$machining_input['old_machining_quantity']))
					throw new Exception("Cannot update weight", 1);

				else
					DB::commit();
			}
			else
			{
				//Update all data in the cutting records table
				if(!Machining::updateAllData($machining_input['machining_id'],$machining_array))
					throw new Exception("Could not update all data",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!MachiningStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$machining_input['old_machining_quantity']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!MachiningStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$machining_input['quantity']))
					throw new Exception("Could not increment data for old heat number",1);

				//Decrements the raw material stock data weight on the basis of given heat and size
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Cannot update weight", 1);

				//Increments the raw material stock data weight on the basis of given old heat and size
				if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($old_machining_heat_no,$old_forging_size,$old_forging_pressure,$old_forging_type,$old_forging_schedule,$machining_input['old_machining_quantity']))
					throw new Exception("Cannot update weight", 1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			var_dump($e);
			return $e;
		}

		$get_record_array= Machining::getRecord($machining_input['machining_id']);
		return View::make('machining.confirm_machining_update')->with('confirmations',$get_record_array);
	}

	public function destroy($id)
	{
		$machining_response = Machining::getRecord($id);

		DB::beginTransaction();

		try
		{
			if(!Machining::delete_record($id))
				throw new Exception("Cannot delete machining record", 1);

			//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
			if(!MachiningStock::decrementWorkOrderItemData($machining_response[0]->work_order_no,$machining_response[0]->item,$machining_response[0]->quantity))
				throw new Exception("Could not decrement data for old heat number",1);

			//Increments the raw material stock data weight on the basis of given old heat and size
			if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($machining_response[0]->heat_no,$machining_response[0]->forging_size,$machining_response[0]->forging_pressure,$machining_response[0]->forging_type,$machining_response[0]->forging_schedule,$machining_response[0]->quantity))
				throw new Exception("Cannot update weight", 1);

			else
				DB::commit();
			
		}
		catch(Exception $e)
		{
			DB::rollback();
			var_dump($e);
			return $e;
		}

		
		return View::make('machining.machining_report')->with('data',$all_data);

	}

	public function search_display()
    {
        return View::make('search.machining_search')->with('data',Machining::getAllData());
    }

}
