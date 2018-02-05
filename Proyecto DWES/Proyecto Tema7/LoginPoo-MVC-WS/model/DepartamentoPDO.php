<?php
require_once("DBPDO.php");// incluimos la clase DBPDO
/** 
 * Class UsuarioPDO 
 * @author  Rodrigo Gutiérrez Ollé
 *
 *Fecha de última modificación 18/01/2018
 */
    class DepartamentoPDO{
        public static function listarDepartamentos(){
            $sql= "Select * from Departamentos";
            $Departamento=[];
            $arrayDepartamento=[]; 
            $contador=0;
            $resultadoConsulta=DBPDO::ejecutarConsulta($sql,[]); 
            if ($resultadoConsulta->rowCount()>0) { 
                while ($resultadoFetch = $resultadoConsulta->fetchObject()){ 
                $arrayDepartamento['codDepartamento'] = $resultadoFetch->codDepartamento; 
                $arrayDepartamento['descDepartamento'] = $resultadoFetch->descDepartamento; 
                $arrayDepartamento['altaDepartamento'] = $resultadoFetch->altaDepartamento; 
                $arrayDepartamento['Capacidad'] = $resultadoFetch->Capacidad;
                $arrayDepartamento['Creador'] = $resultadoFetch->Creador;    
                $Departamento[$contador]=$arrayDepartamento;
                $contador++;    
                }
            } 
            return $Departamento; 
        }
       public static function consultarDepartamento($codDepartamento){
           $sql="Select * from Departamentos where codDepartamento=?";
           $arrayDepartamento=[];
           $resultado=DBPDO::ejecutarConsulta($sql,[$codDepartamento]);
           if ($resultado->rowCount()==1){
               $resultado = $resultado->fetchObject();
               $arrayDepartamento['descDepartamento']= $resultado->descDepartamento;
               $arrayDepartamento['altaDepartamento']= $resultado->altaDepartamento;
               $arrayDepartamento['Capacidad'] = $resultado->Capacidad;
               $arrayDepartamento['Creador'] = $resultado->Creador;
           }
           return $arrayDepartamento;
       } 
       public static function editarDepartamento($codDepartamento,$descDepartamento,$capacidad){
            $correcto=true;
            $sql="Update Departamentos set descDepartamento=?, capacidad=? where codDepartamento=?";
            $resultado= DBPDO::ejecutarConsulta($sql,[$descDepartamento,$capacidad,$codDepartamento]);
            if($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
       }
        public static function borrarDepartamento($codDepartamento){
            $correcto=true;
            $sql="Delete from Departamentos where codDepartamento=?";
            DBPDO::ejecutarConsulta($sql,[$codDepartamento]);
            if(!empty(DepartamentoPDO::consultarDepartamento($codDepartamento))){
                $correcto = false;
            }
            return $correcto;
        }  
        public static function nuevoDepartamento($codDepartamento,$descDepartamento,$altaDepartamento,$capacidad,$creador){
            $correcto=true;
            $sql = "Insert into Departamentos values (?,?,?,?,?)";
            $resultado= DBPDO::ejecutarConsulta($sql,[$codDepartamento,$descDepartamento,$altaDepartamento,$capacidad,$creador]);
            if ($resultado->rowCount()!=1){
                $correcto = false;
            }
            return $correcto;
        }
        public static function buscarDescDepartamento($descDepartamento){
            $sql= "Select * from Departamentos where descDepartamento like ?";
            $Departamento=[];
            $arrayDepartamento=[]; 
            $contador=0;
            $resultadoConsulta=DBPDO::ejecutarConsulta($sql,[$descDepartamento]); 
            if ($resultadoConsulta->rowCount()>0) { 
                while ($resultadoFetch = $resultadoConsulta->fetchObject()){ 
                $arrayDepartamento['codDepartamento'] = $resultadoFetch->codDepartamento; 
                $arrayDepartamento['descDepartamento'] = $resultadoFetch->descDepartamento; 
                $arrayDepartamento['altaDepartamento'] = $resultadoFetch->altaDepartamento; 
                $arrayDepartamento['Capacidad'] = $resultadoFetch->Capacidad;
                $arrayDepartamento['Creador'] = $resultadoFetch->Creador;    
                $Departamento[$contador]=$arrayDepartamento;
                $contador++;    
                }
            } 
            return $Departamento; 
        }
    
    }