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

		//Route::get('/aedah/principal','App\Http\Controllers\PrincipalController@principal')->name('principal.principal');

//Login

		//Route::get('/aedah/principal/alterar','App\Http\Controllers\PrincipalController@edit')->name('principal.edit');

		//Route::post('/aedah/principal/alterado','App\Http\Controllers\PrincipalController@update')->name('principal.update');

		//Route::get('/aedah/principal/{idl}','App\Http\Controllers\PrincipalController@login')->name('principal.login');

		//Route::post('/aedah/principal/entrar/{idl}','App\Http\Controllers\PrincipalController@entrar')->name('principal.entrar');

//Alunos
	
	//Criar 

		Route::get('/aedah/alunos/add','App\Http\Controllers\AlunosController@create')->name('alunos.create')->middleware('auth');

		Route::post('/aedah/alunos/criado','App\Http\Controllers\AlunosController@store')->name('alunos.store')->middleware('auth');

	//Editar

		Route::get('/aedah/alunos/edit/{id}','App\Http\Controllers\AlunosController@edit')->name('alunos.edit')->middleware('auth');

		Route::patch('/aedah/alunos/editado','App\Http\Controllers\AlunosController@update')->name('alunos.update')->middleware('auth');

	//Show
		
		Route::get('/aedah/turmas/alunos/{id}', 'App\Http\Controllers\AlunosController@show')->name('alunos.show')->middleware('auth');

		Route::get('/aedah/turmas/alunos/info/{id}/{idt}', 'App\Http\Controllers\AlunosController@showAlunos')->name('alunos.showAlunos')->middleware('auth');
	//Formulario

		Route::post('/aedah/turmas/alunos/info/pesquisa', 'App\Http\Controllers\AlunosController@pesquisa')->name('alunos.pesquisa')->middleware('auth');
	//Eliminar

		Route::delete('/aedah/aluno/delete/{id}', 'App\Http\Controllers\AlunosController@destroy')->name('alunos.destroy')->middleware('auth');

//Turmas
	
	//Index

		Route::get('/aedah/turmas', 'App\Http\Controllers\AlunosController@index')->name('alunos.index')->middleware('auth');

	//Create

		Route::get('/aedah/turmas/create', 'App\Http\Controllers\TurmasController@create')->name('turmas.create')->middleware('auth');

		Route::post('/aedah/turmas/store', 'App\Http\Controllers\TurmasController@store')->name('turmas.store')->middleware('auth');

	//Editar

		Route::get('/aedah/turmas/edit/{idt}','App\Http\Controllers\TurmasController@edit')->name('turmas.edit')->middleware('auth');

		Route::patch('/aedah/turmas/editado','App\Http\Controllers\TurmasController@update')->name('turmas.update')->middleware('auth');

	//Eliminar

		Route::delete('/aedah/turmas/delete/{idt}', 'App\Http\Controllers\TurmasController@destroy')->name('turmas.destroy')->middleware('auth');


//Auth 
	
	Auth::routes();

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
