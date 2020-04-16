<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', 'AlunoController@index');

//Rotas para alunos
$router->get('/api/alunos/','AlunoController@index');
$router->get('/api/alunos/{id}','AlunoController@show');
$router->post('/api/alunos/store','AlunoController@store');
$router->put('/api/alunos/update/{id}', 'AlunoController@update');
$router->delete('/api/alunos/delete/{id}', 'AlunoController@delete');

//Rotas para Responsáveis
$router->get('/api/responsaveis/','ResponsavelController@index');
$router->post('/api/responsaveis/cadastro','ResponsavelController@store');

