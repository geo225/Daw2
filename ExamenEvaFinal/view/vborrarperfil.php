<div class="container w3-light-grey" style="width:90%">
    <div class="row">
        <h1 class="r-blanco col-sm-12 col-md-12 col-lg-12"><b>Borrar Perfil</b></h1>
    <p class="r-verde col-sm-12 col-md-12 col-lg-12"> Estas Seguro de borrar el Perfil:</p>
    <div class="col-sm-2 col-md-2 col-lg-2"></div>
    <form class="form-vertical col-sm-8 col-md-8 col-lg-8" id="formulario" name="FormularioEditar" action="index.php?pagina=borrarperfil" method="post">
        <div class="form-group">
            <label for="usuario" class="r-verde col-sm-12 col-md-12 col-lg-12 control-label">CodUsusario</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input class="w3-input w3-border form-control" type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?> " disabled>
            </div>
        </div>
        <div class="form-group ">
            <button name="enviarBorrar" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="si">Si</button>
            <button name="enviarBorrar" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="no">No</button>
        </div>
    </form>
    <?php echo '<span class="w3-bar w3-text-red">'. $errorBorrar .'</span>'; ?>
    </div>
</div>
