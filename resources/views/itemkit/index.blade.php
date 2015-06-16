@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Item Kits</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('item-kits/create') }}">New Item Kit</a>
				<hr />
@if (Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Item Kit ID</td>
            <td>Item Kit Name</td>
            <td>Cost Price</td>
            <td>Selling Price</td>
            <td>Item Kit Description</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        @foreach($itemkits as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->item_name}}</td>
            <td>{{$value->cost_price}}</td>
            <td>{{$value->selling_price}}</td>
            <td>{{$value->description}}</td>
            <td>..</td>
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