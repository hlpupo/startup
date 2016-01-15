/**
 * Created by Hector Reyes on 2/1/2016.
 */

'use strict';

angular.module('sbAdminApp')
  .factory('$place', ['$http', '$q', function ($http, $q) {
    return {
      getAllProvince: function () {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: "/app_dev.php/api/province"
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
  }]);
