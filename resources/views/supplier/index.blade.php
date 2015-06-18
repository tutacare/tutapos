@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('supplier.list_suppliers')}}</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('suppliers/create') }}">{{trans('supplier.new_supplier')}}</a>
				<hr />
@if (Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('supplier.company_name')}}</td>
            <td>{{trans('supplier.name')}}</td>
            <td>{{trans('supplier.email')}}</td>
            <td>{{trans('supplier.phone_number')}}</td>
            <td>&nbsp;</td>
            <td>{{trans('supplier.avatar')}}</td>
        </tr>
    </thead>
    <tbody>
    @foreach($supplier as $value)
        <tr>
            <td>{{ $value->company_name }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->phone_number }}</td>
            <td>

                <a class="btn btn-small btn-info" href="{{ URL::to('suppliers/' . $value->id . '/edit') }}">{{trans('supplier.edit')}}</a>
                {!! Form::open(array('url' => 'suppliers/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('supplier.delete'), array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
            <td>{!! Html::image(url() . '/images/suppliers/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
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