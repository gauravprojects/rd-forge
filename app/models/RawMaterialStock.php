<?php

class RawMaterialStock extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('raw_material_stock')
				->insert($records_array);
	}

	public static function incrementWeight($heat_no,$available_weight)
	{
		return DB::table('raw_material_stock')
			->where('heat_no','=',$heat_no)
			->increment('available_weight',$available_weight);
	}

	public static function getHeatNumbers($heat_no)
	{
		return DB::table('raw_material_stock')
			   ->where('heat_no','=',$heat_no)
			   ->distinct()->get();
	}

	public static function availableWeight()
	{
		return DB::table('raw_material_stock')->get();
	}

	public static function returnAvailableWeight($heat_no)
	{
		return DB::table('raw_material_stock')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
	}

	public static function updateAvailableWeight($heat_no,$weight)
	{

		return DB::table('raw_material_stock')
			->where('heat_no','=',$heat_no)
			->decrement('available_weight',$weight);
	}

	public static function getHeatNo()
	{
		return DB::table('raw_material_stock')
			->select()
			->where('available_weight','>',0)
			->get();
	}

	public static function getAllData($data)
	{
		return DB::table('raw_material_stock')
			->where('heat_no',$data['heatNo'])
			->where('size',$data['size'])
			->get();
	}

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
}

?>