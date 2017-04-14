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
