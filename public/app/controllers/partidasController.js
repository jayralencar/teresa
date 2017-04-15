'use strict';
app.controller("partidasController", function($scope, partidasService, questoesService,partidaQuestaoService) {
	$scope.init = function(){
		partidasService.get().success(function(res){
			$scope.partidas = res;
		});
	}

	$scope.editar = function(data){
		$scope.partida = data;
		$scope.partida.duracao = $scope.msToTime($scope.partida.duracao_ms);
		$('#modalCadastro').modal("show");
	}

	$scope.salvar = function(){
		$scope.partida.duracao_ms = $scope.timeToMs($scope.partida.duracao);
		if($scope.partida.id_partida){
			partidasService.put($scope.partida.id_partida, $scope.partida).success(function(res){
				$('#modalCadastro').modal("hide");
				$scope.init();
			})
		}else{
			partidasService.post($scope.partida).success(function(res){
				$('#modalCadastro').modal("hide");
				$scope.init();
			})
		}
	}

	$scope.excluir = function(data){
		if(confirm("Tem certeza que deseja excluir?")){
			partidasService.delete(data.id_partida).success(function(res){
				$scope.init();
			});
		}
	}

	$scope.timeToMs = function(time){
		var split = time.split(':');
		var horas = (parseInt(split[0]) * 3600)*1000;
		var minutos = (parseInt(split[1])*60)*1000;
		var segundos_millisegundos = split[2];
		// var parte = segundos_millisegundos.split('.');
		var segundos = parseInt(split[2])*1000;
		// var milesimos = parseInt(parte[1]);
		var ms = horas+minutos+segundos;
		return ms;
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

		return addZ(hrs) + ':' + addZ(mins) + ':' + addZ(secs);
	}

	$scope.status = [
		{id:1,nome:"Nova"},
		{id:2,nome:"Em execução"},
		{id:3,nome:"Finalizada"},
		{id:4,nome:"Cancelada"}
	];

	$scope.questoes = function(data){
		$scope.partidaQ = data;
		$scope.getQuestoes();
		$scope.getQuestoesPartida();
		$('#modalQuestao').modal('show');
	}

	$scope.getQuestoes = function(){
		questoesService.get().success(function(res){
			$scope.questoesl = res;
		});
	}

	$scope.getQuestoesPartida = function(){
		partidaQuestaoService.get($scope.partidaQ.id_partida).success(function(res){
			$scope.questoesPartida = res;
		});
	}

	$scope.salvarQuestao = function(){
		$scope.questao.id_partida = $scope.partidaQ.id_partida;
		partidaQuestaoService.post($scope.questao).success(function(res){
			if(res.status != 1){
				alert(res.message);
			}else{
				$scope.getQuestoesPartida();
				$scope.questao = {};
			}
		})
	}

	$scope.excluirQuestao = function(q){
		if(confirm("Tem certeza que deseja excluir esta questão?")){
			partidaQuestaoService.delete(q.id_partida_questao).success(function(res){
				$scope.getQuestoesPartida();
			})
		}
	}
})