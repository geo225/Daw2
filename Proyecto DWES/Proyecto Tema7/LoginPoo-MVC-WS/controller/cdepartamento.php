<?php
    if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php"); 
    }else{
        if(isset($_POST['Buscar'])){
            $descDepartamento=$_POST['desc'];
            $departamentos=Departamento::buscarDescDepartamento($descDepartamento);
        }else{
            $departamentos=Departamento::listarDepartamentos();
        }
        $_GET["pagina"]="departamento";
        include_once 'view/layout.php';
    }