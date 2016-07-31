	<?php

class SerrationController extends BaseController {

	
		public function index()
		{
			$availableWorkOrder= DrillingStock::getDrilledWorkOrderNo();
			$grades = Grades::getGrades();
			$heatNo_available_forging_weight = Drilling::HeatNo_availableWeightForging();
			return View::make('serration.serration')
					->with('grades',$grades)
					->with('availableWorkOrderNo',$availableWorkOrder)
					->with('heat_no',$heatNo_available_forging_weight);
		}

		//Stores the input data
		public function store()
		{

			$serration_input = Input::all();
			$work_order_no = explode("-",$serration_input['item'])[0];
			$work_order_item_no = explode("-",$serration_input['item'])[1];
			$work_order_size = explode("-",$serration_input['item'])[2];
			$work_order_pressure = explode("-",$serration_input['item'])[3];
			$work_order_type = explode("-",$serration_input['item'])[4];
			$work_order_schedule = explode("-",$serration_input['item'])[5];

			$serration_array= array(
				'date' => date('Y-m-d'),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,			
				'quantity'	=>	$serration_input['quantity'],
				'machine_name'=> $serration_input['machine_name'],
				'grade' => $serration_input['grade'],
				'weight'	=> $serration_input['weight'],
				'remarks' => $serration_input['remarks']
			);

			$serration_stock_array = array(

				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,
				'size' => $work_order_size,
				'pressure' => $work_order_pressure,
				'type' =>	$work_order_type,
				'schedule' =>	$work_order_schedule,
				'quantity'  => $serration_input['quantity'],
				'weight'	=> $serration_input['weight']

				);

			DB::beginTransaction();

			//Checks whether the stock of given work order and item number is present or not in stock table
			$whether_stock_present = SerrationStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

			try
			{
				if(!$whether_stock_present)
				{
					//Insert data in the serration records table
					if(!Serration::insertData($serration_array))
						throw new Exception("Could not insert serration data",1);

					//Insert data in the serration stock table
					if(!SerrationStock::insertData($serration_stock_array))
						throw new Exception("Could not insert serration data",1);

					//Decrements the drilling stock on the basis of work order and item numbers
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not decrement data for work order",1);

					//Checks negative weights if present
					if(DrillingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the drilling stock", 1);

					else
						DB::commit();
				}
				else
				{
					//Insert data in the serration records table
					if(!Serration::insertData($serration_array))
						throw new Exception("Could not insert serration data",1);

					//Increments the serration stock on the basis of work order and item numbers
					if(!SerrationStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not insert serration data",1);

					//Decrements the drilling stock on the basis of work order and item numbers
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not decrement data for work order",1);

					//Checks negative weights if present
					if(DrillingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the drilling stock", 1);

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

			$last_record = Serration::getLastRecord();

			return View::make('serration.confirm')->with('last_record',$last_record);
		}


		//Shows the overall records of serration
		public function show()
		{
			$all_data=Serration::getAllData();
			return View::make('serration.serration_report')->with('data',$all_data);
		}

		//Open the update page of the module with the data
		public function update($id)
		{
			$serration_array = Serration::getRecord($id);
			$grades = Grades::getGrades();
			$work_order_no=$serration_array[0]->work_order_no;

			$availableWorkOrder = DrillingStock::getDrilledWorkOrderNo();
			$availableWorkOrder_element= $availableWorkOrder[0]->work_order_no;
			$availableWorkOrderItem = DrillingStock::getDrilledWorkOrderItemNo($work_order_no);
			return View::make('serration.serration_update')
			->with('serration_array',$serration_array)
			->with('grades',$grades)
			->with('availableWorkOrderNo',$availableWorkOrder)
			->with('availableWorkOrderItemNo',$availableWorkOrderItem);
		}

		//Updates the new data
		public function update_store($id)
		{
			
			$serration_input = Input::all();
			$old_work_order_no = explode("-",$serration_input['old_serration_work_order'])[0];
			$old_work_order_item_no = explode("-",$serration_input['old_serration_work_order'])[1];
			$old_seration_quantity=Serration::getDataSerationByOrderNoItemNo($old_work_order_no,$old_work_order_item_no)->quantity;
			$work_order_no = trim(explode("-",$serration_input['item'])[0]);
			$work_order_item_no = explode("-",$serration_input['item'])[1];
			$work_order_size = explode("-",$serration_input['item'])[2];
			$work_order_pressure = explode("-",$serration_input['item'])[3];
			$work_order_type = explode("-",$serration_input['item'])[4];
			$work_order_schedule = trim(explode("-",$serration_input['item'])[5]);
//
//			dd($old_work_order_no,
//			$old_work_order_item_no,
//			$old_seration_quantity,
//			$work_order_no,
//			$work_order_item_no,
//			$work_order_size ,
//			$work_order_pressure,
//			$work_order_type ,
//			$work_order_schedule
//		);
			$serration_array= array(
				'date' => date('Y-m-d'),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,			
				'quantity'	=>	(int)$serration_input['quantity'],
				'machine_name'=> $serration_input['machine_name'],
				'grade' => $serration_input['grade'],
				'remarks' => $serration_input['remarks'],
				'weight'=> (int)$serration_input['weight'],
			);


			$serration_stock_array = array(

				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,
				'size' => $work_order_size,
				'type' =>	$work_order_type,
				'pressure' => $work_order_pressure,
				'schedule' =>	$work_order_schedule,
				'quantity'  => (int)$serration_input['quantity'],
				'weight'	=> (int)$serration_input['weight']

			);

			///-------------my code form here ---------------
			$id=Serration::getDataSerationByOrderNoItemNo($old_work_order_no,$old_work_order_item_no)->serr_id;
			$whether_stock_present = SerrationStock::getWorkOrderItemData($work_order_no,$work_order_item_no);
			SerrationStock::updateData($id,$serration_stock_array);
			DB::beginTransaction();

			try{

				//Checks whether the stock of given work order and item number is present or not in stock table
				$whether_stock_present = SerrationStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

				if(!$whether_stock_present)
				{
					//Update all data in the serration records table
					if(!Serration::updateAllData($serration_input['serration_id'],$serration_array))
						throw new Exception("Could not update drilling records data if part",1);

					//Insert data in the serration stock table
//					if(!SerrationStock::insertData($serration_stock_array))
//						throw new Exception("Could not insert drilling data in the stock table",1);

					//Decrements the serration stock on the basis of old work order and item numbers
					//if(!SerrationStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_serration_quantity']))
						//throw new Exception("Could not decrement data for old work order number",1);

//					Decrements the drilling stock on the basis of new work order and item numbers
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Cannot update drilling quantity", 1);

//					Increments the drilling stock on the basis of old work order and item numbers
					if(!DrillingStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$old_seration_quantity))
						throw new Exception("Cannot update drilling quantity", 1);

					//Checks negative weights if present
					if(DrillingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the drilling stock", 1);

					else
						DB::commit();
				}
				else
				{
					//Update all data in the serration records table
					if(!Serration::updateAllData($serration_input['serration_id'],$serration_array))
						throw new Exception("Could not update all data else part",1);

					//Decrements the serration stock on the basis of old work order and item numbers
					//if(!SerrationStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_serration_quantity']))
						//throw new Exception("Could not decrement data for old work order number",1);

					//Increments the serration stock on the basis of old work order and item numbers
					//if(!SerrationStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						//throw new Exception("Could not increment data for old work order number",1);

//					Decrements the drilling stock on the basis of new work order and item numbers
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Cannot update quantity", 1);

//					Increments the drilling stock on the basis of old work order and item numbers
					if(!DrillingStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$old_seration_quantity))
						throw new Exception("Cannot update quantity", 1);

					//Checks negative weights if present
					if(DrillingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the drilling stock", 1);

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


			$get_record_array= Serration::getRecord($serration_input['serration_id']);
			return View::make('serration.confirm_serration_update')->with('confirmations',$get_record_array);
		}

		//Get the work order details that have been drilled
		public function getDrilledWorkOrderMaterial()
		{
			$work_order_no = Input::get('work_order_no');
			$details = DrillingStock::getDrilledWorkOrderItemNo($work_order_no);
			return json_encode($details);
		}

		//Get all the data in the excel form
		public function excel()
		{
			$all_data = Serration::getAllData();
			return View::make('serration.serration_report_excel')->with('data',$all_data);

		}

		//Used in data deletion
		public function destroy($id)
		{
			$serration_response = Serration::getRecord($id);

			DB::beginTransaction();

			try
			{
				//Deletes the serration record based on its id
				if(!Serration::delete_record($id))
					throw new Exception("Cannot delete machining record", 1);

				//Decrements the serration stock data on the basis of given work order and item numbers
				if(!SerrationStock::decrementWorkOrderItemData($serration_response[0]->work_order_no,$serration_response[0]->item,$serration_response[0]->quantity))
					throw new Exception("Could not decrement data for old heat number",1);

				//Increments the drilling stock data on the basis of given work order and item numbers
				if(!DrillingStock::incrementWorkOrderItemData($serration_response[0]->work_order_no,$serration_response[0]->item,$serration_response[0]->quantity))
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

			$all_data = Serration::getAllData();
			return View::make('serration.serration_report')->with('data',$all_data);
		}

		//Display the search results
		public function search_display()
	    {
	        return View::make('search.serration_search')->with('data',Serration::getAllData());
	    }

	}