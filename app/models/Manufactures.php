<?php

class Manufactures extends Eloquent {
	protected $fillable = [];
	public static function getManufactures()
	{
		return DB::table('master_manufacturers')
				->select()
				->get();
	}

	public static function insertManufacturer($input_data)
	{
		return DB::table('master_manufacturers')
				->insert($input_data);
	}

	public static function deleteManufacturer($id)
	{
		return DB::table('master_manufacturers')
				->where('id','=',$id)
				->delete();
	}
}