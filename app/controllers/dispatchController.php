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
	}



	public function forgingDispatchReports()
	{
		$dispatchDetails= Dispatch::getForgingDispatchDetails();


		return View::make('dispatch.forging_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
	}


	public function machiningDispatchReports()
	{
		$dispatchDetails = Dispatch::getMachiningDispatchDetails();
		return View::make('dispatch.machining_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
	}

	public function drillingDispatchReports()
	{
		$dispatchDetails = Dispatch::getDrillingDispatchDetails();
		return View::make('dispatch.drilling_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
	}

	public function serrationDispatchReports()
	{
		$dispatchDetails = Dispatch::getSerrationDispatchDetails();
		return View::make('dispatch.serration_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
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
			'date'	  => date('d-m-y',strtotime($dispatch_data['date'])),
			'quantity' => $dispatch_data['quantityDispatched']
		);
		$dispatchMachiningStocks= Dispatch::dispatchMachiningStock($dispatch_data['mach_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertMachiningDispatch($dispatch_array);
		$dispatchDetails = Dispatch::getMachiningDispatchDetails();
		return View::make('dispatch.machining_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);

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
			'date'	   => date('d-m-y',strtotime($dispatch_data['date'])),
			'quantity' => $dispatch_data['quantityDispatched']
		);

		$dispatchDrillingStocks= Dispatch::dispatchDrillingStock($dispatch_data['drill_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertDrillingDispatch($dispatch_array);

		$dispatchDetails = Dispatch::getDrillingDispatchDetails();
		return View::make('dispatch.drilling_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);
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
			'date'    => date('d-m-y',strtotime($dispatch_data['date'])),
			'quantity' => $dispatch_data['quantityDispatched']
			);
		$dispatchSerrationStocks=Dispatch::dispatchSerrationStock($dispatch_data['serr_id'],$dispatch_data['quantityDispatched']);
		Dispatch::insertSerrationDispatch($dispatch_array);

		$dispatchDetails = Dispatch::getSerrationDispatchDetails();
		return View::make('dispatch.serration_dispatch_reports')
			->with('dispatchDetails',$dispatchDetails);


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
	public function show()
	{
		return View::make('dispatch.reportsHome');
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
