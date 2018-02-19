<?php
    if(isset($_SESSION['usuario'])){
    if(!isset($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()])){
        $_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]=new Carrito($_SESSION['usuario']->getCodUsuario(),[]);
    }
    if(isset($_GET['codProducto'])){
        if (!$_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->comprobarProducto($_GET['codProducto'])){
            $_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->agregarProducto($_GET['codProducto']);
        }else{
            echo "<script type=\"text/javascript\">alert(\"Producto ya agregado\");</script>";  
        }
        
    }
    if (isset($_GET['borrarProducto'])){
        $_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->borrarProducto($_GET['borrarProducto']);
    }
    $_GET["pagina"]="carrito";
    include_once 'view/layout.php';
    } else{
        header("Location: index.php");
    }
?>
