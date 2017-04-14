<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Questao extends Controller
{
    public function get()
    {
    	return \App\model\Questao::where("ativo",1)
    		-> with("testes")
    		->get();
    }

    public function add(Request $request){
    	$data = $request->all();

       	\App\model\Questao::create($data);

    	return ["status"=>1, "message"=>"Cadastro realizado com sucesso!"];
    }

    public function edit($id_questao, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
		unset($data['testes']);
        unset($data['id_questao']);
		\App\model\Questao::where("id_questao", $id_questao)->update($data);

		return ["status"=>1, "message"=>"Edição realizada com sucesso!"];	    	
    }

    public function delete($id_questao){
    	\App\model\Questao::where("id_questao", $id_questao)->update(["ativo" => 0]);

		return ["status"=>1, "message"=>"Exclusão realizada com sucesso!"];
    }
}
