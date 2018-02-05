<div class="container w3-light-grey" style="width:90%">
    <div class="row">
            <h1 class="w3-xxxlarge w3-text-red "><b>Editar Departamento</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round ">
    </div>
    <form class="form-horizontal" id="formulario" name="FormularioEditar" action="index.php?pagina=editardepartamento&Departamento=<?php echo $_GET['Departamento'];?>" method="post">
        <div class="form-group">
            <label for="departamento" class="col-sm-4 col-md-4 col-lg-4 control-label">CodUsusario</label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="departamento" id="departmaneto" value="<?php echo $departamento->getCodDepartamento(); ?> " disabled>
            </div>
        </div>
        <div class="form-group<?php if(isset($_POST['enviarEditar'])){  
            if(!empty($mensajeError['errorDescUsuario'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="descDepartamento" class="col-sm-4 col-md-4 col-lg-4  control-label">DescDepartamento <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorDescDepartamento'];?></span></label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control " type="text" name="descDepartamento" id="descDepartamento" value="<?php if(isset($_POST['enviarEditar'])){ echo $_POST['descDepartamento'];}else{ echo $departamento->getDescDepartamento(); }?> ">
            </div>
        </div>
        <div class="form-group 
        <?php if(isset($_POST['enviarEditar'])){  
            if(!empty($mensajeError['errorCapacidad'])){
                echo " has-error";
            }else{
                echo " has-success";
            }
        }?>">
            <label for="capacidad" class="col-sm-4 col-md-4 col-lg-4 control-label">Capacidad<br/>
            <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorCapacidad'];?></span>
            </label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border w3-margin-bottom form-control" type="text" name="capacidad" id="capacidad" value="<?php if(isset($_POST['enviarEditar'])){ echo $_POST['capacidad'];}else{ echo $departamento->getCapacidad(); }?> ">
            </div>
        </div>
        <div class="form-group ">
            <label for="creador" class="col-sm-4 col-md-4 col-lg-4 control-label">Creador</label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border w3-margin-bottom form-control" type="text" name="creador" id="creador" value="<?php echo $departamento->getCreador(); ?> " disabled>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-sm-4 col-md-4 col-lg-4"></div>
            <button name="enviarEditar" type="submit" class="btn w3-button w3-red w3-margin-bottom " value="login">Cambiar</button>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorEditar .'</span>'; ?>
</div>
