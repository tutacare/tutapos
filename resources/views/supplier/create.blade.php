@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('supplier.new_supplier')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'suppliers', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('company_name', trans('supplier.company_name').' *') !!}
					{!! Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('name', trans('supplier.name')) !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('supplier.email')) !!}
					{!! Form::text('email', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', trans('supplier.phone_number')) !!}
					{!! Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('supplier.choose_avatar')) !!}
					{!! Form::file('avatar', Input::old('avatar'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('address', trans('supplier.address')) !!}
					{!! Form::text('address', Input::old('address'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('city', trans('supplier.city')) !!}
					{!! Form::text('city', Input::old('city'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('state', trans('supplier.state')) !!}
					{!! Form::text('state', Input::old('state'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('zip', trans('supplier.zip')) !!}
					{!! Form::text('zip', Input::old('zip'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('comments', trans('supplier.comments')) !!}
					{!! Form::text('comments', Input::old('comments'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('account', trans('supplier.account').' #') !!}
					{!! Form::text('account', Input::old('account'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('supplier.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection