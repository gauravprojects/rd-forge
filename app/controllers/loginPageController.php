<?php

class LoginPageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /loginpage
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /loginpage/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('login.loginPage');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /loginpage
	 *
	 * @return Response
	 */
	public function store()
	{
		$input=Input::all();
		$credentials= array(
			'username' => $input['username'],
			'password' => $input['password']
		);
		if(Auth::attempt($credentials))
			dd("successful");
		else dd("falied");



		// Error $attempt is always returning FALSE
		dd($attempt);
	}

	/**
	 * Display the specified resource.
	 * GET /loginpage/{id}
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
	 * GET /loginpage/{id}/edit
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
	 * PUT /loginpage/{id}
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
	 * DELETE /loginpage/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}