	<?php

						//ROUTES FOR LOGIN AND LOGOUT
		Route::get('hello',function(){

			return View::make('hello');
		});
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

		//to delete the record
		Route::get('/raw/delete/{id}',array(
			'as' => 'raw.delete',
			'uses' => 'rawMaterialController@destroy'
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

		Route::post('/cutting/update/{id}',array(
			'as' => 'cutting.update_store',
			'uses'=>'cuttingPageController@update_store'
		));

		Route::get('/cutting/delete/{id}',array(
			'as' => 'cutting.delete',
			'uses' => 'cuttingPageController@destroy'
		));

		//route to check weather the weight being cutted is vailable for that heat no
		Route::post('/cutting/availableTotalWeight',array(
			'as' => 'cutting.availableTotalWeight',
			'uses' => 'cuttingPageController@availableTotalWeight'
		));

		// route to admin pannel option which stores the cutted material avaialble for forging
		Route::get('/cutting/available',array(
			'as' => 'cutting.available',
			'uses' => 'cuttingPageController@available'
		));


						//ROUTES FOR ADMIN PAGE$data

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



	Route::get('/admin/reports/workOrder/excel',array(
		'as' => 'workOrder.report_excel',
		'uses' => 'workOrderController@excel'
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

		Route::post('/forging/update/{id}',array(
			'as' => 'forging.update_store',
			'uses'=>'forgingController@update_store'
		));

		Route::get('/forging/delete/{id}',array(
			'as' => 'forging.delete',
			'uses' => 'forgingController@destroy'
		));

		Route::get('/forging/confirm',array(

		'as'=>'forging.show',
		'uses'=>'forgingController@show'

		));

		Route::get('/forging/excel',array(

		'as'=>'forging.excel',
		'uses'=>'forgingController@excel'

		));

		Route::post('/forging/availableTotalWeight',array(
			'as' => 'forging.availableTotalWeight',
			'uses' => 'forgingController@availableTotalWeight'
		));

		Route::get('/forging/available',array(
			'as' => 'forging.available',
			'uses' => 'ForgingController@available'
		));




							//ROUTES FOR WORK ORDER ENTRY

		//form1 for index

		Route::get('/workOrderMaterial',array(

		'as'=>'work.getWorkOrderMaterial',
		'uses'=>'workOrderController@getWorkOrderMaterial'

		));


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

		//to update work order
		Route::get('/workOrder/update/{id}',array(
			'as' => 'work.update',
			'uses' => 'workOrderController@update'
		));

		//to update work order details
		Route::post('/workOrder/update',array(
			'as' => 'work.update_details',
			'uses' => 'workOrderController@update_store'
		));

		Route::post('workOrder/details/update/{id}',array(
			'as' => 'work.details_update',
			'uses' => 'workOrderController@update_details_store'
		));


		// to delete any false entered data in the work order details
		Route::get('workOrder/details/delete/{id}',array(
			'as' => 'work.details_delete',
			'uses'=> 'workOrderController@destroy'
		));


		//to get item no for a respective work order no using ajax call
		Route::post('/workOrder/{id}',array(
			'as' => 'work.item_details',
			'uses' => 'workOrderController@item_details'
		));

		Route::post('/drilling/update/workOrder/{id}',array(
			'as' => 'drilling.item_details',
			'uses' => 'workOrderController@item_details'
		));

		Route::post('/machining/update/workOrder/{id}',array(
				'as' => 'machining.item_details',
				'uses' => 'workOrderController@item_details'
			));

		Route::post('/serration/update/workOrder/{id}',array(
			'as' => 'serration.item_details',
			'uses' => 'workOrderController@item_details'
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

		Route::get('admin/reports/machining',array(
			'as'=>'machining.report',
			'uses'=>'machiningController@show'
		));

		Route::get('admin/reports/workOrder',array(
			'as' => 'workOrder.report',
			'uses' => 'workOrderController@show'
		));
		// to move data to the excel sheets

		Route::get('machining/reports/excel',array(
			'as' =>	'machining.excel',
			'uses'=> 'machiningController@excel'

		));


		// to update if any wrong record is entered
		Route::get('/machining/update/{id}',array(
			'as' => 'machining.update',
			'uses'=> 'machiningController@update'
		));

		//to store the updated data
		Route::post('/machining/update/{id}',array(
			'as' => 'machining.update_store',
			'uses'=>'machiningController@update_store'
		));

		Route::get('/machining/delete/{id}',array(
			'as' => 'machining.delete',
			'uses' => 'machiningController@destroy'
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
	Route::get('admin/reports/drilling',array(
		'as' => 'drilling.report',
		'uses' => 'drillingController@show'
	));

	//route to show reports in excel
	Route::get('drilling/report/excel',array(
		'as'=>'drilling.excel',
		'uses'=>'drillingController@excel'
	));

	Route::get('/drilling/update/{id}',array(
			'as' => 'drilling.update',
			'uses'=> 'drillingController@update'
		));

		//to store the updated data
		Route::post('/drilling/update/{id}',array(
			'as' => 'drilling.update_store',
			'uses'=>'drillingController@update_store'
	));

	Route::get('/drilling/delete/{id}',array(
		'as' => 'drilling.delete',
		'uses' => 'drillingController@destroy'
	));


	// ROUTES FOR serration PAGE

	//route to get to the drilling page
	Route::get('/serration',array(
		'as' => 'serration',
		'uses'=>'serrationController@index'
	));


	//route ot get to store the drillig page information
	Route::post('/serration',array(
		'as' => 'serration.store',
		'uses' => 'serrationController@store'
	));

	//route to show report for drilling page
	Route::get('admin/reports/serration',array(
		'as' => 'serration.report',
		'uses' => 'serrationController@show'
	));

	//route to show reports in excel
	Route::get('serration/report/excel',array(
		'as'=>'serration.excel',
		'uses'=>'serrationController@excel'
	));

	Route::get('/serration/update/{id}',array(
			'as' => 'serration.update',
			'uses'=> 'serrationController@update'
		));

		//to store the updated data
		Route::post('/serration/update/{id}',array(
			'as' => 'serration.update_store',
			'uses'=>'serrationController@update_store'
	));

	Route::get('/serration/delete/{id}',array(
		'as' => 'serration.delete',
		'uses' => 'serrationController@destroy'
	));



		// Routes for master Data

		//Routes for manufacture

	Route::get('admin/showWorkOrderStatus',array(
		'as' => 'showWorkOrderStatus',
		'uses' => 'masterController@showWorkOrderStatus'
	));

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

	// ROUTES FOR TYPES IN MATERIAL TYPE DATA

	Route::get('admin/materialType',array(
		'as' => 'materialType.show',
		'uses' => 'masterController@showMaterialType'
	));


	Route::post('admin/materialType',array(
		'as' => 'materialType.store',
		'uses'=> 'masterController@storeMaterialType'
	));

	Route::get('admin/materialType/{id}',array(
		'as' => 'materialType.delete',
		'uses' => 'masterController@deleteMaterialType'
	));


	// ROUTES FOR STATUS 


	Route::get('admin/status',array(
		'as' => 'status.show',
		'uses' => 'masterController@showStatus'
	));


	Route::post('admin/status',array(
		'as' => 'status.store',
		'uses'=> 'masterController@storeStatus'
	));

	Route::get('admin/status/{id}',array(
		'as' => 'status.delete',
		'uses' => 'masterController@deleteStatus'
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


	// ------------------------- ROUTES FOR SEARCH PANEL ------------------------------------------

	Route::get('/search',array(
		'as' => 'search.index',
			'uses' => 'searchController@index'
	));

	Route::get('/search/display',array(
		'as' => 'search.display',
			'uses' => 'searchController@display'
	));

	Route::get('/work_order_search',array(
		'as' => 'work_order_search',
		'uses' => 'workOrderController@search_display'
	));

	Route::get('/raw_material_search',array(
		'as' => 'raw_material_search',
		'uses' => 'rawMaterialController@search_display'
	));

	Route::get('/cutting_search',array(
		'as' => 'cutting_search',
		'uses' => 'cuttingPageController@search_display'
	));

	Route::get('/forging_search',array(
		'as' => 'forging_search',
		'uses' => 'forgingController@search_display'
	));

	Route::get('/machining_search',array(
		'as' => 'machining_search',
		'uses' => 'machiningController@search_display'
	));

	Route::get('/drilling_search',array(
		'as' => 'drilling_search',
		'uses' => 'drillingController@search_display'
	));

	Route::get('/serration_search',array(
		'as' => 'serration_search',
		'uses' => 'serrationController@search_display'
	));


	Route::post('/search/category/{id}',array(
		'as' => 'search.category',
		'uses' => 'searchController@returnOptions'
	));

	Route::post('/search/store',array(
		'as' => 'search.store',
			'uses' => 'searchController@store'
	));

	Route::get('superfun','rawMaterialController@hottie');