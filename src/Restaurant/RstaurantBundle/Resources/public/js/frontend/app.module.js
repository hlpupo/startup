/**
 * Created by Hector Reyes on 12/1/2016.
 */
(function () {
  'use strict';
  angular.module('RestaurantApp.Controllers', []);
  angular.module('RestaurantApp.Services', []);
  angular.module('RestaurantApp.Directives', []);
  angular.module('RestaurantApp', [
    'oc.lazyLoad',
    'ui.router',
    'ui.bootstrap',
    'ngCookies',
    'ngAnimate',
    /*'angular-loading-bar', //angular-loading-bar*/
    'pascalprecht.translate',// angular-translate
    'tmh.dynamicLocale',// angular-dynamic-locale
    'RestaurantApp.Controllers',
    'RestaurantApp.Directives',
    'RestaurantApp.Services'
  ]);
})();