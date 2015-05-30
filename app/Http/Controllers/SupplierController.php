<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplier;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$suppliers = Supplier::all();
			return view('supplier.index')->with('supplier', $suppliers);
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check())
		{
			return view('supplier.create');
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::check())
		{
			$rules = array(
	            'company_name' => 'required',
	        );
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails()) {
	            return Redirect::to('suppliers/create')
	                ->withErrors($validator);
	        } else {
	            $suppliers = new Supplier;
	            $suppliers->company_name = Input::get('company_name');
	            $suppliers->name = Input::get('name');
	            $suppliers->email = Input::get('email');
	            $suppliers->phone_number = Input::get('phone_number');
	            $suppliers->address = Input::get('address');
	            $suppliers->city = Input::get('city');
	            $suppliers->state = Input::get('state');
	            $suppliers->zip = Input::get('zip');
	            $suppliers->comments = Input::get('comments');
	            $suppliers->account = Input::get('account');
	            $suppliers->save();

	            Session::flash('message', 'You have successfully added supplier');
	            return Redirect::to('suppliers');
	        }
	    }
    	else
		{
			return Redirect::to('/auth/login');
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
		if (Auth::check())
		{
		$suppliers = Supplier::find($id);
        return view('supplier.edit')
            ->with('supplier', $suppliers);
        }
        else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Auth::check())
		{
				$rules = array(
	            'company_name' => 'required',
	        );
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails()) {
	            return Redirect::to('suppliers/' . $id . '/edit')
	                ->withErrors($validator);
	        } else {
	            $suppliers = Supplier::find($id);
	            $suppliers->company_name = Input::get('company_name');
	            $suppliers->name = Input::get('name');
	            $suppliers->email = Input::get('email');
	            $suppliers->phone_number = Input::get('phone_number');
	            $suppliers->address = Input::get('address');
	            $suppliers->city = Input::get('city');
	            $suppliers->state = Input::get('state');
	            $suppliers->zip = Input::get('zip');
	            $suppliers->comments = Input::get('comments');
	            $suppliers->account = Input::get('account');
	            $suppliers->save();

	            Session::flash('message', 'You have successfully updated supplier');
	            return Redirect::to('suppliers');
	        }
		}
		else
		{
			return Redirect::to('/auth/login');
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
		if (Auth::check())
		{
			$suppliers = Supplier::find($id);
	        $suppliers->delete();

	        Session::flash('message', 'You have successfully deleted supplier');
	        return Redirect::to('suppliers');
		}
		else
		{
			return Redirect::to('/auth/login');
		}
	}

}
