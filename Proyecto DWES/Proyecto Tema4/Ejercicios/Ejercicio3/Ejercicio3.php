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
				require '../../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
				$noError=true;
				$codDepartamento="";
				$descDepartamento="";
				$fechaBaja="";
				$mysql_host="192.168.20.19";
				$mysql_User="DAW204";
				$mysql_Password="paso";
				$mysql_BaseDatos="DAW204_DBdepartamentos";
				$mensajeError = array(
					"errorCodDepartamento"=>null,
					"errorDescDepartamento"=>null,
					"errorFechaBaja"=>null,									
					);	
				if (isset($_POST['enviarFormulario'])){											
					$mensajeError["errorCodDepartamento"]=comprobarAlfaNumerico($_POST['codDepartamento'],3);
					$mensajeError["errorDescDepartamento"]=comprobarAlfaNumerico($_POST['descDepartamento'],255);					
					$mensajeError["errorFechaBaja"]=validarFecha($_POST['fechaBaja']);			
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}					
				}
				if (isset($_POST['enviarFormulario']) && $noError==true){
					$codDepartamento=htmlspecialchars(strip_tags(trim($_POST['codDepartamento'])));
					$descDepartamento=htmlspecialchars(strip_tags(trim($_POST['descDepartamento'])));							
					$fechaBaja=$_POST['fechaBaja'];					
					
					$conn = new mysqli($mysql_host, $mysql_User, $mysql_Password, $mysql_BaseDatos);
					if ($conn->connect_errno) {
						echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;						
					}							
				
					$sql = "INSERT INTO Departamento 
					VALUES ('$codDepartamento', '$descDepartamento', '$fechaBaja')";

					if ($conn->query($sql) === TRUE) {						
						echo "<p> Codigo Departamento: $codDepartamento </p>";
						echo "<p> Descripcion Departamento: $descDepartamento </p>";
						echo "<p> Fecha Baja: $fechaBaja </p>";
						echo "<p> Se ha insertado correctamente </p>";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();
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
					<p>Fecha Baja: <input type="date" name="fechaBaja" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"
					<?php if(isset($_POST['fechaBaja']) && empty($mensajeError['errorFechaBaja'])){ echo 'value="',$_POST['fechaBaja'],'"';}?>>
					<span class="error"><?php echo $mensajeError['errorFechaBaja']; ?></span></p>
					<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
				</form>
			<?php	}
				?>	
		</div>	
	</body>
</html>
