<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 20</h1>
		<h2>20. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página
tratamiento.php para que muestre las preguntas y las respuestas recogidas.</h2>
		<div id="ejercicio">
			<form name="FormularioRegistro" action="tratamientoEjercicio20.php" method="post">
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
				<p><input type="submit" /><input type="reset" /></p>				
			</form>
		</div>	
	</body>
</html>