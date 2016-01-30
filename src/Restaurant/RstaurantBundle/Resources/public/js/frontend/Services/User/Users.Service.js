/**
 * Created by Hector Reyes on 29/1/2016.
 */
(function(){
  'use strict';
  angular.module('RestaurantApp.Services').factory('$Users', users);
  users.$inject = ['$http', '$q', 'PATH'];
  function users($http, $q, PATH){
    var obj = {};
    return {
      getUser: function () {
        return obj;
      },
      setUser: function (objP) {
        angular.extend(obj, objP);
        return obj;
      },
      loadUser: function() {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: PATH.path + PATH.router + '/api/user',
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