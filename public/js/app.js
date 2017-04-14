'use strict';
var app = angular.module('app',["ngRoute",'ngProgress','angularUtils.directives.dirPagination']);

app.config(function($routeProvider){
  $routeProvider.when("/", {
    templateUrl : "app/views/login.html",
    controller : "loginController"
  })
  .when("/admin", {
    templateUrl : "app/views/loginAdmin.html",
    controller : "loginAdminController"
  })
  .when("/administrador", {
    templateUrl : "app/views/admin.html",
    controller : "adminController"
  })
 });

app.run(function($window, $location, $rootScope,$anchorScroll, ngProgressFactory, loginService) {
  var ngProgress = ngProgressFactory.createInstance();
  $rootScope.$on('$routeChangeStart', function(ev, next, current) {
    ngProgress.setColor('pink');
    ngProgress.start();
    if(next.$$route.requiredLogin){
      loginService.logado().success(function(res){
        if(!res.logado){
          $location.path('/')
        }
      });
    }
  });

  $rootScope.$on('$routeChangeSuccess', function(event, current, previous) {
    ngProgress.complete();
  });
});
