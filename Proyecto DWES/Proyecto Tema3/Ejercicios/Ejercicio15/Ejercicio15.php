<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 15</h1>
		<h2>15. Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo
percibido durante la semana. (Array asociativo con los nombres de los días de la semana).</h2>
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
				foreach ( $sueldo as $clave => $valor){
					echo "El dia {$clave} he cobrado {$valor} <br/>";
					$total= $total+$valor;
				}
				echo "He cobrado un total de $total";
			?>
		</div>	
	</body>
</html>