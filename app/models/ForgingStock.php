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
	public static function incrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$weight)
	{
		return DB::table('forging_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->increment('available_weight_forging',$weight);
	}

	//Decrements the stock data weight on the basis of given heat,size,pressure,type and schedule
	public static function decrementHeatSizePressureTypeScheduleData($heat_no,$size,$pressure,$type,$schedule,$weight)
	{
		return DB::table('forging_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->where('pressure',$pressure)
			   ->where('type',$type)
			   ->where('schedule',$schedule)
			   ->decrement('available_weight_forging',$weight);
	}

	public static function availableWeight()
	{
		return DB::table('forging_stock')
			->where('available_weight_forging','>',0)
			->get();
	}

}


?>