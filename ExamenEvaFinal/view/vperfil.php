<div class="container" style="width:90%">
    <div class="row">
            <h1 class="col-sm-12 col-md-12 col-lg-12" style="color:white;"><b>Perfil</b></h1>
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
    <form class="form-horizontal col-sm-8 col-md-8 col-lg-8" id="formulario" name="FormularioEditar" action="index.php?pagina=perfil" method="post">
        <div class="form-group">
            <label for="usuario" class="col-sm-12 col-md-12 col-lg-12 control-label" style="color:#44d62c;">CodUsusario</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
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
            <label for="descUsuario" class="col-sm-12 col-md-12 col-lg-12  control-label" style="color:#44d62c;">DescUsuario<span style="color:red;"><?php echo $mensajeError['errorDescUsuario'];?></span></label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input class="form-control " type="text" name="descUsuario" id="descUsuario" value="<?php if(isset($_POST['enviarEditar'])){ echo $_POST['descUsuario'];}else{ echo $_SESSION['usuario']->getDescUsuario(); }?>">
            </div>
        </div>
        <div class="form-group
        <?php if(isset($_POST['enviarEditar'])){
            if(!empty($mensajeError['errorPassword'])){
                echo " has-error";
            }
        }?>">
            <label for="password" class="col-sm-12 col-md-12 col-lg-12 control-label" style="color:#44d62c;">Nueva Contraseña<br/>
            <span style="color:red;"><?php echo $mensajeError['errorPassword'];?></span>
            </label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input class="form-control" type="password" name="password" id="password">
            </div>
        </div>
        <div class="form-group ">
            <label for="perfil" class="col-sm-4 col-md-4 col-lg-4 control-label" style="color:#44d62c;">Perfil</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input class="form-control" type="text" name="perfil" id="perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?> " disabled>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-sm-4 col-md-4 col-lg-4"></div>
            <button name="enviarEditar" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="login">Cambiar</button>
        </div>
    </form>
    <?php echo '<span style="color:red;">'. $errorEditar .'</span>'; ?>
    </div>
</div>
