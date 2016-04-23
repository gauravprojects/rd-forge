<?php

class WorkOrder extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('work_order_records')
				->insert($records_array);
	}

	public static function updateRecord($records_array,$work_order_no)
	{
		return DB::table('work_order_records')
			->where('work_order_no','=',$work_order_no)
			->update($records_array);

	}

	public static function getRecord($work_id)
	{
		return DB::table('work_order_material_details')
				->select()
				->where('work_id','=',$work_id);
	}

	public static function getRecordFromItem($work_order_no,$work_order_item_no)
	{
		return DB::table('work_order_material_details')
				->where('work_order_no',$work_order_no)
				->where('item_no',$work_order_item_no)
				->get();
	}


	public static function getLastRecord()
	{
		return DB::table('work_order_records')
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
		return DB::table('work_order_records')
				->select()
				->where('work_order_no','=',$work_order_no)
				->get();
	}



	public static function availableWorkOrderNo()
	{
		return DB::table('work_order_records')
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

	public static function getRecordByWorkOrderDetails($work_order_no)  //from work order details
	{
		return DB::table('work_order_records')
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
		return DB::table('work_order_records')
			->select()
			->get();
	}

	public static function getAllRecordsWorkOrderMaterialDetails()
	{
		return DB::table('work_order_material_details')
			->select()
			->get();
	}

	public static function deleteRecord($id)
	{
		 DB::table('work_order_records')
			 ->where('work_order_no','=',$id)
			 ->delete();

		 return DB::table('work_order_material_details')
			 ->where('work_order_no','=',$id)
			 ->delete();
	}

	public static function deleteRecordMaterialDetails($id)
	{
		 return DB::table('work_order_material_details')
			 ->where('work_order_no','=',$id)
			 ->delete();
	}

	public static function deleteStockMaterialDetails($id)
	{
		 return DB::table('work_order_material_stock')
			 ->where('work_order_no','=',$id)
			 ->delete();
	}

	public static function getOldStockDetails($id)
	{
		return DB::table('work_order_material_stock')
			 ->where('work_order_no','=',$id)
			 ->get();
	}	



}