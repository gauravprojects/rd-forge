<?php

class cuttingPageController extends \BaseController {

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
		$input_array=array(	'date'=>$date,
			'raw_mat_size'=>$cutting['size'],
			'heat_no'=>$cutting['heatNo'],
			'quantity'=>$cutting['quantity'],
			'weight_per_piece'=>$cutting['wpp'],
			'total_weight'=>$total_weight,
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

		$input_table_logbook= DB::table('logbook')->insert($log_array);

		// getting the cutting id of the record entered
		//	this will serve as primary key for other tables for cutting records


		$input_table1= DB::table('cutting_records')->insert($input_array);
		$last_record=DB::table('cutting_records')->orderBy('cutting_id', 'desc')->first();

		//array for cutting item description

		$input_array2= array( 'cutting_id' => $last_record->cutting_id,
			'item_des'   => $cutting['CutDes'] );


		// array for cutting remarks table

		$input_array3= array( 'cutting_id' => $last_record->cutting_id,
			'remarks'   => $cutting['cutRem'] );

		$input_table2= DB::table('cutting_item_des')->insert($input_array2);
		$input_table3= DB::table('cutting_remarks')->insert($input_array3);



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
