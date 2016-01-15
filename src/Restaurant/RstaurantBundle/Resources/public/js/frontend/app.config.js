/**
 * Created by Hector Reyes on 13/1/2016.
 */
(function () {
  'use strict';

  angular.module('RestaurantApp').config(config);
  /* ngInject */
  config.$inject = ['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider',
    '$interpolateProvider', 'PATH', '$translateProvider', 'tmhDynamicLocaleProvider'];

  function config($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, $interpolateProvider, PATH,
                  $translateProvider, tmhDynamicLocaleProvider) {

    $translateProvider.useMissingTranslationHandlerLog();

    $translateProvider.useStaticFilesLoader({
      prefix: PATH + 'bundles/rstaurant/js/frontend/i18n/locale-',// path to translations files
      suffix: '.json'// suffix, currently- extension of the translations
    });
    $translateProvider.preferredLanguage('es_ES');// is applied on first load
    $translateProvider.useLocalStorage();// saves selected language to localStorage
    tmhDynamicLocaleProvider.localeLocationPattern(PATH + 'assets/vendor/angular-i18n/angular-locale_{{locale}}.js');


    $interpolateProvider.startSymbol('[[').endSymbol(']]');
    $ocLazyLoadProvider.config({
      debug: true,
      events: true
    });
    $ocLazyLoadProvider.config({
      loadedModules: ['RestaurantApp'], modules: [
        {
          name: 'login',
          files: [
            PATH + 'bundles/rstaurant/js/frontend/Controllers/Login.Controller.js',
            PATH + 'bundles/rstaurant/js/frontend/Directives/Login/Login.Directive.js'
          ]
        }
      ]
    });
    //$ocLazyLoad.load('login');
    $urlRouterProvider.otherwise('/home');

    $stateProvider.state('login', {
      url: '/login',
      controller: 'LoginController',
      templateUrl: PATH + 'bundles/rstaurant/view/frontend/Login/login.html.twig',
      resolve: {
        loadModule: ['$ocLazyLoad', function ($ocLazyLoad) {
          return $ocLazyLoad.load('login');
        }]
      }
    });
    $stateProvider.state('restaurant', {
      url: '/home',
      controller: 'appController',
      templateUrl: PATH + 'bundles/rstaurant/view/frontend/index.html.twig',
      resolve: {
        loadMyFiles: function ($ocLazyLoad) {
          return $ocLazyLoad.load(
            {
              name: 'RestaurantApp',
              files: [
                PATH + 'bundles/rstaurant/js/frontend/Controllers/Restaurant.Controller.js',
                PATH + 'bundles/rstaurant/js/frontend/Services/LocaleService.js',
                PATH + 'bundles/rstaurant/js/frontend/Directives/selectLanguage/LanguageSelectDirective.js'
              ]
            }
          );
        }
      }
    });




  }
})();