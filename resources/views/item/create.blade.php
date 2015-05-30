@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Item</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'customers')) !!}

					<div class="form-group">
					{!! Form::label('upc_ean_isbn', 'UPC/EAN/ISBN') !!}
					{!! Form::text('upc_ean_isbn', Input::old('upc_ean_isbn'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('item_name', 'Item name *') !!}
					{!! Form::text('item_name', Input::old('item_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('size', 'Size') !!}
					{!! Form::text('size', Input::old('size'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('description', 'Description') !!}
					{!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('cost_price', 'Cost Price *') !!}
					{!! Form::text('cost_price', Input::old('cost_price'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('selling_price', 'Selling Price *') !!}
					{!! Form::text('selling_price', Input::old('selling_price'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('quantity', 'Quantity') !!}
					{!! Form::text('quantity', Input::old('quantity'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection