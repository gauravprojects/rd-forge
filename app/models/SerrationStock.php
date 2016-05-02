<?php

class SerrationStock extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- DRILLING MODULE -------------------------------
									TABLE NAME:  drilling records					*/

	public static function insertData($input_array)
	{
		return DB::table('serration_work_order_stock')
				->insert($input_array);
	}

	public static function decrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->decrement('quantity',$quantity);
	}

	public static function incrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->increment('quantity',$quantity);
	}

	public static function getWorkOrderItemData($work_order_no,$item_no)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->get();
	}


}