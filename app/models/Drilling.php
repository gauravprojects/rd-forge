<?php

class Drilling extends \Eloquent {
	protected $fillable = [];

	public static function insertData($input_array)
	{
		return DB::table('drilling_records')->insert($input_array);
	}



	public static function insertRemarks($input_array)
	{
		return DB::table('drilling_remarks')->insert($input_array);
	}

	public static function getLastRecord()
	{
		return DB::table('drilling_records')->orderBy('drilling_id', 'desc')->first();
	}

	public static function getAllData()
	{
		return DB::table('drilling_records')->select()->get();
	}
}