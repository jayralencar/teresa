'use strict';
app.factory("questoesService", function($http){
	return {
		get: function(){
			return $http.get("api/questoes");
		},
		post: function(data){
			return $http.post("api/questao", data);
		},
		put: function(id, data){
			return $http.put('api/questao/'+id, data);
		},
		delete: function(id){
			return $http.delete('api/questao/'+id);
		}
	}
})