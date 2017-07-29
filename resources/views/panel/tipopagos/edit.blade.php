@extends('layouts.app')
@extends('layouts.adminpanel')
@section('titulo','Editar tipo de pago')
@section('contenido')
<div>
    <div class="page-title">
        <div class="title_left">
            <h3>Editar tipo de pago</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos del tipo de pago</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  @include('panel.mensajes.error')
                  @include('panel.mensajes.exito')
                    {{Form::open(['action'=>['TipoPagoController@update',$tipopago->idTipoPago],'class'=>'form-horizontal form-label-left','method'=>'PATCH'])}}
                    <div class="form-group">
                        <label for="nombre" class="col-lg-2 control-label">Código <font color="red">*</font></label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" value="{{$tipopago->codigo}}" readonly>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="nombre" class="col-lg-2 control-label">Nombre <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="nombre" id="nombre" class="form-control" type="text" value="{{$tipopago->nombre}}"  onkeypress="return esLetra();" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú\s]{6,19}" minlength="7" maxlength="20" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="referencia" class="col-lg-2 control-label">Referencia<font color="red">*</font></label>
                            <div class="col-lg-10">
                                <input name="referencia" id="referencia" class="form-control" type="text" value="{{$tipopago->referencia}}" pattern="[A-ZÁÉÍÓÚ][a-zñáéíóú\s]{6,19}" minlength="7" maxlength="20" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-lg-2 control-label">Descripción</label>
                            <div class="col-lg-10">
                                <textarea name="descripcion" id="descripcion" class="form-control validated">{{$tipopago->descripcion}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-lg-2 control-label">Estado <font color="red">*</font></label>
                            <div class="col-lg-10">
                                <select name="estado" id="estado" class="form-control" required >
                                    <option value="">-- Estado de Pago-- </option>
                                    <option {{$tipopago->estado=='A'?'selected':''}} value="A">Activo</option>
                                    <option {{$tipopago->estado=='I'?'selected':''}} value="I">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{url('tipopagos')}}" class="btn btn-default">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js\validaciones.js')}}"></script>
@endpush
