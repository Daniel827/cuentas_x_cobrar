@extends('layouts.adminpanel')
@section('titulo','Crear Usuario')
@section('contenido')
<div id="enableForm">
            <div class="page-title">
              <div class="title_left">
                <h3>Crear usuario</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos del usuario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  @include('panel.mensajes.error')
                  @include('panel.mensajes.exito')
                    {!!Form::open(['url'=>'usuarios'])!!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control" name="name"  value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-md-4 control-label">Rol</label>
                        <div class="col-md-6">
                            <select class="form-control" required name="rol" id="rol">
                              <option value="">Seleccionar</option>
                              <option value="admin">Administrador</option>
                              <option value="cajero">Cajero</option>
                        </div>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input class="btn btn-primary" type="submit" value="Añadir" />
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@push('styles')
<!-- Datatables -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/formValidation.min.js" integrity="sha256-Qp6xaAAPNHNMZKHvWcKFgMr+ps2D7IlJtxXTRdWbDR0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/framework/bootstrap.min.js" integrity="sha256-O+s7pNT0GqTkCvhZZ7RxYBkzRxA5tn0VzyI7HEu2Ui8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/framework/foundation.min.js" integrity="sha256-ru2E2z6jv1QaJHCzRSyGxPtV8t8kZapth1MYdihiL0c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/framework/pure.min.js" integrity="sha256-0wdn5d/TnEDv1R2gCQ/wA7kQZvkzyNOk01gdeqQBJh4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/framework/semantic.min.js" integrity="sha256-Upl9HEPJv7Nztap7EurVecAPaCsTrPxqFM6p42hbc3o=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/framework/uikit.min.js" integrity="sha256-as+8IjvZ76lZIunXyA5VrHatvem5kZggCsPhlsfyrts=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.formvalidation/0.6.1/js/language/es_ES.js" integrity="sha256-xbRxaVG4s5cfEvuZRwuRqY27ZPw5iMoXJs0mi+PIB7U=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#enableForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese  sus Nombres es un campo obligatorio'
                        }
                    }
                },
                    email: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese su email es un campo obligatorio'
                        }
                    }
                },
                password: {

                    validators: {
                        notEmpty: {
                            message: 'Ingrese contraseña es un campo obligatorio'
                        }
                    }
                }

            }
        })
        // Enable the password/confirm password validators if the password is not empty

});
</script>
@endpush
