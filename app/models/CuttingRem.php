<?php

class CuttingRem extends Eloquent
{
	public static function insertData($records_array)
	{
		//to insert data in cuttting remarks table
		return DB::table('cutting_remarks')
			->insert($records_array);
	}

}