<?php

 	class Notas{
 		private $idNotas;
 		private $Alumno_idAlumno;
 		private $Asunto;
 		private $Fecha;
 		private $Observacion;
 		private $idPersonal;


 		function __construct(){
 			$this->idNotas = 0;
			$this->Alumno_idAlumno = 0;
			$this->Asunto;
 			$this->Fecha = null;
 			$this->Observacion = null;
 			$this->idPersonal = null;
 		}


 		public function setidNotas($idNotas){
 			$this->idNotas=$idNotas;
 		}

 		public function getidNotas(){
 			return $this->idNotas;
 		}

 		public function setAlumno_idAlumno($Alumno_idAlumno){
 			$this->Alumno_idAlumno=$Alumno_idAlumno;
 		}

 		public function getAlumno_idAlumno(){
 			return $this->Alumno_idAlumno;
 		}

 		public function setAsunto($Asunto){
 			$this->Asunto=$Asunto;
 		}

 		public function getAsunto(){
 			return $this->Asunto;
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

 		public function setidPersonal($idPersonal){
 			$this->idPersonal=$idPersonal;
 		}

 		public function getidPersonal(){
 			return $this->idPersonal;
 		}
 	}

 ?>