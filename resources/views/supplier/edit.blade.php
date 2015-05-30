@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Update Supplier</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($supplier, array('route' => array('suppliers.update', $supplier->id), 'method' => 'PUT')) !!}

					<div class="form-group">
					{!! Form::label('company_name', 'Company Name') !!}
					{!! Form::text('company_name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', 'Phone Number') !!}
					{!! Form::text('phone_number', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('addrees', 'Addrees') !!}
					{!! Form::text('address', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('city', 'City') !!}
					{!! Form::text('city', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('state', 'State') !!}
					{!! Form::text('state', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('zip', 'Zip') !!}
					{!! Form::text('zip', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('comments', 'Comments') !!}
					{!! Form::text('comments', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('account', 'Account') !!}
					{!! Form::text('account', null, array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection