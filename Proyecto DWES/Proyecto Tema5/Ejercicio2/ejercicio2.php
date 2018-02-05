<?php
if (!isset($_SERVER['PHP_AUTH_USER'])){
			header('WWW-Authenticate: Basic realm="rodrigo"');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Se ha cancelado el login o es incorrecto';
			exit;}else{
				require 'config.php';
		$login=false;
		$usuario= $_SERVER['PHP_AUTH_USER'];
		$passwd=hash('sha256',$_SERVER['PHP_AUTH_PW']);
		try{
			$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$consulta = "SELECT * from Usuarios where Usuario=:user and Password=:pass"; 
			$consulta = $conn->prepare($consulta);
			$consulta->bindParam(':user', $usuario);
			$consulta->bindParam(':pass', $passwd);
			$consulta->execute();
			if($consulta->rowCount()!=0){
					$login=true;
				}
					
		}catch (PDOException $e){
			header('WWW-Authenticate: Basic realm="rodrigo"');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Se ha cancelado el login o es incorrecto';
			exit;
		}finally{
			unset($conn);
		}
			}
?>
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
    <h3 class="w3-padding-64"><b>Tema 5<br/>Ejercicio 2</b></h3>
  </div>
  <div class="w3-bar-block">
	<a href="codEjercicio2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/007-codificacion.png"/>Codigo</a>   
	<a href="../tema5.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/006-flecha-atras.png"/>volver</a>
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
    <h1 class="w3-jumbo"><b>Ejercicio2</b></h1>
  </div>
		<div class="w3-container" id="contact" style="margin-top:75px;">
		<!--Codigo PhP -->
		<?php 
		if ($login){
			session_start();
			setcookie("fecha",date("j, n, Y, g:i a"),time()+3600);
			$_SESSION['usuario']  = $_SERVER['PHP_AUTH_USER'];
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
				if (!empty($_COOKIE["fecha"])){
					echo '<br/> Ultima conexion '.$_COOKIE['fecha'];
				}
				session_destroy();
				unset($_COOKIE['PHPSESSID']);
		}else{
			header('WWW-Authenticate: Basic realm="rodrigo"');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Se ha cancelado el login o es incorrecto';
			exit;
		}
		?>
		</div>
</div>
 
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
