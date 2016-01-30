/**
 * Created by Hector Reyes on 30/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.Services').factory('$Logout', Logout);
  Logout.$inject = ['$http', '$q', 'PATH'];
  function Logout($http, $q, PATH){
    return {
      logout: function () {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: PATH.path + PATH.router + '/logout',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
          deferred.resolve(data);
        }).error(function (data) {
          deferred.reject(data);
        });
        return deferred.promise;
      }
    };
  }
})();