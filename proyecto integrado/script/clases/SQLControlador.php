			<?php
			include_once "MySQLConector.php";
			include_once "testaprendizaje.php";
			include_once "usuariosalumnos.php";

			include_once "Alumno.php";
			include_once "Materia.php";
			include_once "Carreras.php";
			include_once "Usuarios.php";
			include_once "Grupos.php";
			include_once "Domicilio.php";



			class SQLControlador{

				function __construct()
				{
					$IdDom1 = 0;
					$IdDom2 = 0;
				}
				public function IniciarSesionDocente($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=4;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}
				public function IniciarSesionDocenteTutor($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=3;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}


				public function IniciarSesionCE($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=2;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}

				public function IniciarSesionDirectivos($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=1;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}


				public function IniciarSesionAroot($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=7;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}

				public function IniciarSesionAdmin($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuarios INNER JOIN privilegios ON usuarios.idUsuarios = privilegios.Usuarios_idUsuarios WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario()."' and privilegios.TipoPrivilegio=6;";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}


				public function IniciarSesionAlumno($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuariosalumnos WHERE NombreUsuario = '" . $Usuarios->getNombreUsuario() . "';";
					$Resultado = $Mysql->Consulta($Consulta);
					$Tupla = mysqli_fetch_array($Resultado);

					if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
						return true;
					} else {
						return false;
					}
					$Mysql->CerrarConexion();
				}

				public function GetNombrePersonal($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT personal.Nombre FROM personal INNER JOIN usuarios ON personal.idPersonal = usuarios.Personal_idPersonal WHERE usuarios.NombreUsuario= '" . $Usuarios->getNombreUsuario() . "';";
					$Resultado = $Mysql->Consulta($Consulta);
					$tupla = mysqli_fetch_array($Resultado);

					if (isset($tupla['Nombre'])) {
						return $tupla['Nombre'];
					} else {
						return 0;
					}
					$Mysql->CerrarConexion();
				}

				public function GetIdUsuarioAlumno($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM usuariosalumnos WHERE NombreUsuario = '" . $Usuarios->getNombreUsuario() . "';";
					$Resultado = $Mysql->Consulta($Consulta);
					$tupla = mysqli_fetch_array($Resultado);

					if (isset($tupla['Alumno_idAlumno'])) {
						return $tupla['Alumno_idAlumno'];
					} else {
						return 0;
					}
					$Mysql->CerrarConexion();
				}

				public function GetIdPersonal($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT Personal_idPersonal FROM usuarios WHERE NombreUsuario = '" . $Usuarios->getNombreUsuario() . "';";
					$Resultado = $Mysql->Consulta($Consulta);
					$tupla = mysqli_fetch_array($Resultado);

					if (isset($tupla['Personal_idPersonal'])) {
						return $tupla['Personal_idPersonal'];
					} else {
						return 0;
					}
					$Mysql->CerrarConexion();
				}

				public function GetNombreAlumno($Usuarios)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT alumno.Nombre FROM alumno INNER JOIN usuariosalumnos ON alumno.idAlumno = usuariosalumnos.Alumno_idAlumno WHERE usuariosalumnos.NombreUsuario = '" . $Usuarios->getNombreUsuario() . "';";
					$Resultado = $Mysql->Consulta($Consulta);
					$tupla = mysqli_fetch_array($Resultado);

					if (isset($tupla['Nombre'])) {
						return $tupla['Nombre'];
					} else {
						return 0;
					}
					$Mysql->CerrarConexion();
				}

				public function VerFotografia($Usuario){
					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT Fotografia FROM alumno WHERE idAlumno = '" . $Usuarios->getFotografia() . "'";
					$Resultado = $Mysql->Consulta($Consulta);

					if($Resultado->num_rows > 0){
						$imgDatos = $result->fetch_assoc();

					        //Mostrar Imagen
						header("Content-type: image/jpg"); 
						echo $imgDatos['Fotografia']; 
					}else{
						echo 'Imagen no existe...';
					}
				}


				public function AgregarTest($Test)
				{
					$Mysql = new MySQLConector();
					$Mysql->Conectar();

					$Consulta = "INSERT INTO testaprendizaje (idTestAprendizaje,Alumno_idAlumno, Respuestas, Visual, Auditivo, Kinestesico, Total) 
					VALUES (
					null,
					'" .$Test->getAlumno_idAlumno() . "',
					'" .$Test->getRespuestas() . "',
					'" .$Test->getVisual() . "',
					'" .$Test->getAuditivo() . "',
					'" .$Test->getKinestesico() . "',
					'" .$Test->getTotal() ."'
				);";
				if ($Mysql->Consulta($Consulta) === true) {
					echo "<script language='javascript'>alert('¡¡Test creado exitosamente!!')</script>";
					echo "<script language='javascript'>window.location = './../formularios/alumno/ConsultaTestAprendizaje.php'</script>";
				} else {
					echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
				}
				$Mysql->CerrarConexion();
			}

			public function CerrarSesion()
			{
				if (!isset($_SESSION)) {
					session_start();
				}
				if (isset($_SESSION)) {
					session_unset();
					unset($_SESSION['Usuario']);
					session_destroy();
					echo "<script language='javascript'>window.location='/index.php'</script>";
				}
			}

			public function ModificarContrasenaAlumno($Usuarios)
			{
				$Mysql = new MySQLConector();
				$Mysql->Conectar();
				$Consulta = "UPDATE usuariosalumnos Set  
				Contrasena = '" . $Usuarios->getContrasena() . "' Where Alumno_idAlumno = " . $Usuarios->getAlumno_idAlumno() . ";";
				if ($Mysql->Consulta($Consulta) === true) {
					echo "<script language='javascript'>alert('Modificación de contraseña exitosa, deberas ingresar al sistema nuevamente')</script>";
					echo "<script language='javascript'>window.location = './../../formularios/menus/CerrarSesionAlumnoCont.php'</script>";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				$Mysql->CerrarConexion();
			}

			public function InsertarImagenAlumno($Usuarios)
			{
				$Mysql = new MySQLConector();
				$Mysql->Conectar();
				$Consulta = "UPDATE alumno SET Fotografia = '" . $Usuarios->getFotografia() . "' Where idAlumno = " . $Usuarios->getidAlumno() . ";";
				if ($Mysql->Consulta($Consulta) === true) {
					echo "<script language='javascript'>alert('Imagen subida Correctamente')</script>";
					echo "<script language='javascript'>window.location = '../../formularios/capturista/SubirImgAlumnoCap.php'</script>";
				}else{
					echo "<script language='javascript'>alert('Ha fallado la subida, reintente nuevamente.')</script>";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				$Mysql->CerrarConexion();
			}


			public function AgregarCarrera($Carrera)
			{
				$Mysql = new MySQLConector();
				$Mysql->Conectar();

				$Consulta = "INSERT INTO carreras (idCarreras, Clave, Nombre, AreaEspecialidad, Estatus) VALUES (
				null,
				'" .$Carrera->getClave() . "',
				'" .$Carrera->getNombre() . "',
				'" .$Carrera->getAreaEspecialidad() . "',
				'" .$Carrera->getEstatus() . "'
			);";
			if ($Mysql->Consulta($Consulta) === true) {
				return 1;
			} else {
				return 0;
			}
			$Mysql->CerrarConexion();
		}
		public function ModificarCarrera($Carrera)
		{
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "UPDATE  carreras SET Clave='" .$Carrera->getClave() . "', Nombre='" .$Carrera->getNombre(). "', AreaEspecialidad='" .$Carrera->getAreaEspecialidad() . "', Estatus=" . $Carrera->getEstatus() . " WHERE idCarreras=" . $Carrera->getidCarreras() . ";";
			if ($Mysql->Consulta($Consulta) === true) {
				return 1;
			}else{
				return 0;
			}
			$Resultado = $Mysql->Consulta($Consulta);
			$Mysql->CerrarConexion();
		}

		public function AgregarMateria($Materia)
		{
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "SELECT * from  materia where Carreras_idCarreras='" .$Materia->getCarreras_idCarreras() . "' and Nombre='" .$Materia->getNombre() . "';";
			$Resultado = $Mysql->Consulta($Consulta);

			if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
				return 0;    
			}else{
				$Consulta = "INSERT INTO materia (idMateria, Carreras_idCarreras, Clave, Nombre, Componente, Semestre, Estatus) VALUES (
				null,
				'" .$Materia->getCarreras_idCarreras() . "',
				'" .$Materia->getClave() . "',
				'" .$Materia->getNombre() . "',
				'" .$Materia->getComponente() . "',
				'" .$Materia->getSemestre() . "',
				'" .$Materia->getEstatus() . "'
			);";
			if ($Mysql->Consulta($Consulta) === true) {
				return 1;
			} else {
				return 0;
			}
			$Mysql->CerrarConexion();	
		}
	}

	public function ModificarMateria($Materia)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$Consulta = "SELECT * from  materia where Carreras_idCarreras='" .$Materia->getCarreras_idCarreras() . "' and Nombre='" .$Materia->getNombre() . "';";
		$Resultado = $Mysql->Consulta($Consulta);

			            if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){//Si se encontro
			            	$IdMateriaOriginal=$row['idMateria'];
			            	$IdCarreraOriginal=$row['Carreras_idCarreras'];
			            	$NombreOrigina=$row['Nombre'];
			            	if($IdMateriaOriginal== $Materia->getidMateria()){
			            		$Consulta = "UPDATE materia SET Carreras_idCarreras='" .$Materia->getCarreras_idCarreras() . "', Clave='" .$Materia->getClave(). "', Nombre='" .$Materia->getNombre() . "', Componente='" .$Materia->getComponente() . "', Semestre='" .$Materia->getSemestre() . "', Estatus=" . $Materia->getEstatus() . " WHERE idMateria=" . $Materia->getidMateria() . ";";
			            		if ($Mysql->Consulta($Consulta) === true) {
			            			return 1;
			            		}else{
			            			return 0;
			            		}
			            		$Resultado = $Mysql->Consulta($Consulta);
			            	}else{
			            		return 0;
			            	}
			            }else{
			            	$Consulta = "UPDATE materia SET Carreras_idCarreras='" .$Materia->getCarreras_idCarreras() . "', Clave='" .$Materia->getClave(). "', Nombre='" .$Materia->getNombre() . "', Componente='" .$Materia->getComponente() . "', Semestre='" .$Materia->getSemestre() . "', Estatus=" . $Materia->getEstatus() . " WHERE idMateria=" . $Materia->getidMateria() . ";";
			            	if ($Mysql->Consulta($Consulta) === true) {
			            		return 1;
			            	}else{
			            		return 0;
			            	}
			            	$Resultado = $Mysql->Consulta($Consulta);
			            }
			            $Mysql->CerrarConexion();
			        }

			        public function AgregarGrupo($Grupo)
			        {
			        	$Mysql = new MySQLConector();
			        	$Mysql->Conectar();
			        	$Consulta = "SELECT * from  grupos where idAsesor='" .$Grupo->getidAsesor() . "' and Carreras_idCarreras='".$Grupo->getCarreras_idCarreras()."' and grado='".$Grupo->getGrado() . "' and grupo='" .$Grupo->getGrupo() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			        	$Resultado = $Mysql->Consulta($Consulta);
			        	if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			        		return 0;    
			        	}else{
			        		$Consulta = "SELECT * from  grupos where idAsesor='" .$Grupo->getidAsesor() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			        		$Resultado = $Mysql->Consulta($Consulta);
			        		if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			        			return 2;
			        		}else{
			        			$Consulta = "SELECT * from  grupos where Carreras_idCarreras='" .$Grupo->getCarreras_idCarreras() . "' and grado='".$Grupo->getGrado() . "' and grupo='" .$Grupo->getGrupo() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			        			$Resultado = $Mysql->Consulta($Consulta);
			        			if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			        				return 3;
			        			}else {
			        				$Consulta = "INSERT INTO grupos (idGrupos, idAsesor, Carreras_idCarreras, Grado, Grupo, CicloEscolar, Estatus) VALUES (
			        				null,
			        				'" .$Grupo->getidAsesor() . "',
			        				'" .$Grupo->getCarreras_idCarreras() . "',
			        				'" .$Grupo->getGrado() . "',
			        				'" .$Grupo->getGrupo() . "',
			        				'" .$Grupo->getCicloEscolar() . "',
			        				'" .$Grupo->getEstatus() . "'
			        			);";
			        			if ($Mysql->Consulta($Consulta) === true) {
			        				return 1;
			        			} else {
			        				return 0;
			        			}
			        		}

			        	}
			        }
			        $Mysql->CerrarConexion();
			    }

			    public function ModificarGrupo($Grupo)
			    {
			    	$Mysql = new MySQLConector();
			    	$Mysql->Conectar();
			    	$Consulta = "SELECT * from  grupos where idAsesor='" .$Grupo->getidAsesor() . "' and Carreras_idCarreras='".$Grupo->getCarreras_idCarreras()."' and grado='".$Grupo->getGrado() . "' and grupo='" .$Grupo->getGrupo() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			    	$Resultado = $Mysql->Consulta($Consulta);
			    	if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			    		if($row['idGrupos']==$Grupo->getidGrupos()){
			    			$Consulta = "UPDATE grupos SET idAsesor='" .$Grupo->getidAsesor() . "', Carreras_idCarreras='" .$Grupo->getCarreras_idCarreras() . "', Grado='" .$Grupo->getGrado() . "', Grupo='" .$Grupo->getGrupo() . "', CicloEscolar='" .$Grupo->getCicloEscolar() . "', Estatus='" .$Grupo->getEstatus() . "' where idGrupos='" .$Grupo->getidGrupos() . "';";
			    			if ($Mysql->Consulta($Consulta) === true) {
			    				return 1;
			    			} else {
			    				return 0;
			    			}
			    		}else{
			    			return 0;
			    		}

			    	}else{
			    		$Consulta = "SELECT * from  grupos where idAsesor='" .$Grupo->getidAsesor() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			    		$Resultado = $Mysql->Consulta($Consulta);
			    		if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			    			return 2;
			    		}else{
			    			$Consulta = "SELECT * from  grupos where Carreras_idCarreras='" .$Grupo->getCarreras_idCarreras() . "' and grado='".$Grupo->getGrado() . "' and grupo='" .$Grupo->getGrupo() . "' and CicloEscolar='" .$Grupo->getCicloEscolar() . "';";
			    			$Resultado = $Mysql->Consulta($Consulta);
			    			if ($row = $Resultado->fetch_array(MYSQLI_ASSOC)){
			    				return 3;
			    			}else {
			    				$Consulta = "UPDATE grupos SET idAsesor='" .$Grupo->getidAsesor() . "', Carreras_idCarreras='" .$Grupo->getCarreras_idCarreras() . "', Grado='" .$Grupo->getGrado() . "', Grupo='" .$Grupo->getGrupo() . "', CicloEscolar='" .$Grupo->getCicloEscolar() . "', Estatus='" .$Grupo->getEstatus() . "' where idGrupos='" .$Grupo->getidGrupos() . "';";
			    				if ($Mysql->Consulta($Consulta) === true) {
			    					return 1;
			    				} else {
			    					return 0;
			    				}
			    			}

			    		}
			    	}
			    	$Mysql->CerrarConexion();
			    }

			    public function ModificarMateriaGrupoDocente($MateriaGruposDocentes){
			    	$Mysql = new MySQLConector();
			    	$Mysql->Conectar();
			    	$Consulta = "UPDATE materiagruposdocentes SET Personal_idPersonal='".$MateriaGruposDocentes->getPersonal_idPersonal()."' WHERE materiagruposdocentes.idMateriaGruposDocentes=".$MateriaGruposDocentes->getidMateriaGruposDocentes().";";
			    	if ($Mysql->Consulta($Consulta) === true) {
			    		return 1;
			    	}else{
			    		return 0;
			    	}
			    	$Resultado = $Mysql->Consulta($Consulta);
			    	$Mysql->CerrarConexion();
			    }

			    public function AgregarCartaResponsiva($CartaResponsiva)
			    {
			    	$Mysql = new MySQLConector();
			    	$Mysql->Conectar();

			    	$Consulta = "INSERT INTO cartaresponsiva (idCartaResponsiva, Alumno_idAlumno, idFamiliares, idPersonal, Lugar, Fecha, Motivos, CompromisosPadres, CompromisosAlumnos, Asunto, idGrupo) VALUES (
			    	null,
			    	'" .$CartaResponsiva->getAlumno_idAlumno() . "',
			    	'" .$CartaResponsiva->getidFamiliares() . "',
			    	'" .$CartaResponsiva->getidPersonal() . "',
			    	'" .$CartaResponsiva->getLugar() . "',
			    	'" .$CartaResponsiva->getFecha() . "',
			    	'" .$CartaResponsiva->getMotivos() . "',
			    	'" .$CartaResponsiva->getCompromisosPadres() . "',
			    	'" .$CartaResponsiva->getCompromisosAlumnos() . "',
			    	'" .$CartaResponsiva->getAsunto() . "',
			    	'" .$CartaResponsiva->getidGrupo() . "'
			    );";
			    if ($Mysql->Consulta($Consulta) === true) {
			    	echo "<script language='javascript'>alert('¡¡Carta responsiva creada exitosamente!!')</script>";
			    	echo "<script language='javascript'>window.location = 'TodasCartaResponsiva.php'</script>";
			    } else {
			    	echo "<script language='javascript'>alert('Error al crear carta responsiva')</script>";
			    	echo "<script language='javascript'>window.location = './../formularios/docentetutor/TodasCartaResponsiva.php'</script>";
			    }
			    $Mysql->CerrarConexion();	

			}

			public function AgregarEncuestaReprobacion($EncuestaReprobacion)
			{
				$Mysql = new MySQLConector();
				$Mysql->Conectar();
				
				$Consulta = "INSERT INTO encuestareprobacion(idEncuestaReprobacion, Alumno_idAlumno, MateriasReprobadas, Parcial, Causas, Sugerencia, Compromisos, Comentarios, idGrupo, idTutor, idFamiliar, Fecha) VALUES (
				null,
				'" .$EncuestaReprobacion->getAlumno_idAlumno() . "',
				'" .$EncuestaReprobacion->getMateriasReprobadas() . "',
				'" .$EncuestaReprobacion->getParcial() . "',
				'" .$EncuestaReprobacion->getCausas() . "',
				'" .$EncuestaReprobacion->getSugerencia() . "',
				'" .$EncuestaReprobacion->getCompromisos() . "',
				'" .$EncuestaReprobacion->getComentarios() . "',
				'" .$EncuestaReprobacion->getidGrupo() . "',
				'" .$EncuestaReprobacion->getidTutor() . "',
				'" .$EncuestaReprobacion->getidFamiliar() . "',
				'" .$EncuestaReprobacion->getFecha() . "'
			);";
			if ($Mysql->Consulta($Consulta) === true) {
				echo "<script language='javascript'>alert('¡¡ Encuesta de reprobación creada exitosamente!!')</script>";
				echo "<script language='javascript'>window.location = 'EncuestaReprobacion.php'</script>";
			} else {
				echo "<script language='javascript'>alert('Error al crear carta responsiva')</script>";
				echo "<script language='javascript'>window.location = './../formularios/docentetutor/EncuestaReprobacion.php'</script>";
			}
			$Mysql->CerrarConexion();	

		}


					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					////TANIS/////////////////////////////////////////////////////////
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		public function AgregarFichaIdentificacionAlumno($alumno,$datosfamiliares,$datosescolares,$expectativanuevaform,$materiassecureprobadas, $habitosestudio){
			$Mysql =  new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "UPDATE `alumno` SET `Telefono` = '".$alumno->getTelefono()."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
			$Consulta2 = "INSERT INTO `datosfamiliares` (`idDatosFamiliares`, `Alumno_idAlumno`, `NoHermanos`, `LugarOcupas`, `OtrasPersonas`, `ActualmenteVives`, `SituacionFamiliar`, `RelacionPadres`)  
			VALUES (null,
			'"  .
			$datosfamiliares->getAlumno_idAlumno() . "','" .
			$datosfamiliares->getNoHermanos() . "','" .
			$datosfamiliares->getLugarOcupas() . "','" .
			$datosfamiliares->getOtrasPersonas() . "','" .
			$datosfamiliares->getActualmenteVives() . "','" .
			$datosfamiliares->getSituacionFamiliar() . "','" .
			$datosfamiliares->getRelacionPadres() .
			"');"; 
			$Consulta3 = "UPDATE `datosescolares` SET `OtrosEstudios` = '".$datosescolares->getOtrosEstudios()."', `RendimientoEscolar` = '".$datosescolares->getRendimientoEscolar()."', `MateriaGustada` = '".$datosescolares->getMateriaGustada()."', `MateriaDisgustada` = '".$datosescolares->getMateriaDisgustada()."', `ReaccionPadres` = '".$datosescolares->getReaccionPadres()."', `Espectativa` = '".$datosescolares->getExpectativa()."' WHERE datosescolares.Alumno_idAlumno = '".$datosescolares->getAlumno_idAlumno()."';"; 

			$Consulta4 = "INSERT INTO `expectativanuevaform` (`idExpectativaNuevaForm`, `Alumno_idAlumno`, `Atraccion`, `Precupacion`, `EstudioEs`, `ProblemaCausa`, `Preparado`, `ValorarProfesor`) VALUES (NULL, '".$expectativanuevaform->getAlumno_idAlumno()."', '".$expectativanuevaform->getAtraccion()."', '".$expectativanuevaform->getPreocupacion()."', '".$expectativanuevaform->getEstudiosEs()."', '".$expectativanuevaform->getProblemaCausa()."', '".$expectativanuevaform->getPreparado()."', '".$expectativanuevaform->getValorarProfesor()."');";
			if($materiassecureprobadas->getAlumno_idAlumno() == 0){

			}else{
				$Consulta5 = "INSERT INTO `materiassecureprobadas` (`idMateriasSecuReprobadas`, `Alumno_idAlumno`, `Materias`, `Motivo`) VALUES (NULL, '".$materiassecureprobadas->getAlumno_idAlumno()."', '".$materiassecureprobadas->getMaterias()."', '".$materiassecureprobadas->getMotivo()."');";
				$Mysql->Consulta($Consulta5);
			}
			$Consulta6 = "INSERT INTO `habitosestudio` (`idHabitosEstudio`, `Alumno_idAlumno`, `TiempoTarea`, `TiempoEstudio`, `TiempoLectura`, `LugarEstudio`, `EstimulacionEstudio`, `MotivoAprender`, `MotivoInteres`, `MotivoSatisfaccion`, `MotivoFracaso`, `MotivoAgradecer`, `MotivoPremio`, `MotivoHacer`, `TecnicasEstudio`) VALUES (NULL, '".$habitosestudio->getAlumno_idAlumno()."', '".$habitosestudio->getTiempoTarea()."', '".$habitosestudio->getTiempoEstudio()."', '".$habitosestudio->getTiempoLectura()."', '".$habitosestudio->getLugarEstudio()."', '".$habitosestudio->getEstimulacionEstudio()."', '".$habitosestudio->getMotivoAprender()."', '".$habitosestudio-> getMotivoInteres()."', '".$habitosestudio->getMotivoSatisfaccion()."', '".$habitosestudio->getMotivoFracaso()."', '".$habitosestudio->getMotivoAgradecer()."', '".$habitosestudio->getMotivoPremio()."', '".$habitosestudio->getMotivoHacer()."', '".$habitosestudio->getTecnicasEstudio()."');"; 
			if(($Mysql->Consulta($Consulta) == true)&&($Mysql->Consulta($Consulta2) == true)&&($Mysql->Consulta($Consulta3) == true)&&($Mysql->Consulta($Consulta4) == true)&&($Mysql->Consulta($Consulta6) == true)){
				echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
				echo "<script language='javascript'>window.location='ConsultaModificacionFichaIdentificacionAlumno.php'</script>";
			}else{
				echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();
		}

		public function ModificacionFichaIdentificacionAlumno($alumno,$datosfamiliares, $habitosestudio){
			$Mysql =  new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "UPDATE `alumno` SET `Telefono` = '".$alumno->getTelefono()."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
			$Consulta2 = "UPDATE `datosfamiliares` SET `NoHermanos` = '".$datosfamiliares->getNoHermanos()."',`LugarOcupas` = '".$datosfamiliares->getLugarOcupas()."', `OtrasPersonas` = '".$datosfamiliares->getOtrasPersonas()."', `ActualmenteVives` = '".$datosfamiliares->getActualmenteVives()."', `SituacionFamiliar` = '".$datosfamiliares->getSituacionFamiliar()."', `RelacionPadres` = '".$datosfamiliares->getRelacionPadres()."' WHERE `datosfamiliares`.`Alumno_idAlumno` = '".$datosfamiliares->getAlumno_idAlumno()."'; "; 
			$Consulta3 = "UPDATE `habitosestudio` SET `TiempoTarea` = '".$habitosestudio->getTiempoTarea()."', `TiempoEstudio` = '".$habitosestudio->getTiempoEstudio()."', `TiempoLectura` = '".$habitosestudio->getTiempoLectura()."', `LugarEstudio` = '".$habitosestudio->getLugarEstudio()."', `EstimulacionEstudio` = '".$habitosestudio->getEstimulacionEstudio()."', `MotivoAprender` = '".$habitosestudio->getMotivoAprender()."', `MotivoInteres` = '".$habitosestudio-> getMotivoInteres()."', `MotivoSatisfaccion` = '".$habitosestudio->getMotivoSatisfaccion()."', `MotivoFracaso` = '".$habitosestudio->getMotivoFracaso()."', `MotivoAgradecer` = '".$habitosestudio->getMotivoAgradecer()."', `MotivoPremio` = '".$habitosestudio->getMotivoPremio()."', `MotivoHacer` = '".$habitosestudio->getMotivoHacer()."', `TecnicasEstudio` = '".$habitosestudio->getTecnicasEstudio()."' WHERE `habitosestudio`.`Alumno_idAlumno` = '".$habitosestudio->getAlumno_idAlumno()."'; ";
			if(($Mysql->Consulta($Consulta) == true)&&($Mysql->Consulta($Consulta2) == true)&&($Mysql->Consulta($Consulta3) == true)){
				echo "<script language='javascript'>alert('Datos del alumno guardados exitosamente!')</script>";
				echo "<script language='javascript'>window.location='ConsultaModificacionFichaIdentificacionAlumno.php'</script>";
			}else{
				echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();
		}



		public function AgregarSolicitudBaja($solicitudbaja){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "INSERT INTO `solicitudbaja` (`idSolicitudBaja`, `Alumno_idAlumno`, `idFamiliares`, `idDocenteTutor`, `idCorAcademico`, `idCorAdministrativo`, `idDirector`, `Motivo`, `ObservacionesTutor`, `ObservacionesHistorialPagos`,`idGrupo`) VALUES (NULL, '".$solicitudbaja->getAlumno_idAlumno()."', '".$solicitudbaja->getidFamiliares()."', '".$solicitudbaja->getidDocenteTutor()."', '".$solicitudbaja->getidCorAcademico()."', '".$solicitudbaja->getidCorAdministrativo()."', '".$solicitudbaja->getidDirector()."', '".$solicitudbaja->getMotivo()."', '".$solicitudbaja->getObservacionesTutor()."', '".$solicitudbaja->getObservacionesHistorialPagos()."', '".$solicitudbaja->getidGrupo()."');"; 
			$Consulta2 = "UPDATE `alumno` SET `Estatus` = '0' WHERE `alumno`.`idAlumno` = '".$solicitudbaja->getAlumno_idAlumno()."'; ";

			if(($Mysql->Consulta($Consulta) == true) && ($Mysql->Consulta($Consulta2) == true)){
				echo "<script language='javascript'>alert('Solicitud de baja guardada exitosamente!')</script>";
				echo "<script language='javascript'>window.location='../docentetutor/ConsultasSolicitudBaja.php'</script>";
			}else{
				echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();
		}

		public function AgregarDatosPersonales($domicilio,$familiares){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consultaP = "SELECT * FROM `familiares` WHERE familiares.Nombre = '".$familiares->getNombre()."' and familiares.ApellidoP = '".$familiares->getApellidoP()."' and familiares.ApellidoM = '".$familiares->getApellidoM()."' and familiares.FechaNacimiento = '".$familiares-> getFechaNacimiento()."'; ";
			$ResultadoP = $Mysql->Consulta($consultaP);
			if(mysqli_num_rows($ResultadoP) == 0){
				$Consulta1 = "SELECT domicilio.idDomicilio FROM domicilio WHERE domicilio.Calle = '".$domicilio->getCalle()."' and domicilio.Numero = '".$domicilio->getNumero()."' and domicilio.Colonia = '".$domicilio->getColonia()."'";
				$Resultado = $Mysql->Consulta($Consulta1);
				if(mysqli_num_rows($Resultado) == 0){
					$Consulta = "INSERT INTO domicilio (`idDomicilio`, `CP`, `Calle`, `Numero`, `Colonia`, `Municipio`, `Localidad`, `Estado`, `TelefonoCasa`) 
					VALUES (null,
					'"  .
					$domicilio->getCP() . "','" .
					$domicilio->getCalle() . "','" .
					$domicilio->getNumero() . "','" .
					$domicilio->getColonia() . "','" .
					$domicilio->getMunicipio() . "','" .
					$domicilio->getLocalidad() . "','" .
					$domicilio->getEstado() . "','" .
					$domicilio->getTelefonoCasa() .
					"');";
					if($Mysql->Consulta($Consulta)){
						$Consulta3 = "SELECT MAX(domicilio.idDomicilio) AS idDomicilio FROM domicilio";
						$Resultado2 = $Mysql->Consulta($Consulta3);
						while ($fila = $Resultado2->fetch_assoc()) {
							$IdDom1 = $fila['idDomicilio'];
							$Consulta2 = "INSERT INTO `familiares` (`idFamiliares`, `Domicilio_idDomicilio`, `Alumno_idAlumno`, `Nombre`, `ApellidoP`, `ApellidoM`, `FechaNacimiento`, `Profesion`, `LugarTrabajo`, `Parentesco`, `Telefono`, `Tutor`, `Estatus`, `Justificantes`, `Validado`, `Correo`) VALUES (NULL, '".$IdDom1."', '".$familiares->getAlumno_idAlumno()."', '".$familiares->getNombre()."', '".$familiares->getApellidoP()."', '".$familiares->getApellidoM()."', '".$familiares-> getFechaNacimiento()."', '".$familiares->getProfesion()."', '".$familiares->getLugarTrabajo()."', '".$familiares->getParentesco()."', '".$familiares->getTelefono()."', '".$familiares->getTutor()."','1', '".$familiares->getJustificantes()."', NULL, '".$familiares->getCorreo()."'); ";
							if ($Mysql->Consulta($Consulta2) == true) {
								return 1;
											//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
							} else {
								return 0;
											//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							}
						}
					}else{
									//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						return 0;
					}
				}else{
					while ($fila = $Resultado->fetch_assoc()) {
						$IdDom2 = $fila['idDomicilio'];

						$Consulta2 = "INSERT INTO `familiares` (`idFamiliares`, `Domicilio_idDomicilio`, `Alumno_idAlumno`, `Nombre`, `ApellidoP`, `ApellidoM`, `FechaNacimiento`, `Profesion`, `LugarTrabajo`, `Parentesco`, `Telefono`, `Tutor`, `Estatus`, `Justificantes`, `Validado`, `Correo`) VALUES (NULL, '".$IdDom2."', '".$familiares->getAlumno_idAlumno()."', '".$familiares->getNombre()."', '".$familiares->getApellidoP()."', '".$familiares->getApellidoM()."', '".$familiares-> getFechaNacimiento()."', '".$familiares->getProfesion()."', '".$familiares->getLugarTrabajo()."', '".$familiares->getParentesco()."', '".$familiares->getTelefono()."', '".$familiares->getTutor()."','1', '".$familiares->getJustificantes()."', NULL, '".$familiares->getCorreo()."'); ";
						if ($Mysql->Consulta($Consulta2) == true) {
										//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
							return 1;
										//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
						} else {
										//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							return 0;
						}
					}
				}
			}else{
				return 4;
			}
			echo "<script language='javascript'>window.location = 'ConsultaModificacionFichaIdentificacionAlumno.php'</script>";
			$Mysql->CerrarConexion();
		}


		public function ActualizarDatosPersonales($domicilio,$familiares){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta1 = "SELECT domicilio.idDomicilio FROM domicilio WHERE domicilio.Calle = '".$domicilio->getCalle()."' and domicilio.Numero = '".$domicilio->getNumero()."' and domicilio.Colonia = '".$domicilio->getColonia()."'";
			$Resultado = $Mysql->Consulta($Consulta1);
			if(mysqli_num_rows($Resultado) == 0){
				$Consulta = "INSERT INTO domicilio (`idDomicilio`, `CP`, `Calle`, `Numero`, `Colonia`, `Municipio`, `Localidad`, `Estado`, `TelefonoCasa`) 
				VALUES (null,
				'"  .
				$domicilio->getCP() . "','" .
				$domicilio->getCalle() . "','" .
				$domicilio->getNumero() . "','" .
				$domicilio->getColonia() . "','" .
				$domicilio->getMunicipio() . "','" .
				$domicilio->getLocalidad() . "','" .
				$domicilio->getEstado() . "','" .
				$domicilio->getTelefonoCasa() .
				"');";
				if($Mysql->Consulta($Consulta)){
					$Consulta3 = "SELECT MAX(domicilio.idDomicilio) AS idDomicilio FROM domicilio";
					$Resultado2 = $Mysql->Consulta($Consulta3);
					while ($fila = $Resultado2->fetch_assoc()) {
						$IdDom1 = $fila['idDomicilio'];
						$Consulta2 = "UPDATE `familiares` SET `Domicilio_idDomicilio` = '".$IdDom1."', `Nombre` = '".$familiares->getNombre()."', `ApellidoP` = '".$familiares->getApellidoP()."', `ApellidoM` = '".$familiares->getApellidoM()."', `FechaNacimiento` = '".$familiares-> getFechaNacimiento()."', `Profesion` = '".$familiares->getProfesion()."', `LugarTrabajo` = '".$familiares->getLugarTrabajo()."', `Parentesco` = '".$familiares->getParentesco()."', `Telefono` = '".$familiares->getTelefono()."',`Tutor` = '".$familiares->getTutor()."', `Estatus` = '".$familiares->getEstatus()."', `Justificantes` = '".$familiares->getJustificantes()."', `Correo` = '".$familiares->getCorreo()."' WHERE `familiares`.`idFamiliares` = '".$familiares->getidFamiliares()."';";
						if ($Mysql->Consulta($Consulta2) == true) {
							return 1;
										//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
										//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
						} else {
							return 0;
										//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						}
					}
				}else{
								//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
					return 0;
				}
			}else{
				while ($fila = $Resultado->fetch_assoc()) {
					$IdDom2 = $fila['idDomicilio'];
					$ConsultaT = "UPDATE `domicilio` SET `TelefonoCasa` = '".$domicilio->getTelefonoCasa()."' WHERE `domicilio`.`idDomicilio` = '".$IdDom2."';";
					$Consulta2 = "UPDATE `familiares` SET `Domicilio_idDomicilio` = '".$IdDom2."', `Nombre` = '".$familiares->getNombre()."', `ApellidoP` = '".$familiares->getApellidoP()."', `ApellidoM` = '".$familiares->getApellidoM()."', `FechaNacimiento` = '".$familiares-> getFechaNacimiento()."', `Profesion` = '".$familiares->getProfesion()."', `LugarTrabajo` = '".$familiares->getLugarTrabajo()."', `Parentesco` = '".$familiares->getParentesco()."', `Telefono` = '".$familiares->getTelefono()."',`Tutor` = '".$familiares->getTutor()."', `Estatus` = '".$familiares->getEstatus()."', `Justificantes` = '".$familiares->getJustificantes()."', `Correo` = '".$familiares->getCorreo()."' WHERE `familiares`.`idFamiliares` = '".$familiares->getidFamiliares()."';";
					if (($Mysql->Consulta($Consulta2) == true)&&($Mysql->Consulta($ConsultaT) == true)) {
									//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
						return 1;
									//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
					} else {
									//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						return 1;
					}
				}
			}
			$Mysql->CerrarConexion();
		}

		public function EliminarFamiliar($familiares){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "DELETE FROM `familiares` WHERE `familiares`.`idFamiliares` = '".$familiares->getidFamiliares()."';"; 
			if($Mysql->Consulta($Consulta) == true){
							//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
				return 1;
			}else{
				return 0;
							//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();
		}

		public function InsertarUsuarioAlumno($Usuarioalumno){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "INSERT INTO `usuarios` (`idUsuarios`, `NombreUsuario`, `Contrasena`, `Tipo`) VALUES (NULL, '".$Usuario."', '".$Usuario."', NULL);;"; 
			if($Mysql->Consulta($Consulta) == true){
				echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
				return 1;
			}else{
				return 0;
							//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();

		}


		public function InsertarCartaCompromiso($cartacompromiso){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "INSERT INTO `cartacompromiso` (`idCartaCompromiso`, `Alumno_idAlumno`, `idFamiliar`, `idPersonal`, `Lugar`, `Fecha`, `AcuerdosRealizados`,`Motivo`,`idGrupo`) VALUES (NULL, '".$cartacompromiso->getAlumno_idAlumno()."', '".$cartacompromiso->getidFamiliares()."','".$cartacompromiso->getidPersonal()."','".$cartacompromiso->getLugar()."', '".$cartacompromiso->getFecha()."', '".$cartacompromiso->getAcuerdosRealizados()."' , '".$cartacompromiso->getMotivo()."', '".$cartacompromiso->getidGrupo()."' );";
			if($Mysql->Consulta($Consulta) == true){
				echo "<script language='javascript'>alert('Carta compromiso guardada exitosamente!')</script>";
				echo "<script language='javascript'>window.location = 'ConsultasCartaCompromisoTutor.php'</script>";
				return 1;
			}else{
				return 0;
				echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
			}
			$Mysql->CerrarConexion();

		}

		public function AltaDatosBasicosAlumno($alumno,$lugarnacimiento,$secundaria,$datosescolares, $datosmedicos, $domicilio, $historialalumno){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
						//-----------------------------------------------
			$Consulta1 = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.CURP, alumno.FechaNac from alumno WHERE alumno.CURP = '".$alumno->getCURP()."';";
			$Resultado = $Mysql->Consulta($Consulta1);
			if(mysqli_num_rows($Resultado) == 0){

				$Consulta = "INSERT INTO `alumno` (`idAlumno`, `Grupos_idGrupos`, `LugarNacimiento_idLugarNacimiento`, `Domicilio_idDomicilio`, `Nombre`, `ApellidoP`, `ApellidoM`, `Fotografia`, `SS`, `CURP`, `NC`, `FechaNac`, `Correo`, `Sexo`, `Estatus`, `Telefono`,`TelefonoEmergencia`) VALUES (NULL, '0', '0', '0', '".$alumno->getNombre()."', '".$alumno->getApellidoP()."', '".$alumno->getApellidoM()."', NULL, '".$alumno->getSS()."', '".$alumno->getCURP()."', '".$alumno->getNC()."', '".$alumno->getFechaNac()."', '".$alumno->getCorreo()."', '".$alumno->getSexo()."', '1', 'NULL' , '".$alumno->getTelefonoEmergencia()."' ); ";
				if($Mysql->Consulta($Consulta) == true){
								//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
					$Consulta3 = "SELECT MAX(alumno.idAlumno) AS idAlumno FROM alumno";
					$Resultado2 = $Mysql->Consulta($Consulta3);
					while ($fila = $Resultado2->fetch_assoc()) {
						$NewidAlumno = $fila['idAlumno'];
						$alumno->setidAlumno($NewidAlumno);
						$historialalumno->setAlumno_idAlumno($NewidAlumno);
					}
					$Consulta1 = "";
					$Resultado = "";
					$Consulta = "";
					$Consulta3 = "";
					$Resultado2 = "";
					$fila = "";
			//------------------------------------------------------------Inicio GradoGrupoCarrera----------------------------------------------------------------------------
							/*if($historialalumno->getGrupos_idGrupos() == 0){
								$ConsultaGG = "UPDATE `alumno` SET `Grupos_idGrupos` = '0' WHERE `alumno`.`idAlumno` = '".$historialalumno->getAlumno_idAlumno()."';";
								if($Mysql->Consulta($ConsultaGG) == true){
									echo "<script language='javascript'>alert('Grado y Grupo asigandos temporales al alumno!')</script>";
								}
							}else{*/
								$ConsultaGG = "UPDATE `alumno` SET `Grupos_idGrupos` = '".$historialalumno->getGrupos_idGrupos()."' WHERE `alumno`.`idAlumno` = '".$historialalumno->getAlumno_idAlumno()."';";
								if($Mysql->Consulta($ConsultaGG) == true){
									$ConsultaHA = "INSERT INTO `historialalumno` (`idHistorialAlumno`, `Grupos_idGrupos`, `Alumno_idAlumno`, `Fecha`) VALUES (NULL, '".$historialalumno->getGrupos_idGrupos()."', '".$historialalumno->getAlumno_idAlumno()."', '".$historialalumno->getFecha()."');";
									if($Mysql->Consulta($ConsultaHA) ==  true){
										//echo "<script language='javascript'>alert('Grado y Grupo asigandos al alumno!')</script>";
									}
								}
							//}
			//------------------------------------------------------------Inicio GradoGrupoCarrera----------------------------------------------------------------------------

			//------------------------------------------------------------Inicio lugar nacimiento----------------------------------------------------------------------------
								if($lugarnacimiento->getidLugarNacimiento() == 0){
									$Consulta1 = "SELECT lugarnacimiento.idLugarNacimiento FROM lugarnacimiento WHERE lugarnacimiento.Pais = '".$lugarnacimiento-> getPais()."' AND lugarnacimiento.Estado = '".$lugarnacimiento->getEstado()."' AND lugarnacimiento.Localidad = '".$lugarnacimiento->getLocalidad()."' AND lugarnacimiento.Municipio = '".$lugarnacimiento->getMunicipio()."';";
									$Resultado = $Mysql->Consulta($Consulta1);
									if(mysqli_num_rows($Resultado) == 0){
										$Consulta = "INSERT INTO `lugarnacimiento` (`idLugarNacimiento`, `Pais`, `Estado`, `Localidad`, `Municipio`) VALUES (NULL, '".$lugarnacimiento-> getPais()."', '".$lugarnacimiento->getEstado()."', '".$lugarnacimiento->getLocalidad()."', '".$lugarnacimiento->getMunicipio()."');";
										if($Mysql->Consulta($Consulta) == true){
										//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
											$Consulta3 = "SELECT MAX(lugarnacimiento.idLugarNacimiento) AS idLugarNacimiento FROM lugarnacimiento";
											$Resultado2 = $Mysql->Consulta($Consulta3);
											while ($fila = $Resultado2->fetch_assoc()) {
												$IdlugarNac = $fila['idLugarNacimiento'];
												$Consulta2 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
												if ($Mysql->Consulta($Consulta2) == true) {
												//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
												} else {
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}
										}else{
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}else{
										while ($fila = $Resultado->fetch_assoc()) {
											$IdlugarNac = $fila['idLugarNacimiento'];
											echo $idSecundariaExistente;
										}
										$Consulta4 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
										if ($Mysql->Consulta($Consulta4) == true) {
										//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
										} else {
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}
								}else{
									$Consulta4 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$lugarnacimiento->getidLugarNacimiento()."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
									if ($Mysql->Consulta($Consulta4) == true) {
									//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
									} else {
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}

								$Consulta1 = "";
								$Resultado = "";
								$Consulta = "";
								$Consulta3 = "";
								$Resultado2 = "";
								$fila = "";
								$Consulta4 = "";
			//------------------------------------------------------------------------------Fin lugar nacimeinto------------------------------------------------------------------------------
			//------------------------------------------------------------------------Inicio Secundaria promedio -----------------------------------------------------------------------------
								if($secundaria->getidSecundaria() == 0){
									$Consulta1 = "SELECT secundaria.idSecundaria FROM secundaria WHERE secundaria.Matricula = '".$secundaria->getMatricula()."';";
									$Resultado = $Mysql->Consulta($Consulta1);
									if(mysqli_num_rows($Resultado) == 0){
										$Consulta = "INSERT INTO `secundaria` (`idSecundaria`, `Matricula`, `Nombre`, `Municipio`, `Estado`, `Pais`) VALUES (NULL, '".$secundaria->getMatricula()."', '".$secundaria->getNombre()."', '".$secundaria->getMunicipio()."', '".$secundaria->getEstado()."', '".$secundaria->getPais()."');";
										if($Mysql->Consulta($Consulta) == true){
											echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
											$Consulta3 = "SELECT MAX(secundaria.idSecundaria) AS idSecundaria FROM secundaria";
											$Resultado2 = $Mysql->Consulta($Consulta3);
											while ($fila = $Resultado2->fetch_assoc()) {
												$IdSecundaria = $fila['idSecundaria'];
												$Consulta2 = "INSERT INTO `datosescolares` (`idDatosEscolares`, `Alumno_idAlumno`, `Secundaria_idSecundaria`, `PromedioSecu`, `OtrosEstudios`, `RendimientoEscolar`, `MateriaGustada`, `MateriaDisgustada`, `ReaccionPadres`, `Espectativa`) VALUES (NULL, '".$alumno->getidAlumno()."', '".$IdSecundaria."', '".$datosescolares->getPromedioSecu()."', NULL, NULL, NULL, NULL, NULL, NULL);";
												if ($Mysql->Consulta($Consulta2) == true) {
												//echo "<script language='javascript'>alert('Datos de secundaria agregados al alumno exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
												} else {
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}
										}else{
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}else{
										while ($fila = $Resultado->fetch_assoc()) {
											$idSecundariaExistente = $fila['idSecundaria'];
											echo $idSecundariaExistente;
										}
										$Consulta4 = "INSERT INTO `datosescolares` (`idDatosEscolares`, `Alumno_idAlumno`, `Secundaria_idSecundaria`, `PromedioSecu`, `OtrosEstudios`, `RendimientoEscolar`, `MateriaGustada`, `MateriaDisgustada`, `ReaccionPadres`, `Espectativa`) VALUES (NULL, '".$alumno->getidAlumno()."', '".$idSecundariaExistente."', '".$datosescolares->getPromedioSecu()."', NULL, NULL, NULL, NULL, NULL, NULL);";
										if ($Mysql->Consulta($Consulta4) == true) {
										//echo "<script language='javascript'>alert('Datos de secundaria agregados al alumno exitosamente!')</script>";
								//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
										} else {
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}
								}else{
									$Consulta4 = "INSERT INTO `datosescolares` (`idDatosEscolares`, `Alumno_idAlumno`, `Secundaria_idSecundaria`, `PromedioSecu`, `OtrosEstudios`, `RendimientoEscolar`, `MateriaGustada`, `MateriaDisgustada`, `ReaccionPadres`, `Espectativa`) VALUES (NULL, '".$alumno->getidAlumno()."','".$secundaria->getidSecundaria()."', '".$datosescolares->getPromedioSecu()."', NULL, NULL, NULL, NULL, NULL, NULL);";
									if ($Mysql->Consulta($Consulta4) == true) {
									//echo "<script language='javascript'>alert('Datos de secundaria agregados al alumno exitosamente!')</script>";
								//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
									} else {
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}
								$Consulta1 = "";
								$Resultado = "";
								$Consulta = "";
								$Consulta3 = "";
								$Resultado2 = "";
								$fila = "";
								$Consulta4 = "";	
			//------------------------------------------------------------------------Fin Secundaria promedio -----------------------------------------------------------------------------		
			//------------------------------------------------------------------------Inicio Domicilio-------------------------------------------------------------------------------------
								$Consulta1 = "SELECT domicilio.idDomicilio FROM domicilio WHERE domicilio.Calle = '".$domicilio->getCalle()."' and domicilio.Numero = '".$domicilio->getNumero()."' and domicilio.Colonia = '".$domicilio->getColonia()."'";
								$Resultado = $Mysql->Consulta($Consulta1);
								if(mysqli_num_rows($Resultado) == 0){
									$Consulta = "INSERT INTO domicilio (`idDomicilio`, `CP`, `Calle`, `Numero`, `Colonia`, `Municipio`, `Localidad`, `Estado`, `TelefonoCasa`) 
									VALUES (null,
									'"  .
									$domicilio->getCP() . "','" .
									$domicilio->getCalle() . "','" .
									$domicilio->getNumero() . "','" .
									$domicilio->getColonia() . "','" .
									$domicilio->getMunicipio() . "','" .
									$domicilio->getLocalidad() . "','" .
									$domicilio->getEstado() . "','" .
									$domicilio->getTelefonoCasa() .
									"');";
									if($Mysql->Consulta($Consulta)){
										$Consulta3 = "SELECT MAX(domicilio.idDomicilio) AS idDomicilio FROM domicilio";
										$Resultado2 = $Mysql->Consulta($Consulta3);
										while ($fila = $Resultado2->fetch_assoc()) {
											$IdDom1 = $fila['idDomicilio'];
											$Consulta2 = "UPDATE `alumno` SET `Domicilio_idDomicilio` = '".$IdDom1."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
											if ($Mysql->Consulta($Consulta2) == true) {
											//echo "<script language='javascript'>alert('Datos de domicilio agregados al alumno exitosamente!')</script>";
										//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
											} else {
												echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
											}
										}
									}else{
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}else{
									while ($fila = $Resultado->fetch_assoc()) {
										$IdDom2 = $fila['idDomicilio'];

										$Consulta2 = "UPDATE `alumno` SET `Domicilio_idDomicilio` = '".$IdDom2."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
										if ($Mysql->Consulta($Consulta2) == true) {
										//echo "<script language='javascript'>alert('Datos de domicilio agregados al alumno exitosamente!')</script>";
										} else {
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}
								}
			//------------------------------------------------------------------------Fin Domicilio---------------------------------------------------------------------------------------
			//------------------------------------------------------------------------Inicio Datos medicos--------------------------------------------------------------------------------
								$Consulta1 = "SELECT * FROM datosmedicos where datosmedicos.Alumno_idAlumno = '".$alumno->getidAlumno()."';";
								$Resultado = $Mysql->Consulta($Consulta1);
								if(mysqli_num_rows($Resultado) == 0){
									$Consulta = "INSERT INTO `datosmedicos` (`idDatosMedicos`, `Alumno_idAlumno`, `Enfermedad`, `Tratamiento`, `Tabaquismo`, `Drogadiccion`, `Alcoholismo`) VALUES (NULL, '".$alumno->getidAlumno()."', '".$datosmedicos->getEnfermedad()."', '".$datosmedicos->getTratamiento()."', '".$datosmedicos->getTabaquismo()."', '".$datosmedicos->getDrogadiccion()."', '".$datosmedicos->getAlcoholismo()."');"; 
									if($Mysql->Consulta($Consulta) == true){
									//echo "<script language='javascript'>alert('Datos medicos agregados al alumno exitosamente!')</script>";
									}else{
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}else{
								//echo "<script language='javascript'>alert('Datos medicos ya antes guardados!')</script>";
								}
			//--------------------------------------------------------------Fin Datos medicos--------------------------------------------------------------------------------

			//------------------------------------------------------------Creacion de usuario y contrasenya------------------------------------------------------------------
								$Consulta1 = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM from alumno WHERE alumno.idAlumno = '".$alumno->getidAlumno()."';";
								$Resultado = $Mysql->Consulta($Consulta1);
								while ($fila = $Resultado->fetch_assoc()) {
									$Nombre = $fila['Nombre'];
									$ApellidoP = $fila['ApellidoP'];
									$ApellidoM = $fila['ApellidoM'];
								}

								$Usuario = "";
								$Usuario = $Usuario.substr($Nombre,0, 1);
								$Apellidop = explode(" ", $ApellidoP);
								for ($i=0; $i < count($Apellidop); $i++) { 
									$Usuario = $Usuario.$Apellidop[$i];
								}

								$Usuario =strtolower($Usuario.substr($ApellidoM,0, 1));

								$Consulta = "SELECT usuariosalumnos.NombreUsuario FROM `usuariosalumnos` WHERE usuariosalumnos.NombreUsuario LIKE '%".$Usuario."%';";
								$Resultado = $Mysql->Consulta($Consulta);
								if(mysqli_num_rows($Resultado) > 0){
									$Numero  = mysqli_num_rows($Resultado);
									$Usuario = $Usuario.($Numero+1);
								}

								$Contrasenya = md5($Usuario);
								$Consulta = "INSERT INTO `usuariosalumnos` (`idUsuariosAlumnos`, `Alumno_idAlumno`, `NombreUsuario`, `Contrasena`) VALUES (NULL, '".$alumno->getidAlumno()."', '".$Usuario."', '".$Contrasenya."');"; 
								if($Mysql->Consulta($Consulta) == true){
								//echo "<script language='javascript'>alert('Usuario y contrasena del alumno guardados exitosamente!, El usuario es: ".$Usuario." La contraseña es: ".$Contrasenya."')</script>";
									//return 1;
								}else{
									//return 0;
									//echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
								}
			//--------------------------------------------------------Fin Creacion de usuario y contrasenya------------------------------------------------------------------
								echo "<script language='javascript'>alert('Alumno creado con éxito!')</script>";	
								echo "<script language='javascript'>window.location = 'InicioAlumnoTodos.php'</script>";


							}else{
								echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							}


						}else{
							echo "<script language='javascript'>alert('Alumno ya dado de alta!')</script>";
							echo "<script language='javascript'>window.location = 'AltaDatosBasicosAlumno.php'</script>";

						}
					//echo "<script language='javascript'>alert('Alumno creado con éxito!')</script>";
						//echo "<script language='javascript'>window.location = 'InicioAlumnoTodos.php'</script>";
						//--------------------------------------------------------------------------------------------
					//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
						


						$Mysql->CerrarConexion();
					}


					public function ModificarDatosBasicosAlumno($alumno,$lugarnacimiento,$secundaria,$datosescolares, $datosmedicos, $domicilio, $historialalumno){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();



			//Consulta para saber lo datos antes de actualizar--------------------------------------------------------------------------------------------------------------------
						$Consulta1 = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.Grupos_idGrupos from alumno WHERE alumno.idAlumno = '".$alumno->getidAlumno()."';";
						$Resultado = $Mysql->Consulta($Consulta1);

						while ($fila = $Resultado->fetch_assoc()) {
							$NombreN = $alumno->getNombre();
							$ApellidoPN = $alumno->getApellidoP();
							$ApellidoMN = $alumno->getApellidoM();

							$Nombre = $fila['Nombre'];
							$ApellidoP = $fila['ApellidoP'];
							$ApellidoM = $fila['ApellidoM'];
							$idGrupoAlumnoAnterior = $fila['Grupos_idGrupos'];
						}
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
						$Consulta = "UPDATE `alumno` SET `Nombre` = '".$alumno->getNombre()."', `ApellidoP` = '".$alumno-> getApellidoP()."', `ApellidoM` = '".$alumno->getApellidoM()."', `SS` = '".$alumno->getSS()."', `CURP` = '".$alumno->getCURP()."', `NC` = '".$alumno->getNC()."', `FechaNac` = '".$alumno->getFechaNac()."', `Correo` = '".$alumno->getCorreo()."', `Estatus` = '".$alumno->getEstatus()."', `Sexo` = '".$alumno->getSexo()."', `TelefonoEmergencia` = '".$alumno->getTelefonoEmergencia()."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
						if($Mysql->Consulta($Consulta) == true){
								//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
								/*$Consulta3 = "SELECT MAX(alumno.idAlumno) AS idAlumno FROM alumno";
										$Resultado2 = $Mysql->Consulta($Consulta3);
										while ($fila = $Resultado2->fetch_assoc()) {
												$NewidAlumno = $fila['idAlumno'];
												$alumno->setidAlumno($NewidAlumno);
											}*/
											$Consulta1 = "";
											$Resultado = "";
											$Consulta = "";
											$Consulta3 = "";
											$Resultado2 = "";
											$fila = "";
			//---------------------------------------------Inicio GradoGrupoCarrera--------------------------------------------------------------------------------
											if($historialalumno->getGrupos_idGrupos() == $idGrupoAlumnoAnterior){				
												//echo "<script language='javascript'>alert('No hay modificacion en el  grupo del alumno!')</script>";
											}else{
												$ConsultaGG = "UPDATE `alumno` SET `Grupos_idGrupos` = '".$historialalumno->getGrupos_idGrupos()."' WHERE `alumno`.`idAlumno` = '".$historialalumno->getAlumno_idAlumno()."';";
												if($Mysql->Consulta($ConsultaGG) == true){
													$ConsultaHA = "INSERT INTO `historialalumno` (`idHistorialAlumno`, `Grupos_idGrupos`, `Alumno_idAlumno`, `Fecha`) VALUES (NULL, '".$historialalumno->getGrupos_idGrupos()."', '".$historialalumno->getAlumno_idAlumno()."', '".$historialalumno->getFecha()."');";
													if($Mysql->Consulta($ConsultaHA) ==  true){
														//echo "<script language='javascript'>alert('Grado y Grupo asigandos al alumno!')</script>";
													}
												}
											}
			//-------------------------------------------------------Inicio GradoGrupoCarrera----------------------------------------------------------------------------


			//------------------------------------------------------------Inicio lugar nacimiento----------------------------------------------------------------------------
											if($lugarnacimiento->getidLugarNacimiento() == 0){
												$Consulta1 = "SELECT lugarnacimiento.idLugarNacimiento FROM lugarnacimiento WHERE lugarnacimiento.Pais = '".$lugarnacimiento-> getPais()."' AND lugarnacimiento.Estado = '".$lugarnacimiento->getEstado()."' AND lugarnacimiento.Localidad = '".$lugarnacimiento->getLocalidad()."' AND lugarnacimiento.Municipio = '".$lugarnacimiento->getMunicipio()."';";
												$Resultado = $Mysql->Consulta($Consulta1);
												if(mysqli_num_rows($Resultado) == 0){
													$Consulta = "INSERT INTO `lugarnacimiento` (`idLugarNacimiento`, `Pais`, `Estado`, `Localidad`, `Municipio`) VALUES (NULL, '".$lugarnacimiento-> getPais()."', '".$lugarnacimiento->getEstado()."', '".$lugarnacimiento->getLocalidad()."', '".$lugarnacimiento->getMunicipio()."');";
													if($Mysql->Consulta($Consulta) == true){
														echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
														$Consulta3 = "SELECT MAX(lugarnacimiento.idLugarNacimiento) AS idLugarNacimiento FROM lugarnacimiento";
														$Resultado2 = $Mysql->Consulta($Consulta3);
														while ($fila = $Resultado2->fetch_assoc()) {
															$IdlugarNac = $fila['idLugarNacimiento'];
															$Consulta2 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
															if ($Mysql->Consulta($Consulta2) == true) {
																//echo "<script language='javascript'>alert('Datos del alumno guardados exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
															} else {
																echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
															}
														}
													}else{
														echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
													}
												}else{
													while ($fila = $Resultado->fetch_assoc()) {
														$IdlugarNac = $fila['idLugarNacimiento'];
														echo $idSecundariaExistente;
													}
													$Consulta4 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
													if ($Mysql->Consulta($Consulta4) == true) {
														//echo "<script language='javascript'>alert('Datos del lugar de nacimiento del alumno guardados exitosamente!')</script>";
													} else {
														echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
													}
												}
											}else{
												$Consulta4 = "UPDATE `alumno` SET `LugarNacimiento_idLugarNacimiento` = '".$lugarnacimiento->getidLugarNacimiento()."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
												if ($Mysql->Consulta($Consulta4) == true) {
													//echo "<script language='javascript'>alert('Datos del lugar de nacimiento del alumno guardados exitosamente!')</script>";
												} else {
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}

											$Consulta1 = "";
											$Resultado = "";
											$Consulta = "";
											$Consulta3 = "";
											$Resultado2 = "";
											$fila = "";
											$Consulta4 = "";
			//----------------------------------------------------------Fin lugar nacimeinto------------------------------------------------------------------------------
			//----------------------------------------------------Inicio Secundaria promedio -----------------------------------------------------------------------------
											if($secundaria->getidSecundaria() == 0){
												$Consulta1 = "SELECT secundaria.idSecundaria FROM secundaria WHERE secundaria.Matricula = '".$secundaria->getMatricula()."';";
												$Resultado = $Mysql->Consulta($Consulta1);
												if(mysqli_num_rows($Resultado) == 0){
													$Consulta = "INSERT INTO `secundaria` (`idSecundaria`, `Matricula`, `Nombre`, `Municipio`, `Estado`, `Pais`) VALUES (NULL, '".$secundaria->getMatricula()."', '".$secundaria->getNombre()."', '".$secundaria->getMunicipio()."', '".$secundaria->getEstado()."', '".$secundaria->getPais()."');";
													if($Mysql->Consulta($Consulta) == true){
														echo "<script language='javascript'>alert('Datos de secundaria del alumno guardados exitosamente!')</script>";
														$Consulta3 = "SELECT MAX(secundaria.idSecundaria) AS idSecundaria FROM secundaria";
														$Resultado2 = $Mysql->Consulta($Consulta3);
														while ($fila = $Resultado2->fetch_assoc()) {
															$IdSecundaria = $fila['idSecundaria'];
															$Consulta2 = "UPDATE `datosescolares` SET `Secundaria_idSecundaria` = '".$idSecundaria."', `PromedioSecu` = '".$datosescolares->getPromedioSecu()."' WHERE `datosescolares`.`Alumno_idAlumno` = '".$alumno->getidAlumno()."';";
															if ($Mysql->Consulta($Consulta2) == true) {
																//echo "<script language='javascript'>alert('Datos de secundaria del alumno guardados exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
															} else {
																echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
															}
														}
													}else{
														echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
													}
												}else{
													while ($fila = $Resultado->fetch_assoc()) {
														$idSecundariaExistente = $fila['idSecundaria'];
														echo $idSecundariaExistente;
													}
													$Consulta4 = "UPDATE `datosescolares` SET `Secundaria_idSecundaria` = '".$idSecundariaExistente."', `PromedioSecu` = '".$datosescolares->getPromedioSecu()."' WHERE `datosescolares`.`Alumno_idAlumno` = '".$alumno->getidAlumno()."';";
													if ($Mysql->Consulta($Consulta4) == true) {
														//echo "<script language='javascript'>alert('Datos de secundaria del alumno guardados exitosamente!')</script>";
								//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
													} else {
														echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
													}
												}
											}else{
												$Consulta4 = "UPDATE `datosescolares` SET `Secundaria_idSecundaria` = '".$secundaria->getidSecundaria()."', `PromedioSecu` = '".$datosescolares->getPromedioSecu()."' WHERE `datosescolares`.`Alumno_idAlumno` = '".$alumno->getidAlumno()."';";
												if ($Mysql->Consulta($Consulta4) == true) {
													//echo "<script language='javascript'>alert('Datos de secundaria del alumno guardados exitosamente!')</script>";
								//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
												} else {
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}
											$Consulta1 = "";
											$Resultado = "";
											$Consulta = "";
											$Consulta3 = "";
											$Resultado2 = "";
											$fila = "";
											$Consulta4 = "";	
			//----------------------------------------------------Fin Secundaria promedio -----------------------------------------------------------------------------		
			//--------------------------------------------------------Inicio Domicilio----------------------------------------------------------------------------------
											$Consulta1 = "SELECT domicilio.idDomicilio FROM domicilio WHERE domicilio.Calle = '".$domicilio->getCalle()."' and domicilio.Numero = '".$domicilio->getNumero()."' and domicilio.Colonia = '".$domicilio->getColonia()."'";
											$Resultado = $Mysql->Consulta($Consulta1);
											if(mysqli_num_rows($Resultado) == 0){
												$Consulta = "INSERT INTO domicilio (`idDomicilio`, `CP`, `Calle`, `Numero`, `Colonia`, `Municipio`, `Localidad`, `Estado`, `TelefonoCasa`) 
												VALUES (null,
												'"  .
												$domicilio->getCP() . "','" .
												$domicilio->getCalle() . "','" .
												$domicilio->getNumero() . "','" .
												$domicilio->getColonia() . "','" .
												$domicilio->getMunicipio() . "','" .
												$domicilio->getLocalidad() . "','" .
												$domicilio->getEstado() . "','" .
												$domicilio->getTelefonoCasa() .
												"');";
												if($Mysql->Consulta($Consulta)){
													$Consulta3 = "SELECT MAX(domicilio.idDomicilio) AS idDomicilio FROM domicilio";
													$Resultado2 = $Mysql->Consulta($Consulta3);
													while ($fila = $Resultado2->fetch_assoc()) {
														$IdDom1 = $fila['idDomicilio'];
														$Consulta2 = "UPDATE `alumno` SET `Domicilio_idDomicilio` = '".$IdDom1."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
														if ($Mysql->Consulta($Consulta2) == true) {
															//echo "<script language='javascript'>alert('Datos de domicilio del alumno guardados exitosamente!')</script>";
										//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
														} else {
															echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
														}
													}
												}else{
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}else{
												while ($fila = $Resultado->fetch_assoc()) {
													$IdDom2 = $fila['idDomicilio'];
													$ConsultaT = "UPDATE `domicilio` SET `TelefonoCasa` = '".$domicilio->getTelefonoCasa()."' WHERE `domicilio`.`idDomicilio` = '".$IdDom2."';";
													$Consulta2 = "UPDATE `alumno` SET `Domicilio_idDomicilio` = '".$IdDom2."' WHERE `alumno`.`idAlumno` = '".$alumno->getidAlumno()."';";
													if (($Mysql->Consulta($Consulta2) == true)&&($Mysql->Consulta($ConsultaT) == true)) {
														//echo "<script language='javascript'>alert('Datos de domicilio del alumno guardados exitosamente!')</script>";
													} else {
														echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
													}
												}
											}
			//------------------------------------------------------------------------Fin Domicilio-----------------------------------------------------------------
			//------------------------------------------------------------------------Inicio Datos medicos-----------------------------------------------------------
											$Consulta = "UPDATE `datosmedicos` SET `Enfermedad` = '".$datosmedicos->getEnfermedad()."', `Tratamiento` = '".$datosmedicos->getTratamiento()."', `Tabaquismo` = '".$datosmedicos->getTabaquismo()."', `Drogadiccion` = '".$datosmedicos->getDrogadiccion()."', `Alcoholismo` = '".$datosmedicos->getAlcoholismo()."' WHERE `datosmedicos`.`Alumno_idAlumno` = '".$alumno->getidAlumno()."';";
											if($Mysql->Consulta($Consulta) == true){
												//echo "<script language='javascript'>alert('Datos medicos del alumno guardados exitosamente!')</script>";
											}else{
												echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
											}
			//----------------------------------------------------Fin Datos medicos-----------------------------------------------------------------------------------------
			//----------------------------------------------------Actualizar Usuario-----------------------------------------------------------------------------------------
											$PrimerLetraNombreE = substr($Nombre,0,1);
											$ApellidoPE =  explode(" ", $ApellidoP);

											$CadenaApellidoPE = "";
											for ($i=0; $i < count($ApellidoPE); $i++) { 
												$CadenaApellidoPE = $CadenaApellidoPE.$ApellidoPE[$i];
											}
											$PrimerLetraApellidoME = substr($ApellidoM,0,1); 

											$PrimerLetraNombreN = substr($NombreN,0,1);
											$ApellidoPN =  explode(" ", $ApellidoPN);

											$CadenaApellidoPN = "";
											for ($i=0; $i < count($ApellidoPN); $i++) { 
												$CadenaApellidoPN = $CadenaApellidoPN.$ApellidoPN[$i];
											}

											$PrimerLetraApellidoME = substr($ApellidoM,0,1);
											$PrimerLetraApellidoMN = substr($ApellidoMN,0,1);


											if(($PrimerLetraNombreE == $PrimerLetraNombreN) && ($CadenaApellidoPN == $CadenaApellidoPE) && ($PrimerLetraApellidoME == $PrimerLetraApellidoMN)){


											}else{

												$Usuario = "";
												$Usuario = $Usuario.substr($NombreN,0, 1);
												$Usuario = $Usuario.$CadenaApellidoPN;
												$Usuario =strtolower($Usuario.substr($ApellidoMN,0, 1));

												$Consulta = "SELECT usuariosalumnos.NombreUsuario FROM `usuariosalumnos` WHERE usuariosalumnos.NombreUsuario LIKE '%".$Usuario."%';";
												$Resultado = $Mysql->Consulta($Consulta);
												if(mysqli_num_rows($Resultado) > 0){
													$Numero  = mysqli_num_rows($Resultado);
													$Usuario = $Usuario.($Numero+1);
												}

												$Contrasenya = md5($Usuario);
												$Consulta = "UPDATE `usuariosalumnos` SET `NombreUsuario` = '".$Usuario."', `Contrasena` = '".$Contrasenya."' WHERE `usuariosalumnos`.`idUsuariosAlumnos` = '".$alumno->getidAlumno()."';";
												if($Mysql->Consulta($Consulta) == true){
													//echo "<script language='javascript'>alert('Usuario y contrasena actualizados exitosamente!, El usuario es: ".$Usuario." La contraseña es: ".$Contrasenya."')</script>";
												}else{
													echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
												}
											}
			//------------------------------------------------------------Actualizar Usuario---------------------------------------------------------------------------------
											echo "<script language='javascript'>alert('Alumno modificado con éxito!')</script>";
											echo "<script language='javascript'>window.location = 'InicioAlumnoIndividual.php'</script>";
										}else{
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
						/*}else{
							echo "<script language='javascript'>alert('Alumno ya dado de alta!')</script>";
						}*/
						//--------------------------------------------------------------------------------------------
						echo "<script language='javascript'>window.location = 'ModificacionDatosBasico.php'</script>";
						$Mysql->CerrarConexion();
					}

					public function AgregarCanalizacion($canalizacion){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$Consulta = "INSERT INTO `canalizacion` (`idCanalizacion`, `ProblematicasCanalizacion_idProblematicasCanalizacion`, `Alumno_idAlumno`, `idFamiliar`, `Fecha`, `Descripcion`, `Instancia`, `Estatus`,`idGrupo`) VALUES (NULL, '".$canalizacion->getidProblematicasCanalizacion()."', '".$canalizacion->getAlumno_idAlumno()."', '".$canalizacion->getidFamiliar()."', '".$canalizacion-> getFecha()."', '".$canalizacion->getDescripcion()."', '".$canalizacion->getInstancia()."', '1', '".$canalizacion->getidGrupo()."' );";
						if($Mysql->Consulta($Consulta) == true){
							echo "<script language='javascript'>alert('Canalizacion guardada con exito!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultasCanalizaciones.php'</script>";
						}else{
							echo "<script language='javascript'>alert('Error!')</script>";
							
						}
						$Mysql->CerrarConexion();
					}

					public function ModificarCanalizacion($canalizacion){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$Consulta = "UPDATE `canalizacion` SET `Estatus` = '".$canalizacion->getEstatus()."' WHERE `canalizacion`.`idCanalizacion` = '".$canalizacion->getidCanalizacion()."'; ;";
						if($Mysql->Consulta($Consulta) == true){
							echo "<script language='javascript'>alert('Modificacion Realizada con exito!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultasCanalizaciones.php'</script>";
							
						}else{
							echo "<script language='javascript'>alert('Error!')</script>";
						}
						$Mysql->CerrarConexion();
					}

					public function AgregarTutoriaIndividual($tutoriaindividual){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$ConsultaNoTutoria ="SELECT MAX(tutoriaindividual.NoTutoria) AS NoTutoria FROM tutoriaindividual WHERE tutoriaindividual.Alumno_idAlumno = '".$tutoriaindividual->getAlumno_idAlumno()."';";
						$Resultado = $Mysql->Consulta($ConsultaNoTutoria);
						while ($fila = $Resultado->fetch_assoc()) {
							$NoTutoria = $fila['NoTutoria'] + 1;
						}
						$Consulta = "INSERT INTO `tutoriaindividual` (`idTutoriaIndividual`, `Alumno_idAlumno`, `NoTutoria`, `FechaTutoria`, `Horario`, `ActividadesTareas`,`idTutor`,`idGrupo`) VALUES (NULL, '".$tutoriaindividual->getAlumno_idAlumno()."', '".$NoTutoria ."', '".$tutoriaindividual->getFechaTutoria()."', '".$tutoriaindividual->getHorario()."', '".$tutoriaindividual->getActividadesTareas()."','".$tutoriaindividual->getidTutor()."', '".$tutoriaindividual->getidGrupo()."' );";
						if($Mysql->Consulta($Consulta) == true){
							echo "<script language='javascript'>alert('Tutoria individual agregada con exito!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultasTutoriaIndividualTutor.php'</script>";
						}else{
							echo "<script language='javascript'>alert('Error!')</script>";
						}
						$Mysql->CerrarConexion();
					}

			/// ------------------------------------------------------- Contrasena Personal 22-09-2019 -------------------------------------------------------
					public function ModificarContrasenaPersonal($UsuariosPersonal)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$Consulta = "UPDATE usuarios SET  
						Contrasena = '" . $UsuariosPersonal->getContrasena() . "' Where Personal_idPersonal = " . $UsuariosPersonal->getPersonal_idPersonal() . ";";
						if ($Mysql->Consulta($Consulta) === true) {
							echo "<script language='javascript'>alert('Modificación de contraseña exitosa, deberas ingresar al sistema nuevamente')</script>";
					//echo "<script language='javascript'>window.location = './../../formularios/menus/CerrarSesionAlumnoCont.php'</script>";
						}
						$Resultado = $Mysql->Consulta($Consulta);
						$Mysql->CerrarConexion();
					}

					//Admin----------------------------------
					public function AltaCedulaPersonal($personal, $lugarnacimiento, $domicilio, $estudiospersonal){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `personal` SET `TelefonoCel` = '".$personal->getTelefonoCel()."', `Correo` = '".$personal->getCorreo()."', `FechaNacimiento` = '".$personal->getFechaNac()."', `TipoSangre` = '".$personal->getTipoSangre()."',`Sexo` = '".$personal->getSexo()."', `EstadoCivil` = '".$personal->getEstadoCivil()."'  WHERE `personal`.`idPersonal` = ".$personal->getidPersonal()."; ";
						if ($Mysql->Consulta($Consulta) === true) {
						//---------------------------------------------------------------LugarNacimiento-------------------------------------------------------------------
							if($lugarnacimiento->getidLugarNacimiento() == 0){
								$Consulta1 = "SELECT lugarnacimiento.idLugarNacimiento FROM lugarnacimiento WHERE lugarnacimiento.Pais = '".$lugarnacimiento-> getPais()."' AND lugarnacimiento.Estado = '".$lugarnacimiento->getEstado()."' AND lugarnacimiento.Localidad = '".$lugarnacimiento->getLocalidad()."' AND lugarnacimiento.Municipio = '".$lugarnacimiento->getMunicipio()."';";
								$Resultado = $Mysql->Consulta($Consulta1);
								if(mysqli_num_rows($Resultado) == 0){
									$Consulta = "INSERT INTO `lugarnacimiento` (`idLugarNacimiento`, `Pais`, `Estado`, `Localidad`, `Municipio`) VALUES (NULL, '".$lugarnacimiento-> getPais()."', '".$lugarnacimiento->getEstado()."', '".$lugarnacimiento->getLocalidad()."', '".$lugarnacimiento->getMunicipio()."');";
									if($Mysql->Consulta($Consulta) == true){
										//echo "<script language='javascript'>alert('Datos guardados exitosamente!')</script>";
										$Consulta3 = "SELECT MAX(lugarnacimiento.idLugarNacimiento) AS idLugarNacimiento FROM lugarnacimiento";
										$Resultado2 = $Mysql->Consulta($Consulta3);
										while ($fila = $Resultado2->fetch_assoc()) {
											$IdlugarNac = $fila['idLugarNacimiento'];
											$Consulta2 = "UPDATE `personal` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `personal`.`idPersonal` = '".$personal->getidPersonal()."';";
											if ($Mysql->Consulta($Consulta2) == true) {
												//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
											//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
											} else {
												echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
											}
										}
									}else{
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}else{
									while ($fila = $Resultado->fetch_assoc()) {
										$IdlugarNac = $fila['idLugarNacimiento'];
										echo $idSecundariaExistente;
									}
									$Consulta4 = "UPDATE `personal` SET `LugarNacimiento_idLugarNacimiento` = '".$IdlugarNac."' WHERE `personal`.`idPersonal` = '".$personal->getidPersonal()."';";
									if ($Mysql->Consulta($Consulta4) == true) {
										//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
									} else {
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}
							}else{
								$Consulta4 = "UPDATE `personal` SET `LugarNacimiento_idLugarNacimiento` = '".$lugarnacimiento->getidLugarNacimiento()."' WHERE `personal`.`idPersonal` = '".$personal->getidPersonal()."';";
								if ($Mysql->Consulta($Consulta4) == true) {
									//echo "<script language='javascript'>alert('Datos lugar de nacimeinto agregados al alumno exitosamente!')</script>";
								} else {
									echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
								}
							}

							$Consulta1 = "";
							$Resultado = "";
							$Consulta = "";
							$Consulta3 = "";
							$Resultado2 = "";
							$fila = "";
							$Consulta4 = "";
						//---------------------------------------------------------------Domicilio-------------------------------------------------------------------------

							$Consulta1 = "SELECT domicilio.idDomicilio FROM domicilio WHERE domicilio.Calle = '".$domicilio->getCalle()."' and domicilio.Numero = '".$domicilio->getNumero()."' and domicilio.Colonia = '".$domicilio->getColonia()."'";
							$Resultado = $Mysql->Consulta($Consulta1);
							if(mysqli_num_rows($Resultado) == 0){
								$Consulta = "INSERT INTO domicilio (`idDomicilio`, `CP`, `Calle`, `Numero`, `Colonia`, `Municipio`, `Localidad`, `Estado`, `TelefonoCasa`) 
								VALUES (null,
								'"  .
								$domicilio->getCP() . "','" .
								$domicilio->getCalle() . "','" .
								$domicilio->getNumero() . "','" .
								$domicilio->getColonia() . "','" .
								$domicilio->getMunicipio() . "','" .
								$domicilio->getLocalidad() . "','" .
								$domicilio->getEstado() . "','" .
								$domicilio->getTelefonoCasa() .
								"');";
								if($Mysql->Consulta($Consulta)){
									$Consulta3 = "SELECT MAX(domicilio.idDomicilio) AS idDomicilio FROM domicilio";
									$Resultado2 = $Mysql->Consulta($Consulta3);
									while ($fila = $Resultado2->fetch_assoc()) {
										$IdDom1 = $fila['idDomicilio'];
										$Consulta2 = "UPDATE `personal` SET `Domicilio_idDomicilio` = '".$IdDom1."' WHERE `personal`.`idPersonal` = '".$personal->getidPersonal()."';";
										if ($Mysql->Consulta($Consulta2) == true) {
											//echo "<script language='javascript'>alert('Datos de domicilio agregados al alumno exitosamente!')</script>";
										//echo "<script language='javascript'>window.location = 'AltaFichaIDentificacionAlumno.php'</script>";
										} else {
											echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
										}
									}
								}else{
									echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
								}
							}else{
								while ($fila = $Resultado->fetch_assoc()) {
									$IdDom2 = $fila['idDomicilio'];

									$Consulta2 = "UPDATE `personal` SET `Domicilio_idDomicilio` = '".$IdDom2."' WHERE `personal`.`idPersonal` = '".$personal->getidPersonal()."';";
									if ($Mysql->Consulta($Consulta2) == true) {
										//echo "<script language='javascript'>alert('Datos de domicilio agregados al alumno exitosamente!')</script>";
									} else {
										echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
									}
								}
							}
			//-----------------------------------------------------------------------Datos Estudio Personal ----------------------------------------------------------------
							$ConsultaVer = "SELECT * FROM `esudiospersonal` WHERE esudiospersonal.Personal_idPersonal = '".$estudiospersonal->getPersonal_idPersonal()."'";
							$ResultadoVer = $Mysql->Consulta($ConsultaVer);

							if(mysqli_num_rows($ResultadoVer) == 0){
								$Consulta4 = "INSERT INTO `esudiospersonal` (`idEsudiosPersonal`, `Personal_idPersonal`, `UltimoGrado`, `Carrera`, `AreaConocimiento`, `EntidadFederativa`, `Institucion`, `Estatus`, `DocAcademico`, `FechaExpedicion`, `NoFolioDoc`) VALUES (NULL, '".$estudiospersonal->getPersonal_idPersonal()."', '".$estudiospersonal->getUltimoGrado()."', '".$estudiospersonal->getCarrera()."', '".$estudiospersonal->getAreaConocimiento()."', '".$estudiospersonal->getEntidadFederativa()."', '".$estudiospersonal->getInstitucion()."', '".$estudiospersonal->getEstatus()."', '".$estudiospersonal->getDocAcademico()."', '".$estudiospersonal->getFechaExpedicion()."', '".$estudiospersonal->getNoFolioDoc()."');";

								if($Mysql->Consulta($Consulta4) === true){
									echo "<script language='javascript'>alert('¡¡Si se inserto los estudiospersonal!!')</script>";
								}else{

									echo "<script language='javascript'>alert('¡¡No se inserto los estudiospersonal!!')</script>";
								}

							}else{
								$Consulta4 = "UPDATE `esudiospersonal` SET `Personal_idPersonal` = '".$estudiospersonal->getPersonal_idPersonal()."', `UltimoGrado` = '".$estudiospersonal->getUltimoGrado()."', `Carrera` = '".$estudiospersonal->getCarrera()."', `AreaConocimiento` = '".$estudiospersonal->getAreaConocimiento()."', `EntidadFederativa` = '".$estudiospersonal->getEntidadFederativa()."', `Institucion` = '".$estudiospersonal->getInstitucion()."', `Estatus` = '".$estudiospersonal->getEstatus()."', `DocAcademico` = '".$estudiospersonal->getDocAcademico()."', `FechaExpedicion` = '".$estudiospersonal->getFechaExpedicion()."', `NoFolioDoc` = '".$estudiospersonal->getNoFolioDoc()."' WHERE `esudiospersonal`.`Personal_idPersonal` = '".$estudiospersonal->getPersonal_idPersonal()."'; ";

								echo "<script language='javascript'>alert('".$Consulta4."')</script>";

								if($Mysql->Consulta($Consulta4) === true){
									echo "<script language='javascript'>alert('¡¡Si se inserto los estudiospersonal!!')</script>";
								}else{

									echo "<script language='javascript'>alert('¡¡No se inserto los estudiospersonal!!')</script>";
								}
							}
							echo "<script language='javascript'>alert('¡¡Datos almacenados exitosamente!!')</script>";
							echo "<script language='javascript'>window.location = './../administrativo/ModificacionCedulaPersonal.php'</script>";
						} else {
							echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						}
						$Mysql->CerrarConexion();


					}

					public function AgregarClausula($Clausulas)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$Consulta = "INSERT INTO `clausulas` (`idClausulas`, `Numero`, `Asunto`, `Motivo`, `Documentacion`, `Estatus`) VALUES (NULL, '".$Clausulas->getNumero()."', '".$Clausulas->getAsunto()."', '".$Clausulas->getMotivo()."', '".$Clausulas->getDocumentacion()."', '1'); ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function ModificarClausula($Clausulas)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE clausulas SET clausulas.Numero = '".$Clausulas->getNumero()."', clausulas.Asunto = '".$Clausulas->getAsunto()."', clausulas.Estatus = '".$Clausulas->getEstatus()."' , clausulas.Motivo = '".$Clausulas->getMotivo()."' , clausulas.Documentacion = '".$Clausulas->getDocumentacion()."' WHERE clausulas.idClausulas = '".$Clausulas->getidClausulas()."'; ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}


					public function AgregarConceptosPago($ConceptosdePago)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$consultaP = "SELECT * FROM `conceptodepago` where NombreConcepto = '".$ConceptosdePago->getNombreConcepto()."' and Monto = '".$ConceptosdePago->getMonto()."'; ";
						$ResultadoP = $Mysql->Consulta($consultaP);
						if(mysqli_num_rows($ResultadoP) == 0){
							$Consulta = "INSERT INTO `conceptodepago` (`idConceptoDePago`, `Monto`, `NombreConcepto`, `MontoLetra`, `Estatus`) VALUES (NULL, '".$ConceptosdePago->getMonto()."', '".$ConceptosdePago->getNombreConcepto()."', '".$ConceptosdePago->getLetraMonto()."' , '1'); ";
							if ($Mysql->Consulta($Consulta) === true) {
								return 1;
							}else{
								return 0;
							}
						}else{
							return 4;
						}
						$Mysql->CerrarConexion();

					}

					public function ModificarConceptosPago($ConceptosdePago)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `conceptodepago` SET `Monto` = '".$ConceptosdePago->getMonto()."', `NombreConcepto` = '".$ConceptosdePago->getNombreConcepto()."', `MontoLetra` = '".$ConceptosdePago->getLetraMonto()."' ,`Estatus` = ".$ConceptosdePago->getEstatus()." WHERE `conceptodepago`.`idConceptoDePago` = '".$ConceptosdePago->getidConceptoDePago()."'";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function AgregarArticuloInventario($Inventario){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "INSERT INTO `inventario` (`idInventario`, `Articulo`, `Descripcion`, `Precio`, `Proveedores`, `Origenes`, `NoSerie`, `FechaIngreso`, `Tipo`, `FechaRegistro`, `Estatus`, `Marca`, `Modelo`, `ClaveInventario` ,`Mes`, `Anyo`, `Imagen`, `Categorias`, `Estado`, `Area`, `Ubicacion`, `Empleado`) VALUES (NULL, '".$Inventario->getArticulo()."', '".$Inventario->getDescripcion()."', '".$Inventario->getPrecio()."','".$Inventario->getProveedores()."', '".$Inventario->getOrigenes()."', '".$Inventario->getNoSerie()."', '".$Inventario->getFechaIngreso()."', '".$Inventario->getTipo()."', '".$Inventario->getFechaRegistroZac()."', '".$Inventario->getEstatus()."', '".$Inventario->getMarca()."', '".$Inventario->getModelo()."','".$Inventario->getClaveInventario()."', '".$Inventario->getMes()."', '".$Inventario->getAnyo()."', 'null', '".$Inventario->getCategorias()."', '".$Inventario->getEstadoFisico()."', '".$Inventario->getArea()."', '".$Inventario->getUbicacion()."', '".$Inventario->getEmpleado()."');";

						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function ModificarArticuloInventario($Inventario){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `inventario` SET `Articulo` = '".$Inventario->getArticulo()."', `Descripcion` = '".$Inventario->getDescripcion()."', `Precio` = '".$Inventario->getPrecio()."', `Proveedores` = '".$Inventario->getProveedores()."', `Origenes` = '".$Inventario->getOrigenes()."', `NoSerie` = '".$Inventario->getNoSerie()."', `FechaIngreso` = '".$Inventario->getFechaIngreso()."', `Tipo` = '".$Inventario->getTipo()."', `FechaRegistro` = '".$Inventario->getFechaRegistroZac()."', `Estatus` = '".$Inventario->getEstatus()."', `Marca` = '".$Inventario->getMarca()."', `Modelo` = '".$Inventario->getModelo()."',`ClaveInventario` = '".$Inventario->getClaveInventario()."', `Mes` = '".$Inventario->getMes()."', `Anyo` = '".$Inventario->getAnyo()."', `Categorias` = '".$Inventario->getCategorias()."', `Estado` = '".$Inventario->getEstadoFisico()."', `Area` = '".$Inventario->getArea()."', `Ubicacion` = '".$Inventario->getUbicacion()."', `Empleado` = '".$Inventario->getEmpleado()."' WHERE `inventario`.`idInventario` = '".$Inventario->getidInventario()."';";

						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function AgregarIncidencia($Incidencia){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "INSERT INTO `incidencias` (`idIncidencias`, `idEmpleado`, `idClausulas`, `Observaciones`, `Fecha`, `HoraInicial`, `HoraFinal`, `Estatus`) VALUES (NULL, '".$Incidencia->getidPersonal()."', '".$Incidencia->getidClausula()."', '".$Incidencia->getObservaciones()."', '".$Incidencia->getFecha()."', '".$Incidencia->getHoraInicial()."', '".$Incidencia->getHoraFinal()."', '1');";
						if ($Mysql->Consulta($Consulta) === true) {
							echo "<script language='javascript'>alert('¡¡Se Guardo Correctamente el Registro!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultaIncidencias.php'</script>";
						}else{
							echo "<script language='javascript'>alert('¡¡Error al realizar operación verifique los datos!!')</script>";
						}
						$Mysql->CerrarConexion();
					}

					public function ModificacionIncidencia($Incidencia){
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `incidencias` SET `idEmpleado` = '".$Incidencia->getidPersonal()."', `idClausulas` = '".$Incidencia->getidClausula()."', `Observaciones` = '".$Incidencia->getObservaciones()."', `Fecha` = '".$Incidencia->getFecha()."', `HoraInicial` = '".$Incidencia->getHoraInicial()."', `HoraFinal` = '".$Incidencia->getHoraFinal()."', `Estatus` = '1' WHERE `incidencias`.`idIncidencias` = '".$Incidencia->getidIncidencias()."'; ";
						if ($Mysql->Consulta($Consulta) === true) {
							echo "<script language='javascript'>alert('¡¡Se Modificó Correctamente la Incidencia!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultaIncidencias.php'</script>";
						}else{
							echo "<script language='javascript'>alert('¡¡Error al realizar operación verifique los datos!!')</script>";
						}
						$Mysql->CerrarConexion();
					}

					public function AgregarIngresos($Ingreso){
						$Mysql =  new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "INSERT INTO `ingresos` (`idIngresos`, `idConceptodePago`, `idAlumno`, `Fecha`, `Observacion`, `Estatus`, `Monto`, `Folio`, `idGrupo`, `MontoLetra`) VALUES (NULL, '".$Ingreso->getidConceptoDePago()."', '".$Ingreso->getidAlumno()."', '".$Ingreso->getFecha()."', '".$Ingreso->getObservacion()."', '1', '".$Ingreso->getMonto()."', '".$Ingreso->getFolio()."' , '".$Ingreso->getidGrupo()."', '".$Ingreso->getMontoLetra()."');";

						if($Mysql->Consulta($Consulta) === true){
							echo "<script language='javascript'>alert('¡¡Se añadio Correctamente!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultaIngresos.php'</script>";
						}else{
							echo "<script language='javascript'>alert('¡¡Error al realizar la operacion!!')</script>";
						}

						$Mysql->CerrarConexion();

					}

					public function ModificarIngresos($Ingreso){
						$Mysql =  new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `ingresos` SET `idConceptodePago` = '".$Ingreso->getidConceptoDePago()."', `idAlumno` = '".$Ingreso->getidAlumno()."', `Fecha` = '".$Ingreso->getFecha()."', `Observacion` = '".$Ingreso->getObservacion()."', `Estatus` = '".$Ingreso->getEstatus()."', `Monto` = '".$Ingreso->getMonto()."', `Folio` = '".$Ingreso->getFolio()."', `idGrupo` = '".$Ingreso->getidGrupo()."', `MontoLetra` = '".$Ingreso->getMontoLetra()."'   WHERE `ingresos`.`idIngresos` = '".$Ingreso->getidIngresos()."'; ";

						if($Mysql->Consulta($Consulta) === true){
							echo "<script language='javascript'>alert('¡¡La modificación se realizó Correctamente!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultaIngresos.php'</script>";
						}else{
							echo "<script language='javascript'>alert('¡¡Error al realizar la modificación!!')</script>";
						}

						$Mysql->CerrarConexion();

					}

					public function AgregarEgresos($Egreso){
						$Mysql =  new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "";

						if($Mysql->Consulta($Consulta) === true){

						}else{

						}

						$Mysql->CerrarConexion();

					}

					public function ModificarEgresos($Egreso){
						$Mysql =  new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "";

						if($Mysql->Consulta($Consulta) === true){

						}else{

						}
						$Mysql->CerrarConexion();

					}

					public function AgregarAreaPlantel($AreaPlantel)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();
						$Consulta1 = "SELECT areasplantel.idAreasPlantel FROM areasplantel WHERE areasplantel.NombreArea = '".$AreaPlantel->getNombreArea()."' and areasplantel.Edificio = '".$AreaPlantel->getEdificio()."';";
						$Resultado = $Mysql->Consulta($Consulta1);
						if(mysqli_num_rows($Resultado) == 0){
							$Consulta = "INSERT INTO `areasplantel` (`idAreasPlantel`, `NombreArea`, `Edificio`, `Estatus`) VALUES (NULL, '".$AreaPlantel->getNombreArea()."', '".$AreaPlantel->getEdificio()."', '1');";
							if ($Mysql->Consulta($Consulta) === true) {
								return 1;
							}else{
								return 0;
							}
						}else{
							return 4;
						}
						$Mysql->CerrarConexion();
					}

					public function ModificarAreaPlantel($AreaPlantel)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `areasplantel` SET `NombreArea` = '".$AreaPlantel->getNombreArea()."', `Edificio` = '".$AreaPlantel->getEdificio()."', `Estatus` = '".$AreaPlantel->getEstatus()."'  WHERE `areasplantel`.`idAreasPlantel` = '".$AreaPlantel->getidAreasPlantel()."'; ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}
































					public function RestablecerContrasenaAlumno($UsuariosAlumnos)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = " UPDATE `usuariosalumnos` SET `Contrasena` = '".$UsuariosAlumnos->getContrasena()."' WHERE `usuariosalumnos`.`idUsuariosAlumnos` = '".$UsuariosAlumnos->getidUsuariosAlumnos()."';  ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function AgregarAsignacionPrivilegio($Privilegio)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = " INSERT INTO `privilegios` (`idPrivilegios`, `Usuarios_idUsuarios`, `TipoPrivilegio`) VALUES (NULL, '".$Privilegio->getUsuarios_idUsuariosÍndice()."', '".$Privilegio->getTipoPrivilegio()."');  ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function ModificarAsignacionPrivilegio($Privilegio)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = " UPDATE privilegios SET `Usuarios_idUsuarios` = '".$Privilegio->getUsuarios_idUsuariosÍndice()."', `TipoPrivilegio` = '".$Privilegio->getTipoPrivilegio()."' WHERE `privilegios`.`idPrivilegios` = '".$Privilegio->getidPrivilegiosPrimaria()."';";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}

					public function RestablecerContrasenaPersonal($UsuariosPersonal)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = " UPDATE Usuarios SET Contrasena = '".$UsuariosPersonal->getContrasena()."'where usuarios.Personal_idPersonal = '".$UsuariosPersonal-> getPersonal_idPersonal()."' ";
						if ($Mysql->Consulta($Consulta) === true) {
							return 1;
						}else{
							return 0;
						}
						$Mysql->CerrarConexion();
					}	

					public function AltaPersonalAdmin($Personal, $InformacionLaboral)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta ="INSERT INTO Personal (idPersonal,InformacionLaboral_idInformacionLaboral,LugarNacimiento_idLugarNacimiento,Domicilio_idDomicilio,Nombre,ApellidoP,ApellidoM,CURP,RFC,SS,TipoSangre,Sexo,EstadoCivil) VALUES (null,'0','0','0','".$Personal->getNombre()."','".$Personal->getApellidoP()."','".$Personal->getApellidoM()."','".$Personal->getCURP()."','".$Personal->getRFC()."','".$Personal->getSS()."','0','0','0') ";

						if($Mysql->Consulta($Consulta) === true){
							$Consulta2="SELECT MAX(personal.idPersonal)as idPersonal FROM personal";
							$Resultado2 = $Mysql->Consulta($Consulta2);
							while ($fila=$Resultado2->fetch_assoc()){
								$idPer=$fila["idPersonal"];
							}

							$Consulta3 = "INSERT INTO informacionlaboral (idInformacionLaboral, NoEmpleado, FechaIngreso, Departamento, Puesto, Horas, Bruto, Neto) VALUES (NULL,'".$InformacionLaboral->getNoEmpleado()."', '".$InformacionLaboral->getFechaIngreso()."', '".$InformacionLaboral->getDepartamento()."' , '".$InformacionLaboral->getPuesto()."', '".$InformacionLaboral->getHoras()."', '".$InformacionLaboral->getBruto()."', '".$InformacionLaboral->getNeto()."')";

							if($Mysql->Consulta($Consulta3) === true){

								$Consulta5="SELECT MAX(informacionlaboral.idInformacionLaboral) as idInformacionLaboral FROM informacionlaboral";
								$Resultado3 = $Mysql->Consulta($Consulta5);
								while ($fila2=$Resultado3->fetch_assoc()){
									$idInfoPer=$fila2["idInformacionLaboral"];
								}

								$Consulta4 = "INSERT INTO usuarios(idUsuarios,Personal_idPersonal,NombreUsuario,Contrasena) VALUES (NULL,'".$idPer."','".$InformacionLaboral->getNoEmpleado()."','".md5(strtolower($Personal->getApellidoP()))."')";

								$Consulta6 = "UPDATE personal SET InformacionLaboral_idInformacionLaboral= '".$idInfoPer."' WHERE personal.idPersonal = '".$idPer."'";

								if (($Mysql->Consulta($Consulta4) === true) && ($Mysql->Consulta($Consulta6) === true)){
									echo "<script language='javascript'>window.location = 'ConsultaPersonales.php'</script>";

								}else{
									echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
								}

							}else{
								echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							}
						}else{
							echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						}

						$Mysql->CerrarConexion();

					}

					public function ModificacionPersonal($Personal,$InformacionLaboral)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();


						$ConsultaR="SELECT personal.ApellidoP , informacionlaboral.NoEmpleado FROM personal, informacionlaboral WHERE personal.idPersonal = '".$Personal->getidPersonal()."' and personal.InformacionLaboral_idInformacionLaboral = informacionlaboral.idInformacionLaboral ";
						$ResultadoR = $Mysql->Consulta($ConsultaR);
						while ($filaR=$ResultadoR->fetch_assoc()){
							$Apellido=$filaR["ApellidoP"];
							$NumEmpleado=$filaR["NoEmpleado"];
						}


						if(($Personal->getApellidoP() != $Apellido) && ($InformacionLaboral->getNoEmpleado()) != $NumEmpleado){

							$Consulta = "UPDATE `personal` SET `Nombre` = '".$Personal->getNombre()."', `ApellidoP` = '".$Personal->getApellidoP()."', `ApellidoM` = '".$Personal->getApellidoM()."', `CURP` = '".$Personal->getCURP()."', `RFC` = '".$Personal->getRFC()."', `SS` = '".$Personal->getSS()."' WHERE `personal`.`idPersonal` = '".$Personal->getidPersonal()."'; ";

							if($Mysql->Consulta($Consulta) === true){

								$Consulta3 = "UPDATE `informacionlaboral` SET `NoEmpleado` = '".$InformacionLaboral->getNoEmpleado()."', `FechaIngreso` = '".$InformacionLaboral->getFechaIngreso()."', `Departamento` = '".$InformacionLaboral->getDepartamento()."', `Puesto` = '".$InformacionLaboral->getPuesto()."', `Horas` = '".$InformacionLaboral->getHoras()."', `Bruto` = '".$InformacionLaboral->getBruto()."', `Neto` = '".$InformacionLaboral->getNeto()."' WHERE `informacionlaboral`.`idInformacionLaboral` = '".$InformacionLaboral->getidInformacionLaboral()."'; ";

								if($Mysql->Consulta($Consulta3) === true){

									$Consulta4 = "UPDATE `usuarios` SET `NombreUsuario` = '".$InformacionLaboral->getNoEmpleado()."', `Contrasena` = '".md5(strtolower($Personal->getApellidoP()))."' WHERE `usuarios`.`Personal_idPersonal` = '".$Personal->getidPersonal()."'; ";

									if (($Mysql->Consulta($Consulta4) === true)){
										echo "<script language='javascript'>window.location = 'ConsultaPersonales.php'</script>";

									}else{
										echo "Error en la consulta: " . $Consulta4 . "\n Error: " . $Mysql->error;
									}

								}else{
									echo "Error en la consulta: " . $Consulta3 . "\n Error: " . $Mysql->error;
								}
							}else{
								echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							}

//------------------------------------------------------------------------------------------------------------------------------
						}else{

							$Consulta = "UPDATE `personal` SET `Nombre` = '".$Personal->getNombre()."', `ApellidoP` = '".$Personal->getApellidoP()."', `ApellidoM` = '".$Personal->getApellidoM()."', `CURP` = '".$Personal->getCURP()."', `RFC` = '".$Personal->getRFC()."', `SS` = '".$Personal->getSS()."' WHERE `personal`.`idPersonal` = '".$Personal->getidPersonal()."'; ";

							if($Mysql->Consulta($Consulta) === true){

								$Consulta3 = "UPDATE `informacionlaboral` SET `NoEmpleado` = '".$InformacionLaboral->getNoEmpleado()."', `FechaIngreso` = '".$InformacionLaboral->getFechaIngreso()."', `Departamento` = '".$InformacionLaboral->getDepartamento()."', `Puesto` = '".$InformacionLaboral->getPuesto()."', `Horas` = '".$InformacionLaboral->getHoras()."', `Bruto` = '".$InformacionLaboral->getBruto()."', `Neto` = '".$InformacionLaboral->getNeto()."' WHERE `informacionlaboral`.`idInformacionLaboral` = '".$InformacionLaboral->getidInformacionLaboral()."'; ";

								if($Mysql->Consulta($Consulta3) === true){
									echo "<script language='javascript'>window.location = 'ConsultaPersonales.php'</script>";

								}else{
									echo "Error en la consulta: " . $Consulta3 . "\n Error: " . $Mysql->error;
								}
							}else{
								echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
							}

						}
						$Mysql->CerrarConexion();
					}

					public function AgregarNotas($Notas)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "INSERT INTO `notas` (`idNotas`, `Alumno_idAlumno`, `Asunto`, `Fecha`, `Observacion`, `idPersonal`) VALUES (NULL, '".$Notas->getAlumno_idAlumno()."', '".$Notas->getAsunto()."', '".$Notas->getFecha()."', '".$Notas->getObservacion()."', '0');";
						if ($Mysql->Consulta($Consulta) === true) {
							echo "<script language='javascript'>alert('¡¡Se Añadio correctamente la nota!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultasNotasDirectivos.php'</script>";
						}else{
							echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						}

						$Mysql->CerrarConexion();
					}

					public function ModificarNotas($Notas)
					{
						$Mysql = new MySQLConector();
						$Mysql->Conectar();

						$Consulta = "UPDATE `notas` SET `Asunto` = '".$Notas->getAsunto()."', `Fecha` = '".$Notas->getFecha()."', `Observacion` = '".$Notas->getObservacion()."' WHERE `notas`.`idNotas` = '".$Notas->getidNotas()."';";
						if ($Mysql->Consulta($Consulta) === true) {
							echo "<script language='javascript'>alert('¡¡Se modifico correctamente la nota!!')</script>";
							echo "<script language='javascript'>window.location = 'ConsultasNotasDirectivos.php'</script>";
						}else{
							echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
						}

						$Mysql->CerrarConexion();
					}						
}
?>
