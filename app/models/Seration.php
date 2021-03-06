<?php

class Seration extends Eloquent {
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

	public static function getRecord($id)
	{
		return DB::table('seration_records')
				->select()
				->where('seration_id','=',$id)
				->get();
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

	public static function deleteRecord($seration_id)
	{
		return DB::table('seration_records')
			->where('seration_id','=',$seration_id)
			->delete();
	}

	public static function getAllStockRecords()
	{
		return DB::table('serration_work_order_stock')
			->where('quantity','>',0)
			->get();
	}


}