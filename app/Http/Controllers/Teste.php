<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teste extends Controller
{
    public function get($id_questao)
    {
    	return \App\model\Questao::find($id_questao)
    		-> testes()
    		-> where('ativo',1)
    		-> get();
    }

    public function add(Request $request){
    	$data = $request->all();

       	\App\model\Teste::create($data);

    	return ["status"=>1, "message"=>"Cadastro realizado com sucesso!"];
    }

    public function edit($id_teste, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
        unset($data['id_teste']);
		\App\model\Teste::where("id_teste", $id_teste)->update($data);

		return ["status"=>1, "message"=>"Edição realizada com sucesso!"];	    	
    }

    public function delete($id_teste){
    	\App\model\Teste::where("id_teste", $id_teste)->update(["ativo" => 0]);

		return ["status"=>1, "message"=>"Exclusão realizada com sucesso!"];
    }
}
