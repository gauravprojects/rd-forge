<?php

class SerrationStock extends Eloquent {
	protected $fillable = [];

	/* --------------------------------- SERRATION MODULE -------------------------------
									TABLE NAME:  serration_work_order_stock				*/

	//Insert data in the specified table
	public static function insertData($input_array)
	{
		return DB::table('serration_work_order_stock')
				->insert($input_array);
	}

	//Decrements the quantity of specified work order in the serration stock
	public static function decrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->decrement('quantity',$quantity);
	}

	//Increments the quantity of specified work order in the serration stock
	public static function incrementWorkOrderItemData($work_order_no,$item_no,$quantity)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->increment('quantity',$quantity);
	}

	//Gets the serration stock data based on the work order and item numbers
	public static function getWorkOrderItemData($work_order_no,$item_no)
	{
		return DB::table('serration_work_order_stock')
			   ->where('work_order_no',$work_order_no)
			   ->where('item',$item_no)
			   ->get();
	}

	//Checks for negative weights in stock table
	public static function checkZeroWeight()
	{
		return DB::table('serration_work_order_stock')
			   ->where('quantity','<',0)
			   ->get();
	}
	public static function updateData($id,$records_array)
	{
		// trying raw php query here
		//return DB::select( DB::raw("UPDATE machining_work_order_stock SET weight='20' WHERE work_order_no='123456789' ") );
//  			dd(DB::table('serration_work_order_stock')
//				->where('serr_id',$id)
//				->get(),$records_array);
		return DB::table('serration_work_order_stock')
			->where('serr_id',$id)
			->update($records_array);
	}

	public static function  getDataSerationByOrderNoItemNo($order_no,$item_no)
	{
		return DB::table('serration_work_order_stock')
			->where('work_order_no',$order_no)
			->where('item',$item_no)
			->first();
	}


}