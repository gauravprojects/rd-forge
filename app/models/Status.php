<?php

class Status extends Eloquent {
	protected $fillable = [];

	public static function getStatus()
	{
		return DB::table('master_status')
				->select()
				->get();
	}

	public static function insertStatus($input_data)
	{
		return DB::table('master_status')
				->insert($input_data);
	}

	public static function deleteStatus($id)
	{
		return DB::table('master_status')
				->where('id','=',$id)
				->delete();
	}

}