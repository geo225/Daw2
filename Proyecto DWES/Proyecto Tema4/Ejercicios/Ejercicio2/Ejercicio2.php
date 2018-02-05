<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 1</h1>
		<h2>2. Mostrar el contenido de la tabla Departamento y el número de registros.</h2>
		<div id="ejercicio">
			<?php
				$mysql_host="192.168.20.19";
				$mysql_User="DAW204";
				$mysql_Password="paso";
				$mysql_BaseDatos="DAW204_DBdepartamentos";
				
				$mysqli = new mysqli($mysql_host, $mysql_User, $mysql_Password, $mysql_BaseDatos);
				if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
				echo $mysqli->host_info . "<br/>";
				
				$sql = "Select * from Departamento";
				if (!$resultado = $mysqli->query($sql, MYSQLI_USE_RESULT)) {
					echo "Lo sentimos, este sitio web está experimentando problemas.";
					echo "Error: La ejecución de la consulta falló debido a: \n";
					echo "Query: " . $sql . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit;
				}
				$departamento = $resultado->fetch_object();
				while ($departamento != null) {//Bucle para recorrer los registros. 
					print "<p>Departamento: $departamento->CodDepartamento,  $departamento->DescDepartamento, $departamento->FechaBaja</p>"; 
					$departamento = $resultado->fetch_object();//Avanza la posicion del puntero. 
} 
				printf("La selección devolvió %d filas.\n", $resultado->num_rows);
				

			?>
		</div>	
	</body>
</html>