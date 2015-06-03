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

                <div class="row">

                    <div class="col-md-4">
                        <label>Search Item: <input ng-model="searchKeyword" class="form-control"></label>
                        <div ng-controller="SearchItemCtrl">
                            <table class="table table-hover">
                                <tr ng-repeat="item in items  | filter: searchKeyword | limitTo:10">
                                <td>@{{item.name}}</td><td><input type="text" value="1" size="2"></td><td>{!! Form::submit('Add>', array('class' => 'btn btn-primary btn-xs')) !!}</td>
                                </tr>
                            </table>
                        </div>   
                    </div>

                    <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr><th>Item Name</th><th>Cost</th><th>Quantity</th><th>Stock</th></tr>
                                <tr ng-repeat="item in items  | filter: searchKeyword | limitTo:3">
                                <td>@{{item.name}}</td><td><input type="text"></td>
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
<script>
(function(){
    var app = angular.module('store', [ ]);

    app.controller("SearchItemCtrl", function($scope) {
    $scope.items = listItems;
    });

    var listItems = [
    @foreach($item as $value)
    {
        name: '{{$value->item_name}}',
        cost_price: '{{$value->cost_price}}',
        quantity: '{{$value->quantity}}',
    },
    @endforeach
    ];
    
})();
</script>
@endsection