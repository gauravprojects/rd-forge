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

	//Stores the input data
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

		//Checks whether the stock of given work order and item number is present or not in stock table
		$whether_stock_present = MachiningStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

		try
		{
			if(!$whether_stock_present)
			{
				//Insert data in the machining records table
				if(!Machining::insertData($machining_array))
					throw new Exception("Could not insert machining data",1);

				//Insert data in the machining stock table
				if(!MachiningStock::insertData($machining_work_order_stock_array))
					throw new Exception("Could not insert machining data",1);

				//Decrements the forging stock on the basis of given new heat,size,pressure,type and schedule
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Could not deduct forging data",1);

				//Checks negative weights if present
				if(ForgingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the forging stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Insert data in the machining records table
				if(!Machining::insertData($machining_array))
					throw new Exception("Could not insert machining data",1);

				//Increments the machining stock on the basis of work order and item numbers
				if(!MachiningStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$machining_input['quantity']))
					throw new Exception("Could not increment data for work order",1);

				//Decrements the forging stock on the basis of given new heat,size,pressure,type and schedule
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Could not deduct forging data",1);

				//Checks negative weights if present
				if(ForgingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the forging stock", 1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return 0;
		}
		//get last record

		$last_record = Machining::getLastRecord();

		return View::make('machining.confirm')->with('last_record',$last_record);

	}

	//Shows the overall records of machining
	public function show()
	{
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);
	}

	//Open the update page of the module with the data
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

	//Updates the new data
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

		MachiningStock::updateData($machining_stock_array);

		DB::beginTransaction();

		try{
			//Checks whether the stock of given work order and item number is present or not in stock table
			$whether_stock_present = MachiningStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

			if(!$whether_stock_present)
			{
				//Update all data in the machining records table
				if(!Machining::updateAllData($machining_input['machining_id'],$machining_array))
					throw new Exception("Could not update machining records data",1);

				//Insert data in the machining stock table
				//if(!MachiningStock::updateData($machining_stock_array))
					//throw new Exception("Could not insert machining data in the stock table",1);

				//Decrements the machining stock on the basis of old work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$machining_input['old_machining_quantity']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Decrements the forging stock on the basis of given new heat,size,pressure,type and schedule
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Cannot update weight", 1);

				//Increments the forging stock on the basis of given old heat,size,pressure,type and schedule
				if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($old_machining_heat_no,$old_forging_size,$old_forging_pressure,$old_forging_type,$old_forging_schedule,$machining_input['old_machining_quantity']))
					throw new Exception("Cannot update weight", 1);

				//Checks negative weights if present
				if(ForgingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the forging stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Update all data in the machining records table
				if(!Machining::updateAllData($machining_input['machining_id'],$machining_array))
					throw new Exception("Could not update machining records data",1);

				//Decrements the machining stock on the basis of old work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$machining_input['old_machining_quantity']))
					throw new Exception("Could not decrement data",1);

				//Increments the machining stock on the basis of new work order and item numbers
				if(!MachiningStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$machining_input['quantity']))
					throw new Exception("Could not increment data for old heat number",1);

				//Decrements the forging stock on the basis of given new heat,size,pressure,type and schedule
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
					throw new Exception("Cannot update weight", 1);

				//Increments the forging stock on the basis of given old heat,size,pressure,type and schedule
				if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($old_machining_heat_no,$old_forging_size,$old_forging_pressure,$old_forging_type,$old_forging_schedule,$machining_input['old_machining_quantity']))
					throw new Exception("Cannot update weight", 1);

				//Checks negative weights if present
				if(ForgingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the forging stock", 1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();			
			echo $e->getMessage();
			return $e;
		}

		$get_record_array= Machining::getRecord($machining_input['machining_id']);
		return View::make('machining.confirm_machining_update')->with('confirmations',$get_record_array);
	}

	//Get all the data in the excel form
	public function excel()
	{

		$all_data = Machining::getAllData();
		return View::make('machining.machining_report_excel')->with('data',$all_data);
	}

	//Used in data deletion
	public function destroy($id)
	{
		$machining_response = Machining::getRecord($id);

		DB::beginTransaction();

		try
		{
			//Deletes the machining record based on its id
			if(!Machining::delete_record($id))
				throw new Exception("Cannot delete machining record", 1);

			//Decrements the machining stock data on the basis of given work order and item numbers
			if(!MachiningStock::decrementWorkOrderItemData($machining_response[0]->work_order_no,$machining_response[0]->item,$machining_response[0]->quantity))
				throw new Exception("Could not decrement data for machining stock",1);

			//Increments the forging stock data on the basis of given heat,size,pressure,type and schedule
			if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($machining_response[0]->heat_no,$machining_response[0]->forging_size,$machining_response[0]->forging_pressure,$machining_response[0]->forging_type,$machining_response[0]->forging_schedule,$machining_response[0]->quantity))
				throw new Exception("Cannot increment data for forging stock", 1);

			else
				DB::commit();
			
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return $e;
		}

		
		return View::make('machining.machining_report')->with('data',$all_data);

	}

	//Display the search results
	public function search_display()
    {
        return View::make('search.machining_search')->with('data',Machining::getAllData());
    }

}
