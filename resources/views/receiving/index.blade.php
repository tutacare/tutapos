@extends('app')

@section('content')


<div class="container-fluid">
   <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Items Receiving</div>

            <div class="panel-body">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <div class="row" ng-controller="SearchItemCtrl">

                    <div class="col-md-3">
                        <label>Search Item: <input ng-model="searchKeyword" class="form-control"></label>
                        
                            <table class="table table-hover">
                                <tr ng-repeat="item in items  | filter: searchKeyword | limitTo:10">
 
                                <td>@{{item.item_name}}</td><td><button class="btn btn-primary btn-xs" type="button" ng-click="addReceivingTemp(item, newreceivingtemp)">Add></button></td>
  
                                </tr>
                            </table>
                          
                    </div>

                    <div class="col-md-9">
                        
                           
                            <table class="table table-bordered">
                                <tr><th>Item ID</th><th>Item Name</th><th>Cost</th><th>Quantity</th><th>Total</th></tr>
                                <tr ng-repeat="newreceivingtemp in receivingtemp">

                                <td>@{{newreceivingtemp.item_id}}</td><td>@{{newreceivingtemp.item.item_name}}</td><td>@{{newreceivingtemp.item.cost_price | currency}}</td><td><input type="text" ng-model="newreceivingtemp.quantity" size="2"></td><td>@{{newreceivingtemp.item.cost_price * newreceivingtemp.quantity | currency}}</td>
                                </tr>
                            </table>
                     
                    </div>

                </div>

            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
{!! Html::script('js/app.js', array('type' => 'text/javascript')) !!}
@endsection