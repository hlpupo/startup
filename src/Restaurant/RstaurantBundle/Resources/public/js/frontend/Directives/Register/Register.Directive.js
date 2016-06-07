/**
 * Created by Hector Reyes on 30/1/2016.
 */
(function(){
  'use strict';
  angular.module('RestaurantApp.Directives').directive('register', register);
  register.$inject = ['PATH','$Locality', '$Register', 'Upload', '$timeout'];
  function register(PATH, $Locality, $Register, Upload, $timeout) {
    var direct = {
      link: link,
      templateUrl: PATH.path + 'bundles/rstaurant/js/frontend/Directives/Register/register.html',
      restrict: 'E'
    };
    return direct;
    function link(scope, element, attr){
      scope.register = 'register';
      scope.sendData = {};
      scope.locality = $Locality.getLocality(function(data){
       scope.locality = data;
      });

      scope.subscribe = function (typeR) {
        scope.register = 'register';
      };
      
      scope.registerSubmit = function () {
        scope.upload(scope.picFile);
      };

      /*scope.$watch('files', function () {
        scope.upload(scope.files);
      });*/
      scope.$watch('file', function () {
        if (scope.file != null) {
          scope.files = [scope.file];
        }
      });
      scope.log = '';

      scope.upload = function (file) {
          file.upload = Upload.upload({
            url: PATH.path + PATH.router + '/api/registers/users',
            data: {file: file, sendData: scope.sendData},
          });

          file.upload.then(function (response) {
            $timeout(function () {
              file.result = response.data;
            });
          }, function (response) {
            if (response.status > 0) {
              scope.errorMsg = response.status + ': ' + response.data;
            }
          }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
          });

  /*      if (files && files.length) {
          for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.$error) {
              Upload.upload({
                url: PATH.path + PATH.router + '/api/registers/users',
                data: {
                  sendData: scope.sendData,
                  file: file
                }
              }).then(function (resp) {
                $timeout(function() {
                  scope.log = 'file: ' + resp.config.data.file.name +
                      ', Response: ' + JSON.stringify(resp.data) + '\n' + scope.log;
                });
              }, null, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                scope.log = 'progress: ' + progressPercentage + '% ' + evt.config.data.file.name + '\n' +
                    scope.log;
              });
            }
          }
        }*/
      };

















    }
  }
})();