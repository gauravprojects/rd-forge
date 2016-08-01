<?php

class Drilling extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- DRILLING MODULE -------------------------------
									TABLE NAME:  drilling_records					*/

    //Insert data in the specified table
	public static function insertData($input_array)
	{
		return DB::table('drilling_records')
				->insert($input_array);
	}

	//Get data based on id from the specified table
	public static function getRecord($id)
	{
		return DB::table('drilling_records')
				->where('drill_id','=',$id)
				->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('drilling_records')
				->orderBy('drill_id', 'desc')
				->first();
	}

	//Get all the data from the specified table
	public static function getAllData()
	{
		return DB::table('drilling_records')->get();
	}

	public static function HeatNo_availableWeightForging()
	{
		return DB::table('forging_records')
			->select('heat_no')
			->where('available_weight_forging','>','0')
			->get();
	}

	// Deletes all the drilling record data based on specified drill_id
	public static function delete_record($drill_id)
	{
		return DB::table('drilling_records')
			->where('drill_id','=',$drill_id)
			->delete();
	}

	// Updates all the drilling record data based on specified drill_id
	public static function updateAllData($drill_id,$array)
	{
		return DB::table('drilling_records')
			  ->where('drill_id',$drill_id)
			  ->update($array);
	}




}