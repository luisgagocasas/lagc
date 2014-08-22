<textarea name="contenido" cols="68" rows="30">
<?php
if (!empty($cont['mod_archivo'])) {
	$archivo = "../componentes/com_modulos/modulos/".$cont['mod_archivo'];
	if($fp = fopen($archivo, "r")){ @include $archivo; } /*incluimos el archivo*/
	else { echo "<h3>Error</h3>\n<p>No se puede leer el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
}
else {
	echo $cont[$nuevosvalores[0]];
}
?>
</textarea>