<div class="container w3-light-grey" style="width:90%">
    <div class="row">
        <h1 class="w3-xxxlarge w3-text-red "><b>Borrar Departamento</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round ">
    </div>
    <p> Estas Seguro de borrar el Departamento:</p>
    <form class="form-horizontal" id="formulario" name="FormularioEditar" action="index.php?pagina=borrardepartamento&Departamento=<?php echo $_GET['Departamento'];?>" method="post">
        <div class="form-group">
            <label for="usuario" class="col-sm-4 col-md-4 col-lg-4 control-label">CodDepartamento</label>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php echo $departamento->getCodDepartamento(); ?> " disabled>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
           <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">  
            <button name="enviarBorrar" type="submit" class="btn w3-button w3-red" value="si">Si</button>
            </div>
            <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
            <button name="enviarBorrar" type="submit" class="btn w3-button w3-red" value="no">No</button>
            </div>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorBorrar .'</span>'; ?>