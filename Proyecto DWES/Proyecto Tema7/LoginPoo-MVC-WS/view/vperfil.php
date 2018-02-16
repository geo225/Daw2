<div class="container w3-light-grey" style="width:90%">
    <div class="row">
            <h1 class="w3-xxxlarge w3-text-red "><b>Perfil</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round ">
    </div>
    <form class="form-horizontal" id="formulario" name="FormularioEditar" action="index.php?pagina=perfil" method="post">
        <div class="form-group">
            <label for="usuario" class="col-sm-4 col-md-4 col-lg-4 control-label">CodUsusario</label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?> " disabled>
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarEditar'])){  
            if(!empty($mensajeError['errorDescUsuario'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="descUsuario" class="col-sm-4 col-md-4 col-lg-4  control-label">DescUsuario<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorDescUsuario'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control " type="text" name="descUsuario" id="descUsuario" value="<?php if(isset($_POST['enviarEditar'])){ echo $_POST['descUsuario'];}else{ echo $_SESSION['usuario']->getDescUsuario();}?>">
            </div>
        </div>
        <div class="form-group 
        <?php if(isset($_POST['enviarEditar'])){  
            if(!empty($mensajeError['errorPassword'])){
                echo " has-error";
            }
        }?>">
            <label for="password" class="col-sm-4 col-md-4 col-lg-4 control-label">Nueva Contraseña<br/>
            <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorPassword'];?></span>
            </label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border w3-margin-bottom form-control" type="password" name="password" id="password">
            </div>
        </div>
        <div class="form-group ">
            <label for="perfil" class="col-sm-4 col-md-4 col-lg-4 control-label">Perfil</label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border w3-margin-bottom form-control" type="text" name="perfil" id="perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?> " disabled>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-sm-4 col-md-4 col-lg-4"></div>
            <button name="enviarEditar" type="submit" class="btn w3-button w3-red w3-margin-bottom " value="login">Cambiar</button>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorEditar .'</span>'; ?>
</div>
