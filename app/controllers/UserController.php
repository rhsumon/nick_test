<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the users            
                $users = User::all();
                
                // load the view and pass the user data
		return View::make('users.index')
			->with('users', $users);
                
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/users/create.blade.php)                
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate the input		
		$rules = array(
                        'uid' => 'required',			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                        
                        
			// store
			$user = new User();
			$user->uid       = Input::get('uid');
			
                        $user = $user->save();

			// redirect
			Session::flash('message', 'Successfully added new user!');
			return Redirect::to('users');
		}
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
		// get the user
		$user = User::find($id);
                

		// show the edit form and pass the nerd
		return View::make('users.edit')
			->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        public function update($id)
	{
		// validate the input		
		$rules = array(
                        'uid' => 'required',			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('users/'.$id.'/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                        
                        
			// store
			$user = User::find($id);
			$user->uid       = Input::get('uid');
			
                        $user = $user->save();

			// redirect
			Session::flash('message', 'Successfully edited a user!');
			return Redirect::to('users');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);                
		$user->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the user!');
		return Redirect::to('users');
	}

}