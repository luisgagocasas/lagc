<?php
class Menus {
	function Herramientas($get) {
		$tipdoc = array("1"=>"com_componentes", "2"=>"com_menu", "3"=>"com_idiomas", "4"=>"com_posiciones", "5"=>"com_modulos", "6"=>"com_imagenes", "7"=>"com_plantillas");
		ksort($tipdoc);
		foreach ($tipdoc as $key => $val) {
			if ($get==$val) {
				$devolver1 = "class=\"current\"";
			}
		}
		if (empty($devolver1)) { $devolver = "class=\"select\""; }
		else { $devolver = $devolver1; }
		return $devolver;
	}
	function Enlaces($valor,$get) {
		if ($valor==$get) {
			$devolver = " class=\"sub_show\"";
		}
		else { $devolver = ""; }
		return $devolver;
	}
	function Inicio($get) {
		$tipdoc = array("1"=>"com_usuarios");
		ksort($tipdoc);
		foreach ($tipdoc as $key => $val) {
			if ($get==$val) {
				$devolver1 = "class=\"current\"";
			}
		}
		if (empty($devolver1)) { $devolver = "class=\"select\""; }
		else { $devolver = $devolver1; }
		return $devolver;
	}
	function Configuracion($get) {
		$tipdoc = array("1"=>"com_configuracion");
		ksort($tipdoc);
		foreach ($tipdoc as $key => $val) {
			if ($get==$val) {
				$devolver1 = "class=\"current\"";
			}
		}
		if (empty($devolver1)) { $devolver = "class=\"select\""; }
		else { $devolver = $devolver1; }
		return $devolver;
	}
	function Componentes($get) {
		$resppc = mysql_query("select * from componentes where visible='1' order by nombre ASC");
		while($compo = mysql_fetch_array($resppc)) {
			if ($compo['id_com']!=1 and $compo['id_com']!=2 and $compo['id_com']!=3 and $compo['id_com']!=4 and $compo['id_com']!=6 and $compo['id_com']!=7 and $compo['id_com']!=8 and $compo['id_com']!=9 and $compo['id_com']!=10) {
				if ($get==$compo['url']) {
					$devolver1 = "class=\"current\"";
				}
			}
		}
		if (empty($devolver1)) { $devolver = "class=\"select\""; }
		else { $devolver = $devolver1; }
		return $devolver;
	}
}
?>