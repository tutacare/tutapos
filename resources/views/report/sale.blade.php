@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Reports - Sales Report</div>

				<div class="panel-body">

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
            <td>${{DB::table('sale_items')->where('sale_id', $value->id)->sum('selling_price')}}</td>
            <td>TODO</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedSales{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">
                    Detail</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedSales{{ $value->id }}">
                <td colspan="9">
                    <table class="table">
                        <tr>
                            <td>Item ID</td>
                            <td>Item Name</td>
                            <td>Quantity Purchased</td>
                            <td>Total</td>
                            <td>Profit</td>
                        </tr>
                        
                        <tr>
                            <td>TODO</td>
                            <td>TODO</td>
                            <td>TODO</td>
                            <td>TODO</td>
                            <td>TODO</td>
                        </tr>
                        
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