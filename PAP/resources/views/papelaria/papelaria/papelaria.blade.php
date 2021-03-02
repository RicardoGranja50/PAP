@extends('layout')
@section('titulo')
	Carregamento
@endsection
@section('a')
@endsection
@section('conteudo')
	<style>
		.footer {
		    position: fixed;
		    left: 0;
			bottom: 0;
			width: 100%;
			color: black;
			text-align: center;
		}
	</style>
	<div class="footer">
		<div class="row">
	  		<div class="col-md-4"> 
	  			<a href="{{route('papelaria.carregamentos.carregamentos',['id'=>$aluno->id_aluno])}}" class="btn btn-primary" style="background-color: #80bfff">Carregamentos</a>
	  			<a href="{{route('papelaria.papelaria.papelaria',['id'=>$aluno->id_aluno])}}" class="btn btn-primary" style="background-color: #80bfff">Papelaria</a>
	  		</div>
	  		<div class="col-md-4">
	  			
	  		</div>
	  		<div class="col-md-4">
	  			<a href="{{route('papelaria.carregamentos.idAluno')}}" class="btn btn-primary" style="background-color: #80bfff">Sair</a>
	  		</div>
	  	</div>
	</div>
	<script type="text/javascript">
@endsection