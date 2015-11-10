<?php

class Grades extends \Eloquent {
	protected $fillable = [];

	public static function getGrades()
	{
		return DB::table('master_grades')
				->select()
				->get();
	}

	public static function insertGrades($input_data)
	{
		return DB::table('master_grades')
				->insert($input_data);
	}

	public static function deleteGrades($id)
	{
		return DB::table('master_grades')
				->where('id','=',$id)
				->delete();
	}

}