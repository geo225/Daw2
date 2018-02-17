<?php
    class Carrito{
        private $codCarrito;
        private $Productos;       
        public function __construct($codCarrito,$Productos){
            $this->codCarrito = $codCarrito;
            $this->Productos = $Productos;
        }
        public function getCodCarrito(){
		return $this->codCarrito;
	}

	public function setCodCarrito($codCarrito){
		$this->codCarrito = $codCarrito;
	}

	public function getProductos(){
		return $this->Productos; 
	}

	public function setProductos($Productos){
		$this->Productos = $Productos;
	}
    function agregarProducto($codProducto){
        array_push($this->Productos,['codProducto'=>$codProducto]);
    }
        function borrarProducto($posicion){
            array_splice($this->Productos,$posicion,1);
        }
    function comprobarProducto($codProducto){
       $existe=false;
        for ($i=0;$i<count($this->Productos);$i++){
            if ($this->Productos[$i]['codProducto']==$codProducto){
                $existe=true;
            }
        }
        return $existe;
    }
}
