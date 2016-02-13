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
			$availableWorkOrder= WorkOrder::availableWorkOrderNo();
			$grades= Grades::getGrades();
			$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
			return View::make('serration.serration')
					->with('grades',$grades)
					->with('availableWorkOrderNo',$availableWorkOrder)
					->with('heat_no',$heatNo_available_forging_weight);
		}

		public function store()
		{
			$input_data= Input::all();

			$input_array_serration_table= array(
				'date' => date('Y-m-d'),
				'work_order_no' => $input_data['work_order_no'] ,
				'item'  	=> $input_data['item'],
				'heat_no'	=> $input_data['heat_no'],
				'quantity'	=>$input_data['quantity'],
				'machine_name'=>$input_data['machine_name'],
				'grade' => $input_data['grade'],
				'remarks' => $input_data['remarks']
			);

			$input_response_serration_table=Serration::insertData($input_array_serration_table);

			//get last record

			$last_record=Serration::getLastRecord();

			// now insert remarks data using the mach_id obtained form last record

			// $input_array_serration_remarks= array(
			// 	'serration_id' => $last_record->serration_id,
			// 	'remarks' => $input_data['remarks']
			// );

			// $input_response_serration_remarks= Serration::insertRemarks($input_array_serration_remarks);

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
			$availableWorkOrder= WorkOrder::availableWorkOrderNo();
				$grades = Grades::getGrades();
			$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
				//$heat_no = RawMaterial::getHeatNo();

				return View::make('serration.serration_update')
				->with('serration_array',$serration_array)
				->with('grades',$grades)
				->with('availableWorkOrderNo',$availableWorkOrder)
				->with('heat_no',$heatNo_available_forging_weight);
		}


		public function update_store($id)
		{
			
			$serration = Input::all();

			$data_array_update = array(
						'work_order_no' => $serration['work_order_no'] ,
						'item'  	=> $serration['item'],
						'heat_no'	=> $serration['heat_no'],
						'quantity'	=>$serration['quantity'],
						'machine_name'=>$serration['machine_name'],
						'grade' => $serration['grade'],
						'weight'	=> $serration['weight'],
						'remarks'=> $serration['remarks']
						);

			$update_response= DB::table('serration_records')
								->where('serration_id',$serration['serration_id'])
								->update($data_array_update);


			$get_record_array= Serration::getRecord($serration['serration_id']);
			return View::make('serration.confirm_serration_update')->with('confirmations',$get_record_array);
		}


		public function excel()
		{
			$all_data=Serration::getAllData();
			return View::make('serration.serration_report_excel')->with('data',$all_data);

		}

		public function destroy($id)
		{
			$delete_response= Serration::deleteRecord($id);
			$all_data=Serration::getAllData();
			return View::make('serration.serration_report')->with('data',$all_data);
		}

		public function search_display()
	    {
	        return View::make('search.serration_search')->with('data',Serration::getAllData());
	    }

	}