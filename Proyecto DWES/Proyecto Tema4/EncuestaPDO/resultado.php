<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/estilo.css">
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
    <h3 class="w3-padding-64"><b>Tema 4<br/>Proyecto Encuesta</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/003-casa.png"/>Inicio</a> 
    <a href="Encuesta.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/002-anadir.png"/> Realizar Encuesta</a> 
    <a href="resultado.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/001-ojo.png"/> Ver Resultados</a> 
    <a href="codEncuesta.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/004-codificacion.png"/>Ver Codigo</a> 
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
    <h1 class="w3-jumbo"><b>Proyecto Encuesta</b></h1>
	<div class="w3-container" id="contact" style="margin-top:75px;">
		<h1 class="w3-xxxlarge w3-text-red"><b>Consultar Datos</b></h1>
		<hr style="width:50px;border:5px solid red" class="w3-round">
			
	</div>
  <!-- PHP -->
  <?php
	//Implentación del fichero de configuracion para la conexión a la base de datos
	require 'config.php';
	//Fecha y hora sacada del sistema mediante php
	$FechaHora = date("j, n, Y, g:i a");
	//Conexion para la base da datos para tratar los datos que vamos a utilizar
	try{
		$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Consulta que te saca el numero participantes, edad media, Satisfacion media , numero de equipos diferentes
		$consulta = "SELECT count(*) as NumeroParticipantes,round(avg(TIMESTAMPDIFF(YEAR,Bday,CURRENT_DATE))) as EdadMedia, round(avg(Satisfacion)) as SatisfacionMedia, count(DISTINCT ip) as NumeroEquipos from Datos  "; 
		$consulta = $conn->prepare($consulta);
		$consulta->execute();
		$resultado = $consulta->fetch(PDO::FETCH_OBJ);
		$edadMedia= $resultado->EdadMedia;
		$numeroParticipantes = $resultado->NumeroParticipantes;
		$satisfacionMedia = $resultado->SatisfacionMedia;
		$numeroEquipos = $resultado->NumeroEquipos;
		echo '<span class="w3-text-red"><strong>Fecha y hora actuales: </strong></span>';
		echo $FechaHora,"<br/>";
		echo '<span class="w3-text-red"><strong>Número de alumnos participantes: </strong></span>';
		echo $numeroParticipantes,"<br/>";
		echo '<span class="w3-text-red"><strong>Edad promedio: </strong></span>';
		echo $edadMedia,"<br/>";
		echo '<span class="w3-text-red"><strong>Promedio de grado de satisfacción: </strong></span>';
		echo $satisfacionMedia,"<br/>";
		echo '<span class="w3-text-red"><strong> Número de equipos desde los que se ha realizado la encuesta: </strong></span>';
		echo $numeroEquipos,"<br/><br/>";
		echo '<span class="w3-text-red"><strong> Dirección IP de los equipos desde los que se ha realizado la encuesta más de una vez: </strong></span>';
		//Consulta para obtener las ip de los equipos que han realizado mas de una encuesta
		$consulta = "select ip,count(ip) as NumeroEncuesta from Datos group by ip HAVING count(ip) > 1";
		$consulta = $conn->prepare($consulta);
		$consulta->execute();
		?>
		<div class="w3-margin-bottom">
							<table class="w3-table w3-light-grey w3-center w3-block w3-padding-large" >
								<tr>
									<th class="w3-dark-grey w3-xlarge " style="width:50%">Dirección IP</th>
									<th class="w3-red w3-xlarge " style="width:50%">Numuero de Encuestas Realizadas</th>
								</tr>
	<?php
		while ($resultado = $consulta->fetch(PDO::FETCH_OBJ)) {
			echo "<tr>";
				echo "<td>" . $resultado->ip . "</td>"; 
				echo "<td>" . $resultado->NumeroEncuesta . "</td>";
			echo "</tr>"; 	
		}?>
		</table>
      </div>
	 <?php 
	 echo '<span class="w3-text-red"><strong> Listado de Alumnos y Correos electronicos: </strong></span>';
	 //Consulta para la obtención de alumnos y correos electronicos
	 $consulta ="select NombreApellido,correo from Datos";
	 $consulta = $conn->prepare($consulta);
	 $consulta->execute();
	 ?>
	 <div class="w3-margin-bottom">
							<table class="w3-table w3-light-grey w3-center w3-block w3-padding-large" >
								<tr>
									<th class="w3-dark-grey w3-xlarge " style="width:70%">Alumno</th>
									<th class="w3-red w3-xlarge " style="width:30%">Correo Electronico</th>
								</tr>
	<?php
			while ($resultado = $consulta->fetch(PDO::FETCH_OBJ)) {
			echo "<tr>";
				echo "<td>" . $resultado->NombreApellido . "</td>"; 
				echo "<td>" . $resultado->correo . "</td>";
			echo "</tr>"; 	
		}?>
		</table>
      </div>
	<?php
		echo '<span class="w3-text-red"><strong> Listado de Alumnos y Opinion: </strong></span>';
	//Consulta para la obtención de alumnos y opiniones
	$consulta ="select NombreApellido,opinion from Datos";
	 $consulta = $conn->prepare($consulta);
	 $consulta->execute();
	?>
	<div class="w3-margin-bottom">
		<table class="w3-table w3-light-grey w3-center w3-block w3-padding-large" >
			<tr>
				<th class="w3-dark-grey w3-xlarge " style="width:30%">Alumno</th>
				<th class="w3-red w3-xlarge " style="width:70%">Opinion</th>
			</tr>
	<?php
			while ($resultado = $consulta->fetch(PDO::FETCH_OBJ)) {
			echo "<tr>";
				echo "<td>" . $resultado->NombreApellido . "</td>"; 
				echo "<td>" . $resultado->opinion . "</td>";
			echo "</tr>"; 	
		}?>
		</table>
     </div>
	 <?php
	//Finalizamos la conexión con el servidor
	
	}
	catch (PDOException $e) {
						print "¡Error!: " . $e->getMessage() . "<br/>";
						//Finalizamos la conexión con el servidor
						$conn=null;
						//redirecciona a la pagina principal
						header('index.php');
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
