<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use App\SaleTemp;
use App\SaleItem;
use App\Inventory;
use App\Customer;
use App\Item, App\ItemKitItem;
use App\Http\Requests\SaleRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class SaleController extends Controller {

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
		$sales = Sale::orderBy('id', 'desc')->first();
		$customers = Customer::lists('name', 'id');
		return view('sale.index')
			->with('sale', $sales)
			->with('customer', $customers);
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
	public function store(SaleRequest $request)
	{
	    $sales = new Sale;
        $sales->customer_id = Input::get('customer_id');
        $sales->user_id = Auth::user()->id;
        $sales->payment_type = Input::get('payment_type');
        $sales->comments = Input::get('comments');
        $sales->save();
        // process sale items
        $saleItems = SaleTemp::all();
		foreach ($saleItems as $value) {
			$saleItemsData = new SaleItem;
			$saleItemsData->sale_id = $sales->id;
			$saleItemsData->item_id = $value->item_id;
			$saleItemsData->cost_price = $value->cost_price;
			$saleItemsData->selling_price = $value->selling_price;
			$saleItemsData->quantity = $value->quantity;
			$saleItemsData->total_cost = $value->total_cost;
			$saleItemsData->total_selling = $value->total_selling;
			$saleItemsData->save();
			//process inventory
			$items = Item::find($value->item_id);
			if($items->type == 1)
			{
				$inventories = new Inventory;
				$inventories->item_id = $value->item_id;
				$inventories->user_id = Auth::user()->id;
				$inventories->in_out_qty = -($value->quantity);
				$inventories->remarks = 'SALE'.$sales->id;
				$inventories->save();
				//process item quantity
	            $items->quantity = $items->quantity - $value->quantity;
	            $items->save();
        	}
        	else
        	{
	        	$itemkits = ItemKitItem::where('item_kit_id', $value->item_id)->get();
				foreach($itemkits as $item_kit_value)
				{
					$inventories = new Inventory;
					$inventories->item_id = $item_kit_value->item_id;
					$inventories->user_id = Auth::user()->id;
					$inventories->in_out_qty = -($item_kit_value->quantity * $value->quantity);
					$inventories->remarks = 'SALE'.$sales->id;
					$inventories->save();
					//process item quantity
					$item_quantity = Item::find($item_kit_value->item_id);
		            $item_quantity->quantity = $item_quantity->quantity - ($item_kit_value->quantity * $value->quantity);
		            $item_quantity->save();
				}
        	}
		}
		//delete all data on SaleTemp model
		SaleTemp::truncate();
        $itemssale = SaleItem::where('sale_id', $saleItemsData->sale_id)->get();
            Session::flash('message', 'You have successfully added sales');
            //return Redirect::to('receivings');
            return view('sale.complete')
            	->with('sales', $sales)
            	->with('saleItemsData', $saleItemsData)
            	->with('saleItems', $itemssale);

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
