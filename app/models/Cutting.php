<?php

class Cutting extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('cutting_records')->insert($records_array);
	}

	public static function getLastRecord()
	{
		return DB::table('cutting_records')->orderBy('cutting_id', 'desc')->first();
	}

	public static function getDatedata()
	{
		$date=date("Y-m-d");
		return DB::table('cutting_records')->select()->where('date','=',$date);
	}
}