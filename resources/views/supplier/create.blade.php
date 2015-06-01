@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Supplier</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'suppliers', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('company_name', 'Company Name *') !!}
					{!! Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', 'Phone Number') !!}
					{!! Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', 'Choose Avatar') !!}
					{!! Form::file('avatar', Input::old('avatar'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('address', 'Address') !!}
					{!! Form::text('address', Input::old('address'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('city', 'City') !!}
					{!! Form::text('city', Input::old('city'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('state', 'State') !!}
					{!! Form::text('state', Input::old('state'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('zip', 'Zip') !!}
					{!! Form::text('zip', Input::old('zip'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('comments', 'Comments') !!}
					{!! Form::text('comments', Input::old('comments'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('account', 'Account #') !!}
					{!! Form::text('account', Input::old('account'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection