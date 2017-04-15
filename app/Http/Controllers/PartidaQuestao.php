<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartidaQuestao extends Controller
{
    public function get($id_partida)
    {
    	return \App\model\Partida::find($id_partida)
    		-> partidaQuestoes()
    		-> where("ativo", 1)
    		-> with("questao")
    		-> get();
    }

    public function add(Request $request){
    	$data = $request->all();

    	$test = \App\model\PartidaQuestao::where("id_partida", $data['id_partida'])
    		-> where("id_questao",$data['id_questao'])
    		-> where("ativo", 1)
    		-> get();

    	if(sizeof($test)>0){
    		return ["status"=>0, "message"=> "Questão já cadastrada na partida"];
    	}else{
    		unset($data['duracao']);
	       	\App\model\PartidaQuestao::create($data);

	    	return ["status"=>1, "message"=>"Cadastro realizado com sucesso!"];
    	}
    }

    public function edit($id_partida_questao, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
		unset($data['duracao']);
        unset($data['id_partida_questao']);
		\App\model\PartidaQuestao::where("id_partida_questao", $id_partida_questao)->update($data);

		return ["status"=>1, "message"=>"Edição realizada com sucesso!"];	    	
    }

    public function delete($id_partida_questao){
    	\App\model\PartidaQuestao::where("id_partida_questao", $id_partida_questao)->update(["ativo" => 0]);

		return ["status"=>1, "message"=>"Exclusão realizada com sucesso!"];
    }
}
