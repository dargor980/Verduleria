<html>
  <meta charset="utf-8"/>
  <meta http-equiv=”Content-Language” content=”es”/>
  <head>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="{{asset('css/icon/all.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>


      <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
      <script  type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js" defer></script>
    <title> @yield('titulo') | Santa Gemita </title>
    <link rel="icon" href="{!! asset('logo.ico') !!}"/>
  </head>
  <body class="fondobody" onload="startTime()">

    <nav id="navbar" class="navbar navbar-expand-lg navbar-light navbargeneral">
      <!--OPCIONES NAVBAR-->
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav ml-md-auto d-none d-md-flex">
          <li class="nav-item active container-fluid">
            <div id="clockdate">
              <div class="clockdate-wrapper row">
                <div id="clock" class="text-white"></div>&nbsp;&nbsp;
                <div id="date" class="text-white"></div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!--/OPCIONES NAVBAR-->
    </nav>



    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand sidebartitulo shadow-sm">
                <img src="/img/comida.png" class="icono" alt="">
                <a href="{{route('home')}}" class="ml-3">Santa Gemita</a>
              <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            </div>


            <div class="sidebar-menu">
              <ul>
                @guest
                @else
                  <li class="sidebar-dropdown mt-2">
                    <a href="#">
                      <i class="fas fa-user"></i>
                      <span>{{ Auth::user()->name }}</span>
                    </a>
                      <div class="sidebar-submenu">
                        <ul>
                          @if(auth()->user()->id==1)
                          <li>
                            <a href="{{route('adminuser')}}">Administrar Usuarios</a>
                          </li>
                          <li>
                            <a href="{{ route('register') }}">Registrar</a>
                          </li>
                          @endif
                          <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                          </li>
                        </ul>
                      </div>
                    </li>
                @endguest

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Pedidos</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{route('newpedido')}}" >Nuevo Pedido</a>
                      </li>
                      <li>
                        <a href="{{route('listaped')}}">Ver Pedidos</a>
                      </li>
                      <li>
                        <a href="{{route('adminpagos')}}">Administrar Pagos</a>
                      </li>
                    </ul>
                  </div>
                </li>


                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Productos</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{route('newprod')}}">Nuevo Producto</a>
                      </li>
                      <li>
                      <a href="{{route('listaprod')}}">Ver Productos</a>
                      </li>
                      <li>
                        <a href="{{route('newcategoria')}}">Administrar Categoria</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Proveedores</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{route('listaprov')}}">Lista de Proveedores</a>
                      </li>
                      <li>
                        <a href="{{route('newprov')}}">Nuevo Proveedor</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fas fa-boxes"></i>
                    <span>Inventario</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      @if(auth()->user()->id==1)
                      <li>
                        <a href="{{route('newstock')}}">Ingresar Stock</a>
                      </li>
                      @endif
                      <li>
                        <a href="{{route('listav')}}">Stock Verduleria</a>
                      </li>
                      <li>
                        <a href="{{route('listac')}}">Stock Congelados</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-chart-line"></i>
                    <span>Estadísticas de ventas</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{route('historialventas')}}">Historial de Ventas</a>
                      </li>
                      <li>
                        <a href="{{route('clientesfrecuentes')}}">Clientes Frecuentes</a>
                      </li>
                      <li>
                        <a href="{{route('masvendidos')}}">Mas Vendidos</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fas fa-users"></i>
                    <span>Clientes</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{route('listaclientes')}}">Ver Clientes</a>
                      </li>
                      <li>
                        <a href="{{route('newcliente')}}">Nuevo Cliente</a>
                      </li>
                    </ul>
                  </div>
                </li>


              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->

        </nav>



        <main class="page-content">
          @yield('contenido')

        </main>
        <!-- page-content" -->

    </div>



    <script>
        jQuery(function ($) {
            $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
            $(this)
            .parent()
            .hasClass("active")
            ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .parent()
            .removeClass("active");
            } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
            $(this)
            .parent()
            .addClass("active");
            }
            });

            $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            });
        });
    </script>

{{--Script del reloj digital--}}
    <script>
      function startTime() {
        var today = new Date();
        var hr = today.getHours();
        var min = today.getMinutes();
        var sec = today.getSeconds();
        ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
        hr = (hr == 0) ? 12 : hr;
        hr = (hr > 12) ? hr - 12 : hr;
        //Add a zero in front of numbers<10
        hr = checkTime(hr);
        min = checkTime(min);
        sec = checkTime(sec);
        document.getElementById("clock").innerHTML = `<i class="far fa-clock text-white"></i> &nbsp;` + hr + ":" + min + ":" + sec + " " + ap;

        var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        var days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        var curWeekDay = days[today.getDay()];
        var curDay = today.getDate();
        var curMonth = months[today.getMonth()];
        var curYear = today.getFullYear();
        var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
        document.getElementById("date").innerHTML = date;

        var time = setTimeout(function(){ startTime() }, 500);
    }
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    </script>
  {{--Script del reloj digital--}}

  </body>

@yield('scripts')

</html>
