<?php

class cuttingPageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('cutting.cut');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$cutting= Input::all();
		$date=date("Y-m-d");
		$total_weight= $cutting['quantity'] * $cutting['wpp'];



//		array(7) { ["_token"]=> string(40) "QYrZlT1pUtzQRmeSHq3rscKOuXGjd2qcAixzvAPl" ["size"]=> string(3) "100"
//		["heatNo"]=> string(0) "" ["quantity"]=> string(0) ""
//		["wpp"]=> string(0) "" ["CutDes"]=> string(0) "" ["cutRem"]=> string(0) "" }

		$input_array=array(	'date'=>$date,
							'raw_mat_size'=>$cutting['size'],
							'heat_no'=>$cutting['heatNo'],
							'quantity'=>$cutting['quantity'],
							'weight_per_piece'=>$cutting['wpp'],
							'total_weight'=>$total_weight,
							);

		$input_table1= DB::table('cutting_records')->insert($input_array);

		dd($input_response);
		dd($input_array);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
