@extends('layout')
@section('titulo')
	Cartão
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')<!-- #80bfff; -->
	<body>
 	<div class="container">
		<div class="box">
			<nav style="background-color:#f2f2f2">
				<h5 align="center">Cartão Aluno</h5><br>
				<form action="{{route('papelaria.carregamentos.exec')}}">
					<label for="idAluno"></label>
	  				<input type="text" name="idAluno" autofocus id="caixa">
	  				<button type="submit" class="btn btn-primary" style="background-color: #80bfff">Confirmar</button>
	  				
	  				@if(session()->has('msg'))
				        <div class="alert alert-danger" role="alert">
				          {{session('msg')}}
				        </div>
				    @endif
	  			</form>
			</nav>
		</div>
	</div>

		<style>
			.container {
			width: 80vw;
			height: 80vh;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center
			}
			.box {
			width: 300px;
			height: 300px;
			}

			body {
				margin: 0px;
				background-image: url('{{asset('imagens/fundos/papelaria.jpg')}}');
			}
		</style>
	</body>
@endsection