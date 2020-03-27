<?php
if (!isset($_SESSION)) { session_start(); }

	echo '<div class="dropdown-menu2" role="menu" style="display: block; position: static; margin-bottom: 5px;width: 220px;margin-left: 10px;margin-top: 10px;" aria-labelledby="dropdownmenu">
            <h6 class="dropdown-header">Menú</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="ConsultaFichaIdentificacionDirectivos.php">Ficha de identificación</a>           
            <a class="dropdown-item" href="ConsultaTestAprendizajeDirectivos.php">Test Aprendizaje</a>
            <a class="dropdown-item" href="ConsultasCartaCompromisoDirectivos.php">Carta Compromiso</a>
            <a class="dropdown-item" href="ConsultaCartaResponsivaDirectivos.php">Carta Responsiva</a>
            <a class="dropdown-item" href="ConsultasTutoriaIndividualDirectivos.php">Tutoria Individual</a>
            <a class="dropdown-item" href="ConsultaEncuestasReprobacionDirectivos.php">Encuesta de reprobación</a>
            <a class="dropdown-item" href="ConsultasCanalizacionesDirectivos.php">Canalización</a>
            <a class="dropdown-item" href="ConsultasSolicitudBajaDirectivos.php">Solicitud de baja</a>
            <a class="dropdown-item" href="#">Calficaciones</a>
            <a class="dropdown-item" href="ConsultasNotasDirectivos.php">Notas/Observaciones</a>
        </div>';
 
?>