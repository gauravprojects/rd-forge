<?php

class RawMaterial extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('raw_material_records')
				->insert($records_array);
	}

	public static function getExcelData()
	{
		return DB::table('raw_material_records')
				->select()
				->get();
	}

	public static function getAllData()
	{
		return DB::table('raw_material_records')
				->select()
				->get();
	}

	public static function updateAllData($internal_no,$array)
	{
		return DB::table('raw_material_records')
			  ->where('internal_no',$internal_no)
			  ->update($array);
	}

	public static function getDateData()
	{
		$date=date("Y-m-d");
		return DB::table('raw_material_records')
				->select()
				->where('date','=',$date)
				->get();
	}

	public static function getLastRecord()
	{
		return DB::table('raw_material_records')
				->orderBy('internal_no', 'desc')
				->first();
	}

	public static function getRecord($id)
	{
		return DB::table('raw_material_records')
				->select()
				->where('internal_no','=',$id)
				->get();
	}

	public static function returnAvailableWeight($heat_no)
	{
		return DB::table('raw_material_records')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
	}

	public static function updateAvailableWeight($heat_no,$available_weight)
	{

		return DB::table('raw_material_records')
			->where('heat_no','=',$heat_no)
			->update(array('available_weight' => $available_weight));
	}

	public static function getHeatNo()
	{
		return DB::table('raw_material_records')
			->select()
			->where('available_weight','>',0)
			->get();
	}

	public static function availableWeight()
	{
		return DB::table('raw_material_records')
			->select()
			->where('available_weight','>',0)
			->get();
	}

	public static function deleteRecord($id)
	{
		return DB::table('raw_material_records')
			->where('internal_no','=',$id)
			->delete();
	}

	public static function getSerializedData()
	{
		return DB::select(DB::raw('SELECT @serial := @serial+1 AS serial FROM (SELECT @serial:=0) AS hello,raw_material_records'));
	}
}