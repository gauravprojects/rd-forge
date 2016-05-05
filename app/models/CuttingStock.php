<?php

class CuttingStock extends Eloquent
{
	/* --------------------------------- CUTTING MODULE -------------------------------
									TABLE NAME:  cutting_stock					*/

	//Inserts the data in the specified table
	public static function insertData($records_array)
	{
		return DB::table('cutting_stock')
			->insert($records_array);
	}

	//Get the cutting stock data where available weight > 0
	public static function availableWeight()
	{
		return DB::table('cutting_stock')
			->where('available_weight_cutting','>',0)
			->get();
	}

	//Get all the cutting stock data
	public static function getHeatNo()
	{
		return DB::table('cutting_stock')->get();
	}

	//Get the cutting stock data depending on heat,size,pressure,type and schedule
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

	//Get the last entry of the cutting table, useful for showing data on confirmation page
	public static function getLastRecord()
	{
		return DB::table('cutting_stock')
			->orderBy('stock_id', 'desc')
			->first();
	}

	//Update all the stock data depending on the stock_id
	public static function updateAllData($stock_id,$array)
	{
		return DB::table('cutting_stock')
			  ->where('stock_id',$stock_id)
			  ->update($array);
	}

	//Gets the stock data on the basis of given heat,size,pressure,type and schedule
	public static function getHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule)
	{
		return DB::table('cutting_stock')
			   ->where('heat_no',$heat_no)
			   ->where('standard_size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->get();
	}

	//Decrements the stock data weight on the basis of given heat,size,pressure,type and schedule
	public static function decrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$weight)
	{
		return DB::table('cutting_stock')
			   ->where('heat_no',$heat_no)
			   ->where('standard_size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->decrement('available_weight_cutting',$weight);
	}

	//Increments the stock data weight on the basis of given heat,size,pressure,type and schedule
	public static function incrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$weight)
	{
		return DB::table('cutting_stock')
			   ->where('heat_no',$heat_no)
			   ->where('standard_size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->increment('available_weight_cutting',$weight);
	}

	//Checks for negative weights in stock table
	public static function checkZeroWeight()
	{
		return DB::table('cutting_stock')
			   ->where('available_weight_cutting','<',0)
			   ->get();
	}

}


?>