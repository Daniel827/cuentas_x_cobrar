@extends('layouts.app')
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
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
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
                <form id="demo-form2" action="{{url('pagos')}}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="idCajero" value="{{\Auth::User()->cajero->idCajero}}">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente<span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idCliente" id="cliente" required >
                                <option value="">Seleccionar</option>
                                <option value="1">Daniel</option>
                                <option value="2">Jose</option>
                                <option value="3">Cristopher</option>
                                <option value="4">Emiro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="descripcion" name="descripcion" class="form-control col-md-6 col-xs-12" placeholder="Ingrese una descripcion"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número de factura<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nfact" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese el número de factura">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de pago <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control selectpicker col-md-7 col-xs-12" data-live-search="true" name="idTipoPago" id="idTipoPago" required >
                                <option value="">Seleccionar</option>
                                @foreach($tiposPago as $tp)
                                    <option value="{{$tp->idTipoPago}}">{{$tp->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Cantidad a Pagar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="pago" required="required" min=0.01 step="0.01" class="form-control col-md-7 col-xs-12" placeholder="Ingrese la cantidad a pagar">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form group">
                            <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Num Factura</th>
                            <th>Tipo Pago</th>
                            <th>Pago</th>
                            </thead>
                            <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">$ 0.00</h4></th>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                        <div class="form-group">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                            <button class="btn btn-primary" type="submit">Guardar Factura</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@push ('scripts')
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
    $("#guardar").hide();

    function agregar() {
        cliente = $("#cliente option:selected").val();
        nfact = $("#nfact").val();
        idTipoPago = $("#idTipoPago option:selected").val();
        descripcion = $("#descripcion").val();
        pago = $("#pago").val();

        if (cliente != "" && nfact != "" && idTipoPago != "" && descripcion != "" && pago != "") {
            subtotal[cont] = (pago);
            if (cliente != "" && nfact != "" && idTipoPago != "" && descripcion != "" && pago > 0) {
                subtotal[cont] = pago * 1;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ');" >Eliminar</button></td><td><input type="hidden" name="idFactura[]" value="' + nfact + '">' + nfact + '</td><td><input type="hidden" name="idTipoPago[]" value="' + idTipoPago + '">' + idTipoPago + '</td><td><input type="hidden" name="pago[]" value="' + pago + '">' + pago + '</td></tr>';
                cont++;
                limpiar();
                $('#total').html("$ " + total);
                evaluar();
                $('#detalles').append(fila);
            } else {
                alert("Error al ingresar");
            }
        }
    }
    function limpiar() {
        $("cliente").val("");
        $("nfact").val("");
        $("idTipoPago").val("");
        $("descripcion").val("");
        $("pago").val("");
    }

    function evaluar()
    {
        if (total > 0)
        {
            $("#guardar").show();
        } else
        {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#total").html("$ " + total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>
@endpush
@endsection
