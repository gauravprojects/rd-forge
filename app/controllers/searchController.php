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
        $latest_array = [];
        $again_array = [];

        $flag = 0;
        // Latest array is used as key values pairs array for searching the details

        for($p = 0;$p < count($options_name); $p++)
        {
            if($options_name[$p] == "start_date" || $options_name[$p] == "end_date")
            {
                 $flag = 1;
                 $again_array[$options_name[$p]] = $options_values[$p];
             }
             else
                $latest_array[$options_name[$p]] = $options_values[$p];
        }


        if($flag == 1)
            $response = DB::table($category)->whereBetween('date',array($again_array['start_date'],$again_array['end_date']))->where($latest_array)->get();
        else
            $response = DB::table($category)->where($latest_array)->get();

        return json_encode($response);
       
    }


}