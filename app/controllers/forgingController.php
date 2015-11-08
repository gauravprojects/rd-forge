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
	public function index()
	{
		//getting null array
		$dataArray= Forging::getNullArray();

		//getting standard master values from respective models
		$sizes= Sizes::getSizes();
		$heat_no= RawMaterial::getHeatNo();
		$standard_sizes= StandardSizes::getStandardSizes();
		$pressure= Pressure::getPressure();
		$schedule= Schedule::getSchedule();
		$type= DescriptionType::getType();
		return View::make('forging.forge')
			->with('dataArray',$dataArray)
			->with('sizes',$sizes)
			->with('heat_no',$heat_no)
			->with('standard_size',$standard_sizes)
			->with('pressure',$pressure)
			->with('schedule',$schedule)
			->with('type',$type);
	}

	public function store()
	{
		$forging_input= Input::all();

		// calculating total_weight
		$total_weight= $forging_input['weight_per_peice']*$forging_input['quantity'];

		// forging array for input
		$forging_array= array(
						'date'		=> $forging_input['date'],
						'weight_per_piece'=>$forging_input['weight_per_peice'],
						'heat_no'		=> $forging_input['heatNo'],
						'size' =>$forging_input['standard_size'],
						'pressure' => $forging_input['pressure'],
						'type' => $forging_input['type'],
						'schedule' => $forging_input['schedule'],
						'quantity'		=> $forging_input['quantity'],
						'total_weight'	=> $total_weight
		);
		
		Forging::insertData($forging_array);

		// now getting the last record for getting forging_id
		$last_record = Forging::getLastRecord();

		//now array for the other table
		$forging_remarks_array = array(
			'forging_id' => $last_record->forging_id,
			'remarks'	=> $forging_input['remarks']
		);

		ForgingRem::insertData($forging_remarks_array);

		//returning view for confirmation
		return View::make('forging.confirm')->with('confirmation',$last_record);


	}

	public function update($id)
	{
		$dataArray= Forging::getData($id);
		$dataArray= (array)$dataArray[0];
		//getting standard master values from respective models
		$sizes= Sizes::getSizes();
		$heat_no= RawMaterial::getHeatNo();
		$standard_sizes= StandardSizes::getStandardSizes();
		$pressure= Pressure::getPressure();
		$schedule= Schedule::getSchedule();
		$type= DescriptionType::getType();
		return View::make('forging.forge')
				->with('dataArray',$dataArray)
				->with('sizes',$sizes)
				->with('heat_no',$heat_no)
				->with('standard_size',$standard_sizes)
				->with('pressure',$pressure)
				->with('schedule',$schedule)
				->with('type',$type);

	}

	public function show()
	{
		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')->with('forging_data',$forging_data);
	}

	public function excel()
	{


		$users =DB::select(DB::raw("SELECT *,'' AS 'tingu','' AS 'records' FROM forging_records p WHERE NOT EXISTS (SELECT * FROM forging_remarks WHERE p.forging_id = forging_remarks.forging_id) AND NOT EXISTS (SELECT * FROM forging_remarks WHERE forging_remarks.forging_id IS NULL) union (select * from `forging_records` left join `forging_remarks` on `forging_records`.`forging_id` = `forging_remarks`.`forging_id` where `forging_remarks`.`forging_id` is not null) order by(forging_id)")
		);
	//dd($users);
		return View::make('forging.forging_report_excel')->with('forging_data',$users);
	}

}