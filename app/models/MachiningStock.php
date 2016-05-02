<?php

class MachiningStock extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('machining_work_order_stock')
			->insert($records_array);
	}

	public static function decrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->decrement('quantity',$quantity);
	}

	public static function incrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->increment('quantity',$quantity);
	}

	public static function getWorkOrderItemData($work_order_no,$item_no)
	{
		return DB::table('machining_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->get();
	}

	public static function getMachinedWorkOrderNo()
	{
		return DB::table('machining_work_order_stock')
				->join('work_order_records','machining_work_order_stock.work_order_no','=','work_order_records.work_order_no')
				->groupBy('work_order_records.work_order_no')
				->get();
	}

	public static function getMachinedWorkOrderItemNo($work_order_no)
	{
		return DB::table('machining_work_order_stock')
				->where('work_order_no',$work_order_no)
				->get();
	}

}


?>