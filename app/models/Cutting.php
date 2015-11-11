<?php

class Cutting extends Eloquent
{
	public static function insertData($records_array)
	{

		// inserts data in cutting_records table
		// store function on cuttingPageController
		return DB::table('cutting_records')
			->insert($records_array);
	}

	public static function getLastRecord()
	{
		//to get the last entry of the cutting table, useful for showing data on confirmation page
		return DB::table('cutting_records')
			->orderBy('cutting_id', 'desc')
			->first();
	}


	public static function getUpdateData($id)
	{
		//to get data of all the data which is to be updated
		//update($id) function on cuttingPageController
		return DB::table('cutting_records')
				->select()
				->where('cutting_id','=',$id)
				->get();
	}

	public static function returnNullData()
	{
		// to send null data while entering form data
		// on cutting blade, $dataArray[] has been used to show the data which is to be updated,
		// but intially while filling entries they are supposed to to empty, so for this $nullArray has been used

		$nullArray= array(
				'cutting_id'=> null,
				'date'=> null,
				'raw_mat_size' => null,
				'heat_no' => null,
				'quantity' => null,
				'weight_per_piece' => null,
				'total_weight' => null,
				'size' => null,
				'pressure' => null,
				'schedule' => null,
				'type' => null
				);

		return $nullArray;

	}

	public static function availableCutting()
	{
		// returns all data of cutted material available for forging
		// used in admin pannel "AVAILABLE CUTTING MATERIAL" option

		return DB::table('cutting_records')
				->select()
				->where('available_weight_cutting','>',0)
				->get();
	}



	public static function availabeWeight($heat_no)
	{
		// cutting is the process done after raw_material entry
		// this function returns all those heat no which have available_weight in raw_material table
		// in the dropdown on cutting blade only these heat_no are displayed
		$available_weight_object= DB::table('raw_material')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
		return $available_weight_object;
	}

}