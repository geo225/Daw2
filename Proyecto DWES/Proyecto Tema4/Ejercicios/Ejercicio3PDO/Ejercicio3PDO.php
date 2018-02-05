<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 3</h1>
		<h2>2. Mostrar el contenido de la tabla Departamento y el número de registros.</h2>
		<div id="ejercicio">
			<?php
				require '../../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
				$noError=true;
				$codDepartamento="";
				$descDepartamento="";				
				define ("mysql_host","192.168.20.19");
				define ("mysql_User","DAW204");
				define ("mysql_Password","paso");
				define ("mysql_BaseDatos","DAW204_DBdepartamentos");
				define("DATOSCONEXION","mysql:host=192.168.20.19;dbname=DAW204_DBdepartamentos");
				$mensajeError = array(
					"errorCodDepartamento"=>null,
					"errorDescDepartamento"=>null,
					);	
				if (isset($_POST['enviarFormulario'])){											
					$mensajeError["errorCodDepartamento"]=comprobarAlfaNumerico($_POST['codDepartamento'],3,3);
					$mensajeError["errorDescDepartamento"]=comprobarAlfaNumerico($_POST['descDepartamento'],255);					
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}					
				}
				if (isset($_POST['enviarFormulario']) && $noError==true){
					$codDepartamento=htmlspecialchars(strip_tags(trim($_POST['codDepartamento'])));
					$descDepartamento=htmlspecialchars(strip_tags(trim($_POST['descDepartamento'])));											
					
					try{
					$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					$consulta = "INSERT INTO Departamento (CodDepartamento, DescDepartamento) values (:codDepartamento,:descDepartamento)"; 
					//Preparamos la consulta 
					$sentencia = $conn->prepare($consulta); 
					//La ejecutamos 
					$sentencia->bindParam(':codDepartamento', $codDepartamento);
					$sentencia->bindParam(':descDepartamento', $descDepartamento);
					$sentencia->execute();
					echo "Departamento agregado con exito";
					
					$conn = null; 
				}
				catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
				}
				else{													
			?>
				<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
					<p>Codigo Departamento : <input type="text" name="codDepartamento" required
					<?php if(isset($_POST['codDepartamento']) && empty($mensajeError['errorCodDepartamento'])){ echo 'value="',$_POST['codDepartamento'],'"';}?>						>
					<span class="error"><?php echo $mensajeError['errorCodDepartamento']; ?></span></p>
					<p>Descripcion Departamento : <input type="text" name="descDepartamento" required
					<?php if(isset($_POST['descDepartamento']) && empty($mensajeError['errorDescDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?>						>
					<span class="error"><?php echo $mensajeError['errorDescDepartamento']; ?></span></p>					
					<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
				</form>
			<?php	}
				?>	
		</div>	
	</body>
</html>