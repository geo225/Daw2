<div class="container" style="width:90%">
    <div class="row">
        <h1 class="col-sm-12 col-md-12 col-lg-12"><b style="color:white;">Registro</b></h1>
        <div class="col-sm-3 col-md-3 col-lg-3"></div>
        <form class="form-horizontal col-sm-6 col-md-6 col-lg-6" id="formulario" name="FormularioReg" action="<?PHP echo " index.php?pagina=registro " ?>" method="post">
            <div class="form-group<?php if(isset($_POST['enviarReg'])){
            if(!empty($mensajeError['errorUsuario']) || !empty($mensajeError['errorUsuarioDuplicado'])){
                echo " has-feedback has-error ";
            }else{
                echo " has-feedback has-success ";
            }
        }?>">
                <label for="usuario" class="col-sm-12 col-md-12 col-lg-12 align-self-center control-label" style="color:#44d62c;">ID Ususario <span style="color:red;"><?php echo $mensajeError['errorUsuario']; echo $mensajeError['errorUsuarioDuplicado'];?></span></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>">
                </div>
            </div>
            <div class="form-group<?php if(isset($_POST['enviarReg'])){
            if(!empty($mensajeError['errorPassword'])){
                echo " has-feedback has-error ";
            }
        }?>">

                <label for="password" class="col-sm-12 col-md-12 col-lg-12 align-self-center control-label" style="color:#44d62c;">Contraseña <span style="color:red;"><?php echo $mensajeError['errorPassword'];?></span></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input class="w3-input w3-border form-control" type="password" name="password" id="password">
                </div>
            </div>
            <div class="form-group<?php if(isset($_POST['enviarReg'])){
            if(!empty($mensajeError['errorDuplicado'])){
                echo " has-feedback has-error ";
            }
        }?>">
                <label for="password2" class="col-sm-12 col-md-12 col-lg-12 align-self-center control-label" style="color:#44d62c;">Repita Contraseña <span style="color:red;"><?php echo $mensajeError['errorDuplicado'];?></span></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input class="w3-input w3-border form-control" type="password" name="password2" id="password2">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8 col-sm-10 col-md-8 col-lg-7"></div>
                <button name="enviarReg" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="enviarRegistro">Registrar</button>
            </div>
        </form>
        <?php echo '<span style="color:#44d62c;">'. $errorRegistro .'</span>'; ?>
    </div>

</div>
