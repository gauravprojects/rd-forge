<?php

class ForgingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /forging
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('forging.forge');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /forging/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /forging
	 *
	 * @return Response
	 */
	public function store()
	{
		$forging_input= Input::all();

		//calculation for total wieght= weight per peice * quantity
		$total_weight= $forging_input['weight_per_peice']*$forging_input['quantity'];

		// forging array for input
		$forging_array= array(
						'date'		=> date("Y-m-d"),
						'forged_des'=> $forging_input['forged_des'],
						'weight_per_piece'=>$forging_input['weight_per_peice'],
						'heat_no'		=> $forging_input['heat_no'],
						'quantity'		=> $forging_input['quantity'],
						'total_weight'	=> $total_weight
		);
		$input_response= DB::table('forging_records')->insert($forging_array);

		// now getting the last record for getting forging_id
		$last_record=DB::table('forging_records')->orderBy('forging_id', 'desc')->first();

		//now array for the other table
		$forging_array2= array(
			'forging_id' => $last_record->forging_id,
			'remarks'	=> $forging_input['remarks']
		);

		$input_response2= DB::table('forging_remarks')->insert($forging_array2);

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
		$forging_data= DB::table('forging_records')->select()->get();
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
		$data= DB::table('forging_records')
			->leftjoin('forging_remarks', 'forging_records.forging_id', '=', 'forging_remarks.forging_id')
			->select()
			->get();


		return View::make('forging.forging_report_excel')->with('forging_data',$data);
	}

}