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

		Route::get('/raw/available',array(
			'as' => 'raw.available',
			'uses' => 'rawMaterialController@available'
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

		//route to update cutting form data
		Route::get('/cutting/update/{id}',array(
			'as' => 'cutting.update',
			'uses' => 'cuttingPageController@update'
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

		Route::get('/forging/update/{id}',array(
			'as' => 'forging.update',
			'uses' => 'forgingController@update'
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


		// to add another entry in work order
		Route::post('/workOrder/details/add/{id}',array(
			'as'=>'work.details_add',
			'uses'=>'workOrderController@details_add'
		));

		// to modify any previuosly entered work order detail
		Route::post('/workOrder/details/modify/{id}',array(
			'as' => 'work.details_modify',
			'uses' => 'workOrderController@details_modify'
		));

		// to delete any false entered data in the work order details
		Route::post('workOrder/details/delete/{id}',array(
			'as' => 'work.details_delete',
			'uses'=> 'workOrderController@details_delete'
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



	// ROUTES FOR SIZES

	Route::get('admin/sizes',array(
		'as' => 'sizes.show',
		'uses' => 'masterController@showSizes'
	));


	Route::post('admin/sizes',array(
		'as' => 'sizes.store',
		'uses'=> 'masterController@storeSizes'
	));

	Route::get('admin/sizes/{id}',array(
		'as' => 'sizes.delete',
		'uses' => 'masterController@deleteSizes'
	));

	// ROUTES FOR Pressures

	Route::get('admin/pressure',array(
		'as' => 'pressure.show',
		'uses' => 'masterController@showPressure'
	));


	Route::post('admin/pressure',array(
		'as' => 'pressure.store',
		'uses'=> 'masterController@storePressure'
	));

	Route::get('admin/pressure/{id}',array(
		'as' => 'pressure.delete',
		'uses' => 'masterController@deletePressure'
	));

	// ROUTES FOR STANDARD SIZES

				 Route::get('admin/standard',array(
					 'as' => 'sizesStandard.show',
					 'uses' => 'masterController@showStandardSizes'
				 ));


				 Route::post('admin/standard',array(
					 'as' => 'sizesStandard.store',
					 'uses'=> 'masterController@storeStandardSizes'
				 ));

				Route::get('admin/standard/{id}',array(
					'as' => 'sizesStandard.delete',
					'uses' => 'masterController@deleteStandardSizes'
				));


	// ROUTES FOR STANDARD SCHEDULES

				 Route::get('admin/schedule',array(
					 'as' => 'schedule.show',
					 'uses' => 'masterController@showSchedule'
				 ));


				 Route::post('admin/schedule',array(
					 'as' => 'schedule.store',
					 'uses'=> 'masterController@storeSchedule'
				 ));

				Route::get('admin/schedule/{id}',array(
					'as' => 'schedule.delete',
					'uses' => 'masterController@deleteSchedule'
				));



	// ROUTES FOR TYPES IN DESCRIPTION DATA

	Route::get('admin/type',array(
		'as' => 'type.show',
		'uses' => 'masterController@showType'
	));


	Route::post('admin/type',array(
		'as' => 'type.store',
		'uses'=> 'masterController@storeType'
	));

	Route::get('admin/type/{id}',array(
		'as' => 'type.delete',
		'uses' => 'masterController@deleteType'
	));






	// TESTING ROUTES

	Route::get('/testing',array(
		'as' => 'testing',
		'uses' => 'testingController@show'
	));

	Route::post('/testing',array(
		'as' => 'testing.store',
		'uses' => 'testingController@store'
	));




	Route::get('/auto',array(
		'as' => 'auto',
		'uses' => 'testingController@auto'
	));

	Route::post('/auto',array(
		'as' => 'auto.store',
		'uses'=>'testingController@autoStore'
	));


