	<?php

	class SerrationController extends BaseController {

		/* ------------------------------- FUNCTIONS USED -----------------------------------------------

		Note-> everywhere I have used the serration as serration, please ignore spelling and used serration as serration
				to avoid any further confusions..................

			name							DESCRIPTION 							  BLADE USED FOR

			index()						to shoe the serration form					serration blade
	*/
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

			$whether_stock_present = SerrationStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

			try
			{
				if(!$whether_stock_present)
				{
					if(!Serration::insertData($serration_array))
						throw new Exception("Could not insert serration data",1);

					if(!SerrationStock::insertData($serration_stock_array))
						throw new Exception("Could not insert serration data",1);

					//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not decrement data for work order",1);

					else
						DB::commit();
				}
				else
				{
					if(!Serration::insertData($serration_array))
						throw new Exception("Could not insert serration data",1);

					if(!SerrationStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not insert serration data",1);

					//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not decrement data for work order",1);

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

			$last_record = Serration::getLastRecord();

			return View::make('serration.confirm')->with('last_record',$last_record);
		}

		public function show()
		{
			$all_data=Serration::getAllData();
			return View::make('serration.serration_report')->with('data',$all_data);
		}

		public function update($id)
		{
			$serration_array = Serration::getRecord($id);
		
			$grades = Grades::getGrades();

			$availableWorkOrder = DrillingStock::getDrilledWorkOrderNo();
			$availableWorkOrderItem = DrillingStock::getDrilledWorkOrderItemNo();
		
			return View::make('serration.serration_update')
			->with('serration_array',$serration_array)
			->with('grades',$grades)
			->with('availableWorkOrderNo',$availableWorkOrder)
			->with('availableWorkOrderItemNo',$availableWorkOrderItem);
		}


		public function update_store($id)
		{
			
			$serration_input = Input::all();

			$old_work_order_no = explode("-",$serration_input['old_serration_work_order'])[0];
			$old_work_order_item_no = explode("-",$serration_input['old_serration_work_order'])[1];

			$work_order_no = explode("-",$serration_input['item'])[0];
			$work_order_item_no = explode("-",$serration_input['item'])[1];
			$work_order_size = explode("-",$serration_input['item'])[2];
			$work_order_pressure = explode("-",$serration_input['item'])[3];
			$work_order_type = explode("-",$serration_input['item'])[4];
			$work_order_schedule = explode("-",$serration_input['item'])[5];

			$drilling_array= array(
				'date' => date('Y-m-d'),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,			
				'quantity'	=>	$serration_input['quantity'],
				'machine_name'=> $serration_input['machine_name'],
				'grade' => $serration_input['grade'],
				'remarks' => $serration_input['remarks']
			);


			$drilling_stock_array = array(

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

			try{
				//Checks whether the stock of given heat,size,pressure,type and schedule is present or not in stock table
				$whether_stock_present = SerrationStock::getWorkOrderItemData($work_order_no,$work_order_item_no);

				if(!$whether_stock_present)
				{
					if(!Serration::updateAllData($serration_input['serration_id'],$serration_array))
						throw new Exception("Could not update drilling records data",1);

					//Insert data in the stock table
					if(!SerrationStock::insertData($serration_stock_array))
						throw new Exception("Could not insert drilling data in the stock table",1);

					//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
					if(!SerrationStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_serration_quantity']))
						throw new Exception("Could not decrement data for old work order number",1);

					//Decrements the raw material stock data weight on the basis of given heat and size
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Cannot update quantity", 1);

					//Increments the raw material stock data weight on the basis of given old heat and size
					if(!DrillingStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_serration_quantity']))
						throw new Exception("Cannot update quantity", 1);

					else
						DB::commit();
				}
				else
				{
					//Update all data in the cutting records table
					if(!Serration::updateAllData($serration_input['drilling_id'],$serration_array))
						throw new Exception("Could not update all data",1);

					//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
					if(!SerrationStock::decrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_serration_quantity']))
						throw new Exception("Could not decrement data for old work order number",1);

					//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
					if(!SerrationStock::incrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Could not increment data for old work order number",1);

					//Decrements the raw material stock data weight on the basis of given heat and size
					if(!DrillingStock::decrementWorkOrderItemData($work_order_no,$work_order_item_no,$serration_input['quantity']))
						throw new Exception("Cannot update quantity", 1);

					//Increments the raw material stock data weight on the basis of given old heat and size
					if(!DrillingStock::incrementWorkOrderItemData($old_work_order_no,$old_work_order_item_no,$serration_input['old_drilling_quantity']))
						throw new Exception("Cannot update quantity", 1);

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


			$get_record_array= Serration::getRecord($serration['serration_id']);
			return View::make('serration.confirm_serration_update')->with('confirmations',$get_record_array);
		}

		public function getDrilledWorkOrderMaterial()
		{
			$work_order_no = Input::get('work_order_no');
			$details = DrillingStock::getDrilledWorkOrderMaterial($work_order_no);
			return json_encode($details);
		}

		public function excel()
		{
			$all_data = Serration::getAllData();
			return View::make('serration.serration_report_excel')->with('data',$all_data);

		}

		public function destroy($id)
		{
			$serration_response = Serration::getRecord($id);

			DB::beginTransaction();

			try
			{
				if(!Serration::delete_record($id))
					throw new Exception("Cannot delete machining record", 1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!SerrationStock::decrementWorkOrderItemData($serration_response[0]->work_order_no,$serration_response[0]->item,$serration_response[0]->quantity))
					throw new Exception("Could not decrement data for old heat number",1);

				//Increments the raw material stock data weight on the basis of given old heat and size
				if(!DrillingStock::incrementWorkOrderItemData($serration_response[0]->work_order_no,$serration_response[0]->item,$serration_response[0]->quantity))
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

			$all_data = Serration::getAllData();
			return View::make('serration.serration_report')->with('data',$all_data);
		}

		public function search_display()
	    {
	        return View::make('search.serration_search')->with('data',Serration::getAllData());
	    }

	}