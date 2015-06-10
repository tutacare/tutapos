<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Inventory;
use App\Http\Requests\InventoryRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class InventoryController extends Controller {

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
		//
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
		//
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
			$items = Item::find($id);
			$inventories = Inventory::all();
			return view('inventory.edit')
	            ->with('item', $items)
	            ->with('inventory', $inventories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(InventoryRequest $request, $id)
	{
	            $items = Item::find($id);
	            $items->quantity = $items->quantity + Input::get('in_out_qty');
	            $items->save();
	            
	            $inventories = new Inventory;
	            $inventories->item_id = $id;
	            $inventories->user_id = Auth::user()->id;
	            $inventories->in_out_qty = Input::get('in_out_qty');
	            $inventories->remarks = Input::get('remarks');
	            $inventories->save();
	            

	            Session::flash('message', 'You have successfully updated item');
	            return Redirect::to('inventory/' . $id . '/edit');
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
