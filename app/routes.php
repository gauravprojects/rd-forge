<?php

/*
 *
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------

    Route url                           Used for                                Function Called

    /                                   go to home page                         HomeController@home
    /raw                                go to raw materials form                HomeController@raw_material
    /cutting                            go to cutting data form                 HomeController@cutting



*/
//route for the home page
Route::get('/','HomeController@home');

//route to get to the raw material form page
Route::get('/raw','HomeController@raw_material');

//route to get to cutting materials form page
Route::get('/cutting','HomeController@cutting');

