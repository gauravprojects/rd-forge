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
				->where('mach_id','=',$id)
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

	public static function delete_record($mach_id)
	{
		return DB::table('machining_records')
			->where('mach_id','=',$mach_id)
			->delete();
	}

	public static function updateAllData($mach_id,$array)
	{
		return DB::table('machining_records')
			  ->where('mach_id',$mach_id)
			  ->update($array);
	}
}