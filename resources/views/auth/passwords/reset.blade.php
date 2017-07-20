@extends('layouts.app')
@section('content')
@if (session('status'))
  <div class="alert alert-success alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      {{ session('status') }}
    </div>
  @endif
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <h1>Resetear contraseña</h1>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="Email" name="email" required />
        @if ($errors->has('email'))
        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Nueva contraseña" name="password" required />
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required />
        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
        @endif
    </div>
    <div>
        <a class="reset_pass" href="{{ route('login') }}">Volver al Login</a>
        <button type="submit" class="btn btn-default">Resetear contraseña</button>
    </div>
@endsection
