/**
 * Created by Hector Reyes on 31/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.Services').factory('$Register', Register);
  Register.$inject = ['$http', '$q', 'PATH'];
  function Register($http, $q, PATH){
    return {
      send: function (data) {
        var deferred = $q.defer();
        $http({
          method: 'POST',
          url: PATH.path + PATH.router + '/api/registers/users',
          data: $.param(data),
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