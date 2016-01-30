/**
 * Created by Hector Reyes on 13/1/2016.
 */
(function () {
  'use strict';
  /**
   * @desc Show the formulation for to login
   * @example <><>
   */
  angular.module('RestaurantApp.Directives').directive('profile', login);

  login.$inject = ['PATH', '$Users', '$sce', '$timeout'];

  function login(PATH, $Users, $sce, $timeout) {
    var direct = {
      link: link,
      templateUrl: PATH.path + 'bundles/rstaurant/js/frontend/Directives/Profile/profile.html',
      restrict: 'E'
    };
    return direct;

    function link(scope, element, attr) {

      scope.name = 'Hector Reyes';
      scope.sendData = {};
      $Users.loadUser().then(function(data){
        $Users.setUser(data);
        scope.User = $Users.getUser();
        console.log(scope.User);
        if (scope.User.profile_picture.match(/default/g)) {
          scope.showUser1 = '<div class="img-circle img80_80 center-block picture_profile ' + scope.User.profile_picture + '"></div>';
        } else {
          scope.showUser1 = '<img alt="" src="' + scope.User.profile_picture + '" class="img-circle img80_80">';
        }
        scope.showUser = $sce.trustAsHtml(scope.showUser1);
      });



    }
  }

})();