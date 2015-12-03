<?php

class CuttingRem extends Eloquent
{
	public static function insertData($records_array)
	{
		//to insert data in cuttting remarks table
		return DB::table('cutting_remarks')
			->insert($records_array);
	}

	public static function getRecord($id)
	{
		return DB::table('cutting_remarks')
				->select()
				->where('cutting_id','=',$id)
				->get();
	}

}