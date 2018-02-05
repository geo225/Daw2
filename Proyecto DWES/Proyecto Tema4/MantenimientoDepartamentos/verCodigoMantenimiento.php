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
    <h3 class="w3-padding-64"><b>Tema 4<br/>Mantenimiento Departamentos</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/pagina-de-inicio.png"/>Inicio</a> 
    <a href="#index" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Index</a> 
	<a href="#nuevo" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Nuevo</a> 
	<a href="#importar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Importar</a> 
	<a href="#exportar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Exportar</a> 
	<a href="#editar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Editar</a> 
	<a href="#borrar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Codigo Borrar</a> 
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 4</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-xxxlarge"><b>Departamentos</b></h1>
  </div>
  <div class="w3-container" id="contact" style="margin-top:75px;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Codigo</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<a href="#config" class="w3-bar-item w3-button w3-hover-grey">Codigo Configuración</a>
			<a href="#index" class="w3-bar-item w3-button w3-hover-grey">Codigo Index</a> 			
			<a href="#nuevo" class="w3-bar-item w3-button w3-hover-grey">Codigo Nuevo</a>
			<a href="#importar" class="w3-bar-item w3-button w3-hover-grey">Codigo Importar</a>
			<a href="#exportar" class="w3-bar-item w3-button w3-hover-greyº">Codigo Exportar</a>
			<a href="#editar" class="w3-bar-item w3-button w3-hover-greyº">Codigo Editar</a>
			<a href="#borrar" class="w3-bar-item w3-button w3-hover-greyº">Codigo Borrar</a>
		</div>
		<div class="w3-container" id="config" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Config.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('config.php');?>
			</p>
		</div>
		<div class="w3-container" id="index" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Index.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('index.php'); ?>
			</p>
		</div>
		<div class="w3-container" id="nuevo" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Nuevo.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('nuevo.php'); ?>
			</p>
		</div>
		<div class="w3-container" id="importar" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Importar.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('importar.php'); ?>
			</p>
		</div>
		<div class="w3-container" id="exportar" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Exportar.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('exportar.php'); ?>
			</p>
		</div>
		<div class="w3-container" id="editar" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Editar.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('editar.php'); ?>
			</p>
		</div>
		<div class="w3-container" id="borrar" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Borrar.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('borrar.php'); ?>
			</p>
		</div>
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