<?php
/** 
 * cWIP.php
 * Controlador de la Vista de WIP que es una pagina que te informa que esta en construccion
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 19/01/2018
 */ 
if (isset($_POST['Volver'])){//Si se pulsa el boton de salir se destruye la sesion del usuario y se redirige a index.php 
    if (isset($_GET["ant"])){
        $anterior="Location: index.php?pagina=".$_GET['ant'];
        header($anterior);
    }else{
        header("Location: index.php"); 
    }      
    }
else{
   $_GET["pagina"]="WIP";
   include_once 'view/layout.php'; 
} 
?>
