<?php
class FC_LAGC_USER{
	function IMGUSER($tipo, $link, $nombre, $apellidos){
		$config = new LagcConfig();
		if ($tipo==1) {
			if (!empty($link)) {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/".$link."\" width=\"170\" height=\"200\" title=\"".$nombre.", ".$apellidos."\" />";
			} else {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/no_disponible.jpg\" width=\"170\" height=\"200\" title=\"".$nombre.", ".$apellidos."\" />";
			}
		}
		else if ($tipo==2) {
			if (!empty($link)) {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/thumb/".$link."\" width=\"50\" height=\"50\" title=\"".$nombre.", ".$apellidos."\" />";
			} else {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/thumb/no_disponible.jpg\" width=\"50\" height=\"50\" title=\"".$nombre.", ".$apellidos."\" />";
			}
		}
		return $imagen;
	}
}
?>