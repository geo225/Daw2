<?php

    class Producto{
        private $codProducto;
        private $descProducto;
        private $Caracteristicas;
        private $familia;
        private $imagen;
        private $Cantidad;
        
        public function __construct($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad){
            $this->codProducto = $codProducto;
            $this->descProducto = $descProducto;
            $this->Caracteristicas = $Caracteristicas;
            $this->familia = $familia;
            $this->imagen = 'webroot/img/'.$codProducto;
            $this->Cantidad = $Cantidad;
        }
        public function getCodProducto(){
            return $this->codProducto;
        }
        public function getDescProducto(){
            return $this->descProducto;
        }
        public function getCaracteristicas(){
            return $this->Caracteristicas;
        }
        public function getFamilia(){
            return $this->familia;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function getCantidad(){
            return $this->Cantidad;
        }
        public function setCodProducto {
            $this->codProducto = $codProducto;
        }
        public function setDescProducto {
            $this->DescProducto = $descProducto;
        }
        public function setCaracteristicas {
            $this-Caracteristicas> = $Caracteristicas;
        }
        public function setFamilia {
            $this->familia = $familia;
        }
        public function setImagen {
            $this->imagen = $imagen;
        }
        public function setCantidad {
            $this->Cantidad = $Cantidad;
        }
        public static function listarProductos(){
            $productos=null;
            $producto= Productos::listarProductos();
            if(!empty($productos)){
                for ($i=0;$i<count($productos);$i++){
                    $productos[$i]= new Producto($producto[$i]['codProducto'],$producto[$i]['descProducto'],$producto[$i]['Caracteristicas'],$producto[$i]['familia'],$producto[$i]['imagen'],$producto['Cantidad']);
                }
            }
            return $productos;
        }
        public static function ObtenerProducto($codProducto){
            $producto=null;
            
            $arrayProducto=ProductoPDO::consultarProducto($codProducto);
            if (!empty($arrayProducto)){
                $producto = new Producto($codProducto,$arrayProducto['descProducto'],$arrayProducto['Caracteristicas'],$arrayProducto['familia'],$arrayProducto['imagen'],$arrayProducto['Cantidad']);
            }
            return $producto;
        }
        public function editarProducto($descProducto,$Caracteristicas,$familia,$Cantidad){
        $correcto=false;
        $codProducto=$this->getCodProducto();
         if(ProductoPDO::editarProducto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad)){
            $this->setDescProducto($descProducto);
            $this->setCaracteristicas($Caracteristicas);
             $this->setFamilia($familia);
             $this->setCantidad($Cantidad);
            $correcto=true;
        }
        return $correcto;
    }
    public function borrarProducto(){
        $correcto=false;
        $codProducto=$this->getCodProducto();
        if (ProductoPDO::borrarProducto($codProducto)){
            $correcto=true;
        }
        return $correcto;
    }
    public static function nuevoProducto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad){
        $producto=null;
 if(ProductoPDO::nuevoProducto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad)){
            $producto= new Producto($codProducto,$descProducto,$Caracteristicas,$familia,$Cantidad);
        }
        return $producto;
    }
    public static function buscarDescProducto ($descProducto){
        $productos=null;
        if(empty($descProducto)){
            $descProducto="%";
        }else{
            $descProducto="%".$descProducto."%";
        }
            $producto= ProductoPDO::buscarDescProducto($descProducto);
        if(!empty($productos)){
                for ($i=0;$i<count($productos);$i++){
                    $productos[$i]= new Producto($producto[$i]['codProducto'],$producto[$i]['descProducto'],$producto[$i]['Caracteristicas'],$producto[$i]['familia'],$producto[$i]['imagen'],$producto['Cantidad']);
                }
            }
            return $productos;
    }
    }