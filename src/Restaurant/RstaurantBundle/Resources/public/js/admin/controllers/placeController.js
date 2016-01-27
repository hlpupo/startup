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
    .controller('PlaceController', ['$scope', '$place', '$uibModal', '$log', '$rootScope', 'Notification',
      '$translate',
      function ($scope, $place, $uibModal, $log, $rootScope, Notification, $translate) {
        $scope.animationsEnabled = true;
        $scope.municipality = {};


        $scope.openModal = function (type) {
          $log.info('Modal dismissed at: ' + new Date());
          var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceController',
            resolve: {
              Notification: function () {
                return Notification;
              },
              place: function () {
                return $place;
              },
              translate: function () {
                return $translate;
              },
              type: function () {
                return type;
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
    .controller('ModalInstanceController', function ($scope, $uibModalInstance, Notification, place, translate, type) {
      // Please note that $modalInstance represents a modal window (instance) dependency.
      // It is not the same as the $uibModal service used above.

      $scope.formData = {};
      $scope.formData.province = {};
      $scope.provinceEmpty = false;
      $scope.ok = function () {
        $scope.formData.province.name = $scope.formData.province.name.trim();
        if (type === 'new') {
          if ($scope.formData.province.name !== '') {
            place.postProvince($scope.formData).then(function () {
              $scope.provinceEmpty = false;
              $uibModalInstance.close();
              //translate('notifications.prov.create').then(function (not) {
              Notification.success('notifications.prov.create');
              // });

            });
          } else {
            $scope.provinceEmpty = true;
          }
        } else {
          if ($scope.formData.province.name !== '') {
            place.editProvince($scope.formData).then(function () {
              $scope.provinceEmpty = false;
              $uibModalInstance.close();
              //translate('notifications.prov.create').then(function (not) {
              Notification.success('notifications.prov.Edit');
              // });

            });
          } else {
            $scope.provinceEmpty = true;
          }
        }
      };

      $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };
    });
/*
 })();*/
