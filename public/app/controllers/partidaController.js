'use strict';

app.controller("partidaController", function($scope, partidasService,participanteService){
	$scope.iQuestao = 0;
	$scope.participante = {};
	$scope.init = function(){
		participanteService.logado().success(function(res){
			$scope.participante = res.data;	
			$scope.getPartida();
		});
	}

	$scope.getPartida = function(){
		partidasService.find($scope.participante.id_partida).success(function(res){
			$scope.partida = res;	
		});
	}

	$scope.passaQuestao = function(id){
		$scope.iQuestao = id;
		
	}

	conn.onmessage = function(res){
		if(res == "iniciar"){
			$scope.getPartida();
		}
	}

	$scope.aceOption = {
    	mode: 'c_cpp',
    	require: ['ace/ext/language_tools'],
    	advanced: {
    		enableSnippets: true,
    		enableBasicAutocompletion: true,
    		enableLiveAutocompletion: true
    	},
    	onLoad: function(editor, session, ace){
    		$scope.langTools = ace.require('ace/ext/language_tools');
    		$scope.editor = editor;
    		$scope.session = session;
    		session.on('change',function(){
    			$scope.editorContent = session.getValue();
    		});
    	}
    };
});