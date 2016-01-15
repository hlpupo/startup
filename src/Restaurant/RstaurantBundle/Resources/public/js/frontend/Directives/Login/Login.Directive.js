/**
 * Created by Hector Reyes on 13/1/2016.
 */
(function () {
  'use strict';
  /**
   * @desc Show the formulation for to login
   * @example <><>
   */
  angular.module('RestaurantApp.Directives').directive('rLogin', login);

  function login() {
    var direct = {
      link: link,
      template: '<p> Prueba de directive para el login [[ name ]]</p>',
      restrict: 'E'
    };
    return direct;

    function link(scope, element, attr) {
      scope.name = 'Hector Reyes';
    }
  }

})();