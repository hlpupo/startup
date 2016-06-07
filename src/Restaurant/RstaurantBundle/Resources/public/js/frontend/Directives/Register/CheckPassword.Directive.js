/**
 * Created by Hector Reyes on 31/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.Directives').directive('checkPassword', checkPassword);
  function checkPassword() {
    var direct = {
      link: link,
      require: 'ngModel'
    };
    return direct;
    function link(scope, element, attr, ctrl) {
      ctrl.$parsers.unshift(function (viewValue, $scope) {
        if (viewValue !== scope.registerForm.password.$viewValue) {
          ctrl.$setValidity('noMatch', false);
        } else {
          ctrl.$setValidity('noMatch', true);
        }
      });
    }
  }
})();