@extends('layout')
@section('titulo')
	Carregamento
@endsection
@section('a')
@endsection
@section('conteudo')
		<style>
			  background-color: #888;
			}
			table {
			  margin: auto;
			  background-color: #222;
			  width: 295px;
			  max-width: 295px;
			  height: 325px;
			  text-align: center;
			  border-radius: 4px;
			  padding-right: 10px;
			}

			input {
			  outline: 0;
			  position: relative;
			  left: 5px;
			  top: 5px;
			  border: 0;
			  color: #495069;
			  background-color: #fff;
			  border-radius: 4px;
			  width: 60px;
			  height: 50px;
			  float: left;
			  margin: 5px;
			  font-size: 20px;
			  box-shadow: 0 4px rgba(0,0,0,0.2);
			  margin-bottom: 15px;
			}

			input:hover {
			  border: 0 solid #000;
			  color: #495069;
			  background-color: #fff;
			  border-radius: 4px;
			  width: 60px;
			  height: 50px;
			  float: left;
			  margin: 5px;
			  font-size: 20px;
			  box-shadow: 0 4px #b0d2cf;
			}

			input:active {
			  top: 4px;
			  border: 0 solid #000;
			  color: #495069;
			  background-color: #fff;
			  border-radius: 4px;
			  width: 60px;
			  height: 50px;
			  float: left;
			  margin: 5px;
			  font-size: 20px;
			  box-shadow: none;
			}

			#display {
			  width: 265px;
			  max-width: 270px;
			  font-size: 26px;
			  text-align: right;
			  background-color: #bcbd95;
			  float: left;
			}

			

			.operator {
			  background-color: #cee9ea;
			  position: relative;
			}

			.operator:hover {
			  background-color: #cee9ea;
			  box-shadow: 0 4px #b0d2cf;
			}

			.operator:active {
			  top: 4px;
			  box-shadow: none;
			}

			#clear {
			  float: left;
			  position: relative;
			  display: block;
			  background-color: #ff9fa8;
			}

			#clear:hover {
			  float: left;
			  display: block;
			  background-color: #F297A0;
			  margin-bottom: 15px;
			  box-shadow: 0 4px #CC7F86;
			}

			#clear:active {
			  float: left;
			  top: 4px;
			  display: block;
			  background-color: #F297A0;
			  margin-bottom: 15px;
			  box-shadow: none;
			}

			.bt{
				width: 130px !important;
			}

			.bt2{
				height: 200px !important;
			}
			.cabecalho{
				background-color: #262626;
				height: 50px;
				color: white;
				margin-bottom: 30px;
				padding-left: -15px;
				
			}
			.col-md-3,.col-md-6{
				padding-left: 0 !important;
				padding-right: 0 !important;
			}

			.footer {
		        position: fixed;
		        left: 0;
			  	bottom: 0;
			    width: 100%;
			    color: black;
			    text-align: center;
		    }
		    #fotos{
				height: 100px;
			}
		</style>
		<br>
		<h3 align="center">Carregamento do Cartão</h3>
		<br>
		<div class="container-fluid">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 cabecalho">
								<h5>Últimos 10 carregamentos</h5>
							</div>
							@foreach($movimento as $carregamento)
								<div class="col-md-12">
									{{$carregamento->carregamento}}€
									<br><br>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 cabecalho">
								<h5>Data</h5>
							</div>
							@foreach($movimento as $carregamento)
								<div class="col-md-12">
									{{$carregamento->created_at->format('d-m-Y H:i:s')}}
									<br><br>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 cabecalho ">
								<h5>Carregamento</h5>
							</div>
							<div class="col-md-12">
								<h5 align="center">{{$aluno->nome}}</h5>
							</div>
							<div class="col-md-12 ">
								<div class="row">
									<div class="col-md-7">
										
										<form name="calculator" action="{{route('papelaria.carregamentos.carregamentos.saldo',['id'=>$aluno->id_aluno])}}">
						         			<table>
										        <tr>
										            <td colspan="4">
										            	@if(session()->has('msg'))
													        <div class="alert alert-danger" role="alert">
													          {{session('msg')}}
													        </div>
								    					@endif
										                <input type="text" name="display" id="display" disabled>
										                <input type="hidden" name="display_final" id="display_final">
										            </td>
										        </tr>
										        <tr>
										            <td><input type="button" name="one" value="1" onclick="calculator.display.value += '1'"></td>
										            <td><input type="button" name="two" value="2" onclick="calculator.display.value += '2'"></td>
										            <td><input type="button" name="three" value="3" onclick="calculator.display.value += '3'"></td>
										            <td rowspan="3"><input type="button" id="clear" name="clear" class="bt2" value="&#8592" onclick="calculator.display.value = ''"></td>
										        </tr>
										        <tr>
										            <td><input type="button" name="four" value="4" onclick="calculator.display.value += '4'"></td>
										            <td><input type="button" name="five" value="5" onclick="calculator.display.value += '5'"></td>
										            <td><input type="button" name="six" value="6" onclick="calculator.display.value += '6'"></td>
										               
										        </tr>
										        <tr>
										            <td><input type="button" name="seven" value="7" onclick="calculator.display.value += '7'"></td>
										            <td><input type="button" name="eight" value="8" onclick="calculator.display.value += '8'"></td>
										            <td><input type="button" name="nine" value="9" onclick="calculator.display.value += '9'"></td>
										               
										        </tr>
										        <tr>
										          	<td><input type="button"name="clear" value="." onclick="virgula()"></td>
										            <td><input type="button" name="zero" value="0" onclick="calculator.display.value += '0'"></td>
										            <td colspan="2"><input onclick="passar()" type="submit" name="doit" value="Confirmar" id="clear" class="bt"></td>
										        </tr>
						         			</table>
			      						</form>
			      					</div>
			      					<div class="col-md-5">
			      						<br>
			      						<img id="fotos" src="{{asset('imagens/alunos/'.$aluno->foto_aluno)}}">
			      						<br><br><br><br>
			      						<h6>Saldo: {{$aluno->saldo}}€</h6>
			      					</div>
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
	<script type="text/javascript">


			function passar(){

				calculator.display_final.value=calculator.display.value;
			}

			function virgula(){
				if(!existeValor()){
					if(existeDecimal()){
						calculator.display.value +='.';
					}
				}
				else{
						calculator.display.value +='0.';
					}
			}

			function existeDecimal(){
				
				return calculator.display.value.indexOf('.')<0;

			}

			function existeValor(){

				return calculator.display.value.length ==0;
			}	
		</script>
@endsection
