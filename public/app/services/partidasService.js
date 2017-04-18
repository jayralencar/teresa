'use strict';
app.factory("partidasService", function($http){
	return {
		get: function(){
			return $http.get("api/partidas");
		},
		find: function(id){
			return $http.get("api/partida/"+id);
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