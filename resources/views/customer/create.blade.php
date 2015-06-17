@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('customer.new_customer')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'customers', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('name', trans('customer.name') .' *') !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('customer.email')) !!}
					{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', trans('customer.phone_number')) !!}
					{!! Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('customer.choose_avatar')) !!}
					{!! Form::file('avatar', Input::old('avatar'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('address', trans('customer.address')) !!}
					{!! Form::text('address', Input::old('address'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('city', trans('customer.city')) !!}
					{!! Form::text('city', Input::old('city'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('state', trans('customer.state')) !!}
					{!! Form::text('state', Input::old('state'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('zip', trans('customer.zip')) !!}
					{!! Form::text('zip', Input::old('zip'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('company_name', trans('customer.company_name')) !!}
					{!! Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('account', trans('customer.account') .' #') !!}
					{!! Form::text('account', Input::old('account'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('customer.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection