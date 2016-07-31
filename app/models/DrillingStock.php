<?php

class DrillingStock extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- DRILLING MODULE -------------------------------
									TABLE NAME:  drilling_work_order_stock					*/

	//Insert data in the specified table
	public static function insertData($input_array)
	{
		return DB::table('drilling_work_order_stock')
				->insert($input_array);
	}

	public static function updateData($input_array)
	{
		return DB::table('drilling_work_order_stock')
			->where('work_order_no',$input_array['work_order_no'])
			->update($input_array);
	}

	//Decrements the quantity of specified work order in the drilling stock
	public static function decrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('drilling_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->decrement('quantity',$quantity);
	}

	//Increments the quantity of specified work order in the drilling stock
	public static function incrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('drilling_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->increment('quantity',$quantity);
	}

	//Gets the data based on the work order and item numbers from drilling stock
	public static function getWorkOrderItemData($work_order_no,$item_no)
	{
		return DB::table('drilling_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->get();
	}

	//Gets the complete data of all the drilled parts from all work orders (used in work order status)
	public static function getDrilledWorkOrderNo()
	{
		return DB::table('drilling_work_order_stock')
				->join('work_order_records','drilling_work_order_stock.work_order_no','=','work_order_records.work_order_no')
				->groupBy('work_order_records.work_order_no')
				->get();
	}

	//Gets the item number from the specified work order (used in work order status)
	public static function getDrilledWorkOrderItemNo($work_order_no)
	{
		return DB::table('drilling_work_order_stock')
				->where('work_order_no',$work_order_no)
				->get();				
	}

	//Checks for negative weights in stock table
	public static function checkZeroWeight()
	{
		return DB::table('drilling_work_order_stock')
			   ->where('quantity','<',0)
			   ->get();
	}

	public static function getDrillingStockData()
	{
		return DB::table('drilling_work_order_stock')
			->where('quantity','>',0)
			->get();
	}


}