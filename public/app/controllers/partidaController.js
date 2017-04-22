'use strict';

app.controller("partidaController", function($scope, partidasService,participanteService){
	$scope.participante = {};
	$scope.init = function(){
		participanteService.logado().success(function(res){
			$scope.participante = res.data;	
			$scope.getPartida();
		});
	}

	$scope.getPartida = function(){
		partidasService.find($scope.participante.id_partida).success(function(res){
			$scope.partida = res;	
		});
	}
});