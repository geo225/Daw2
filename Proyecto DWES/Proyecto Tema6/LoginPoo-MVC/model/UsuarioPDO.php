<?php
require_once("DBPDO.php");// incluimos la clase DBPDO
/** 
 * Class UsuarioPDO 
 * @author  Rodrigo Gutiérrez Ollé
 *
 *Fecha de última modificación 18/01/2018
 */
    class UsuarioPDO{
        /** 
         * Función para validar el usuario 
         * 
         * Funcion a la que se le pasan los parametros codUsuario y password y usa el metodo ejercutarConsulta de la clase 
         * DBPDO, devuelve una array asociativa del usuario. 
         * 
         * @param   string  $codUsuario Codigo del usuario que le pasamos. 
         * @param   string  $password   Contraseña del usuario. 
         * 
         * @return array   $arrayUsuario    Array asociativo con los datos del usuario 
         */
        public static function validarUsuario($codUsuario, $password){ 
            $sql = "Select * from Usuarios WHERE codUsuario=? and password=?";
            $arrayUsuario=[]; 
            $resultadoConsulta=DBPDO::ejecutarConsulta($sql,[$codUsuario,$password]); 
            if ($resultadoConsulta->rowCount()==1) { 
                $resultadoFetch = $resultadoConsulta->fetchObject(); 
                $arrayUsuario['descUsuario'] = $resultadoFetch->descUsuario; 
                $arrayUsuario['perfil'] = $resultadoFetch->perfil; 
                $arrayUsuario['ultimaConexion'] = $resultadoFetch->ultimaConexion; 
                $arrayUsuario['contadorAccesos'] = $resultadoFetch->contadorAccesos; 
            } 
            return $arrayUsuario; 
        } 
        
    }