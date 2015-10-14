<?php

class Machining extends \Eloquent {
	protected $fillable = [];

	public static function insertData($input_array)
	{
		return DB::table('machining_records')->insert($input_array);
	}

	public static function getLastRecord()
	{
		return DB::table('machining_records')->orderBy('mach_id', 'desc')->first();
	}
}