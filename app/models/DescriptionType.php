<?php

class DescriptionType extends \Eloquent {
	protected $fillable = [];

	public static function getType()
	{
		return DB::table('master_description_type')->select()->get();
	}

	public static function insertType($input_data)
	{
		return DB::table('master_description_type')->insert($input_data);
	}

	public static function deleteType($id)
	{
		return DB::table('master_description_type')->where('id','=',$id)->delete();
	}

}