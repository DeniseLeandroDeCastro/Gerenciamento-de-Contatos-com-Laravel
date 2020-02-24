<?php


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Rota para a view principal
Route::get('/contato', ['uses'=>'ContatoController@index', 'as'=>'contato.index']);

//Rota para a view de adicionar novos contatos
Route::get('/contato/adicionar', ['uses'=>'ContatoController@adicionar', 'as'=>'contato.adicionar']);

//Rota para salvar o novo contato
Route::post('/contato/salvar', ['uses'=>'ContatoController@salvar', 'as'=>'contato.salvar']);

//Rota para editar o contato
Route::get('/contato/editar/{id}', ['uses'=>'ContatoController@editar', 'as'=>'contato.editar']);

//Rota para atualizar os dados do contato, após a alteração
Route::put('/contato/atualizar/{id}', ['uses'=>'ContatoController@atualizar', 'as'=>'contato.atualizar']);

//Rota para deletar o contato
Route::get('/contato/deletar/{id}', ['uses'=>'ContatoController@deletar', 'as'=>'contato.deletar']);

//Rota para adicionar o detalhe do contato
Route::get('contato/detalhe/{id}', ['uses'=>'ContatoController@detalhe', 'as'=>'contato.detalhe']);

//Rota para adicionar um novo telefone ao contato na tela de detalhe
Route::get('telefone/adicionar/{id}', ['uses'=>'TelefoneController@adicionar', 'as'=>'telefone.adicionar']);

//Rota para salvar o novo número de telefone, recém adicionado na tela de detalhe
Route::post('telefone/salvar/{id}', ['uses'=>'TelefoneController@salvar', 'as'=>'telefone.salvar']);

//Rota para editar o telefone na tela de detalhe
Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar', 'as'=>'telefone.editar']);

//Rota para atualizar o telefone na tela detalhe
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar', 'as'=>'telefone.atualizar']);

//Rota para deletar o telefone na tela detalhe
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar', 'as'=>'telefone.deletar']);


