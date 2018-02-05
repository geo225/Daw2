<?php
/** 
 * Index.php
 * Pagina Principal del Programa es la que se carga cuando se inicia el programa
 *
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 19/01/2018
 */ 
    include_once ('model/Usuario.php'); //incluimos el Modelo
 require 'core/FuncionesValidacion.php'; // Incluidos las funciones de Validacion
    session_start(); // Iniciamos una session o reanudamos la session
    if (isset($_SESSION['usuario'])){ //Comprobamos si esta iniciada la sesion de usuario
        require_once 'controller/cinicio.php'; //Si esta iniciada cargamos el controlador de Inicio
    }else{
        require_once 'controller/clogin.php'; //Si no esta iniciada cargamos el controlador de Login
    }
?>