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
				->where('drill_id','=',$id)
				->get();
	}

	public static function getLastRecord()
	{
		return DB::table('drilling_records')
				->orderBy('drill_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('drilling_records')
				->select()
				->get();
	}

	public static function HeatNo_availableWeightForging()
	{
		return DB::table('forging_records')
			->select('heat_no')
			->where('available_weight_forging','>','0')
			->get();
	}

	public static function delete_record($drill_id)
	{
		return DB::table('drilling_records')
			->where('drill_id','=',$drill_id)
			->delete();
	}

	public static function updateAllData($drill_id,$array)
	{
		return DB::table('drilling_records')
			  ->where('drill_id',$drill_id)
			  ->update($array);
	}


}