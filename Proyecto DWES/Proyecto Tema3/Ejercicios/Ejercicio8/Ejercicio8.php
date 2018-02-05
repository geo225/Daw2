<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 8</h1>
		<h2>8. Mostrar la dirección IP del equipo desde el que estás accediendo</h2>
		<div id="ejercicio">
			<?php
				echo getHostByName(getHostName());
			?>
		</div>	
	</body>
</html>
