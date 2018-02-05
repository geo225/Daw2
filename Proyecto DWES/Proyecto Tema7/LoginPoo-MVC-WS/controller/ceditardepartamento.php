<?php
    if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php");       
    }else{
    $descDepartamento="";
	$capacidad="";
	$errorEditar="";
	$noError=true;
    $departamento=Departamento::ObtenerDepartamento($_GET['Departamento']);
	//Declaración de la Array de Errores y inicialización
	$mensajeError = array(
		"errorDescDepartamento"=>null,
        "errorCapacidad"=>null
	);
	//Si se ha enviado el Formulario Comprueba los errores	
	if (isset($_POST['enviarEditar'])){											
		//Comprobación de Errores
		$mensajeError["DescDepartamento"]=comprobarAlfaNumerico($_POST['descDepartamento'],255);
		$mensajeError["errorCapacidad"]=comprobarEntero($_POST['capacidad']);
		foreach ($mensajeError as &$valor){					
			if ($valor!=null){
				$noError=false;
			}
		}
    }
	//Si se ha enviado el Formulario y no hay errores trantamiento de los datos
	if (isset($_POST['enviarEditar']) && $noError==true){
		//Tratamiento de los datos antes de la inserción
        $descDepartamento=$_POST['descDepartamento'];
        $capacidad=$_POST['capacidad'];
        if( $departamento->editarDepartamento($descDepartamento,$capacidad)){
            header('Location: index.php?pagina=departamento');	
        }else{
            $errorEditar="Error al editar el Departamento";
            $_GET["pagina"]="editardepartamento";
        include_once 'view/layout.php';
        }
        
//Formulario que se muestra si no se ha enviado el formulario o ha tenido errores
	}else{  
        $_GET["pagina"]="editardepartamento";
        include_once 'view/layout.php';
    } 
}
?>

