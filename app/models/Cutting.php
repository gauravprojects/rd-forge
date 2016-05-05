<?php

class Cutting extends Eloquent
{
	/* --------------------------------- CUTTING MODULE -------------------------------
									TABLE NAME:  cutting_records					*/

	//Insert data in the specified table
	public static function insertData($records_array)
	{

		return DB::table('cutting_records')
			->insert($records_array);
	}

	//Get data based on id from the specified table
	public static function getRecord($id)
	{
		return DB::table('cutting_records')
				->where('cutting_id','=',$id)
				->get();
	}


	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
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

	//Get all the data from the cutting records
	public static function getAllData()
	{
		return DB::table('cutting_records')->get();
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

	// Deletes all the cutting record data based on specified cutting_id
	public static function delete_record($id)
	{
		return DB::table('cutting_records')
			->where('cutting_id','=',$id)
			->delete();
	}


	public static  function getHeatNo()
	{
		return DB::table('cutting_records')
			->select()
			->where('available_weight_cutting', '>', 0)
			->get();
	}


	// Updates all the cutting record data based on specified cutting_id
	public static function updateAllData($cutting_id,$array)
	{
		return DB::table('cutting_records')
			  ->where('cutting_id',$cutting_id)
			  ->update($array);
	}

}