/*(function () {*/
'use strict';
/**
 * @ngdoc function
 * @name sbAdminApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the sbAdminApp
 */
angular.module('sbAdminApp.controllers')
  .controller('PlaceController', [ '$scope', '$place', '$uibModal', '$log', '$rootScope',
    function ($scope, $place, $uibModal, $log, $rootScope) {

    $scope.items = ['item1', 'item2', 'item3'];

    $scope.animationsEnabled = true;






    $scope.openModal = function () {

      $log.info('Modal dismissed at: ' + new Date());
      var modalInstance = $uibModal.open({
        animation: $scope.animationsEnabled,
        templateUrl: 'myModalContent.html',
        controller: 'ModalInstanceController',
        resolve: {
          items: function () {
            return $scope.items;
          }
        }
      });

      modalInstance.result.then(function (selectedItem) {
        $scope.selected = selectedItem;
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    };

    $scope.toggleAnimation = function () {
      $scope.animationsEnabled = !$scope.animationsEnabled;
    };
  }])
  .controller('ModalInstanceController', function ($scope, $uibModalInstance, items) {
    // Please note that $modalInstance represents a modal window (instance) dependency.
    // It is not the same as the $uibModal service used above.
    $scope.items = items;
    $scope.selected = {
      item: $scope.items[0]
    };

    $scope.ok = function () {
      $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
      $uibModalInstance.dismiss('cancel');
    };
  });
/*
 })();*/
