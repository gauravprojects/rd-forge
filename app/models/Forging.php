	<?php

	class Forging extends Eloquent
	{
		public static function insertData($records_array)
		{
			return DB::table('forging_records')
					->insert($records_array);
		}

		public static function getLastRecord()
		{
			return DB::table('forging_records')
					->orderBy('forging_id', 'desc')
					->first();
		}

		public static function getAllRecords()
		{
			return DB::table('forging_records')
					->select()
					->get();
		}

		public static function getDatedata()
		{
			$date=date("Y-m-d");
			return DB::table('forging_records')
					->select()
					->where('date','=',$date);
		}

		public static function getData($id)
		{
			return DB::table('forging_records')
					->select()
					->where('forging_id','=',$id)
					->get();
		}

		public static function getNullArray()
		{
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
			return DB::table('cutting_records')
					->select('heat_no')
					->where('available_weight_cutting','>',0)
					->get();
		}
	}