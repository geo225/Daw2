<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 21</h1>
		<h2>21. Construir un formulario para recoger un cuestionario 
		realizado a una persona y mostrar en la misma página las
		preguntas y las respuestas recogidas.</h2>	
		<div id="ejercicio">
		<?php
				if (isset($_POST['enviarFormulario'])){
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
						<p>Nombre : <input type="text" name="nombre" required /></p>
						<p>Primer Apellido : <input type="text" name="apellido1" required /></p>
						<p>Segundo Apellido : <input type="text" name="apellido2" required /></p>
						<p>Calle :<input type="text" name="calle" required /> Numero: <input type="number" name="numeroCalle" min="1" max="1000" required /><br/>Piso: <input type="number" name="pisoCalle" min="1" max="1000" />Letra: <input type="text" name="letraCalle" />
						<p>Fecha de Nacimiento: <input type="date" name="bday" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"></p>
						<p> Genero:<br/>
							<input type="radio" name="genero" value="hombre" checked>Hombre<br/>
							<input type="radio" name="genero" value="mujer">Mujer<br/>
						</p>
						<p>Usuario : <input type="text" name="usuario" required ></p>
						<p>Correo electronico :<input type="email" name="email"></p>
						<p> Contraseña : <input type="password" name="contrasenia"></p>
						<p> Repita la Contraseña : <input type="password" name="repitaContrasenia"></p>
						<textarea rows="4" cols="70">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis tortor ac enim dapibus varius. Integer non mattis felis, non facilisis augue. Quisque felis est, varius ut dolor mattis, molestie malesuada quam. Ut sed convallis tortor. Sed vel lorem varius, mollis mauris eget, semper magna. Donec aliquet cursus posuere. In. 
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
						<p><input name="enviarFormulario" type="submit" value="submit" /><input type="reset" /></p>				
					</form>
			<?php	}
				?>
		</div>	
	</body>
</html>