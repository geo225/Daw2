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

					echo "Version del cliente: ",$conn->getAttribute(PDO::ATTR_CLIENT_VERSION),"<br>"; 
					echo "Version del servidor: ",$conn->getAttribute(PDO::ATTR_SERVER_VERSION); 
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