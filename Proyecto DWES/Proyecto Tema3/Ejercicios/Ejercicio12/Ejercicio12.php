<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 12</h1>
		<h2>12. Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach())</h2>
		<div id="ejercicio">
			<?php
				echo '<h2>Datos de la variable $GLOBALS</h2>';
				print_r ($GLOBALS);
				echo '<h2>Datos de la variable $_SERVER</h2>';
				foreach ($_SERVER as $clave => $valor){
					echo "{$clave} => {$valor}",'<br/> ';
				}
				print_r ($_ENV);
			?>
		</div>	
	</body>
</html>