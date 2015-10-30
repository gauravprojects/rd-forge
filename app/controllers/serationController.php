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
			return View::make('seration.seration');
		}



		public function store()
		{
			$input_data= Input::all();

			$input_array_seration_table= array(
				'date' => date("Y-m-d"),
				'work_order_no' => $input_data['work_order_no'] ,
				'item'  	=> $input_data['item'],
				'heat_no'	=> $input_data['heat_no'],
				'quantity'	=>$input_data['quantity'],
				'machine_name'=>$input_data['machine_name'],
				'employee_name'=>$input_data['employee_name'],
				'grade' => $input_data['grade']
			);

			$input_response_seration_table=Seration::insertData($input_array_seration_table);

			//get last record

			$last_record=Seration::getLastRecord();

			// now insert remarks data using the mach_id obtained form last record

			$input_array_seration_remarks= array(
				'seration_id' => $last_record->seration_id,
				'remarks' => $input_data['remarks']
			);

			$input_response_seration_remarks= Seration::insertRemarks($input_array_seration_remarks);

			return View::make('seration.confirm')->with('data',$last_record);
		}

		public function show()
		{
			$all_data=Seration::getAllData();
			return View::make('seration.seration_report')->with('data',$all_data);
		}

		public function excel()
		{
			$all_data=Seration::getAllData();
			return View::make('seration.seration_report_excel')->with('data',$all_data);

		}

	}