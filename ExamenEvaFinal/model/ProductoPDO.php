<?php
require_once("DBPDO.php");// incluimos la clase DBPDO
/**
 * Class UsuarioPDO
 * @author  Rodrigo Gutiérrez Ollé
 *
 *Fecha de última modificación 02/02/2018
 */
    class ProductoPDO{
        public static function listarProductos(){
            $sql= "Select * from productos";
            $Producto=[];
            $arrayProducto=[];
            $contador=0;
            $resultadoConsulta=DBPDO::ejecutarConsulta($sql,[]);
            if ($resultadoConsulta->rowCount()>0) {
                while ($resultadoFetch = $resultadoConsulta->fetchObject()){
                $arrayProducto['codProducto'] = $resultadoFetch->codProducto;
                $arrayProducto['descProducto'] = $resultadoFetch->descProducto;
                $arrayProducto['Caracteristicas'] = $resultadoFetch->Caracteristicas;
                $arrayProducto['familia'] = $resultadoFetch->familia;
                $arrayProducto['imagen'] = $resultadoFetch->imagen;
                $arrayProducto['Precio'] = $resultadoFetch->Precio;
                $arrayProducto['Marca'] = $resultadoFetch->Marca;
                $arrayProducto['Nombre'] = $resultadoFetch->Nombre;
                $Producto[$contador]=$arrayProducto;
                $contador++;
                }
            }
            return $Producto;
        }
       public static function consultarProducto($codProducto){
           $sql="Select * from productos where codProducto=?";
           $arrayProducto=[];
           $resultado=DBPDO::ejecutarConsulta($sql,[$codProducto]);
           if ($resultado->rowCount()==1){
               $resultado = $resultado->fetchObject();
               $arrayProducto['descProducto'] = $resultadoFetch->descProducto;
                $arrayProducto['Caracteristicas'] = $resultadoFetch->Caracteristicas;
                $arrayProducto['familia'] = $resultadoFetch->familia;
                $arrayProducto['imagen'] = $resultadoFetch->imagen;
                $arrayProducto['Precio'] = $resultadoFetch->Precio;
           }
           return $arrayProducto;
       }
        public static function buscarDescProducto($descProducto){
            $sql= "Select * from productos where familia like ?";
            $Producto=[];
            $arrayProducto=[];
            $contador=0;
            $resultadoConsulta=DBPDO::ejecutarConsulta($sql,[$descProducto]);
            if ($resultadoConsulta->rowCount()>0) {
                while ($resultadoFetch = $resultadoConsulta->fetchObject()){
                $arrayProducto['codProducto'] = $resultadoFetch->codProducto;
                $arrayProducto['descProducto'] = $resultadoFetch->descProducto;
                $arrayProducto['Caracteristicas'] = $resultadoFetch->Caracteristicas;
                $arrayProducto['familia'] = $resultadoFetch->familia;
                $arrayProducto['imagen'] = $resultadoFetch->imagen;
                $arrayProducto['Precio'] = $resultadoFetch->Precio;
                $arrayProducto['Marca'] = $resultadoFetch->Marca;
                $arrayProducto['Nombre'] = $resultadoFetch->Nombre;
                $Producto[$contador]=$arrayProducto;
                $contador++;
                }
            }
            return $Producto;
        }
        public static function consultarProductoCod($codProducto){
           $sql="Select * from productos where codProducto=?";
           $arrayProducto=[];
           $resultado=DBPDO::ejecutarConsulta($sql,[$codProducto]);
           if ($resultado->rowCount()==1){
               $resultadoFetch = $resultado->fetchObject();
               $arrayProducto['codProducto'] = $resultadoFetch->codProducto;
                $arrayProducto['descProducto'] = $resultadoFetch->descProducto;
                $arrayProducto['Caracteristicas'] = $resultadoFetch->Caracteristicas;
                $arrayProducto['familia'] = $resultadoFetch->familia;
                $arrayProducto['imagen'] = $resultadoFetch->imagen;
                $arrayProducto['Precio'] = $resultadoFetch->Precio;
                $arrayProducto['Marca'] = $resultadoFetch->Marca;
                $arrayProducto['Nombre'] = $resultadoFetch->Nombre;
           }
           return $arrayProducto;
       }

    }
