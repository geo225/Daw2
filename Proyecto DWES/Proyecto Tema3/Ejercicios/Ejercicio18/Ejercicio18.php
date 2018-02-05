<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 18</h1>
		<h2>18. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</h2>
		<div id="ejercicio">
			<?php
				
				$salaCine[0][14]="Rodrigo";
				$salaCine[1][1]="Marques";
				$salaCine[2][2]="Juan Carlos";
				$salaCine[3][3]="Juanjo";
				$salaCine[19][4]="Alejandro";
				reset($salaCine);
				do{
					if ( key($salaCine) >= 0 && key($salaCine) <20 && key(current($salaCine))>=0 && key(current($salaCine))<15){						
						echo 'Fila ',key($salaCine),' Asiento ',key(current($salaCine))," esta ",current(current($salaCine)),"<br/>";
					}
				}while(next($salaCine));
			?>
			<?php				
				$datos = [ 
					"Rodrigo" => array(23,1.87,85),
					"Marques" => array(20,1.80,51.5),
					"Juan Carlos" => array(28,1.70,67),
					"Juanjo" => array(19,1.50,32),
					"Alejandro" => array(20,1.60,40)
				];
				$salaCine[0][14]=$datos["Rodrigo"];
				$salaCine[1][1]=$datos["Marques"];
				$salaCine[2][2]=$datos["Juan Carlos"];
				$salaCine[3][3]=$datos["Juanjo"];
				$salaCine[19][4]=$datos["Alejandro"];
				reset($salaCine);
				do{
					if ( key($salaCine) >= 0 && key($salaCine) <20 && key(current($salaCine))>=0 && key(current($salaCine))<15){											
							echo 'Fila ',key($salaCine),' Asiento ',key(current($salaCine)),' esta ';							
								echo key($datos);
								foreach (current($datos) as $clave => $valor2){
									if ($clave == 0){
										echo " su edad es ",$valor2;
									}
									if ($clave == 1){
										echo " su altura es ",$valor2;
									}
									if ($clave == 2) {
										echo " su peso es ",$valor2;
									}
									
								}
						echo "<br/>";
						next($datos);
					}
				}while(next($salaCine));
				?>
		</div>	
	</body>
</html>