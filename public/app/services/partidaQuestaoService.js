'use strict';
app.factory("partidaQuestaoService", function($http){
	return {
		get: function(id_partida){
			return $http.get("api/questoes-partida/"+id_partida);
		},
		post: function(data){
			return $http.post("api/questao-partida", data);
		},
		put: function(id, data){
			return $http.put('api/questao-partida/'+id, data);
		},
		delete: function(id){
			return $http.delete('api/questao-partida/'+id);
		}
	}
})