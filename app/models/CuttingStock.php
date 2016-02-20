<?php

class CuttingStock extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('cutting_stock')
			->insert($records_array);
	}

	public static function availableCutting()
	{
		return DB::table('cutting_stock')->get();
	}

	public static function getAllData($cutting)
	{
		return DB::table('cutting_stock')
			   ->where('heat_no',$cutting['heatNo'])
			   ->where('standard_size',$cutting['standard_size'])
			   ->where('pressure',$cutting['pressure'])
			   ->where('type',$cutting['type'])
			   ->where('schedule',$cutting['schedule'])
			   ->get();
	}

	public static function incrementWeight($cutting,$weight)
	{
		return DB::table('cutting_stock')
			   ->where('heat_no',$cutting['heatNo'])
			   ->where('standard_size',$cutting['standard_size'])
			   ->where('pressure',$cutting['pressure'])
			   ->where('type',$cutting['type'])
			   ->where('schedule',$cutting['schedule'])
			   ->increment('available_weight_cutting',$weight);
	}

	public static function getLastRecord()
	{
		//to get the last entry of the cutting table, useful for showing data on confirmation page
		return DB::table('cutting_stock')
			->orderBy('stock_id', 'desc')
			->first();
	}

	public static function updateAllData($stock_id,$array)
	{
		return DB::table('cutting_stock')
			  ->where('stock_id',$stock_id)
			  ->update($array);
	}

}


?>