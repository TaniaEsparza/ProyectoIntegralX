<?php 
	class CrearReporteIncidenciasGeneral{
		public function CrearReporte($FechaInicial, $FechaFinal){
		echo "<script language='javascript'>window.open ('../../reportes/IncidenciasFecha.php?FechaInicial=".$FechaInicial."&FechaFinal=".$FechaFinal."','_blank')</script>";
		echo "<script language='javascript'>window.location.href = '../../formularios/administrativo/ConsultaGeneralIncidencia.php'</script>";
		}
	}		
 ?>