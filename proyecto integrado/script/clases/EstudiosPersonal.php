<?php

class EstudiosPersonal{
	private $idEstudiosPersonal;
	private $Personal_idPersonal;
	private $UltimoGrado;
	private $Carrera;
	private $AreaConocimiento;
	private $EntidadFederativa;
	private $Institucion;
	private $Estatus;
	private $DocAcademico;
	private $FechaExpedicion;
	private $NoFolioDoc;


	function __construct(){
		$this->idEstudiosPersonal = 0;
		$this->Personal_NombreEstudio = 0;
		$this->UltimoGrado = "";
		$this->Carrera = "";
		$this->AreaConocimiento = "";
		$this->EntidadFederativa = "";
		$this->Institucion = "";
		$this->Estatus = "";
		$this->DocAcademico = "";
		$this->FechaExpedicion = null;
		$this->NoFolioDoc = 0;	
	}


	public function setidEstudiosPersonal($idEstudiosPersonal){
		$this->idEstudiosPersonal=$idEstudiosPersonal;
	}

	public function getidEstudiosPersonal(){
		return $this->idEstudiosPersonal;
	}

	public function setPersonal_idPersonal($Personal_idPersonal){
		$this->Personal_idPersonal=$Personal_idPersonal;
	}

	public function getPersonal_idPersonal(){
		return $this->Personal_idPersonal;
	}

	public function setUltimoGrado($UltimoGrado){
		$this->UltimoGrado=$UltimoGrado;
	}

	public function getUltimoGrado(){
		return $this->UltimoGrado;
	}
	
	public function setCarrera($Carrera){
		$this->Carrera=$Carrera;
	}

	public function getCarrera(){
		return $this->Carrera;
	}

	public function setAreaConocimiento($AreaConocimiento){
		$this->AreaConocimiento=$AreaConocimiento;
	}

	public function getAreaConocimiento(){
		return $this->AreaConocimiento;
	}

	public function setEntidadFederativa($EntidadFederativa){
		$this->EntidadFederativa=$EntidadFederativa;
	}

	public function getEntidadFederativa(){
		return $this->EntidadFederativa;
	}
	
	public function setInstitucion($Institucion){
		$this->Institucion=$Institucion;
	}

	public function getInstitucion(){
		return $this->Institucion;
	}

	public function setEstatus($Estatus){
		$this->Estatus=$Estatus;
	}

	public function getEstatus(){
		return $this->Estatus;
	}

	public function setDocAcademico($DocAcademico){
		$this->DocAcademico=$DocAcademico;
	}

	public function getDocAcademico(){
		return $this->DocAcademico;
	}

	public function setFechaExpedicion($FechaExpedicion){
		$this->FechaExpedicion=$FechaExpedicion;
	}

	public function getFechaExpedicion(){
		return $this->FechaExpedicion;
	}

	public function setNoFolioDoc($NoFolioDoc){
		$this->NoFolioDoc=$NoFolioDoc;
	}

	public function getNoFolioDoc(){
		return $this->NoFolioDoc;
	}
}

?>