<?php

                //ROUTES FOR LOGIN AND LOGOUT

Route::get('/','loginPageController@create');
Route::get('login',array('uses'=>'loginPageController@create','as'=>'login.create'));

Route::post('login',array('uses'=>'loginPageController@store','as'=>'login.store'));

Route::get('logout','loginPageController@destroy');

                //ROUTES FOR HOME PAGE
Route::get('/home',array('uses'=>'homePageController@index'));


                //ROUTES FOR RAW MATERIAL DATA

//route to get to the raw material form page
Route::get('/raw','rawMaterialController@index');

//route for storing data from storing data from raw material
Route::post('/raw','rawMaterialController@store');

//route to transfer raw material data to excel sheet
Route::get('/raw/excel',array('uses'=>'rawMaterialController@excel','as'=>'raw.excel'));

                //ROUTES TO STORE CUTTING DATA MATERIAL

//route to get to cutting materials form page
Route::get('/cutting','cuttingPageController@index');

//route to send data from storing cutting data to excel
Route::get('/cutting/excel',array('uses'=>'cuttingPageController@excel','as'=>'cutting.excel'));

//route to store cutting form data
Route::post('/cutting',array('uses'=>'cuttingPageController@store','as'=>'cutting.store'));

                //ROUTES FOR ADMIN PAGE

Route::get('/admin',array('uses'=>'adminPageController@index','as'=>'admin.page'));

Route::get('/admin',array('uses'=>'adminPageController@index','as'=>'admin.page'));



                //  ROUTES FOR REPORTS

// route for reports home page inside admin pannel
Route::get('/admin/reports','adminPageController@show_reports');

// route for raw material reports.. can pe opened form admin pannel
Route::get('/admin/reports/raw',array('uses'=>'rawMaterialController@show','as'=>'raw.report'));

// route for cutting material reports..
Route::get('/admin/reports/cutting',array('uses'=>'cuttingPageController@show','as'=>'cutting.report'));

// route for forging material reports..
Route::get('/admin/reports/forging',array('uses'=>'forgingController@show','as'=>'forging.report'));






        //ROUTES FOR FORGING DATA


// form for forging data
Route::get('/forging',array('uses'=>'forgingController@index','as'=>'forging.index'));

Route::post('/forging',array('uses'=>'forgingController@store','as'=>'forging.store'));

Route::get('/forging/confirm',array('uses'=>'forgingController@show','as'=>'forging.show'));

Route::get('/forging/excel',array('uses'=>'forgingController@excel','as'=>'forging.excel'));