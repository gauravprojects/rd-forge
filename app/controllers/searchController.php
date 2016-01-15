<?php

class searchController extends \BaseController {

    /*  ----------------------------------- FUNCTIONS USED ------------------------------------



    */

    public function index()
    {
        $response= RawMaterial::getAllData();
        return View::make('search.search_new')
            ->with('data',$response);

    }

    public function returnOptions($id)
    {
//        $options= search::returnOptions($id);
//        $options_array= array();
//        $count=0;
//
//        foreach($options as $option)
//        {
//            $options_array=array_add($options_array,++$count,$option->options);
//        }
//        return $options_array;
    }

    public function store()
    {
        $data= Input::get();
//        $response= DB::table('raw_material')
//            ->select()
//            ->where($data['options'],'=',''.$data['selected'].'')
//            ->get();

        $query= DB::raw("SELECT * FROM raw_material WHERE ". $data['options']."= '" .$data['selected']."'");
        $response= DB::select($query);

        return View::make('search.search_new')
            ->with('data',$response);

        dd($response);
    }


}