<?php

                    //ROUTES FOR LOGIN AND LOGOUT

	Route::get('/','loginPageController@create');
	Route::get('login',array(

	'as'=>'login.create',
	'uses'=>'loginPageController@create',

	));

	Route::post('login',array(

	'as'=>'login.store',
	'uses'=>'loginPageController@store'

	));

	Route::get('logout','loginPageController@destroy');

	                //ROUTES FOR HOME PAGE

	Route::get('/home',array('uses'=>'homePageController@index'));


	                //ROUTES FOR RAW MATERIAL DATA

	//route to get to the raw material form page
	Route::get('/raw','rawMaterialController@index');

	//route for storing data from storing data from raw material
	Route::post('/raw','rawMaterialController@store');

	//route to transfer raw material data to excel sheet
	Route::get('/raw/excel',array(

	'as'=>'raw.excel',
	'uses'=>'rawMaterialController@excel'

	));

	// to update if any wrong record is entered
	Route::get('/raw/update/{id}',array(
		'as' => 'raw.update',
		'uses'=> 'rawMaterialController@update'
	));

	//to store the updated data
	Route::post('/raw/update/{id}',array(
		'as' => 'raw.update_store',
		'uses'=>'rawMaterialController@update_store'
));

	                //ROUTES TO STORE CUTTING DATA MATERIAL

	//route to get to cutting materials form page
	Route::get('/cutting','cuttingPageController@index');

	//route to send data from storing cutting data to excel
	Route::get('/cutting/excel',array(

	'as'=>'cutting.excel',
	'uses'=>'cuttingPageController@excel'

	));

	//route to store cutting form data
	Route::post('/cutting',array(

	'as'=>'cutting.store',
	'uses'=>'cuttingPageController@store'

	));

     				//ROUTES FOR ADMIN PAGE

	Route::get('/admin',array(

	'as'=>'admin.page',
	'uses'=>'adminPageController@index'

	));

	Route::get('/admin/log',array(

	'as'=>'admin.log',
	'uses'=>'adminPageController@logBook'

	));


					//  ROUTES FOR REPORTS

	// route for reports home page inside admin pannel
	Route::get('/admin/reports','adminPageController@show_reports');

	// route for raw material reports.. can pe opened form admin pannel
	Route::get('/admin/reports/raw',array(

	'as'=>'raw.report',
	'uses'=>'rawMaterialController@show'

	));

	// route for cutting material reports..
	Route::get('/admin/reports/cutting',array(

	'as'=>'cutting.report',
	'uses'=>'cuttingPageController@show'

	));

	// route for forging material reports..
	Route::get('/admin/reports/forging',array(

	'as'=>'forging.report',
	'uses'=>'forgingController@show'

	));


					//ROUTES FOR FORGING DATA


	// form for forging data
	Route::get('/forging',array(

	'as'=>'forging.index',
	'uses'=>'forgingController@index'

	));

	Route::post('/forging',array(

	'as'=>'forging.store',
	'uses'=>'forgingController@store'

	));

	Route::get('/forging/confirm',array(

	'as'=>'forging.show',
	'uses'=>'forgingController@show'

	));

	Route::get('/forging/excel',array(

	'as'=>'forging.excel',
	'uses'=>'forgingController@excel'

	));


	    				//ROUTES FOR WORK ORDER ENTRY

	//form1 for index
	Route::get('/workOrder',array(

	'as'=>'work.index',
	'uses'=>'workOrderController@index'

	));

	//for saving work order data
	Route::post('/workOrder',array(

	'as'=>'work.store',
	'uses'=>'workOrderController@store'

	));

	Route::post('/workOrder/details',array(

	'as'=>'work.store_more',
	'uses'=>'workOrderController@store_more'

	));


	// ROUTES FOR MACHINGING DATA

	//for going to maching form
	Route::get('/machining',array(
		'uses'=>'machiningController@index',
		'as'=>'machining'
	));

	//store data from maching form
	Route::post('/machining',array(

		'uses'=>'machiningController@store',
		'as'=>'machining.store'
	));

	// to show reports for machining entries

	Route::get('machining/reports',array(
		'uses'=>'machiningController@show',
		'as'=>'machining.report'
	));

	// to move data to the excel sheets

	Route::get('machining/reports/excel',array(
		'as' =>	'machining.excel',
		'uses'=> 'machiningController@excel'

	));


//ROUTES FOR DRILLING PAGE


//route to get to the drilling page
Route::get('/drilling',array(
	'as' => 'drilling',
	'uses'=>'drillingController@index'
));


//route ot get to store the drillig page information
Route::post('/drilling',array(
	'as' => 'drilling.store',
	'uses' => 'drillingController@store'
));

//route to show report for drilling page
Route::get('drilling/report',array(
	'as' => 'drilling.report',
	'uses' => 'drillingController@show'
));

//route to show reports in excel
Route::get('drilling/report/excel',array(
	'as'=>'drilling.excel',
	'uses'=>'drillingController@excel'
));

// ROUTES FOR SERATION PAGE

//route to get to the drilling page
Route::get('/seration',array(
	'as' => 'seration',
	'uses'=>'serationController@index'
));


//route ot get to store the drillig page information
Route::post('/seration',array(
	'as' => 'seration.store',
	'uses' => 'serationController@store'
));

//route to show report for drilling page
Route::get('seration/report',array(
	'as' => 'seration.report',
	'uses' => 'serationController@show'
));

//route to show reports in excel
Route::get('seration/report/excel',array(
	'as'=>'seration.excel',
	'uses'=>'serationController@excel'
));


	// Routes for master Data

	//Routes for manufacture

Route::get('admin/manufacturers',array(
	'as' => 'manufacturers.show',
	'uses' => 'masterController@showManufactures'
));

Route::post('admin/manufacturers',array(
	'as' => 'manufactures.store',
	'uses'=> 'masterController@storeManufacturers'
));

Route::get('admin/manufacturers/{id}',array(
	'as' => 'manufacturer.delete',
	'uses' => 'masterController@deleteManufacturer'
));


Route::get('admin/grades',array(
	'as' => 'materialGrade.show',
	'uses' => 'masterController@showGrades'
));

Route::post('admin/grades',array(
	'as' => 'materialGrade.store',
	'uses'=> 'masterController@storeGrades'
));

Route::get('admin/grades/{id}',array(
	'as' => 'materialGrade.delete',
	'uses' => 'masterController@deleteGrades'
));