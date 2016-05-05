<?php

class StandardSizes extends Eloquent {
	protected $fillable = [];

	//Returns standard sizes form master data
	public static function getStandardSizes()
	{
		return DB::table('master_std_size')
				->select()
				->get();
	}

	//Inserts standard sizes into master data
	public static function insertStandardSizes($input_array)
	{
		return DB::table('master_std_size')
				->insert($input_array);
	}

	//Deletes standard sizes from master data
	public static function deleteStandardSizes($id)
	{
		return DB::table('master_std_size')
				->where('id','=',$id)
				->delete();
	}
}