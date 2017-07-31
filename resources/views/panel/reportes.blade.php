@extends('layouts.adminpanel')
@section('titulo','Reporte')
@section('contenido')
<div>

    <div class="page-title">
        <div class="title_left">
            <h3>Reportes</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              @include('panel.mensajes.error')
              @include('panel.mensajes.exito')
                <div class="x_title">
                    <h2>Consulta de clientes con todos sus movimientos</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cedula del Cliente<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="cedula_ruc" id="cedula_ruc" class="form-control" type="number" onkeypress="return esDigito()" pattern="[0-2][0-9]{9}(001)?" value="{{old('cedula_ruc')}}" required maxlength="13" minlength="10">
                            </div>
                        </div>
               
                
                   
                    
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"  href="{{url('reporte')}}" target="_blank">Generar

                                </button>
                             
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
                    <h2>Pagos de clientes realizados, por fecha inicial y final</h2>
                 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                     
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> 
 <div class="form-group">
                            @php
                            $hoy=date('Y-m-d');
                            @endphp
                            <label for="fechaNac" class="col-lg-2 control-label">Fecha inicial <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechaini" id="fechaini" class="form-control" type="date" value="{{old('fechaNac')}}" required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>

<br>
                    <div class="form-group">
                            @php
                            $hoy=date('Y-m-d');
                            @endphp
                            <label for="fechaNac" class="col-lg-2 control-label">Fecha final <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechafin" id="fechafin" class="form-control" type="date" value="{{old('fechaNac')}}" required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
                   
                
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4"> <br>
                                <button type="submit" class="btn btn-primary">Generar
                                 <li><a href="{{url('reporte2')}}" target="_blank">reportegenerar</a></li></button>
                              
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
                    <h2>Listado de clientes, incluyendo el campo de saldo </h2> 
                
                    <div class="clearfix"></div>

                </div>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                               
                               <button type="submit" class="btn btn-primary">
                                 <a href="{{url('reporte')}}" target="_blank" style="color:#FFFFFF">Generar</a></button>
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
