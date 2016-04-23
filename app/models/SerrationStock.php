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


	public static function getRecord($id)
	{
		return DB::table('drilling_records')
				->select()
				->where('drilling_id','=',$id)
				->get();
	}

	public static function getLastRecord()
	{
		return DB::table('drilling_records')
				->orderBy('drilling_id', 'desc')
				->first();
	}

	public static function getAllData()
	{
		return DB::table('drilling_records')
				->select()
				->get();
	}

	public static function HeatNo_availableWeightForging()
	{
		return DB::table('forging_records')
			->select('heat_no')
			->where('available_weight_forging','>','0')
			->get();
	}

	public static function deleteRecord($drilling_id)
	{
		return DB::table('drilling_records')
			->where('drilling_id','=',$drilling_id)
			->delete();
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