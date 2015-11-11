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
		public function index()
		{
			//testing for empty array
			$dataArray = Cutting::returnNullData();

			// returns cutting form page
			//all data form master table is taken and fed to the  cutting form
			$sizes = Sizes::getSizes();
			$heat_no = RawMaterial::getHeatNo();
			$standard_sizes = StandardSizes::getStandardSizes();
			$pressure = Pressure::getPressure();
			$schedule = Schedule::getSchedule();
			$type = DescriptionType::getType();
			return View::make('cutting.cut')
					->with('sizes', $sizes)
					->with('dataArray', $dataArray)
					->with('heat_no', $heat_no)
					->with('standard_size', $standard_sizes)
					->with('pressure', $pressure)
					->with('schedule', $schedule)
					->with('type', $type);
		}


		public function store()
		{
			// stores data coming from cutting form

			$cutting = Input::all();

			// calculating required total weight
			$total_weight = $cutting['quantity'] * $cutting['wpp'];


			// array for table cutting records
			$input_array = array(
					'date' => $cutting['date'],
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


			$data = RawMaterial::returnAvailableWeight($cutting['heatNo']);
			$available_weight = $data[0]->available_weight;

			$available_weight = $available_weight - $total_weight;
			//$available_weight_array= array('available_weight' => $available_weight );
			$available_weight_response = RawMaterial::updateAvailableWeight($cutting['heatNo'], $available_weight);

			DB::beginTransaction();
			try {

				$cutting_response = Cutting::insertData($input_array);
				$last_record = Cutting::getLastRecord();

				//array for cutting item description

				$cutting_des_array = array('cutting_id' => $last_record->cutting_id, 'item_des' => $cutting['CutDes']);
				// array for cutting remarks table

				$cutting_rem_array = array('cutting_id' => $last_record->cutting_id, 'remarks' => $cutting['cutRem']);

				//Separate models

				$cutting_des_response = CuttingDes::insertData($cutting_des_array);

				$cutting_rem_response = CuttingRem::insertData($cutting_rem_array);

				if ($cutting_des_response && $cutting_rem_response && $cutting_response) {

					//successful
					DB::commit();
				}

			} catch (\Exception $e) {
				DB::rollback();
				return Redirect::to('/cutting')
						->withErrors($e->getErrors())
						->withInput();
			}
			return View::make('cutting.confirm')->with('last_record', $last_record);

		}

		public function show()
		{
			// showing report for cutting material
			// can be found inside admin pannel

			$last_record = Cutting::getLastRecord();
			return View::make('cutting.cutting_report')->with('last_record', $last_record);
		}


		public function excel()
		{
			// sending full data for excel
			// using joins.....

			//	 PROBLEM LIES HERE

			$data = DB::table('cutting_records')
					->leftjoin('cutting_item_des', 'cutting_records.cutting_id', '=', 'cutting_item_des.cutting_id')
					->leftjoin('cutting_remarks', 'cutting_records.cutting_id', '=', 'cutting_remarks.cutting_id')
					//->whereNULL('cutting_remarks.cutting_id')
					->select()
					->get();


			return View::make('cutting.cutting_report_excel')->with('cutting', $data);

		}


		public function update($id)
		{
			//get all cutting details of the given id in a variable

			//------------ PROBLEM-------------------------------
			// Here the issue is that, $dataArray is able to return data to the cut blade for update
			// but in select html tags I am not able to give "selected" attribute.. so instead it is showing all values

			$dataArray = Cutting::getUpdateData($id);
			$dataArray = (array)$dataArray[0];

			//upate function
			// route is /cutting/update
			$sizes = Sizes::getSizes();
			$heat_no = RawMaterial::getHeatNo();
			$standard_sizes = StandardSizes::getStandardSizes();
			$pressure = Pressure::getPressure();
			$schedule = Schedule::getSchedule();
			$type = DescriptionType::getType();
			return View::make('cutting.cut')
					->with('sizes', $sizes)
					->with('heat_no', $heat_no)
					->with('standard_size', $standard_sizes)
					->with('pressure', $pressure)
					->with('schedule', $schedule)
					->with('type', $type)
					->with('dataArray', $dataArray);

		}

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
			$data= Cutting::availableCutting();
			return View::make('cutting.available')
					->with('data',$data);
		}
	}
