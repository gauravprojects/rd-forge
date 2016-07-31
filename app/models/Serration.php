<?php

class Serration extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- SERRATION MODULE -------------------------------
									TABLE NAME:  serration_records				*/

	//Insert data in the specified table
	public static function insertData($input_array)
	{
		return DB::table('serration_records')
				->insert($input_array);
	}

	//Get data based on id from the specified table
	public static function getRecord($id)
	{
		return DB::table('serration_records')
				->select()
				->where('serr_id','=',$id)
				->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('serration_records')
				->orderBy('serr_id', 'desc')
				->first();
	}

	//Get all the data from the specified table
	public static function getAllData()
	{
		return DB::table('serration_records')->get();
	}

	// Deletes all the serration record data based on specified serration_id
	public static function delete_record($serr_id)
	{
		return DB::table('serration_records')
			->where('serr_id','=',$serr_id)
			->delete();
	}

	// Updates all the serration record data based on specified serration_id
	public static function updateAllData($serr_id,$array)
	{
		return DB::table('serration_records')
			->where('serr_id',$serr_id)
			->update($array);
	}
	public static function  getDataSerationByOrderNoItemNo($order_no,$item_no)
	{ 
		return DB::table('serration_work_order_stock')
				->where('work_order_no',$order_no)
				->where('item',$item_no)
				->first();
	}
}