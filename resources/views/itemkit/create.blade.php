@extends('app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/item.kits.js', array('type' => 'text/javascript')) !!}

<div class="container-fluid">
   <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> New Item Kit</div>

            <div class="panel-body">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <div class="row" ng-controller="SearchItemCtrl">

                    <div class="col-md-3">
                        <label>Search Item: <input ng-model="searchKeyword" class="form-control"></label>

                        <table class="table table-hover">
                        <tr ng-repeat="item in items  | filter: searchKeyword | limitTo:10">

                        <td>@{{item.item_name}}</td><td><button class="btn btn-primary btn-xs" type="button" ng-click="addItemKitTemp(item)"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button></td>

                        </tr>
                        </table>
                    </div>

                    <div class="col-md-9">

                        <div class="row">
                            
                            {!! Form::open(array('url' => 'store-item-kits', 'class' => 'form-horizontal')) !!}
                                <div class="col-md-6">
                                    

                                    <div class="form-group">
                                        <label for="item_kit_name" class="col-sm-4 control-label">Item Kit Name</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="item_kit_name" id="item_kit_name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    

                                    <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">Description</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="description" id="description"/>
                                        </div>
                                    </div>
                                </div>
                        </div>
                           
                        <table class="table table-bordered">
                            <tr><th>Item ID</th><th>Item Name</th><th>Quantity</th><th>&nbsp;</th></tr>
                            <tr ng-repeat="newitemkittemp in itemkittemp">
                            <td>@{{newitemkittemp.item_id}}</td><td>@{{newitemkittemp.item.item_name}}</td><td><input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateReceivingTemp(newitemkittemp)" ng-model="newitemkittemp.quantity" size="2"></td><td><button class="btn btn-danger btn-xs" type="button" ng-click="removeItemKitTemp(newitemkittemp.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                            </tr>
                        </table>

                        <div class="row">    
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="total" class="col-sm-4 control-label">Cost Price</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" name="cost_price" id="cost_price"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <label for="employee" class="col-sm-4 control-label">Selling Price</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                        <input type="text" class="form-control" name="selling_price" id="selling_price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="supplier_id" class="col-sm-4 control-label">TOTAL:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><b>@{{sum(receivingtemp) | currency}}</b></p>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <button type="submit" class="btn btn-warning btn-block">Submit Item Kit</button>
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