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
                $arrayUsuario['perfil'] = $resultadoFetch->perfil; 
                $arrayUsuario['ultimaConexion'] = $resultadoFetch->ultimaConexion; 
                $arrayUsuario['contadorAccesos'] = $resultadoFetch->contadorAccesos;
                $arrayUsuario['Apellidos'] = $resultadoFetch->Apellidos;
                $arrayUsuario['Direccion'] = $resultadoFetch->Direccion;
                $arrayUsuario['Email'] = $resultadoFetch->Email;
            } 
            return $arrayUsuario; 
        }
        public static function registrarUsuario($codUsuario,$password,$Apellidos,$Direccion,$Email){
            $altaCorrecta=true;
            $sql = "Insert into Usuarios values (?,?,'usuario',CURDATE(),0,?,?,?) ";
            $resultado= DBPDO::ejecutarConsulta($sql,[$codUsuario,$password,$Apellidos,$Direccion,$Email]);
            if ($resultado->rowCount()!=1){
                $altaCorrecta = false;
            }
            return $altaCorrecta;
        }
        public static function UltimaConexion($codUsuario){
            $sql="Update Usuarios set ultimaConexion='".date("y-m-d")."' where codUsuario=?";
            DBPDO::ejecutarConsulta($sql,[$codUsuario]);
        }
        public static function AumentarAccesos($codUsuario){
            $sql="Update Usuarios set contadorAccesos=contadorAccesos+1 where codUsuario=?";
            DBPDO::ejecutarConsulta($sql,[$codUsuario]);
        }
        public static function editarUsuario($codUsuario,$password,$Apellidos,$Direccion,$Email){
            $correcto=true;
            $sql="Update Usuarios set password=?, Apellidos=?, Direccion=?, Email=? where codUsuario=?";
            $resultado= DBPDO::ejecutarConsulta($sql,[$password,$Apellidos,$Direccion,$Email,$codUsuario]);
            if($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
        }
        public static function borrarUsuario($codUsuario){
            $correcto=true;
            $sql="Delete from Usuarios where codUsuario=?";
            DBPDO::ejecutarConsulta($sql,[$codUsuario]);
            if(UsuarioPDO::consultarUsuario($codUsuario)){
                $correcto = false;
            }
            return $correcto;
        }
        public static function consultarUsuario($codUsuario){
            $correcto = true;
            $sql="Select * from Usuarios where codUsuario=?";
            $resultado=DBPDO::ejecutarConsulta($sql,[$codUsuario]);
            if($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
        }
    }
