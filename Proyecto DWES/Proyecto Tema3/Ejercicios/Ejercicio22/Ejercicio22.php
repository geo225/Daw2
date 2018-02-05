<!DOCTYPE html>
<html lang="es">
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 22</h1>
		<h2>22. Construir un formulario para recoger un cuestionario 
		realizado a una persona y mostrar en la misma página las
		preguntas y las respuestas recogidas en el caso de que alguna 
		respuesta esté vacía o errónea volverá a salir el
		formulario con el mensaje correspondiente.</h2>	
		<div id="ejercicio">
		<?php
				require '../../Libreria/FuncionesValidacion.php';
				$noError=true;
				$mensajeError;
				if (isset($_POST['enviarFormulario'])){						
					$mensajeError["errorNombre"]=comprobarTexto($_POST['nombre'],50,0,1);
					$mensajeError["errorApellido1"]=comprobarTexto($_POST['apellido1'],50,0,1);
					$mensajeError["errorApellido2"]=comprobarTexto($_POST['apellido2'],50,0,1);					
					$mensajeError["errorCalle"]=comprobarTexto($_POST['calle'],100,0,1);										
					$mensajeError["errorNumeroCalle"]=comprobarEntero($_POST['numeroCalle'],1);					
					$mensajeError["errorPisoCalle"]=comprobarEntero($_POST['pisoCalle'],0);					
					$mensajeError["errorLetraCalle"]=comprobarTexto($_POST['letraCalle'],0,0,0);					
					$mensajeError["errorUsuario"]=comprobarAlfaNumerico($_POST['usuario'],50,4,1);					
					$mensajeError["errorEmail"]=validarEmail($_POST['email'],100,0,1);
					$mensajeError["errorContrasenia"]=comprobarAlfaNumerico($_POST['contrasenia'],8,4,1);					
					$mensajeError["errorRepitaContrasenia"]=comprobarAlfaNumerico($_POST['repitaContrasenia'],8,4,1);					
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
					$nombre=$_POST['nombre'];
					$apellido1=$_POST['apellido1'];
					$apellido2=$_POST['apellido2'];
					$calle=$_POST['calle'];
					$numeroCalle=$_POST['numeroCalle'];
					$pisoCalle=$_POST['pisoCalle'];
					$letraCalle=$_POST['letraCalle'];
					$bday=$_POST['bday'];
					$genero=$_POST['genero'];
					$usuario=$_POST['usuario'];
					$email=$_POST['email'];
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
						<p>Nombre : <input type="text" name="nombre" required /><?php if(isset($mensajeError['errorNombre'])){echo $mensajeError['errorNombre'];} ?></p>
						<p>Primer Apellido : <input type="text" name="apellido1" required /><?php if(isset($mensajeError['errorApellido1'])){echo $mensajeError['errorApellido1'];} ?></p>
						<p>Segundo Apellido : <input type="text" name="apellido2" required /><?php if(isset($mensajeError['errorApellido2'])){echo $mensajeError['errorApellido2'];} ?></p>
						<p>Calle :<input type="text" name="calle" required /><?php if(isset($mensajeError['errorCalle'])){echo $mensajeError['errorCalle'];} ?> 
						Numero: <input type="number" name="numeroCalle" min="1" max="1000" required /><?php if(isset($mensajeError['errorNumeroCalle'])){echo $mensajeError['errorNumeroCalle'];} ?><br/>
						Piso: <input type="number" name="pisoCalle" min="1" max="1000" /><?php if(isset($mensajeError['errorPisoCalle'])){echo $mensajeError['errorPisoCalle'];} ?>
						Letra: <input type="text" name="letraCalle" /><?php if(isset($mensajeError['errorLetraCalle'])){echo $mensajeError['errorLetraCalle'];} ?></p>
						<p>Fecha de Nacimiento: <input type="date" name="bday" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"></p>
						<p> Genero:<br/>
							<input type="radio" name="genero" value="hombre" checked>Hombre<br/>
							<input type="radio" name="genero" value="mujer">Mujer<br/>
						</p>
						<p>Usuario : <input type="text" name="usuario" required ><?php if(isset($mensajeError['errorUsuario'])){echo $mensajeError['errorUsuario'];} ?></p>
						<p>Correo electronico :<input type="email" name="email"><?php if(isset($mensajeError['errorEmail'])){echo $mensajeError['errorEmail'];} ?></p>
						<p> Contraseña : <input type="password" name="contrasenia"<?php if(isset($mensajeError['errorContrasenia'])){echo $mensajeError['errorContrasenia'];} ?>></p>
						<p> Repita la Contraseña : <input type="password" name="repitaContrasenia" <?php if(isset($mensajeError['errorRepitaContrasenia'])){echo $mensajeError['errorRepitaContrasenia'];} ?>></p>
						<?php if(isset($mensajeError['errorCoincideContrasenia'])){echo "<p>"+$mensajeError['errorCoincideContrasenia']+"</p>";} ?>
						<textarea rows="4" cols="70">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Duis iaculis tortor ac enim dapibus varius. Integer non mattis 
						felis, non facilisis augue.
						Quisque felis est, varius ut dolor mattis, molestie malesuada quam. Ut sed convallis tortor. Sed vel lorem varius, mollis mauris eget, semper magna. Donec aliquet cursus posuere. In. 
						</textarea><br/>
						<input type="checkbox" name="opciones[]" value="true" required>Acepto Termino y uso de Condiciones<br/>
						<input type="checkbox" name="opciones[]" value="true" >Recibir Boletin Informativo<br/>
						<input type="checkbox" name="opciones[]" value="true">Recibir Novedades al correo<br/>
						<p> Como conociste la pagina:
							<select name="conocerPagina">
							  <option value="navegador">Por un Navegador de busqueda</option>
							  <option value="amigo">Amigo</option>
							  <option value="publicidad" >Publicidad</option>
							  <option value="otro">Otros</option>
							</select>
						</p>			
						<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
					</form>
			<?php	}
				?>
		</div>	
	</body>
</html>

















