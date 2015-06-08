@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Reports - Receivings Report</div>

				<div class="panel-body">
				<hr />

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
            <td>${{DB::table('receiving_items')->where('receiving_id', $value->id)->sum('cost_price')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('reports/receivings/detailed' . $value->id . '/show') }}">Detail</a>
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