<?php

class InformacionLaboral{
	
	private $idInformacionLaboral;
	private $NoEmpleado;
	private $FechaIngreso;
	private $Departamento;
	private $Puesto;
	private $Horas;
	private $Bruto;
	private $Neto;
	
	function __construct(){
		$this->idInformacionLaboral = 0;
		$this->NoEmpleado = 0;
		$this->FechaIngreso= null;
		$this->Departamento = "";
		$this->Puesto = "";
		$this->Horas = 0;
		$this->Bruto = 0;
		$this->Neto = 0;
	}

	public function setidInformacionLaboral($idInformacionLaboral){
		$this->idInformacionLaboral=$idInformacionLaboral;
	}

	public function getidInformacionLaboral(){
		return $this->idInformacionLaboral;
	}

	public function setNoEmpleado($NoEmpleado){
		$this->NoEmpleado=$NoEmpleado;
	}

	public function getNoEmpleado(){
		return $this->NoEmpleado;
	}

	public function setFechaIngreso($FechaIngreso){
		$this->FechaIngreso=$FechaIngreso;
	}

	public function getFechaIngreso(){
		return $this->FechaIngreso;
	}

	public function setDepartamento($Departamento){
		$this->Departamento=$Departamento;
	}

	public function getDepartamento(){
		return $this->Departamento;
	}

	public function setPuesto($Puesto){
		$this->Puesto=$Puesto;
	}

	public function getPuesto(){
		return $this->Puesto;
	}

	public function setHoras($Horas){
		$this->Horas=$Horas;
	}

	public function getHoras(){
		return $this->Horas;
	}

	public function setBruto($Bruto){
		$this->Bruto=$Bruto;
	}

	public function getBruto(){
		return $this->Bruto;
	}
	
	public function setNeto($Neto){
		$this->Neto=$Neto;
	}

	public function getNeto(){
		return $this->Neto;
	}
}
?>