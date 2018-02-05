<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/DAW204/public_html/estilos2.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Tema 5<br/>Programa</b></h3>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 5</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo w3-half"><b>Programa</b></h1>
      <a class="w3-right w3-text-red" href="editar.php">Editar Usuario</a>
      <?php
      session_start();
      if ($_SESSION['perfil']=="Admin"){
         echo '<br/><a class="w3-right w3-text-red" href="manUsuarios.php">Mantenimiento Usuarios</a>'; 
      }?>
  </div>
		<div class="w3-container" id="contact" style="margin-top:75px;">
		<!--Codigo PhP -->
		<?php 
			if (isset($_POST['salir'])){
				session_destroy();
				echo "Saliendo";
			echo 	'<script type="text/javascript">
						function redireccionar(){
							window.location="login.php";
						} 
						setTimeout ("redireccionar()", 0000);
					</script>';	
			}elseif(isset($_POST['detalle'])){
			echo 	'<script type="text/javascript">
						function redireccionar(){
							window.location="detalle.php";
						} 
						setTimeout ("redireccionar()", 0);
					</script>';	    
            }
            elseif (!empty($_SESSION['usuario'])){
            if (isset($_SESSION['ultimaConexion' . $_SESSION['usuario']])) { 
                echo '<div>Bienvenido <span class="w3-text-red">' . $_SESSION['usuario'] . '</span> - Ultima conexion: <span class="w3-text-red">' . $_SESSION['ultimaConexion' . $_SESSION['usuario']] . "</span></div>"; 
            } 
            echo '<h1> $_SERVER </h1>';
				if (!empty($_SERVER)){
					foreach ($_SERVER as $clave => $valor){
						echo "{$clave} => {$valor}",'<br/> ';
					}		
				}else{
					echo '$_SERVER esta vacio <br/>';
				}
				echo '<h1> $_COOKIE </h1>';
				if(!empty($_COOKIE)){	
					foreach ($_COOKIE as $clave => $valor){
						echo "{$clave} => {$valor}",'<br/> ';
					}
				}else{
					echo '$_COOKIE esta vacio <br/>';
				}
				echo '<h1> $_SESSION </h1>';
				if(!empty($_SESSION)){ 
					foreach ($_SESSION as $clave => $valor){
						echo "{$clave} => {$valor}",'<br/> ';
					}
				}else{
					echo '$_SESSION esta vacio';
				}
		?>
		</div>
		<form id="formulario" name="Salir" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="w3-section w3-bar">
            <button name="detalle" type="submit" class="w3-button w3-red w3-margin-bottom  w3-margin-left w3-quarter " value="detalle">Detalle</button>
            <button name="salir" type="submit" class="w3-button w3-red w3-margin-bottom w3-right w3-margin-right w3-quarter " value="salir">Salir</button><br/>
			</div>      
        </form>
    
   <?php echo '<p><span class="w3-text-red">'.$_SESSION['usuario'].'</span> Identificado como: <span class="w3-text-red">'.$_SESSION['perfil']."</span>";
            }else{
                echo "Usuario no Autentificado";
			echo 	'<script type="text/javascript">
						function redireccionar(){
							window.location="login.php";
						} 
						setTimeout ("redireccionar()", 1000);
					</script>';	
            } ?>
 
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="#" title="W3.CSS" target="_blank" class="w3-hover-opacity">Rodrigo Gutierrez</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>

</body>
</html>
