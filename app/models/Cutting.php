<?php

class Cutting extends Eloquent
{
	public static function insertData($records_array)
	{

		// to get the records of the cutting entries
		return DB::table('cutting_records')
			->insert($records_array);
	}

	public static function getLastRecord()
	{
		//to get the last entry of the cutting table, useful for showing data on confirmation page
		return DB::table('cutting_records')
			->orderBy('cutting_id', 'desc')
			->first();
	}

	public static function getDatedata()
	{
		//to get the data for any particular date
		$date=date("Y-m-d");
		return DB::table('cutting_records')
			->select()
			->where('date','=',$date);
	}

	public static function getUpdateData($id)
	{
		//to get data of all the data which is to be updated
		return DB::table('cutting_records')
				->select()
				->where('cutting_id','=',$id)
				->get();
	}

	public static function returnNullData()
	{
		// to send null data while entering form data
		//this is being done to enforce update on the same view

		$nullArray= array(
				'cutting_id'=> null,
				'date'=> null,
				'raw_mat_size' => null,
				'heat_no' => null,
				'quantity' => null,
				'weight_per_piece' => null,
				'total_weight' => null,
				'size' => null,
				'pressure' => null,
				'schedule' => null,
				'type' => null
				);

		return $nullArray;

	}

}