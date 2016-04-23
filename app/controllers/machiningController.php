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

		$machining_heat_no = explode("-",$machining_input['heat_no'])[0];
		$forging_size = explode("-",$machining_input['heat_no'])[1];
		$forging_pressure = explode("-",$machining_input['heat_no'])[2];
		$forging_type = explode("-",$machining_input['heat_no'])[3];
		$forging_schedule = explode("-",$machining_input['heat_no'])[4];

		$work_order_no = explode("-",$machining_input['item'])[0];
		$work_order_item_no = explode("-",$machining_input['item'])[1];
		$work_order_size = explode("-",$machining_input['item'])[2];
		$work_order_pressure = explode("-",$machining_input['item'])[3];
		$work_order_type = explode("-",$machining_input['item'])[4];
		$work_order_schedule = explode("-",$machining_input['item'])[5];

		$machining_array= array(
				'date' => date('Y-m-d',strtotime($machining_input['date'])),
				'work_order_no' => $work_order_no,
				'item'  	=> $work_order_item_no,
				'heat_no'	=> $machining_heat_no,
				'forging_size' => $forging_size,
				'forging_pressure' => $forging_pressure,
				'forging_type' => $forging_type,
				'forging_schedule' => $forging_schedule,
				'quantity'  => $machining_input['quantity'],
				'machine_name'=>$machining_input['machine_name'],
				'grade' => $machining_input['grade'],
				'weight'	=> $machining_input['weight'],
				'remarks'=> $machining_input['remarks']
		);

		$machining_work_order_stock_array = array(

			'work_order_no' => $work_order_no,
			'item'  	=> $work_order_item_no,
			'size' => $work_order_size,
			'pressure' => $work_order_pressure,
			'type' =>	$work_order_type,
			'schedule' =>	$work_order_schedule,
			'quantity'  => $machining_input['quantity'],
			'weight'	=> $machining_input['weight']

			);

		// $work_order_material_details = WorkOrder::getRecordFromItem($work_order_no,$work_order_item_no);
		// $work_order_material_details = $work_order_material_details[0];

		DB::beginTransaction();

		try
		{
			if(!Machining::insertData($machining_array))
				throw new Exception("Could not insert machining data",1);

			if(!MachiningStock::insertData($machining_work_order_stock_array))
				throw new Exception("Could not insert machining data",1);

			if(!ForgingStock::decrementHeatSizePressureTypeScheduleData($machining_heat_no,$forging_size,$forging_pressure,$forging_type,$forging_schedule,$machining_input['quantity']))
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
		$heat_no = ForgingStock::getHeatNo();

		// shows index page for machining form
		$availableWorkOrder= WorkOrder::availableWorkOrderNo();
		return View::make('machining.machining_update')
			->with('grades',$grades)
			->with('heat_no',$heat_no)
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
