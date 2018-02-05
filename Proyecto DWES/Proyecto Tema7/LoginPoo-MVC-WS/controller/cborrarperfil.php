<?php
$errorBorrar="";    
    if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php");       
    }else{
        if(isset($_POST['enviarBorrar'])){
            if($_POST['enviarBorrar']=="si"){
               if($_SESSION['usuario']->borrarUsuario()){
                unset($_SESSION['usuario']); 
                session_destroy();    
                header('Location: index.php');	
                }else{
                    $errorBorrar="Error al Borrar el Perfil";
                    $_GET["pagina"]="borrarperfil";
                    include_once 'view/layout.php';  
               } 
            }
            else {
            header("Location: index.php?pagina=perfil");
            }
        }else{
            
        }       
        $_GET["pagina"]="borrarperfil";
        include_once 'view/layout.php';
    }
