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
  .directive('place', ['$place', function ($place) {
    return {
      templateUrl: path + 'bundles/rstaurant/js/admin/directives/place/place.html.twig',
      restrict: 'E',
      scope: {
        'place': '@'
      },
      link: function (scope) {

        $place.getAllProvince().then(function (data) {
          scope.province = data;
          scope.municipality = [];
          //console.log(scope.province[0]);
          angular.forEach(scope.province, function (value) {
            angular.forEach(value.municipality, function (val) {
              //console.log(val);
              scope.municipality.push({
                'id': val.municipalityid,
                'municipality': val.name,
                'province': value.name
              });
            });
          });

        });

      }
    };
  }]);