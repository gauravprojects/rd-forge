<?php

class Schedule extends Eloquent {
	protected $fillable = [];

	public static function getSchedule()
	{
		return DB::table('master_schedule')
				->select()
				->get();
	}

	public static function insertSchedule($input_data)
	{
		return DB::table('master_schedule')
				->insert($input_data);
	}

	public static function deleteSchedule($id)
	{
		return DB::table('master_schedule')
				->where('id','=',$id)
				->delete();
	}

}