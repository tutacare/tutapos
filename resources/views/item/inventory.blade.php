@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inventory Data Tracking</div>

				<div class="panel-body">
					UPC/EAN/ISBN: {{ $item->upc_ean_isbn }}<br />
					Item Name: {{ $item->item_name }}<br />
					Current Quantity: {{ $item->quantity }}<br />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection