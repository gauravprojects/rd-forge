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
		$heat_no = RawMaterialStock::getHeatNo();
		$standard_sizes = StandardSizes::getStandardSizes();
		$pressure = Pressure::getPressure();
		$schedule = Schedule::getSchedule();
		$type = DescriptionType::getType();
		$grades = Grades::getGrades();
		$manufacturers = Manufactures::getManufactures();
		$material_type = MaterialType::getMaterialType();

		return array('sizes'=>$sizes,'heat_no'=>$heat_no,'standard_size'=>$standard_sizes,'sizes'=>$sizes,
			'pressure'=>$pressure,'schedule'=>$schedule,'type'=>$type,'material_type'=>$material_type,
					'grades'=>$grades,'manufacturers'=>$manufacturers);

	}

	public function index()
	{
		$data = rawMaterialController::getStandardData();
		return View::make('rawMaterial.raw')->with($data);
	}


	// store function stores data coming from raw material form
	// view confirm shows tha last entered entry in raw material table
	public function store()
	{
		$data = Input::all(); // returns array form raw material entry form

		$raw_material_stock_array = array(
			'heat_no' => $data['heatNo'],
			'size' => $data['size'],
			'available_weight' => $data['weight']
			);

		
		$raw_material_array = array(
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


		//Checks whether the stock of given heat and size is present or not in stock table
		$whether_stock_present = RawMaterialStock::getHeatSizeData($data['heatNo'],$data['size']);

		DB::beginTransaction();

		try
		{
			if(!$whether_stock_present)
			{
				//Insert the raw material data
				if(!RawMaterial::insertData($raw_material_array))
					throw new Exception("Cannot insert raw material data", 1);

				//Insert the raw material stock data
				if(!RawMaterialStock::insertData($raw_material_stock_array))
					throw new Exception("Cannot Insert stock data", 1);

				else
					DB::commit();
			}
			else
			{
				//Insert the raw material data
				if(!RawMaterial::insertData($raw_material_array))
					throw new Exception("Cannot insert raw material data", 1);

				//If present increment the current stock on the basis of heat number and size
				if(!RawMaterialStock::incrementWeight($data['heatNo'],$data['size'],$data['weight']))
					throw new Exception("Cannot increment stock data", 1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return 0;
		}


		$last_record = RawMaterial::getLastRecord();		
		return View::make('rawMaterial.confirm')->with('confirmation',$last_record);
	}

	//Shows all the data present in raw_material_records table
	public function show()
	{
		$raw= RawMaterial::getAllData();
		return View::make('rawMaterial.raw_report')->with('raw',$raw);
	}


	//Shows all the material that is available in the current stock
	public function available()
	{
		$data= RawMaterialStock::availableWeight();
		return View::make('rawMaterial.available')
			->with('data',$data);
	}


	//Shows the raw material update page to update the data depending on the id
	public function update($id)
	{
		$data_array = RawMaterial::getRecordFromInternalNo($id);
		$data = rawMaterialController::getStandardData();

		return View::make('rawMaterial.raw_update')->with('data_array',$data_array)->with($data);
	}


	//Update the raw material data and does work accordingly
	public function update_store($id)
	{
		
		$data = Input::all();

		$raw_material_array = array(
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

		$raw_material_stock_array = array(
			'heat_no' => $data['heatNo'],
			'size' => $data['size'],
			'available_weight' => $data['weight']
			);

		// $whether_stock_present = RawMaterialStock::getHeatSizeData($data['heatNo'],$data['size']);


		//Transaction starts here
		DB::beginTransaction();

		try{
			//Checks whether the stock of given heat and size is present or not in stock table
			$whether_stock_present = RawMaterialStock::getHeatSizeData($data['heatNo'],$data['size']);

			if(!$whether_stock_present)
			{
				//Update the data in the records table pertaining to internal number
				if(!RawMaterial::updateAllData($data['internal_no'],$raw_material_array))
					throw new Exception("Could not update all data",1);

				//Insert the new raw material stock data in the table
				if(!RawMaterialStock::insertData($raw_material_stock_array))
					throw new Exception("Could not insert data for new heat number",1);

				//Decrement the raw material stock from the old heat number or/and size
				if(!RawMaterialStock::decrementRecordByHeatSize($data['old_heat_no'],$data['old_size'],$data['old_weight']))
					throw new Exception("Could not decrement data for old heat number and old size",1);

				else
					DB::commit();
			}
			else
			{
				//Update the data in the records table pertaining to internal number
				if(!RawMaterial::updateAllData($data['internal_no'],$raw_material_array))
					throw new Exception("Could not update all data",1);

				//Decrement the raw material stock from the old heat number or/and size
				if(!RawMaterialStock::decrementRecordByHeatSize($data['old_heat_no'],$data['old_size'],$data['old_weight']))
					throw new Exception("Could not decrement data for old heat number",1);

				//Increment the raw material stock from the new heat number or/and size
				if(!RawMaterialStock::incrementRecordByHeatSize($data['heatNo'],$data['size'],$data['weight']))
					throw new Exception("Could not increment data for new heat number",1);

				else
					DB::commit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return 0;
		}

		$get_record_array = RawMaterial::getRecordFromInternalNo($data['internal_no']);
		return View::make('rawMaterial.confirm_update')->with('confirmations',$get_record_array);

	}

	//Generates the excel data for raw material records
	public function excel()
	{
		$raw = RawMaterial::getExcelData();
		return View::make('rawMaterial.raw_report_excel')->with('raw',$raw);
	}

	//Deletes the raw material records and the stock related to particular heat number
	public function destroy($id)
	{
		$get_details = RawMaterial::getRecordFromInternalNo($id);

		DB::beginTransaction();

		try
		{
			//Delete the record from the raw material records table
			if(!RawMaterial::deleteRecord($id))
				throw new Exception("Cannot delete record", 1);

			//Delete the record from the raw material stock table as well 
			if(!RawMaterialStock::decrementRecordByHeatSize($get_details[0]->heat_no,$get_details[0]->size,$get_details[0]->weight))
				throw new Exception("Cannot decrement from stock", 1);

			else
				DB::commit();
		}
		catch(Exception $e)
		{
			DB::rollback();
			echo $e->getMessage();
			return 0;
		}
		
		$raw = RawMaterial::getAllData();
		return View::make('rawMaterial.raw_report')->with('raw',$raw);
	}

	//Returns the search view in the search panel
    public function search_display()
    {
        return View::make('search.raw_material_search')->with('data',RawMaterial::getAllData());
    }

}
