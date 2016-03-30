<?php

class machiningController extends BaseController
{

	public static function getStandardData()
		{
			$sizes = Sizes::getSizes();
			$heat_no = ForgingStock::getHeatNo();
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
		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		$heat_no = ForgingStock::getHeatNo();
		return View::make('machining.machine')
				->with('grades',$grades)
				->with('heat_no',$heat_no)
				->with('availableWorkOrderNo',$availableWorkOrder);
	}

	public function store()
	{
		$machining_input = Input::all();

		$final_heat_no = explode("-",$machining_input['heat_no'])[0];
		$final_size = explode("-",$machining_input['heat_no'])[1];
		$final_pressure = explode("-",$machining_input['heat_no'])[2];
		$final_type = explode("-",$machining_input['heat_no'])[3];
		$final_schedule = explode("-",$machining_input['heat_no'])[4];

		$machining_array= array(
				'date' => date('Y-m-d',strtotime($machining['date'])),
				'work_order_no' => $machining['work_order_no'] ,
				'item'  	=> $machining['item'],
				'heat_no'	=> $final_heat_no,
				'quantity'  => $machining['quantity'],
				'machine_name'=>$machining['machine_name'],
				'grade' => $machining['grade'],
				'weight'	=> $machining['weight'],
				'remarks'=> $machining['remarks']
		);

		$work_order_material_details = WorkOrder::getRecordFromItem($machining['work_order_no'],$machining['item']);
		$work_order_material_details = $work_order_material_details[0];

		DB::beginTransaction();

		try
		{
			if(!Machining::insertData($machining_array))
				throw new Exception("Could not insert machining data",1);

			if(!ForgingStock::decrementHeatSizePressureTypeScheduleData())
				throw new Exception("Could not deduct forging data",1);

			else
				DB::commit();
		}
		catch(Exception $e)
		{
			DB::rollback();
			return 0;
		}
		//get last record

		$last_record = Machining::getLastRecord();

		return View::make('machining.confirm')->with('last_record',$last_record);

	}

	public function show()
	{
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);
	}

	public function excel()
	{

		$all_data=Machining::getAllData();
		return View::make('machining.machining_report_excel')->with('data',$all_data);
	}

	public function update($id)
	{
			$machining_array = Machining::getRecord($id);

			$grades = Grades::getGrades();
			$heat_no = RawMaterial::getHeatNo();

		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		$grades= Grades::getGrades();
		$heatNo_available_forging_weight= Drilling::HeatNo_availableWeightForging();
		return View::make('machining.machining_update')
			->with('grades',$grades)
			->with('heat_no',$heatNo_available_forging_weight)
			->with('availableWorkOrderNo',$availableWorkOrder)
			->with('machining_array',$machining_array);

	}


	public function update_store($id)
	{
		
		$machining = Input::all();

		$data_array_update = array(
					'work_order_no' => $machining['work_order_no'] ,
					'item'  	=> $machining['item'],
					'heat_no'	=> $machining['heat_no'],
					'quantity'	=>$machining['quantity'],
					'machine_name'=>$machining['machine_name'],
					'grade' => $machining['grade'],
					'weight'	=> $machining['weight'],
					'remarks'=> $machining['remarks']
					);

		$update_response= DB::table('machining_records')
							->where('machining_id',$machining['machining_id'])
							->update($data_array_update);


		$get_record_array= Machining::getRecord($machining['machining_id']);
		return View::make('machining.confirm_machining_update')->with('confirmations',$get_record_array);
	}

	public function destroy($id)
	{
		$delete_response= Machining::deleteRecord($id);
		$all_data= Machining::getAllData();
		return View::make('machining.machining_report')->with('data',$all_data);

	}

	public function search_display()
    {
        return View::make('search.machining_search')->with('data',Machining::getAllData());
    }

}
