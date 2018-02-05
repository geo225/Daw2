<div class="w3-container" id="contact" style="margin-top:75px;">
    <h1 class="w3-xxlarge"><b>Bienvenido</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>
        Bienvenido <?php echo $_SESSION['usuario']->getCodUsuario(); ?>
    </p>
    <p>
        Permisos <?php echo $_SESSION['usuario']->getPerfil(); ?>
    </p>
    <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post"> 
      <input type="submit" name="Salir" value="Cerrar sesión">
    </form>
</div>