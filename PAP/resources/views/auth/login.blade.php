@extends('layouts.app')
 <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
@section('content')
<style type="text/css">
    .bg-music{
        position: absolute;
        top: 64%;
        left: 0;
        right: 0;
        margin: 0 auto;
    }

    .btn-1{
        background-color: transparent;
        color: #fff;
        font-size: 78px;
        border: none;
        margin: 0 auto;
        opacity: .3;
        transition: all linear .2s;
    }
    .btn-1:hover{
        opacity: 1;
    }

    .fa-pause-circle{
        display: none;
    }
</style>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                {{--<div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>--}}
                            </div>
                        </div>

                       <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                 {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-music" align="center">
        <audio id="myMusic" src="{{asset('music/fundo.mp3')}}" loop=""></audio>
        <button class="btn-1">
            <i class="far fa-play-circle"></i>
            <i class="far fa-pause-circle"></i>
        </button>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $(".btn-1 .fa-play-circle").on('click', function(){
            $(this).hide();
            $(".fa-pause-circle").fadeIn();
            $("#myMusic")[0].play();
        });

        $(".btn-1 .fa-pause-circle").on('click', function(){
            $(this).hide();
            $(".fa-play-circle").fadeIn();
            $("#myMusic").pause();
        });
    });
</script>
@endsection
