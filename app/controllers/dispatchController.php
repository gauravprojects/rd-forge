<?php

class dispatchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('dispatch.dispatch_home');
	}


	public function forgingIndex()
	{
		$forging_stock_data= ForgingStock::getHeatNo();
		return View::make('dispatch.dispatch_forging_home')
			->with('forging_data',$forging_stock_data);
	}


	public function forgingStore()
	{
		$dispatch_data= Input::all();
		$dispatch_array=array(
			'forge_id' => $dispatch_data['stock_id'],
			'date'	  => date('d-m-y',strtotime($dispatch_data['date'])),
			'quantity' => $dispatch_data['quantityDispatched']
		);

		Dispatch::dispatchForgingStock($dispatch_data['stock_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertForgingDispatch($dispatch_array);
		$dispatchDetails= Dispatch::getForgingDispatchDetails($dispatch_data['stock_id']);


		return View::make('dispatch.forging_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
		dd($dispatchDetails);

	}

	public function machiningIndex()
	{

		$machining_data= MachiningStock::getMachiningStockdata();
		return View::make('dispatch.dispatch_machining_home')
			->with('machining_data',$machining_data);
	}


	public function machiningStore()
	{
		$dispatch_data= Input::all();
		$dispatch_array=array(
			'mach_id' => $dispatch_data['mach_id'],
			'date'	  => $dispatch_data['date'],
			'quantity' => $dispatch_data['quantityDispatched']
		);
		$dispatchMachiningStocks= Dispatch::dispatchMachiningStock($dispatch_data['mach_id'],$dispatch_data['quantityDispatched']);
		//$dispatchMachiningRecords= Dispatch::dispatchMachiningRecords($dispatch_data['mach_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertMachiningDispatch($dispatch_array);

//		$all_data= Machining::getAllData();
//		return View::make('machining.machining_report')->with('data',$all_data);

		$data = DB::select(DB::raw("select DISTINCT w1.work_order_no,w1.item_no,ww1.required_delivery_date,m1.quantity as machining_quantity,d1.quantity as drilling_quantity,s1.quantity as serration_quantity from `work_order_material_details` AS `w1` left join `work_order_records` AS `ww1` on w1.work_order_no = ww1.work_order_no left join `machining_work_order_stock` AS `m1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(m1.work_order_no,'-',m1.item) left join `drilling_work_order_stock` AS `d1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(d1.work_order_no,'-',d1.item) left join `serration_work_order_stock` AS `s1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(s1.work_order_no,'-',s1.item)"));
		return View::make('adminPanel.workOrderStatus')->with('data',$data);
	}


	public function drillingIndex()
	{
		$drilling_data= DrillingStock::getDrillingStockData();
		return View::make('dispatch.dispatch_drilling_home')
			->with('drilling_data',$drilling_data);
	}

	public function drillingStore()
	{
		$dispatch_data= Input::all();
		$dispatch_array=array(
			'drill_id' => $dispatch_data['drill_id'],
			'date'	   => $dispatch_data['date'],
			'quantity' => $dispatch_data['quantityDispatched']
		);

		$dispatchDrillingStocks= Dispatch::dispatchDrillingStock($dispatch_data['drill_id'],$dispatch_data['quantityDispatched']);
		//$dispatchDrillingRecords= Dispatch::dispatchDrillingRecords($dispatch_data['drill_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertDrillingDispatch($dispatch_array);

//		$all_data= Drilling::getAllData();
//		return View::make('drilling.drilling_report')->with('data',$all_data);
		$data = DB::select(DB::raw("select DISTINCT w1.work_order_no,w1.item_no,ww1.required_delivery_date,m1.quantity as machining_quantity,d1.quantity as drilling_quantity,s1.quantity as serration_quantity from `work_order_material_details` AS `w1` left join `work_order_records` AS `ww1` on w1.work_order_no = ww1.work_order_no left join `machining_work_order_stock` AS `m1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(m1.work_order_no,'-',m1.item) left join `drilling_work_order_stock` AS `d1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(d1.work_order_no,'-',d1.item) left join `serration_work_order_stock` AS `s1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(s1.work_order_no,'-',s1.item)"));
		return View::make('adminPanel.workOrderStatus')->with('data',$data);

	}

	public function serrationIndex()
	{
		$serration_data= Seration::getAllStockRecords();
		return View::make('dispatch.dispatch_serration_home')
			->with('serration_data',$serration_data);

	}

	public function serrationStore()
	{
		$dispatch_data= Input::all();
		$dispatch_array= array(
			'serr_id' => $dispatch_data['serr_id'] ,
			'date'    => $dispatch_data['date'],
			'quantity' => $dispatch_data['quantityDispatched']
			);
		$dispatchSerrationStocks=Dispatch::dispatchSerrationStock($dispatch_data['serr_id'],$dispatch_data['quantityDispatched']);
		//	$dispatchSerrationRecords= Dispatch::dispatchSerrationRecords($dispatch_data['serr_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertSerrationDispatch($dispatch_array);

//		$all_data=Serration::getAllData();
//		return View::make('serration.serration_report')->with('data',$all_data);

		$data = DB::select(DB::raw("select DISTINCT w1.work_order_no,w1.item_no,ww1.required_delivery_date,m1.quantity as machining_quantity,d1.quantity as drilling_quantity,s1.quantity as serration_quantity from `work_order_material_details` AS `w1` left join `work_order_records` AS `ww1` on w1.work_order_no = ww1.work_order_no left join `machining_work_order_stock` AS `m1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(m1.work_order_no,'-',m1.item) left join `drilling_work_order_stock` AS `d1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(d1.work_order_no,'-',d1.item) left join `serration_work_order_stock` AS `s1` on CONCAT(w1.work_order_no,'-',w1.item_no) = CONCAT(s1.work_order_no,'-',s1.item)"));
		return View::make('adminPanel.workOrderStatus')->with('data',$data);


	}






	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
