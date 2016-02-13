<?php

class Serration extends Eloquent {
	protected $fillable = [];

	public static function insertData($input_array)
	{
		return DB::table('serration_records')
				->insert($input_array);
	}

	public static function insertRemarks($input_array)
	{
		return DB::table('serration_remarks')
				->insert($input_array);
	}

	public static function getRecord($id)
	{
		return DB::table('serration_records')
				->select()
				->where('serration_id','=',$id)
				->get();
	}


	public static function getLastRecord()
	{
		return DB::table('serration_records')
				->orderBy('serration_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('serration_records')
				->select()
				->get();
	}

	public static function deleteRecord($serration_id)
	{
		return DB::table('serration_records')
			->where('serration_id','=',$serration_id)
			->delete();
	}
}