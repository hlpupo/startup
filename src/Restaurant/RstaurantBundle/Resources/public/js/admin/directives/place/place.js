'use strict';
/**
 * Created by Hector Reyes on 2/1/2016.
 */


/**
 * @ngdoc directive
 * @name place
 * @description
 * # adminPosHeader
 */
angular.module('sbAdminApp')
  .directive('place', ['$place', 'Notification', '$translate', '$rootScope',
      function ($place, Notification, $translate, $rootScope) {
    return {
      templateUrl: path + 'bundles/rstaurant/js/admin/directives/place/place.html.twig',
      restrict: 'E',
      scope: {
        'place': '@'
      },
      link: function (scope) {

        $translate('notifications.prov.delete').then(function (not) {
         scope.notDelete = not;
        });
        $place.getAllProvince().then(function (data) {
          scope.province = data;
          scope.municipality = [];
          angular.forEach(scope.province, function (value) {
            angular.forEach(value.municipality, function (val) {
              scope.municipality.push({
                'id': val.municipalityid,
                'municipality': val.name,
                'province': value.name
              });
            });
          });
        });

        scope.deleteProvince = function (id) {
          $place.deleteProvince({'id':id}).then(function(data){
            console.log(data);
            Notification.success(scope.notDelete);
            /*if(data.status) {
              $translate('notifications.prov.delete').then(function (not) {
                Notification.success(not);
              });
            } else {
              $translate('notifications.prov.delete.fail').then(function (not) {
                Notification.error(not);
              });
            }*/
          });
        };
        scope.openModal = function(type){

        };

      }
    };
  }]);