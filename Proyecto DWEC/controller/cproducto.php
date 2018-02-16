<?php
    if(!isset($_GET['Producto'])){
         header("Location: index.php");
    }else{
        echo $_GET['Producto'];
        $producto=Producto::ObtenerProductoCod($_GET['Producto']);
        $_GET["pagina"]="producto";
        include_once 'view/layout.php';
    }