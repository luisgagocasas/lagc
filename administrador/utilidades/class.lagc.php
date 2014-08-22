<?php
class Lg {
	function Permisos_Menu($tipo) { //Tipo '1' Puede ver estos enlaces
		if ($tipo==1) {
			echo '
			<a href="?lagc=com_usuarios&lista=usuarios" class="menu_principal">Personal</a>
			<a href="?lagc=com_configuracion" class="menu_principal">Configuración</a>
			';
		}
	}
	function ComponenteTitle($componente) {
		if (!empty($_GET['lagc'])) {
			$respcom = mysql_query("select * from componentes where url='".$componente."'");
			$ticom = mysql_fetch_array($respcom);
			if ($ticom['url']==$componente) {
				echo ucwords($ticom['nombre'])." - ";
			}
			else {
				echo "Error. noce encontro el Componente.";
			}
		}
		else {
			echo "Bienvenid@....";
		}
	}
}
?>