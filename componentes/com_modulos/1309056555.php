<?php
if (!empty($modu['mod_archivo'])) {
	$archivo = "componentes/com_modulos/modulos/".$modu['mod_archivo'];
	if($fp = fopen($archivo, "r")){ include $archivo; } /*incluimos el archivo*/
	else { echo "<h3>Error</h3>\n<p>No se puede leer el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
}
else {
	echo eval($modu['mod_tipvalor1']);
}
?>