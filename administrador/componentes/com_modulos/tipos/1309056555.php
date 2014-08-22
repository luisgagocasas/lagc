<textarea name="codigocont_lagc" id="cont2_lagc" cols="70" rows="40">
<?php
if (!empty($cont['mod_archivo'])) {
	$archivo = "../componentes/com_modulos/modulos/".$cont['mod_archivo'];
	if($fp = fopen($archivo, "r")){ $data = fread($fp, filesize($archivo)); fclose($fp); }
	else { echo "<h3>Error</h3>\n<p>No se puede leer el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
	$archivos = str_replace('<', "<", $data); echo $archivos;
}
else {
	echo $cont['mod_tipvalor1'];
}
?></textarea>

* Al agregar codigo php no ingrese las etiquetas <?php ?>