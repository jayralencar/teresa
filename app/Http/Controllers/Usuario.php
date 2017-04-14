<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usuario extends Controller
{
    public function all()
    {
    	return \App\model\Usuario::where("ativo",1)->get();
    }

    public function login(Request $request){
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);

    	$usuario = \App\model\Usuario::where('email_usuario', $data['email'])->first();

    	if(sizeof($usuario)>0){
    		if(password_verify($data['senha'], $usuario->senha_usuario)){
    			session_start();
    			$_SESSION['id_usuario'] = $usuario->id_usuario;
    			$_SESSION['nome_usuario'] = $usuario->nome_usuario;
    			return ["status" => 1];
    		}else{
    			return ["status" =>0, "message"=>"Senha inválida"];	
    		}
    	}else{
    		return ["status" =>0, "message"=>"E-mail não cadastrado!"];
    	}
    }

    public function logado(){
    	session_start();
        $data['logado'] = isset($_SESSION['id_usuario'])?true:false;
        if($data['logado']){
        	$data['usuario']['nome_usuario'] = \App\model\Usuario::find($_SESSION['id_usuario'])->nome_usuario;
        }
        return $data;
    }
}
