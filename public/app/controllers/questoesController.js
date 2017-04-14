'use strict';
app.controller("questoesController", function($scope, questoesService){
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
			})
		}
	}
});