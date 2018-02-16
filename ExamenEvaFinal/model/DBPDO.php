<?php
include_once('config/constDB.php');
/**
 * Class DBPDO
 * @author  Rodrigo Gutiérrez Ollé
 *
 *Fecha de última modificación 18/01/2018
 */
    class DBPDO{
        /**
     * Funcion para ejecutar una consulta.
     *
     * Pasandole la consulta sql y los parametros realiza una consulta a la BD.
     *
     * @param string    $sql    Consulta sql que le pasas
     * @param array     $parametros     Parametros que le pasas a la funcion
     * @return null|PDOStatement    $resultado      El statement resultante de la consulta
     */
        public static function ejecutarConsulta($sql, $parametros){
            try{
            $conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $conn->prepare($sql);
            $resultado->execute($parametros);

        } catch (PDOException $exception) {
            echo $exception->getMessage();
            $resultado=null;
            unset($conexion);
            exit;
        }
        return $resultado;
    }
}
