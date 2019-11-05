<?php
class ConceptosdePago{

	private $idConceptoDePago;
	private $NombreConcepto;
	private $Monto;
	private $LetraMonto;
	private $Estatus;

	function __construct(){
		$this-> idConceptoDePago=0;
		$this-> NombreConcepto=null;
		$this-> Monto=0;
		$this-> LetraMonto=0;
		$this-> Estatus=null;
	}

	public function setidConceptoDePago($idConceptoDePago){
		$this -> idConceptoDePago = $idConceptoDePago;
	}
	public function setNombreConcepto($NombreConcepto){
		$this -> NombreConcepto = $NombreConcepto;
	}
	public function setMonto($Monto){
		$this -> Monto = $Monto;
	}
	public function setLetraMonto($LetraMonto){
		$this -> LetraMonto = $LetraMonto;
	}
	public function setEstatus($Estatus){
		$this -> Estatus = $Estatus;
	}

	public function getidConceptoDePago(){
		return $this -> idConceptoDePago;
	}
	public function getNombreConcepto(){
		return $this -> NombreConcepto;
	}
	public function getMonto(){
		return $this -> Monto;
	}
	public function getLetraMonto(){
		return $this -> LetraMonto;
	}
	public function getEstatus(){
		return $this -> Estatus;
	}
}
?>