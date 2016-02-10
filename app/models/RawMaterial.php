<?php

class RawMaterial extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('raw_material')
				->insert($records_array);
	}

	public static function getExcelData()
	{
		return DB::table('raw_material')
				->select()
				->get();
	}

	public static function getAllData()
	{
		return DB::table('raw_material')
				->select()
				->get();
	}

	public static function getDateData()
	{
		$date=date("Y-m-d");
		return DB::table('raw_material')
				->select()
				->where('date','=',$date)
				->get();
	}


	public static function getLastRecord()
	{
		return DB::table('raw_material')
				->orderBy('internal_no', 'desc')
				->first();
	}

	public static function getRecord($id)
	{
		return DB::table('raw_material')
				->select()
				->where('internal_no','=',$id)
				->get();
	}

	public static function returnAvailableWeight($heat_no)
	{
		return DB::table('raw_material')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
	}

	public static function updateAvailableWeight($heat_no,$available_weight)
	{

		return DB::table('raw_material')
			->where('heat_no','=',$heat_no)
			->update(array('available_weight' => $available_weight));
	}

	public static function getHeatNo()
	{
		return DB::table('raw_material')
			->select()
			->where('available_weight','>',0)
			->get();
	}

	public static function availableWeight()
	{
		return DB::table('raw_material')
			->select()
			->where('available_weight','>',0)
			->get();
	}

	public static function deleteRecord($id)
	{
		return DB::table('raw_material')
			->where('internal_no','=',$id)
			->delete();
	}
}