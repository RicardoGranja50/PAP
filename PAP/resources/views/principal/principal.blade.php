<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body>

	<style type="text/css">
		html, body {height:100%;}

		#header{
			height: 20%;
		}

		#content{
			height: 100%;
			width: 100%;
		}

		#footer{
			
		    bottom:0;
		    width: 100%;
		    height: 15%;
		}

	</style>
	<div class="table-responsive">
		@if(session()->has('pass'))
	        <div class="alert alert-success" role="alert">
	          {{session('pass')}}
	        </div>
    	@endif
		<table class="table">
			<tr style="text-align: center;background-color: #80bfff;" id="header">
				<td colspan="2">
					<img src="{{asset('imagens/aedah.png')}}" width="120px">
				</td>
				
			</tr>

			<tr style="text-align: center" id="content">
				<td>
					<img src="{{asset('imagens/admin.png')}}"width="450px">
				</td>

				<td>
					<img src="{{asset('imagens/func.png')}}"width="450px">
				</td>
			</tr>
			<tr style="text-align: center" id="content" >
				<td>
					<a href="{{route('principal.login',['idl'=>1])}}" class="btn btn-primary"><h1>Administrador</h1></a>
				</td>
				<td >
					<a href="{{route('principal.login',['idl'=>2])}}" class="btn btn-primary"><h1>Funcionários</h1></a>
			</tr>

			<tr style="text-align:center;background-color: #80bfff;" id="footer">
				<td colspan="2">
					<h4>Escola Secundária D.Afonso Henriques</h4>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>