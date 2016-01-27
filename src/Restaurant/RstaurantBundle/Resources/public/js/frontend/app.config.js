/**
 * Created by Hector Reyes on 13/1/2016.
 */
(function () {
  'use strict';

  angular.module('RestaurantApp').config(config);
  /* ngInject */
  config.$inject = ['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider',
    '$interpolateProvider', 'PATH', '$translateProvider', 'tmhDynamicLocaleProvider', '$httpProvider'];

  function config($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, $interpolateProvider, PATH,
                  $translateProvider, tmhDynamicLocaleProvider, $httpProvider) {

    $translateProvider.useMissingTranslationHandlerLog();

    $translateProvider.useStaticFilesLoader({
      prefix: PATH.path + 'bundles/rstaurant/js/frontend/i18n/locale-',// path to translations files
      suffix: '.json'// suffix, currently- extension of the translations
    });
    $translateProvider.preferredLanguage('es_ES');// is applied on first load
    $translateProvider.useLocalStorage();// saves selected language to localStorage
    tmhDynamicLocaleProvider.localeLocationPattern(PATH.path + 'assets/vendor/angular-i18n/angular-locale_{{locale}}.js');


    $interpolateProvider.startSymbol('[[').endSymbol(']]');
    //http://louisracicot.com/blog/angularjs-and-symfony2/ ver el envio por ajax
    $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    $ocLazyLoadProvider.config({
      debug: true,
      events: true
    });
    $ocLazyLoadProvider.config({
      loadedModules: ['RestaurantApp'], modules: [
        {
          name: 'login',
          files: [
            PATH.path + 'bundles/rstaurant/js/frontend/Services/Login/Login.Service.js',
            PATH.path + 'bundles/rstaurant/js/frontend/Controllers/Login.Controller.js',
            PATH.path + 'bundles/rstaurant/js/frontend/Directives/Login/Login.Directive.js'
          ]
        }
      ]
    });
    //$ocLazyLoad.load('login');
    $urlRouterProvider.otherwise('/home');

    $stateProvider.state('login', {
      url: '/login',
      controller: 'LoginController',
      templateUrl: PATH.path + 'bundles/rstaurant/view/frontend/Login/login.html.twig',
      resolve: {
        loadModule: ['$ocLazyLoad', function ($ocLazyLoad) {
          return $ocLazyLoad.load('login');
        }]
      }
    });
    $stateProvider.state('restaurant', {
      url: '/home',
      controller: 'appController',
      templateUrl: PATH.path + 'bundles/rstaurant/view/frontend/index.html.twig'
    });




  }
})();