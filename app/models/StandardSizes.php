<?php

class StandardSizes extends \Eloquent {
	protected $fillable = [];

	public static function getStandardSizes()
	{
		return DB::table('master_std_size')->select()->get();
	}

	public static function insertStandardSizes($input_array)
	{
		return DB::table('master_std_size')->insert($input_array);
	}
	public static function deleteStandardSizes($id)
	{
		return DB::table('master_std_size')->where('id','=',$id)->delete();
	}
}