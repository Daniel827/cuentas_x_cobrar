@extends('layouts.app')
@extends('layouts.adminpanel')
@section('titulo','Registrar pago')
@section('contenido')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @if(count($errors)>0)
            <div class="row">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="x_content">
                <br />
                <form id="demo-form2" action="{{url('pagos')}}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="idCajero" value="1">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente<span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" name="idCliente" id="cliente" required >
                                <option value="0">Seleccionar</option>
                                <option value="1">Daniel</option>
                                <option value="2">Jose</option>
                                <option value="3">Cristopher</option>
                                <option value="4">Emiro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!--<input type="text" id="descripcion" required="required" name="descripcion" class="form-control col-md-7 col-xs-12" placeholder="Ingrese una descripcion">-->
                            <textarea id="descripcion" name="descripcion" class="form-control col-md-6 col-xs-12" placeholder="Ingrese una descripcion">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de factura<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nfact" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese el numero de factura">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de pago <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <select class="form-control col-md-7 col-xs-12" name="idTipoPago" id="idTipoPago" required >
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
