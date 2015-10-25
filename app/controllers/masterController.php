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
		return View::make('adminPanel.materialGrade')->with('data', $data);

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






}