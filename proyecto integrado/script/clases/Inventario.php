<?php

class Inventario{
	
	private $idInventario;
	private $Articulo;
	private $Descripcion;
	private $Precio;
	private $CantidadInventario;
	private $Proveedores;
	private $Origenes;
	private $NoSerie;
	private $FechaIngreso;
	private $Tipo;
	private $FechaRegistroZac;
	private $Estatus;
	private $Marca;
	private $Modelo;
	private $Mes;
	private $Anyo;
	private $Imagen;
	private $Categorias;
	private $EstadoFisico;
	private $Area;
	private $Ubicacion;
	private $Empleado;
	
	function __construct(){
		$this->idInventario = 0;
		$this->Articulo = null;
		$this->Descripcion = null;
		$this->Precio = 0;
		$this->CantidadInventario= 0;
		$this->Proveedores = null;
		$this->Origenes = null;
		$this->NoSerie = null;
		$this->FechaIngreso = null;
		$this->Tipo = null;
		$this->FechaRegistroZac = null;
		$this->Estatus = 0;
		$this->Marca = null;
		$this->Modelo = null;
		$this->Mes = null;
		$this->Anyo = null;
		$this->Imagen = null;
		$this->Categorias = null;
		$this->EstadoFisico = null;
		$this->Area = null;
		$this->$Ubicacion = null;
		$this->$Empleado =  null;
	}

	public function setidInventario($idInventario){
		$this->idInventario=$idInventario;
	}

	public function getidInventario(){
		return $this->idInventario;
	}
	
	public function setArticulo($Articulo){
		$this->Articulo=$Articulo;
	}

	public function getArticulo(){
		return $this->Articulo;
	}

	public function setDescripcion($Descripcion){
		$this->Descripcion=$Descripcion;
	}

	public function getDescripcion(){
		return $this->Descripcion;
	}

	public function setPrecio($Precio){
		$this->Precio=$Precio;
	}

	public function getPrecio(){
		return $this->Precio;
	}

	public function setCantidadInventario($CantidadInventario){
		$this->CantidadInventario=$CantidadInventario;
	}

	public function getCantidadInventario(){
		return $this->CantidadInventario;
	}

	public function setProveedores($Proveedores){
		$this->Proveedores=$Proveedores;
	}

	public function getProveedores(){
		return $this->Proveedores;
	}

	public function setOrigenes($Origenes){
		$this->Origenes=$Origenes;
	}

	public function getOrigenes(){
		return $this->Origenes;
	}

	public function setNoSerie($NoSerie){
		$this->NoSerie=$NoSerie;
	}

	public function getNoSerie(){
		return $this->NoSerie;
	}
	
	public function setFechaIngreso($FechaIngreso){
		$this->FechaIngreso=$FechaIngreso;
	}

	public function getFechaIngreso(){
		return $this->FechaIngreso;
	}

	public function setTipo($Tipo){
		$this->Tipo=$Tipo;
	}

	public function getTipo(){
		return $this->Tipo;
	}

	public function setFechaRegistroZac($FechaRegistroZac){
		$this->FechaRegistroZac=$FechaRegistroZac;
	}

	public function getFechaRegistroZac(){
		return $this->FechaRegistroZac;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}
	
	public function setMarca($Marca){
		$this->Marca=$Marca;
	}

	public function getMarca(){
		return $this->Marca;
	}

	public function setModelo($Modelo){
		$this->Modelo=$Modelo;
	}

	public function getModelo(){
		return $this->Modelo;
	}

	public function setMes($Mes){
		$this->Mes=$Mes;
	}

	public function getMes(){
		return $this->Mes;
	}

	public function setAnyo($Anyo){
		$this->Anyo=$Anyo;
	}

	public function getAnyo(){
		return $this->Anyo;
	}

	public function setImagen($Imagen){
		$this->Imagen=$Imagen;
	}

	public function getImagen(){
		return $this->Imagen;
	}

	public function setCategorias($Categorias){
		$this->Categorias=$Categorias;
	}

	public function getCategorias(){
		return $this->Categorias;
	}

	public function setEstadoFisico($EstadoFisico){
		$this->EstadoFisico=$EstadoFisico;
	}

	public function getEstadoFisico(){
		return $this->EstadoFisico;
	}

	public function setArea($Area){
		$this->Area=$Area;
	}

	public function getArea(){
		return $this->Area;
	}

	public function setUbicacion($Ubicacion){
		$this->Ubicacion=$Ubicacion;
	}

	public function getUbicacion(){
		return $this->Ubicacion;
	}

	public function setEmpleado($Empleado){
		$this->Empleado=$Empleado;
	}

	public function getEmpleado(){
		return $this->Empleado;
	}
}
?>