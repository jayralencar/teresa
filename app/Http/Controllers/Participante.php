<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Participante extends Controller
{
    public function get()
    {
    	return \App\model\Participante::where("ativo",1)
    		-> with("testes")
    		->get();
    }

    public function add(Request $request){
    	$data = $request->all();

        $testaPartida = \App\model\Partida::find($data['id_partida']);

        if(sizeof($testaPartida) == 0){
            return ["status"=>0,"message"=>"O ID de partida informado não existe!"];
        }

    	$teste = \App\model\Participante::where("id_participante", $data['id_participante'])
    		-> where("nome_participante", $data['nome_participante'])
    		-> get();

    	if(sizeof($teste)>0){
    		return ["status"=>0,"message"=>"Já existe um usuário com esse nome para esta partida"];
    	}

       	$participante = \App\model\Participante::create($data);

       	if (session_status() == PHP_SESSION_NONE) {
        	session_start();
        }

        $_SESSION['id_participante'] = $participante['id_participante'];
        $_SESSION['nome_participante'] = $participante['nome_participante'];


    	return ["status"=>1, "message"=>"Cadastro realizado com sucesso!"];
    }

    public function edit($id_participante, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
		unset($data['testes']);
        unset($data['id_participante']);
		\App\model\Participante::where("id_participante", $id_participante)->update($data);

		return ["status"=>1, "message"=>"Edição realizada com sucesso!"];	    	
    }

    public function delete($id_participante){
    	\App\model\Participante::where("id_participante", $id_participante)->update(["ativo" => 0]);

		return ["status"=>1, "message"=>"Exclusão realizada com sucesso!"];
    }

    public function logado(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['id_participante']) ? 
            ["logado" => 1, "data" => \App\model\Participante::find($_SESSION['id_participante']) -> first()] :
            ["logado" => 0];  
    }
}
