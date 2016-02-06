	<?php

	class SerationController extends \BaseController {

		/* ------------------------------- FUNCTIONS USED -----------------------------------------------

		Note-> everywhere I have used the serration as seration, please ignore spelling and used serration as seration
				to avoid any further confusions..................

			name							DESCRIPTION 							  BLADE USED FOR

			index()						to shoe the serration form					seration blade
	*/
		public function index()
		{
			$availableWorkOrder= WorkOrder::availableWorkOrderNo();
			$grades= Grades::getGrades();
			$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
			return View::make('seration.seration')
					->with('grades',$grades)
					->with('availableWorkOrderNo',$availableWorkOrder)
					->with('heat_no',$heatNo_available_forging_weight);
		}

		public function store()
		{
			$input_data= Input::all();

			$input_array_seration_table= array(
				'date' => date('Y-m-d'),
				'work_order_no' => $input_data['work_order_no'] ,
				'item'  	=> $input_data['item'],
				'heat_no'	=> $input_data['heat_no'],
				'quantity'	=>$input_data['quantity'],
				'machine_name'=>$input_data['machine_name'],
				'grade' => $input_data['grade'],
				'remarks' => $input_data['remarks']
			);

			$input_response_seration_table=Seration::insertData($input_array_seration_table);

			//get last record

			$last_record=Seration::getLastRecord();

			// now insert remarks data using the mach_id obtained form last record

			// $input_array_seration_remarks= array(
			// 	'seration_id' => $last_record->seration_id,
			// 	'remarks' => $input_data['remarks']
			// );

			// $input_response_seration_remarks= Seration::insertRemarks($input_array_seration_remarks);

			return View::make('seration.confirm')->with('last_record',$last_record);
		}

		public function show()
		{
			$all_data=Seration::getAllData();
			return View::make('seration.seration_report')->with('data',$all_data);
		}

		public function update($id)
		{
				$seration_array = Seration::getRecord($id);
			$availableWorkOrder= WorkOrder::availableWorkOrderNo();
				$grades = Grades::getGrades();
			$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
				//$heat_no = RawMaterial::getHeatNo();

				return View::make('seration.seration_update')
				->with('seration_array',$seration_array)
				->with('grades',$grades)
				->with('availableWorkOrderNo',$availableWorkOrder)
				->with('heat_no',$heatNo_available_forging_weight);
		}


		public function update_store($id)
		{
			
			$seration = Input::all();

			$data_array_update = array(
						'work_order_no' => $seration['work_order_no'] ,
						'item'  	=> $seration['item'],
						'heat_no'	=> $seration['heat_no'],
						'quantity'	=>$seration['quantity'],
						'machine_name'=>$seration['machine_name'],
						'grade' => $seration['grade'],
						'weight'	=> $seration['weight'],
						'remarks'=> $seration['remarks']
						);

			$update_response= DB::table('seration_records')
								->where('seration_id',$seration['seration_id'])
								->update($data_array_update);


			$get_record_array= Seration::getRecord($seration['seration_id']);
			return View::make('seration.confirm_seration_update')->with('confirmations',$get_record_array);
		}


		public function excel()
		{
			$all_data=Seration::getAllData();
			return View::make('seration.seration_report_excel')->with('data',$all_data);

		}

		public function destroy($id)
		{
			$delete_response= Seration::deleteRecord($id);
			$all_data=Seration::getAllData();
			return View::make('seration.seration_report')->with('data',$all_data);


		}

	}