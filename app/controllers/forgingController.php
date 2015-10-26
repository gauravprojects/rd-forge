<?php

class ForgingController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /forging
	 *
	 * @return Response
	 */
	public function index()
	{
		$sizes= Sizes::getSizes();
		$heat_no= RawMaterial::getHeatNo();
		$standard_sizes= StandardSizes::getStandardSizes();
		$pressure= Pressure::getPressure();
		$schedule= Schedule::getSchedule();
		$type= DescriptionType::getType();
		return View::make('forging.forge')
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

		$total_weight= $forging_input['weight_per_peice']*$forging_input['quantity'];

		// forging array for input
		$forging_array= array(
						'date'		=> $forging_input['date'],
						'forged_des'=> $forging_input['forged_des'],
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

	/**
	 * Display the specified resource.
	 * GET /forging/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')->with('forging_data',$forging_data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /forging/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /forging/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /forging/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function excel()
	{


		$users =DB::select(DB::raw("SELECT *,'' AS 'tingu','' AS 'records' FROM forging_records p WHERE NOT EXISTS (SELECT * FROM forging_remarks WHERE p.forging_id = forging_remarks.forging_id) AND NOT EXISTS (SELECT * FROM forging_remarks WHERE forging_remarks.forging_id IS NULL) union (select * from `forging_records` left join `forging_remarks` on `forging_records`.`forging_id` = `forging_remarks`.`forging_id` where `forging_remarks`.`forging_id` is not null) order by(forging_id)")
		);
	//dd($users);
		return View::make('forging.forging_report_excel')->with('forging_data',$users);
	}

}