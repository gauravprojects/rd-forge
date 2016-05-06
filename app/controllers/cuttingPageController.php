	<?php

	class cuttingPageController extends BaseController
	{

		/* ---------------    FUNCTIONS USED IN CUTTING CONTROLLER    ---------------------------------

		Note-> 1- description comes from those 4 master tables
			   2- Heat number comes from raw_materials table.
					** ONLY THOSE HEAT NO ARE DISPLAYED WHOSE available_weight > 0
				3- available_weight is updated after every transaction.
						available_weight(raw_material table)=  available_weight - total_weight(cutting_material table)


		FUNCTION NAME					DESCRIPTION				 				RETURNING DATA

		index()					shows home page for cutting					blade- cutting material form
		store()					stores data coming from cutting form		blade- confirm page
		show()					shows all entries in cutting table			blade- cutting_report
		excel()					gives all cutting data to an 				blade- cutting_report_excel
								excel file
		update()				update records that are previously			blade- cutting blade form
								entered
																											*/

		public static function getStandardData()
		{
			$sizes = Sizes::getSizes();
			$heat_no = RawMaterialStock::getHeatNo();
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
			//all data form master table is taken and fed to the  cutting form
			
			$data = cuttingPageController::getStandardData();

			return View::make('cutting.cut')
					->with($data);
		}

		public function store()
		{
			// stores data coming from cutting form

			$cutting = Input::all();

			// calculating required total weight
			$total_weight = $cutting['quantity'] * $cutting['wpp'];

			// The cutting heat number is combination of heat number and size of the data and used for deduction of raw material stock
			$final_heat_no = explode("-",$cutting['heatNo'])[0];
			$final_size = explode("-",$cutting['heatNo'])[1];


			$cutting_stock_array = array(	
					'heat_no' => $final_heat_no,
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'available_weight_cutting' => $total_weight
				);

			$cutting_array = array(
					'date' => date('Y-m-d',strtotime($cutting['date'])),
					'raw_mat_size' => $final_size, // Raw material size cut from the heat number
					'heat_no' => $final_heat_no,
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'quantity' => $cutting['quantity'],
					'weight_per_piece' => $cutting['wpp'],
					'total_weight' => $total_weight,
					'available_weight_cutting' =>$total_weight,
					'remarks' => $cutting['cutRem'],
					'description' => $cutting['cutDes']
			);


		//Checks whether the stock of given heat,size,pressure,type and schedule is present or not in stock table
		$whether_stock_present = CuttingStock::getHeatSizePressureTypeScheduleData($final_heat_no,$cutting['standard_size'],$cutting['pressure'],$cutting['type'],$cutting['schedule']);
		
		
		//Transaction begins
		DB::beginTransaction();

			try
			{
				if(!$whether_stock_present)
				{
					//Inserts the cutting data
					if(!Cutting::insertData($cutting_array))
						throw new Exception("Cannot insert cutting data", 1);

					//Insert the cutting stock data
					if(!CuttingStock::insertData($cutting_stock_array))
						throw new Exception("Cannot Insert cutting data", 1);

					//Decrement the data from the raw material stock depending on the heat and size
					if(!RawMaterialStock::decrementRecordByHeatSize($final_heat_no,$final_size,$total_weight))
						throw new Exception("Cannot update weight", 1);

					//Checks for negative weights
					if(RawMaterialStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the raw material stock", 1);

					else
						DB::commit();
				}
				else
				{
					//Inserts the cutting data
					if(!Cutting::insertData($cutting_array))
						throw new Exception("Cannot insert cutting data", 1);

					//Increments the stock data weight on the basis of given heat,size,pressure,type and schedule
					if(!CuttingStock::incrementHeatSizePressureTypeScheduleData($final_heat_no,$cutting['standard_size'],$cutting['pressure'],$cutting['type'],$cutting['schedule'],$total_weight))
						throw new Exception("Cannot increment cutting data", 1);

					//Decrements the stock data weight on the basis of heat number and size
					if(!RawMaterialStock::decrementRecordByHeatSize($final_heat_no,$final_size,$total_weight))
						throw new Exception("Cannot update weight", 1);

					//Checks for negative weights
					if(RawMaterialStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the raw material stock", 1);

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

			$last_record = Cutting::getLastRecord();
	
			return View::make('cutting.confirm')->with('last_record', $last_record);

		}

		public function show()
		{
			$all_records= Cutting::getAllData();
			return View::make('cutting.cutting_report')->with('all_records', $all_records);
		}


		//Shows the cutting material update page to update the data depending on the id
		public function update($id)
		{
			$cutting_array = Cutting::getRecord($id);

			$data = cuttingPageController::getStandardData();

			return View::make('cutting.cutting_update')
			->with('cutting_array',$cutting_array)
			->with($data);
		}


		public function update_store($id)
		{
		
		$cutting = Input::all();

		$total_weight = $cutting['quantity'] * $cutting['wpp'];

		$final_heat_no = explode("-",$cutting['heatNo'])[0];
		$final_size = explode("-",$cutting['heatNo'])[1];

		$cutting_array = array(
					'date' => date('Y-m-d',strtotime($cutting['date'])),
					'raw_mat_size' => $final_size,
					'heat_no' => $final_heat_no,
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'quantity' => $cutting['quantity'],
					'weight_per_piece' => $cutting['wpp'],
					'total_weight' => $total_weight,
					'available_weight_cutting' =>$total_weight
					);

		$cutting_stock_array = array(	
					'heat_no' => $final_heat_no,
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'available_weight_cutting' => $cutting['old_weight']
				);

		DB::beginTransaction();

		try{
			//Checks whether the stock of given heat,size,pressure,type and schedule is present or not in stock table
			$whether_stock_present = CuttingStock::getHeatSizePressureTypeScheduleData($final_heat_no,$cutting['standard_size'],$cutting['pressure'],$cutting['type'],$cutting['schedule']);

			if(!$whether_stock_present)
			{
				if(!Cutting::updateAllData($cutting['cutting_id'],$cutting_array))
					throw new Exception("Could not update all data",1);

				//Insert data in the stock table
				if(!CuttingStock::insertData($cutting_stock_array))
					throw new Exception("Could not insert data for new heat number",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($cutting['old_heat_no'],$cutting['old_standard_size'],$cutting['old_pressure'],$cutting['old_type'],$cutting['old_schedule'],$cutting['old_weight']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Decrements the raw material stock data weight on the basis of given heat and size
				if(!RawMaterialStock::decrementRecordByHeatSize($final_heat_no,$final_size,$total_weight))
					throw new Exception("Cannot update weight", 1);

				//Increments the raw material stock data weight on the basis of given old heat and size
				if(!RawMaterialStock::incrementRecordByHeatSize($cutting['old_heat_no'],$cutting['old_size'],$cutting['old_weight']))
					throw new Exception("Cannot update weight", 1);

				if(RawMaterialStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the raw material stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Update all data in the cutting records table
				if(!Cutting::updateAllData($cutting['cutting_id'],$cutting_array))
					throw new Exception("Could not update all data",1);

				//Decrements the cutting stock data weight on the basis of given OLD heat,size,pressure,type and schedule
				if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($cutting['old_heat_no'],$cutting['old_standard_size'],$cutting['old_pressure'],$cutting['old_type'],$cutting['old_schedule'],$cutting['old_weight']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Increments the cutting stock data weight on the basis of given heat,size,pressure,type and schedule
				if(!CuttingStock::incrementHeatSizePressureTypeScheduleData($final_heat_no,$cutting['standard_size'],$cutting['pressure'],$cutting['type'],$cutting['schedule'],$total_weight))
					throw new Exception("Could not increment data for new heat number",1);

				//Decrements the raw material stock data weight on the basis of given heat and size
				if(!RawMaterialStock::decrementRecordByHeatSize($final_heat_no,$final_size,$total_weight))
					throw new Exception("Cannot update weight", 1);

				//Increments the raw material stock data weight on the basis of given old heat and size
				if(!RawMaterialStock::incrementRecordByHeatSize($cutting['old_heat_no'],$cutting['old_size'],$cutting['old_weight']))
					throw new Exception("Cannot update weight", 1);

				if(RawMaterialStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the raw material stock", 1);

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

		$get_record_array = Cutting::getRecord($cutting['cutting_id']);
		return View::make('cutting.confirm_cutting_update')->with('confirmations',$get_record_array);
	}

		//Generates the excel data for the cutting records
		public function excel()
		{
			$all_records= Cutting::getAllData();
			return View::make('cutting.cutting_report_excel')->with('all_records', $all_records);
		}

		// public function availableTotalWeight()
		// {
		// 	$wpp = Input::get('wpp');
		// 	$heat_no = Input::get('heat_no');
		// 	$quantity = Input::get('quantity');

		// 	$response = Cutting::availabeWeight($heat_no);
		// 	$response = (array)$response[0];
		// 	$available_weight = $response['available_weight'];
		// 	$total_weight = $wpp * $quantity;
		// 	if ($total_weight > $available_weight)
		// 		return 0;
		// 	if ($total_weight < $available_weight)
		// 		return 1;
		// }

		//Shows all the material that is available in the current stock
		public function available()
		{
			$data= CuttingStock::availableWeight();
			return View::make('cutting.available')
					->with('data',$data);
		}

		//Deletes the cutting material records and the stock related to particular heat,size,pressure,type and schedule
		public function destroy($id)
		{
			$cutting_response = Cutting::getRecord($id);

			$total_weight = $cutting_response[0]->weight_per_piece * $cutting_response[0]->quantity;

			DB::beginTransaction();
			try
			{
				// //Increments the raw material stock data weight on the basis of given heat and size
				if(!RawMaterialStock::incrementRecordByHeatSize($cutting_response[0]->heat_no,$cutting_response[0]->raw_mat_size,$total_weight))
					throw new Exception("Cannot update raw material data", 1);

				//Decrements the cutting stock data weight on the basis of given heat,size,pressure,type and schedule
				if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($cutting_response[0]->heat_no,$cutting_response[0]->standard_size,$cutting_response[0]->pressure,$cutting_response[0]->type,$cutting_response[0]->schedule,$total_weight))
					throw new Exception("Could not decrement data for old heat number",1);
					
				//Delete the cutting records specified by the internal number
				if(!Cutting::delete_record($id))
					throw new Exception("Cannot delete cutting record", 1);

				else
					DB::commit();
					
			}
			catch(Exception $e)
			{
				DB::rollback();
				echo $e->getMessage();
				return 0;
			}

			$all_records = Cutting::getAllData();

			return View::make('cutting.cutting_report')->with('all_records', $all_records);

		}

		//Returns the search view in the search panel
		public function search_display()
	    {
	        return View::make('search.cutting_search')->with('data',Cutting::getAllData());
	    }
	}
