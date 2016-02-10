<?php

class CuttingStock extends Eloquent
{
	public static function insertData($records_array)
	{
		return DB::table('cutting_stock')
			->insert($records_array);
	}

	public static function availableCutting()
	{
		return DB::table('cutting_stock')->get();
	}

}


?>