<?php

class CuttingRem extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('cutting_remarks')->insert($records_array);
	}

}