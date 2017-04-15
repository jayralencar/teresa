<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Partida extends Controller
{
    public function get()
    {
    	return \App\model\Partida::where("ativo",1)
    		->get();
    }

    public function add(Request $request){
    	$data = $request->all();
    	unset($data['duracao']);
       	\App\model\Partida::create($data);

    	return ["status"=>1, "message"=>"Cadastro realizado com sucesso!"];
    }

    public function edit($id_partida, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
		unset($data['duracao']);
        unset($data['id_partida']);
		\App\model\Partida::where("id_partida", $id_partida)->update($data);

		return ["status"=>1, "message"=>"Edição realizada com sucesso!"];	    	
    }

    public function delete($id_partida){
    	\App\model\Partida::where("id_partida", $id_partida)->update(["ativo" => 0]);

		return ["status"=>1, "message"=>"Exclusão realizada com sucesso!"];
    }
}
