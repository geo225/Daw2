<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 4</h1>
		<h2>4. Formulario de búsqueda de departamentos por descripción 
		(por una parte del campo DescDepartamento)
</h2>
		<div id="ejercicio">
			<?php
				require '../../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
				$noError=true;
				$codDepartamento="";				
				define ("mysql_host","192.168.20.19");
				define ("mysql_User","DAW204");
				define ("mysql_Password","paso");
				define ("mysql_BaseDatos","DAW204_DBdepartamentos");
				define("DATOSCONEXION","mysql:host=192.168.20.19;dbname=DAW204_DBdepartamentos");
				$mensajeError = array(
					"errorDescDepartamento"=>null,					
					);	
				if (isset($_POST['enviarFormulario'])){											
					$mensajeError["errorDescDepartamento"]=comprobarAlfaNumerico($_POST['descDepartamento'],255);			
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}					
				}
				if (isset($_POST['enviarFormulario']) && !isset($_POST['salir']) && $noError==true){
					$descDepartamento=htmlspecialchars(strip_tags(trim($_POST['descDepartamento'])));							
					$descDepartamento="%".$descDepartamento."%";
					try{
						$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
						$consulta = "SELECT * FROM Departamento where DescDepartamento LIKE :descDepartamento";
						$sentencia = $conn->prepare($consulta); 
						$sentencia->bindParam(':descDepartamento', $descDepartamento);
						$sentencia->execute();
						if ($numRegistros = $sentencia->rowCount()==0){
							echo "No se ha encontrado ningun  departamento";
						}					
						?>
						<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
						<p>Descripcion Departamento : <input type="text" name="descDepartamento" 
						<?php if(isset($_POST['descDepartamento']) && empty($mensajeError['errorDescDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';}?> value="%">
						<span class="error"><?php echo $mensajeError['errorDescDepartamento']; ?></span></p>
						<p><input name="enviarFormulario" type="submit" value="Enviar" /><input name="salir" type="submit" value="Salir" /></p>				
						</form>
						<table>
							<tr>
								<th>Codigo</th>
								<th>Descripcion Departamento </th>
								<th>Fecha Baja </th>
							</tr>	
						<?php
						//Mientras haya resultados, se muestran formateados. FETCH avanza el puntero					
						while ($departamento = $sentencia->fetch(PDO::FETCH_OBJ)) {						
							echo "<tr>";
							echo "<td>" . $departamento->CodDepartamento . "</td>"; 
							echo "<td>" . $departamento->DescDepartamento . "</td>";
							echo "<td>" . $departamento->FechaBaja . "</td>";	
							echo "</tr>"; 
						}	
						echo "</table>";
						$conn = null; 
					}
					catch (PDOException $e) {
						print "¡Error!: " . $e->getMessage() . "<br/>";
						die();
				}
				}
				else if (isset($_POST['salir'])){
					exit;
				}
				else {
			?>
				<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
					<p>Descripcion Departamento : <input type="text" name="descDepartamento" 
					<?php if(isset($_POST['descDepartamento']) && empty($mensajeError['errorDescDepartamento'])){ echo 'value="',$_POST['descDepartamento'],'"';} ?>value="%"						>
					<span class="error"><?php echo $mensajeError['errorDescDepartamento']; ?></span></p>
					<p><input name="enviarFormulario" type="submit" value="Enviar" /><input name="salir" type="submit" value="Salir" /></p>				
				</form>
			<?php	}
				?>	
		</div>	
	</body>
</html>