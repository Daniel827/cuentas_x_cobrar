<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#idCliente').on('change',function(e){
    var idCliente=e.target.value;
    var op="<option value=''>--- Seleccionar ---</option>";
    if (idCliente != "" && idCliente != null) {
      $.ajax({
        type:"GET",
        url:"{!! URL::to('getFacturasPendientes') !!}",
        data:{
          'idCliente':idCliente
        },
        success:function(data){
          console.log('exito');
          $('#nfact').empty();
           $.each(data,function(index,obj){
             var id=obj.idfactura;
             var nombre=obj.numerofactura;
             op+="<option value='"+id+"'>"+nombre+"</option>";
           });
           $('#nfact').empty();
           $('#nfact').append(op);
           $('#nfact').selectpicker('refresh');
           $('#cliente').attr('disabled', true);
           $('input[name="idcliente"]').val(idCliente);
        },
        error:function(){
            console.log('error');
        }
      });
    }else{
      $('#nfact').empty();
      $('#nfact').append(op);
      $('#nfact').selectpicker('refresh');
    }
});

function mostrarSaldoTemporal(valor){
  var idFactura=valor;
  if (idFactura != "" && idFactura != null) {
    var pagos=getArrayPagos();
    var facturas=getArrayFacturas();
    $.ajax({
      type:"GET",
      url:"{!! URL::to('getSaldoTemporal') !!}",
      data:{
        'factura':idFactura,
        'pagos':pagos,
        'idFactura':facturas,
      },
      success:function(data){
        console.log('exito');
        $('#saldoTemporal').val(data);
      },
      error:function(){
          console.log('error');
      }
    });
  }else{
    $('#saldoTemporal').val("Saldo Temporal");
  }
}

$('#nfact').on('change',function(e){
  mostrarSaldoTemporal(e.target.value);
});
</script>
