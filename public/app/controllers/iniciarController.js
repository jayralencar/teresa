'use strict';

app.controller("iniciarController", function($scope, $routeParams, partidasService) {

	$scope.tempo = "00:00:00";

	$scope.init = function(){
		$scope.getPartida();
	}

	$scope.getPartida = function(){
		partidasService.find($routeParams.id_partida).success(function(res){
			$scope.partida = res;
		});
	}
});