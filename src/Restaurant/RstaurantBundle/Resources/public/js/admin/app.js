'use strict';
//Angular won’t know where to find them because of the special tree folder of symfony.
var origin = document.location.origin;
var folder = document.location.pathname.split('/')[1];
//var path = origin + "/" + folder + "/";
var path = origin + "/";

/**
 * @ngdoc overview
 * @name sbAdminApp
 * @description
 * # sbAdminApp
 *
 * Main module of the application.
 */
angular.module('sbAdminApp.filters', []);
angular.module('sbAdminApp.Services', []);
angular.module('sbAdminApp.directives', []);
angular.module('sbAdminApp.controllers', []);
angular.module('sbAdminApp', [
  'oc.lazyLoad',
  'ui.router',
  'ui.bootstrap',
  'ngCookies',
  'angular-loading-bar',
  'pascalprecht.translate',// angular-translate
  'tmh.dynamicLocale',// angular-dynamic-locale
  'sbAdminApp.controllers',
  'sbAdminApp.Services',
  'sbAdminApp.directives'
])
  .constant('LOCALES', {
    'locales': {
      'en_US': 'English',
      'es_ES': 'Espanol'
    },
    'preferredLocale': 'es_ES'
  })
  .config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', '$interpolateProvider',
    '$locationProvider', '$translateProvider', 'tmhDynamicLocaleProvider',
    function ($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, $interpolateProvider,
              $locationProvider, $translateProvider, tmhDynamicLocaleProvider) {
      //To get warnings in the developer console

      $translateProvider.useMissingTranslationHandlerLog();

      $translateProvider.useStaticFilesLoader({
        prefix: path + 'bundles/rstaurant/js/admin/i18n/locale-',// path to translations files
        suffix: '.json'// suffix, currently- extension of the translations
      });
      $translateProvider.preferredLanguage('es_ES');// is applied on first load
      $translateProvider.useLocalStorage();// saves selected language to localStorage
      tmhDynamicLocaleProvider.localeLocationPattern(path + 'assets/vendor/angular-i18n/angular-locale_{{locale}}.js');

      $interpolateProvider.startSymbol('[[').endSymbol(']]');
      //$locationProvider.html5Mode(true);
      $ocLazyLoadProvider.config({
        debug: false,
        events: true
      });
      $ocLazyLoadProvider.config({
        loadedModules: ['sbAdminApp'], modules: [
          {
            name: 'place',
            files: [
              path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
              path + 'bundles/rstaurant/js/admin/service/place.js',
              path + 'bundles/rstaurant/js/admin/directives/place/place.js'
            ]
          }
        ]
      });

      $urlRouterProvider.otherwise('/dashboard');

      $stateProvider
        .state('dashboard', {
          url: '/dashboard',
          templateUrl: path + 'bundles/rstaurant/view/dashboard/main.html.twig',
          resolve: {
            loadMyDirectives: function ($ocLazyLoad) {
              return $ocLazyLoad.load(
                {
                  name: 'sbAdminApp',
                  files: [
                    //path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
                    path + 'bundles/rstaurant/js/admin/directives/header/header.js',
                    path + 'bundles/rstaurant/js/admin/directives/header/header-notification/header-notification.js',
                    path + 'bundles/rstaurant/js/admin/directives/sidebar/sidebar.js',
                    path + 'bundles/rstaurant/js/admin/directives/sidebar/sidebar-search/sidebar-search.js',
                    path + 'bundles/rstaurant/js/admin/service/LocaleService.js',
                    path + 'bundles/rstaurant/js/admin/directives/selectLenguage/LanguageSelectDirective.js'
                  ]
                });
            }
          }
        })
        .state('dashboard.place', {
          url: '/place',
          controller: 'PlaceController',
          templateUrl: path + 'bundles/rstaurant/view/place.html',
          resolve: {
            loadModule: ['$ocLazyLoad', function ($ocLazyLoad) {
              return $ocLazyLoad.load('place');
            }]
          }
        })
        .state('dashboard.home', {
          url: '/home',
          controller: 'MainCtrl',
          templateUrl: path + 'bundles/rstaurant/view/dashboard/home.html.twig',
          resolve: {
            loadMyFiles: function ($ocLazyLoad) {
              return $ocLazyLoad.load({
                name: 'sbAdminApp',
                files: [
                  //path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
                  path + 'bundles/rstaurant/js/admin/controllers/main.js',
                  path + 'bundles/rstaurant/js/admin/directives/timeline/timeline.js',
                  path + 'bundles/rstaurant/js/admin/directives/notifications/notifications.js',
                  path + 'bundles/rstaurant/js/admin/directives/chat/chat.js',
                  path + 'bundles/rstaurant/js/admin/directives/dashboard/stats/stats.js'
                ]
              })
            }
          }
        })
        .state('dashboard.form', {
          templateUrl: path + 'bundles/rstaurant/view/form.html',
          url: '/form'
        })
        .state('dashboard.blank', {
          templateUrl: path + 'bundles/rstaurant/view/pages/blank.html',
          url: '/blank'
        })
        .state('login', {
          templateUrl: path + 'bundles/rstaurant/view/pages/login.html',
          url: '/login'
        })
        .state('dashboard.chart', {
          templateUrl: path + 'bundles/rstaurant/view/chart.html',
          url: '/chart',
          controller: 'ChartCtrl',
          resolve: {
            loadMyFile: function ($ocLazyLoad) {
              return $ocLazyLoad.load({
                name: 'chart.js',
                files: [
                  path + 'assets/vendor/angular-chart.js/dist/angular-chart.min.js',
                  path + 'assets/vendor/angular-chart.js/dist/angular-chart.css'
                ]
              }),
                $ocLazyLoad.load({
                  name: 'sbAdminApp',
                  files: [path + 'bundles/rstaurant/js/admin/controllers/chartContoller.js']
                })
            }
          }
        })
        .state('dashboard.table', {
          templateUrl: path + 'bundles/rstaurant/view/table.html',
          url: '/table'
        })
        .state('dashboard.panels-wells', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/panels-wells.html',
          url: '/panels-wells'
        })
        .state('dashboard.buttons', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/buttons.html',
          url: '/buttons'
        })
        .state('dashboard.notifications', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/notifications.html',
          url: '/notifications'
        })
        .state('dashboard.typography', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/typography.html',
          url: '/typography'
        })
        .state('dashboard.icons', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/icons.html',
          url: '/icons'
        })
        .state('dashboard.grid', {
          templateUrl: path + 'bundles/rstaurant/view/ui-elements/grid.html',
          url: '/grid'
        }).
        state('contacts', {
          url: '/contacts',
          template: "<h1>[[title]]</h1>",
          controller: function ($scope) {
            $scope.title = 'My Contacts';
          }
        })
    }]);

    
