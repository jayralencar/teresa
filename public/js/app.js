'use strict';
var app = angular.module('app',["ngRoute",'ngProgress','angularUtils.directives.dirPagination','ui.tinymce','ace.angular','ngSanitize']);

var conn = new WebSocket('ws://localhost:4321');

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
    controller : "adminController",
    requiredAdmin: true
  })
  .when("/questoes", {
    templateUrl : "app/views/questoes.html",
    controller : "questoesController",
    requiredAdmin: true
  })
  .when("/partidas", {
    templateUrl : "app/views/partidas.html",
    controller : "partidasController",
    requiredAdmin: true
  })
  .when("/iniciar/:id_partida", {
    templateUrl : "app/views/iniciar-partida.html",
    controller : "iniciarController",
    requiredAdmin: true
  })
  .when("/partida", {
    templateUrl : "app/views/partida.html",
    controller : "partidaController",
    requiredLogin: true
  })

 });

app.run(function($window, $location, $rootScope,$anchorScroll, ngProgressFactory, participanteService, loginAdminService) {
  var ngProgress = ngProgressFactory.createInstance();
  $rootScope.$on('$routeChangeStart', function(ev, next, current) {
    ngProgress.setColor('pink');
    ngProgress.start();
    if(next.$$route.requiredAdmin){
      loginAdminService.logado().success(function(res){
        if(!res.logado){
          $location.path('/admin')
        }
      })
    }
    if(next.$$route.requiredLogin){
      participanteService.logado().success(function(res){
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
