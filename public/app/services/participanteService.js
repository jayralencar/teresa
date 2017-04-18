'use strict';

app.factory("participanteService", function($http) {
	return {
		get: function(id_questao){
			return $http.get("api/participantes/"+id_questao);
		},
		post: function(data){
			return $http.post("api/participante", data);
		},
		put: function(id, data){
			return $http.put('api/participante/'+id, data);
		},
		delete: function(id){
			return $http.delete('api/participante/'+id);
		},
		logado: function(){
			return $http.get("api/participante/logado");
		}
	}
});