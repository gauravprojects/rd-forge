<?php

class Schedule extends Eloquent {
	protected $fillable = [];

	//Returns schedule form master data
	public static function getSchedule()
	{
		return DB::table('master_schedule')
				->select()
				->get();
	}

	//Inserts schedule into master data
	public static function insertSchedule($input_data)
	{
		return DB::table('master_schedule')
				->insert($input_data);
	}

	//Deletes schedule from master data
	public static function deleteSchedule($id)
	{
		return DB::table('master_schedule')
				->where('id','=',$id)
				->delete();
	}

}