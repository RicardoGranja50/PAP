@extends('layout')
@section('titulo')
	Produtos Bar
@endsection
@section('a')
@endsection
@section('conteudo')
	
	<style type="text/css">
		.fotos{
			height: 180px;
		}
	</style>
	
	<br>
	<h3 align="center">Produtos Bar</h3>
	<br>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				@foreach($produtos as $produto)	
					<div class="col-md-2">
						<img class="fotos" src="{{asset('imagens/produtos/'.$produto->foto)}}">
					</div>
					<div class="col-md-2">
						{{$produto->nome}}
						<a href="{{route('bar.produtos.edit', ['idp'=>$produto->id_produto])}}"><i class="fas fa-pencil-alt"></i></a>
						<a href="{{route('bar.destroy', ['idp'=>$produto->id_produto])}}"><i class="fas fa-trash-alt"></i></a>
					</div>
				@endforeach
				<br><br>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-1">
				{{$produtos->render()}}
			</div>
			<div class="col-md-2">
				<a class="btn btn-primary" style="background-color: #80bfff" href="{{route('bar.produtos.create')}}">Adicionar Produto</a>
			</div>
			<div class="col-md-1">
				<a class="btn btn-primary" style="background-color: #80bfff" href="{{route('bar.idAluno')}}">Voltar</a>
			</div>
		</div>
	</div>
	
@endsection
