@extends('layout')
@section('titulo')
	Turmas
@endsection
@section('pesquisaAluno')
@endsection
@section('conteudo')
	<br>
		<div class="container-fluid">
			<div class="container-fluid">
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
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}- {{$decimo->nome_completo}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
  			</div>

  			<div class="container-fluid">
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
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}- {{$decimo->nome_completo}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
	  		</div>

	  		<div class="container-fluid">
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
									<a href="{{route('alunos.show', ['id'=>$decimo->id_turma])}}"><h5>{{$decimo->nome}}- {{$decimo->nome_completo}}</h5></a>
								</th>
							</tr>
						@endforeach	
	   				</tbody>	
	  			</table>
	  		</div>

  			<div class="container-fluid">
				<a href="{{route('turmas.create')}}" class="btn btn-primary" style="background-color: #80bfff" >Adicionar turma</a>
				<a href="" class="btn btn-primary" style="background-color: #80bfff">Eliminar turma</a>
			</div>
			
  		</div>
@endsection