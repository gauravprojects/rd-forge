<?php

class Cutting extends Eloquent
{
	public static function insertData($records_array)
	{

		// to get the records of the cutting entries
		return DB::table('cutting_records')
			->insert($records_array);
	}

	public static function getLastRecord()
	{
		//to get the last entry of the cutting table, useful for showing data on confirmation page
		return DB::table('cutting_records')
			->orderBy('cutting_id', 'desc')
			->first();
	}

	public static function getDatedata()
	{
		//to get the data for any particular date
		$date=date("Y-m-d");
		return DB::table('cutting_records')
			->select()
			->where('date','=',$date);
	}
}