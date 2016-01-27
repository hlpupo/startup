/**
 * Created by Hector Reyes on 18/1/2016.
 */
(function () {
  'use strict';
  angular.module('sbAdminApp.Services').service('$user', users);
  users.$inject = ['$http', '$q', 'PATH'];
  function users($http, $q, PATH) {
    return {
      getAllUser: function () {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: PATH.path + PATH.router + '/api/users'
        })
        .success(function (data) {
          deferred.resolve(data);
        })
        .error(function (data) {
          deferred.reject(data);
        });
        return deferred.promise;
      },
      getUserLogin: function () {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: 'api/users'
        })
            .success(function (data) {
              deferred.resolve(data);
            })
            .error(function (data) {
              deferred.reject(data);
            });
        return deferred.promise;
      }

    };
  }
})();