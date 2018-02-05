<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 1</h1>
		<h2>1. Inicializar variables de los distintos tipos de datos básicos y mostrar los datos por pantalla.</h2>
		<div id="ejercicio">
			<?php
				$nombre = 'Rodrigo';
				$edad = 16;
				$nota = 9.5;
				$boolean = true;
				echo "<p>Cadena ",$nombre,"<br/> Entero ",$edad,"<br/> Float ",$nota,"<br/> Boolean ",$boolean,"</p>";
				print ("<p>Cadena $nombre <br/> Entero $edad<br/> Float $nota<br/> Boolean $boolean</p>" );	
				echo '<p>La variable $nombre es del tipo ',gettype($nombre),' y tiene el valor ',$nombre,'</p>';
				echo '<p>La variable $edad es del tipo ',gettype($edad),' y tiene el valor ',$edad,'</p>';
				echo '<p>La variable $nota es del tipo ',gettype($nota),' y tiene el valor ',$nota,'</p>';
				echo '<p>La variable $boolean es del tipo ',gettype($boolean),' y tiene el valor ',$boolean,'</p>';
				print(nl2br("cadena de \n 2 lineas"));
			?>
		</div>	
	</body>
</html>