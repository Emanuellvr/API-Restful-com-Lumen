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

$router->get('/api/pacotes', 'PacoteController@buscarTodosPacotes');
$router->get('/api/pacotes/{id}', 'PacoteController@buscarPacote');
$router->get('/api/pacotes/{id}/detalhes', 'PacoteController@buscarDetalhePacote');
$router->post('/api/pacotes', 'PacoteController@criarPacote');
$router->put('/api/pacotes/{id}', 'PacoteController@editarPacote');
$router->delete('/api/pacotes/{id}', 'PacoteController@excluirPacote');
