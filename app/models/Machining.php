<?php

class Machining extends Eloquent {
	protected $fillable = [];

	public static function insertData($input_array)
	{
		return DB::table('machining_records')
				->insert($input_array);
	}

	public static function getRecord($id)
	{
		return DB::table('machining_records')
				->select()
				->where('machining_id','=',$id)
				->get();
	}


	public static function getLastRecord()
	{
		return DB::table('machining_records')
				->orderBy('mach_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('machining_records')
				->select()
				->get();
	}
}