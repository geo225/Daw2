<?php
    if(isset($_SESSION['usuario'])){
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito']=new Carrito(1,[]);
    }
    if(isset($_GET['codProducto'])){
        if (!$_SESSION['carrito']->comprobarProducto($_GET['codProducto'])){
            $_SESSION['carrito']->agregarProducto($_GET['codProducto']);
        }else{
            echo "<script type=\"text/javascript\">alert(\"Producto ya agregado\");</script>";  
        }
        
    }
    if (isset($_POST['borrarProducto'])){
        $_SESSION['carrito']->borrarProducto($_POST['borrarProducto']);
    }
    $_GET["pagina"]="carrito";
    include_once 'view/layout.php';
    } else{
        header("Location: index.php");
    }
?>