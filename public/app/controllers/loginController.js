'use strict';
app.controller("loginController", function($scope, $location, participanteService) {
	$scope.entrar = function(){
		participanteService.post($scope.login).success(function(res){
			if(res.status == 0){
				$scope.error = res.message;
			}else{
				$location.path("/partida");
			}
		})
	}
})