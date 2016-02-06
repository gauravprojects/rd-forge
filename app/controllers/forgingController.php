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
		$heat_no = Cutting::getHeatNo();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		$grades=Grades::getGrades();
		$manufacturers= Manufactures::getManufactures();

		return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,'sizes'=>$sizes,
			'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type,'grades'=>$grades,'manufacturers'=>$manufacturers);

	}


	public function index()
	{
		//getting null array
		$dataArray= Forging::getNullArray();

		//getting standard master values from respective models
		$data = ForgingController::getStandardData();

		return View::make('forging.forge')
			->with('dataArray',$dataArray)
			->with($data);
	}

	public function store()
	{
		$forging_input= Input::all();

		// calculating total_weight
		$total_weight= $forging_input['weight_per_peice']*$forging_input['quantity'];

		// forging array for input
		$forging_array= array(
				'date'		=> date('d-m-y',strtotime($forging_input['date'])),
				'weight_per_piece'=>$forging_input['weight_per_peice'],
				'heat_no'		=> $forging_input['heatNo'],
				'size' =>$forging_input['standard_size'],
				'pressure' => $forging_input['pressure'],
				'type' => $forging_input['type'],
				'schedule' => $forging_input['schedule'],
				'quantity'		=> $forging_input['quantity'],
				'total_weight'	=> $total_weight,
				'remarks'     => $forging_input['remarks'],
				'available_weight_forging' => $total_weight
		);
		
		Forging::insertData($forging_array);


		// now we have to subtract this forged item total weight from cutting_records available_weight_cutting
		//   	TO BE DONE HERE ---------------------------------------------------------------

			$available_weight_cutting= Forging::getAvailableWeight($forging_input['heatNo']);
			$available_weight_cutting= (array) $available_weight_cutting[0];
			$available_weight_cutting= $available_weight_cutting['available_weight_cutting'];

			$available_weight_cutting= $available_weight_cutting- $total_weight;
			Forging::updateCuttingWeight($forging_input['heatNo'],$available_weight_cutting);

		// now getting the last record for getting forging_id
		$last_record = Forging::getLastRecord();


		//returning view for confirmation
		return View::make('forging.confirm')->with('last_record',$last_record);


	}

	public function update($id)
	{
		
		$forging_array = Forging::getRecord($id);
		//getting standard master values from respective models
		$data = ForgingController::getStandardData();

		return View::make('forging.forging_update')
				->with('forging_array',$forging_array)
				->with($data);

	}

	public function update_store($id)
		{
		
		$forging = Input::all();

		$total_weight = $forging['weight_per_peice']*$forging['quantity'];

		$data_array_update = array(
					'date'		=> date('d-m-y',strtotime($forging['date'])),
					'weight_per_piece'=>$forging['weight_per_peice'],
					'heat_no'		=> $forging['heatNo'],
					'size' =>$forging['standard_size'],
					'pressure' => $forging['pressure'],
					'type' => $forging['type'],
					'schedule' => $forging['schedule'],
					'quantity'		=> $forging['quantity'],
					'total_weight'	=> $total_weight,
					'remarks'     => $forging['remarks'],
					'available_weight_forging' => $total_weight
					);

		$update_response= DB::table('forging_records')
							->where('forging_id',$forging['forging_id'])
							->update($data_array_update);


		$get_record_array= Forging::getRecord($forging['forging_id']);
		return View::make('forging.confirm_forging_update')->with('confirmations',$get_record_array);
	}

	public function show()
	{
		//this functions shows all forging records for forging reports
		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')->with('forging_data',$forging_data);
	}

	public function availableTotalWeight()
	{

		$wpp = Input::get('wpp');
		$heat_no = Input::get('heat_no');
		$quantity = Input::get('quantity');

		//hence $total_weight
		$total_weight= $wpp * $quantity;

		//now avialbale weight from cutting table for this heat no
		$available_weight= Forging::availableWeight($heat_no);
		$available_weight=(array) $available_weight[0];
		$available_weight= $available_weight['available_weight_cutting'];

		if($available_weight > $total_weight)
			return 1;
		if($available_weight <= $total_weight)
			return 0;
	}

	public function excel()
	{


//		$users =DB::select(DB::raw("SELECT *,'' AS 'tingu','' AS 'records' FROM forging_records p WHERE NOT EXISTS (SELECT * FROM forging_remarks WHERE p.forging_id = forging_remarks.forging_id) AND NOT EXISTS (SELECT * FROM forging_remarks WHERE forging_remarks.forging_id IS NULL) union (select * from `forging_records` left join `forging_remarks` on `forging_records`.`forging_id` = `forging_remarks`.`forging_id` where `forging_remarks`.`forging_id` is not null) order by(forging_id)")
//		);
//	//dd($users);

		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report_excel')->with('forging_data',$forging_data);
	}

	public function destroy($id)
	{
		$delete_response= Forging::delete_record($id);
		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')->with('forging_data',$forging_data);

	}

}