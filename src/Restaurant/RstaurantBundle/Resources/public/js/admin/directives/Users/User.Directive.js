/**
 * Created by Hector Reyes on 22/1/2016.
 */
(function(){
  'use strict';

  angular.module('sbAdminApp.directives').directive('users', users);
  users.$inject = ['$user'];

  function users($user) {
    var direct = {
      link: link,
      templateUrl: path + 'bundles/rstaurant/js/admin/directives/Users/user.Directive.html',
      restrict: 'E'
    };
    return direct;

    function link(scope, element, attr) {
      $user.getAllUser().then(function (data) {
        console.log(data)
      });

    }
  }

})();