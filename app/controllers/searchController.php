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
        // now headache is how to counter this object problem
        $options= json_encode($options);
        return $options;
    }


}