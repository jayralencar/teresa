'use strict';
app.controller("questoesController", function($scope, questoesService, testeService){
	$scope.init = function(){
		questoesService.get().success(function(res){
			$scope.questoes = res;
		});
	}

	$scope.editar = function(data){
		$scope.questao = data;
		$('#modalCadastro').modal("show");
	}

	$scope.salvar = function(){
		if($scope.questao.id_questao){
			questoesService.put($scope.questao.id_questao, $scope.questao).success(function(res){
				$('#modalCadastro').modal("hide");
				$scope.init();
			})
		}else{
			questoesService.post($scope.questao).success(function(res){
				$('#modalCadastro').modal("hide");
				$scope.init();
			})
		}
	}

	$scope.excluir = function(data){
		if(confirm("Tem certeza que deseja excluir?")){
			questoesService.delete(data.id_questao).success(function(res){
				$scope.init();
			});
		}
	}

	$scope.testes = function(questao){
		$('#modalTestes').modal('show');
		$scope.q = questao;
		$scope.getTestes();
	}

	$scope.getTestes = function(){
		testeService.get($scope.q.id_questao).success(function(res){
			$scope.lTestes = res;
		});
	}

	$scope.salvarTeste = function(){
		$scope.teste.id_questao = $scope.q.id_questao;
		testeService.post($scope.teste).success(function(res){
			$scope.teste = {};
			$scope.getTestes();
		});
	}

	$scope.excluiTeste = function(teste){
		if(confirm("Tem certeza que deseja excluir este teste?")){
			testeService.delete(teste.id_teste).success(function(e){
				$scope.getTestes();
			})
		}
	}

	$scope.niveis = [
		{id:1,nome:"Básico"},
		{id:2,nome:"Médio"},
		{id:3,nome:"Alto"},
		{id:4,nome:"JEDI"},
	]
});