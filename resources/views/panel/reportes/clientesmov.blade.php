<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Clientes con sus Movimientos</title>
        <style type="text/css">
            /* estilos para el footer y el numero de pagina */
            @page { margin: 180px 75px; }
            #header {
                position: fixed;
                left: 0px;
                top: -170px;
                right: 0px;
                height: 90px;
                background-color: #FFFFFF;
                color: #2E2E2E;
                text-align: center;
            }
            #footer {
                position: fixed;
                left: 0px;
                bottom: -180px;
                right: 0px;
                height: 50px;
                background-color: #FFFFFF;
                color: #2E2E2E;
            }

            #footer2 {
                position: fixed;
                left: 0px;
                bottom: -130px;
                right: 0px;
                height: 5px;
                background-color: #A9D0F5;
                color: #2E2E2E;
            }
            #footer .page:after {
                content: counter(page, decimal);
                float:right;
                color: #848484;
            }
            .page-break {
                page-break-after: always;
            }
            img.alineadoTextoImagenCentro{
                float:left;
                width: 108px;
                height: 83px;
                /* Ojo vertical-align: text-middle no existe*/
            }
            .texto {
                color: #848484;
            }
            #datos {
                color: #848484;
                font-family: "Lucida Sans Unicode";
            }
            body {font-family: Arial, Helvetica, sans-serif;}


            table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                        font-size: 12px;    margin-right:50px;     width: 700px; text-align: center;    border-collapse: collapse; }

            th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
                     border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

            td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                    color: #669;    border-top: 1px solid transparent; }

            tr:hover td { background: #d0dafd; color: #339; }
        </style>
    </head>
    <body>
        <!--header para cada pagina-->
        <div id="header">
            <img class="alineadoTextoImagenCentro" src="https://caiutn.files.wordpress.com/2015/05/logo-utn.png?w=480"/><p><b>		UNIVERSIDAD TÉCNICA DEL NORTE<br>
                    FACULTAD DE INGENIERÍA EN CIENCIAS APLICADAS<br>
                    CARRERA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES
                </b>
            </p>
        </div>
        <div id="datos">
            <caption >Movimientos del Cliente</caption> <br><br>
            <b>Nombres: </b>{{$cliente->nombres}}<br><br>
            <b>Apellidos: </b>{{$cliente->apellidos}}<br><br>
            <b>Cédula: </b>{{$cliente->cedula}}<br><br>
            <b>Teléfono: </b>{{$cliente->telefono}}<br><br>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Número Factura</th>
                    <th>Tipo de pago</th>
                    <th>Fecha</th>
                    <th>Pago</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pagos as $pago)
                  @foreach($pago->detallesPago as $detalle)
                  <tr>
                      <td>{{$detalle->factura->numerofactura}}</td>
                      <td>{{$detalle->tipoPago->nombre}}</td>
                      <td>{{$pago->fecha}}</td>
                      <td>{{$detalle->pago}}</td>
                  </tr>
                  @endforeach
                @empty
                <tr>
                  <td colspan="4" style="text-align:center">No se encontraron movimientos de ese cliente</td>
                </tr>
                @endforelse
                </tobdy>
        </table>
        <!--footer para cada pagina-->
        <div id="footer">
            <!--aqui se muestra el numero de la pagina en numeros romanos-->
            <p class="page"><small class="texto">MÓDULO DE CUENTAS POR COBRAR</small></p>
        </div>
        <div id="footer2">
            <!--aqui se muestra el numero de la pagina en numeros romanos-->
        </div>
        <!--<div class="page-break"></div>-->
    </body>
</html>
