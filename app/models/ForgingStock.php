<?php

class ForgingStock extends Eloquent
{
	/* --------------------------------- FORGING MODULE -------------------------------
									TABLE NAME:  forging_stock					*/

	//Insert data in the specified table	
	public static function insertData($records_array)
	{
		return DB::table('forging_stock')
			->insert($records_array);
	}

	//Get all the forging stock data
	public static function getHeatNo()
	{
		return DB::table('forging_stock')
			->where('available_quantity_forging','>',0)
			->get();
	}

	//Gets the stock data on the basis of given heat,size,pressure,type and schedule
	public static function getHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule)
	{
		return DB::table('forging_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->get();
	}

	public static function checkForgingStock($heat_no,$size,$pressure,$type,$schedule)
	{
		return DB::table('forging_stock')
			->where('heat_no',$heat_no)
			->where('size',$size)
			->where('pressure',$pressure)
			->where('type',$type)
			->where('schedule',$schedule)
			->get();
	}

	public static function deleteNegativeOrNonZeroEntries()
	{
		return DB::table('forging_stock')
			->where('available_quantity_forging','<',1)
			->delete();
	}

	//Increments the stock data weight on the basis of given heat,size,pressure,type and schedule
	public static function incrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$quantity)
	{
		return DB::table('forging_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->increment('available_quantity_forging',$quantity);
	}

	//Decrements the stock data weight on the basis of given heat,size,pressure,type and schedule
	public static function decrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$quantity)
	{
		return DB::table('forging_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->decrement('available_quantity_forging',$quantity);
	}

	//Gets available quantity where it is > 0
	public static function availableQuantity()
	{
		return DB::table('forging_stock')
			->where('available_quantity_forging','>',0)
			->get();
	}

	//Checks for negative weights in stock table
	public static function checkZeroWeight()
	{
		return DB::table('forging_stock')
			   ->where('available_quantity_forging','<',0)
			   ->get();
	}

	//dispatches forging stock which is currently available
	public static function dispatchForging($stock_id,$quantity)
	{
		return DB::table('forging_stock')
			->where('stock_id','=',$stock_id)
			->decrement('available_quantity_forging',$quantity);
	}

}


?>