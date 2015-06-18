@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('item.list_items')}}</div>
               
				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('items/create') }}">{{trans('item.new_item')}}</a>
				<hr />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('item.item_id')}}</td>
            <td>{{trans('item.upc_ean_isbn')}}</td>
            <td>{{trans('item.item_name')}}</td>
            <td>{{trans('item.size')}}</td>
            <td>{{trans('item.cost_price')}}</td>
            <td>{{trans('item.selling_price')}}</td>
            <td>{{trans('item.quantity')}}</td>
            <td>&nbsp;</td>
            <td>{{trans('item.avatar')}}</td>
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

                <a class="btn btn-small btn-success" href="{{ URL::to('inventory/' . $value->id . '/edit') }}">{{trans('item.inventory')}}</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $value->id . '/edit') }}">{{trans('item.edit')}}</a>
                {!! Form::open(array('url' => 'items/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('item.delete'), array('class' => 'btn btn-warning')) !!}
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