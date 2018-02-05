<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 1</h1>
		<h2>1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores</h2>
		<div id="ejercicio">
			<?php
				$mysql_host="192.168.20.19";
				$mysql_User="DAW204";
				$mysql_Password="paso";
				$mysql_BaseDatos="DAW204_DBdepartamentos";
				try{
					$conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_BaseDatos", $mysql_User, $mysql_Password);					
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					$consulta = "SELECT * FROM Departamento"; 
					//Preparamos la consulta 
					$sentencia = $conn->prepare($consulta); 
					//La ejecutamos 
					$sentencia->execute(); 
					//Guardamos el numero de registros obtenidos 
					$numRegistros = $sentencia->rowCount(); 
					echo "Numero de registros: $numRegistros <br/>"; 
					while ($departamento = $sentencia->fetch(PDO::FETCH_OBJ)) {//Mientras haya resultados, se muestran formateados. FETCH avanza el puntero
						echo "Codigo Departamento:" . $departamento->CodDepartamento . "<br />"; 
						echo "Descripcion Departamento:" . $departamento->DescDepartamento . "<br />";
						echo "Fecha Baja:" . $departamento->FechaBaja . "<br/>";	
						echo "<br />"; 
					} 									
					$conn = null; 
				}
				catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			?>
		</div>	
	</body>
</html>					