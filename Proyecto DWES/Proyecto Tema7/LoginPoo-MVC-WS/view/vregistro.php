<div class="container w3-light-grey " style="width:90%">
    <div class="row">
        <h1 class="w3-xxxlarge w3-text-red"><b>Registro</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>
    <form class="form-horizontal" id="formulario" name="FormularioReg" action="<?PHP echo " index.php?pagina=registro " ?>" method="post">
        <div class="form-group<?php if(isset($_POST['enviarReg'])){  
            if(!empty($mensajeError['errorUsuario']) || !empty($mensajeError['errorUsuarioDuplicado'])){
                echo " has-feedback has-error";
            }else{
                echo " has-feedback has-success";
            }
        }?>">
            <label for="usuario" class="col-sm-4 col-md-4 col-lg-4 control-label">ID Ususario<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorUsuario']; echo $mensajeError['errorUsuarioDuplicado'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>">
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarReg'])){  
            if(!empty($mensajeError['errorPassword'])){
                echo " has-feedback has-error";
            }
        }?>">

            <label for="password" class="col-sm-4 col-md-4 col-lg-4 control-label">Contraseña <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorPassword'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="password" name="password" id="password">
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarReg'])){  
            if(!empty($mensajeError['errorDuplicado'])){
                echo " has-feedback has-error";
            }
        }?>">
            <label for="password2" class="col-sm-4 col-md-4 col-lg-4 control-label">Repita Contraseña <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorDuplicado'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="password" name="password2" id="password2">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8 col-sm-10 col-md-8 col-lg-7"></div>
            <button name="enviarReg" type="submit" class="btn w3-button w3-red w3-margin-bottom " value="enviarRegistro">Registrar</button>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorRegistro .'</span>'; ?>
</div>
