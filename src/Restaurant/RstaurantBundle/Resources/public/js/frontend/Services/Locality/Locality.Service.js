/**
 * Created by Hector Reyes on 31/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.RestaurantApp.Services').factory('$Locality', Locality);
  Locality.$inject = ['$http', '$q', 'PATH']
  function Locality($http, $q, PATH) {
    var obj = {};
    return {
      getLocality: function () {
        //return obj;
        if(obj.length){
          return obj;
        } else {
          return this.getLocality(function(){
            return obj;
          });
        }

      },
      setLocality: function (objP) {
        angular.extend(obj, objP);
        return obj;
      },
      loadLocality: function(fa) {
        var deferred = $q.defer();
        $http({
          method: 'GET',
          url: PATH.path + PATH.router + '/api/province/municipality',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
          deferred.resolve(data);
        }).error(function (data) {
          deferred.reject(data);
        });
        deferred.promise.then(function(data){
          angular.extend(obj, data);
          fa();
        });
      }
    };
  }
})();