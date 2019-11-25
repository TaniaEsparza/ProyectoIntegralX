<?php

class EstudiosPersonal{
	private $idEstudiosPersonal;
	private $Personal_idPersonal;
	private $NombreEstudio;
	private $NivelEstudio;
	private $ComprobanteEstudio;
	private $Institucion;

	function __construct(){
		$this->idEstudiosPersonal = 0;
		$this->Personal_NombreEstudio = 0;
		$this->NombreEstudio = null;
		$this->NivelEstudio = null;
		$this->ComprobanteEstudio = null;
		$this->Institucion = null;
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

	public function setNombreEstudio($NombreEstudio){
		$this->NombreEstudio=$NombreEstudio;
	}

	public function getNombreEstudio(){
		return $this->NombreEstudio;
	}

	public function setNivelEstudio($NivelEstudio){
		$this->NivelEstudio=$NivelEstudio;
	}

	public function getNivelEstudio(){
		return $this->NivelEstudio;
	}

	public function setComprobanteEstudio($ComprobanteEstudio){
		$this->ComprobanteEstudio=$ComprobanteEstudio;
	}

	public function getComprobanteEstudio(){
		return $this->ComprobanteEstudio;
	}

	public function setInstitucion($Institucion){
		$this->Institucion=$Institucion;
	}

	public function getInstitucion(){
		return $this->Institucion;
	}
}

?>