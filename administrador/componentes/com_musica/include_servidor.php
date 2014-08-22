<?php
require ("../../configuracion.lagc.php");
$rptserv = mysql_query("select * from music_servidor where serv_id=".$_GET['lgserver'].""); $aqpserver = mysql_fetch_array($rptserv); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Servidor: <?=$aqpserver['serv_nombre']; ?></title>
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
<style>
body{
  width: 99%;
  margin: 0 auto;
  background: #6BA628;
  color: #6BA628;
  font-family: 'Droid Sans', sans-serif;
  background: url("imagenes/borde-patron.png");
}
.cabecera{
	background: rgba(0, 0, 0, 0.50);
	display: inline;
}
/**/
.carpetasptl{
	padding:0px 20px;
	margin:0px 0px;
	height: 20px;
	background:url(imagenes/folder.gif) no-repeat;
}
.carpetasptl a{
	color:#92B22C;
}
.carpetasptl a:hover{
	color:#999;
}
.archivosptl{
	padding:0px 20px;
	margin:0px 0px;
	background:url(imagenes/musica.png) no-repeat;
}
.archivosptl a{
	font-family: 'Droid Sans', sans-serif;
	display: inline-block;
	zoom: 1;
	font-size: 18px;
	font-weight: normal;
	margin-top: 0px;
	padding: 5px;
	vertical-align: top;
	text-decoration: none;
	color: #FFF;
}
.archivosptl a:hover{
	color:#000;
}
.bloquedescr{
	height: 65px;
	width: 97%;
	-moz-border-radius: 25px 10px / 10px 25px;
	border-radius: 25px 10px / 10px 25px;
	border: 10px;
	background: #69C;
	margin: 5px auto;
	padding: 5px 0px 0px 10px;
	color: white;
}
.bloquedescr h3{
	font-size: 20px;
	padding: 0px 0px;
	margin: 0px 0px;
}

</style>
<script type="application/x-javascript">
function centrar() {
    iz=(screen.width-document.body.clientWidth)/2;
    de=(screen.height-document.body.clientHeight)/2;
    moveTo(iz,de);
}
function Ventana($val){ window.opener.frmcont.rutacancion.value=$val; setTimeout(window.close, 0); }
</script>
</head>
<body onLoad="centrar()">
	<div class="bloquedescr">
		<h3>Servidor: <?=$aqpserver['serv_nombre']; ?></h3>
		<?=$aqpserver['serv_descripcion']; ?>
	</div>
<?
set_time_limit(0);
$FtpConn = ftp_connect($aqpserver['serv_url']);
if(!ftp_login($FtpConn,$aqpserver['serv_acceso_user'],$aqpserver['serv_serv_acceso_pass'])){
	echo "No se ha podido realizar la conexión";
	exit;
}
$directorio = $aqpserver['serv_serv_acceso_carpeta'].ftp_pwd($FtpConn);
$lista = array(); $lista = ftp_nlist($FtpConn,$directorio);

$count = count($lista);
for ($i = 0; $i < $count; $i++) {
	if ($lista[$i]=="/"){
		echo "<div class=\"archivosptl\">\n";
		echo "hola";
		echo "</div>\n";
	}
	else if($lista[$i]=="."){
		echo "<div class=\"archivosptl\">\n";
		echo "<a href=\"#\">.</a><br>\n";
		echo "</div>\n";
	}
	else if($lista[$i]==".."){
		echo "<div class=\"archivosptl\">\n";
		echo "<a href=\"#\">..</a><br>\n";
		echo "</div>\n";
	}
	else if($lista[$i]!="/index.html"){
		echo "<div class=\"archivosptl\">\n";
		echo "<a href=\"#\" onClick=\"Ventana('".$lista[$i]."');\">".$lista[$i]."</a><br>\n";
		echo "</div>\n";
	}
}

?>
</body>
</html>