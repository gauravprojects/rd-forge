<?php

class cuttingPageController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// returns cutting form page

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
		// stores data coming from cutting form

		$cutting= Input::all();

		// date from machine
		$date=date("Y-m-d");

		// calculating required total weight
		$total_weight= $cutting['quantity'] * $cutting['wpp'];


		// array for table cutting records
		$input_array=array(	
			'date' => $date,
			'raw_mat_size' => $cutting['size'],
			'heat_no' => $cutting['heatNo'],
			'quantity' => $cutting['quantity'],
			'weight_per_piece' => $cutting['wpp'],
			'total_weight' => $total_weight,
		);

		//recods for log book

		//details
		$details='Heat no: '.$cutting['heatNo'].' Quantity: '.$cutting['quantity'].' Weight per piece: '.$cutting['wpp'].
			' Total '.$total_weight;

		$log_array= array(
			'date' => date("Y-m-d"),
			'time' => date("h:i:s"),
			'category'=>'Cutting',
			'details'=>$details,
			);

		Logbook::insertData($log_array);

		// getting the cutting id of the record entered
		//	this will serve as primary key for other tables for cutting records


		Cutting::insertData($input_array);
		$last_record = Cutting::getLastRecord();

		//array for cutting item description

		$cutting_des_array = array( 'cutting_id' => $last_record->cutting_id, 'item_des' => $cutting['CutDes'] );
		// array for cutting remarks table

		$cutting_rem_array = array( 'cutting_id' => $last_record->cutting_id, 'remarks' => $cutting['cutRem'] );

		//Separate models
		
		CuttingDes::insertData($cutting_des_array);
		CuttingRem::insertData($cutting_rem_array);


		return View::make('cutting.confirm')->with('last_record',$last_record);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		// showing report for cutting material
		// can be found inside admin pannel

		$last_record=DB::table('cutting_records')->select()->get();
		return View::make('cutting.cutting_report')->with('last_record',$last_record);
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

	public function excel()
	{
		// sending full data for excel
		// using joins.....

		//	 PROBLEM LIES HERE

		$data= DB::table('cutting_records')
			->leftjoin('cutting_item_des', 'cutting_records.cutting_id', '=', 'cutting_item_des.cutting_id')
			->leftjoin('cutting_remarks', 'cutting_records.cutting_id', '=', 'cutting_remarks.cutting_id')
			//->whereNULL('cutting_remarks.cutting_id')
			->select()
			->get();


		return View::make('cutting.cutting_report_excel')->with('cutting',$data);

	}


}
