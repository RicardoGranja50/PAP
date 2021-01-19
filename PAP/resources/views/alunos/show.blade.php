@extends('layout')
@section('titulo')
	Alunos
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<script>
		function visivel() {
			document.getElementById("box").style.display = "initial";
		}
		function nao(){
			document.getElementById("box").style.display = "none";
			document.getElementById("box").addEventListener("click", function(event){
  				event.preventDefault()
			});
		}
	</script>
	<br>
	<h3 style="text-align: center;"> 
		Turma {{$turma->ano}}{{$turma->curso_abreviacao}}
    </h3>
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
		      <td>
		      	<a href="{{route('alunos.showAlunos', ['id'=>$aluno->id_aluno,'idt'=>$aluno->id_turma])}}"><h6>{{$aluno->nome}}</a>
		      	@if(Gate::allows('admin'))
		      		<a href="{{route('alunos.edit', ['id'=>$aluno->id_aluno])}}"> <i class="fas fa-pencil-alt"></i></a>
		      	@endif
		      </h6></td>
		      <td></td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>

	@if(Gate::allows('admin'))
		<div class="container-fluid">
			@if(is_null($vazio))
				<a onclick="visivel()" class="btn btn-primary" style="background-color: #80bfff">Eliminar turma</a>
			@endif
			<a href="{{route('turmas.edit',['idt'=>$turma->id_turma])}}" class="btn btn-primary" style="background-color: #80bfff" >Editar turma</a>
			<a href="{{route('alunos.create')}}" class="btn btn-primary" style="background-color: #80bfff">Adicionar Aluno</a>
			<br>
			<span id="box" style="display:none">
				<div class="alert alert-danger" role="alert">
					Deseja eliminar a seguinte turma?
					<form method="post" action="{{route('turmas.destroy', ['idt'=>$turma->id_turma])}}">
						@csrf
						@method('delete')
						<input type="submit" value="Sim" onclick="this.form.submit()">
						<input type="submit" value="Não" onclick="nao()">
					</form>
				</div>
			</span>
		</div>
	@endif
@endsection