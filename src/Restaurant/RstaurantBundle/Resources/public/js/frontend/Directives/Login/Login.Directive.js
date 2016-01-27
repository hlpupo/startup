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

  login.$inject = ['PATH', '$Login', '$window'];

  function login(PATH, $Login, $window) {
    var direct = {
      link: link,
      templateUrl: PATH.path + 'bundles/rstaurant/js/frontend/Directives/Login/login.html',
      restrict: 'E'
    };
    return direct;

    function link(scope, element, attr) {
      scope.name = 'Hector Reyes';
      scope.sendData = {};
      scope.sendLogin = function () {
        $Login.send(scope.sendData).then(function (data) {
          if (data.success && data.ROLE === 'ADMIN') {
            $window.location.href = PATH.path + PATH.router + '/restaurant/dashboard';
          } else if (data.success && data.ROLE === 'RESTAURANT') {
            $window.location.href = PATH.path + PATH.router + '/restaurant/dashboard';
          } else if (data.success && data.ROLE === 'USER') {
            $window.location.href = PATH.path + PATH.router + '/restaurant/dashboard';
          } else {

          }
        });
      };
    }
  }

})();