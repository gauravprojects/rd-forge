<?php

class AdminPageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminpage
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('adminPanel.admin');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminpage/create
	 *
	 * @return Response
	 */
	public function show_reports()
	{
		return View::make('adminPanel.reportsHome');
	}

	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminpage
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminpage/{id}
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
	 * GET /adminpage/{id}/edit
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
	 * PUT /adminpage/{id}
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
	 * DELETE /adminpage/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}