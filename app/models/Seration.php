<?php

class Seration extends \Eloquent {
	protected $fillable = [];

	public static function insertData($input_array)
	{
		return DB::table('seration_records')
				->insert($input_array);
	}

	public static function insertRemarks($input_array)
	{
		return DB::table('seration_remarks')
				->insert($input_array);
	}





	public static function getLastRecord()
	{
		return DB::table('seration_records')
				->orderBy('seration_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('seration_records')
				->select()
				->get();
	}
}