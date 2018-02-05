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
    <a href="nuevo.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/005-anadir.png"/> Nuevo</a> 
    <a href="importar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/004-importacion.png"/> Importar</a> 
    <a href="exportar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/003-flecha-de-exportacion.png"/> Exportar</a>
	<a href="verCodigoMantenimiento.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Ver Codigo</a>	
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
		<h1 class="w3-xlarge w3-text-red"><b>Exportar</b></h1>
		<hr style="width:50px;border:5px solid red" class="w3-round">
  <!-- Codigo PhP -->	
			<?php
				require "config.php";

				/* 
				 * el primer paso es crearlo mediante la etiqueta $xml 
				 * agregando la clase Dom para crearlo, 
				 * la version de 1.0 y el unicode a usar es el UTF-8 
				 * */ 
				$xml = new DomDocument('1.0', 'UTF-8'); 
				//agregamos la etiqueta raiz departamentos 
				$departamentos = $xml->createElement('Departamentos'); 
				$departamentos = $xml->appendChild($departamentos); 


				try { 
					//establecemos la conexión 
					$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password); 
					//establecemos el modo de errores 
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					//se hace la consulta 
					$consulta = "SELECT * FROM Departamento";
					$sentencia = $conn->prepare($consulta); 
					// Ejecutamos 
					$sentencia->execute(); 

					// Ahora vamos a indicar el fetch mode cuando llamamos a fetch: 
					while($row = $sentencia->fetch(PDO::FETCH_OBJ)){ 
						/* 
						 * ahora agregaremos nuestro nodo hijo que seria departamento 
						 * y asi mismo agregaremos los nodos hijos del nodo departamento 
						 * cuantos sea necesario. 
						 * */ 
						$departamento=$xml->createElement('Departamento'); 
						$departamento =$departamentos->appendChild($departamento); 
						//se crean los nodos hijos de departamento y se asigna valor 
						$codigo=$xml->createElement('Codigo',$row->CodDepartamento); 
						$codigo =$departamento->appendChild($codigo); 
						$descripcion=$xml->createElement('Descripcion',$row->DescDepartamento); 
						$descripcion =$departamento->appendChild($descripcion); 
						$fecha=$xml->createElement('fecha',$row->FechaBaja); 
						$fecha =$departamento->appendChild($fecha); 
					} 

					//una vez se han pasado todos los departamentos, se guarda el archivo xml 

					$xml->formatOutput = true;  //poner los string en la variable $strings_xml: 

					$xml->saveXML(); 

						//Finalmente, guardarlo en un directorio: 

					$xml->save('XML/departamento.xml'); 
					echo 'Se ha exportado con exito <span class="w3-text-red">',$sentencia->rowCount(),"</span> departamentos";
					echo "<br/>Se le redireccionará a la pagina de inicio en 3 segundos";
					echo '<script type="text/javascript">
							function redireccionar(){
							window.location="index.php";
						} 
							setTimeout ("redireccionar()", 3000);
						</script>';
				} catch(PDOException $e) { 
					echo "Ha ocurrido un error Critico";
						echo "<br/>Se le redireccionará a la pagina de inicio en 3 segundos";
						echo 	'<script type="text/javascript">
								function redireccionar(){
								window.location="index.php";
								} 
								setTimeout ("redireccionar()", 3000);
								</script>';	
						//Cerramos la conexión con la base de datos
						$conn = null; 	
				}
			?>	
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