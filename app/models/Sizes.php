<?php

class Sizes extends Eloquent {
	protected $fillable = [];

	//Returns sizes form master data
	public static function getSizes()
	{
		return DB::table('master_sizes')
				->select()
				->get();
	}

	//Inserts sizes into master data
	public static function insertSizes($input_data)
	{
		return DB::table('master_sizes')
				->insert($input_data);
	}

	//Deletes sizes from master data
	public static function deleteSizes($id)
	{
		return DB::table('master_sizes')
				->where('id','=',$id)
				->delete();
	}
}