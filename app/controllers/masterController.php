<?php

class MasterController extends \BaseController {

	public function showManufactures()
	{
		$data= Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data',$data);
	}

	public function storeManufacturers()
	{
		//to store the manufacturer data
		$input_array= Input::all();


		$input= array(
			'manufacturer_name'=>$input_array['manufacturer_name'],
			'item' => $input_array['item']
		);
		$input_response= Manufactures::insertManufacturer($input);

		$data= Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data',$data);



	}


	public function deleteManufacturer($id)
	{
		$delete_response=Manufactures::deleteManufacturer($id);
		$data= Manufactures::getManufactures();
		return View::make('adminPanel.manufactures')->with('data',$data);

	}

}