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
</head>
<body>
  @yield('pesquisaAluno')

      <nav class="navbar navbar-light" style="background-color: #80bfff;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <img src="{{asset('imagens/aedah.png')}}" width="40">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
         <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>  

        @if(!Gate::allows('papelaria'))

          
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand">AEDAH</a>
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('alunos.index')}}">Alunos <span class="sr-only">(current)</span></a>
                </li>
                <form class="form-inline my-2 my-lg-0" action="{{route('alunos.pesquisa')}}" method="post">
                  @csrf
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </ul>
            </div>
          </div>
      @endif 
@yield('a')
</nav> 
      @if(session()->has('eliminada'))
        <div class="alert alert-danger" role="alert">
          {{session('eliminada')}}
        </div>
      @elseif(session()->has('criada'))
        <div class="alert alert-success" role="alert">
          {{session('criada')}}
        </div>
      @elseif(session()->has('editado'))
        <div class="alert alert-success" role="alert">
          {{session('editado')}}
        </div>
      @endif
@yield('conteudo')
</body>
</html>
