<?php

class CuttingDes extends Eloquent
{
	public static function insertData($records_array)
	{
		//to insert data in cutting description table
		return DB::table('cutting_item_des')
			->insert($records_array);
	}

	public static function getRecord($id)
	{
		return DB::table('cutting_item_des')
				->select()
				->where('cutting_id','=',$id)
				->get();
	}
}