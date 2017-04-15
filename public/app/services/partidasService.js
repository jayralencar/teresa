'use strict';
app.factory("partidasService", function($http){
	return {
		get: function(){
			return $http.get("api/partidas");
		},
		post: function(data){
			return $http.post("api/partida", data);
		},
		put: function(id, data){
			return $http.put('api/partida/'+id, data);
		},
		delete: function(id){
			return $http.delete('api/partida/'+id);
		}
	}
});