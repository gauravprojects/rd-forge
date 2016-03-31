<?php

class ForgingStock extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('forging_stock')
			->insert($records_array);
	}

	public static function getHeatNo()
	{
		return DB::table('forging_stock')
			->where('available_weight_forging','>',0)
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

	public static function availableQuantity()
	{
		return DB::table('forging_stock')
			->where('available_quantity_forging','>',0)
			->get();
	}

}


?>