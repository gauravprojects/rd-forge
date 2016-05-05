<?php

class RawMaterial extends Eloquent
{
	/* --------------------------------- RAW MATERIAL MODULE -------------------------------
									TABLE NAME:  raw_material_records				*/

	//Insert data in the specified table
	public static function insertData($records_array)
	{
		return DB::table('raw_material_records')
				->insert($records_array);
	}

	//Get data in the excel form in the specified table
	public static function getExcelData()
	{
		return DB::table('raw_material_records')
				->select()
				->get();
	}

	//Get all the data in the specified table
	public static function getAllData()
	{
		return DB::table('raw_material_records')->get();
	}

	public static function updateAllData($internal_no,$array)
	{
		return DB::table('raw_material_records')
			  ->where('internal_no',$internal_no)
			  ->update($array);
	}

	//Get all the data dateweise from the specified table 
	public static function getDateData()
	{
		$date=date("Y-m-d");
		return DB::table('raw_material_records')
				->select()
				->where('date','=',$date)
				->get();
	}

	//Get the last entered record from the specified table
	public static function getLastRecord()
	{
		return DB::table('raw_material_records')
				->orderBy('internal_no', 'desc')
				->first();
	}

	//Get the record from the specified table belonging to the internal number
	public static function getRecordFromInternalNo($internal_no)
	{
		return DB::table('raw_material_records')
				->where('internal_no','=',$internal_no)
				->get();
	}

	//Get the available weight from the specified table belonging to the heat number
	public static function returnAvailableWeight($heat_no)
	{
		return DB::table('raw_material_records')
				->select('available_weight')
				->where('heat_no','=',$heat_no)
				->get();
	}

	//Update the available weight from the specified table belonging to the heat number
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

	//Delete the record from the specified table belonging to the internal number

	public static function deleteRecord($internal_no)
	{
		return DB::table('raw_material_records')
			->where('internal_no','=',$internal_no)
			->delete();
	}

	//Sample tester function not required
	public static function getSerializedData()
	{
		return DB::select(DB::raw('SELECT @serial := @serial+1 AS serial FROM (SELECT @serial:=0) AS hello,raw_material_records'));
	}

	//Get the data from the specified table belonging to the specific heat number and size
	public static function getHeatSizeData($heat_no,$size)
	{
		return DB::table('raw_material_records')
			   ->where('heat_no',$heat_no)
			   ->where('size',$size)
			   ->get();
	}
}