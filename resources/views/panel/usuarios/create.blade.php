@extends('layouts.adminpanel')
@section('titulo','Crear Usuario')
@section('contenido')
<div>
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
                    <h2>Datos del cajero</h2>
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
                    {!!Form::open(['url'=>'usuarios','data-parsley-validate','id'=>'enableForm','class'=>'form-horizontal form-label-left'])!!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre de usuario <font color="red">*</font></label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control" onkeypress="return esAlfaNum()" name="name" maxlength="25" minlength="3" pattern="[a-z0-9]{3,25}"  value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-mail <font color="red">*</font></label>
                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="50" minlength="12" required>
                          @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="rol" class="col-md-4 control-label">Rol <font color="red">*</font></label>
                      <div class="col-md-6">
                          <select class="form-control" required name="rol" id="rol">
                            <option value="">Seleccionar</option>
                            <option {{old('rol')=='admin'?'selected':''}} value="admin">Administrador</option>
                            <option {{old('rol')=='cajero'?'selected':''}} value="cajero">Cajero</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Contraseña <font color="red">*</font></label>
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control" maxlength="25" minlength="8" name="password" required>
                          @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <label for="confirm_password" class="col-md-4 control-label">Confirmar Contraseña <font color="red">*</font></label>
                        <div class="col-md-6">
                            <input id="confirm_password" type="password" class="form-control" maxlength="25" minlength="8" name="confirm_password" required>
                            @if ($errors->has('confirm_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <button class="btn btn-warning" type="reset">Resetear</button>
                                <a href="{{url('usuarios')}}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('layouts.scripts.formValidation')
<script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>
<script type="text/javascript">
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
                            message: 'Ingrese el nombre de usuario'
                        },
                        maxlength:{
                          message: 'El nombre de usuario tiene que tener un máximo de 25 caracteres alfanuméricos'
                        },
                        minlength:{
                          message: 'El nombre de usuario tiene que tener un máximo de 3 caracteres alfanuméricos'
                        },
                        pattern:{
                          message: 'El nombre de usuario no cumple el patrón.'
                        }
                    }
                },
                    email: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese su email'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese contraseña'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Confirme la contraseña'
                        },
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas no coinciden'
                        }
                    }
                },
                rol: {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione un rol'
                        }
                    }
                },

            }
        })
        // Enable the password/confirm password validators if the password is not empty
        .on('keyup', '[name="password"]', function() {
            var isEmpty = $(this).val() == '';
            $('#enableForm')
                    .formValidation('enableFieldValidators', 'password', !isEmpty)
                    .formValidation('enableFieldValidators', 'confirm_password', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#enableForm').formValidation('validateField', 'password')
                                .formValidation('validateField', 'confirm_password');
            }
        });
});
</script>
@endpush
