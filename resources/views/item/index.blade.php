@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">List Items</div>
                
				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('items/create') }}">New Item</a>
				<hr />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Item ID</td>
            <td>UPC/EAN/ISBN</td>
            <td>Item Name</td>
            <td>Size</td>
            <td>Cost Price</td>
            <td>Selling Price</td>
            <td>Quantity</td>
            <td>&nbsp;</td>
            <td>Avatar</td>
        </tr>
    </thead>
    <tbody>
    @foreach($item as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->upc_ean_isbn }}</td>
            <td>{{ $value->item_name }}</td>
            <td>{{ $value->size }}</td>
            <td>{{ $value->cost_price }}</td>
            <td>{{ $value->selling_price }}</td>
            <td>{{ $value->quantity }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('items/' . $value->id . '/inventory') }}">Inventory</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $value->id . '/edit') }}">Edit</a>
                {!! Form::open(array('url' => 'items/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
            <td>{!! Html::image(url() . '/images/items/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
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