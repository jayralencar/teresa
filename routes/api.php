<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login',"Usuario@login");
Route::get("/logado", "Usuario@logado");

Route::middleware("admin1")->get("/questoes","Questao@get");
Route::middleware("admin1")->post("/questao","Questao@add");
Route::middleware("admin1")->put("/questao/{id_questao}","Questao@edit");
Route::middleware("admin1")->delete("/questao/{id_questao}","Questao@delete");

// Testes
Route::middleware("admin1")->get("/testes/{id_questao}","Teste@get");
Route::middleware("admin1")->post("/teste","Teste@add");
Route::middleware("admin1")->put("/teste/{id_teste}","Teste@edit");
Route::middleware("admin1")->delete("/teste/{id_teste}","Teste@delete");

// Partidas
Route::middleware("admin1")->get("/partidas/","Partida@get");
Route::middleware("admin1")->get("/partida/{id_partida}","Partida@find");
Route::middleware("admin1")->post("/partida","Partida@add");
Route::middleware("admin1")->put("/partida/{id_partida}","Partida@edit");
Route::middleware("admin1")->delete("/partida/{id_partida}","Partida@delete");

// Questões na partida
Route::middleware("admin1")->get("/questoes-partida/{id_partida}","PartidaQuestao@get");
Route::middleware("admin1")->post("/questao-partida","PartidaQuestao@add");
Route::middleware("admin1")->put("/questao-partida/{id_partida_questao}","PartidaQuestao@edit");
Route::middleware("admin1")->delete("/questao-partida/{id_partida_questao}","PartidaQuestao@delete");

// Participantes
Route::middleware("admin1")->get("/participantes/{id_partida}","Participante@get");
Route::post("/participante","Participante@add");
Route::middleware("admin1")->put("/participante/{id_participante}","Participante@edit");
Route::middleware("admin1")->delete("/participante/{id_participante}","Participante@delete"); 
Route::get("/participante/logado","Participante@logado");