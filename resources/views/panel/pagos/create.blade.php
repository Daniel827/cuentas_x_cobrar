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
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>



            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente<span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12">
                            <option>Choose option</option>
                            <option>Daniel</option>
                            <option>Jose</option>
                            <option>Cristopher</option>
                            <option>Emiro</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de Factura <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12">
                              <option>01</option>
                              <option>02</option>
                              <option>03</option>
                              <option>04</option>
                              <option>05</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de Pago <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="idTipoPago" class="form-control col-md-7 col-xs-12">

                              <option>01</option>
                              <option>02</option>
                              <option>03</option>
                              <option>04</option>
                              <option>05</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descripcion" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cantidad a Pagar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pago" required="required" class="form-control col-md-7 col-xs-12">


                        </div>
                      </div>


                      <br><center><button class="btn btn-primary" type="button">Adicionar</button>
                      <button class="btn btn-primary" type="reset">Limpiar</button></center>
<div class="ln_solid"></div>
                      <br><br>
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Cliente</th>
                          <th>Num Factura</th>
                          <th>Tipo Pago</th>
                          <th>Pago</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                          <td>@mdo</td>
                        </tr>
                      </tbody>
                    </table>

                    <label for="ex3">Total</label><input type="text" id="ex3" class="form-control" placeholder=" ">

                    </form>
                  </div>
                </div>
              </div>
            </div>

           <center><div class="form-group " >
             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" style="WIDTH: 200px; HEIGHT: 60px">Guardar factura</button>
               <button class="btn btn-primary" type="button" style="WIDTH: 200px; HEIGHT: 60px">Cancelar</button>
             </div>
           </div></center>

                </div>
              </div>
            </div>
          </div>
@endsection
