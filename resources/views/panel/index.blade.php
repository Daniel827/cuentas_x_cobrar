@extends('layouts.adminpanel')
@section('titulo','Inicio')
@section('contenido')
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span>
        <div class="count">{{\App\User::count()}}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Conecciones</span>
        <div id="totalConnections" class="count">{{\Activity::users()->count()}}</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Clientes</span>
        <div class="count">{{\App\Cliente::count()}}</div>
    </div>
</div>
<!-- /top tiles -->
@endsection
@push('styles')
<!-- bootstrap-progressbar -->
<link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
<!-- JQVMap -->
<link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<!-- Skycons -->
<script src="{{asset('vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function recagarConexiones(){
  $.ajax({
        type:"GET",
        url:"{!! URL::to('numberConnections') !!}",
        success:function(data){
          $('#totalConnections').html(data);
        },
        error:function(){
            console.log('error');
        }
      });
}

setInterval('recagarConexiones()',1000);
</script>
@endpush
