<?php

class Status extends Eloquent {
	protected $fillable = [];

	//Returns status form master data
	public static function getStatus()
	{
		return DB::table('master_status')
				->select()
				->get();
	}

	//Inserts status into master data
	public static function insertStatus($input_data)
	{
		return DB::table('master_status')
				->insert($input_data);
	}

	//Deletes status from master data
	public static function deleteStatus($id)
	{
		return DB::table('master_status')
				->where('id','=',$id)
				->delete();
	}

}