<?php

class RawMaterialStock extends Eloquent
{

	//Insert data in the specified table
	public static function insertData($records_array)
	{
		return DB::table('raw_material_stock')
				->insert($records_array);
	}

	//Increment the weight belonging to the heat number and size
	public static function incrementWeight($heat_no,$size,$weight)
	{
		return DB::table('raw_material_stock')
			->where('heat_no',$heat_no)
			->where('size',$size)
			->increment('available_weight',$weight);
	}

	//Get data of the distinct heat numbers
	public static function getHeatNumbers($heat_no)
	{
		return DB::table('raw_material_stock')
			   ->where('heat_no','=',$heat_no)
			   ->distinct()->get();
	}

	//Get the available stock from the specified table where its > 0
	public static function availableWeight()
	{
		return DB::table('raw_material_stock')
			->where('available_weight','>',0)
			->get();
	}

	//Get the available weight from the specified table belonging to the heat number
	public static function returnAvailableWeight($heat_no)
	{
		return DB::table('raw_material_stock')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
	}

	public static function getHeatNo()
	{
		return DB::table('raw_material_stock')
			->where('available_weight','>',0)
			->get();
	}

	//Get all the data from the specified table belonging to the heat number and size
	public static function getAllData($data)
	{
		return DB::table('raw_material_stock')
			->where('heat_no',$data['heatNo'])
			->where('size',$data['size'])
			->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('raw_material_stock')
				->orderBy('stock_id', 'desc')
				->first();
	}

	public static function updateAllData($stock_id,$array)
	{
		return DB::table('raw_material_stock')
			  ->where('stock_id',$stock_id)
			  ->update($array);
	}

	//Get the data from the specified table belonging to the specific heat number and size
	public static function getHeatSizeData($heat_no,$size)
	{
		return DB::table('raw_material_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->get();
	}

	//Decrement the record belonging to the heat and size
	public static function decrementRecordByHeatSize($heat_no,$size,$weight)
	{
		return DB::table('raw_material_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->decrement('available_weight',$weight);
	}

	//Increment the record belonging to the heat and size
	public static function incrementRecordByHeatSize($heat_no,$size,$weight)
	{
		return DB::table('raw_material_stock')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->increment('available_weight',$weight);
	}

	public static function decrementRecordByStock($stock_id,$weight)
	{
		return DB::table('raw_material_stock')
			   ->where('stock_id',$stock_id)
			   ->decrement('available_weight',$weight);
	}

}

?>