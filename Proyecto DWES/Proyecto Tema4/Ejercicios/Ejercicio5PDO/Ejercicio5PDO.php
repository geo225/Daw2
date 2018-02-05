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
				//Se agregan las librerias para el uso de la encuesta
				require '../../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
				//Declaracion de la variables de error
				$noError=true;
				//Declaración de las respuestas de las encuestas
				for ($i = 0 ; $i < 3 ; $i++){
					$departamentoNuevos[$i] =array (
											'codDepartamento' => "",
											'descDepartamento' => "",
											);
				}				
				define ("mysql_host","192.168.20.19");
				define ("mysql_User","DAW204");
				define ("mysql_Password","paso");
				define ("mysql_BaseDatos","DAW204_DBdepartamentos");
				define("DATOSCONEXION","mysql:host=192.168.20.19;dbname=DAW204_DBdepartamentos");
				$mensajeError = array(
					"errorCodDepartamento"=>array(),
					"errorDescDepartamento"=>array(),
					);
				foreach ($mensajeError as &$error){
					for ( $i = 0 ; $i < count($departamentoNuevos) ; $i++){
						$error[$i]="";
					}
				}
				//Si se ha enviado el Formulario comprueba los errores 				
				if (isset($_POST['enviarFormulario'])){
				// Se comprueba los datos con un bucle for para recorrer las arrays 
				// y asi poder comprobar todos los campos si tener que poner 3 funciones de validación
					for ($i=0; $i<count($departamentoNuevos); $i++){	
						$mensajeError["errorCodDepartamento"][$i]=comprobarAlfaNumerico($_POST['codDepartamento'][$i],3,3);
						$mensajeError["errorDescDepartamento"][$i]=comprobarAlfaNumerico($_POST['descDepartamento'][$i],255);					
						foreach ($mensajeError as &$error){
							foreach ($error as &$valor){
								if ($valor!=null){
								$noError=false;
								}
							}
						}					
					}
				}
				// Si se ha enviado y no ha dado error procesa y muestra los datos		
				if (isset($_POST['enviarFormulario']) && $noError==true){
					//Aqui carga todo los datos que obtiene del formulario de la variable Global $_POST
					for ($i=0; $i<count($departamentoNuevos); $i++){	
						$departamentoNuevos[$i] = array (
												'codDepartamento'=>htmlspecialchars(strip_tags(trim($_POST['codDepartamento'][$i]))),
												'descDepartamento'=>htmlspecialchars(strip_tags(trim($_POST['descDepartamento'][$i]))));
					}							
					
					try{
						$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
						$consulta = "INSERT INTO Departamento (CodDepartamento, DescDepartamento) values (:codDepartamento,:descDepartamento)"; 
						$conn->beginTransaction();
						//Preparamos la consulta 
						$sentencia = $conn->prepare($consulta); 
						//La ejecutamos 
						$sentencia->bindParam(':codDepartamento', $codDepartamento);
						$sentencia->bindParam(':descDepartamento', $descDepartamento);
						for ($i=0; $i<count($departamentoNuevos); $i++){
							$codDepartamento=$departamentoNuevos[$i]['codDepartamento'];
							$descDepartamento=$departamentoNuevos[$i]['descDepartamento'];
							$sentencia->execute();
						}
						$conn->commit();
						echo "Departamentos agregados con exito";
						
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
						<?php 
								for ($i=0; $i<count($departamentoNuevos); $i++){	
								?>
									<p>Codigo Departamento : <input type="text" name="codDepartamento[]" required
									<?php if(isset($_POST['codDepartamento'][$i]) && empty($mensajeError['errorCodDepartamento'][$i])){ echo 'value="',$_POST['codDepartamento'][$i],'"';}?>/>
									<span class="error"><?php echo $mensajeError['errorCodDepartamento'][$i]; ?></span></p>
									<p>Descripcion Departamento : <input type="text" name="descDepartamento[]" required
									<?php if(isset($_POST['descDepartamento'][$i]) && empty($mensajeError['errorDescDepartamento'][$i])){ echo 'value="',$_POST['descDepartamento'][$i],'"';}?>/>
									<span class="error"><?php echo $mensajeError['errorDescDepartamento'][$i]; ?></span></p>
									<?php
								}
								?>
							<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
						</form>
			<?php	}
				?>	
		</div>	
	</body>
</html>