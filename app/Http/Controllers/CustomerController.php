<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class CustomerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$customers = Customer::all();
			return view('customer.index')->with('customer', $customers);
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
			return view('customer.create');
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
	public function store(CustomerRequest $request)
	{
		if (Auth::check())
		{
			
	            // store
	            $customers = new Customer;
	            $customers->name = Input::get('name');
	            $customers->email = Input::get('email');
	            $customers->phone_number = Input::get('phone_number');
	            $customers->address = Input::get('address');
	            $customers->city = Input::get('city');
	            $customers->state = Input::get('state');
	            $customers->zip = Input::get('zip');
	            $customers->company_name = Input::get('company_name');
	            $customers->account = Input::get('account');
	            $customers->save();
	            // process avatar
	            $image = $request->file('avatar');
				if(!empty($image)) {
					$avatarName = 'cus' . $customers->id . '.' . 
					$request->file('avatar')->getClientOriginalExtension();

					$request->file('avatar')->move(
					base_path() . '/public/images/customers/', $avatarName
					);

					$customerAvatar = Customer::find($customers->id);
					$customerAvatar->avatar = $avatarName;
		            $customerAvatar->save();
	        	}
	            Session::flash('message', 'You have successfully added customer');
	            return Redirect::to('customers');
	        
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
		$customers = Customer::find($id);
        return view('customer.edit')
            ->with('customer', $customers);
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
	            'name' => 'required',
	        );
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails()) {
	            return Redirect::to('customers/' . $id . '/edit')
	                ->withErrors($validator);
	        } else {
	            // simpan
	            $customers = Customer::find($id);
	            $customers->name = Input::get('name');
	            $customers->email = Input::get('email');
	            $customers->phone_number = Input::get('phone_number');
	            $customers->address = Input::get('address');
	            $customers->city = Input::get('city');
	            $customers->state = Input::get('state');
	            $customers->zip = Input::get('zip');
	            $customers->company_name = Input::get('company_name');
	            $customers->account = Input::get('account');
	            $customers->save();
	            // redirect
	            Session::flash('message', 'You have successfully updated customer');
	            return Redirect::to('customers');
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
			$customers = Customer::find($id);
	        $customers->delete();
	        // redirect
	        Session::flash('message', 'You have successfully deleted customer');
	        return Redirect::to('customers');
		}
		else
		{
			return Redirect::to('/auth/login');
		}
	}

}
