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


//Alunos
	
	//Formularios

		Route::get('/aedah/alunos/add','App\Http\Controllers\AlunosController@create')->name('alunos.create');

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

	//Eliminar

		Route::delete('/aedah/turmas/delete/{id}', 'App\Http\Controllers\TurmasController@destroy')->name('turmas.destroy');