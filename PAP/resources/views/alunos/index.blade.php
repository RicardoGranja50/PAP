@extends('layout')
@section('titulo')
	Turmas
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<script>	
		function decimo() {
			document.getElementById("decimo").style.display = "initial";
			document.getElementById("decimo1").style.display = "none";
			document.getElementById("decimo2").style.display = "none";
		}
		function decimo1() {
			document.getElementById("decimo").style.display = "none";
			document.getElementById("decimo1").style.display = "initial";
			document.getElementById("decimo2").style.display = "none";
		}
		function decimo2() {
			document.getElementById("decimo").style.display = "none";
			document.getElementById("decimo1").style.display = "none";
			document.getElementById("decimo2").style.display = "initial";
		}
	</script>
	<br>
		<div class="container-fluid">
			<div class="container-fluid">
				<form>
				<button type="button" style="background-color: #333333; color:white" onclick="decimo()">10º</button>
				<button type="button" style="background-color: #333333; color:white" onclick="decimo1()">11º</button>
				<button type="button" style="background-color: #333333; color:white" onclick="decimo2()">12º</button>
				</form>
			</div>
		</div>
	<br>
		<div class="container-fluid" >
			<div class="container-fluid" id="decimo">
				<table class="table">
	  				<thead class="thead-dark">
	    				<tr>
	      					<th scope="col">10º</th>
	    				</tr>
	  				</thead>
	  				<tbody>
	  					@foreach($decimos as $decimo)
	  						<tr>
	  							<th scope="row">
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->curso_abreviacao}}-{{$decimo->nome}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
  			</div>

  			<div class="container-fluid" id="decimo1">
	  			<table class="table">
	  				<thead class="thead-dark">
	    				<tr>
	      					<th scope="col">11º</th>
	    				</tr>
	  				</thead>
	  				<tbody>
	  					@foreach($decimos1 as $decimo)
	  						<tr>
	  							<th scope="row">
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->curso_abreviacao}}-{{$decimo->nome}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
	  		</div>

	  		<div class="container-fluid" id="decimo2">
	  			<table class="table">
	  				<thead class="thead-dark">
	    				<tr>
	      					<th scope="col">12º</th>
	    				</tr>
	  				</thead>
	  				<tbody>
	  					@foreach($decimos2 as $decimo)
	  						<tr>
	  							<th scope="row">
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->curso_abreviacao}}-{{$decimo->nome}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
	  		</div>

  			<div class="container-fluid">
				<a href="{{route('turmas.create')}}" class="btn btn-primary" style="background-color: #80bfff" >Adicionar turma</a>
			</div>
  		</div>	
@endsection

