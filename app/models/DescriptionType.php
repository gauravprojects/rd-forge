<?php


/* ------------------- MASTER DESCRIPTION TYPE ---------------------
 this is master type data, used to store standard type which is used as dropdown entry in cutting and forging table  */

class DescriptionType extends \Eloquent {
	protected $fillable = [];

	//returns type form master data
	public static function getType()
	{
		return DB::table('master_description_type')
				->select()
				->get();
	}

	public static function insertType($input_data)
	{
		return DB::table('master_description_type')
				->insert($input_data);
	}

	public static function deleteType($id)
	{
		return DB::table('master_description_type')
				->where('id','=',$id)
				->delete();
	}

}