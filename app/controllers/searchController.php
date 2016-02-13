<?php

class searchController extends BaseController {

    /*  ----------------------------------- FUNCTIONS USED ------------------------------------



    */

    public function index()
    {
        return View::make('search.search_master');
        //return View::make('search.search_new')->with('data',RawMaterial::getAllData());


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

    public function display()
    {
        $options_name = Input::get('options_name');
        $options_values = Input::get('options_values');
        $category = Input::get('category');

        // Latest array is used as key values pairs array for searching the details

        for($p = 0;$p < count($options_name); $p++)
            $latest_array[$options_name[$p]] = $options_values[$p];

        $response = DB::table($category)
                ->where($latest_array)
                ->get();

        return json_encode($response);
       
    }


}