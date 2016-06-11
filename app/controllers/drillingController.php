<?php

class DrillingController extends BaseController {


	public function index()
	{
		$availableWorkOrder = MachiningStock::getMachinedWorkOrderNo();
		$grades= Grades::getGrades();
		$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
		return View::make('drilling.drill')
				->with('grades',$grades)
				->with('availableWorkOrderNo',$availableWorkOrder)
				->with('heat_no',$heatNo_available_forging_weight);
	}

	//Stores the input data
	public function store()
	{
		$drilling_input = Input::all();
		//dd(explode("-",$drilling_input['item'])[0]);
		$work_order_no = explode("-",$drilling_input['item'])[0];
		$work_order_item_no = explode("-",$drilling_input['item'])[1];
		$work_order_size = explode("-",$drilling_input['item'])[2];
		$work_order_pressure = explode("-",$drilling_input['item'])[3];
		$work_order_type = explode("-",$drilling_input['item'])[4];
		$work_order_schedule = explode("-",$drilling_input['item'])[5];

		$drilling_array= array(
			'date' => date('Y-m-d'),
			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,			
			'quantity'	=>	$drilling_input['quantity'],
			'machine_name'=> $drilling_input['machine_name'],
			'grade' => $drilling_input['grade'],
			'weight'	=> $drilling_input['weight'],
			'remarks' => $drilling_input['remarks']
		);


		$drilling_stock_array = array(

			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,
			'size' => $work_order_size,
			'pressure' => $work_order_pressure,
			'type' =>	$work_order_type,
			'schedule' =>	$work_order_schedule,
			'quantity'  => $drilling_input['quantity'],
			'weight'	=> $drilling_input['weight']

			);

		DB::beginTransaction();

		//Checks whether the stock of given work order and item number is present or not in stock table
		$whether_stock_present = DrillingStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

		try
		{
			if(!$whether_stock_present)
			{
				//Insert data in the drilling records table
				if(!Drilling::insertData($drilling_array))
					throw new Exception("Could not insert drilling data",1);

				//Insert data in the drilling stock table
				if(!DrillingStock::insertData($drilling_stock_array))
					throw new Exception("Could not insert machining data",1);

				//Decrements the machining stock on the basis of work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
					throw new Exception("Could not decrement data for work order",1);

				//Checks negative weights if present
				if(MachiningStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the machining stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Insert data in the drilling records table
				if(!Drilling::insertData($drilling_array))
					throw new Exception("Could not insert drilling data",1);

				//Increments the drilling stock on the basis of work order and item numbers
				if(!DrillingStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
					throw new Exception("Could not insert machining data",1);

				//Decrements the machining stock on the basis of work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
					throw new Exception("Could not decrement data for work order",1);

				//Checks negative weights if present
				if(MachiningStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the machining stock", 1);

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

	
		$last_record = Drilling::getLastRecord();

		return View::make('drilling.confirm')->with('last_record',$last_record);

	}

	//Shows the overall records of drilling
	public function show()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report')->with('data',$all_data);
	}

	//Open the update page of the module with the data
	public function update($id)
	{
		$drilling_array = Drilling::getRecord($id);

		$grades = Grades::getGrades();
		//$heat_no = RawMaterial::getHeatNo();
		$availableWorkOrder= MachiningStock::getMachinedWorkOrderNo();
		$availableWorkOrderItem = MachiningStock::getMachinedWorkOrderItemNo($availableWorkOrder[0]->work_order_no);

		return View::make('drilling.drilling_update')
		->with('drilling_array',$drilling_array)
		->with('grades',$grades)
		->with('availableWorkOrderNo',$availableWorkOrder)
		->with('availableWorkOrderItemNo',$availableWorkOrderItem);
	}

	//Updates the new data
	public function update_store($id)
	{
		
		$drilling_input = Input::all();

		$old_work_order_no = explode("-",$drilling_input['old_drilling_work_order'])[0];
		$old_work_order_item_no = explode("-",$drilling_input['old_drilling_work_order'])[1];

		$work_order_no = explode("-",$drilling_input['item'])[0];
		$work_order_item_no = explode("-",$drilling_input['item'])[1];
		$work_order_size = explode("-",$drilling_input['item'])[2];
		$work_order_pressure = explode("-",$drilling_input['item'])[3];
		$work_order_type = explode("-",$drilling_input['item'])[4];
		$work_order_schedule = explode("-",$drilling_input['item'])[5];

		$drilling_array= array(
			'date' => date('Y-m-d'),
			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,			
			'quantity'	=>	$drilling_input['quantity'],
			'machine_name'=> $drilling_input['machine_name'],
			'grade' => $drilling_input['grade'],
			'remarks' => $drilling_input['remarks']
		);


		$drilling_stock_array = array(

			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,
			'size' => $work_order_size,
			'pressure' => $work_order_pressure,
			'type' =>	$work_order_type,
			'schedule' =>	$work_order_schedule,
			'quantity'  => $drilling_input['quantity'],
			'weight'	=> $drilling_input['weight']

			);


		DrillingStock::updateData($drilling_stock_array);
		
		DB::beginTransaction();

		try{
			//Checks whether the stock of given work order and item number is present or not in stock table
			$whether_stock_present = DrillingStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

			if(!$whether_stock_present)
			{
				if(!Drilling::updateAllData($drilling_input['drilling_id'],$drilling_array))
					throw new Exception("Could not update drilling records data",1);

				//Insert data in the drilling stock table
				//if(!DrillingStock::insertData($drilling_stock_array))
					//throw new Exception("Could not insert drilling data in the stock table",1);

				//Decrements the drilling stock on the basis of old work order and item numbers
				//if(!DrillingStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$drilling_input['old_drilling_quantity']))
				//	throw new Exception("Could not decrement data for old work order number",1);

				//Decrements the machining stock on the basis of new work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
					throw new Exception("Cannot update quantity", 1);

				//Increments the machining stock on the basis of old work order and item numbers
				if(!MachiningStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$drilling_input['old_drilling_quantity']))
					throw new Exception("Cannot update quantity", 1);

				//Checks negative weights if present
				if(MachiningStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the machining stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Update all data in the drilling records table
				if(!Drilling::updateAllData($drilling_input['drilling_id'],$drilling_array))
					throw new Exception("Could not update all data",1);

				//Decrements the machining stock on the basis of old work order and item numbers
				//if(!DrillingStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$drilling_input['old_drilling_quantity']))
				//	throw new Exception("Could not decrement data for old work order number",1);

				//Increments the drilling stock on the basis of new work order and item numbers
				//if(!DrillingStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
				//	throw new Exception("Could not increment data for old work order number",1);

				//Decrements the machining stock on the basis of new work order and item numbers
				if(!MachiningStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$drilling_input['quantity']))
					throw new Exception("Cannot update quantity", 1);

				//Increments the machining stock on the basis of old work order and item numbers
				if(!MachiningStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$drilling_input['old_drilling_quantity']))
					throw new Exception("Cannot update quantity", 1);

				//Checks negative weights if present
				if(MachiningStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the machining stock", 1);

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


		$get_record_array= Drilling::getRecord($drilling_input['drilling_id']);
		return View::make('drilling.confirm_drilling_update')->with('confirmations',$get_record_array);
	}

	//Get the work order details that have been machined
	public function getMachinedWorkOrderMaterial()
	{
		$work_order_no = Input::get('work_order_no');
		$details = MachiningStock::getMachinedWorkOrderItemNo($work_order_no);
		return json_encode($details);
	}

	//Get all the data in the excel form
	public function excel()
	{
		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report_excel')->with('data',$all_data);
	}

	//Used in data deletion
	public function destroy($id)
	{
		$drilling_response = Drilling::getRecord($id);

		DB::beginTransaction();

		try
		{
			//Deletes the drilling record based on its id
			if(!Drilling::delete_record($id))
				throw new Exception("Cannot delete machining record", 1);

			//Decrements the drilling stock data on the basis of given work order and item numbers
			if(!DrillingStock::decrementWorkOrderItemData($drilling_response[0]->work_order_no,$drilling_response[0]->item,$drilling_response[0]->quantity))
				throw new Exception("Could not decrement data for old heat number",1);

			//Increments the machining stock data on the basis of given work order and item numbers
			if(!MachiningStock::incrementWorkOrderItemData($drilling_response[0]->work_order_no,$drilling_response[0]->item,$drilling_response[0]->quantity))
				throw new Exception("Cannot update weight", 1);

			else
				DB::commit();
			
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return $e;
		}

		$all_data = Drilling::getAllData();		
		return View::make('drilling.drilling_report')->with('data',$all_data);

	}

	//Display the search results
	public function search_display()
    {
        return View::make('search.drilling_search')->with('data',Drilling::getAllData());
    }
}