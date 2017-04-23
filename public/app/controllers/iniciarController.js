'use strict';

app.controller("iniciarController", function($scope, $interval, $routeParams, partidasService, participanteService) {


	$scope.cronometro = {
		tempo_formatado : '00:00:00'
	}

	$scope.init = function(){
		$scope.getPartida();
	}

	$scope.getPartida = function(){
		partidasService.find($routeParams.id_partida).success(function(res){
			$scope.partida = res;
			$scope.getParticipantes();
			if(res.inicio){
				$scope.startCron();
			}
		});
	}

	$scope.getParticipantes = function(){
		participanteService.get($scope.partida.id_partida).success(function(res){
			$scope.participantes = res;
		})
	}

	conn.onmessage = function(res){
		if(res.data == "maisum"){
			$scope.getParticipantes();
		}
	}


	$scope.iniciar = function(){
		var inicio = (new Date()).getTime();

		partidasService.put($scope.partida.id_partida,	{id_partida:$scope.id_partida, inicio: inicio}).success(function(){
			partidasService.find($routeParams.id_partida).success(function(res){
				$scope.partida = res;
				$scope.startCron();
				conn.send("iniciar");
			});
		})
	}

	$scope.startCron = function(){
		$scope.cronometro.interval = $interval(function(){
			$scope.cronometro.tempo_formatado = ($scope.msToTime($scope.cronometro.milesimos())).substring(0,8);
		},100)
	}

	$scope.cronometro.milesimos = function(){
		if(!$scope.partida.inicio){
			return 0;
		}
		var now = new Date();
		return now.getTime()-$scope.partida.inicio;
	}

	$scope.msToTime = function(s) {

		function addZ(n) {
			return (n<10? '0':'') + n;
		}

		var ms = s % 1000;
		s = (s - ms) / 1000;
		var secs = s % 60;
		s = (s - secs) / 60;
		var mins = s % 60;
		var hrs = (s - mins) / 60;

		return addZ(hrs) + ':' + addZ(mins) + ':' + addZ(secs) + '.' + ms;
	}
});