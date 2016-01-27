(function () {
  'use strict';
  /**
   * @ngdoc function
   * @name translateApp.directive:LanguageSelectDirective
   * @description
   * # LanguageSelectDirective
   * Directive to append language select and set its view and behavior
   * @example <ng-translate-language-select>
   */
  angular.module('RestaurantApp.Directives').directive('ngTranslateLanguageSelect', ngTranslateLanguageSelect);

  ngTranslateLanguageSelect.$inject = ['LocaleService', 'PATH'];

  function ngTranslateLanguageSelect(LocaleService, PATH) {
    return {
      restrict: 'E',
      templateUrl: PATH.path + 'bundles/rstaurant/js/frontend/Directives/selectLanguage/language.html.twig',
      controller: function ($scope) {
        $scope.currentLocaleDisplayName = LocaleService.getLocaleDisplayName();
        $scope.localesDisplayNames = LocaleService.getLocalesDisplayNames();
        $scope.changeLanguage = function (locale) {
          LocaleService.setLocaleByDisplayName(locale);
        };
      }
    };
  }
})();