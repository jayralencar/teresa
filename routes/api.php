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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',"Usuario@login");
Route::get("/logado", "Usuario@logado");

Route::middleware("admin")->get("/questoes","Questao@get");
Route::middleware("admin")->post("/questao","Questao@add");
Route::middleware("admin")->put("/questao/{id_questao}","Questao@edit");
Route::middleware("admin")->delete("/questao/{id_questao}","Questao@delete");

// Testes
Route::middleware("admin")->get("/testes/{id_questao}","Teste@get");
Route::middleware("admin")->post("/teste","Teste@add");
Route::middleware("admin")->put("/teste/{id_teste}","Teste@edit");
Route::middleware("admin")->delete("/teste/{id_teste}","Teste@delete");

// Partidas
Route::middleware("admin")->get("/partidas/","Partida@get");
Route::middleware("admin")->post("/partida","Partida@add");
Route::middleware("admin")->put("/partida/{id_partida}","Partida@edit");
Route::middleware("admin")->delete("/partida/{id_partida}","Partida@delete");

// Questões na partida
Route::middleware("admin")->get("/questoes-partida/{id_partida}","PartidaQuestao@get");
Route::middleware("admin")->post("/questao-partida","PartidaQuestao@add");
Route::middleware("admin")->put("/questao-partida/{id_partida_questao}","PartidaQuestao@edit");
Route::middleware("admin")->delete("/questao-partida/{id_partida_questao}","PartidaQuestao@delete");