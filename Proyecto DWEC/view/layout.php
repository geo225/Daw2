
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Tienda Rodrigo</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <style type="text/css">
        html {
            background-image: url("webroot/img/bg-tienda.jpg") repeat;
        }

        body {
            padding-top: 5rem;
            background: #000 url("webroot/img/bg-tienda.jpg") repeat;
        }

        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .row {
            background-color: #0d0d0d;
            box-shadow: 0px 0px 10px black;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .r-verde{
            color:#44d62c;
        }
        .r-blanco{
            color:white;
        }
        .r-negro{
            color:#0d0d0d;
        }
        .r-bg-negro{
            background-color:#0d0d0d;
        }
        img {
            width: 100%;
        }

        @media screen and (min-width: 768px) {
            img {
                width: 90%;
                margin: auto;
            }
        }

        @media screen and (min-width: 992px) {
            img {
                width: 80%;
                margin: auto;
            }
        }

        @media screen and (min-width: 1200px) {
            img {
                width: 70%;
                margin: auto;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#0d0d0d;">
        <h2 class="navbar-brand" style="color:#44d62c;">Tienda Rodrigo</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color:#44d62c;">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['usuario']) && isset($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pagina=carrito" style="color:#44d62c;">Carrito</a>
                </li>
                <?php } ?>
            </ul>
            <?php if (!isset($_SESSION['usuario'])){ ?>
            <ul class="navbar-nav" style="margin-right: 20px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#44d62c;width:150px;text-aling-right">Iniciar Sesion</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01" style="background-color:#0d0d0d;">
                        <form id="formulario1" class="form-horizontal" name="FormularioLogin" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" style="width:90%; margin:auto;" method="post">
                            <div class="form-group <?php if(isset($_POST['enviarLogin'])){
            if(!empty($mensajeError['errorUsuario'])){
                echo " has-error ";
            }else{
                echo " has-success ";
            }
        }?>">
                                <label for="usuario" class="control-label" style="color:#44d62c;">ID Ususario<span style="color:red;"><?php echo "  ".$mensajeError['errorUsuario'];?></span></label>
                                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>">
                            </div>
                            <div class="form-group <?php if(isset($_POST['enviarLogin'])){  
            if(!empty($mensajeError['errorPassword'])){
                echo " has-error ";
            }
        }?>">
                                <label for="password" class="control-label" style="color:#44d62c;">Contraseña <span style="color:red;"><?php echo "  ".$mensajeError['errorPassword'];?></span></label>
                                <input class="w3-input w3-border form-control" type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <button name="enviarLogin" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="login">Acceder</button>
                            </div>
                        </form>
                    </div>

                </li>
                <li>
                    <form id="formulario2" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button name="enviarRegistro" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Registro">Registro</button>
                    </form>
                </li>
            </ul>
            <?php }else{ ?>
            <ul class="navbar-nav" style="margin-right: 20px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#44d62c;text-aling-right">Perfil</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown02" style="background-color:#0d0d0d;">
                         <a class="nav-link" href="index.php?pagina=perfil" style="color:#44d62c;">Editar Perfil</a>
                          <a class="nav-link" href="index.php?pagina=borrarperfil" style="color:#44d62c;">Borrar Perfil</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="Salir" value="Cerrar sesión">
                    </form>
                </li>
            </ul>
            <?php }
             if (!isset($_GET['pagina']) || $_GET['pagina']=="inicio" || $_GET['pagina']=="login"){ ?>
            <form id="formulario3" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline my-2 my-lg-0">

                <input class="form-control mr-sm-2" type="text" placeholder="Buscar" name="buscar" id="busqueda">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="Busqueda">Buscar</button>
            </form>
            <?php } ?>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="starter-template">
            <?php 
        if (isset($_GET['pagina']) && isset($vistas[$_GET["pagina"]])){ 
            require_once $vistas[$_GET["pagina"]]; 
        }else{ 
            echo "<p>Lo sentimos, hubo un error</p>"; 
        } 
    ?>
        </div>
    </main>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>


<!--caracteristicas y imagenes separadas por , para guardar en la base de datos para hacer split-->
