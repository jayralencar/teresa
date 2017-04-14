'use strict';
app.factory("testeService", function($http){
	return {
		get: function(id_questao){
			return $http.get("api/testes/"+id_questao);
		},
		post: function(data){
			return $http.post("api/teste", data);
		},
		put: function(id, data){
			return $http.put('api/teste/'+id, data);
		},
		delete: function(id){
			return $http.delete('api/teste/'+id);
		}
	}
})