<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo','default') | Cuentas x Cobrar</title>

        <!-- Bootstrap -->
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col footer_fixed">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{url('/')}}" class="site_title"><i class="fa fa-paw"></i> <span>Cuentas x Cobrar</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Inicio </a>
                                    <li><a href="{{url('perfil')}}"><i class="fa fa-user"></i> Perfil </a>
                                    </li>
                                    <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('usuarios')}}">Todos los usuarios</a></li>
                                            <li><a  href="{{url('usuarios/create')}}">Añadir nuevo</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-users"></i> Cajeros <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('cajeros')}}">Todos los cajeros</a></li>
                                            <li><a  href="{{url('cajeros/create')}}">Añadir nuevo</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-credit-card"></i> Tipos de pago <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('tipopagos')}}">Todos los tipos de pago</a></li>
                                            <li><a href="{{url('tipopagos/create')}}">Añadir nuevo</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-calculator"></i>Pagos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('pagos')}}">Todos los pagos</a></li>
                                            <li><a href="{{url('pagos/create')}}">Registrar nuevo pago</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-file-pdf-o"></i>Otros Reportes <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('reporte')}}">Clientes con sus movimientos</a></li>
                                            <li><a href="chartjs2.html">Listado de clientes con su saldo</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('images/img.jpg')}}" alt="">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="{{url('perfil')}}"> Perfil</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out pull-right"></i> Salir</a>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('contenido')
                </div>
                <!-- /page content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
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

        <!-- Custom Theme Scripts -->
        <script src="{{asset('build/js/custom.min.js')}}"></script>
    </body>
</html>
