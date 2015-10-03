<?php

class rawMaterialController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('rawMaterial.raw');
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
		$date=date("Y-m-d");
		$data= Input::all();
		$data_array=array(
			'receipt_code' => $data['receiptCode'],
			'date'=>$date,
			'size'=>$data['size'],
			'manufacturer'=>$data['Manufacturer'],
			'heat_no'=>$data['heatNo'],
			'weight' => $data['weight'],
			'pur_order_no'=>$data['purchaseNo'],
			'pur_order_date'=>$data['purchaseDate'],
			'invoice_no'=>$data['invoiceNo'],
			'invoice_date'=>$data['invoiceDate'],
			'material_grade'=>$data['materialGrade'],
			'raw_material_type'=>$data['materialType']
		);

		$data_insert=DB::table('raw_material')->insert($data_array);

		if($data_insert=='true')
		{
			$confirmation="Data entered successfully with following detials..";
			return View::make('rawMaterial.confirm')->with('confirmation',$data_array);
		}

		else
			dd("you failed");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$raw= DB::table('raw_material')->select()->get();
		return View::make('rawMaterial.raw_report')->with('raw',$raw);
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
