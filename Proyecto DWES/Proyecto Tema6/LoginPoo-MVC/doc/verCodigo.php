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
    <h3 class="w3-padding-64"><b>Tema 6<br/>Login/Logoff</b></h3>
  </div>
  <div class="w3-bar-block"> 
    <a href="../index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="/DAW204/public_html/Images/005-casa.png"/>Inicio</a> 
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 6</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-xxxlarge"><b>Login/Logoff</b></h1>
  </div>
  <div class="w3-container w3-half w3-centered" id="contact" style="margin-top:75px;">
      <h1 class="w3-xlarge w3-text-red"><b>Diagrama de Ficheros</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
        <img class="w3-centered" 
             height="400px"  src="../webroot/media/img/diagramaFicheros.PNG"/>
    </div>
      <div class="w3-container w3-half w3-centered" id="contact" style="margin-top:75px;">
			<h1 class="w3-xlarge w3-text-red"><b>Diagrama de Clases</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
        <img class="w3-centered" height="400px" src="../webroot/media/img/diagramaMVCLogin.PNG"/>
	</div>
    <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>index.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../index.php'); ?>
			</p>
		</div>
    <h1 class="w3-xxxlarge w3-text-red"><b>Modelo</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
		<div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Usuario.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../model/Usuario.php'); ?>
			</p>
		</div>
        <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>UsuarioPDO.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../model/UsuarioPDO.php'); ?>
			</p>
		</div>
    <div class="w3-container" tyle="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>DBPDO.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../model/DBPDO.php'); ?>
			</p>
		</div>
    <h1 class="w3-xxxlarge w3-text-red"><b>Controlador</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
    
        <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>clogin.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../controller/clogin.php'); ?>
			</p>
		</div>
    <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>cinicio.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../controller/cinicio.php'); ?>
			</p>
		</div>
    <h1 class="w3-xxxlarge w3-text-red"><b>Vista</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
    <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>layout.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../view/layout.php'); ?>
			</p>
		</div>
    <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>vlogin.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../view/vlogin.php'); ?>
			</p>
		</div>
    <div class="w3-container" style="margin-top:75px; overflow: auto;">
			<h1 class="w3-xxxlarge w3-text-red"><b>vinicio.php</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round"> 
			<p>
				<?php highlight_file('../view/vinicio.php'); ?>
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