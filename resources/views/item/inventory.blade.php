@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inventory Data Tracking</div>

				<div class="panel-body">
					<table class="table table-bordered">
					<tr><td>UPC/EAN/ISBN</td><td>{{ $item->upc_ean_isbn }}</td></tr>
					<tr><td>Item Name</td><td>{{ $item->item_name }}</td></tr>
					<tr><td>Current Quantity</td><td>{{ $item->quantity }}</td></tr>
					<tr><td>Inventory to add/subtract *</td><td>{!! Form::text('inventory', Input::old('inventory'), array('class' => 'form-control')) !!}</td></tr>
					<tr><td>Comments</td><td>{!! Form::textarea('comments', Input::old('comments'), array('class' => 'form-control')) !!}</td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection