/**
 * Created by Hector Reyes on 31/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.Services').factory('$Locality', Locality);
  Locality.$inject = ['$http', '$q', 'PATH'];
  function Locality($http, $q, PATH) {
    var obj = {};
    return {
      getLocality: function (fa) {
        if(obj.length){
          fa(obj);
        } else {
          this.loadLocality().then(function(data){
              angular.extend(obj, data);
              fa(obj);
          });
        }
      },
      setLocality: function (objP) {
        angular.extend(obj, objP);
        return obj;
      },
      loadLocality: function() {
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
        return deferred.promise;
      }
    };
  }
})();