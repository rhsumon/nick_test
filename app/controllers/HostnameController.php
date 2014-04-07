<?php

class HostnameController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the hostnames                
                
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/hostnames/create.blade.php)
                $users = User::all()->lists('uid', 'id');
		return View::make('hostnames.create')
                        ->with('users', $users);
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
                        'hostname' => 'required',
			'block'       => 'required',			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('hostnames/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                        
                        //get the user
                        $user = User::find(Input::get('uid'));
                        
			// store
			$hostname = new Hostname();
                        $hostname->hostname       = Input::get('hostname');
			$hostname->block       = Input::get('hostname');
			
                        $hostname = $user->hostnames()->save($hostname);

			// redirect
			Session::flash('message', 'Successfully added a hostname!');
			return Redirect::to('networks');
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
                //get all user           
                $users = User::all()->lists('uid', 'id');
                
		// get the hostname
		$hostname = self::get_hostname($id);
                

		// show the edit form and pass the nerd
		return View::make('hostnames.edit')
			->with('hostname', $hostname)
                        ->with('users', $users);
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
                        'hostname' => 'required',
			'block'       => 'required',
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('hostnames/'.$id.'/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                                                  
                        //destroy from the existing user
                        $hostname = self::get_hostname($id);
                        $user = $hostname->user;
                        $user->hostnames()->destroy($hostname);
                        
                        //get the user
                        $user = User::find(Input::get('uid'));
                        
			// store
			$hostname =  New Hostname();
                        $hostname->hostname       = Input::get('hostname');
			$hostname->block       = Input::get('block');
			
			
                        $hostname = $user->hostnames()->save($hostname);

			// redirect
			Session::flash('message', 'Successfully edited the hostname!');
			return Redirect::to('networks');
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
		$hostname = self::get_hostname($id);
                $user = $hostname->user;
		$user->hostnames()->destroy($hostname);

		// redirect
		Session::flash('message', 'Successfully deleted the hostname!');
		return Redirect::to('hostnames');
	}
        
        /**
         * get the hostname by given id
         * 
         * @param type $id
         * @return object
         */
        public static function get_hostname($id) {
                //get the user object
                $users = User::all();                
                
                //iterate through the networks associated to the user
                foreach($users as $user) {
                    foreach($user->hostnames as $hostname_) {
                        if($hostname_->id == $id) {                            
                            return $hostname_;
                        }                            
                    }
                }
                return null;                
        }

}