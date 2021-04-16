@extends('layout')
@section('titulo')
	Portaria
@endsection
@section('a')
@endsection
@section('conteudo')
	<style type="text/css">
		.wrapper {
		    width: 100px;
		    height: 30px;
		    overflow: hidden;
		}
		.wrapper input {
		    width: 120px;
		    height: 30px;
		    margin-left: -300px;
		    text-align: left;
		}
		 #fotos{
			height: 100px;
		}
	</style>
	@if(session()->has('erro'))
		<div class="alert alert-danger" role="alert">
			{{session('erro')}}
		</div>
	@endif
	<br>
	<h3 align="center">Portaria</h3>
	<br>
	<form action="{{route('portaria.form')}}" method="post">
		@csrf
		<div class="wrapper">
			<input type="text" name="cartao" autofocus id="caixa">	
		</div>
	</form>
	<div class="container-fluid">
		<table style="width:100%">
		  	<tr>
		    	@foreach($movimentos as $movimento)
		    		@if($movimento->entrada_saida==0)
			    		<td bgcolor="green">
			    			<img id="fotos" src="{{asset('imagens/alunos/'.$movimento->alunos->foto_aluno)}}">
			    			{{$movimento->created_at->format('H:i:s')}}
			    		</td>
			    	@elseif($movimento->entrada_saida==1)
			    		<td bgcolor="red">
			    			<img id="fotos" src="{{asset('imagens/alunos/'.$movimento->alunos->foto_aluno)}}">
			    			{{$movimento->created_at->format('H:i:s')}}
			    		</td>
			    	@endif
		    	@endforeach
		  	</tr>
		  	<tr>
		    	@foreach($movimentos as $movimento)
		    		@if($movimento->entrada_saida==0)
			    		<td bgcolor="green">
			    			{{$movimento->alunos->nome}}
			    		</td>
			    	@elseif($movimento->entrada_saida==1)
			    		<td bgcolor="red">
			    			{{$movimento->alunos->nome}}
			    		</td>
			    	@endif
		    	@endforeach
		  	</tr>
		</table>

		<br>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<input type="text" id="rel" disabled="true" style="font-size: 30px">
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
		
<h6><a href="{{route('portaria.index')}}">Em caso de a pulseira não passar clicar.</h6></a>
	</div>
	<script type="text/javascript">
		function relogio(){
				var data=new Date();
				var hor=data.getHours();
				var min=data.getMinutes();
				var seg=data.getSeconds();
				
				if(hor < 10){
					hor="0"+hor;
				}
				if(min < 10){
					min="0"+min;
				}
				if(seg < 10){
					seg="0"+seg;
				}
				
				var horas=hor + ":" + min + ":" + seg;
				
				document.getElementById("rel").value=horas;
			}

			var timer=setInterval(relogio,1000);

		</script>

		
	</script>
@endsection