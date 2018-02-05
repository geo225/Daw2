<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 13</h1>
		<h2>13. Crear una función que cuente el número de visitas a la página actual desde una fecha concreta.</h2>
		<div id="ejercicio">
			<?php
				$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
				$fecha_requisito = strtotime("20-01-2018 00:00:00");
				$archivo = "contador.txt";
				$fp = fopen($archivo,"r");
				$contador = fgets($fp, 26);
				fclose($fp);				
				if($fecha_actual > $fecha_requisito){
					
					++$contador; 
					$fp = fopen($archivo,"w+"); 
					fwrite($fp, $contador, 26); 
					fclose($fp);					
				}
				
				echo "Esta página ha sido visitada $contador veces";
			?>
		</div>	
	</body>
</html>