@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('item.update_item')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('upc_ean_isbn', trans('item.upc_ean_isbn')) !!}
					{!! Form::text('upc_ean_isbn', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('item_name', trans('item.item_name')) !!}
					{!! Form::text('item_name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('size', trans('item.size')) !!}
					{!! Form::text('size', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('description', trans('item.description')) !!}
					{!! Form::text('description', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('item.choose_avatar')) !!}
					{!! Form::file('avatar', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('cost_price', trans('item.cost_price')) !!}
					{!! Form::text('cost_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('selling_price', trans('item.selling_price')) !!}
					{!! Form::text('selling_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('quantity', trans('item.quantity')) !!}
					{!! Form::text('quantity', null, array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection