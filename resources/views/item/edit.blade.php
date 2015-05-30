@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Update Item</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT')) !!}

					<div class="form-group">
					{!! Form::label('upc_ean_isbn', 'UPC/EAN/ISBN') !!}
					{!! Form::text('upc_ean_isbn', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('item_name', 'Item Name') !!}
					{!! Form::text('item_name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('size', 'Size') !!}
					{!! Form::text('size', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('description', 'Description') !!}
					{!! Form::text('description', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('cost_price', 'Cost Price') !!}
					{!! Form::text('cost_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('selling_price', 'Selling Price') !!}
					{!! Form::text('selling_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('quantity', 'Quantity') !!}
					{!! Form::text('quantity', null, array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection