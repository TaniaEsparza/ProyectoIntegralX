<?php

class Ingresos{
	private $idIngresos;
	private $idAlumno;
	private $idGrupo;
	private $idConceptodePago;
	private $Fecha;
	private $Observacion;
	private $Estatus;
	private $Monto;
	private $Folio;
	private $MontoLetra;

	function __construct(){
		$this->idIngresos = 0;
		$this->idAlumno = 0;
		$this->idGrupo = 0;
		$this->idConceptodePago = 0;
		$this->Fecha = null;
		$this->Observacion = null;
		$this->Estatus = null;
		$this->Monto = null;
		$this->MontoLetra = null;
	}

	public function setidIngresos($idIngresos){
		$this->idIngresos=$idIngresos;
	}

	public function getidIngresos(){
		return $this->idIngresos;
	}

	public function setidAlumno($idAlumno){
		$this->idAlumno=$idAlumno;
	}

	public function getidAlumno(){
		return $this->idAlumno;
	}

	public function setidGrupo($idGrupo){
		$this->idGrupo=$idGrupo;
	}

	public function getidGrupo(){
		return $this->idGrupo;
	}

	public function setidConceptodePago($idConceptodePago){
		$this->idConceptodePago=$idConceptodePago;
	}

	public function getidConceptodePago(){
		return $this->idConceptodePago;
	}

	public function setFecha($Fecha){
		$this->Fecha=$Fecha;
	}

	public function getFecha(){
		return $this->Fecha;
	}

	public function setObservacion($Observacion){
		$this->Observacion=$Observacion;
	}

	public function getObservacion(){
		return $this->Observacion;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}

	public function setMonto($Monto){
		$this->Monto=$Monto;
	}

	public function getMonto(){
		return $this->Monto;
	}

	public function setFolio($Folio){
		$this->Folio=$Folio;
	}

	public function getFolio(){
		return $this->Folio;
	}

	public function setMontoLetra($MontoLetra){
		$this->MontoLetra=$MontoLetra;
	}

	public function getMontoLetra(){
		return $this->MontoLetra;
	}
}

?>