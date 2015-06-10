@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Reports - Sales Report</div>

				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="well well-sm">TOTAL: {{DB::table('sale_items')->sum('total_selling')}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="well well-sm">PROFIT: {{DB::table('sale_items')->sum('total_selling') - DB::table('sale_items')->sum('total_cost')}}</div>
                        </div>
                    </div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Sale ID</td>
            <td>Date</td>
            <td>Items Purchased</td>
            <td>Sold By</td>
            <td>Sold To</td>
            <td>Total</td>
            <td>Profit</td>
            <td>Payment Type</td>
            <td>Comments</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($saleReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('sale_items')->where('sale_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->customer->name }}</td>
            <td>${{DB::table('sale_items')->where('sale_id', $value->id)->sum('total_selling')}}</td>
            <td>{{DB::table('sale_items')->where('sale_id', $value->id)->sum('total_selling') - DB::table('sale_items')->where('sale_id', $value->id)->sum('total_cost')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedSales{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">
                    Detail</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedSales{{ $value->id }}">
                <td colspan="10">
                    <table class="table">
                        <tr>
                            <td>Item ID</td>
                            <td>Item Name</td>
                            <td>Quantity Purchased</td>
                            <td>Total</td>
                            <td>Profit</td>
                        </tr>
                        @foreach(ReportSalesDetailed::sale_detailed($value->id) as $SaleDetailed)
                        <tr>
                            <td>{{ $SaleDetailed->item_id }}</td>
                            <td>{{ $SaleDetailed->item->item_name }}</td>
                            <td>{{ $SaleDetailed->quantity }}</td>
                            <td>{{ $SaleDetailed->selling_price}}</td>
                            <td>{{ ($SaleDetailed->quantity * $SaleDetailed->selling_price) - ($SaleDetailed->quantity * $SaleDetailed->cost_price)}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

    @endforeach
    </tbody>
</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection