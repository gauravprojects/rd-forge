<?php

class CuttingDes extends Eloquent
{
	public static function insertData($records_array)
	{
		//to insert data in cutting description table
		return DB::table('cutting_item_des')
			->insert($records_array);
	}

}