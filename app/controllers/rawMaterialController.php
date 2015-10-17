<?php

class rawMaterialController extends BaseController {

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
		$date = date("Y-m-d");
		$data = Input::all();

		$data_array = array(
			'receipt_code' => $data['receiptCode'],
			'date' => $date,
			'size' => $data['size'],
			'manufacturer' => $data['Manufacturer'],
			'heat_no' => $data['heatNo'],
			'weight' => $data['weight'],
			'pur_order_no' => $data['purchaseNo'],
			'pur_order_date' => $data['purchaseDate'],
			'invoice_no' => $data['invoiceNo'],
			'left_over_weight'=>$data['left_over_weight'],
			'invoice_date' => $data['invoiceDate'],
			'material_grade' => $data['materialGrade'],
			'raw_material_type' => $data['materialType']
		);

		// making details for the log book
		$details = 'Manufacturer: '.$data['Manufacturer'].'  Heat no: '.$data['heatNo'].'  Material Grade: '.
			$data['materialGrade'].' Material Type: '.$data['materialType'].' Size: '.$data['size'];
			
		// making an array for logbook table
		$log_array = array(
					'date'=>date("Y-m-d"),
					'time'=>date('h:i:s'),
					'category'=>'Raw Material',
					'details'=>$details
					);

		Logbook::insertData($log_array);

		RawMaterial::insertData($data_array);

		//get the last entry in raw material table and pass it to confirm blade

		$last_record= RawMaterial::getLastRecord();
		return View::make('rawMaterial.confirm')->with('confirmation',$last_record);



	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$raw= RawMaterial::getAllData();
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
		$data_array = RawMaterial::getRecord($id);
		return View::make('rawMaterial.raw_update')->with('data_array',$data_array);
	}

	public function update_store($id)
	{
		$date=date("Y-m-d");
		$data= Input::all();
		$data_array = array(
			'receipt_code' => $data['receiptCode'],
			'date' => $date,
			'size' => $data['size'],
			'manufacturer' => $data['Manufacturer'],
			'heat_no' => $data['heatNo'],
			'weight' => $data['weight'],
			'pur_order_no' => $data['purchaseNo'],
			'pur_order_date' => $data['purchaseDate'],
			'invoice_no' => $data['invoiceNo'],
			'left_over_weight'=>$data['left_over_weight'],
			'invoice_date' => $data['invoiceDate'],
			'material_grade' => $data['materialGrade'],
			'raw_material_type' => $data['materialType']
		);
		$update_response= DB::table('raw_material')
							->where('internal_no',$data['internal_no'])
							->update($data_array);

		$get_record= RawMaterial::getRecord($data['internal_no']);
		dd("updated");

		//problem in fetching results

		return View::make('rawMaterial.confirm')->with('confirmation',$get_record);


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
		$raw= RawMaterial::getExcelData();
		return View::make('rawMaterial.raw_report_excel')->with('raw',$raw);
	}




}
