@extends('layouts.adminpanel')
@section('titulo','Pagos')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Pagos</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                <a href="{{url('pagos/create')}}" title="Nuevo pago" class="btn btn-default">
                    <i class="fa fa-plus-circle"></i> Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
       
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                 <div class="card-box table-responsive">
                <div class="x_title">
                    <h2>Listado de Pagos</h2>
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
                  @include('panel.mensajes.error')
                  @include('panel.mensajes.exito')
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Cajero</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th># Pago</th>
                                <th>Total Pago</th>
                            </tr>
                        </thead>
                        @foreach ($pagos as $p)
                        <tr>
                            <td class="text-center">
                                <a class="btn btn-primary" title="Ver detalles" href="{{URL::action('PagoController@show',$p->numeropago)}}"><i class="fa fa-folder"></i></a>
                            </td>
                            <td>{{ $p->cajero->apellidos}} {{ $p->cajero->nombres}}</td>
                            <td>{{ $p->cliente->apellidos}} {{ $p->cliente->nombres}}</td>
                            <td>{{ $p->fecha}}</td>
                            <td class="text-right">{{ $p->numeropago}}</td>
                            <td class="text-right">$ {{ $p->totalpago}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {{$pagos->render()}}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
@include('layouts.styles.datatables')
@endpush
@push('scripts')
@include('layouts.scripts.datatables')
@endpush
