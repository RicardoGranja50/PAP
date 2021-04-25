@extends('layout')
@section('titulo')
	Produtos Papelaria
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
	<h3 align="center">Produtos Papelaria</h3>
	<br>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				@foreach($produtos as $produto)	
					<div class="col-md-2">
						<img class="fotos" src="{{asset('imagens/produtos/'.$produto->foto)}}">
					</div>
					<div class="col-md-2">
						<b>{{$produto->nome}}</b>
						@if(Gate::allows('admin'))
							<a href="{{route('papelaria.papelaria.produtos.edit', ['idp'=>$produto->id_produto])}}"><i class="fas fa-pencil-alt"></i></a>
							<a href="{{route('papelaria.papelaria.produtos.destroy', ['idp'=>$produto->id_produto])}}"><i class="fas fa-trash-alt"></i></a>
						@endif
						<br>
						{{$produto->preco}}€
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
			@if(Gate::allows('admin'))
				<div class="col-md-2">
					<a class="btn btn-primary" style="background-color: #80bfff" href="{{route('papelaria.papelaria.produtos.create')}}">Adicionar Produto</a>
				</div>
			@endif
			<div class="col-md-1">
				<a class="btn btn-primary" style="background-color: #80bfff" href="{{route('papelaria.carregamentos.idAluno')}}">Voltar</a>
			</div>
		</div>
	</div>
	
@endsection
