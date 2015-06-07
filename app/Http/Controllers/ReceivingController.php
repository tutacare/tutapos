<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Receiving;
use App\ReceivingTemp;
use App\ReceivingItem;
use App\Supplier;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class ReceivingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{

			$receivings = Receiving::orderBy('id', 'desc')->first();
			$suppliers = Supplier::lists('company_name', 'id');
			return view('receiving.index')
				->with('receiving', $receivings)
				->with('supplier', $suppliers);
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
		//
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
		    $receivings = new Receiving;
            $receivings->supplier_id = Input::get('supplier_id');
            $receivings->employee_id = Auth::user()->id;
            $receivings->payment_type = Input::get('payment_type');
            $receivings->comments = Input::get('comments');
            $receivings->save();
            // process receiving items
            $receivingItems = ReceivingTemp::all();
			foreach ($receivingItems as $value) {
				$receivingItemsData = new ReceivingItem;
				$receivingItemsData->receiving_id = $receivings->id;
				$receivingItemsData->item_id = $value->item_id;
				$receivingItemsData->quantity = $value->quantity;
				$receivingItemsData->save();
			}
			ReceivingTemp::truncate();
	        
            Session::flash('message', 'You have successfully added receivings');
            return Redirect::to('receivings');
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
		if (Auth::check())
		{
            $items = Item::find($id);
            // process inventory
			$receivingTemps = new ReceivingTemp;
			$inventories->item_id = $id;
			$inventories->quantity = Input::get('quantity');
			$inventories->save();
			
            Session::flash('message', 'You have successfully add item');
            return Redirect::to('receivings');
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
		//
	}

}
