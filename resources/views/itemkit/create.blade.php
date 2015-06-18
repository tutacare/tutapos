@extends('app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/item.kits.js', array('type' => 'text/javascript')) !!}

<div class="container-fluid">
   <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> {{trans('itemkit.new_item_kit')}}</div>

            <div class="panel-body">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                {!! Html::ul($errors->all()) !!}

                <div class="row" ng-controller="SearchItemCtrl">

                    <div class="col-md-3">
                        <label>{{trans('itemkit.search_item')}} <input ng-model="searchKeyword" class="form-control"></label>

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
                                        <label for="item_kit_name" class="col-sm-4 control-label">{{trans('itemkit.item_kit_name')}}</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="item_kit_name" id="item_kit_name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    

                                    <div class="form-group">
                                        <label for="description" class="col-sm-4 control-label">{{trans('itemkit.description')}}</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="description" id="description"/>
                                        </div>
                                    </div>
                                </div>
                        </div>
                           
                        <table class="table table-bordered">
                            <tr><th>{{trans('itemkit.item_id')}}</th><th>{{trans('itemkit.item_name')}}</th><th>{{trans('itemkit.quantity')}}</th><th>&nbsp;</th></tr>
                            <tr ng-repeat="newitemkittemp in itemkittemp">
                            <td>@{{newitemkittemp.item_id}}</td><td>@{{newitemkittemp.item.item_name}}</td><td><input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateItemKitTemp(newitemkittemp)" ng-model="newitemkittemp.quantity" size="2"></td><td><button class="btn btn-danger btn-xs" type="button" ng-click="removeItemKitTemp(newitemkittemp.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                            </tr>
                        </table>

                        <div class="row">    
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="cost_price" class="col-sm-4 control-label">{{trans('itemkit.cost_price')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control" name="cost_price_ori" id="cost_price_ori" ng-model="sumCost(itemkittemp)" readonly/>
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" name="cost_price" id="cost_price" ng-model="cp"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <label for="selling_price" class="col-sm-4 control-label">{{trans('itemkit.selling_price')}}</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                
                                        <input type="text" class="form-control" name="selling_price_ori" id="selling_price_ori" ng-model="sumSell(itemkittemp)" readonly/>
                                        <div class="input-group-addon">$</div>
                                        <input type="text" class="form-control" name="selling_price" id="selling_price" ng-model="sp"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="supplier_id" class="col-sm-5 control-label">{{trans('itemkit.profit')}}</label>
                                        <div class="col-sm-7">
                                            <p class="form-control-static"><b>@{{sp - cp}}</b></p>
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <button type="submit" class="btn btn-warning btn-block">{{trans('itemkit.submit')}}</button>
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