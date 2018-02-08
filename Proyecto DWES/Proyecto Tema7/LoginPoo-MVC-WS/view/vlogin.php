<!-- Formulario -->
<div class="w3-container w3-bar" id="contact" >
    <div class="w3-container w3-quarter" style="margin-top:75px;">
    <h1 class="w3-xxxlarge w3-text-red"><b>Inicio</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>
    <div class="w3-section w3-quarter container-fluid w3-right w3-light-grey" >
        <h1 class="w3-xlarge w3-text-red"><b>Login</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <form id="formulario" class="form-horizontal" name="FormularioLogin" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" style="width:90%; margin:auto;" method="post">
            <div class="form-group <?php if(isset($_POST['enviarLogin'])){  
            if(!empty($mensajeError['errorUsuario'])){
                echo " has-error ";
            }else{
                echo " has-success ";
            }
        }?>">
                <label for="usuario" class="control-label">ID Ususario<span class="w3-text-red"><?php echo "  ".$mensajeError['errorUsuario'];?></span></label>
                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>">
            </div>
            <div class="form-group <?php if(isset($_POST['enviarLogin'])){  
            if(!empty($mensajeError['errorPassword'])){
                echo " has-error ";
            }
        }?>">
                <label for="password" class="control-label">Contraseña <span class="w3-text-red"><?php echo "  ".$mensajeError['errorPassword'];?></span></label>
                <input class="w3-input w3-border form-control" type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <button name="enviarLogin" type="submit" class="btn w3-button w3-red w3-margin-bottom " value="login">Acceder</button>
                <form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button name="enviarRegistro" type="submit" class="btn w3-button w3-red w3-margin-bottom w3-right " value="Registro">Registro</button>
                </form>
            </div>
        </form>
        <?php echo '<span class="w3-bar w3-text-red">'. $errorLogin .'</span>'; ?>
    </div>
</div>
<div class="container-fluid">
  <h1 class="w3-xlarge w3-text-red"><b>Diagramas</b></h1>
  <hr style="width:50px;border:5px solid red" class="w3-round">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <!--<li data-target="#myCarousel" data-slide-to="4"></li>-->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
          <div class="carousel-caption">
          <h3>Diagrama de Ficheros</h3>
        </div>
        <img class="w3-text-aling-center" src="webroot/media/img/diagramaFicheros.PNG" alt="Diagrama de Ficharos" style="width:100%; height:800px;">
        
      </div>

      <div class="item">
          <div class="carousel-caption">
          <h3  class="w3-text-black">Diagrama de Clases</h3>
        </div>
        <img src="webroot/media/img/diagramaMVCLogin.PNG" alt="Diagrama de Clases" style="width:100%;height:800px;">     
      </div> 
    
      <div class="item">
          <div class="carousel-caption">
          <h3 class="w3-text-black">Arbol de Navegacion</h3>
        </div>
        <img src="webroot/media/img/arbolnavegacionMVC.PNG" alt="Arbol de Navegacion" style="width:100%;height:800px;"> 
      </div>
      <div class="item">
        <img src="webroot/media/img/ModeloFisicoDatosMVC.PNG" alt="Modelo fisico de Datos" style="width:100%;height:800px;">
        <div class="carousel-caption">
          <h3 class="w3-text-black">Modelo Fisico de Datos</h3>
        </div>
      </div>
      <!--<div class="item">
        <img src="" alt="Diagrama de casos de uso" style="width:100%;height:800px;">
        <div class="carousel-caption">
          <h3>Diagrama de casos de uso</h3>
        </div>
      </div>-->
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    <div class="w3-section w3-half w3-right">
        <h1 class="w3-xlarge w3-text-red"><b>Pagina en la que me baso</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <a href="https://www.w3schools.com/w3css/tryw3css_templates_interior_design.htm" target="_blank"class="btn btn-danger">Link</a>
    </div>
</div>

