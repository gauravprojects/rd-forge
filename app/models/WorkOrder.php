<?php

class WorkOrder extends Eloquent
{
	/* --------------------------------- WORK ORDER MODULE -------------------------------
									TABLE NAME:  work_order_records and work_order_material_details				*/

	//Insert data in the specified table	
	public static function insertData($records_array)
	{
		return DB::table('work_order_records')
				->insert($records_array);
	}

	//Insert data in the specified table	
	public static function insertMaterialData($records_array)
	{
		return DB::table('work_order_material_details')
				->insert($records_array);
	}

	//Updates data in the work order records table based on work order number	
	public static function updateRecord($records_array,$work_order_no)
	{
		return DB::table('work_order_records')
			->where('work_order_no','=',$work_order_no)
			->update($records_array);
	}

	//Gets data from the work order material details based on work order id	
	public static function getRecord($work_id)
	{
		return DB::table('work_order_material_details')
				->where('work_id','=',$work_id)
				->get();
	}

	//Get the work order material details based on work order number and item number
	public static function getRecordFromItem($work_order_no,$work_order_item_no)
	{
		return DB::table('work_order_material_details')
				->where('work_order_no',$work_order_no)
				->where('item_no',$work_order_item_no)
				->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('work_order_records')
				->orderBy('work_order_no','desc')
				->first();
	}

	//Get the work order material details based on work order number
	public static function getWorkOrderDetails($work_order_no)
	{
		return DB::table('work_order_material_details')
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	//Get the work order details based on work order number
	public static function getOrderDetails($work_order_no)
	{
		return DB::table('work_order_records')
				->where('work_order_no','=',$work_order_no)
				->get();
	}

	//Get the work order records where status is 0
	public static function availableWorkOrderNo()
	{
		return DB::table('work_order_records')
				->select('work_order_no','customer_name','purchase_order_date')
				->where('status','=','0')
				->get();
	}

	public static function availableWorkOrderItemNo()
	{
		return DB::table('work_order_records')
				->join('work_order_material_details','work_order_records.work_order_no','=','work_order_material_details.work_order_no')
				->get();
	}

	public static function respectiveItemNo($work_order_no)
	{
		return DB::table('work_order_material_details')
			->select()
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getRecordByWorkOrderDetails($work_order_no)  //from work order details
	{
		return DB::table('work_order_records')
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	public static function getRecordByWorkOrderMaterialDetails($work_order_no)
	{
		return DB::table('work_order_material_details')
			->where('work_order_no','=',$work_order_no)
			->get();
	}

	//Get the work order records 
	public static function getAllRecordsWorkOrderDetails()
	{
		return DB::table('work_order_records')
			->select()
			->get();
	}

	//Get the work order material records 
	public static function getAllRecordsWorkOrderMaterialDetails()
	{
		return DB::table('work_order_material_details')
			->select()
			->get();
	}

	//Deletes the work order details based on work order number
	public static function deleteRecord($id)
	{
		 return DB::table('work_order_records')
			 ->where('work_order_no','=',$id)
			 ->delete();
	}

	//Deletes the work order material details based on work order number
	public static function deleteRecordMaterialDetails($id)
	{
		 return DB::table('work_order_material_details')
			 ->where('work_order_no','=',$id)
			 ->delete();
	}



}