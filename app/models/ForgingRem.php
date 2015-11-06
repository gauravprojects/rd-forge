<?php

class ForgingRem extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('forging_remarks')->insert($records_array);
	}

}