<?php

class LoginPageController extends BaseController {

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

		$get_role = DB::table('users')->select('role')->where('username',$input['username'])->get();

		$redirection_array = ['','home','raw','cutting','forging','machining','drilling','seration'];
		
		if(Auth::attempt($credentials))
		{
			Session::put('username',$input['username']);
			return Redirect::intended($redirection_array[$get_role[0]->role]);
		}

		else

			return Redirect::to('login')->with('message','Invalid Credentials, Please login again');



		// Error $attempt is always returning FALSE
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
	public function destroy()
	{

		//Auth Logout
		Auth::logout();
		Session::flush();
		//Redirect to
		return Redirect::to('login')->with('message', 'You have successfully logged out');
	}

}