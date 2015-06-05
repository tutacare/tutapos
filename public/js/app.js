(function(){
    var app = angular.module('store', [ ]);

    app.controller("SearchItemCtrl", [ '$scope', '$http', function($scope, $http) {
        $scope.items = [ ];
        $http.get('api/item').success(function(data) {
            $scope.items = data;
        });
        $scope.receivingtemp = [ ];
        $scope.newreceivingtemp = { };
        $http.get('api/receivingtemp').success(function(data, status, headers, config) {
            $scope.receivingtemp = data;
        });
        $scope.addReceivingTemp = function(item, newreceivingtemp) {
            newreceivingtemp.item_id=item.id;
            $http.post('api/receivingtemp', $scope.newreceivingtemp).
            success(function(data, status, headers, config) {
                $scope.receivingtemp.push(data);
                $scope.newreceivingtemp.item_id = "";
                    $http.get('api/receivingtemp').success(function(data) {
                    $scope.receivingtemp = data;
                    });
            });
        }
        $scope.updateReceivingTemp = function(newreceivingtemp) {
            
            $http.put('api/receivingtemp/' + newreceivingtemp.id, { quantity: newreceivingtemp.quantity }).
            success(function(data, status, headers, config) {
                
                });
        }
        $scope.removeReceivingTemp = function(id) {
        $http.delete('api/receivingtemp/' + id).
        success(function(data, status, headers, config) {
            $http.get('api/receivingtemp').success(function(data) {
                    $scope.receivingtemp = data;
                    });
            });
        }
    }]);
})();