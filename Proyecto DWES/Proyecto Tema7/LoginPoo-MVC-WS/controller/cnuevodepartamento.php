<?php
/** 
 * cregistro.php
 * Controlador de la Vista de Registro para crear un nuevo usuario
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 24/01/2018
 */
 if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php");       
    }else{
     $codDepartamento="";
     $descDepartamento="";
     $capacidad="";
     $errorRegistro="";
     $noError=true;
     $mensajeError = array(
		"errorCodDepartamento"=>null,
        "errorCodDepartamentoDuplicado"=>null,
        "errorDescDepartamento"=>null,
		"errorCapacidad"=>null,
       );
     if (isset($_POST['enviarDepartamento'])){
        $mensajeError['errorCodDepartamento']=comprobarCodigo($_POST['codDepartamento'],3,3);
        $mensajeError['errorDescDepartamento']=comprobarAlfaNumerico($_POST['descDepartamento'],255);
        $mensajeError['errorCapacidad']=comprobarEntero($_POST['capacidad']);
        if (!empty(Departamento::ObtenerDepartamento($_POST['codDepartamento']))){
            $mensajeError['errorCodDepartamentoDuplicado']="Error codigo ya en uso";
        }
         foreach ($mensajeError as &$valor){					
			if ($valor!=null){
				$noError=false;
			}
         }
     }
     if (isset($_POST['enviarDepartamento']) && $noError==true){
         $codDepartamento=strtoupper($_POST['codDepartamento']);
         $descDepartamento=$_POST['descDepartamento'];
         $capacidad=$_POST['capacidad'];
         $creador=$_SESSION['usuario']->getCodUsuario();
         $objDepartamento = Departamento::nuevoDepartamento($codDepartamento,$descDepartamento,$capacidad,$creador);
         if (isset($objDepartamento)){
             header ("Location: index.php?pagina=departamento");
         }else{
            $errorRegistro="No se ha podido crear al Usuario"; //Carga el error en el login
            $_GET["pagina"]='nuevodepartamento';
            include_once "view/layout.php";  
         }
         
     }else{
        $_GET["pagina"]='nuevodepartamento';
        include_once 'view/layout.php';  
    }
 }