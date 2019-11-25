<?php

class Incidencias{
	private $idIncidencias;
	private $idClausula;
	private $idPersonal;
	private $Fecha;
	private $Observaciones;
	private $Estatus;

	function __construct(){
		$this->idIncidencias = 0;
		$this->idClausula = 0;
		$this->idPersonal = 0;
		$this->Fecha = null;
		$this->Observaciones = null;
		$this->Estatus = null;
	}


	public function setidIncidencias($idIncidencias){
		$this->idIncidencias=$idIncidencias;
	}

	public function getidIncidencias(){
		return $this->idIncidencias;
	}

	public function setidClausula($idClausula){
		$this->idClausula=$idClausula;
	}

	public function getidClausula(){
		return $this->idClausula;
	}

	public function setidPersonal($idPersonal){
		$this->idPersonal=$idPersonal;
	}

	public function getidPersonal(){
		return $this->idPersonal;
	}

	public function setFecha($Fecha){
		$this->Fecha=$Fecha;
	}

	public function getFecha(){
		return $this->Fecha;
	}

	public function setObservaciones($Observaciones){
		$this->Observaciones=$Observaciones;
	}

	public function getObservaciones(){
		return $this->Observaciones;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}

	public function setFecha($Fecha){
		$this->Fecha=$Fecha;
	}

	public function getFecha(){
		return $this->Fecha;
	}
}

?>