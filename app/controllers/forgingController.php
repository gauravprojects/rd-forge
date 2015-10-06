<?php

class ForgingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /forging
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('forging.forge');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /forging/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /forging
	 *
	 * @return Response
	 */
	public function store()
	{
		dd("Iam clled");
		$forging_input= Input::all();
		dd($forging_input);
	}

	/**
	 * Display the specified resource.
	 * GET /forging/{id}
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
	 * GET /forging/{id}/edit
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
	 * PUT /forging/{id}
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
	 * DELETE /forging/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}