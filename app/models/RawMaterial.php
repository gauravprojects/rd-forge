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
}