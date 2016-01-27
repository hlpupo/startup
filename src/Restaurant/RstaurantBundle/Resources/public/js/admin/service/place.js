/**
 * Created by Hector Reyes on 2/1/2016.
 */

'use strict';

angular.module('sbAdminApp')
  .factory('$place', ['$http', '$q', 'PATH', function ($http, $q, PATH) {
    return {
      getAllProvince: function () {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: PATH.path + PATH.router + '/api/province'
        })
          .success(function (data) {
            deferred.resolve(data);
          })
          .error(function (data) {
            deferred.reject(data);
          });
        return deferred.promise;
      },
      postProvince: function (data) {
        var deferred = $q.defer();
        $http({
          method: 'POST',
          url: PATH.path + PATH.router + '/api/provinces',
          data: $.param(data),
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
          deferred.resolve(data);
        }).error(function (data) {
          deferred.reject(data);
        });
        return deferred.promise;
      },
      deleteProvince: function (data) {
        var deferred = $q.defer();
        $http({
          method: 'DELETE',
          url: PATH.path + PATH.router + '/api/province',
          data: $.param(data),
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
          deferred.resolve(data);
        }).error(function (data) {
          deferred.reject(data);
        });
        return deferred.promise;
      },
      editProvince: function (data) {
        var deferred = $q.defer();
        $http({
          method: 'PUT',
          url: PATH.path + PATH.router + '/api/province',
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
  }]);
