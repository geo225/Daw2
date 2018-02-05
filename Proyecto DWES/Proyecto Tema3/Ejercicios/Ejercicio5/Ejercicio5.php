<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 5</h1>
		<h2>5. Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp</h2>
		<div id="ejercicio">
			<?php
				$fecha = new DateTime();
				echo $fecha->getTimestamp();
			?>
		</div>	
	</body>
</html>