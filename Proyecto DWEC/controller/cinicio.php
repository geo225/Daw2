<?php
/** 
 * cinicio.php
 * Controlador de la Vista de Inicio que es la pagina principal una vez logeado
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 19/01/2018
 */
    $productos=Producto::listarProductos();
if (isset($_POST['Salir'])){//Si se pulsa el boton de salir se destruye la sesion del usuario y se redirige a index.php 
        unset($_SESSION['usuario']); 
        session_destroy(); 
        header("Location: index.php"); 
    } 
if (isset($_POST['Busqueda'])){
    $buscar=$_POST['buscar'];
    $productos=Producto::buscarDescProducto($buscar);
}
if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php");
        
    }else{
        $_GET["pagina"]="inicio";
        include_once 'view/layout.php';
    } 
    

?>