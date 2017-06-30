@extends('layouts.app')
@extends('layouts.adminpanel')
<<<<<<< HEAD
@section('titulo','Ver pago')
@section('contenido')

=======
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
                     @foreach ($pagos as $p)
                    <br />
                    <form id="demo-form2" action="{{url('pagos')}}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="idCajero" value="112">
                        <input type="hidden" name="numeroPago" value="PAGO-0001">

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente</label>
                        <p>{{ $p->idCliente}}</p>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de factura
                        </label>
                        <p>{{ $p->numeroPago}}</p>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion 
                        </label>
                        <p>{{ $p->descripcion}}</p>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Cantidad a Pagar
                       <p>{{ $p->totalPago}}</p>
                       @endforeach
                      </div>

                      

                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                           <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                             <thead style="background-color: #A9D0F5">
                               
                               <th>Pago</th>
                               <th>Cajero</th>
                               <th>Cliente</th>
                               <th>Descripcion</th>
                               <th>Fecha</th>
                               <th>Num Factura</th>
                               
                               <th>Pago</th>  
                             </thead>
                             <tfoot>
                                <th></th>
<th></th>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">$ 0.00</h4></th>                              
                             </tfoot>
                             <tbody>
                               @foreach ($pagos as $p)
                                  <tr>
                                      <td>{{ $p->idPago}}</td>    <!--nombre de la variable de la base de datos-->
                                      <td>{{ $p->idCajero}}</td>
                                      <td>{{ $p->idCliente}}</td>
                                      <td>{{ $p->descripcion}}</td>
                                      <td>{{ $p->fecha}}</td>
                                      <td>{{ $p->numeroPago}}</td>
                                      <td>{{ $p->totalPago}}</td>
                                     
                                  </tr>
                                  @endforeach
                             </tbody>
                           </table>
                      </div>  
                       {{$pagos->render()}}
                      </div>  
                      </div>  
>>>>>>> 162264304956612867ce24cd1fb8727f7db4e87b
@endsection
