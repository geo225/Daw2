<?php
/** 
 * Index.php
 * Pagina Principal del Programa es la que se carga cuando se inicia el programa
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 19/01/2018
 */ 
    require_once ('model/Producto.php'); //incluimos el Modelo
    require_once ('model/Usuario.php');
    require_once ('model/Carrito.php');
    require_once ('config/config.php'); //incluimos el Fichero de configuración
 require 'core/FuncionesValidacion.php'; // Incluidos las funciones de Validacion
    session_start(); // Iniciamos una session o reanudamos la session
    $controladorActual=$controladores["inicio"];
if (isset($_SESSION['usuario']) && !isset($_GET['pagina'])){ //Comprobamos si esta iniciada la sesion de usuario
        include_once $controladorActual; //Si esta iniciada cargamos el controlador de Inicio
    }    
if (isset($_GET['pagina'])){
    $controladorActual=$controladores[$_GET['pagina']];
    include_once $controladorActual;
    } else{
        $controladorActual=$controladores['login'];
         include_once $controladorActual;  //Si no esta iniciada cargamos el controlador de Login
    }
?>
