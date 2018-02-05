<!DOCTYPE html>
<html lang="es">
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 23</h1>
		<h2>23. Construir un formulario para recoger un cuestionario realizado a 
		una persona y mostrar en la misma página las
		preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o
		errónea volverá a salir el
		formulario con el mensaje correspondiente, pero las respuestas que habíamos 
		tecleado correctamente aparecerán
		en el formulario y no tendremos que volver a teclearlas.</h2>	
		<div id="ejercicio">
		<?php
				require '../../Libreria/FuncionesValidacion.php';
				$noError=true;
				$nombre="";
				$apellido1="";
				$apellido2="";
				$calle="";
				$numeroCalle="";
				$pisoCalle="";
				$letraCalle="";
				$bday="";
				$genero="";
				$usuario="";
				$email="";
				$contrasenia="";
				$repitacontrasenia="";
				$opciones="";
				$conocerPagina="";
				
				$mensajeError = array(
					"errorNombre"=>null,
					"errorApellido1"=>null,
					"errorApellido2"=>null,
					"errorCalle"=>null,
					"errorNumeroCalle"=>null,
					"errorPisoCalle"=>null,
					"errorLetraCalle"=>null,
					"errorBday"=>null,
					"errorUsuario"=>null,
					"errorEmail"=>null,
					"errorContrasenia"=>null,
					"errorRepitaContrasenia"=>null,
					"errorCoincideContrasenia"=>null
					);
				
				if (isset($_POST['enviarFormulario'])){						
					$mensajeError["errorNombre"]=comprobarTexto($_POST['nombre'],50);
					$mensajeError["errorApellido1"]=comprobarTexto($_POST['apellido1'],50);
					$mensajeError["errorApellido2"]=comprobarTexto($_POST['apellido2'],50);					
					$mensajeError["errorCalle"]=comprobarTexto($_POST['calle'],100);										
					$mensajeError["errorNumeroCalle"]=comprobarEntero($_POST['numeroCalle']);					
					$mensajeError["errorPisoCalle"]=comprobarEntero($_POST['pisoCalle'],0);					
					$mensajeError["errorLetraCalle"]=comprobarTexto($_POST['letraCalle'],0,0,0);
					$mensajeError["errorBday"]=validarFecha($_POST['bday']);
					$mensajeError["errorUsuario"]=comprobarAlfaNumerico($_POST['usuario'],50,4);					
					$mensajeError["errorEmail"]=validarEmail($_POST['email'],100);
					$mensajeError["errorContrasenia"]=comprobarAlfaNumerico($_POST['contrasenia'],8,4);					
					$mensajeError["errorRepitaContrasenia"]=comprobarAlfaNumerico($_POST['repitaContrasenia'],8,4);					
					if ($_POST['contrasenia']!=$_POST['repitaContrasenia']){
						$mensajeError["errorCoincideContrasenia"]="Las Contraseñas no coinciden";
					}
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}																		
				}
				if (isset($_POST['enviarFormulario']) && $noError==true){
					$nombre=htmlspecialchars(strip_tags(trim($_POST['nombre'])));
					$apellido1=htmlspecialchars(strip_tags(trim($_POST['apellido1'])));
					$apellido2=htmlspecialchars(strip_tags(trim($_POST['apellido2'])));
					$calle=htmlspecialchars(strip_tags(trim($_POST['calle'])));
					$numeroCalle=htmlspecialchars(strip_tags(trim($_POST['numeroCalle'])));
					$pisoCalle=htmlspecialchars(strip_tags(trim($_POST['pisoCalle'])));
					$letraCalle=htmlspecialchars(strip_tags(trim($_POST['letraCalle'])));
					$bday=$_POST['bday'];
					$genero=$_POST['genero'];
					$usuario=htmlspecialchars(strip_tags(trim($_POST['usuario'])));
					$email=htmlspecialchars(strip_tags(trim($_POST['email'])));
					$contrasenia=$_POST['contrasenia'];
					$repitacontrasenia=$_POST['repitaContrasenia'];
					$opciones=$_POST['opciones'];
					$conocerPagina=$_POST['conocerPagina'];
					
					echo "<h1> Usuario Registrado con Exito </h1>";
					echo "<h2> Datos Personales </h2>";
					echo "<p> Nombre: $nombre </p>";
					echo "<p> Apellidos: $apellido1 $apellido2 </p>";
					echo "<p> Calle: $calle Numero: $numeroCalle ";
					if (!empty($pisoCalle)==true){
					echo " Piso: $pisoCalle";
					}
					if (!empty($letraCalle)==true){
					echo " Letra: $letraCalle";
					}
					echo "</p>";
					echo "<p> Fecha de Nacimiento: $bday </p>";
					echo "<p> Genero: $genero </p>";
					echo "<h2> Datos del Usuario </h2>";
					echo "<p> Usuario:  $usuario</p>";
					if (!empty($email)==true){
						echo "<p> Correo Electronico: $email </p>";
					}
					echo "<p> Termino y Uso de Condiciones </p>";
					if ($opciones[0]==true){
						echo "<p> Aceptado </p>";
					}else{
						echo "<p> Denegado </p>";
					}
					echo "<p> Boletin Informativo </p>";
					if (empty($opciones[1])==true){
						$opciones[1]=false;
					}
					if ($opciones[1]==true){
						echo "<p> Aceptado </p>";
					}else{
						echo "<p> Denegado </p>";
					}
					echo "<p> Recibir Novedades </p>";
					if (empty($opciones[2])==true){
						$opciones[2]=false;
					}
					if ($opciones[2]==true){
						echo "<p> Aceptado </p>";
					}else{
						echo "<p> Denegado </p>";
					}
					echo "<p> Como conociste la pagina: $conocerPagina </p>";	
				}
				else{					
					?>
					<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
						<p>Nombre : <input type="text" name="nombre" required 
						<?php if(isset($_POST['nombre']) && empty($mensajeError['errorNombre'])){ echo 'value="',$_POST['nombre'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorNombre']; ?></span></p>
						<p>Primer Apellido : <input type="text" name="apellido1" required 
						<?php if(isset($_POST['apellido1']) && empty($mensajeError['errorApellido1'])){ echo 'value="',$_POST['apellido1'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorApellido1']; ?></span></p>
						<p>Segundo Apellido : <input type="text" name="apellido2" required 
						<?php if(isset($_POST['apellido2']) && empty($mensajeError['errorApellido2'])){ echo 'value="',$_POST['apellido2'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorApellido2']; ?></span></p>
						<p>Calle :<input type="text" name="calle" required 
						<?php if(isset($_POST['calle']) && empty($mensajeError['errorCalle'])){ echo 'value="',$_POST['calle'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorCalle']; ?> </span>
						Numero: <input type="number" name="numeroCalle" min="1" max="1000" required 
						<?php if(isset($_POST['numeroCalle']) && empty($mensajeError['errorNumeroCalle'])){ echo 'value="',$_POST['numeroCalle'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorNumeroCalle']; ?></span><br/>
						Piso: <input type="number" name="pisoCalle" min="1" max="1000" 
						<?php if(isset($_POST['pisoCalle']) && empty($mensajeError['errorPisoCalle'])){ echo 'value="',$_POST['pisoCalle'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorPisoCalle']; ?></span>
						Letra: <input type="text" name="letraCalle" 
						<?php if(isset($_POST['letraCalle']) && empty($mensajeError['errorLetraCalle'])){ echo 'value="',$_POST['letraCalle'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorLetraCalle']; ?></span></p>
						<p>Fecha de Nacimiento: <input type="date" name="bday" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"
						<?php if(isset($_POST['bday']) && empty($mensajeError['errorBday'])){ echo 'value="',$_POST['bday'],'"';}?>>
						<span class="error"><?php echo $mensajeError['errorBday']; ?></span></p>
						<p> Genero:<br/>
							<input type="radio" name="genero" value="hombre"
							<?php if(!isset($_POST['genero'])){ echo "checked";}?>
							<?php if(isset($_POST['genero']) && $_POST['genero']=="hombre" ){ echo "checked";}?>>
							Hombre<br/>
							<input type="radio" name="genero" value="mujer"
							<?php if(isset($_POST['genero']) && $_POST['genero']=="mujer" ){ echo "checked";}?>>
							Mujer<br/>
						</p>
						<p>Usuario : <input type="text" name="usuario" required
						<?php if(isset($_POST['usuario']) && empty($mensajeError['errorUsuario'])){ echo 'value="',$_POST['usuario'],'"';}?>						>
						<span class="error"><?php echo $mensajeError['errorUsuario']; ?></span></p>
						<p>Correo electronico :<input type="email" name="email"
						<?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){ echo 'value="',$_POST['email'],'"';}?>>
						<span class="error"><?php echo $mensajeError['errorEmail']; ?></span></p>
						<p> Contraseña : <input type="password" name="contrasenia"><span class="error"><?php echo $mensajeError['errorContrasenia']; ?></span></p>
						<p> Repita la Contraseña : <input type="password" name="repitaContrasenia" ><span class="error"><?php echo $mensajeError['errorRepitaContrasenia']; ?></span></p>
						<span class="error"><?php echo $mensajeError['errorCoincideContrasenia']; ?></span>
						<textarea rows="4" cols="70">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Duis iaculis tortor ac enim dapibus varius. Integer non mattis 
						felis, non facilisis augue.
						Quisque felis est, varius ut dolor mattis, molestie malesuada quam. Ut sed convallis tortor. Sed vel lorem varius, mollis mauris eget, semper magna. Donec aliquet cursus posuere. In. 
						</textarea><br/>
						<?php if(isset($_POST['opciones'])){ $opciones=$_POST['opciones'];} ?>
						<input type="checkbox" name="opciones[]" value="true"   
						<?php if(isset($opciones[0]) && $opciones[0]==true){ echo "checked";} ?> required/>
						Acepto Termino y uso de Condiciones<br/>
						<input type="checkbox" name="opciones[]" value="true" 
						<?php if(isset($opciones[1]) && $opciones[1]==true){ echo "checked";} ?>/>
						Recibir Boletin Informativo<br/>
						<input type="checkbox" name="opciones[]" value="true" 
						<?php if(isset($opciones[2]) && $opciones[2]==true){ echo "checked";} ?>/>
						Recibir Novedades al correo<br/>
						<p> Como conociste la pagina:
							<select name="conocerPagina">
							  <option value="navegador"
							  <?php if(isset($_POST['conocerPagina']) && $_POST['conocerPagina']=="navegador"){ echo "selected";} ?>>
							  Por un Navegador de busqueda</option>
							  <option value="amigo"
							  <?php if(isset($_POST['conocerPagina']) && $_POST['conocerPagina']=="amigo"){ echo "selected";} ?>>
							  Amigo</option>
							  <option value="publicidad" 
							  <?php if(isset($_POST['conocerPagina']) && $_POST['conocerPagina']=="publicidad"){ echo "selected";} ?>>
							  Publicidad</option>
							  <option value="otro"
							  <?php if(isset($_POST['conocerPagina']) && $_POST['conocerPagina']=="otro"){ echo "selected";} ?>>
							  Otros</option>
							</select>
						</p>			
						<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
					</form>
			<?php	}
				?>
		</div>	
	</body>
</html>

















