@extends('layout')
@section('titulo')
	Alunos
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
	<h3 style="text-align: center;">Alunos</h3><br>

	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Nº do Aluno</th>
	      <th scope="col">Nome Aluno</th>
	      <th scope="col">Cartao do Aluno</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  		$i=0;
	  	?>
	  	@foreach($alunos as $aluno)	
		    <tr>
		      <th scope="row">
		      	<?php
		      		$i++;
		      		echo $i;
		      	?>
		      </th>
		      <td><a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno])}}"><h6>{{$aluno->nome}}</h6></a></td>
		      <td></td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>

	<div class="container-fluid">
			<a href="" class="btn btn-primary" style="background-color: #80bfff">Adicionar Aluno</a>
	</div>
@endsection