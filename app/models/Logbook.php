<?php

class Logbook extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('logbook')->insert($records_array);		
	}
}