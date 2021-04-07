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
								<div><a href="{{route('bar.bar',['id'=>'$aluno->id_aluno','cat'=>'sumos'])}}"><img class="categoria" src="{{asset('imagens/cat_bar/sumos.png')}}"><p align="center">Sumos</p></a></div>
								<div><img class="categoria" src="{{asset('imagens/cat_bar/sandes.png')}}"><p align="center">Sandes</p></div>
								<div><img class="categoria" src="{{asset('imagens/cat_bar/bolos.png')}}"><p align="center">Bolos</p></div>
								<div><img class="categoria" src="{{asset('imagens/cat_bar/bolachas.png')}}"><p align="center">Bolachas</p></div>
							</div>
							<br>
							<h6><a href="{{route('bar.produtos')}}">Produtos</h6></a>
						</div>
					</div>
				</div>


				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 cabecalho">
							<h5>Produtos</h5>
						</div>
					</div>
				</div>


				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12 cabecalho">
							<h5>Aluno</h5>
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