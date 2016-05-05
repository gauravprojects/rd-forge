<?php

class Machining extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- MACHINING MODULE -------------------------------
									TABLE NAME:  machining_records				*/

	//Insert data in the specified table
	public static function insertData($input_array)
	{
		return DB::table('machining_records')
				->insert($input_array);
	}

	//Get data based on id from the specified table
	public static function getRecord($id)
	{
		return DB::table('machining_records')
				->where('mach_id','=',$id)
				->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('machining_records')
				->orderBy('mach_id', 'desc')
				->first();
	}

	//Get all the data from the specified table
	public static function getAllData()
	{
		return DB::table('machining_records')->get();
	}

	// Deletes all the machining record data based on specified machining_id
	public static function delete_record($mach_id)
	{
		return DB::table('machining_records')
			->where('mach_id','=',$mach_id)
			->delete();
	}

	// Updates all the machining record data based on specified machining_id
	public static function updateAllData($mach_id,$array)
	{
		return DB::table('machining_records')
			  ->where('mach_id',$mach_id)
			  ->update($array);
	}
}