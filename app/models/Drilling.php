<?php

class Drilling extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- DRILLING MODULE -------------------------------
									TABLE NAME:  drilling records					*/

	public static function insertData($input_array)
	{
		return DB::table('drilling_records')
				->insert($input_array);
	}



	public static function insertRemarks($input_array)
	{
		return DB::table('drilling_remarks')
				->insert($input_array);
	}

	public static function getRecord($id)
	{
		return DB::table('drilling_records')
				->select()
				->where('drilling_id','=',$id)
				->get();
	}

	public static function getLastRecord()
	{
		return DB::table('drilling_records')
				->orderBy('drilling_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('drilling_records')
				->select()
				->get();
	}
}