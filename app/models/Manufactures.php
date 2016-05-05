<?php

class Manufactures extends Eloquent {
	protected $fillable = [];

	//Returns manufacturers form master data
	public static function getManufactures()
	{
		return DB::table('master_manufacturers')
				->select()
				->get();
	}

	//Inserts manufacturers into master data
	public static function insertManufacturer($input_data)
	{
		return DB::table('master_manufacturers')
				->insert($input_data);
	}

	//Deletes manufacturers from master data
	public static function deleteManufacturer($id)
	{
		return DB::table('master_manufacturers')
				->where('id','=',$id)
				->delete();
	}
}