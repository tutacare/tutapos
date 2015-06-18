@extends('app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/app.js', array('type' => 'text/javascript')) !!}

<div class="container-fluid">
   <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> {{trans('receiving.item_receiving')}}</div>

            <div class="panel-body">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                {!! Html::ul($errors->all()) !!}

                <div class="row" ng-controller="SearchItemCtrl">

                    <div class="col-md-3">
                        <label>{{trans('receiving.search_item')}} <input ng-model="searchKeyword" class="form-control"></label>

                        <table class="table table-hover">
                        <tr ng-repeat="item in items  | filter: searchKeyword | limitTo:10">

                        <td>@{{item.item_name}}</td><td><button class="btn btn-primary btn-xs" type="button" ng-click="addReceivingTemp(item,newreceivingtemp)"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button></td>

                        </tr>
                        </table>
                    </div>

                    <div class="col-md-9">

                        <div class="row">
                            
                            {!! Form::open(array('url' => 'receivings', 'class' => 'form-horizontal')) !!}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="invoice" class="col-sm-3 control-label">{{trans('receiving.invoice')}}</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="invoice" value="@if ($receiving) {{$receiving->id + 1}} @else 1 @endif" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee" class="col-sm-3 control-label">{{trans('receiving.employee')}}</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="employee_id" id="employee" value="{{ Auth::user()->name }}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="supplier_id" class="col-sm-4 control-label">{{trans('receiving.supplier')}}</label>
                                        <div class="col-sm-8">
                                        {!! Form::select('supplier_id', $supplier, Input::old('supplier_id'), array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="payment_type" class="col-sm-4 control-label">{{trans('receiving.payment_type')}}</label>
                                        <div class="col-sm-8">
                                        {!! Form::select('payment_type', array('Cash' => 'Cash', 'Check' => 'Check', 'Debit Card' => 'Debit Card', 'Credit Card' => 'Credit Card'), Input::old('payment_type'), array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                        </div>
                           
                        <table class="table table-bordered">
                            <tr><th>{{trans('receiving.item_id')}}</th><th>{{trans('receiving.item_name')}}</th><th>{{trans('receiving.cost')}}</th><th>{{trans('receiving.quantity')}}</th><th>{{trans('receiving.total')}}</th><th>&nbsp;</th></tr>
                            <tr ng-repeat="newreceivingtemp in receivingtemp">
                            <td>@{{newreceivingtemp.item_id}}</td><td>@{{newreceivingtemp.item.item_name}}</td><td>@{{newreceivingtemp.item.cost_price | currency}}</td><td><input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateReceivingTemp(newreceivingtemp)" ng-model="newreceivingtemp.quantity" size="2"></td><td>@{{newreceivingtemp.item.cost_price * newreceivingtemp.quantity | currency}}</td><td><button class="btn btn-danger btn-xs" type="button" ng-click="removeReceivingTemp(newreceivingtemp.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                            </tr>
                        </table>

                        <div class="row">
                            
                            
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="total" class="col-sm-5 control-label">{{trans('receiving.amount_tendered')}}</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" id="amount_tendered"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <label for="employee" class="col-sm-4 control-label">{{trans('receiving.comments')}}</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="comments" id="comments" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="supplier_id" class="col-sm-4 control-label">{{trans('receiving.grand_total')}}</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><b>@{{sum(receivingtemp) | currency}}</b></p>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-block">{{trans('receiving.submit')}}</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            {!! Form::close() !!}
                            
                        

                    </div>

                </div>

            </div>
            </div>
        </div>
    </div>
</div>
@endsection