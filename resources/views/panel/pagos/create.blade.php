
@extends('layouts.adminpanel')
@section('titulo','Registrar pago')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Registrar pago</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <form id="demo-form2" action="{{url('pagos')}}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('panel.mensajes.error')
                    @include('panel.mensajes.exito')
                    <div class="x_title">
                        <h2>Datos del pago</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <input type="hidden" name="idCajero" value="{{\Auth::User()->cajero->idCajero}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idCliente" id="cliente" required >
                                    <option value="">Seleccionar</option>
                                    <option {{old('idCliente')==1?'selected':''}} value="1">Daniel</option>
                                    <option {{old('idCliente')==2?'selected':''}} value="2">Jose</option>
                                    <option {{old('idCliente')==3?'selected':''}} value="3">Cristopher</option>
                                    <option {{old('idCliente')==4?'selected':''}} value="4">Emiro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" name="descripcion" class="form-control col-md-6 col-xs-12" placeholder="Ingrese una descripción"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                <input name="_token" value="{{ csrf_token() }}" type="hidden" />
                                <button class="btn btn-primary" id="guardar" disabled type="submit">Guardar Pago</button>
                                <a href="{{url('pagos')}}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detalles del pago</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número de factura <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="nfact" id="nfact" >
                                    <option value="">Seleccionar</option>
                                    @for ($i = 1; $i <=20; $i++)
                                    <option value="{{$i}}">FACT-{{str_pad(''.$i,5, "0", STR_PAD_LEFT)}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de pago <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idTipoPago" id="idTipoPago" >
                                    <option value="">Seleccionar</option>
                                    @foreach($tiposPago as $tp)
                                    <option value="{{$tp->idTipoPago}}">{{$tp->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Cantidad a Pagar <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="pago" min=0.01 step="0.01" class="form-control col-md-7 col-xs-12" placeholder="Ingrese la cantidad a pagar">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form group">
                                <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="datatable-fixed-header" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                            <th></th>
                                            <th>Num Factura</th>
                                            <th>Tipo Pago</th>
                                            <th>Pago</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <th class="text-center" colspan="3">TOTAL</th>
                                            <th class="text-right"><h4 id="total">$ 0.00</h4></th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('styles')
@include('layouts.styles.datatables')
@endpush
@push ('scripts')
@include('layouts.scripts.datatables')
<script type="text/javascript" src="{{asset('js/jquery.toaster.js')}}"></script>
<script>
$(document).ready(function () {
    $('#bt_add').click(function () {
        agregar();
    });
});

var cont = 0;
total = 0;
subtotal = [];
var total = 0;
var subtotal = [];
$("#guardar").attr('disabled', true);

function existe(fact, tipoPago) {
    if (cont > 0) {
        $("#datatable-fixed-header tbody tr").each(function () {
            /* Obtener todas las celdas */
            var celdas = $(this).find('td');
            console.log($(celdas[1]).val()+", "+fact);
            console.log($(celdas[2]).val()+", "+tipoPago);
            if ($(celdas[1]).val() === fact && $(celdas[2]).val() === tipoPago) {
                return true;
            }
        });
    }
    return false;
}

function agregar() {
    nfact = $("#nfact option:selected").val();
    idTipoPago = $("#idTipoPago option:selected").val();
    pago = $("#pago").val();
    if (!existe(nfact, idTipoPago)) {
        if (nfact != "" && idTipoPago != "" && pago > 0) {
            subtotal[cont] = pago * 1;
            total = total + subtotal[cont];
            tp = $("#idTipoPago option:selected").text();
            var fila = '<tr class="selected" id="fila' + cont + '"><td class="text-center">\n\
            <button type="button" class="btn btn-danger" title="Eliminar detalle" onclick="eliminar(' + cont + ');" ><i class="fa fa-trash"></i></button></td>\n\
            <td><input type="hidden" name="idFactura[]" value="' + nfact + '">' + nfact + '</td>\n\
            <td><input type="hidden" name="idTipoPago[]" value="' + idTipoPago + '">' + tp + '</td>\n\
            <td class="text-right"><input type="hidden" name="pago[]" value="' + pago + '">$ ' + pago + '</td></tr>';
            cont++;
            limpiar();
            $('#total').html("$ " +total);
            evaluar();
            $('#datatable-fixed-header tbody').append(fila);
            $.toaster({priority: 'success', title: 'Éxito', message: 'Detalle añadido'});
        } else {
            $.toaster({priority: 'danger', title: 'Error', message: 'Revise los campos de los detalles'});
        }
    } else {
        $.toaster({priority: 'danger', title: 'Error', message: 'Ya existe la factura con ese tipo de pago en los detalles'});
    }
}
function limpiar() {
    $("cliente").val("");
    $("nfact").val("");
    $("idTipoPago").val("");
    $("descripcion").val("");
    $("pago").val("");
}

function evaluar() {
    if (total > 0) {
        $("#guardar").attr('disabled', false);
    } else {
        $("#guardar").attr('disabled', true);
    }
}

function eliminar(index) {
    total = total - subtotal[index];
    $("#total").html("$ " + total);
    $("#fila" + index).remove();
    evaluar();
    $.toaster({priority: 'warning', title: 'Advertencia', message: 'Detalle eliminado'});
}

function recorrerTabla() {
    var filas = new array();
    if (cont > 0) {
        $("#datatable-fixed-header tbody tr").each(function (index) {
            /* Obtener todas las celdas */
            var celdas = $(this).find('td');
            var fila = '<tr class="selected" id="fila' + index + '"><td class="text-center">\n\
            <button type="button" class="btn btn-danger" title="Eliminar detalle" onclick="eliminar(' + index + ');" ><i class="fa fa-trash"></i></button></td>\n\
            <td><input type="hidden" name="idFactura[]" value="' + $(celdas[1]).val() + '">' + $(celdas[1]).text() + '</td>\n\
            <td><input type="hidden" name="idTipoPago[]" value="' + $(celdas[2]).val() + '">' + $(celdas[2]).val() + '</td>\n\
            <td class="text-right"><input type="hidden" name="pago[]" value="' + $(celdas[3]).val() + '">$ ' + $(celdas[3]).val() + '</td></tr>\n';
            filas[index] = fila;
        });
        $("#datatable-fixed-header tbody").remove();
    }
    $('#datatable-fixed-header tbody').html(filas);
    /*for (var i = 0; i < filas.length; i++) {
     $('#datatable-fixed-header tbody').append(filas[i]);
     }*/
}
</script>
@endpush
