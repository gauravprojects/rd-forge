<?php

class RawMaterial extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('raw_material')->insert($records_array);
	}

	public static function getExcelData()
	{
		return DB::table('raw_material')->select()->get();
	}

	public static function getAllData()
	{
		return DB::table('raw_material')->select()->get();
	}

	public static function getDateData()
	{
		$date=date("Y-m-d");
		return DB::table('raw_material')->select()->where('date','=',$date)->get();
	}


	public static function getLastRecord()
	{
		return DB::table('raw_material')->orderBy('internal_no', 'desc')->first();
	}

	public static function getRecord($id)
	{
		return DB::table('raw_material')->select()->where('internal_no','=',$id)->get();
	}
}