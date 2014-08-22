<?php
require ("../../administrador/configuracion.lagc.php");
require ("../../administrador/componentes/com_sistema/function.globales.php");
$config = new LagcConfig(); //Conexion
$limite=$_POST["limite"];
$cancion=$_POST["cancion"];
$cx = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass) or die("Error connect: ".mysql_error());
mysql_select_db($config->lagcbd) or die("Error select db: ".mysql_error());
$verreg = mysql_query("SELECT * FROM music_message where cancion='".$cancion."'", $cx);
$total = mysql_num_rows($verreg);
$query = mysql_query("SELECT * FROM music_message where cancion='".$cancion."' ORDER BY id DESC limit $limite, 5", $cx);
if($query == true){
   while ($row = mysql_fetch_array($query)){
   		echo '<div class="comment">
			   		<div class="comment-avatar">
			   		<img src="'.LGlobal::IMG_Usuario($row['usuario'], "componentes/com_usuarios/imagenes/thumb").'" width="48" height="48" border="0" />
	   			</div>
	   			<div class="comment-autor">
			   		<strong>'.LGlobal::Url_Usuario($row['usuario'], true, false, "_blank", "").'</strong> dice:<br/>
			   		<small>'.LGlobal::tiempohace($row['fecha']).'</small>
	   			</div>
	   			<div class="comment-text">
	   				'.$row['mensaje'].'
	   			</div>
            </div>';
   }
}
if($limite>0){
	$limit=$limite-5;
	echo "<div class=\"anterior\" onclick=\"loadWall(".$limit.")\">Anterior</div> | ";
}
if($limite<$total-5){
	$limit=$limite+5;
	echo "<div class=\"siguiente\" onclick=\"loadWall(".$limit.")\">Siguiente</div>";
}
?>