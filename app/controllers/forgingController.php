<?php

class ForgingController extends BaseController {
/*   ----------------------------------- FUNCTIONS USED ------------------------------------------------

		Models-> 1- Forging.php -> table forging_records
				2- ForgingRem.php -> table forging_remarks

Note-> 1- forging is the process done after cutting and before machining.. there is no need of work order in this process
	2- This form requires heat no data from raw material table.
	3- Standard size, pressure, type and schedule data from master data which have separate tables each.

	NAME								USED FOR 									Blade used

	index()						to show forging form with required data			forge.blade.php
	store()						to store data coming form forge form			return confirm.blade.php
	show()						to store all forging data in forging report		forging_report.blade.php
	excel()						generates excel file of all the previously		forging_report_excel.php
								entered data
*/

	public static function getStandardData()
	{
		$sizes = Sizes::getSizes();
		$heat_no = CuttingStock::getHeatNo();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		$grades = Grades::getGrades();
		$manufacturers= Manufactures::getManufactures();

		return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,'sizes'=>$sizes,
			'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type,'grades'=>$grades,'manufacturers'=>$manufacturers);

	}

	//Display the main forging page
	public function index()
	{

		//getting standard master values from respective models
		$data = ForgingController::getStandardData();

		return View::make('forging.forge')
			->with($data);
	}

	//Allows storage of data into the forging records
	public function store()
	{
		$forging_input= Input::all();


		// calculating total_weight
		$total_weight= $forging_input['weight_per_peice']*$forging_input['quantity'];
			

		//The forging heat would be combination of all the below and used to deduct the cutting stock used
		$final_heat_no = explode("-",$forging_input['heat_no'])[0];
		$final_standard_size = explode("-",$forging_input['heat_no'])[1];
		$final_pressure = explode("-",$forging_input['heat_no'])[2];
		$final_type = explode("-",$forging_input['heat_no'])[3];
		$final_schedule = explode("-",$forging_input['heat_no'])[4];


		$forging_array= array(
			'date'		=> date('d-m-y',strtotime($forging_input['date'])),
			'weight_per_piece'=>$forging_input['weight_per_peice'],
			'heat_no'		=> $final_heat_no,
			'cutting_size' => $final_standard_size,
			'cutting_type' =>	$final_type,
			'cutting_pressure' => $final_pressure,
			'cutting_schedule' => $final_schedule,
			'size' => implode(",",$forging_input['standard_size']),
			'pressure' => implode(",",$forging_input['pressure']),
			'type' => implode(",",$forging_input['type']),
			'schedule' => implode(",",$forging_input['schedule']),
			'quantity'		=> $forging_input['quantity'],
			'total_weight'	=> $total_weight,
			'remarks'     => $forging_input['remarks'],
			'available_weight_forging' => $total_weight
		);

		

		// forging array for input
	DB::beginTransaction();

		try
		{
			//Insert the forging data
			if(!Forging::insertData($forging_array))
				throw new Exception("Cannot insert forging data", 1);

			//Decrement the data from the cutting stock depending on the heat,size,pressure,type and schedule
			if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($final_heat_no,$final_standard_size,$final_pressure,$final_type,$final_schedule,$total_weight))
				throw new Exception("Cannot update weight", 1);

			//Since the record amount of standard size will mean amount of other params, hence we check length of standard size
			for($counter = 0; $counter < count($forging_input['standard_size']); $counter++)
			{
		
				$forging_stock_array = array(
						'heat_no' => $final_heat_no,
						'size' => $forging_input['standard_size'][$counter],
						'pressure' => $forging_input['pressure'][$counter],
						'type' => $forging_input['type'][$counter],
						'schedule' => $forging_input['schedule'][$counter],
						'available_quantity_forging' => $forging_input['quantity']
				);

			//Checks whether the forging stock present or not depending on the heat,size,type,pressure,schedule
			$whether_stock_present = ForgingStock::getHeatSizePressureTypeScheduleData($forging_input['heat_no'],$forging_input['standard_size'][$counter],$forging_input['pressure'][$counter],$forging_input['type'][$counter],$forging_input['schedule'][$counter]);

	
				if(!$whether_stock_present)
				{

					//Insert the forging stock data
					if(!ForgingStock::insertData($forging_stock_array))
						throw new Exception("Cannot Insert forging stock data", 1);

					//Checks for negative weights
					if(CuttingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the cutting stock", 1);

					else
						DB::commit();
				}
				else
				{

					//Increments the stock data weight on the basis of given heat,size,pressure,type and schedule
					if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($forging_input['heat_no'],$forging_input['standard_size'][$counter],$forging_input['pressure'][$counter],$forging_input['type'][$counter],$forging_input['schedule'][$counter],$forging_input['quantity']))
						throw new Exception("Cannot increment forging data", 1);

					//Decrements the stock data weight on the basis of heat number and size
					if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($final_heat_no,$final_standard_size,$final_pressure,$final_type,$final_schedule,$total_weight))
						throw new Exception("Cannot update weight", 1);

					//Checks for negative weights
					if(CuttingStock::checkZeroWeight())
						throw new Exception("Insufficient weight in the cutting stock", 1);

					else
						DB::commit();
				}
						
			}

		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return 0;
		}

		ForgingStock::deleteNegativeOrNonZeroEntries();
		
		$last_record = Forging::getLastRecord();

		//returning view for confirmation
		return View::make('forging.confirm')->with('last_record',$last_record);


	}

	//Shows the forging update page
	public function update($id)
	{
		
		$forging_array = Forging::getRecord($id);
		//getting standard master values from respective models
		$data = ForgingController::getStandardData();

		return View::make('forging.forging_update')
				->with('forging',$forging_array[0])
				->with($data);

	}

	//Allows the forging update data
	public function update_store($id)
		{
		
		$forging = Input::all();

		$total_weight = $forging['weight_per_peice']*$forging['quantity'];

		//Split the components as they are hyphenated (new)
		$final_heat_no = explode("-",$forging['heat_no'])[0];
		$final_standard_size = explode("-",$forging['heat_no'])[1];
		$final_pressure = explode("-",$forging['heat_no'])[2];
		$final_type = explode("-",$forging['heat_no'])[3];
		$final_schedule = explode("-",$forging['heat_no'])[4];


		//Split the components as they are hyphenated (old)
		$old_heat_no = explode("-",$forging['old_heat_no'])[0];
		$old_standard_size = explode("-",$forging['old_heat_no'])[1];
		$old_pressure = explode("-",$forging['old_heat_no'])[2];
		$old_type = explode("-",$forging['old_heat_no'])[3];
		$old_schedule = explode("-",$forging['old_heat_no'])[4];


		$old_quantity = $forging['old_quantity'];
		$old_weight_per_piece = $forging['old_weight_per_piece'];
		$old_weight = $old_quantity * $old_weight_per_piece;

		$forging_array = array(
					'date'		=> date('Y-m-d',strtotime($forging['date'])),
					'weight_per_piece'=>$forging['weight_per_peice'],
					'heat_no'		=> $final_heat_no,
					'cutting_size' => $final_standard_size,
					'cutting_type' =>	$final_type,
					'cutting_pressure' => $final_pressure,
					'cutting_schedule' => $final_schedule,
					'size' => implode(",",$forging['standard_size']),
					'pressure' => implode(",",$forging['pressure']),
					'type' => implode(",",$forging['type']),
					'schedule' => implode(",",$forging['schedule']),
					'quantity'		=> $forging['quantity'],
					'total_weight'	=> $total_weight,
					'remarks'     => $forging['remarks'],
					'available_weight_forging' => $total_weight
					);


			Forging::updateAllData($forging['forging_id'],$forging_array);

		DB::beginTransaction();

		try
		{
			//Increment the data from the cutting stock depending on the old heat,size,pressure,type,schedule
			if(!CuttingStock::incrementHeatSizePressureTypeScheduleData($old_heat_no,$old_standard_size,$old_pressure,$old_type,$old_schedule,$old_weight))
				throw new Exception("Cannot update weight", 1);

			//Decrement the data from the cutting stock depending on the new heat,size,pressure,type,schedule
			if(!CuttingStock::decrementHeatSizePressureTypeScheduleData($final_heat_no,$final_standard_size,$final_pressure,$final_type,$final_schedule,$total_weight))
				throw new Exception("Cannot update weight", 1);

			//Decrement of the old data for forging
			for($counter = 0; $counter < count(explode(",",$forging['old_standard_size'])); $counter++)
			{
			
				if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($old_heat_no,explode(",",$forging['old_standard_size'])[$counter],explode(",",$forging['old_pressure'])[$counter],explode(",",$forging['old_type'])[$counter],explode(",",$forging['old_schedule'])[$counter],$old_quantity))
					throw new Exception("Cannot decrement forging stock data",1);

				else
					DB::commit();
			}


			for($counter = 0; $counter < count($forging['standard_size']); $counter++)
			{
			
					$forging_stock_array = array(
							'heat_no' => $final_heat_no,
							'size' => $forging['standard_size'][$counter],
							'pressure' => $forging['pressure'][$counter],
							'type' => $forging['type'][$counter],
							'schedule' => $forging['schedule'][$counter],
							'available_quantity_forging' => $forging['quantity']
					);

			//Checks if the stock of given heat,size,pressure,type and schedule present or not
			$whether_stock_present = ForgingStock::getHeatSizePressureTypeScheduleData($final_heat_no,$forging['standard_size'][$counter],$forging['pressure'][$counter],$forging['type'][$counter],$forging['schedule'][$counter]);

				if(!$whether_stock_present)
			{
				//Insert the new forging stock array data
				if(!ForgingStock::insertData($forging_stock_array))
					throw new Exception("Cannot insert forging stock data",1);

				//Checks the negative weights
				if(CuttingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the raw material stock", 1);

				else
					DB::commit();
			}
			else
			{
				//Increment the data from the forging stock depending on the new heat,size,pressure,type,schedule
				if(!ForgingStock::incrementHeatSizePressureTypeScheduleData($final_heat_no,$forging['standard_size'][$counter],$forging['pressure'][$counter],$forging['type'][$counter],$forging['schedule'][$counter],$forging['quantity']))
					throw new Exception("Cannot increment forging stock data",1);

				//Checks the negative weights
				if(CuttingStock::checkZeroWeight())
					throw new Exception("Insufficient weight in the raw material stock", 1);

				else
					DB::commit();
			}
			}

		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return $e;
		}

		//delete forging negative and zero entries
		ForgingStock::deleteNegativeOrNonZeroEntries();

		$get_record_array= Forging::getRecord($forging['forging_id']);
		return View::make('forging.confirm_forging_update')->with('confirmations',$get_record_array);
	}

	public function show()
	{
		//this functions shows all forging records for forging reports
		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')->with('forging_data',$forging_data);
	}

	//Shows all the material that is available in the current stock
	public function available()
	{
		$data= ForgingStock::availableQuantity();
		return View::make('forging.available')
				->with('data',$data);
	}

	//Generates the excel data for forging
	public function excel()
	{

		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report_excel')->with('forging_data',$forging_data);
	}

	//Deletes the particular records for the forging
	public function destroy($id)
	{
		$forging_response = Forging::getRecord($id);
		$total_weight = $forging_response[0]->weight_per_piece * $forging_response[0]->quantity;

		DB::beginTransaction();
			try
			{
				// //Increments the cutting stock data on basis of given heat,size,pressure,type and schedule
				if(!CuttingStock::incrementHeatSizePressureTypeScheduleData($forging_response[0]->heat_no,$forging_response[0]->cutting_size,$forging_response[0]->cutting_pressure,$forging_response[0]->cutting_type,$forging_response[0]->cutting_schedule,$total_weight))
					throw new Exception("Cannot not increment data for cutting stock", 1);

				//Decrements the forging stock data weight on the basis of given heat,size,pressure,type and schedule
				for($counter = 0; $counter < count(explode(",",$forging_response[0]->size)); $counter++)
				{
				
					if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($forging_response[0]->heat_no,explode(",",$forging_response[0]->size)[$counter],explode(",",$forging_response[0]->pressure)[$counter],explode(",",$forging_response[0]->type)[$counter],explode(",",$forging_response[0]->schedule)[$counter],$forging_response[0]->quantity))
						throw new Exception("Cannot decrement forging stock data",1);
				}
					
				//Delete the forging records specified by the id
				if(!Forging::delete_record($id))
					throw new Exception("Cannot delete forging record", 1);

				else
					DB::commit();
					
			}
			catch(Exception $e)
			{
				DB::rollback();
				echo $e->getMessage();
				return 0;
			}


		$forging_data = Forging::getAllRecords();

		return View::make('forging.forging_report')->with('forging_data',$forging_data);

	}

	//Returns the search view in the search panel
	public function search_display()
    {
        return View::make('search.forging_search')->with('data',Forging::getAllRecords());
    }

}