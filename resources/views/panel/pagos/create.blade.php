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
                        <input type="hidden" name="idcajero" value="{{\Auth::User()->cajero->idcajero}}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idCliente">Cliente <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="hidden" name=idcliente value="">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="cliente" id="idCliente" required >
                                    <option value="">--- Seleccionar ---</option>
                                    @foreach($clientes as $cl)
                                      <option {{old('idcliente')==$cl->idcliente?'selected':''}} value="{{$cl->idcliente}}">{{$cl->apellidos}} {{$cl->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descripcion" name="descripcion" maxlength="200" required class="form-control col-md-6 col-xs-12" placeholder="Ingrese una descripción" required="true" >{{old('descripcion')}}</textarea>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfact">Número de factura <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="nfact" id="nfact" >
                                    <option value="">--- Seleccionar ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idTipoPago">Tipo de pago <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idTipoPago" id="idTipoPago" >
                                    <option value="">--- Seleccionar ---</option>
                                    @foreach($tiposPago as $tp)
                                    <option value="{{$tp->idtipopago}}">{{$tp->nombre}} - {{$tp->referencia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="cantidad">Cantidad a Pagar <font color="red">*</font></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="cantidad" min=0.01 max=1200 step="0.01" class="form-control col-md-7 col-xs-12" placeholder="Ingrese la cantidad a pagar" onkeypress="return NumCheck(event, this)">
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
                                        <table id="detalles" class="table table-striped">
                                            <thead>
                                            <th></th>
                                            <th>Número de Factura</th>
                                            <th>Tipo de Pago</th>
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
@include('layouts.scripts.formValidation')
@include('panel.pagos.scripts')
<script type="text/javascript" src="{{asset('js/jquery.toaster.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.number.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#bt_add').click(function () {
      agregar();
    });
});

$("#demo-form2").on("submit",function(e){
  var currentForm = this;
  e.preventDefault();
  var f=getArrayFacturas();
  if(f.length==0){
    $.toaster({priority: 'danger', title: 'Error', message: 'Ingrese al menos un detalle'});
    return false;
  }
   var dialog = bootbox.dialog({
  title: 'Advertencia',
  message: "<p>Desea realizar el cobro</p>",
  buttons: {
     cancel: {
         label: "Cancelar",
         className: 'btn-default',
         callback: function(){
             console.log('cancel clicked');
         }
     },
     ok: {
         label: "Guardar",
         className: 'btn-warning',
         callback: function(){
             currentForm.submit();
         }
     }
  }
  });
});

$('#cantidad').number( true, 2 );

var cont = 0;
total = 0;
subtotal = [];
var total = 0;
var subtotal = [];
var facturas=[];
var tipos=[];
var pagos=[];
$("#guardar").attr('disabled', true);

function existe(fact, tipoPago) {
    if (cont > 0) {
            facturas=getArrayFacturas();
            var contTipos=0;
            var ex=false;
            $("input[name='idtipopago[]']").each(function() {
              if (facturas[contTipos]=== fact && $(this).val() === tipoPago) {
                  ex=true;
                  return false;
              }
              contTipos++;
          });
          console.log(ex);
          return ex;
    }
    return false;
}

function validarSaldo(factura,cantidad){
  if(cont==0){
    pagos=[];
    facturas=[];
  }
  $('#btn_add').attr('disabled',true);
  var idCliente= $("#cliente option:selected").val();
  var pagos=getArrayPagos();
  var valido=false;
  $.ajax({
    type:"GET",
    url:"{!! URL::to('getSaldoDisponible') !!}",
    data:{
      'idCliente':idCliente,
      'idFactura':facturas,
      'pagos':pagos,
      'factura':factura,
      'cantidad':cantidad
    },
    success:function(data){
      if(data){
        registrar(factura,cantidad);
      }else{
        $.toaster({priority: 'danger', title: 'Error', message: 'La cantidad es superior al saldo que debe'});
      }
      $('#btn_add').attr('disabled',false);
    },
    error:function(){
        $.toaster({priority: 'danger', title: 'Error', message: 'Error de servidor'});
        $('#btn_add').attr('disabled',false);
    }
  });
}

function registrar(nfact,cantidad){
  subtotal[cont] = cantidad;
  total = total + subtotal[cont];
  var tp = $("#idTipoPago option:selected").text();
  var fact = $("#nfact option:selected").text();
  var fila = '<tr class="selected" id="fila' + cont + '"><td class="text-center">\n\
  <button type="button" class="btn btn-danger" title="Eliminar detalle" onclick="eliminar(' + cont + ');" ><i class="fa fa-trash"></i></button></td>\n\
  <td><input type="hidden" name="idfactura[]" value="' + nfact + '">' + fact + '</td>\n\
  <td><input type="hidden" name="idtipopago[]" value="' + idTipoPago + '">' + tp + '</td>\n\
  <td class="text-right"><input type="hidden" name="pago[]" value="' + pago + '">$ ' + subtotal[cont].toFixed(2) + '</td></tr>';
  var filas=recorrerTabla();
  cont++;
  limpiar();
  $("#total").html("$ " + total.toFixed(2));
  evaluar();
  $('#detalles tbody').html(fila+filas);
  $.toaster({priority: 'success', title: 'Éxito', message: 'Detalle añadido'});
}

function agregar() {
    nfact = $("#nfact option:selected").val();
    idTipoPago = $("#idTipoPago option:selected").val();
    pago = $("#cantidad").val();
    var exis=existe(nfact, idTipoPago);
    if (!exis) {
        if (nfact != "" && idTipoPago != "" && pago > 0) {
            validarSaldo(nfact,pago * 1);
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
    $("idtipopago").val("");
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
    total-=subtotal[index];
    $("#total").html("$ " + total);
    $("#fila" + index).remove();
    evaluar();
    $.toaster({priority: 'warning', title: 'Advertencia', message: 'Detalle eliminado'});
}

function recorrerTabla() {
  var filas = "";
    if (cont > 0) {
      tipos=getArrayTipos();
      pagos=getArrayPagos();
        $("#detalles tbody tr").each(function (index) {
            /* Obtener todas las celdas */
            var celdas = $(this).find('td');
            var fila = '<tr class="selected" id="fila' + index + '"><td class="text-center">\n\
            <button type="button" class="btn btn-danger" title="Eliminar detalle" onclick="eliminar(' + index + ');" ><i class="fa fa-trash"></i></button></td>\n\
            <td><input type="hidden" name="idfactura[]" value="' + facturas[index]+ '">' + $(celdas[1]).text() + '</td>\n\
            <td><input type="hidden" name="idtipopago[]" value="' + tipos[index] + '">' + $(celdas[2]).text() + '</td>\n\
            <td class="text-right"><input type="hidden" name="pago[]" value="' +pagos[index]+'">' + $(celdas[3]).text() + '</td></tr>\n';
            filas+=fila;
        });
        $("#detalles tbody").html("");
    }
    return filas;
}

function getArrayFacturas(){
  var facturas=[];
    var contFact=0;
    $("input[name='idfactura[]']").each(function() {
      facturas[contFact]=$(this).val();
      console.log('idFactura -> '+$(this).val());
      contFact++;
  });
  return facturas;
}

function getArrayTipos(){
    var tipos=[];
    var contTipos=0;
    $("input[name='idtipopago[]']").each(function() {
      tipos[contTipos]=$(this).val();
      contTipos++;
  });
  return tipos;
}

function getArrayPagos(){
    var pagos=[];
    var contPagos=0;
    $("input[name='pago[]']").each(function() {
      pagos[contPagos]=$(this).val();
      contPagos;
  });
  return pagos;
}

function NumCheck(e, field) {
 key = e.keyCode ? e.keyCode : e.which
    // backspace
    if (key == 8) return true

    // 0-9 a partir del .decimal
    if (field.value != "") {
        if ((field.value.indexOf(".")) > 0) {
            //si tiene un punto valida dos digitos en la parte decimal
            if (key > 47 && key < 58) {
                if (field.value == "") return true
                regexp = /[0-9]{2}$/
                return !(regexp.test(field.value))
            }
        }
    }
    // 0-9
    if (key > 47 && key < 58) {
        if (field.value == "") return true
        regexp = /[0-9]{10}/
        return !(regexp.test(field.value))
    }
    // .
    if (key == 46) {
        if (field.value == "") return false
        regexp = /^[0-9]+$/
        return regexp.test(field.value)
    }
    // other key
    return false
}

$(document).ready(function() {
    $('#demo-form2').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'El campo descripción es obligatorio'
                    }
                }
            },
             nfact: {
                validators: {
                    notEmpty: {
                        message: 'Elija una factura'
                    }
                }
            },
            cliente: {
               validators: {
                   notEmpty: {
                       message: 'Elija una cliente'
                   }
               }
           },
             idTipoPago: {
                validators: {
                    notEmpty: {
                        message: 'Elija un tipo de pago'
                    }
                }
            },

             cantidad: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese una cantidad'
                    }
                }
            }
        }
    });
});
</script>
@endpush
