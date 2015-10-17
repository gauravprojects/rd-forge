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



		$data_array_update = array(
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
							->update($data_array_update);

//
////		array(1) { [0]=> object(stdClass)#242 (14) { ["internal_no"]=> int(5) ["receipt_code"]=> string(5) "12345"
////		# ["date"]=> string(10) "2015-10-17" ["size"]=> int(100) ["manufacturer"]=> string(12) "gaurav arora"
////		# ["heat_no"]=> string(4) "4436" ["weight"]=> int(6653) ["left_over_weight"]=> string(0) ""
////		# ["pur_order_no"]=> string(4) "4656" ["pur_order_date"]=> string(10) "0000-00-00" ["invoice_no"]=> string(5) "46565"
////		# ["invoice_date"]=> string(10) "0000-00-00" ["material_grade"]=> string(7)
////		# "Grade 1" ["raw_material_type"]=> string(6) "Type 1" } }
//
//
//
//
//		$get_record_array= RawMaterial::getRecord($data['internal_no']);
//		dd($get_record_array['internal_no']);
//
//			$to_be_sent= new stdClass();
//			$to_be_sent->receipt_code= $get_record->receiptCode;
//			$to_be_sent->size = $get_record->size;
//			$to_be_sent->manufacturer= $get_record->Manufacturer;
//			$to_be_sent->heat_no=$get_record->heatNo;
//			$to_be_sent->weight=$get_record->weight;
//			$to_be_sent->pur_order_no=$get_record->purchaseNo;
//			$to_be_sent->pur_order_date=$get_record->purchaseDate;
//			$to_be_sent->invoice_no=$get_record->invoiceNo;
//			$to_be_sent->left_over_material=$get_record->left_over_weight;
//			$to_be_sent->invoice_date=$get_record->invoiceDate;
//			$to_be_sent->material_grade=$get_record->materialGrade;
//			$to_be_sent->raw_material_type= $get_record->materialType;
//
//
//		//problem in fetching results

		$get_record_array= RawMaterial::getRecord($data['internal_no']);
		return View::make('rawMaterial.confirm_update')->with('confirmations',$get_record_array);


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
