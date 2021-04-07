@extends('layout')
@section('titulo')
	Papelaria
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
		.cabecalho{
			background-color: #262626;
			height: 50px;
			color: white;
			margin-bottom: 30px;
			padding-left: -15px;	
		}
		.col-md-4,.col-md-8{
			padding-left: 0 !important;
			padding-right: 0 !important;
		}
		#fotos{
			height: 100px;
		}
		 div.scroll {
	        background-color: #d9d9d9;
	        width: 1000px;
	        height: 300px;
	        overflow: auto;
	        text-align: justify;
	        padding: 20px;
      	}
	</style>
	<br>
		<h3 align="center">Papelaria</h3>
	<br>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12 cabecalho">
							<h5>Produtos</h5>
						</div>

						<div class="col-md-12">
							<div class="row">
								@foreach($produtos as $produto)
									<div class="col-md-2">
										<a href="{{route('papelaria.papelaria.compra',['idp'=>$produto->id_produto,'id'=>$aluno->id_aluno, 'tipo'=>'compra'])}}">
											<img id="fotos" src="{{asset('imagens/produtos/'.$produto->foto)}}"><br>
											<h6>{{$produto->nome}}</h6><br><br><br>
										</a>
									</div>
								@endforeach

							</div>{{$produtos->render()}}
						</div>


						<div class="col-md-12">
							<h6><a href="{{route('papelaria.papelaria.produtos.index')}}">Produtos</h6></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12 cabecalho">
							<h5>Aluno</h5>
						</div>
						<div class="col-md-12">
							<h5 align="center">{{$aluno->nome}}</h5>
						</div>
						<div class="col-md-12">
							<div class="row">
							<div class="col-md-6">
									<h6>Compra:</h6>
									<div class="scroll col-md-12">
										<div class="row">
											<div class="col-md-9">
												@if(isset($produto_compra))
													@if(count($produto_compra)>0)
														@foreach($produto_compra as $add)
															{{--<i class="fas fa-arrow-circle-right">--}} </i>{{$add->nome}} x{{$add->pivot->quantidade}}<br>
															{{$add->pivot->valor}}€
															<br><br>
														@endforeach
													@endif
												@endif
											</div>
											<div class="col-md-3">
												@if(isset($produto_compra))
													@if(count($produto_compra)>0) 
														@foreach($produto_compra as $add)
															<a href="{{route('papelaria.papelaria.compra.delete',['idp'=>$add->id_produto,'id'=>$aluno->id_aluno])}}"><i class="far fa-times-circle"></i></a>
															<br><br><br>
														@endforeach
													@endif
												@endif
											</div>
										</div>
									</div>
									<br>
									Valor total : {{$total_compra}}€
									<br><br>
									@if(session()->has('saldo'))
								        <div class="alert alert-danger" role="alert">
								          {{session('saldo')}}
								        </div>
								    @endif
									<a href="{{route('papelaria.papelaria.compra.comprar',['id'=>$aluno->id_aluno,'total'=>$total_compra])}}" class="btn btn-primary" style="background-color: #80bfff">Comprar</a>
								</div>
								
							<div class="col-md-6">
								<br>
				      			<img id="fotos" src="{{asset('imagens/alunos/'.$aluno->foto_aluno)}}">
				      			<br><br><br><br>
				      			@if($aluno->saldo==0)
				      				<h6>Saldo: 0€</h6>
				      			@else
				      				<h6>Saldo: {{$aluno->saldo}}€</h6>
				      			@endif
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	  	<br>
	</div>
@endsection