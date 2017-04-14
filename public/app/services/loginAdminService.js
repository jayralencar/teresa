'use strict';
app.factory("loginAdminService", function($http) {
	return {
		login: function(data){
			return $http.post("api/login",data);
		},
		logado: function(){
			return $http.get('api/logado')
		}
	}
});