/**
 * @ngdoc function
 * @name translateApp.directive:LanguageSelectDirective
 * @description
 * # LanguageSelectDirective
 * Directive to append language select and set its view and behavior
 */
'use strict';
angular.module('sbAdminApp.directives')
  .directive('ngTranslateLanguageSelect', ['LocaleService', function (LocaleService) {
    return {
      restrict: 'E',
      templateUrl: path + 'bundles/rstaurant/js/admin/directives/selectLenguage/language.html.twig',
      controller: function ($scope) {
        $scope.currentLocaleDisplayName = LocaleService.getLocaleDisplayName();
        $scope.localesDisplayNames = LocaleService.getLocalesDisplayNames();
        $scope.changeLanguage = function (locale) {
          LocaleService.setLocaleByDisplayName(locale);
        };
      }
    };
  }]);
