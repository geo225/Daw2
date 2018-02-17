<?php
    class Carrito{
        private $codCarrito;
        private $Productos[];
        private $Cantidad;
        
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
        public function getCodCarrito(){
		return $this->codCarrito;
	}

	public function setCodCarrito($codCarrito){
		$this->codCarrito = $codCarrito;
	}

	public function getProductos[](){
		return $this->Productos[]; 
	}

	public function setProductos[]($Productos[]){
		$this->Productos[] = $Productos[];
	}

	public function getCantidad(){
		return $this->Cantidad;
	}

	public function setCantidad($Cantidad){
		$this->Cantidad = $Cantidad;
	}
        
    }
