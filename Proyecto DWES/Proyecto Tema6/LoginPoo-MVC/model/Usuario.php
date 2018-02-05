<?php
 
include_once 'UsuarioPDO.php';//Incluimos la clase UsuarioPDO.php
/** 
 * File Usuario.php 
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fichero del Modelo que crea y usa los objetos  
 * de la clase Usuario
 */ 

/** 
 * Class Usuario 
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 18/01/2018
 */ 
    class Usuario{
         //Atributos del objeto usuario. 


    /** 
     * @var string  $codUsuario     Codigo del usuario. 
     */ 
        private $codUsuario;
         /** 
     * @var string  $descUsuario    Descripcion del usuario 
     */ 
        private $descUsuario;
        /** 
     * @var string  $password       Contraseña del usuario. 
     */ 
        private $password;
         /** 
     * @var string  $perfil     Tipo de perfil del usuario 
     */
        private $perfil;
        /** 
     * @var datetime $ultimaConexion      Ultima conexion del usuario. 
     */ 
        private $ultimaConexion;
         /** 
     * @var int     $contadorAccesos      Contador de los accesos del usuario 
     */ 
        private $contadorAccesos;
         /** 
         * Constructor de la clase Usuario. 
         * 
         * Función que contruye un objeto de la clase Usuario. 
         * 
         * @param   string  $codUsuario     codigo del usuario. 
         * @param   string  $descUsuario    descripcion del usuario. 
         * @param   string  $password       contraseña del usuario. 
         * @param   string  $perfil         tipo de perfil del usuario. 
         */ 
    public function __construct($codUsuario,$descUsuario,$password,$perfil){
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->contadorAccesos = 0;
    }
        /**  
         * Función que devuelve el codUsuario. 
         * 
         * @return string $codUsuario codigo del usuario.  
         */ 
    public function getCodUsuario(){
        return $this->codUsuario;
    }
        /**  
         * Función que devuelve la descUsuario. 
         * 
         * @return string $descUsuario  descripcion del usuario.  
         */ 
    public function getDescUsuario(){
        return $this->descUsuario;
    }
        /**  
         * Función que devuelve la contraseña 
         * 
         * @return string $password contraseña del usuario.  
         */ 
    public function getPassword(){
        return $this->password;
    }
        /**  
         * Función que devuelve el Perfil 
         * 
         * @return string $perfil   tipo de perfil del usuario.  
         */
    public function getPerfil(){
        return $this->perfil;
    }
        /**  
         * Función que devuelve Ultima conexion del usuario. 
         * 
         * @return string $ultimaConexion   Ultima conexion del usuario.  
         */
    public function getUltimaConexion(){
        return $this->ultimaConexion;
    }
         /**  
         * Función que devuelve Contador de los accesos del usuario  
         * 
         * @return int $contadorAccesos   Contador de los accesos del usuario   
         */
    public function getContadorAccesos(){
        return $this->contadorAccesos;
    }
        /**  
         * Función que inserta un nuevo codUsuario. 
         * 
         * @param string $codUsuario codigo del usuario.  
         */ 
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }
        /**  
         * Función que inserta una nueva descUsuario. 
         * 
         * @param string $descUsuario  descripcion del usuario.  
         */ 
    public function setDescUsuario($descUsuario){
        $this->descUsuario = $descUsuario;
    }
        /**  
         * Función que inserta una nueva contraseña 
         * 
         * @param string $password contraseña del usuario.  
         */ 
    public function setPassword($password){
        $this->password = $password;
    }
         /**  
         * Función que inserta un nuevo Perfil 
         * 
         * @param string $perfil   tipo de perfil del usuario.  
         */
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }
          /**  
         * Función que inserta Ultima conexion del usuario. 
         * 
         * @param string $ultimaConexion   Ultima conexion del usuario.  
         */
    public function setUltimaConexion($ultimaConexion){
        $this->ultimaConexion = $ultimaConexion;
    }
         /**  
         * Función que devuelve Contador de los accesos del usuario  
         * 
         * @param int $contadorAccesos   Contador de los accesos del usuario   
         */
    public function setContadorAccesos($contadorAccesos){
        $this->contadorAccesos = $contadorAccesos;
    }
        /** 
         * Función para validar el usuario 
         * 
         * Funcion a la que se le pasan los parametros codUsuario y password y usa el metodo validarUsuario de la clase 
         * UsuarioPDO, devuelve un objeto usuario. 
         * 
         * @param   string  $codUsuario Codigo del usuario que le pasamos. 
         * @param   string  $password   Contraseña del usuario. 
         * 
         * @return object   $usuario    Objeto de la clase Usuario que contien la informacion del usuario. 
         */ 
    public static function validarUsuario($codUsuario, $password){
        $usuario=null; 
            $arrayUsuario=UsuarioPDO::validarUsuario($codUsuario,$password); 
            if(!empty($arrayUsuario)) { 
                $usuario = new Usuario($codUsuario, $arrayUsuario['descUsuario'], $password, $arrayUsuario['perfil'], $arrayUsuario['ultimaConexion'], $arrayUsuario['contadorAccesos']);
            } 
            return $usuario; 
        }
    }