<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: ../");
    }

    if(isset($_SESSION['bloqueo'])){
        header("Location: blockscreen.php");
    }
    extract($_GET);
    include("../modulos/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
    Item Name: Materialize - Material Design Admin Template
    Version: 2.1
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Ventas e Inventario</title>

    <!--<script type="text/javascript">
        setTimeout(cerrarSesion,5000);

        function cerrarSesion(){
            alert("Sesion bloqueada por inactividad.");
            location.href = "blockscreen.php";
        }
    </script>-->
    <style type="text/css">
        .bg-lineas-diagonales{
            background-image: url("../images/fondolineal.jpg");
            background-size: 13%;
        }

        .bck{
            color: #fff;
            font-size: 17px;
            font-weight: bold;
            border: 2px dotted #000;
            padding: 0px 5px;
            text-align: center;
        }

        input:read-only{
            background-image: url('../images/lock.png') !important;
            background-repeat: no-repeat;
            background-size: 7px 8px;
            background-position: left bottom;
            color: #000 !important;
        }
    </style>

    <!-- Favicons-->
    <link rel="icon" href="../images/favicon.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="../css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">    
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="../css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
    


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../css/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="../font/font-awesome-4.7.0/css/font-awesome.css"/>


</head>

<body class="bg-lineas-diagonales">


    <!-- Start Page Loading
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="white">
                <div class="nav-wrapper">                    
                    
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="#home/" onclick="cargar('home/')" class="brand-logo darken-1"><img src="../images/logo-sofpos-c.png" style="margin-top:5px;margin-left:10px;" alt="SOFPOS"></a> <span class="logo-text">SOFPOS</span></h1></li>
                    </ul>                    
                    <ul class="right hide-on-med-and-down #ffa726 orange lighten-1">                        
                        <!--<li title="Pantalla Completa"><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>-->
                        <li title="Cerrar Sesi&oacute;n"><a onclick="logout()" class="#d32f2f red darken-2 waves-effect waves-block waves-light"><i class="mdi-action-settings-power"></i></a>
                        </li>
                    </ul>                    
                    <ul class="right cyan-text">
                        <li>Versi&oacute;n: 1.0&nbsp;&nbsp;&nbsp;</li>
                    </ul>
                </div>
            </nav>
            <!-- HORIZONTL NAV START-->
            <nav id="horizontal-nav" class="white hide-on-med-and-down">
                <div class="nav-wrapper">                  
                  <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li>
                        <a href="#home/" onclick="cargar('home/')" class="cyan-text">
                            <i class="mdi-action-store"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu #81c784 green lighten-2" href="#!" data-activates="sales">
                            <i class="mdi-action-assignment"></i>
                            <span>Ventas<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="sales" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="" class="cyan-text">Punto de Venta</a></li>
                            <li><a href="" class="cyan-text">Movimientos de venta</a></li>
                            <li><a href="" class="cyan-text">Cuentas por cobrar</a></li>
                            <li><a href="" class="cyan-text">Cartera castigada</a></li>
                            <li><a href="" class="cyan-text">Devoluciones</a></li>
                            <li><a href="" class="cyan-text">Ventas abiertas</a></li>
                        </ul>
                    </li>   
                    <li>
                        <a class="dropdown-menu #4fc3f7 light-blue lighten-2" href="#!" data-activates="purchases">
                            <i class="mdi-action-add-shopping-cart"></i>
                            <span>Compras<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="purchases" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="" class="cyan-text">Nueva compra</a></li>
                            <li><a href="" class="cyan-text">Movimientos de compra</a></li>
                            <li><a href="" class="cyan-text">Cuentas por pagar</a></li>
                            <li><a href="" class="cyan-text">Devoluciones</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-menu #ffca28 amber darken-1" href="#inventory/" onclick="cargar('inventory/')" data-activates="inventory">
                            <i class="mdi-action-wallet-travel"></i>
                            <span>Inventario<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="inventory" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="#inventory/products/view/" onclick="cargar('inventory/products/view/')" class="cyan-text">Productos</a></li>
                            <li><a href="" class="cyan-text">Kardex</a></li>
                            <li><a href="#inventory/in-output" onclick="cargar('inventory/in-output')" class="cyan-text">Entradas / Salidas (Ajuste)</a></li>
                            <li><a href="#inventory/groupsandbrands/" onclick="cargar('inventory/groupsandbrands/')" class="cyan-text">Grupos y Marcas</a></li>
                            <li><a href="" class="cyan-text">Transformaciones</a></li>
                            <li><a href="" class="cyan-text">Mov. Entradas/Salidas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-menu #ab47bc purple lighten-1" href="#!" data-activates="box">
                            <i class="mdi-editor-attach-money"></i>
                            <span>Caja<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="box" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="" class="cyan-text">Cortes de Caja</a></li>
                            <li><a href="" class="cyan-text">Ingresos / Egresos</a></li>
                            <li><a href="" class="cyan-text">Conceptos I/E</a></li>
                            <li><a href="" class="cyan-text">Bancos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-menu #ff7043 deep-orange lighten-1" href="#!" data-activates="reports">
                            <i class="mdi-image-style"></i>
                            <span>Informes<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="reports" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="" class="cyan-text">Informes de Inventario</a></li>
                            <li><a href="" class="cyan-text">Informes de Ventas</a></li>
                            <li><a href="" class="cyan-text">Informes de Compras</a></li>
                            <li><a href="" class="cyan-text">Informes de Caja</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-menu #d4e157 lime lighten-1" href="#!" data-activates="accounting">
                            <i class="mdi-action-class"></i>
                            <span>Contabilidad<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                       <ul id="accounting" class="dropdown-content dropdown-horizontal-list">
                            
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-menu #8d6e63 brown lighten-1" href="#!" data-activates="treasury">
                            <i class="mdi-action-trending-up"></i>
                            <span>Tesorer&iacute;a<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                       <ul id="treasury" class="dropdown-content dropdown-horizontal-list">
                            
                        </ul>
                    </li> 
                    <li>
                        <a class="dropdown-menu #5c6bc0 indigo lighten-1" href="#!" data-activates="settings">
                            <i class="mdi-action-settings"></i>
                            <span>Configuraci&oacute;n<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                        <ul id="settings" class="dropdown-content dropdown-horizontal-list">
                            <li><a href="" class="cyan-text">Datos de la empresa</a></li>
                            <li><a href="" class="cyan-text">Factura personalizada</a></li>
                            <li><a href="" class="cyan-text">Usuarios sistema</a></li>
                            <li><a href="" class="cyan-text">Terceros</a></li>
                            <li><a href="" class="cyan-text">Copias de seguridad</a></li>
                            <li><a href="" class="cyan-text">Saldos Iniciales</a></li>
                        </ul>
                    </li>                              
                  </ul>
                </div>
              </nav>
        </div>
        <!-- end header nav-->
  </header>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav leftside-navigation ps-container ps-active-y" style="left: -250px; height: 658px;">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="../images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                            </li>
                            <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
            </li>
            <li class="bold"><a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> CSS</a>
                        <div class="collapsible-body" style="display: block;">
                            <ul>
                                <li><a href="css-typography.html">Typography</a>
                                </li>      
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 598px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 305px;"></div></div></ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
      </aside>
            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <section id="content">
                <div class="container vistas">

                </div>
            </section>

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="../js/plugins.js"></script>
    

    <script type="text/javascript">
        var URLactual = window.location.href;
        var res = URLactual.split("#");

        function cargar(ruta){
            $.ajax({
                url: ruta,
                type:'HEAD',
                error: function(){
                    location.href = "404.html";
                },
                success: function(){
                    $(".vistas").load(ruta);
                }
            });         
        }

        if(res[1]=='!'){
            cargar("home/");
        }else{
            cargar(res[1]); 
        }

        function logout(){
            if(confirm("Desea cerrar la sesión?")){
                window.location.href = "logout.php";
                return false;
            }
        }

        $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
        });
    </script>  

</body>

</html>