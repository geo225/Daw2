<!-- Formulario -->			
<div class="w3-container" id="contact" style="margin-top:75px;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Inicio</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
		<form id="formulario" name="FormularioLogin" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="w3-section w3-half">
            <label>ID Ususario<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorUsuario'];?></span></label>
            <input class="w3-input w3-border" type="text" name="usuario" id="usuario"value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>" >
            <label>Contraseña <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorPassword'];?></span></label>
            <input class="w3-input w3-border w3-margin-bottom" type="password" name="password" id="password" >    
            <button name="enviarLogin" type="submit" class="w3-button w3-red w3-margin-bottom " value="login">Acceder</button><br/>
			</div>      
        </form>
        <?php echo '<span class="w3-bar w3-text-red">'. $errorLogin .'</span>'; ?>
		</div>

