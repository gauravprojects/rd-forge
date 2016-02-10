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

	public static function updateAvailableWeight($heat_no,$available_weight)
	{

		return DB::table('raw_material_stock')
			->where('heat_no','=',$heat_no)
			->update(array('available_weight' => $available_weight));
	}

	public static function getHeatNo()
	{
		return DB::table('raw_material_stock')
			->select()
			->where('available_weight','>',0)
			->get();
	}
}

?>