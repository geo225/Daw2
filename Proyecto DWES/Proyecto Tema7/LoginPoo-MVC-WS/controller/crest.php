<?php
if (isset($_POST['altura'])){
    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];
    $datos=Rest::RestAltitud($latitud,$longitud);
}
if (isset($_POST['Volver'])){//Si se pulsa el boton de salir se destruye la sesion del usuario y se redirige a index.php 
    if (isset($_GET["ant"])){
        $anterior="Location: index.php?pagina=".$_GET['ant'];
        header($anterior);
    }else{
        header("Location: index.php"); 
    }
    
    }
else{
   $_GET["pagina"]="rest";
   include_once 'view/layout.php'; 
}
?>