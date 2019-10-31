<?php

class Personal{
	
	private $idPersonal;
	private $LugarNacimiento_idLugarNacimiento;
	private $Domicilio_idDomicilio;
	private $Nombre;
	private $ApellidoP;
	private $ApellidoM;
	private $NumeroEmpleado;
	private $CURP;
	private $TelefonoCel;
	private $Correo;
	private $FechaNac;
	private $RFC;
	private $SS;
	private $Departamento;
	private $Puesto;
	private $FechaIngreso;
	private $Estatus;
	private $Estado;
	private $Horas;
	private $TipoSangre;
	private $EstadoCivil;
	private $Sexo;
	
	function __construct(){
		$this->idPersonal = 0;
		$this->LugarNacimiento_idLugarNacimiento = 0;
		$this->Domicilio_idDomicilio = 0;
		$this->Nombre = null;
		$this->ApellidoP= null;
		$this->ApellidoM = null;
		$this->NumeroEmpleado = 0;
		$this->CURP = null;
		$this->TelefonoCel = null;
		$this->Correo = null;
		$this->FechaNac = null;
		$this->RFC = null;
		$this->SS = null;
		$this->Departamento = null;
		$this->Puesto = null;
		$this->FechaIngreso = null;
		$this->Estatus = null;
		$this->Estado = null;
		$this->Horas = 0;
		$this->TipoSangre = null;
		$this->EstadoCivil = null;
		$this->Sexo = null;
	}

	public function setidPersonal($idPersonal){
		$this->idPersonal=$idPersonal;
	}

	public function getidPersonal(){
		return $this->idPersonal;
	}
	
	public function setLugarNacimiento_idLugarNacimiento($LugarNacimiento_idLugarNacimiento){
		$this->LugarNacimiento_idLugarNacimiento=$LugarNacimiento_idLugarNacimiento;
	}

	public function getLugarNacimiento_idLugarNacimiento(){
		return $this->LugarNacimiento_idLugarNacimiento;
	}

	public function setDomicilio_idDomicilio($Domicilio_idDomicilio){
		$this->Domicilio_idDomicilio=$Domicilio_idDomicilio;
	}

	public function getDomicilio_idDomicilio(){
		return $this->Domicilio_idDomicilio;
	}

	public function setNombre($Nombre){
		$this->Nombre=$Nombre;
	}

	public function getNombre(){
		return $this->Nombre;
	}

	public function setApellidoP($ApellidoP){
		$this->ApellidoP=$ApellidoP;
	}

	public function getApellidoP(){
		return $this->ApellidoP;
	}

	public function setApellidoM($ApellidoM){
		$this->ApellidoM=$ApellidoM;
	}

	public function getApellidoM(){
		return $this->ApellidoM;
	}

	public function setNumeroEmpleado($NumeroEmpleado){
		$this->NumeroEmpleado=$NumeroEmpleado;
	}

	public function getNumeroEmpleado(){
		return $this->NumeroEmpleado;
	}

	public function setCURP($CURP){
		$this->CURP=$CURP;
	}

	public function getCURP(){
		return $this->CURP;
	}
	
	public function setTelefonoCel($TelefonoCel){
		$this->TelefonoCel=$TelefonoCel;
	}

	public function getTelefonoCel(){
		return $this->TelefonoCel;
	}

	public function setCorreo($Correo){
		$this->Correo=$Correo;
	}

	public function getCorreo(){
		return $this->Correo;
	}

	public function setFechaNac($FechaNac){
		$this->FechaNac=$FechaNac;
	}

	public function getFechaNac(){
		return $this->FechaNac;
	}

	public function setRFC($RFC){
		$this->RFC=$RFC;
	}

	public function getRFC(){
		return $this->RFC;
	}

	public function setSS($SS){
		$this->SS=$SS;
	}

	public function getSS(){
		return $this->SS;
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

	public function setFechaIngreso($FechaIngreso){
		$this->FechaIngreso=$FechaIngreso;
	}

	public function getFechaIngreso(){
		return $this->FechaIngreso;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}
	
	public function setEstado($Estado){
		$this->Estado=$Estado;
	}

	public function getEstado(){
		return $this->Estado;
	}

	public function setHoras($Horas){
		$this->Horas=$Horas;
	}

	public function getHoras(){
		return $this->Horas;
	}

	public function setTipoSangre($TipoSangre){
		$this->TipoSangre=$TipoSangre;
	}

	public function getTipoSangre(){
		return $this->TipoSangre;
	}

	public function setEstadoCivil($EstadoCivil){
		$this->EstadoCivil=$EstadoCivil;
	}

	public function getEstadoCivil(){
		return $this->EstadoCivil;
	}

	public function setSexo($Sexo){
		$this->Sexo=$Sexo;
	}

	public function getSexo(){
		return $this->Sexo;
	}
}
?>