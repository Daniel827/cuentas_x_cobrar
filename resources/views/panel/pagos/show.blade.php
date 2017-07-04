@extends('layouts.app')
@extends('layouts.adminpanel')
@section('titulo','Ver pago')
@section('contenido')
@section('titulo','Pagos')
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
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente</label>
                        <p>{{ $pago->idCliente}}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de factura
                        </label>
                        <p>{{ $pago->numeroPago}}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion
                        </label>
                        <p>{{ $pago->descripcion}}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Cantidad a Pagar</label>
                            <p>{{ $pago->totalPago}}</p>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Tipo de pago</th>
                            <th>Factura</th>
                            <th>Pago</th>
                            </thead>
                            <tfoot>
                            <th></th>
                            <th>TOTAL</th>
                            <th><h4 id="total">$ 0.00</h4></th>
                            </tfoot>
                            <tbody>
                                @foreach ($detalles as $p)
                                <tr>
                                    <td>{{ $p->tipoPago->nombre}}</td>
                                    <td>{{ $p->idFactura}}</td>
                                    <td>{{ $p->pago}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$detalles->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
