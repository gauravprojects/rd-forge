<?php

class Grades extends Eloquent {
	protected $fillable = [];

	//Returns grades form master data
	public static function getGrades()
	{
		return DB::table('master_grades')
				->select()
				->get();
	}

	//Inserts grades into master data
	public static function insertGrades($input_data)
	{
		return DB::table('master_grades')
				->insert($input_data);
	}

	//Deletes grades from master data
	public static function deleteGrades($id)
	{
		return DB::table('master_grades')
				->where('id','=',$id)
				->delete();
	}

}