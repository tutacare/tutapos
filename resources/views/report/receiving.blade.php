@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Reports - Receivings Report</div>

				<div class="panel-body">
<div class="well well-sm">TOTAL: {{DB::table('receiving_items')->sum('total_cost')}}</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Receiving ID</td>
            <td>Date</td>
            <td>Items Received</td>
            <td>Received By</td>
            <td>Supplied By</td>
            <td>Total</td>
            <td>Payment Type</td>
            <td>Comments</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($receivingReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('receiving_items')->where('receiving_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->supplier->company_name }}</td>
            <td>{{DB::table('receiving_items')->where('receiving_id', $value->id)->sum('total_cost')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedReceivings{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">Detail</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedReceivings{{ $value->id }}">
                <td colspan="9">
                    <table class="table">
                        <tr>
                            <td>Item ID</td>
                            <td>Item Name</td>
                            <td>Item Received</td>
                            <td>Total</td>
                        </tr>
                        @foreach(ReportReceivingsDetailed::receiving_detailed($value->id) as $receiving_detailed)
                        <tr>
                            <td>{{ $receiving_detailed->item_id }}</td>
                            <td>{{ $receiving_detailed->item->item_name }}</td>
                            <td>{{ $receiving_detailed->quantity }}</td>
                            <td>{{ $receiving_detailed->quantity * $receiving_detailed->cost_price}}</td>
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