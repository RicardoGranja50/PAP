@extends('layout')
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>
  	@section('titulo')
		Cartão
	@endsection
  </title>
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body style="background-color: #80bfff;">
 	<div class="container">
		<div class="box">
			<nav class="bg-white">
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
		width: 100vw;
		height: 100vh;
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
		}
</style>
</body>
</html>
