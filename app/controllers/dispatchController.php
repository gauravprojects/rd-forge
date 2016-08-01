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
		ForgingStock::dispatchForging($dispatch_data['stock_id'],$dispatch_data['quantityDispatched']);

		$forging_data= Forging::getAllRecords();
		return View::make('forging.forging_report')
			->with('forging_data',$forging_data);

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
		$dispatchMachiningRecords= Dispatch::dispatchMachiningRecords($dispatch_data['mach_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertMachiningDispatch($dispatch_array);

		$all_data = Machining::getAllData();
		return View::make('machining.machining_report_excel')->with('data',$all_data);
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
		$dispatchDrillingRecords= Dispatch::dispatchDrillingRecords($dispatch_data['drill_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertDrillingDispatch($dispatch_array);

		$all_data= Drilling::getAllData();
		return View::make('drilling.drilling_report')->with('data',$all_data);

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
			$dispatchSerrationRecords= Dispatch::dispatchSerrationRecords($dispatch_data['serr_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertSerrationDispatch($dispatch_array);

		$all_data=Serration::getAllData();
		return View::make('serration.serration_report')->with('data',$all_data);


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
