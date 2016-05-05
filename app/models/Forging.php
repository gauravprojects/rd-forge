	<?php

	class Forging extends Eloquent
	{
		/* --------------------------------- FORGING MODULE -------------------------------
									TABLE NAME:  forging_records					*/

		//Insert data in the specified table				
		public static function insertData($records_array)
		{
			return DB::table('forging_records')
					->insert($records_array);
		}

		// Updates all the forging record data based on specified forging_id
		public static function updateAllData($forging_id,$array)
		{
			return DB::table('forging_records')
				  ->where('forging_id',$forging_id)
				  ->update($array);
		}

		//Get data based on id from the specified table
		public static function getRecord($id)
		{
			return DB::table('forging_records')
					->where('forging_id','=',$id)
					->get();
		}

		//Get the last entered record from the specified table
		public static function getLastRecord()
		{
			return DB::table('forging_records')
					->orderBy('forging_id', 'desc')
					->first();
		}

		// Deletes all the forging record data based on specified forging_id
		public static function delete_record($id)
		{
			return DB::table('forging_records')
				->where('forging_id','=',$id)
				->delete();
		}

		//Get data based on id from the specified table
		public static function getData($id)
		{
			return DB::table('forging_records')
					->where('forging_id','=',$id)
					->get();
		}

		//Get all data from the specified table
		public static function getAllRecords()
		{
			return DB::table('forging_records')->get();
		}

		public static function availableHeatNo()
		{

			// this stores material value avialable for forging process
			// available_weight_cutting is the amount of material which has been cutted and is ready for forging

			return DB::table('cutting_records')
					->select('heat_no')
					->where('available_weight_cutting','>',0)
					->get();
		}

		public static function getAvailableWeight($heat_no)
		{
			return DB::table('cutting_records')
					->select('available_weight_cutting')
					->where('heat_no','=',$heat_no)
					->get();
		}
		public static function updateCuttingWeight($heat_no,$available_weight_cutting)
		{
			return DB::table('cutting_records')
					->where('heat_no','=',$heat_no)
					->update(array('available_weight_cutting'=>$available_weight_cutting));
		}

		public static function availableWeight($heat_no)
		{
			return DB::table('cutting_records')
					->select('available_weight_cutting')
					->where('heat_no','=',$heat_no)
					->get();
		}
	}