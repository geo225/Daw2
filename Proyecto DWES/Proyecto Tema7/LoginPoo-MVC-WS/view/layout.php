<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/DAW204/public_html/estilos2.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Poppins", sans-serif
    }

    body {
        font-size: 16px;
    }

    .w3-half img {
        margin-bottom: -6px;
        margin-top: 16px;
        opacity: 0.8;
        cursor: pointer
    }

    .w3-half img:hover {
        opacity: 1
    }

</style>

<body>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64"><b>Tema 7<br/>Rodrigo Web</b></h3>
        </div>
        <div class="w3-bar-block">
            <?php
      if (isset($_SESSION['usuario'])){ //Comprobamos si esta iniciada la sesion de usuario
        ?>
                <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <img src="/DAW204/public_html/Images/006-flecha-atras.png" /> <input class="w3-half-item w3-button w3-hover-white" type="submit" name="Salir" value="Cerrar sesión">
                </form>
                <?php
    }
    ?>
                    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/005-casa.png"/>Inicio</a>
                    <?php
      if (isset($_GET['pagina']) && $_GET["pagina"]=="codigo"){ 
        ?>
                        <a href="#index" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Index</a>
                        <a href="#modelo" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Modelo</a>
                        <a href="#controlador" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Controlador</a>
                        <a href="#vista" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Vista</a>
                        <a href="#libreria" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Libreria</a>
                        <a href="#configuracion" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Configuración</a>
                        <?php
    }else{
    ?>
                            <a href="index.php?pagina=codigo" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/007-codificacion.png"/>Codigo</a>
                            <?php
        if (isset($_SESSION['usuario'])){ //Comprobamos si esta iniciada la sesion de usuario
            if(isset($_GET['pagina']) && $_GET["pagina"]=="perfil"){
                ?>
                                <a href="index.php?pagina=borrarperfil" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/010-par-de-ruedas-de-engranaje.png">Borrar Perfil</a>
                                <?php    
            }else{
                ?>
                                <a href="index.php?pagina=perfil" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/008-usuario.png">Perfil</a>
                                <?php
            }
            if(isset($_GET['pagina']) && $_GET["pagina"]=="departamento"){
            ?>

                                    <a href="index.php?pagina=nuevodepartamento" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/009-departamento.png">New Departamento</a>
                                    <?php
            }else{
                ?>
                                        <a href="index.php?pagina=departamento" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/009-departamento.png">Departamento</a>
                                        <?php
            }
            ?>
                                            <a href="index.php?pagina=soap" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/013-Soap.png">WS SOAP</a>
                                            <a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!=" inicio " && $_GET['pagina']!="login "){ echo "index.php?pagina=rest&ant=".$_GET['pagina']; }else { echo " index.php?pagina=rest "; } ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/012-apiRest.png">WS REST</a>
                                            <a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!=" inicio " && $_GET['pagina']!="login "){ echo "index.php?pagina=WIP&ant=".$_GET['pagina']; }else { echo " index.php?pagina=WIP "; } ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/011-encuesta.png">Encuesta</a>
                                            <a href="../../../Proyecto DWEC/index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/016-carrito-de-la-compra-de-tienda.png">Tienda</a>
                                            <?php
        }
    }
    ?>
        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
        <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
        <span>Tema 7</span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1 class="w3-jumbo"><b>Rodrigo Web</b></h1>
        </div>
        <?php 
        if (isset($_GET['pagina']) && isset($vistas[$_GET["pagina"]])){ 
            require_once $vistas[$_GET["pagina"]]; 
        }else{ 
            echo "<p>Lo sentimos, hubo un error</p>"; 
        } 
    ?>
        <!-- End page content -->
    </div>

    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
        <p class="w3-right">Powered by <a href="/DAW204/public_html/index.php" title="Autor" target="_blank" class="w3-hover-opacity">Rodrigo Gutierrez</a></p>
        <p class="w3-half w3-right"><a href="http://daw-usgit.sauces.local/rodrigo225/DWES/tree/master/Proyecto%20DWES/Proyecto%20Tema7/LoginPoo-MVC-WS" class="w3-left w3-hover-opacity w3-margin-right" target="_blank">Repositorio</a><a href="doc/LoginMVCDoc/html/index.html" class="w3-left w3-hover-opacity w3-margin-right" target="_blank">PHPDOC</a><a href="<?php if (isset($_GET['pagina']) && $_GET['pagina']!=" inicio " && $_GET['pagina']!="login "){ echo "index.php?pagina=tecnologias&ant=".$_GET['pagina']; }else { echo " index.php?pagina=tecnologias "; } ?>" class="w3-left w3-hover-opacity w3-margin-right">Tecnologias</a></p>
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

    </script>

</body>

</html>
