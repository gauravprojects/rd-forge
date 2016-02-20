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

			return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,
				'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type);

		}

		public function index()
		{
			//testing for empty array
			$dataArray = Cutting::returnNullData();

			// returns cutting form page
			//all data form master table is taken and fed to the  cutting form
			
			$data = cuttingPageController::getStandardData();

			return View::make('cutting.cut')
					->with($data)
					->with('dataArray', $dataArray);
		}

		public function store()
		{
			// stores data coming from cutting form

			$cutting = Input::all();

			// calculating required total weight
			$total_weight = $cutting['quantity'] * $cutting['wpp'];


			$cutting_stock_array = array(	
					'heat_no' => $cutting['heatNo'],
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'available_weight_cutting' => $total_weight
				);
		
			$cutting_stock_data = CuttingStock::getAllData($cutting);

			if($cutting_stock_data)
				CuttingStock::incrementWeight($cutting_stock_array,$total_weight);
			else
				CuttingStock::insertData($cutting_stock_array);

			$just_added_stock = CuttingStock::getLastRecord();

			// array for table cutting records
			$cutting_array = array(
					'stock_id' => $just_added_stock->stock_id,
					'date' => date('Y-m-d',strtotime($cutting['date'])),
					'raw_mat_size' => $cutting['size'],
					'heat_no' => $cutting['heatNo'],
					'size' => $cutting['standard_size'],
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

			$cutting_response = Cutting::insertData($cutting_array);

			RawMaterialStock::updateAvailableWeight($cutting['heatNo'], $total_weight);
			$last_record = Cutting::getLastRecord();
	
			return View::make('cutting.confirm')->with('last_record', $last_record);

		}

		public function show()
		{
			// showing report for cutting material
			// can be found inside admin pannel

			$all_records= Cutting::getAllRecords();
			return View::make('cutting.cutting_report')->with('all_records', $all_records);
		}

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

		$cutting_array = array(
					'date' => date('Y-m-d',strtotime($cutting['date'])),
					'raw_mat_size' => $cutting['size'],
					'heat_no' => $cutting['heatNo'],
					'size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'quantity' => $cutting['quantity'],
					'weight_per_piece' => $cutting['wpp'],
					'total_weight' => $total_weight,
					'available_weight_cutting' =>$total_weight
					);

		$cutting_stock_array = array(	
					'heat_no' => $cutting['heatNo'],
					'standard_size' => $cutting['standard_size'],
					'pressure' => $cutting['pressure'],
					'type' => $cutting['type'],
					'schedule' => $cutting['schedule'],
					'available_weight_cutting' => $total_weight
				);

		Cutting::updateAllData($cutting['cutting_id'],$cutting_array);
		CuttingStock::updateAllData($cutting['stock_id'],$cutting_stock_array);


		$get_record_array = Cutting::getRecord($cutting['cutting_id']);
		return View::make('cutting.confirm_cutting_update')->with('confirmations',$get_record_array);
	}

		public function excel()
		{

			$all_records= Cutting::getAllRecords();
			return View::make('cutting.cutting_report_excel')->with('all_records', $all_records);

		}

		


		// public function update($id)
		// {
		// 	//get all cutting details of the given id in a variable

		// 	//------------ PROBLEM-------------------------------
		// 	// Here the issue is that, $dataArray is able to return data to the cut blade for update
		// 	// but in select html tags I am not able to give "selected" attribute.. so instead it is showing all values

		// 	$dataArray = Cutting::getUpdateData($id);
		// 	$dataArray = (array)$dataArray[0];

		// 	//upate function
		// 	// route is /cutting/update
		// 	$sizes = Sizes::getSizes();
		// 	$heat_no = RawMaterial::getHeatNo();
		// 	$standard_sizes = StandardSizes::getStandardSizes();
		// 	$pressure = Pressure::getPressure();
		// 	$schedule = Schedule::getSchedule();
		// 	$type = DescriptionType::getType();
		// 	return View::make('cutting.cut')
		// 			->with('sizes', $sizes)
		// 			->with('heat_no', $heat_no)
		// 			->with('standard_size', $standard_sizes)
		// 			->with('pressure', $pressure)
		// 			->with('schedule', $schedule)
		// 			->with('type', $type)
		// 			->with('dataArray', $dataArray);

		// }

		public function availableTotalWeight()
		{
			$wpp = Input::get('wpp');
			$heat_no = Input::get('heat_no');
			$quantity = Input::get('quantity');

			$response = Cutting::availabeWeight($heat_no);
			$response = (array)$response[0];
			$available_weight = $response['available_weight'];
			$total_weight = $wpp * $quantity;
			if ($total_weight > $available_weight)
				return 0;
			if ($total_weight < $available_weight)
				return 1;
		}


		public function available()
		{
			$data= CuttingStock::availableCutting();
			return View::make('cutting.available')
					->with('data',$data);
		}


		public function destroy($id)
		{
			$cutting_response = Cutting::getRecord($id);

			$total_weight = $cutting_response[0]->weight_per_piece * $cutting_response[0]->quantity;

			$data = RawMaterialStock::returnAvailableWeight($cutting_response[0]->heat_no);
			$available_weight = $data[0]->available_weight;

			$available_weight = $available_weight + $total_weight;
			$available_weight_response = RawMaterialStock::updateAvailableWeight($cutting_response[0]->heat_no, $available_weight);

			$delete_response = Cutting::delete_record($id);
			$all_records = Cutting::getAllRecords();

			return View::make('cutting.cutting_report')->with('all_records', $all_records);

		}

		public function search_display()
	    {
	        return View::make('search.cutting_search')->with('data',Cutting::getAllData());
	    }
	}
