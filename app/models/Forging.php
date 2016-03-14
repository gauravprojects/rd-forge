	<?php

	class Forging extends Eloquent
	{
		public static function insertData($records_array)
		{
			// inserts data in forging_records table

			return DB::table('forging_records')
					->insert($records_array);
		}

		public static function updateAllData($forging_id,$array)
		{
			return DB::table('forging_records')
				  ->where('forging_id',$forging_id)
				  ->update($array);
		}

		public static function getRecord($id)
		{
			return DB::table('forging_records')
					->select()
					->where('forging_id','=',$id)
					->get();
		}

		public static function getLastRecord()
		{
			// returns the last record entered in the forging_records table
			// returns the records of highested entered forging_id, as they are auto incremented
			// so highest one will be the last entered one

			return DB::table('forging_records')
					->orderBy('forging_id', 'desc')
					->first();
		}

		public static function delete_record($id)
		{
			return DB::table('forging_records')
				->where('forging_id','=',$id)
				->delete();
		}

		public static function getData($id)
		{
			return DB::table('forging_records')
					->select()
					->where('forging_id','=',$id)
					->get();
		}

		public static function getAllData()
		{

			// returns all records for forging reports

			return DB::table('forging_records')
					->select()
					->get();
		}


		public static function getNullArray()
		{
			//returns null array to facilitate update without using an extra blade
			// $dataArray returns all the value of the record to be updated to the forge blade

			$dataArray= array(
				'forging_id'=>null,
				'date' => null,
				'weight_per_piece' => null,
				'heatNo' => null,
				'standard_size' => null,
				'pressure' => null,
				'type' => null,
				'schedule' => null,
				'quantity' => null,
				'remarks' => null
			);

			return $dataArray;
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
			//stores weight availbale for forging ie from cutting inventory
			return DB::table('cutting_records')
					->select('available_weight_cutting')
					->where('heat_no','=',$heat_no)
					->get();
		}
	}