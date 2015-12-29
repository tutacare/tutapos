@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Application Settings</div>

				<div class="panel-body">
					@if (Session::has('message'))
                    	<div class="alert alert-info">{{ Session::get('message') }}</div>
                	@endif
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($tutapos_settings, array('route' => array('tutapos-settings.update', $tutapos_settings->id), 'method' => 'PUT', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('language', 'Language') !!}
					{!! Form::select('language', array('en' => 'English', 'id' => 'Indonesia', 'es' => 'Spanish'), Input::old('language'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection