<?php

include_once 'DepartamentoPDO.php';

class Departamento{
    private $codDepartamento;
    private $descDepartamento;
    private $altaDepartamento;
    private $capacidad;
    private $creador;
    
    /**
     * Constructor de la clase Departamento
     * @private
     * @param string $codDepartamento  Codigo Unico y identificativo de Departamento
     * @param string $descDepartamento Descripcion del Departamento
     * @param date $altaDepartamento Fecha de creación del Departamento
     * @param integer $capacidad        Capacidad de Personal del Departamento
     * @param string $creador          Codigo de Usuario que ha creado el departamento
     */
    public function __construct($codDepartamento,$descDepartamento,$altaDepartamento,$capacidad,$creador){
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->altaDepartamento = $altaDepartamento;
        $this->capacidad = $capacidad;
        $this->creador = $creador;
    }
    /**
     * Obtener codigo de Departamento
     * @return string CodigoDepartamento
     */
    public function getCodDepartamento(){
        return $this->codDepartamento;
    }
    /**
     * Obtener Descripcion del Departamento
     * @return string Descripcion de Departamento
     */
    public function getDescDepartamento(){
        return $this->descDepartamento;
    }
    /**
     * Obtener alta del Departamento
     * @return date AltaDepartamento
     */
    public function getAltaDepartamento(){
        return $this->altaDepartamento;
    }
    /**
     * Obtener Capacidad del Departamento
     * @return integer Capacidad de Departamento
     */
    public function getCapacidad(){
        return $this->capacidad;
    }
    /**
     * Obtener Creador del Departamento
     * @return string Creador del Departamento
     */
    public function getCreador(){
        return $this->creador;
    }
    /**
     * Poner un nuevo Codigo de Departamento
     * @param string $codDepartamento Nuevo CodDepartamento
     */
    public function setCodDepartamento($codDepartamento){
        $this->codDepartamento = $codDepartamento;
    }
    /**
     * Poner una nueva Descripcion de Departamento
     * @param string $descDepartamento Nueva Descripcion
     */
    public function setDescDepartamento($descDepartamento){
        $this->descDepartamento = $descDepartamento;
    }
    /**
     * Poner una nueva Alta de Departamento
     * @param date $altaDepartamento Nueva Alta para el Departamento
     */
    public function setAltaDepartamento($altaDepartamento){
        $this->altaDepartamento = $altaDepartamento;
    }
    /**
     * Poner una nueva Capacidad al Departamento
     * @param integer $capacidad Nueva Capacidad del Departamento
     */
    public function setCapacidad($capacidad){
        $this->capacidad = $capacidad;
    }
    /**
     * Poner un nuevo Creador al Departamento
     * @param string $creador Nuevo creador del Departamento
     */
    public function setCreador(){
        $this->creador = $creador;
    }
    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public static function listarDepartamentos(){
        $departamentos=null;
            $departamento= DepartamentoPDO::listarDepartamentos();
        if(!empty($departamento)){
            for ($i=0;$i<count($departamento);$i++){
                $departamentos[$i]= new Departamento($departamento[$i]['codDepartamento'],$departamento[$i]['descDepartamento'],$departamento[$i]['altaDepartamento'],$departamento[$i]['Capacidad'],$departamento[$i]['Creador']);
            }
        }
        return $departamentos;
    }
    public static function ObtenerDepartamento($codDepartamento){
        $departamento=null;
        $arrayDepartamento=DepartamentoPDO::consultarDepartamento($codDepartamento);
        if (!empty($arrayDepartamento)){
            $departamento= new Departamento($codDepartamento,$arrayDepartamento['descDepartamento'],$arrayDepartamento['altaDepartamento'],$arrayDepartamento['Capacidad'],$arrayDepartamento['Creador']);
        }
        return $departamento;
    }
    public function editarDepartamento($descDepartamento,$capacidad){
        $correcto=false;
        $codDepartamento=$this->getCodDepartamento();
        if(DepartamentoPDO::editarDepartamento($codDepartamento,$descDepartamento,$capacidad)){
            $this->setDescDepartamento($descDepartamento);
            $this->setCapacidad($capacidad);
            $correcto=true;
        }
        return $correcto;
    }
    public function borrarDepartamento(){
        $correcto=false;
        $codDepartamento=$this->getCodDepartamento();
        if (DepartamentoPDO::borrarDepartamento($codDepartamento)){
            $correcto=true;
        }
        return $correcto;
    }
    public static function nuevoDepartamento($codDepartamento,$descDepartamento,$capacidad,$creador){
        $departamento=null;
        $altaDepartamento=date("y-m-d");
        if(DepartamentoPDO::nuevoDepartamento($codDepartamento,$descDepartamento,$altaDepartamento,$capacidad,$creador)){
            $departamento= new Departamento($codDepartamento,$descDepartamento,$altaDepartamento,$capacidad,$creador);
        }
        return $departamento;
    }
    public static function buscarDescDepartamento ($descDepartamento){
        $departamentos=null;
        if(empty($descDepartamento)){
            $descDepartamento="%";
        }else{
            $descDepartamento="%".$descDepartamento."%";
        }
            $departamento= DepartamentoPDO::buscarDescDepartamento($descDepartamento);
        if(!empty($departamento)){
            for ($i=0;$i<count($departamento);$i++){
                $departamentos[$i]= new Departamento($departamento[$i]['codDepartamento'],$departamento[$i]['descDepartamento'],$departamento[$i]['altaDepartamento'],$departamento[$i]['Capacidad'],$departamento[$i]['Creador']);
            }
        }
        return $departamentos;
    }
}