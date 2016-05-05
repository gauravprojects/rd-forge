<?php

class Pressure extends Eloquent {
	protected $fillable = [];

	//Returns pressure form master data
	public static function getPressure()
	{
		return DB::table('master_pressure')
				->select()
				->get();
	}

	//Inserts pressure into master data
	public static function insertPressure($input_array)
	{
		return DB::table('master_pressure')
				->insert($input_array);
	}

	//Deletes pressure from master data
	public static function deletePressure($id)
	{
		return DB::table('master_pressure')
				->where('id','=',$id)
				->delete();
	}


}