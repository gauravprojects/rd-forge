<?php

class WorkOrder extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('work_order_details')->insert($records_array);
	}

	public static function getLastRecord()
	{
		return DB::table('work_order_details')->orderBy('work_order_no','desc')->first();
	}
}