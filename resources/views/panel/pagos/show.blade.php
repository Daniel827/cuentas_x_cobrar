@extends('layouts.adminpanel')
@section('titulo','Ver pago')
@section('contenido')
@section('titulo','Pagos')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Pago <a href="{{url('pagos')}}" class="btn btn-default">Volver</a></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
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
                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Pago
                                    <small class="pull-right">Fecha: {{date('d/m/Y')}}</small>
                                </h1>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Cliente
                                <address>
                                    @php
                                      $cliente=$pago->cliente;
                                    @endphp
                                    <strong>{{$cliente->nombres}} {{$cliente->apellidos}}</strong>
                                    <br>{{$cliente->direccion}}
                                    <br>Teléfono: {{$cliente->telefono}}
                                    <br>Email: {{$cliente->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Cajero
                                <address>
                                    @php
                                    $cajero=$pago->cajero;
                                    @endphp
                                    <strong>{{$cajero->nombres}} {{$cajero->apellidos}}</strong>
                                    <br>{{$cajero->direccion}}
                                    <br>Teléfono: {{$cajero->telefono}}
                                    <br>Email: {{$cajero->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>{{$pago->numeropago}}</b>
                                <br>
                                <b>Fecha del pago:</b> {{$pago->fecha}}
                                <br>
                                <b>Descripción:</b>
                                <p class="text-justify">{{$pago->descripcion}}</p>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tipo de pago</th>
                                            <th class="text-center">Factura</th>
                                            <th class="text-center">Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detalles as $p)
                                        <tr>
                                            <td>{{ $p->tipoPago->nombre}}</td>
                                            <td>{{ $p->factura->numerofactura}}</td>
                                            <td class="text-right">$ {{ $p->pago}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$detalles->render()}}
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">$ {{$pago->totalpago}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
