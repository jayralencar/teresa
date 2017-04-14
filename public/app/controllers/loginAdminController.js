'use strict';
app.controller("loginAdminController", function($scope, $location,loginAdminService) {
	$scope.entrar = function(){
		loginAdminService.login($scope.login).success(function(res){
			if(res.status == 1){
				$location.path("/administrador")
			}else{
				$scope.error = res.message;
			}
		})
	}
})