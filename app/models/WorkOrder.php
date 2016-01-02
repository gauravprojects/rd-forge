<?php

class WorkOrder extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('work_order_details')
				->insert($records_array);
	}

	public static function getRecord($work_id)
	{
		return DB::table('work_order_material_details')
				->select()
				->where('work_id','=',$work_id);
	}


	public static function getLastRecord()
	{
		return DB::table('work_order_details')
				->orderBy('work_order_no','desc')
				->first();
	}


	public static function getWorkOrderDetails($work_order_no)
	{
		return DB::table('work_order_material_details')
			->select()
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getOrderDetails($work_order_no)
	{
		return DB::table('work_order_details')
				->select()
				->where('work_order_no','=',$work_order_no)
				->get();
	}



	public static function availableWorkOrderNo()
	{
		return DB::table('work_order_details')
				->select('work_order_no','customer_name','purchase_order_date')
				->where('status','=','0')
				->get();
	}

	public static function respectiveItemNo($work_order_no)
	{
		return DB::table('work_order_material_details')
			->select()
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getRecordByWorkOrderDeails($work_order_no)  //from work order details
	{
		return DB::table('work_order_details')
			->select()
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getRecordByWorkOrderMaterialDetails($work_order_no)
	{
		return DB::table('work_order_material_details')
			->select()
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getAllRecordsWorkOrderDetails()
	{
		return DB::table('work_order_details')
			->select()
			->get();
	}

	public static function getAllRecordsWorkOrderMaterialDetails()
	{
		return DB::table('work_order_material_details')
			->select()
			->get();
	}



}