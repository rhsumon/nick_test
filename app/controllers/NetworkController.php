<?php

class NetworkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the networks                
                $users = User::all();
                
                // load the view and pass the network data
		return View::make('networks.index')
			->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/networks/create.blade.php)
                $users = User::all()->lists('uid', 'id');
		return View::make('networks.create')
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
                        'nid' => 'required',
			'n_name'       => 'required',
			'n_ip'         => 'required'			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('networks/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                        
                        //get the user
                        $user = User::find(Input::get('uid'));
                        
			// store
			$network = new Network();
                        $network->nid       = Input::get('nid');
			$network->n_name       = Input::get('n_name');
			$network->n_ip      = Input::get('n_ip');
			$network->n_status = Input::get('n_status');
			
                        $network = $user->networks()->save($network);

			// redirect
			Session::flash('message', 'Successfully added a network!');
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
                
		// get the network
		$network = self::get_network($id);
                                
		// show the edit form and pass the nerd
		return View::make('networks.edit')
			->with('network', $network)
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
                        'nid' => 'required', //we need to make it unique/autoincrement
			'n_name'       => 'required',
			'n_ip'         => 'required'			
		);
		$validator = Validator::make(Input::all(), $rules);

		// run the validator
		if ($validator->fails()) {
			return Redirect::to('networks/'.$id.'/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
                    
                        //destroy
                        $network = self::get_network($id);
                        $user = $network->user;
                        $user->networks()->destroy($network);
                        
                        //get the user
                        $user = User::find(Input::get('uid'));
                        
			// store
			$network =  new Network();
                        
                        $network->nid       = Input::get('nid');
			$network->n_name       = Input::get('n_name');
			$network->n_ip      = Input::get('n_ip');
			$network->n_status = Input::get('n_status');
			
                        $network = $user->networks()->save($network);

			// redirect
			Session::flash('message', 'Successfully edited the network!');
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
		$network = self::get_network($id);
                $user = $network->user;
		$user->networks()->destroy($network);

		// redirect
		Session::flash('message', 'Successfully deleted the network!');
		return Redirect::to('networks');
	}
        
        public static function get_network($id) {
                //ge the user object where the nid found
                $user = User::where("_networks.nid", "$id")->first();
                
                //iterate through the networks associated to the user
                foreach($user->networks as $network) {
                    if($network->nid == $id) {
                        return $network;
                    }                            
                }
                return null;
        }

}