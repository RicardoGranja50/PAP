<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PaginaPrincipal

		Route::get('/aedah/principal','App\Http\Controllers\PrincipalController@principal')->name('principal.principal');

//Login

		Route::get('/aedah/principal/alterar','App\Http\Controllers\PrincipalController@edit')->name('principal.edit');

		Route::post('/aedah/principal/alterado','App\Http\Controllers\PrincipalController@update')->name('principal.update');

		Route::get('/aedah/principal/{idl}','App\Http\Controllers\PrincipalController@login')->name('principal.login');

		Route::post('/aedah/principal/entrar/{idl}','App\Http\Controllers\PrincipalController@entrar')->name('principal.entrar');

//Alunos
	
	//Criar 

		Route::get('/aedah/alunos/add','App\Http\Controllers\AlunosController@create')->name('alunos.create');

		Route::post('/aedah/alunos/criado','App\Http\Controllers\AlunosController@store')->name('alunos.store');

	//Editar

		Route::get('/aedah/alunos/edit/{id}','App\Http\Controllers\AlunosController@edit')->name('alunos.edit');

		Route::patch('/aedah/alunos/editado','App\Http\Controllers\AlunosController@update')->name('alunos.update');

	//Show
		
		Route::get('/aedah/turmas/alunos/{id}', 'App\Http\Controllers\AlunosController@show')->name('alunos.show');

		Route::get('/aedah/turmas/alunos/info/{id}', 'App\Http\Controllers\AlunosController@showAlunos')->name('alunos.showAlunos');
	//Formulario

		Route::post('/aedah/turmas/alunos/info/pesquisa', 'App\Http\Controllers\AlunosController@pesquisa')->name('alunos.pesquisa');
	//Eliminar

		Route::delete('/aedah/aluno/delete/{id}', 'App\Http\Controllers\AlunosController@destroy')->name('alunos.destroy');

//Turmas
	
	//Index

		Route::get('/aedah/turmas', 'App\Http\Controllers\AlunosController@index')->name('alunos.index');

	//Create

		Route::get('/aedah/turmas/create', 'App\Http\Controllers\TurmasController@create')->name('turmas.create');

		Route::post('/aedah/turmas/store', 'App\Http\Controllers\TurmasController@store')->name('turmas.store');

	//Editar

		Route::get('/aedah/turmas/edit/{idt}','App\Http\Controllers\TurmasController@edit')->name('turmas.edit');

		Route::patch('/aedah/turmas/editado','App\Http\Controllers\TurmasController@update')->name('turmas.update');

	//Eliminar

		Route::delete('/aedah/turmas/delete/{idt}', 'App\Http\Controllers\TurmasController@destroy')->name('turmas.destroy');