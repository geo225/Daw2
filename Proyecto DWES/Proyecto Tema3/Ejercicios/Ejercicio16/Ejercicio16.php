<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 16</h1>
		<h2>16. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</h2>
		<div id="ejercicio">
			<?php
				$sueldo = [
				"Lunes" => 40,
				"Martes" => 45,
				"Miercoles" => 37,
				"Jueves" => 67,
				"Viernes" => 54,
				"Sabado" => 55,
				"Domingo" => 37
				];
				$total = 0;	
				reset($sueldo);
				do {
					echo "A dia de ",key($sueldo)," se ha cobrado ",current($sueldo),"<br/>";
					$total+=current($sueldo);
				}
				while ( next($sueldo));									
				echo "He cobrado un total de $total";
				?>
		</div>	
	</body>
</html>