<?php
session_start(); // Iniciamos una session o reanudamos la session
?>
    <!DOCTYPE html>
    <html>
    <title> USED Rodrigo Gutierrez</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/DAW204/public_html/estilos2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
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
                        <?php
    if (isset($_POST['Salir'])){//Si se pulsa el boton de salir se destruye la sesion del usuario y se redirige a index.php 
        unset($_SESSION['usuario']); 
        session_destroy(); 
        header("Location: ../index.php");
    }
    ?>
                            <a href="../index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/005-casa.png"/>Inicio</a>
                            <a href="#index" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Index</a>
                            <a href="#modelo" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Modelo</a>
                            <a href="#controlador" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Controlador</a>
                            <a href="#vista" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Vista</a>
                            <a href="#libreria" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Libreria</a>
                            <a href="#configuracion" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/007-codificacion.png"/>Configuración</a>
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
                <h1 class="w3-xxxlarge"><b>Rodrigo Web</b></h1>
            </div>
            
            //////////////////////////////
            <div class="w3-container" id="index" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>index.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../index.php'); ?>
                </p>
            </div>
            <h1 class="w3-xxxlarge w3-text-red" id="modelo"><b>Modelo</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
            <div class="w3-container" id="usuario" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>Usuario.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../model/Usuario.php'); ?>
                </p>
            </div>
            <div class="w3-container" id="UsuarioPDO" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>UsuarioPDO.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../model/UsuarioPDO.php'); ?>
                </p>
            </div>
            <div class="w3-container" id="DBPDO" tyle="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>DBPDO.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../model/DBPDO.php'); ?>
                </p>
            </div>
            <h1 class="w3-xxxlarge w3-text-red" id="controlador"><b>Controlador</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">

            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>clogin.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../controller/clogin.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>cinicio.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../controller/cinicio.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>cregistro.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../controller/cregistro.php'); ?>
                </p>
            </div>
            <h1 class="w3-xxxlarge w3-text-red" id="vista"><b>Vista</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>layout.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../view/layout.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>vlogin.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../view/vlogin.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>vinicio.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../view/vinicio.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>vregistro.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../view/vregistro.php'); ?>
                </p>
            </div>
            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red" id="libreria"><b>FuncionesValidación.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../core/FuncionesValidacion.php'); ?>
                </p>
            </div>
            <h1 class="w3-xxxlarge w3-text-red" id="configuracion"><b>Configuración</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">

            <div class="w3-container" style="margin-top:75px; overflow: auto;">
                <h1 class="w3-xxxlarge w3-text-red"><b>constDB.php</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>
                    <?php highlight_file('../config/constDB.php'); ?>
                </p>
            </div>
        ////////////////////////////
        </div>
        <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
            <p class="w3-right">Powered by <a href="/DAW204/public_html/index.php" title="Autor" target="_blank" class="w3-hover-opacity">Rodrigo Gutierrez</a></p>
            <p class="w3-half w3-right"><a href="#" class="w3-left w3-hover-opacity w3-margin-right">Repositorio</a><a href="#" class="w3-left w3-hover-opacity w3-margin-right">PHPDOC</a><a href="#" class="w3-left w3-hover-opacity w3-margin-right">Tecnologias</a></p>
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
