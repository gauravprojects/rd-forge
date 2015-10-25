<?php

class Pressure extends \Eloquent {
	protected $fillable = [];

	public static function getPressure()
	{
		return DB::table('master_pressure')->select()->get();
	}

	public static function insertPressure($input_array)
	{
		return DB::table('master_pressure')->insert($input_array);
	}
	public static function deletePressure($id)
	{
		return DB::table('master_pressure')->where('id','=',$id)->delete();
	}


}