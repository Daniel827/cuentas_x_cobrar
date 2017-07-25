@extends('layouts.app')
@section('content')
@if (session('status'))
      <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          {{ session('status') }}
      </div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <h1>Resetear contraseña</h1>
    <div>
        <input type="email" class="form-control" placeholder="Email" name="email" required="" />
    </div>
    <div>
        <a class="reset_pass" href="{{ route('login') }}">Volver al Login</a>
        <button type="submit" class="btn btn-default">Enviar link</button>
    </div>
    @endsection
