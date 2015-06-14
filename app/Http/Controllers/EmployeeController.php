<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$employees = User::all();
			return view('employee.index')->with('employee', $employees);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			return view('employee.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EmployeeStoreRequest $request)
	{
	            // store
	            $users = new User;
	            $users->name = Input::get('name');
	            $users->email = Input::get('email');
	            $users->password = Hash::make(Input::get('password'));
	            $users->save();
	            
	            Session::flash('message', 'You have successfully added employee');
	            return Redirect::to('employees');
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
		$employees = User::find($id);
        return view('employee.edit')
            ->with('employee', $employees);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($id == 1)
		{
			Session::flash('message', 'You cannot edit admin on TutaPOS demo');
			Session::flash('alert-class', 'alert-danger');
	            return Redirect::to('employees');
		}
		else
		{	
			$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $id .'',
			'password' => 'min:6|max:30|confirmed',
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails()) 
			{
				 return Redirect::to('employees/' . $id . '/edit')
				->withErrors($validator);
			} else {
	            $users = User::find($id);
	            $users->name = Input::get('name');
	            $users->email = Input::get('email');
	            if(!empty(Input::get('password'))) 
	            {
	            	$users->password = Hash::make(Input::get('password'));
	            }
	            $users->save();
	            // redirect
	            Session::flash('message', 'You have successfully updated employee');
	            return Redirect::to('employees');
	        }
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
		if($id == 1)
		{
			Session::flash('message', 'You cannot delete admin on TutaPOS demo');
			Session::flash('alert-class', 'alert-danger');
	            return Redirect::to('employees');
		}
		else
		{		
			try 
			{
				$users = User::find($id);
		        $users->delete();
		        // redirect
		        Session::flash('message', 'You have successfully deleted employee');
		        return Redirect::to('employees');
	    	}
	    	catch(\Illuminate\Database\QueryException $e)
    		{
        		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
        		Session::flash('alert-class', 'alert-danger');
		        return Redirect::to('employees');	
	    	}
	    }
	}

}
