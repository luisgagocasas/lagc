<?php
require ("../../administrador/configuracion.lagc.php");
$config = new LagcConfig(); //Conexion
$msg = $_POST['msg'];
$usuario = $_POST['usuario'];
$cancion = $_POST['cancion'];
if(!empty($msg) and !empty($usuario)){
   $cx = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass) or die("Error connect: ".mysql_error());
   mysql_select_db($config->lagcbd) or die("Error select db: ".mysql_error());
   mysql_query("INSERT INTO music_message (usuario, cancion, mensaje, fecha) VALUES ('".$usuario."', '".$cancion."', '".$msg."', '".time()."')", $cx);
}
?>