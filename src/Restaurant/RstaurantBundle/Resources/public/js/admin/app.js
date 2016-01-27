'use strict';
//Angular won’t know where to find them because of the special tree folder of symfony.
var origin, path, router;
origin = document.location.origin;
router = document.location.pathname.split('/')[1];
path = origin + '/';

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
  'ngMessages',
  'ui-notification',
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
  }).constant('PATH', {
      path:path,
      router:router
    })
  .config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', '$interpolateProvider',
    '$locationProvider', '$translateProvider', 'tmhDynamicLocaleProvider', 'PATH', '$httpProvider',
      'NotificationProvider',
    function ($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, $interpolateProvider,
              $locationProvider, $translateProvider, tmhDynamicLocaleProvider, PATH, $httpProvider,
              NotificationProvider) {
      //To get warnings in the developer console

      $translateProvider.useMissingTranslationHandlerLog();

      $translateProvider.useStaticFilesLoader({
        prefix: PATH.path + 'bundles/rstaurant/js/admin/i18n/locale-',// path to translations files
        suffix: '.json'// suffix, currently- extension of the translations
      });
      $translateProvider.preferredLanguage('es_ES');// is applied on first load
      $translateProvider.useLocalStorage();// saves selected language to localStorage
      tmhDynamicLocaleProvider.localeLocationPattern(PATH.path + 'assets/vendor/angular-i18n/angular-locale_{{locale}}.js');

      $interpolateProvider.startSymbol('[[').endSymbol(']]');
      $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
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
              PATH.path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
              PATH.path + 'bundles/rstaurant/js/admin/service/place.js',
              PATH.path + 'bundles/rstaurant/js/admin/directives/place/place.js'
            ]
          }
        ]
      });
      //https://github.com/alexcrack/angular-ui-notification
      NotificationProvider.setOptions({
        delay: 10000,
        startTop: 20,
        startRight: 10,
        verticalSpacing: 20,
        horizontalSpacing: 20,
        positionX: 'right',
        positionY: 'top'
      });
      $urlRouterProvider.otherwise('/dashboard');

      $stateProvider
        .state('dashboard', {
          url: '/dashboard',
          templateUrl: PATH.path + 'bundles/rstaurant/view/dashboard/main.html.twig',
          resolve: {
            loadMyDirectives: function ($ocLazyLoad) {
              return $ocLazyLoad.load(
                {
                  name: 'sbAdminApp',
                  files: [
                    //PATH.path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
                    PATH.path + 'bundles/rstaurant/js/admin/directives/header/header.js',
                    PATH.path + 'bundles/rstaurant/js/admin/directives/header/header-notification/header-notification.js',
                    PATH.path + 'bundles/rstaurant/js/admin/directives/sidebar/sidebar.js',
                    PATH.path + 'bundles/rstaurant/js/admin/directives/sidebar/sidebar-search/sidebar-search.js',
                    PATH.path + 'bundles/rstaurant/js/admin/service/LocaleService.js',
                    PATH.path + 'bundles/rstaurant/js/admin/directives/selectLenguage/LanguageSelectDirective.js'
                  ]
                });
            }
          }
        })
        .state('dashboard.users', {
          url: '/users',
          template: '<users></users>',
          resolve: {
            loadMyDirectives: function ($ocLazyLoad) {
              return $ocLazyLoad.load(
                  {
                    name: 'sbAdminApp',
                    files: [
                      PATH.path + 'bundles/rstaurant/js/admin/directives/Users/User.Directive.js',
                      PATH.path + 'bundles/rstaurant/js/admin/service/Users.service.js'
                    ]
                  });
            }
          }
        })
        .state('dashboard.place', {
          url: '/place',
          controller: 'PlaceController',
          templateUrl: PATH.path + 'bundles/rstaurant/view/place.html',
          resolve: {
            loadModule: ['$ocLazyLoad', function ($ocLazyLoad) {
              return $ocLazyLoad.load('place');
            }]
          }
        })
        .state('dashboard.home', {
          url: '/home',
          controller: 'MainCtrl',
          templateUrl: PATH.path + 'bundles/rstaurant/view/dashboard/home.html.twig',
          resolve: {
            loadMyFiles: function ($ocLazyLoad) {
              return $ocLazyLoad.load({
                name: 'sbAdminApp',
                files: [
                  //PATH.path + 'bundles/rstaurant/js/admin/controllers/placeController.js',
                  PATH.path + 'bundles/rstaurant/js/admin/controllers/main.js',
                  PATH.path + 'bundles/rstaurant/js/admin/directives/timeline/timeline.js',
                  PATH.path + 'bundles/rstaurant/js/admin/directives/notifications/notifications.js',
                  PATH.path + 'bundles/rstaurant/js/admin/directives/chat/chat.js',
                  PATH.path + 'bundles/rstaurant/js/admin/directives/dashboard/stats/stats.js'
                ]
              })
            }
          }
        })
        .state('dashboard.form', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/form.html',
          url: '/form'
        })
        .state('dashboard.blank', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/pages/blank.html',
          url: '/blank'
        })
        .state('login', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/pages/login.html',
          url: '/login'
        })
        .state('dashboard.chart', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/chart.html',
          url: '/chart',
          controller: 'ChartCtrl',
          resolve: {
            loadMyFile: function ($ocLazyLoad) {
              return $ocLazyLoad.load({
                name: 'chart.js',
                files: [
                  PATH.path + 'assets/vendor/angular-chart.js/dist/angular-chart.min.js',
                  PATH.path + 'assets/vendor/angular-chart.js/dist/angular-chart.css'
                ]
              }),
                $ocLazyLoad.load({
                  name: 'sbAdminApp',
                  files: [PATH.path + 'bundles/rstaurant/js/admin/controllers/chartContoller.js']
                })
            }
          }
        })
        .state('dashboard.table', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/table.html',
          url: '/table'
        })
        .state('dashboard.panels-wells', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/panels-wells.html',
          url: '/panels-wells'
        })
        .state('dashboard.buttons', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/buttons.html',
          url: '/buttons'
        })
        .state('dashboard.notifications', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/notifications.html',
          url: '/notifications'
        })
        .state('dashboard.typography', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/typography.html',
          url: '/typography'
        })
        .state('dashboard.icons', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/icons.html',
          url: '/icons'
        })
        .state('dashboard.grid', {
          templateUrl: PATH.path + 'bundles/rstaurant/view/ui-elements/grid.html',
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

    
