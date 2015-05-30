<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class ItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$items = Item::all();
			return view('item.index')->with('item', $items);
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
			return view('item.create');
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
	            'item_name' => 'required',
	            'cost_price' => 'required',
	            'selling_price' => 'required',
	        );
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails()) {
	            return Redirect::to('items/create')
	                ->withErrors($validator);
	        } else {
	            $items = new Item;
	            $items->upc_ean_isbn = Input::get('upc_ean_isbn');
	            $items->item_name = Input::get('item_name');
	            $items->size = Input::get('size');
	            $items->description = Input::get('description');
	            $items->cost_price = Input::get('cost_price');
	            $items->selling_price = Input::get('selling_price');
	            $items->quantity = Input::get('quantity');
	            $items->save();

	            Session::flash('message', 'You have successfully added item');
	            return Redirect::to('items');
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
		//
	}

	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
