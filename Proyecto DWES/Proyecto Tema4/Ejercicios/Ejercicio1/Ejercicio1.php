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
				
				$mysqli = new mysqli($mysql_host, $mysql_User, $mysql_Password, $mysql_BaseDatos);
				if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
				echo $mysqli->host_info,"<br/>";
				echo $mysqli->server_info,"<br/>"; 
				echo "version servidor ",$mysqli->server_version,"<br/>";
				echo "version cliente ",$mysqli->client_version,"<br/>";
			?>
		</div>	
	</body>
</html>