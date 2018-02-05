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
            $sql= "Select * from Productos";
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
                $arrayProducto['Cantidad'] = $resultadoFetch->Cantidad;
                $Producto[$contador]=$arrayProducto;
                $contador++;    
                }
            } 
            return $Producto; 
        }
       public static function consultarProducto($codProducto){
           $sql="Select * from Productos where codProducto=?";
           $arrayProducto=[];
           $resultado=DBPDO::ejecutarConsulta($sql,[$codProducto]);
           if ($resultado->rowCount()==1){
               $resultado = $resultado->fetchObject();
               $arrayProducto['descProducto'] = $resultadoFetch->descProducto; 
                $arrayProducto['Caracteristicas'] = $resultadoFetch->Caracteristicas; 
                $arrayProducto['familia'] = $resultadoFetch->familia;
                $arrayProducto['imagen'] = $resultadoFetch->imagen;
                $arrayProducto['Cantidad'] = $resultadoFetch->Cantidad;
           }
           return $arrayProducto;
       } 
       public static function editarProducto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad){
            $correcto=true;
            $sql="Update Productos set descProducto=?, Caracteristicas=?,familia=?,Cantidad=? where codProducto=?";
            $resultado= DBPDO::ejecutarConsulta($sql,[$descProducto,$Caracteristicas,$familia,$Cantidad,$codProducto]);
            if($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
       }
        public static function borrarProducto($codProducto){
            $correcto=true;
            $sql="Delete from Productos where codProducto=?";
            DBPDO::ejecutarConsulta($sql,[$codProducto]);
            if(!empty(ProdcutoPDO::consultarProducto($codProducto))){
                $correcto = false;
            }
            return $correcto;
        }  
        public static function nuevoProducto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad){
            $correcto=true;
            $sql = "Insert into Productos values (?,?,?,?,?)";
            $resultado= DBPDO::ejecutarConsulta($sql,[$codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad]);
            if ($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
        }
        public static function buscarDescProducto($descProducto){
            $sql= "Select * from Productos where descProducto like ?";
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
                $arrayProducto['Cantidad'] = $resultadoFetch->Cantidad;
                $Producto[$contador]=$arrayProducto;
                $contador++;    
                }
            } 
            return $Producto; 
        }
    
    }