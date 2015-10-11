<?php

class CuttingDes extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('cutting_item_des')->insert($records_array);
	}

}