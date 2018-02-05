<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Tema 5<br/>Encuesta</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/003-casa.png"/>Inicio</a> 
    <a href="Encuesta.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/002-anadir.png"/> Realizar Encuesta</a> 
    <a href="resultado.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/001-ojo.png"/> Ver Resultados</a> 
    <a href="codEncuesta.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="Images/004-codificacion.png"/>Ver Codigo</a> 
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 4</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Proyecto Encuesta</b></h1>
  </div>
  <!-- Codigo PHP -->
<?php
	//Implementamos la libreria de funciones y el fichero de configuración para la conexion a la base de datos
	require '../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
	require 'config.php';
	//Declaración y inicialización de las variables
	$nombreApellidos="";
	$estudios="";
	$disponibilidad="";
	$distancia="";
    $carrera="";
    $email="";
	$noError=true;
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorNombreApellidos"=>null,					
		"errorEstudios"=>null,
		"errorDisponibilidad"=>null,
		"errorDistancia"=>null,
		"errorCarrera"=>null,
		"errorEmail"=>null,
		"errorDuplicacion"=>null
	);
	//Si se ha enviado el Formulario Comprueba los errores	
	if (isset($_POST['enviarFormulario'])){											
		//Comprobación de Errores
		$mensajeError["errorNombreApellidos"]=comprobarTexto($_POST['nombreApellidos'],200);
		$mensajeError["errorEstudios"]=comprobarTexto($_POST['nombreApellidos'],200);
		$mensajeError["errorDisponibilidad"]=comprobarEntero($_POST['disponobilidad'];
		$mensajeError["errorDistancia"]=comprobarFloat($_POST['distancia']);
		$mensajeError["errorCarrera"]=comprobarTexto($_POST['carrera'],255);
		$mensajeError["errorEmail"]=validarEmail($_POST['email']);
		// Conexion a la base de datos para comprobar que la clave de la base de datos no esta repetida
		$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consulta = "SELECT Dni from Datos  "; 
		$consulta = $conn->prepare($consulta);
		$consulta->execute();
		while ($resultado = $consulta->fetch(PDO::FETCH_OBJ)) {
			$dniDuplicado= $resultado->Dni;
			if (strtoupper($_POST['dni']) == $dniDuplicado){
			$mensajeError['errorDuplicacion']="Clave Duplicada";		
			}
		}	
		$conn = null; 
		//Comprobación de que los errores estan vacios para saber que no ha ocurrido ningun error
		foreach ($mensajeError as &$valor){					
			if ($valor!=null){
				$noError=false;
			}
		}	
	}
	//Si se ha enviado el Formulario y no hay errores trantamiento de los datos
	if (isset($_POST['enviarFormulario']) && $noError==true){
		//Tratamiento de los datos antes de la inserción
		$nombreApellidos=htmlspecialchars(strip_tags(trim($_POST['nombreApellidos'])));
		$dni=strtoupper(htmlspecialchars(strip_tags(trim($_POST['dni']))));;
		$bday=$_POST['bday'];
		$satisfacion=htmlspecialchars(strip_tags(trim($_POST['satisfacion'])));
		$valoracion=$_POST['valoracion'];
		$email=$_POST['email'];		
		$ip=$_SERVER['REMOTE_ADDR'];
		$opinion=$_POST['opinion'];
		//Conexión a la base de datos
		try{
						$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
						//Consulta para insertas los datos
						$consulta = "INSERT INTO Datos (Dni, NombreApellido, Bday, Satisfacion, Valoracion, correo, ip, opinion) values (:dni,:nombreApellidos,:bday,:satisfacion,:valoracion,:correo,:ip,:opinion)"; 
						//Preparamos la consulta 
						$sentencia = $conn->prepare($consulta); 
						//Preparando los datos que se van a enviar a la consulta 
						$sentencia->bindParam(':dni', $dni);
						$sentencia->bindParam(':nombreApellidos', $nombreApellidos);
						$sentencia->bindParam(':bday', $bday);
						$sentencia->bindParam(':satisfacion', $satisfacion);
						$sentencia->bindParam(':valoracion', $valoracion);
						$sentencia->bindParam(':correo', $email);
						$sentencia->bindParam(':ip', $ip);
						$sentencia->bindParam(':opinion', $opinion);	
						//La ejecutamos
						$sentencia->execute();
						echo "Encuesta realizada con exito";
						echo "<br/>Se le redireccionará a la pagina de inicio en 3 segundos";
						echo 	'<script type="text/javascript">
								function redireccionar(){
								window.location="index.php";
								} 
								setTimeout ("redireccionar()", 3000);
								</script>';	
						//Cerramos la conexión con la base de datos
						$conn = null;
					} 
					//Si ha ocurrido un error vuelve a mostrar el formulario
					catch (PDOException $e) {	
					echo "Ha ocurrido un error Critico";
						echo "<br/>Se le redireccionará a la pagina de inicio en 3 segundos";
						echo 	'<script type="text/javascript">
								function redireccionar(){
								window.location="index.php";
								} 
								setTimeout ("redireccionar()", 3000);
								</script>';	
						//Cerramos la conexión con la base de datos
						$conn = null; 
					}
	//Formulario que se muestra si no se ha enviado el formulario o ha tenido errores
	}else{?>
		<div class="w3-container" id="contact" style="margin-top:75px;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Realizar Encuesta</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="w3-section">
					<label class="w3-col">Nombre y Apellidos* <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorNombreApellidos']; ?></span></label>
					<input class="w3-input w3-border w3-half" type="text" name="nombreApellidos" required value="<?php if(isset($_POST['nombreApellidos'])){ echo $_POST['nombreApellidos'];} ?>" >
					</input>
					<label class="w3-col">DNI* <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorDni']; echo $mensajeError['errorDuplicacion']; ?></span></label>
					<input class="w3-input w3-border w3-half" type="text" name="dni" required value="<?php if(isset($_POST['dni'])){ echo $_POST['dni'];} ?>" >
					</input>
					<label class="w3-col">Fecha Nacimiento* <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorBday']; ?></span></label>
					<input class="w3-input w3-border w3-half" type="date" name="bday" required value="<?php if(isset($_POST['bday'])){ echo $_POST['bday'];} ?>" >
					</input>
					<label class="w3-col">Grado de Satisfación* <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorSatisfacion']; ?></span></label>
					<input class="w3-input w3-border w3-half" type="number" name="satisfacion" min="0" max="10" required value="<?php if(isset($_POST['satisfacion'])){ echo $_POST['satisfacion'];} ?>" >
					</input>
					<label class="w3-col">Valoración de los materiales entregados por el profesor</label>
					<select class="w3-input w3-border w3-half" name="valoracion">
							<option class="w3-input w3-border w3-quarter" value="" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']==null){ echo "selected";} ?>> 
							</option>					
                            <option class="w3-input w3-border w3-quarter" value="malos" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']=="malos"){ echo "selected";} ?>> 
							Malos</option>
							<option class="w3-input w3-border w3-quarter" value="muy mejorables" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']=="muy mejorables"){ echo "selected";} ?>> 
                            Muy Mejorables</option>
							<option class="w3-input w3-border w3-quarter" value="regulares" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']=="regulares"){ echo "selected";} ?>> 
                            Regulares</option>
							<option class="w3-input w3-border w3-quarter" value="buenos" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']=="buenos"){ echo "selected";} ?>> 
                            Buenos</option>
							<option class="w3-input w3-border w3-quarter" value="muy buenos" 
                            <?php if(isset($_POST['valoracion']) && $_POST['valoracion']=="muy buenos"){ echo "selected";} ?>> 
                            Muy Buenos</option>							
                    </select></br> 
					<label class="w3-col">Correo Electronico* <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorEmail']; ?></span></label>
					<input class="w3-input w3-border w3-half "  type="email" name="email" required value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" >
					</input><br>
					<label class="w3-col">Opinion: <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorOpinion']; ?></span></label> 
					<textarea class="w3-input w3-border w3-half" style="margin-right:300px;"rows="7" cols="50" name="opinion" ><?php if(isset($_POST['opinion'])){ echo $_POST['opinion'];}?></textarea><br> 
					
					<button name="enviarFormulario" type="submit" class="w3-button w3-border w3-block w3-third w3-red w3-margin-bottom" style="margin-top:30px;" value="Enviar">Enviar</button><br/>
				</div>			
			</form>
		</div>
	<?php } ?>
</div>
 
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="#" title="W3.CSS" target="_blank" class="w3-hover-opacity">Rodrigo Gutierrez</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>

</body>
</html>
