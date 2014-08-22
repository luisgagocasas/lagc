<?php require ("../../administrador/configuracion.lagc.php");
if (empty($_GET['lugar'])){ die();}
$rptlugar = mysql_query("select * from cp_locales where cp_lid=".$_GET['lugar']." and cp_lactivado='1'") or die("No existe el local");
$lugar = mysql_fetch_array($rptlugar);
if (empty($lugar['cp_lnombre'])){ die();}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Local: <?=$lugar['cp_lnombre']; ?></title>
</head>
<body>
<!--
Creado por: Luis Gago Casas - webmaster@portuhermana.com - luisgago@lagc-peru.com
http://www.lagc-peru.com/
-->
<table width="100%" border="0">
  <tr bgcolor="#E7E7E7">
    <td width="8%">Nombre:</td>
    <td width="92%"><?php echo $lugar['cp_lnombre']; ?></td>
  </tr>
  <tr bgcolor="#C4C4C4">
    <td>Dirección:</td>
    <td><?php echo $lugar['cp_ldireccion']; ?></td>
  </tr>
  <tr bgcolor="#E7E7E7">
    <td>Telefonos:</td>
    <td>
	<?php
    $telefonos = explode('|', $lugar['cp_ltelefonos']);
	if (!empty($telefonos[0])) { echo $telefonos[0]."<br>"; }
	if (!empty($telefonos[1])) { echo $telefonos[1]."<br>"; }
	if (!empty($telefonos[2])) { echo $telefonos[2]."<br>"; }
	?></td>
  </tr>
</table>
</body>
</html>