<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Receiving;
use App\ReceivingTemp;
use App\ReceivingItem;
use App\Inventory;
use App\Supplier;
use App\Item;
use App\Http\Requests\ReceivingRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class ReceivingController extends Controller {

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
			$receivings = Receiving::orderBy('id', 'desc')->first();
			$suppliers = Supplier::lists('company_name', 'id');
			return view('receiving.index')
				->with('receiving', $receivings)
				->with('supplier', $suppliers);
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
	public function store(ReceivingRequest $request)
	{
		    $receivings = new Receiving;
            $receivings->supplier_id = Input::get('supplier_id');
            $receivings->user_id = Auth::user()->id;
            $receivings->payment_type = Input::get('payment_type');
            $receivings->comments = Input::get('comments');
            $receivings->save();
            // process receiving items
            $receivingItems = ReceivingTemp::all();
			foreach ($receivingItems as $value) {
				$receivingItemsData = new ReceivingItem;
				$receivingItemsData->receiving_id = $receivings->id;
				$receivingItemsData->item_id = $value->item_id;
				$receivingItemsData->cost_price = $value->cost_price;
				$receivingItemsData->quantity = $value->quantity;
				$receivingItemsData->total_cost = $value->total_cost;
				$receivingItemsData->save();
				//process inventory
				$items = Item::find($value->item_id);
				$inventories = new Inventory;
				$inventories->item_id = $value->item_id;
				$inventories->user_id = Auth::user()->id;
				$inventories->in_out_qty = $value->quantity;
				$inventories->remarks = 'RECV'.$receivings->id;
				$inventories->save();
				//process item quantity
	            $items->quantity = $items->quantity + $value->quantity;
	            $items->save();
			}
			//delete all data on ReceivingTemp model
			ReceivingTemp::truncate();
			$itemsreceiving = ReceivingItem::where('receiving_id', $receivingItemsData->receiving_id)->get();
            Session::flash('message', 'You have successfully added receivings');
            //return Redirect::to('receivings');
            return view('receiving.complete')
            	->with('receivings', $receivings)
            	->with('receivingItemsData', $receivingItemsData)
            	->with('receivingItems', $itemsreceiving);


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
            $items = Item::find($id);
            // process inventory
			$receivingTemps = new ReceivingTemp;
			$inventories->item_id = $id;
			$inventories->quantity = Input::get('quantity');
			$inventories->save();
			
            Session::flash('message', 'You have successfully add item');
            return Redirect::to('receivings');
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
