<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 5 y 6</h1>
		<div id="ejercicio">
			<?php
				define ("mysql_host","192.168.20.19");
				define ("mysql_User","DAW204");
				define ("mysql_Password","paso");
				define ("mysql_BaseDatos","DAW204_DBdepartamentos");
				define("DATOSCONEXION","mysql:host=192.168.20.19;dbname=DAW204_DBdepartamentos");
				
				echo "<h1>Ejercicio 8</h1>"; 

				/* 
				 * el primer paso es crearlo mediante la etiqueta $xml 
				 * agregando la clase Dom para crearlo, 
				 * la version de 1.0 y el unicode a usar es el UTF-8 
				 * */ 
				$xml = new DomDocument('1.0', 'UTF-8'); 
				//agregamos la etiqueta raiz departamentos 
				$departamentos = $xml->createElement('Departamentos'); 
				$departamentos = $xml->appendChild($departamentos); 


				try { 
					//establecemos la conexión 
					$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password); 
					//establecemos el modo de errores 
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					//se hace la consulta 
					$consulta = "SELECT * FROM Departamento";
					$sentencia = $conn->prepare($consulta); 
					// Ejecutamos 
					$sentencia->execute(); 

					// Ahora vamos a indicar el fetch mode cuando llamamos a fetch: 
					while($row = $sentencia->fetch(PDO::FETCH_OBJ)){ 
						/* 
						 * ahora agregaremos nuestro nodo hijo que seria departamento 
						 * y asi mismo agregaremos los nodos hijos del nodo departamento 
						 * cuantos sea necesario. 
						 * */ 
						$departamento=$xml->createElement('Departamento'); 
						$departamento =$departamentos->appendChild($departamento); 
						//se crean los nodos hijos de departamento y se asigna valor 
						$codigo=$xml->createElement('Codigo',$row->CodDepartamento); 
						$codigo =$departamento->appendChild($codigo); 
						$descripcion=$xml->createElement('Descripcion',$row->DescDepartamento); 
						$descripcion =$departamento->appendChild($descripcion); 
						$fecha=$xml->createElement('fecha',$row->FechaBaja); 
						$fecha =$departamento->appendChild($fecha); 
					} 

					//una vez se han pasado todos los departamentos, se guarda el archivo xml 

					$xml->formatOutput = true;  //poner los string en la variable $strings_xml: 

					$xml->saveXML(); 

						//Finalmente, guardarlo en un directorio: 

					$xml->save('ejer8.xml'); 
					highlight_file("ejer8.xml"); 
				} catch(PDOException $err) { 

					echo "<pre>".print_r($err,true)."</pre>"; 

					exit(); 
				}
			?>	
		</div>	
	</body>
</html>