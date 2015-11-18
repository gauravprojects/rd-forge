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
            $options_array=array_add($options_array,++$count,$option->options);
        }
        return $options_array;
    }

    public function store()
    {
        $data= Input::get();
        dd($data);
    }


}