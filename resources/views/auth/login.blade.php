@extends('layouts.app')

@section('content')
        <div class="panel-header mb-2 p-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center align-items-center my-4">
                            <div class="auth-logo">
                                <img src="{{asset('assets/images/logomvt-blanco.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-md-4 offset-md-4">
                    <h1 class="d-flex justify-content-center my-4 app-text-muted">Iniciar sesión</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>

                        <div style="text-align: center" class="mt-2">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Registrarme') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
