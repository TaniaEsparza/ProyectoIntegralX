<?php

class Egresos{
	private $idEgresos;
	private $NombreEgreso;
	private $Detalle;
	private $Fecha;
	private $Monto;
	private $Estatus;

function __construct(){
	$this->idEgresos = 0;
	$this->NombreEgreso = null;
	$this->Fecha = null;
	$this->Monto = 0;
	$this->Estatus= null;
	
}
public function setidEgreso($idEgresos){
		$this->idEgresos=$idEgresos;
	}

public function getidEgreso(){
		return $this->idEgresos;
	}

public function setNombreEgreso($NombreEgreso){
		$this->NombreEgreso=$NombreEgreso;
	}

public function getNombreEgreso(){
		return $this->NombreEgreso;
	}

public function setDetalle($Detalle){
		$this->Detalle=$Dealle;
	}

public function getDetalle(){
		return $this->Detalle;
	}
public function setFecha($Fecha){
		$this->Fecha=$Fecha;
	}

public function getFecha(){
		return $this->Fecha;
	}

public function setMonto($Monto){
		$this->Monto=$Monto;
	}

public function getMonto(){
		return $this->Monto;
	}
public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

public function getEstatus(){
		return $this->Estatus;
	}
	


}
?>