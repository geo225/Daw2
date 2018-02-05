<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/DAW204/public_html/estilos2.css">
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
	<a href="../tema5.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/006-flecha-atras.png"/>volver</a>
	<a href="codEncuesta.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/007-codificacion.png"/>Codigo</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 5</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Encuesta</b></h1>
  </div>
	<!-- Codigo PHP -->
<?php
	//Implementamos la libreria de funciones y el fichero de configuración para la conexion a la base de datos
	require '../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
	require 'config.php';
	//Declaración y inicialización de las variables
	$usuario="";
	$password="";
	$login=false;
	$noError=true;
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorUsuario"=>null,					
		"errorPassword"=>null,
	);
	//Si se ha enviado el Formulario Comprueba los errores	
	if (isset($_POST['enviarLogin'])){											
		//Comprobación de Errores
		$mensajeError["errorUsuario"]=comprobarTexto($_POST['usuario'],10);
		$mensajeError["errorPassword"]=comprobarAlfaNumerico($_POST['password'],10);
		//Comprobación de que los errores estan vacios para saber que no ha ocurrido ningun error
		foreach ($mensajeError as &$valor){					
			if ($valor!=null){
				$noError=false;
			}
		}	
	}
	//Si se ha enviado el Formulario y no hay errores trantamiento de los datos
	if (isset($_POST['enviarLogin']) && $noError==true){
		//Tratamiento de los datos antes de la inserción
		$usuario=htmlspecialchars(strip_tags(trim($_POST['usuario'])));
		$password=hash('sha256',$_POST['password']);
		//Conexión a la base de datos
		try{
			$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$consulta = "INSERT INTO Usuarios (usuario,password) values (:user,:pass)"; 
			$consulta = $conn->prepare($consulta);
			$consulta->bindParam(':user', $usuario);
			$consulta->bindParam(':pass', $password);
			$consulta->execute();
		}catch (PDOException $e){
			print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
		}finally{
			unset($conn);
		}
			echo "Usuario Creado con exito";
			echo "<br/>Se le redireccionará a la pagina de inicio en 2 segundos";
            echo 	'<script type="text/javascript">
						function redireccionar(){
							window.location="index.php";
						} 
						setTimeout ("redireccionar()", 2000);
					</script>';		
//Formulario que se muestra si no se ha enviado el formulario o ha tenido errores
	}else{?>		
	<!-- Formulario -->	
		<div class="w3-container" id="contact" style="margin-top:75px;">
			<h1 class="w3-xxxlarge w3-text-red"><b>Registro</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
		<form id="formulario" name="FormularioLogin" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="w3-section w3-half">
            <label>ID Ususario<span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorUsuario'];?></span></label>
            <input class="w3-input w3-border" type="text" name="usuario" id="usuario"value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>" >
            <label>Contraseña <span class="w3-text-red w3-margin-left"><?php echo $mensajeError['errorPassword'];?></span></label>
            <input class="w3-input w3-border w3-margin-bottom" type="password" name="password" id="password" >    
            <button name="enviarLogin" type="submit" class="w3-button w3-red w3-margin-bottom " value="login">Registrar</button><br/>
			</div>      
        </form>
    </div>
	<?php } ?>
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
