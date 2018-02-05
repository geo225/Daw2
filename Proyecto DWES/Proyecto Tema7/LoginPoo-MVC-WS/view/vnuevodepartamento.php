<div class="container">
    <div class="row">
        <h1 class="w3-xxxlarge w3-text-red"><b>Registro</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>
    <form class="form-horizontal" id="formulario" name="FormularioReg" action="<?PHP echo " index.php?pagina=nuevodepartamento " ?>" method="post">
        <div class="form-group<?php if(isset($_POST['enviarDepartamento'])){  
            if(!empty($mensajeError['errorCodDepartamento']) || !empty($mensajeError['errorCodDepartamentoDuplicado'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="codDepartamento" class="col-sm-4 col-md-4 col-lg-4 control-label">Codigo Departamento<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorCodDepartamento']; echo $mensajeError['errorCodDepartamentoDuplicado']; ?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="codDepartamento" id="codDepartamento" value="<?php if(isset($_POST['codDepartamento'])){ echo $_POST['codDepartamento'];} ?>">
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarDepartamento'])){  
            if(!empty($mensajeError['errorDescDepartamento'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="descDepartamento" class="col-sm-4 col-md-4 col-lg-4 control-label">Descripcion Departamento<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorDescDepartamento'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="descDepartamento" id="descDepartamento" value="<?php if(isset($_POST['descDepartamento'])){ echo $_POST['descDepartamento'];} ?>">
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarDepartamento'])){  
            if(!empty($mensajeError['errorCapacidad'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="capacidad" class="col-sm-4 col-md-4 col-lg-4 control-label">Capacidad Departamento<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorCapacidad'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="capacidad" id="capacidad" value="<?php if(isset($_POST['capacidad'])){ echo $_POST['capacidad'];} ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 col-md-4 col-lg-4"></div>
            <button name="enviarDepartamento" type="submit" class="btn w3-button w3-red w3-margin-bottom " value="enviarDepartamento">Crear</button>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorRegistro .'</span>'; ?>
</div>
