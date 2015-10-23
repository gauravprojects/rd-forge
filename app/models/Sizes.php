<?php

class Sizes extends \Eloquent {
	protected $fillable = [];

	public static function getSizes()
	{
		return DB::table('master_sizes')->select()->get();
	}

	public static function insertSizes($input_data)
	{
		return DB::table('master_sizes')->insert($input_data);
	}

	public static function deleteSizes($id)
	{
		return DB::table('master_sizes')->where('id','=',$id)->delete();
	}
}