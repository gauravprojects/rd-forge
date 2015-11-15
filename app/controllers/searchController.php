<?php

class searchController extends \BaseController {

    /*  ----------------------------------- FUNCTIONS USED ------------------------------------



    */

    public function index()
    {
        $categories= search::getCategory();
        return View::make('search.search')
            ->with('categories',$categories);
    }

    public function returnOptions($id)
    {
        $options= search::returnOptions($id);
        $options_array= array();
        $count=0;

        foreach($options as $option)
        {
            //var_dump($option->options);
            //$array = array_add($array, 'key', 'value');
            $options_array=array_add($options_array,++$count,$option->options);
            //dd($option->options);
        }
       // return 0;
        return $options_array;

        //return $options;
        // now headache is how to counter this object problem

//        $sample= array(
//            'name' => 'gaurav',
//            'class'=> 'EC1',
//        );
//        $sample_json= json_encode($sample);
//        return $sample_json;

        //return $options_json;

    }


}