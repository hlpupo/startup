'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('sbAdminApp')
  .directive('notifications', function () {
    return {
      templateUrl: path + 'bundles/rstaurant/js/admin/directives/notifications/notifications.html',
      restrict: 'E',
      replace: true,
    }
  });


