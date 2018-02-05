<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 17</h1>
		<h2>17. Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas
que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando
únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los
asientos ocupados en cada fila y las personas que lo ocupan.
</h2>
		<div id="ejercicio">
			<?php
				$salaCine[0][14]="Rodrigo";
				$salaCine[1][1]="Marques";
				$salaCine[2][2]="Juan Carlos";
				$salaCine[3][3]="Juanjo";
				$salaCine[19][4]="Alejandro";
				for ($i = 0; $i < 20; $i++) {
					for ($j = 0; $j < 15; $j++){
						if (empty($salaCine[$i][$j])==false){
							echo 'Fila ',$i,' Asiento ',$j,' esta ',$salaCine[$i][$j],"<br/> ";
						}
					}
				}
				?>
		</div>	
	</body>
</html>