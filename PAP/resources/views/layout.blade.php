<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>
		@yield('titulo')
	</title>
	 <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    @if(session()->has('msg')) 
      <div class="alert alert-danger" role="alert">
      {{session('msg')}}  
      </div>   
    @endif
</head>
<body>
	@yield('pesquisaAluno')
  		<nav class="navbar navbar-light" style="background-color: #80bfff;">
    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <img src="{{asset('imagens/aedah.png')}}" width="40">
      		<span class="navbar-toggler-icon"></span>
    			</button>
          <div class="container-fluid">
      			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        			<a class="navbar-brand" href="#">AEDAH</a>
        			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          				<li class="nav-item active">
            				<a class="nav-link" href="{{route('alunos.index')}}">Alunos <span class="sr-only">(current)</span></a>
          				</li>
          				<form class="form-inline my-2 my-lg-0" action="{{route('alunos.pesquisa')}}" method="post">
                    @csrf
          					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
          					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        				  </form>
          				<li class="nav-item active">
            				<a class="nav-link" href="#">Bar <span class="sr-only">(current)</span></a>
          				</li>
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Carregamentos  <span class="sr-only">(current)</span></a>
                  </li>
          				<li class="nav-item active">
            				<a class="nav-link" href="#">Portaria <span class="sr-only">(current)</span></a>
         				</li>
         				<li class="nav-item active">
            				<a class="nav-link" href="#">Adicionar Registos <span class="sr-only">(current)</span></a>
         				</li>
        			</ul>
    			</div>
        </div>
  		</nav>
  </div>
	@yield('conteudo')

</body>
</html>