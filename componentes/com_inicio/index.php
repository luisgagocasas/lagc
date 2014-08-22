<?php
$configurapla = "administrador/componentes/com_inicio/config.xml";
if (file_exists($configurapla)) {
	$plantillas = simplexml_load_file($configurapla);
	if($plantillas){
		foreach ($plantillas as $plantilla) {
			$archivo = "componentes/com_inicio/".$plantilla->archivo.".tpl";
			if (file_exists($archivo)) { include $archivo; } else { echo "Error abriendo: <em>componentes/com_inicio/".$plantilla->archivo.".tpl</em>\n"; }
		}
	} else { echo "Sintaxi XML inv&aacute;lida Revise el archivo: administrador/componentes/com_inicio/config.xml\n"; }
} else { echo "Error abriendo: <em>administrador/componentes/com_inicio/config.xml</em>\n"; }
?>