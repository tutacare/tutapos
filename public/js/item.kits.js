(function(){
    var app = angular.module('tutapos', [ ]);

    app.controller("SearchItemCtrl", [ '$scope', '$http', function($scope, $http) {
        $scope.items = [ ];
        $http.get('../api/item-kits').success(function(data) {
            $scope.items = data;
        });
        $scope.itemkittemp = [ ];
        $scope.newitemkittemp = { };
        $http.get('../../api/item-kit-temp').success(function(data, status, headers, config) {
            $scope.itemkittemp = data;
        });
        $scope.addItemKitTemp = function(item) {
            $http.post('../../api/itemkittemp', { item_id: item.id, cost_price: item.cost_price, selling_price: item.selling_price }).
            success(function(data, status, headers, config) {
                $scope.itemkittemp.push(data);
                    $http.get('../../api/item-kit-temp').success(function(data) {
                    $scope.itemkittemp = data;
                    });
            });
        }
        $scope.updateItemKitTemp = function(newitemkittemp) {
            $http.put('../../api/itemkittemp/' + newitemkittemp.id, { quantity: newitemkittemp.quantity }).
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
        $scope.sumCost = function(list) {
            var total=0;
            angular.forEach(list , function(newitemkittemp){
                total+= parseFloat(newitemkittemp.item.cost_price * newitemkittemp.quantity);
            });
            return total;
        }
        $scope.sumSell = function(list) {
            var total=0;
            angular.forEach(list , function(newitemkittemp){
                total+= parseFloat(newitemkittemp.item.selling_price * newitemkittemp.quantity);
            });
            return total;
        }


    }]);
})();