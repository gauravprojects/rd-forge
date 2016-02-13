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

        var_dump($category);

        // Latest array is used as key values pairs array for searching the details

        // for($p = 0;$p < count($options_name); $p++)
        //     $latest_array[$options_name[$p]] = $options_values[$p];

        // $response = DB::table('raw_material_stock')
        //         ->where($latest_array)
        //         ->get();

        // var_dump($response);
        
//        $response= DB::table('raw_material')
//            ->select()
//            ->where($data['options'],'=',''.$data['selected'].'')
//            ->get();
        // $query= DB::raw("SELECT * FROM raw_material WHERE ". $data['options']."= '" .$data['selected']."'");
        // $response= DB::select($query);

        // return View::make('search.search_new')
        //     ->with('data',$response);

        // dd($response);
    }


}