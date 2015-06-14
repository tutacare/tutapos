(function(){
    var app = angular.module('tutapos', [ ]);

    app.controller("SearchItemCtrl", [ '$scope', '$http', function($scope, $http) {
        $scope.items = [ ];
        $http.get('../api/item').success(function(data) {
            $scope.items = data;
        });
        $scope.itemkittemp = [ ];
        $scope.newitemkittemp = { };
        $http.get('../../api/item-kit-temp').success(function(data, status, headers, config) {
            $scope.itemkittemp = data;
        });
        $scope.addItemKitTemp = function(item) {
            $http.post('../../api/itemkittemp', { item_id: item.id }).
            success(function(data, status, headers, config) {
                $scope.itemkittemp.push(data);
                    $http.get('../../api/item-kit-temp').success(function(data) {
                    $scope.itemkittemp = data;
                    });
            });
        }
        $scope.updateReceivingTemp = function(newreceivingtemp) {
            $http.put('api/receivingtemp/' + newreceivingtemp.id, { quantity: newreceivingtemp.quantity, total_cost: newreceivingtemp.item.cost_price * newreceivingtemp.quantity }).
            success(function(data, status, headers, config) {
                });
        }
        $scope.removeItemKitTemp = function(id) {
            $http.delete('../../api/itemkittemp/' + id).
            success(function(data, status, headers, config) {
                $http.get('../../api/item-kit-temp').success(function(data) {
                        $scope.itemkittemp = data;
                        });
                });
        }     
        $scope.sum = function(list) {
            var total=0;
            angular.forEach(list , function(newreceivingtemp){
                total+= parseFloat(newreceivingtemp.item.cost_price * newreceivingtemp.quantity);
            });
            return total;
        }

    }]);
})();