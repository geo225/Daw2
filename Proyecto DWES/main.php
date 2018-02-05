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
    <h3 class="w3-padding-64"><b>USED<br/>Rodrigo Gutierrez</b></h3>
  </div>
  <div class="w3-bar-block">
	<a href="/DAW204/public_html/index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="../Images/005-casa.png"/>Inicio</a> 
	<a href="Tema1/Practica1Rodrigo.pdf" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white" target="_blank">Tema 1</a>
    <a href="Tema2/Practica2Rodrigo.pdf" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white" target="_blank">Tema 2</a>
    <a href="Proyecto Tema3/tema3.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tema 3</a>
    <a href="Proyecto Tema4/tema4.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tema 4</a>
	<a href="Proyecto Tema5/tema5.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tema 5</a>
      <a href="Proyecto Tema6/tema6.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tema 6</a>
      <a href="Proyecto Tema7/tema7.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tema 7</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>USED RGO</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-xxxlarge"><b>Desarrollo web en entorno de servidor</b></h1>
  </div>
		<div class="w3-container" id="packages" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Pagina Principal.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>

  <div class="w3-row-padding">
    <div class="w3-bar w3-margin-bottom">
      <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-red w3-xlarge w3-padding-32">TEMARIO</li>
        <li class="w3-padding-16"><a class="w3-hover-grey" href="Tema1/Practica1Rodrigo.pdf" target="_blank">TEMA 1: DESARROLLO WEB EN ENTORNO SERVIDOR </a></li>
        <li class="w3-padding-16"><a class="w3-hover-grey" href="Tema2/Practica2Rodrigo.pdf" target="_blank">TEMA 2: INSTALACIÓN, CONFIGURACIÓN Y DOCUMENTACIÓN DEL ENTORNO DE DESARROLLO Y DEL ENTORNO DE EXPLOTACIÓN </a></li>
        <li class="w3-padding-16"><a class="w3-hover-grey" href="Proyecto Tema3/tema3.php">TEMA 3: CARACTERÍSTICAS DEL LENGUAJE PHP</a></li>
        <li class="w3-padding-16"><a class="w3-hover-grey" href="Proyecto Tema4/tema4.php">TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP</a></li>
		<li class="w3-padding-16"><a class="w3-hover-grey" href="Proyecto Tema5/tema5.php">TEMA 5: DESARROLLO DE APLICACIONES WEB UTILIZANDO CÓDIGO EMBEBIDO</a></li>
          <li class="w3-padding-16"><a class="w3-hover-grey" href="Proyecto Tema6/tema6.php">TEMA 6: PROGRAMACIÓN ORIENTADA A OBJETOS EN PHP</a></li>
          <li class="w3-padding-16"><a class="w3-hover-grey" href="Proyecto Tema7/tema7.php">TEMA 7: PROGRAMACIÓN DE SERVICIOS WEB</a></li>
      </ul>
    </div>
  </div>
</div>
 
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="/DAW204/public_html/index.php" title="W3.CSS" class="w3-hover-opacity">Rodrigo Gutierrez</a></p></div>

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
