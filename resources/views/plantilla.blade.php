<html>
  <head>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <script src="https://kit.fontawesome.com/a35944550c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>@yield('titulo')</title>
  </head>
  <body class="fondobody">
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand sidebartitulo">
              <a href="#" >
                      <img src="/img/comida.png" class="icono" alt="">
                      &nbsp;
                        Santa Gemita
                </a>
              <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            </div>
            
            
        
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>Administración</span>
                </li>
                <li class="header-menu">
                  <a href="inventario" target="blank">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Prueba</span></a>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Pedidos</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#" >Nuevo Pedido
                        </a>
                      </li>
                      <li>
                        <a href="#">Administrar Pedidos</a>
                      </li>
                      <li>
                        <a href="#">Pedidos Pendientes</a>
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
                        <a href="#">General</a>
                      </li>
                      <li>
                        <a href="#">Panels</a>
                      </li>
                      <li>
                        <a href="#">Tables</a>
                      </li>
                      <li>
                        <a href="#">Icons</a>
                      </li>
                      <li>
                        <a href="#">Forms</a>
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
                        <a href="#">Pie chart</a>
                      </li>
                      <li>
                        <a href="#">Line chart</a>
                      </li>
                      <li>
                        <a href="#">Bar chart</a>
                      </li>
                      <li>
                        <a href="#">Histogram</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Mensajes</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Bandeja de entrada</a>
                      </li>
                      <li>
                        <a href="#">Enviados</a>
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
          <div class="container-fluid">
           
           
          </div>
          
        </main>
        <!-- page-content" -->
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
  </body>
</html>
