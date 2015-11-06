<?php

class Forging extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('forging_records')->insert($records_array);
	}

	public static function getLastRecord()
	{
		return DB::table('forging_records')->orderBy('forging_id', 'desc')->first();
	}

	public static function getAllRecords()
	{
		return DB::table('forging_records')->select()->get();
	}

	public static function getDatedata()
	{
		$date=date("Y-m-d");
		return DB::table('forging_records')->select()->where('date','=',$date);
	}
}