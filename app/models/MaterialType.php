<?php


/* ------------------- MASTER DESCRIPTION TYPE ---------------------
 this is master type data, used to store standard type which is used as dropdown entry in cutting and forging table  */

class MaterialType extends Eloquent {
	protected $fillable = [];

	//returns type form master data
	public static function getMaterialType()
	{
		return DB::table('master_material_type')
				->select()
				->get();
	}

	public static function insertMaterialType($input_data)
	{
		return DB::table('master_material_type')
				->insert($input_data);
	}

	public static function deleteMaterialType($id)
	{
		return DB::table('master_material_type')
				->where('id','=',$id)
				->delete();
	}

}