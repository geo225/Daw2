<div class="w3-container w3-light-grey" id="contact" style="margin-top:75px;">
    <h1 class="w3-xxlarge"><b>Bienvenido</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>
        Bienvenido
        <span class="w3-text-red"><?php echo $_SESSION['usuario']->getCodUsuario(); ?></span>
    </p>
    <p>
       Tu ultima conexion fue
       <span class="w3-text-red"><?php echo $_SESSION['usuario']->getUltimaConexion(); ?></span>
    </p>
    <p>    
       Tu numero de accesos es
       <span class="w3-text-red"><?php echo $_SESSION['usuario']->getContadorAccesos(); ?></span>
    </p>
    <p>
        Permisos
        <span class="w3-text-red"><?php echo $_SESSION['usuario']->getPerfil(); ?></span>
    </p>
</div>
