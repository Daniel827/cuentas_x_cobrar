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
                    <form id="demo-form2" action="{{url('getMovimientosClientes')}}" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idcliente" id="idCliente" required>
                                    <option value="">--- Seleccionar ---</option>
                                    @foreach($clientes as $cl)
                                      <option {{old('idcliente')==$cl->idcliente?'selected':''}} value="{{$cl->idcliente}}">{{$cl->apellidos}} {{$cl->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Generar</button>
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
                        <form id="demo-form3" action="{{url('getPagosFechas')}}" data-parsley-validate class="form-horizontal form-label-left">
 <div class="form-group">
                            @php
                            $hoy=date('Y-m-d');
                            @endphp
                            <label for="fechaini" class="col-lg-2 control-label">Fecha inicial <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechaini" id="fechaini" class="form-control" type="date" value="{{old('fechaini')}}" required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
<br>
                    <div class="form-group">
                            <label for="fechafin" class="col-lg-2 control-label">Fecha final <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="fechafin" id="fechafin" class="form-control" type="date" value="{{old('fechafin')}}"  required min="1980-01-01" max="{{$hoy}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4"> <br>
                                <button type="submit" class="btn btn-primary">Generar</button>
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
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                 <a class="btn btn-primary" title="Ver saldos"
                                 href="{{URL::action('AdminPanelController@getSaldosClientes')}}">Ver saldos</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('layouts.scripts.formValidation')
<script>
$(document).ready(function() {
    $('#demo-form3').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fechaini: {
                validators: {
                    date: {
                        message: 'Formato inválido',
                        format: 'DD-MM-YYYY'
                    },
                    callback: {
                        message: 'Fecha inválida',
                        callback: function(value, validator) {
                            var m = new moment(value, 'DD-MM-YYYY', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            var fin=$('#fechafin').val();
                            if(fin==null || fin==""){
                              return true;
                            }
                            return m.isBefore(fin);
                        }
                    }
                }
            },
            fechafin: {
                validators: {
                    date: {
                        message: 'Formato inválido',
                        format: 'DD-MM-YYYY'
                    },
                    callback: {
                        message: 'Fecha inválida',
                        callback: function(value, validator) {
                            var m = new moment(value, 'DD-MM-YYYY', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            var ini=$('#fechaini').val();
                            if(ini==null || ini==""){
                              return true;
                            }
                            return m.isAfter(ini);
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush
