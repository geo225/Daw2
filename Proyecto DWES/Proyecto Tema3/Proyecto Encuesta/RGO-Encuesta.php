<!DOCTYPE html>
<html lang="es">
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/cssEncuesta.css">
	</head>
	<body>
		<h1>Encuesta</h1>		
		<div id="ejercicio">
		<?php
				//Se agregan las librerias para el uso de la encuesta
				require '../Libreria/FuncionesValidacion.php'; 
				//Declaracion de la variables de error
				$noError=true;
				//Declaración de las respuestas de las encuestas
				for ($i = 0 ; $i < 3 ; $i++){
				$respuesta[$i] =array (
										'nombre' => "",
										'apellido' => "",
										'bday' => "",
										'genero' =>"",
										'usuario' => "",
										'email' => "",
										'altura' => "",
										'peso' => "",
										'conocerPagina' => ""
										);
				}	
				$mensajeError = array(
					"errorNombre"=>array(),
					"errorApellido"=>array(),
					"errorBday"=>array(),
					"errorUsuario"=>array(),
					"errorEmail"=>array(),
					"errorAltura"=>array(),
					"errorPeso"=>array()
					);
				foreach ($mensajeError as &$error){
					for ( $i = 0 ; $i < count($respuesta) ; $i++){
						$error[$i]="";
					}
				}	
							
				$mediaAltura=0;
				$mediaPeso=0;
				$numHombres=0;
				$numMujeres=0;
				$mediaEdad=0;
				//Si se ha enviado el Formulario comprueba los errores 
				if (isset($_POST['enviarFormulario'])){
					// Se comprueba los datos con un bucle for para recorrer las arrays 
					// y asi poder comprobar todos los campos si tener que poner 3 funciones de validación
					for ($i=0; $i<count($respuesta); $i++){						
						$mensajeError["errorNombre"][$i]=comprobarTexto($_POST['nombre'][$i],50);
						$mensajeError["errorApellido"][$i]=comprobarTexto($_POST['apellido'][$i],50);
						$mensajeError["errorBday"][$i]=validarFecha($_POST['bday'][$i]);
						$mensajeError["errorUsuario"][$i]=comprobarAlfaNumerico($_POST['usuario'][$i],50,4);
						$mensajeError["errorEmail"][$i]=validarEmail($_POST['email'][$i],100);
						$mensajeError["errorAltura"][$i]=comprobarEntero($_POST['altura'][$i]);
						$mensajeError["errorPeso"][$i]=comprobarFloat($_POST['peso'][$i]);
					}
					foreach ($mensajeError as &$error){
						foreach ($error as &$valor){
							if ($valor!=null){
							$noError=false;
							}
						}
					}					
				}
				// Si se ha enviado y no ha dado error procesa y muestra los datos				
				if (isset($_POST['enviarFormulario']) && $noError==true){	
					//Aqui carga todo los datos que obtiene del formulario de la variable Global $_POST					
					for ($i=0; $i<count($respuesta); $i++){	
						$respuesta[$i] = array (
											'nombre' => htmlspecialchars(strip_tags(trim($_POST['nombre'][$i]))),
											'apellido' => htmlspecialchars(strip_tags(trim($_POST['apellido'][$i]))),
											'bday' => $_POST['bday'][$i],
											'genero' => $_POST['genero'.$i],
											'usuario' => htmlspecialchars(strip_tags(trim($_POST['usuario'][$i]))),
											'email' => htmlspecialchars(strip_tags(trim($_POST['email'][$i]))),
											'altura' => htmlspecialchars(strip_tags(trim($_POST['altura'][$i]))),
											'peso' => htmlspecialchars(strip_tags(trim($_POST['peso'][$i]))),
											'conocerPagina' => $_POST['conocerPagina'.$i]);
					}											
					// Aqui muestra los Datos recibidos
					for ($i=0; $i<count($respuesta); $i++){	
						echo '<div class="encuesta">';
						echo "<h1> Datos Encuesta ",$i+1," </h1>";
						echo "<h2> Datos Personales </h2>";
						echo "<p> Nombre: ",$respuesta[$i]['nombre']," </p>";
						echo "<p> Apellidos: ",$respuesta[$i]['apellido']," </p>";
						echo "<p> Fecha de Nacimiento: ",$respuesta[$i]['bday']," </p>";
						echo "<p> Genero: ",$respuesta[$i]['genero']," </p>";
						echo "<p> Usuario: ",$respuesta[$i]['usuario']," </p>";
						echo "<p> Correo Electronico: ",$respuesta[$i]['email']," </p>";
						echo "<p> Altura: ",$respuesta[$i]['altura']," </p>";
						echo "<p> Peso: ",$respuesta[$i]['peso']," </p>";
						echo "<p> Como conociste la pagina: ",$respuesta[$i]['conocerPagina']," </p>";
						echo "</div>";
					}					
					//Aqui procesa algunos datos y muestra los resultados
					echo '<div class="resultado">'; 
					echo "<h1> Procesamiento de Datos </h1>";
					for ($i = 0; $i < count($respuesta); $i++){
						$mediaEdad+=date("Y")-substr($respuesta[$i]['bday'],-10,4);
					}
					$mediaEdad=$mediaEdad/count($respuesta);
					echo "<p>Edad Media: ",round($mediaEdad,0),"</p>";
					$mediaAltura=array_sum($_POST['altura'])/count($_POST['altura']);
					echo "<p>Altura media: ",$mediaAltura,"</p>";
					$mediaPeso=array_sum($_POST['peso'])/count($_POST['peso']);
					echo "<p>Peso medio: ",round($mediaPeso,2),"</p>";
					for ($i = 0; $i<count($respuesta);$i++){
						if ($respuesta[$i]['genero']=="hombre"){
							$numHombres++;
						}else{
							$numMujeres++;
						}
					}
					$numHombres=($numHombres/count($respuesta))*100;
					$numMujeres=($numMujeres/count($respuesta))*100;
					echo "<p>El porcentaje de Hombres que usa la pagina es : ",round($numHombres,2),"%</p>";
					echo "<p>El porcentaje de Mujeres que usa la pagina es : ",round($numMujeres,2),"%</p>";
					
					echo "</div>";
				}
				// Si no se ha enviado o se ha enviado con errores muestra el formulario
				else{					
					?>
					<form id="formulario" name="FormularioRegistro" id="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
						
						<?php 
						for ($i=0; $i<count($respuesta); $i++){	
						?>
						<div class="encuesta">
							<h1> Encuesta <?php echo $i+1; ?> </h1>
							<p>Nombre : <input type="text" name="nombre[]" required 
							<?php if(isset($_POST['nombre'][$i]) && empty($mensajeError['errorNombre'][$i])){ echo 'value="',$_POST['nombre'][$i],'"';}?>/>
							<span class="error"><?php echo $mensajeError['errorNombre'][$i]; ?></span></p>
							<p>Primer Apellido : <input type="text" name="apellido[]" required 
							<?php if(isset($_POST['apellido'][$i]) && empty($mensajeError['errorApellido'][$i])){ echo 'value="',$_POST['apellido'][$i],'"';}?>/>
							<span class="error"><?php echo $mensajeError['errorApellido'][$i]; ?></span></p>					
							<p>Fecha de Nacimiento: <input type="date" name="bday[]" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"
							<?php if(isset($_POST['bday'][$i]) && empty($mensajeError['errorBday'][$i])){ echo 'value="',$_POST['bday'][$i],'"';}?>>
							<span class="error"><?php echo $mensajeError['errorBday'][$i]; ?></span></p>
							<p> Genero:<br/>
								<input type="radio" name="genero<?php echo $i; ?>" value="hombre"
								<?php if(!isset($_POST['genero'.$i])){ echo "checked";}?>
								<?php if(isset($_POST['genero'.$i]) && $_POST['genero'.$i]=="hombre" ){ echo "checked";}?>>
								Hombre<br/>
								<input type="radio" name="genero<?php echo $i; ?>" value="mujer"
								<?php if(isset($_POST['genero'.$i]) && $_POST['genero'.$i]=="mujer" ){ echo "checked";}?>>
								Mujer<br/>
							</p>
							<p>Usuario : <input type="text" name="usuario[]" required
							<?php if(isset($_POST['usuario'][$i]) && empty($mensajeError['errorUsuario'][$i])){ echo 'value="',$_POST['usuario'][$i],'"';}?>						>
							<span class="error"><?php echo $mensajeError['errorUsuario'][$i]; ?></span></p>
							<p>Correo electronico :<input type="email" name="email[]"
							<?php if(isset($_POST['email'][$i]) && empty($mensajeError['errorEmail'][$i])){ echo 'value="',$_POST['email'][$i],'"';}?>>
							<span class="error"><?php echo $mensajeError['errorEmail'][$i]; ?></span></p>
							<p> Altura en CM :<input type="number" name="altura[]" min="100" max="300" required
							<?php if(isset($_POST['altura'][$i]) && empty($mensajeError['errorAltura'][$i])){ echo 'value="',$_POST['altura'][$i],'"';}?>/>
							<span class="error"><?php echo $mensajeError['errorAltura'][$i]; ?></span></p>
							<p> Peso en Kg (2 decimales) :<input type="number" name="peso[]" step="0.01" min="30" max="300" required
							<?php if(isset($_POST['peso'][$i]) && empty($mensajeError['errorPeso'][$i])){ echo 'value="',$_POST['peso'][$i],'"';}?>/>
							<span class="error"><?php echo $mensajeError['errorPeso'][$i]; ?></span></p>
							<p> Como conociste la pagina:
								<select name="conocerPagina<?php echo $i; ?>">
								  <option value="navegador"
								  <?php if(isset($_POST['conocerPagina'.$i]) && $_POST['conocerPagina'.$i]=="navegador"){ echo "selected";} ?>>
								  Por un Navegador de busqueda</option>
								  <option value="amigo"
								  <?php if(isset($_POST['conocerPagina'.$i]) && $_POST['conocerPagina'.$i]=="amigo"){ echo "selected";} ?>>
								  Amigo</option>
								  <option value="publicidad" 
								  <?php if(isset($_POST['conocerPagina'.$i]) && $_POST['conocerPagina'.$i]=="publicidad"){ echo "selected";} ?>>
								  Publicidad</option>
								  <option value="otro"
								  <?php if(isset($_POST['conocerPagina'.$i]) && $_POST['conocerPagina'.$i]=="otro"){ echo "selected";} ?>>
								  Otros</option>
								</select>
							</p>
						</div>
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