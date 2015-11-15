<?php

class search extends \Eloquent {
    protected $fillable = [];

   public static function getCategory()
   {
       return DB::table('search_selection')
           ->select('category')
           ->distinct()
           ->get();
   }

    public static function returnOptions($category)
    {
        return DB::table('search_selection')
            ->select('options')
            ->where('category','=',$category)
            ->get();
    }

}