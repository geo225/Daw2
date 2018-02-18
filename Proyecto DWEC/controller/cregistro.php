<?php
/** 
 * cregistro.php
 * Controlador de la Vista de Registro para crear un nuevo usuario
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 24/01/2018
 */


    $usuario="";
	$password="";
    $password2="";
    $apellidos="";
    $direccion="";
    $email="";
    $errorRegistro="";
    
	$noError=true;
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorUsuario"=>null,
        "errorUsuarioDuplicado"=>null,
		"errorPassword"=>null,
        "errorApellidos"=>null,
        "errorDireccion"=>null,
        "errorEmail"=>null,
        "errorDuplicado"=>null
	);
	//Si se ha enviado el Formulario Comprueba los errores	
	if (isset($_POST['enviarReg'])){
		//Comprobación de Errores
		$mensajeError["errorUsuario"]=comprobarTexto($_POST['usuario'],10);
		$mensajeError["errorPassword"]=comprobarAlfaNumerico($_POST['password'],10);
        $mensajeError["errorApellidos"]=comprobarAlfaNumerico($_POST['Apellidos'],255);
        $mensajeError["errorDireccion"]=comprobarAlfaNumerico($_POST['Direccion'],255);
        $mensajeError["errorEmail"]=validarEmail($_POST['Email'],255);
		//Comprobación de que los errores estan vacios para saber que no ha ocurrido ningun error
        if ($_POST['password']!=$_POST['password2']){
            $mensajeError["errorDuplicado"]="Las Contraseñas no coinciden";
        }
        if (Usuario::consultarUsuario($_POST['usuario'])){
            $mensajeError['errorUsuarioDuplicado']="El Usuario ya existe";
        }
		foreach ($mensajeError as &$valor){					
			if ($valor!=null){
				$noError=false;
			}
		}
        
    }
	//Si se ha enviado el Formulario y no hay errores trantamiento de los datos
	if (isset($_POST['enviarReg']) && $noError==true){
		//Tratamiento de los datos antes de la inserción
		$usuario=htmlspecialchars(strip_tags(trim($_POST['usuario'])));
		$password=hash('sha256',$_POST['password']);
        $apellidos=$_POST['Apellidos'];
        $direccion=$_POST['Direccion'];
        $email=$_POST['Email'];
        $objUser = Usuario::registrarUsuario($usuario,$password,$apellidos,$direccion,$email);
        if (isset($objUser)){
            echo "Usuario Creado con exito";
            $_SESSION['usuario']=$objUser;
            Usuario::UltimaConexionyAcceso($objUser->getCodUsuario()); 
            header("Location: index.php"); //Redirige al index depues de realizar correctamente el Registro
        }else{
            $errorRegistro="No se ha podido crear al Usuario"; //Carga el error en el login
            $_GET["pagina"]='registro';
            include_once "view/layout.php";  // Vuelve a cargar la vista con el error del Registro
        }	
//Formulario que se muestra si no se ha enviado el formulario o ha tenido errores
	}else{
        $_GET["pagina"]='registro';
        include_once 'view/layout.php';  
    }
