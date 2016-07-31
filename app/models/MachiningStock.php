<?php

class MachiningStock extends Eloquent
{
	/* --------------------------------- MACHINING MODULE -------------------------------
									TABLE NAME:  machining_work_order_stock				*/

	//Insert data in the specified table
	public static function insertData($records_array)
	{
		return DB::table('machining_work_order_stock')
			->insert($records_array);
	}

	public static function updateData($records_array)
	{
		// trying raw php query here
		//return DB::select( DB::raw("UPDATE machining_work_order_stock SET weight='20' WHERE work_order_no='123456789' ") );

		DB::table('machining_work_order_stock')
			->where('work_order_no',$records_array['work_order_no'])
			->update($records_array);
	}
	//Decrements the quantity of specified work order in the machining stock
	public static function decrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->decrement('quantity',$quantity);
	}

	//Increments the quantity of specified work order in the machining stock
	public static function getStockData($id)
	{
		return DB::table('machining_work_order_stock')
			->where('mach_id','=',$id)
			->get();

	}


	public static function getMachiningStockdata()
	{
		return DB::table('machining_work_order_stock')
			->where('quantity','>',0)
			->get();
	}


	public static function incrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->increment('quantity',$quantity);
	}

	//Gets the data based on the work order and item numbers from machining stock
	public static function getWorkOrderItemData($work_order_no,$item_no)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->get();
	}

	//Gets the complete data of all the machined parts from all work orders (used in work order status)
	public static function getMachinedWorkOrderNo()
	{
		return DB::table('machining_work_order_stock')
				->join('work_order_records','machining_work_order_stock.work_order_no','=','work_order_records.work_order_no')
				->groupBy('work_order_records.work_order_no')
				->get();
	}

	//Gets the item number from the specified work order (used in work order status)
	public static function getMachinedWorkOrderItemNo($work_order_no)
	{
		return DB::table('machining_work_order_stock')
				->where('work_order_no',$work_order_no)
				->get();
	}

	//Checks for negative weights in stock table
	public static function checkZeroWeight()
	{
		return DB::table('machining_work_order_stock')
			   ->where('quantity','<',0)
			   ->get();
	}

}


?>