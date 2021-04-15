@extends('layout')
@section('titulo')
	Bar
@endsection
@section('a')
@endsection
@section('conteudo')
		<style>
	      .cabecalho{
	        background-color: #262626;
	        height: 50px;
	        color: white;
	        margin-bottom: 30px;
	        padding-left: -15px;  
	      }
	      .col-md-4,.col-md-8,.col-md-2{
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
	        .categoria{
	          height: 150px;
	          width: 170px;
	        }


			.slick-prev, .slick-next {

				position: relative;
				transform: rotate(90deg);

			    /*background: #000;*/
			    /*background: transparent;*/
			}

			.tony {
				margin-right: 80px;
				margin-left: 20px;
			}


			.slick-prev:before, .slick-next:before {
			   
			    font-size: 30px;
			    line-height: 1;
			    opacity: .75;
			    color: black;
			}
			.slick-next {
    			right: -70px;
			}
			.slick-prev {
    			left: 70px;
    			margin-bottom: 15px;
			}

			.branco {
  				color: white;
			}
			.branco:hover{
				color: white;
			}

			.preto {
  				color: black;
			}
			.preto:hover{
				color: black;
			}
	    </style>
	<br>
		<h3 align="center">Bar</h3>
	<br>
	<div class="container-fluid">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-12 cabecalho">

						</div>

						<div class="col-md-12">
							<div class="tony">
								<div><a class="preto"href="{{route('bar.bar',['id'=>$aluno->id_aluno,'cat'=>'sumo'])}}"><img class="categoria" src="{{asset('imagens/cat_bar/sumos.png')}}"><p align="center">Sumos</p></a></div>
								<div><a class="preto"href="{{route('bar.bar',['id'=>$aluno->id_aluno,'cat'=>'sande'])}}"><img class="categoria" src="{{asset('imagens/cat_bar/sandes.png')}}"><p align="center">Sandes</p></a></div>
								<div><a class="preto"href="{{route('bar.bar',['id'=>$aluno->id_aluno,'cat'=>'bolo'])}}"><img class="categoria" src="{{asset('imagens/cat_bar/bolos.png')}}"><p align="center">Bolos</p></a></div>
								<div><a class="preto"href="{{route('bar.bar',['id'=>$aluno->id_aluno,'cat'=>'bolacha'])}}"><img class="categoria" src="{{asset('imagens/cat_bar/bolachas.png')}}"><p align="center">Bolachas</p></a></div>
							</div>
							<br>
							<h6><a href="{{route('bar.produtos')}}">Produtos</h6></a>
						</div>
					</div>
				</div>


				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 cabecalho">
							<h5><a class="branco" href="{{route('bar.bar',['id'=>$aluno->id_aluno,'cat'=>'tudo'])}}">Produtos</a></h5>
						</div>

						<div class="col-md-12">
							<div class="row">
								@foreach($produtos as $produto)
									<div class="col-md-3">
										<a href="{{route('bar.bar.obterMovimentos',['idp'=>$produto->id_produto,'id'=>$aluno->id_aluno, 'tipo'=>'compra'])}}">
											<img id="fotos" src="{{asset('imagens/produtos/'.$produto->foto)}}"><br>
											<h6>{{$produto->nome}}</h6><br><br><br>
										</a>
									</div>
								@endforeach

							</div>{{$produtos->render()}}
						</div>


					</div>
				</div>


				<div class="col-md-5">
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
															<a href="{{route('bar.bar.compra.delete',['idp'=>$add->id_produto,'id'=>$aluno->id_aluno])}}"><i class="far fa-times-circle"></i></a>
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
									<a href="{{route('bar.bar.compra.comprar',['id'=>$aluno->id_aluno,'total'=>$total_compra])}}" class="btn btn-primary" style="background-color: #80bfff">Comprar</a>
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
		</div>
	</div>

	
@endsection
@section ('script')
	<script>
		$(document).ready(function(){
			$('.tony').slick({
			    vertical: true,
			    slidesToShow: 3,
			    slidesToScroll: 1,
			    verticalSwiping: true,
			});
		});
	</script>
@endsection