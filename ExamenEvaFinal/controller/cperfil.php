<?php
/**
 * ccodigo.php
 * Controlador de la Vista de vperfil que es una pagina que te muestra la informacion de tu perfil
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 25/01/2018
 */

if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php.
        header("Location: index.php");
    }else{
    $descUsuario="";
	$password="";
	$errorEditar="";
	$noError=true;
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorPassword"=>null,
        "errorDescUsuario"=>null
	);
	//Si se ha enviado el Formulario Comprueba los errores
	if (isset($_POST['enviarEditar'])){
		//Comprobación de Errores
		$mensajeError["errorPassword"]=comprobarAlfaNumerico($_POST['password'],10,1,0);
		$mensajeError["errorDescUsuario"]=comprobarAlfanumerico($_POST['descUsuario'],255);
		foreach ($mensajeError as &$valor){
			if ($valor!=null){
				$noError=false;
			}
		}
    }
	//Si se ha enviado el Formulario y no hay errores trantamiento de los datos
	if (isset($_POST['enviarEditar']) && $noError==true){
		//Tratamiento de los datos antes de la inserción
		if(!empty($_POST['password'])){
            $password=hash('sha256',$_POST['password']);
        }
        $descUsuario=$_POST['descUsuario'];
        if( $_SESSION['usuario']->editarUsuario($descUsuario,$password)){
            header('Location: index.php');
        }else{
            $errorEditar="Error al editar el Perfil";
            $_GET["pagina"]="perfil";
        include_once 'view/layout.php';
        }

//Formulario que se muestra si no se ha enviado el formulario o ha tenido errores
	}else{
        $_GET["pagina"]="perfil";
        include_once 'view/layout.php';
    }
}
?>
