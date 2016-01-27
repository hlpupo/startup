/**
 * Created by Hector Reyes on 13/1/2016.
 */
(function () {
  'use strict';
  var origin, path, router;
  origin = document.location.origin;
  router = document.location.pathname.split('/')[1];
  path = origin + '/';
  angular.module('RestaurantApp')
    .constant('PATH', {
        path:path,
        router:router
      })
    .constant('LOCALES', {
      'locales': {
        'en_US': 'English',
        'es_ES': 'Espanol'
      },
      'preferredLocale': 'es_ES'
    });
})();