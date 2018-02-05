<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 6</h1>
		</h2>6. Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días</h2>
		<div id="ejercicio">
			<?php
				$mas60dias = date('l j F Y',mktime(0, 0, 0, date("n") ,date("j")+60 ,date("Y"))); 				
				echo '<p>',$mas60dias,'</p>';
			?>
		</div>	
	</body>
</html>