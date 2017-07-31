
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

       <h1>{{$texto}}</h1>
    <div id="datos">
        <caption >Reporte del Cliente con sus movimientos</caption> <br><br>
<label for="" >Nombres: </label><br><br>
<label for="" >Cédula: </label><br><br>



</div>
  <table >


 <div> 

   

   </div>
<tr> 
    <th>Pago</th> 
    <th>Descripción</th> 
    <th>Fecha Pago</th>
<th>Total Pago</th> 

</tr>
<tr> <td>Pago-001</td> <td>tarjeta</td> <td>12/2012/1999</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-002</td> <td>contado</td> <td>12/2012/2000</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-003</td> <td>tarjeta</td> <td>12/2012/1993</td> <td>23,89</td> 
</tr>
<tr> <td>Pago-004</td> <td>tarjeta</td> <td>12/2012/1993</td> <td>23,89</td> 
</tr>
</table>



    <!--footer para cada pagina-->
    <div id="footer">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
        <p class="page"><small class="texto">MÓDULO DE CUENTAS POR COBRAR</small></p>
    </div>
    <div id="footer2">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
    </div>
<div class="page-break"></div>
<h1>Page 2</h1>
</body>
</html>
