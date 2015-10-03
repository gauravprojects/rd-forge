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

Route::get('/','loginPageController@create');
//route for the home page
Route::get('/home',array('uses'=>'homePageController@index'));

//route to get to the raw material form page
Route::get('/raw','rawMaterialController@index');

//route to get to cutting materials form page
Route::get('/cutting','cuttingPageController@index');

Route::resource('raw','rawMaterialController');

Route::get('login',array('uses'=>'loginPageController@create','as'=>'login.create'));

Route::post('login',array('uses'=>'loginPageController@store','as'=>'login.store'));

Route::get('logout','loginPageController@destroy');


//route to control all the process of the login page

