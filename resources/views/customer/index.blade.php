@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">List Customers</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('customers/create') }}">New Customer</a>
				<hr />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Person ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>&nbsp;</td>
            <td>Avatar</td>
        </tr>
    </thead>
    <tbody>
    @foreach($customer as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->phone_number }}</td>
            <td>

                <a class="btn btn-small btn-info" href="{{ URL::to('customers/' . $value->id . '/edit') }}">Edit</a>
                {!! Form::open(array('url' => 'customers/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
            <td>{!! Html::image('http://localhost/tutapos/public/images/customers/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
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