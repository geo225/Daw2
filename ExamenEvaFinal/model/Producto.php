<?php
include "ProductoPDO.php";

    class Producto{
        private $codProducto;
        private $descProducto;
        private $Caracteristicas;
        private $familia;
        private $imagen;
        private $Precio;
        private $Marca;
        private $Nombre;

        public function __construct($codProducto,$descProducto,$Caracteristicas,$familia,$imagen,$Precio,$Marca,$Nombre){
            $this->codProducto = $codProducto;
            $this->descProducto = $descProducto;
            $this->Caracteristicas = $Caracteristicas;
            $this->familia = $familia;
            $this->imagen = $imagen;
            $this->Precio = $Precio;
            $this->Marca = $Marca;
            $this->Nombre = $Nombre;
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
        public function getPrecio(){
            return $this->Precio;
        }
        public function getMarca(){
            return $this->Marca;
        }
        public function getNombre(){
            return $this->Nombre;
        }
        public function setCodProducto() {
            $this->codProducto = $codProducto;
        }
        public function setDescProducto() {
            $this->DescProducto = $descProducto;
        }
        public function setCaracteristicas() {
            $this->Caracteristicas = $Caracteristicas;
        }
        public function setFamilia() {
            $this->familia = $familia;
        }
        public function setImagen() {
            $this->imagen = $imagen;
        }
        public function setPrecio() {
            $this->Precio = $Precio;
        }
        public static function listarProductos(){
            $productos=null;
            $producto= ProductoPDO::listarProductos();
            if(!empty($producto)){
                for ($i=0;$i<count($producto);$i++){
                    $productos[$i]= new Producto($producto[$i]['codProducto'],$producto[$i]['descProducto'],$producto[$i]['Caracteristicas'],$producto[$i]['familia'],$producto[$i]['imagen'],$producto[$i]['Precio'],$producto[$i]['Marca'],$producto[$i]['Nombre']);
                }
            }
            return $productos;
        }
        public static function ObtenerProducto($codProducto){
            $producto=null;

            $arrayProducto=ProductoPDO::consultarProducto($codProducto);
            if (!empty($arrayProducto)){
                $producto = new Producto($codProducto,$arrayProducto['descProducto'],$arrayProducto['Caracteristicas'],$arrayProducto['familia'],$arrayProducto['imagen'],$arrayProducto['Precio']);
            }
            return $producto;
        }
    public static function buscarDescProducto($descProducto){
        $productos=null;
        if(empty($descProducto)){
            $descProducto="%";
        }else{
            $descProducto="%".$descProducto."%";
        }
            $producto= ProductoPDO::buscarDescProducto($descProducto);
        if(!empty($producto)){
                for ($i=0;$i<count($producto);$i++){
                    $productos[$i]= new Producto($producto[$i]['codProducto'],$producto[$i]['descProducto'],$producto[$i]['Caracteristicas'],$producto[$i]['familia'],$producto[$i]['imagen'],$producto[$i]['Precio'],$producto[$i]['Marca'],$producto[$i]['Nombre']);
                }
            }
            return $productos;
    }
         public static function ObtenerProductoCod($codProducto){
        $producto=null;
        $arrayProducto=ProductoPDO::consultarProductoCod($codProducto);
        if (!empty($arrayProducto)){
            $producto= new Producto($codProducto,$arrayProducto['descProducto'],$arrayProducto['Caracteristicas'],$arrayProducto['familia'],$arrayProducto['imagen'],$arrayProducto['Precio'],$arrayProducto['Marca'],$arrayProducto['Nombre']);
        }
        return $producto;
    }
    }
