@extends('layouts.adminpanel')
@section('titulo','Perfil')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              @include('panel.mensajes.error')
              @include('panel.mensajes.exito')
                <div class="x_title">
                    <h2>Datos personales</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female"> Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contraseña</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    {{Form::open(['action'=>['UserController@update',\Auth::User()->id],'id'=>'changePassword','class'=>'form-horizontal form-label-left','method'=>'PATCH'])}}
                        <input type="hidden" name="idUser" value="{{\Auth::User()->id}}"/>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_now">Contraseña actual <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password_now" required="required" name="password_now" minlength="8" maxlength="20" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Nueva contraseña <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password" name="password" required="required" minlength="8" maxlength="20" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar contraseña <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password_confirmation" class="form-control col-md-7 col-xs-12" minlength="8" maxlength="20" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{url('/')}}" class="btn btn-default">Inicio</a>
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
    $('#changePassword')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                password_now: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese contraseña'
                        },
                        stringLength: {
                            min: 8,
                            max: 20,
                            message: 'Ingrese una contraseña entre 8 y 20 caracteres'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese contraseña'
                        },
                        stringLength: {
                            min: 8,
                            max: 20,
                            message: 'Ingrese una contraseña entre 8 y 20 caracteres'
                        },
                        different: {
                            field: 'password_now',
                            message: 'La nueva contraseña debe ser diferente'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        notEmpty: {
                            message: 'Confirme la contraseña'
                        },
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas no coinciden'
                        },
                        stringLength: {
                            min: 8,
                            max: 20,
                            message: 'Ingrese una contraseña entre 8 y 20 caracteres'
                        }
                    }
                }
            }
        })
        // Enable the password/confirm password validators if the password is not empty
        .on('keyup', '[name="password"]', function() {
            var isEmpty = $(this).val() == '';
            $('#changePassword')
                    .formValidation('enableFieldValidators', 'password', !isEmpty)
                    .formValidation('enableFieldValidators', 'password_confirmation', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#changePassword').formValidation('validateField', 'password')
                                .formValidation('validateField', 'password_confirmation');
            }
        });
});
</script>
@endpush
