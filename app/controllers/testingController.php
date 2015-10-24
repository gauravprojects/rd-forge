<?php

class TestingController extends \BaseController {

	public function show()
	{
		return View::make('testing.one');
	}

	public function store()
	{
		$data=Input::all();
		$data_required= DB::select(DB::raw("SELECT * FROM work_order_material_details WHERE work_id=$data[0]"));
		dd($data_required);
		$arr= array(
			'work_order_no' => $data[0],
			'material_grade' => $data_required['material_grade'],
			'item' => $data_required['work_order_no']
		);



		$arr_json=json_encode($arr);
		dd($arr_json);
	}


	public function auto()
	{
		return View::make('testing.auto');
	}

	public function autoStore()
	{
		$data=Input::all();
		dd($data);
		if(empty($data))
			dd("empty");
		else
			dd("not empty");
	}

}