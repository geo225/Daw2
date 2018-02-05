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
    <h3 class="w3-padding-64"><b>Tema 5<br/>Mantenimiento Usuarios</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="manUsuarios.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/pagina-de-inicio.png"/>Inicio</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/005-anadir.png"/> Nuevo</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/004-importacion.png"/> Importar</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/003-flecha-de-exportacion.png"/> Exportar</	
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
    <h1 class="w3-xxxlarge"><b>Departamentos</b></h1>
  </div>
  <!-- Codigo PhP -->
<?php
    if (isset($_POST['enviarFormulario'])){
		if ($_POST['enviarFormulario']=="Si"){
			try { 
				require "config.php";
				//Creamos el objeto PDO para conectar a la base de datos. 
				$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password); 
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				$usuario=$_GET['usuario'];
				$consulta=$conn->prepare("DELETE FROM Usuarios where Usuario=:user;");
				//Utilizamos el bindParam() para decirle el valor de los parametros. 
				$consulta->bindParam(":user",$usuario); 
				$consulta->execute(); 
				unset($conexion); 
				echo "Usuario Borrado";
				echo "<br/>Se le redireccionará a la pagina de inicio en 1 segundos";		
				echo '<script type="text/javascript">
						function redireccionar(){
							window.location="manUsuarios.php";
						} 
						setTimeout ("redireccionar()", 1000);
						</script>';

			}catch (PDOException $e) { 
				unset($conn);
				print "¡Error!: " . $e->getMessage(); 
                die();
				echo "<br/>Se le redireccionará a la pagina de inicio en 3 segundos";
				echo 	'<script type="text/javascript">
							function redireccionar(){
							window.location="manUsuarios.php";
						} 
						setTimeout ("redireccionar()", 3000);
						</script>';	   
			}
		}else{
			echo 	'<script type="text/javascript">
							function redireccionar(){
							window.location="manUsu.php";
						} 
						setTimeout ("redireccionar()", 0000);
						</script>';	
		}		
	}else{?>
	<div class="w3-container" id="contact" style="margin-top:75px;">
							<h1 class="w3-large w3-text-red"><b>Borrar</b></h1>
							<hr style="width:50px;border:5px solid red" class="w3-round">
							<p> ¿Estas seguro de borrar el Usuario? </p>
							<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF'].'?usuario='.$_GET['usuario']; ?>" method="post">
								<div class="w3-section">
									<label class="w3-col">Usuario</label>
									<input class="w3-input w3-border w3-half w3-margin-left" type="text" name="codDepartamento" readonly value="<?php echo $_GET['usuario']; ?>" ><span class="w3-half"></span>									
								</div>
								<button name="enviarFormulario" type="submit" class="w3-button w3-third w3-red w3-margin-bottom w3-margin-top w3-margin-left" value="Si">SI</button>
								<button name="enviarFormulario" type="submit" class="w3-button w3-third w3-red w3-margin-bottom w3-margin-top w3-margin-left" value="No">No</button>
							</form>
						</div>
	<?php
	}?>
</div>	
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