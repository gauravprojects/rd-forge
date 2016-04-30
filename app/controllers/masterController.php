<?php

class MasterController extends \BaseController
{

	public function showManufactures()
	{
		$data = Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data', $data);
	}

	public function storeManufacturers()
	{
		//to store the manufacturer data
		$input_array = Input::all();


		$input = array(
			'manufacturer_name' => $input_array['manufacturer_name'],
			'item' => $input_array['item']
		);
		$input_response = Manufactures::insertManufacturer($input);

		$data = Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data', $data);


	}


	public function deleteManufacturer($id)
	{
		$delete_response = Manufactures::deleteManufacturer($id);
		$data = Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data', $data);

	}


	public function showGrades()
	{
		$data = Grades::getGrades();
		return View::make('adminPanel.materialGrade')->with('data', $data);
	}

	public function storeGrades()
	{
		//to store the manufacturer data
		$input_array = Input::all();


		$input = array(
			'grade_name' => $input_array['grade_name']
		);

		$input_response = Grades::insertGrades($input);

		$data = Grades::getGrades();
		return View::make('adminPanel.materialGrade')->with('data', $data);

	}


	public function deleteGrades($id)
	{
		$delete_response = Grades::deleteGrades($id);
		$data = Grades::getGrades();
		return View::make('adminPanel.materialGrade')->with('data', $data);


	}


	public function showSizes()
	{

		$data = Sizes::getSizes();
		return View::make('adminPanel.sizes')->with('data', $data);
	}


	public function storeSizes()
	{
		//to store the manufacturer data
		$input_array= Input::all();


		$input= array(
			'size'=>$input_array['size']
		);

		$input_response= Sizes::insertSizes($input);
		$data= Sizes::getSizes();
		return View::make('adminPanel.sizes')->with('data',$data);


	}


	public function deleteSizes($id)
	{
		$delete_response=Sizes::deleteSizes($id);
		$data= Sizes::getSizes();
		return View::make('adminPanel.sizes')->with('data',$data);


	}


			// functions for standard sizes


	public function showStandardSizes()
	{
		//get standard sizes here
		$data=StandardSizes::getStandardSizes();
		return View::make('adminPanel.std_size')->with('data', $data);
	}


	public function storeStandardSizes()
	{
		//to store the manufacturer data
		$input_array= Input::all();

		$input= array(
			'std_size'=>$input_array['size']
		);

		$input_response= StandardSizes::insertStandardSizes($input);
		$data=StandardSizes::getStandardSizes();
		return View::make('adminPanel.std_size')->with('data', $data);
	}


	public function deleteStandardSizes($id)
	{
		$delete_response=StandardSizes::deleteStandardSizes($id);
		$data=StandardSizes::getStandardSizes();
		return View::make('adminPanel.std_size')->with('data', $data);
	}

				// functions for pressure

	public function showPressure()
	{
		//get standard sizes here
		$data=Pressure::getPressure();
		return View::make('adminPanel.pressure')->with('data', $data);
	}


	public function storePressure()
	{
		//to store the manufacturer data
		$input_array= Input::all();

		$input= array(
			'pressure'=>$input_array['pressure']
		);

		$input_response= Pressure::insertPressure($input);
		$data=Pressure::getPressure();
		return View::make('adminPanel.pressure')->with('data', $data);

	}


	public function deletePressure($id)
	{
		$delete_response=Pressure::deletePressure($id);
		$data=Pressure::getPressure();
		return View::make('adminPanel.pressure')->with('data', $data);

	}


// ------------------------------------FUNCTIONS FOR SCHEDULE------------

	public function showSchedule()
	{

		$data=Schedule::getSchedule();
		return View::make('adminPanel.schedule')->with('data', $data);
	}


	public function storeSchedule()
	{

		$input_array= Input::all();

		$input= array(
			'Schedule'=>$input_array['schedule']
		);

		$input_response=Schedule::insertSchedule($input);
		$data=Schedule::getSchedule();
		return View::make('adminPanel.schedule')->with('data', $data);

	}


	public function deleteSchedule($id)
	{
		$delete_response=Schedule::deleteSchedule($id);
		$data=Schedule::getSchedule();
		return View::make('adminPanel.schedule')->with('data', $data);


	}

	// ------------------------- FUNCTIONS FOR TYPE IN DESCRIPTION DATA --------------------


	public function showType()
	{

		$data=DescriptionType::getType();
		return View::make('adminPanel.descriptionType')->with('data', $data);
	}


	public function storeType()
	{

		$input_array= Input::all();

		$input= array(
			'type'=>$input_array['type']
		);

		$input_response=DescriptionType::insertType($input);
		$data=DescriptionType::getType();
		return View::make('adminPanel.descriptionType')->with('data', $data);
	}


	public function deleteType($id)
	{
		$delete_response=DescriptionType::deleteType($id);
		$data=DescriptionType::getType();
		return View::make('adminPanel.descriptionType')->with('data', $data);


	}

		// ------------------------- FUNCTIONS FOR TYPE IN MATERIAL TYPE DATA --------------------

	public function showMaterialType()
	{

		$data=MaterialType::getMaterialType();
		return View::make('adminPanel.materialType')->with('data', $data);
	}


	public function storeMaterialType()
	{

		$input_array= Input::all();

		$input= array(
			'material_type'=>$input_array['material_type']
		);

		$input_response=MaterialType::insertMaterialType($input);
		$data=MaterialType::getMaterialType();
		return View::make('adminPanel.materialType')->with('data', $data);
	}


	public function deleteMaterialType($id)
	{
		$delete_response=MaterialType::deleteMaterialType($id);
		$data=MaterialType::getMaterialType();
		return View::make('adminPanel.materialType')->with('data', $data);


	}


		// ------------------------- FUNCTIONS FOR TYPE IN STATUS DATA --------------------

	public function showStatus()
	{

		$data=Status::getStatus();
		return View::make('adminPanel.status')->with('data', $data);
	}


	public function storeStatus()
	{

		$input_array= Input::all();

		$input= array(
			'Status'=>$input_array['status']
		);

		$input_response=Status::insertStatus($input);
		$data=Status::getStatus();
		return View::make('adminPanel.status')->with('data', $data);

	}


	public function deleteStatus($id)
	{
		$delete_response = Status::deleteStatus($id);
		$data = Status::getStatus();
		return View::make('adminPanel.status')->with('data', $data);


	}

	public function showWorkOrderStatus()
	{
		$data = DB::select(DB::raw("select w1.work_order_no,w1.item_no,ww1.required_delivery_date,m1.quantity as machining_quantity,d1.quantity as drilling_quantity,s1.quantity as serration_quantity from `work_order_material_details` AS `w1` left join `work_order_records` AS `ww1` on w1.work_order_no = ww1.work_order_no left join `machining_work_order_stock` AS `m1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(m1.work_order_no,'-',m1.item) left join `drilling_work_order_stock` AS `d1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(d1.work_order_no,'-',d1.item) left join `serration_work_order_stock` AS `s1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(s1.work_order_no,'-',s1.item)"));
		return View::make('adminPanel.workOrderStatus')->with('data',$data);
	}



}