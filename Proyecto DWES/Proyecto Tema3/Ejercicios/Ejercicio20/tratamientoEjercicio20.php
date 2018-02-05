<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 20</h1>
		<h2>20. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página
tratamiento.php para que muestre las preguntas y las respuestas recogidas.</h2>
		<div id="ejercicio">
			<?php
				$nombre=$_POST['nombre'];
				$apellido1=$_POST['apellido1'];
				$apellido2=$_POST['apellido2'];
				$calle=$_POST['calle'];
				$numeroCalle=$_POST['numeroCalle'];
				$pisoCalle=$_POST['pisoCalle'];
				$letraCalle=$_POST['letraCalle'];
				$bday=$_POST['bday'];
				$genero=$_POST['genero'];
				$usuario=$_POST['usuario'];
				$email=$_POST['email'];
				$contrasenia=$_POST['contrasenia'];
				$repitacontrasenia=$_POST['repitaContrasenia'];
				$opciones=$_POST['opciones'];
				$conocerPagina=$_POST['conocerPagina'];
				
				echo "<h1> Usuario Registrado con Exito </h1>";
				echo "<h2> Datos Personales </h2>";
				echo "<p> Nombre: $nombre </p>";
				echo "<p> Apellidos: $apellido1 $apellido2 </p>";
				echo "<p> Calle: $calle Numero: $numeroCalle ";
				if (!empty($pisoCalle)==true){
				echo " Piso: $pisoCalle";
				}
				if (!empty($letraCalle)==true){
				echo " Letra: $letraCalle";
				}
				echo "</p>";
				echo "<p> Fecha de Nacimiento: $bday </p>";
				echo "<p> Genero: $genero </p>";
				echo "<h2> Datos del Usuario </h2>";
				echo "<p> Usuario:  $usuario</p>";
				if (!empty($email)==true){
				echo "<p> Correo Electronico: $email </p>";
				}
				echo "<p> Termino y Uso de Condiciones </p>";
				if ($opciones[0]==true){
					echo "<p> Aceptado </p>";
				}else{
					echo "<p> Denegado </p>";
				}
				echo "<p> Boletin Informativo </p>";
				if (empty($opciones[1])==true){
					$opciones[1]=false;
				}
				if ($opciones[1]==true){
					echo "<p> Aceptado </p>";
				}else{
					echo "<p> Denegado </p>";
				}
				echo "<p> Recibir Novedades </p>";
				if (empty($opciones[2])==true){
					$opciones[2]=false;
				}
				if ($opciones[2]==true){
					echo "<p> Aceptado </p>";
				}else{
					echo "<p> Denegado </p>";
				}
				echo "<p> Como conociste la pagina: $conocerPagina </p>";
			?>
		</div>	
	</body>
</html>