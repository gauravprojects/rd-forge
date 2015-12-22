<?php

		/* ---------------    FUNCTIONS USED     ---------------------------------
		FUNCTION NAME					DESCRIPTION				 				RETURNING DATA

		index()					shows home page for raw material			blade- raw material form
		store()					stores data coming from raw form			blade- confirm page
		show()					shows all entries in raw mat table			blade- raw_report
		available()				shows all available raw materials			blade- available
								which are still uncut
		update()				updates entered record						blade- raw_update
		excel()					gives all raw material data to an 			blade- raw_report_excel
								excel file
																								*/

class rawMaterialController extends BaseController {

	// index() function is used to raw material form with master sizes and master grades
	// This is the home page for raw material entry

	public static function getStandardData()
	{
		$sizes = Sizes::getSizes();
		$heat_no = RawMaterial::getHeatNo();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		$grades=Grades::getGrades();
		$manufacturers= Manufactures::getManufactures();

		return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,'sizes'=>$sizes,
			'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type,'grades'=>$grades,'manufacturers'=>$manufacturers);

	}

	public function index()
	{
		$data = rawMaterialController::getStandardData();
		
		return View::make('rawMaterial.raw')->with($data);
	}


	// store function stores data coming from raw material form
	// view confirm shows tha last entered entry in ra material table
	public function store()
	{
		$data = Input::all(); // returns array form raw material entry form

		$data_array = array(
			'receipt_code' => $data['receiptCode'],
			'date' => date('Y-m-d',strtotime($data['date'])),
			'size' => $data['size'],
			'manufacturer' => $data['Manufacturer'],
			'heat_no' => $data['heatNo'],
			'weight' => $data['weight'],
			'pur_order_no' => $data['purchaseNo'],
			'pur_order_date' => date('Y-m-d',strtotime($data['purchaseDate'])),
			'invoice_no' => $data['invoiceNo'],
			'invoice_date' => date('Y-m-d',strtotime($data['invoiceDate'])),
			'material_grade' => $data['materialGrade'],
			'raw_material_type' => $data['materialType'],
			'available_weight' => $data['weight']
		);

		RawMaterial::insertData($data_array);

		//get the last entry in raw material table and pass it to confirm blade

		$last_record= RawMaterial::getLastRecord();
		//returns the view to the confirmation page that shows last entered raw material entry
		return View::make('rawMaterial.confirm')->with('confirmation',$last_record);
	}

	// shows all data present in raw material
	public function show()
	{
		$raw= RawMaterial::getAllData();
		return View::make('rawMaterial.raw_report')->with('raw',$raw);
	}


	public function available()
	{
		$data= RawMaterial::availableWeight();
		return View::make('rawMaterial.available')
			->with('data',$data);
	}

	public function update($id)
	{
		$data_array = RawMaterial::getRecord($id);
		$data = rawMaterialController::getStandardData();

		return View::make('rawMaterial.raw_update')->with('data_array',$data_array)->with($data);
	}

	public function update_store($id)
	{
		
		$data= Input::all();

		$data_array_update = array(
			'receipt_code' => $data['receiptCode'],
			'date' => date('Y-m-d',strtotime($data['date'])),
			'size' => $data['size'],
			'manufacturer' => $data['Manufacturer'],
			'heat_no' => $data['heatNo'],
			'weight' => $data['weight'],
			'pur_order_no' => $data['purchaseNo'],
			'pur_order_date' => date('Y-m-d',strtotime($data['purchaseDate'])),
			'invoice_no' => $data['invoiceNo'],
			'invoice_date' => date('Y-m-d',strtotime($data['invoiceDate'])),
			'material_grade' => $data['materialGrade'],
			'raw_material_type' => $data['materialType']
		);
		$update_response= DB::table('raw_material')
							->where('internal_no',$data['internal_no'])
							->update($data_array_update);


		$get_record_array= RawMaterial::getRecord($data['internal_no']);
		return View::make('rawMaterial.confirm_update')->with('confirmations',$get_record_array);


	}


	public function excel()
	{
		$raw= RawMaterial::getExcelData();
		return View::make('rawMaterial.raw_report_excel')->with('raw',$raw);
	}

	public  function destroy($id)
	{
		$delete_response= RawMaterial::deleteRecord($id);
		$raw= RawMaterial::getAllData();
		return View::make('rawMaterial.raw_report')->with('raw',$raw);


	}




}
