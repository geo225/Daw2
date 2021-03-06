<?php
/** 
 * clogin.php
 * Controlador encargado de la vista del Login
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 19/01/2018
 */ 
    $vista="login"; // variable que dice al layout.php que use vlogin.php 
	$usuario="";
	$password="";
	$login=false;
    $errorLogin="";
	$noError=true; 
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorUsuario"=>null,					
		"errorPassword"=>null,
	);
	//Si se ha enviado el Formulario Comprueba los errores	
	if (isset($_POST['enviarLogin'])){											
		//Comprobación de Errores
		$mensajeError["errorUsuario"]=comprobarTexto($_POST['usuario'],200);
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
		$objUser = Usuario::validarUsuario($usuario, $password); // Comprobacion del Usuario si es correcto devuelve un objeto de Usuario si no es null 
		if (isset($objUser)){//Comprueba si esta iniciado el objeto Usuario
		$_SESSION['usuario']  = $objUser; //Mete el objeto a la sesion de usuario
        if (isset($_COOKIE['ultimaConexion'.$usuario])) { 
            $_SESSION['ultimaConexion'.$usuario] = $_COOKIE['ultimaConexion'.$usuario]; 
        } 
        setcookie("ultimaConexion" . $usuario, date("j, n, Y, g:i:s a"), time() + 3600); 
		 header("Location: index.php"); //Redirige al index depues de realizar correctamente el login
		}else {
			$errorLogin="Usuario y contraseña incorrecto"; //Carga el error en el login
            require_once 'view/layout.php'; // Vuelve a cargar la vista con el error del login
		}
    }else{
    require_once 'view/layout.php'; // Si hay errores o no se ha enviado el formulario carga la vista otra vez
     }
?>
