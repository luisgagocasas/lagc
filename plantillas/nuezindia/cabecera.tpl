<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<link rel="shortcut icon" href="favicon.ico" />
<meta name="language" content="es" />
<meta name="rating" content="general" />
<meta name="audience" content="all" />
<meta name="robots" content="index, follow" />
<?=Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?=$config->lagcdescription; ?>" />
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>" />
<meta name="copyright" content="© 2011 Lagc Perú" />
<meta name="revisit-after" content="7 days" />
<meta name="google" content="notranslate" />
<script src="plantillas/nuezindia/flexcroll.js" type="text/javascript"></script>
<script src="swfobject.js" type="text/javascript"></script>
<link href="plantillas/nuezindia/estilos.css" rel="stylesheet" type="text/css">
<link href="componentes/com_galeria/shadowbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="componentes/com_galeria/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="componentes/com_galeria/shadowbox.js"></script>
<script type="text/javascript" src="flota.js"></script>
<script type="text/javascript"> Shadowbox.init({ language: "es", players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'] }); </script>
<!--
Creado por: Luis Gago - luisgago@lagc-peru.com
http://www.lagc-peru.com/
-->
<script language="Javascript"> 
<!-- Begin 
document.oncontextmenu = function(){return false} 
// End --> 
</script>
<script language="JavaScript">
function click() {
if (event.button==2) {
alert('Ratón Deshabilitado');
}
}
</script>
<script type="text/javascript">
document.onselectstart=new Function ("return false");
if (window.sidebar) {
   document.onclick=new Function("return true");
}
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23693945-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<style type="text/css">
#topbar {
    position: absolute;
    padding: 10px 10px 10px 10px;
    width: 255px;
	height:456px;
	background:url(aviso-importante.png) no-repeat center;
    font-family: Arial, Helvetica, sans-serif;
    visibility: hidden;
    z-index: 999;
}
.close{
	font-family:fuenteinnova;
	color:#88C022;
	font-size:14px;
	margin:-20px 73%;
}
.close a{
	text-decoration:none;
}
</style>
</head>
<body bgcolor="#ffffff">
<div id="topbar">
<div class="close"><a href="" onClick="closebar(); return false">[CERRAR]</a></div>
</div>
<map name="Map" id="Map">
  <area shape="rect" coords="143,25,209,90" href="http://www.facebook.com/pages/Nuez-de-la-India/147035985356084" target="_blank" />
  <area shape="circle" coords="92,33,27" href="http://twitter.com/nuezindiaperu" target="_blank" />
  <area shape="circle" coords="24,23,22" href="http://nuezdelaindia-anaisa.blogspot.com/" target="_blank" />
  <area shape="circle" coords="47,69,23" href="http://youtube.com/user/nuezanaisa" target="_blank" />
</map>
<table border="0" cellpadding="0" cellspacing="0" width="980" align="center">
  <tr>
    <td rowspan="12">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">
    <!--<div style="position:absolute; margin: 30px 355px; border:0px #000 solid; width:183px; height:55px;">¡Feliz día de la madre!</div>-->
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6.0.65.0" width="300" height="150">
        <param name=movie value="plantillas/nuezindia/logo.swf">
        <param name=quality value=high>
        <param name="wmode" value="transparent">
        <embed src="plantillas/nuezindia/logo.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="300" height="150"> </embed>
      </object>
    </td>
    <td><img src="plantillas/nuezindia/imagenes/pagina1_r1_c6.jpg" width="284" height="194" border="0" /></td>
    <td colspan="2" align="right" class="telefonos">Telf: (054) 264821<br />
      (Claro) 95 <strong>9313183</strong><br />
      (Movistar) 95 <strong>9616654</strong><br />
      RPC (054) 95 <strong>9224671</strong><br />
      RPM: * 818175<br />
      <br />
      Cl. 13 de Abril N 109, Urb.<br />
      Selva Alegre - Arequipa</td>
    <td rowspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td width="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" align="left"><div id="menuh">
        <ul>
          <li><a href=".">Inicio</a></li>
          <?php echo Componente::MenusContenido('cabecera', 'li', '4', 'primero', $_GET['id'], $_GET['ver']); ?> <?php echo Componente::MenusContactenos('cabecera', 'li', '1', 'primero', $_GET['id'], $_GET['ver']); ?>
        </ul>
      </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="4" valign="top"><a href="?lagc=com_contactenos&id=2&ver=cuenta-para-realizar-su-compra"><img src="plantillas/nuezindia/imagenes/pedidos.gif" width="172" height="113" border="0" /></a><br />
      <a href="?lagc=com_contenidos&id=19&ver=anaisa"><img src="plantillas/nuezindia/imagenes/anaisa.gif" width="172" height="115" border="0" /></a><br />
      <a href="?lagc=com_contenidos&id=25&ver=resveratrol"><img src="plantillas/nuezindia/imagenes/resveratrol.gif" width="172" height="115" border="0" /></a><br />
      <a href="?lagc=com_contenidos&id=21&ver=h2o"><img src="plantillas/nuezindia/imagenes/o2.gif" width="164" height="110" border="0" /></a><br />
      <a href="?lagc=com_contenidos&id=22&ver=stevia"><img src="plantillas/nuezindia/imagenes/stevia.gif" width="172" height="115" border="0" /></a><br />
      <a href="?lagc=com_contenidos&id=23&ver=la-rosa-mosqueta"><img src="plantillas/nuezindia/imagenes/rosas.gif" width="172" height="117" border="0" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr height="300">
    <td width="38" rowspan="7">&nbsp;</td>
    <td width="40" height="300">&nbsp;</td>
    <td colspan="3" valign="top" height="300" align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6.0.65.0" width="700" height="298">
        <param name="movie" value="banner_video.swf">
        <param name="wmode" value="transparent">
        <embed src="banner_video.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="700" height="298"> </embed>
      </object></td>
    <td height="300"></td>
  </tr>
  <tr>
    <td width="40">&nbsp;</td>
    <td colspan="3" valign="top" style="height:35px; width:700px; padding:5px 0px;"><div id="menuh">
        <ul>
          <li style="padding:0px 15px; margin:0px 10px;"><a href="?lagc=com_contenidos&id=5&ver=propiedades">Propiedades</a></li>
          <li style="padding:0px 15px; margin:0px 10px;"><a href="?lagc=com_contenidos&id=8&ver=consejos">Consejos</a></li>
          <li style="padding:0px 15px; margin:0px 10px;"><a style="padding:10px 15px;" href="?lagc=com_contenidos&id=7&ver=contraindicaciones">Contraindicaciones</a></li>
          <li style="padding:0px 15px; margin:0px 10px;"><a href="?lagc=com_contenidos&id=6&ver=info-cientifica">Info Cientifica</a></li>
          <?php /*echo Componente::MenusContenido('banner', 'li', '12', 'primero', $_GET['id'], $_GET['ver']);*/ ?>
        </ul>
      </div></td>
    <td></td>
  </tr>
  <tr>
    <td width="40" rowspan="3" style="background:url(plantillas/nuezindia/imagenes/pagina1_r12_c9.png) repeat-y right;"></td>
    <td colspan="3" rowspan="3" valign="top" bgcolor="#FFFFFF"><div style="padding:0px 6px; margin:15px 0px; width:687px; height:386px; overflow:scroll; overflow-x: hidden; overflow-y: auto; border:0px;" id="contlagc" class="flexcroll"> <?php echo Componente::Mostrar(); ?> </div></td>
    <td rowspan="2" style="background:url(plantillas/nuezindia/imagenes/pagina1_r12_c8.png) repeat-y; width:23px;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="3" valign="top"><a href="?lagc=com_contenidos&id=20&ver=pierlamina"><img src="plantillas/nuezindia/imagenes/pierlamina.gif" width="172" height="117" border="0" /></a><br />
    <a href="?lagc=com_contenidos&id=24&ver=fortalecedor-para-las-pestaas"><img src="plantillas/nuezindia/imagenes/pestanias.gif" width="172" height="113" border="0" /></a><br />
      <a href="http://nuezdelaindia-anaisa.blogspot.com/" target="_blank"><img src="plantillas/nuezindia/imagenes/blog.gif" width="172" height="113" border="0" /></a>
      <!--<div style="background:url(plantillas/nuezindia/imagenes/login-2.gif) no-repeat center; width:168px; height: 35px;">
        <div style="padding:10px 10px; text-align:center;">-->
      <!--<a href="?lagc=com_contactenos&id=2&ver=cuenta-para-realizar-su-compra"><img src="plantillas/nuezindia/imagenes/pedidos.gif" width="172" height="113" border="0" /></a>-->
      <!-- </div>
      </div>--></td>
    <td style="background:url(plantillas/nuezindia/imagenes/pagina1_r12_c8.png) repeat-y; width:23px;"></td>
  </tr>
  <tr>
    <td width="40">&nbsp;</td>
    <td valign="top"><img src="plantillas/nuezindia/imagenes/pagina1_r17_c5.png" width="201" height="36" border="0" /></td>
    <td valign="top"><img src="plantillas/nuezindia/imagenes/pagina1_r17_c6.png" width="284" height="36" border="0" /></td>
    <td valign="top"><img src="plantillas/nuezindia/imagenes/pagina1_r17_c7.png" width="215" height="36" border="0" /></td>
    <td><img src="plantillas/nuezindia/imagenes/pagina1_r17_c8.png" width="23" height="36" border="0" /></td>
  </tr>
  <tr>
    <td width="40">&nbsp;</td>
    <td colspan="2" rowspan="2" align="center" valign="top"><?php
$server = 'localhost';
$user = 'nuezindi_lagc';
$pass = 'aqpsunway';
$db2 = 'nuezindi_lagcperu';
$db = mysql_connect("$server", "$user", "$pass") or die("No hay conexión.");
if(!$db)
    die("no db");
if(!mysql_select_db("$db2",$db))
     die("No se seleccionó la base de datos.");
$server_time=date("U"); 
$client_ip=$REMOTE_ADDR; 
$arr = getdate();
$dia_actual = $arr["mday"];
$hora_actual = $arr["hours"];
$minuto_actual = $arr["minutes"];

$visita = mysql_query("SELECT * FROM visitas");
while($row = mysql_fetch_array($visita)) {
extract($row);
$dia = $row["dia"];
$totales = $row["totales"];
$hoy = $row["hoy"];
if ($dia_actual != $dia) {
$hoy = 1;
}
else{
$hoy++; 
} 
$totales++; 
} 
$actualiza="UPDATE visitas SET dia='$dia_actual', totales='$totales', hoy='$hoy'"; 
mysql_query($actualiza);
$p4 = mysql_query("SELECT * FROM current_users WHERE ip='$client_ip'"); 
$pa4 = mysql_fetch_array($p4); 
if($pa4) {
    $update="UPDATE current_users set time='$server_time' where ip='$pa4[ip]'";
    mysql_query($update) or die("No es posible actualizar: " . mysql_error());
} else {
$query=("INSERT INTO `current_users` (`ip`, `time`) VALUES ('$client_ip', '$server_time')");
$result = mysql_query($query) or die("No se puede insertar: " . mysql_error());
}
$time2=$server_time-1800;
$remove="DELETE from current_users WHERE time<'$time2'";
mysql_query($remove) or die("Unable to delete: " . mysql_error());

$result6 = mysql_query("SELECT ip FROM current_users");
$current_visitors = mysql_num_rows($result6);

for($i=0;$i<strlen($totales);$i++) { 
    $imagen = substr($totales,$i,1); 
    $visit_totales .= "<td><img src=\"plantillas/nuezindia/imagenes/$imagen.gif\"></td>"; 
}
for($i=0;$i<strlen($hoy);$i++) { 
    $imagen = substr($hoy,$i,1); 
    $visit_hoy .= "<td><img src=\"plantillas/nuezindia/imagenes/$imagen.gif\"></td>"; 
}
mysql_close ($db);
/*nuevo codigo*/
$log_file="online.txt";
$min_online="1";
if ($HTTP_X_FORWARDED_FOR == "") {
$ip = getenv(REMOTE_ADDR);
}
else {
$ip = getenv(HTTP_X_FORWARDED_FOR);
}
$day =date("d");
$month =date("m");
$year =date("Y");
$date="$day-$month-$year";
$ora = date("H");
$minuti = date("i");
$secondi = date("s");
$time="$ora:$minuti:$secondi";
$users_read = fopen("$log_file", "r");
$users = fread($users_read, filesize("$log_file"));
fclose($users_read);
$to_write="$ip|$time|$date";
if($users==0){
$user_write = fopen("$log_file", "w");
fputs($user_write , $to_write );
fclose($user_write );
}
else{
$users=explode("\n",$users);
$user_da_tenere=array();
while (list ($key, $val) = each ($users)) {
$user_sing=explode("|",$val);
if($date==$user_sing[2]){
$h=explode(":",$user_sing[1]);
if($ip!=$user_sing[0]){
if(($h[0]==$ora)and(($minuti-$h[1])<=$min_online)){
$user_da_tenere[]=$val;}
if(($h[0]==($ora-1))and((($minuti+2)-$h[1])<=$min_online)){
$user_da_tenere[]=$val;
}
}
}
}
$user_da_tenere[]=$to_write;
$user_write = fopen("$log_file", "w");
fputs($user_write , "" );
fclose($user_write );
while (list ($k, $v) = each ($user_da_tenere)) {
$new_file_log = fopen ("$log_file", "a");
fwrite($new_file_log,"$v\n");
fclose($new_file_log);
}
}
$users_online_read = fopen("$log_file", "r");
$users_online = fread($users_online_read, filesize("$log_file"));
fclose($users_online_read);
$users_online=explode("\n",$users_online);
$n_u_online=count($users_online)-1;

for($i=0;$i<strlen($n_u_online);$i++) { 
    $imagen = substr($n_u_online,$i,1); 
    $visit_linea .= "<td><img src=\"plantillas/nuezindia/imagenes/$imagen.gif\"></td>";
}
?>
      <div id="contadores" style="height:100px;">
        <p>TOTAL DE VISITAS</p>
        <table border="0" cellpadding="0" cellspacing="0">
          <tr><?php echo $visit_totales; ?></tr>
        </table>
        <p>VISITAS DE HOY</p>
        <table border="0" cellpadding="0" cellspacing="0">
          <tr><?php echo $visit_hoy; ?></tr>
        </table>
        <p>EN LINEA</p>
        <table border="0" cellpadding="0" cellspacing="0">
          <tr><?php echo $visit_linea; ?></tr>
        </table>
      </div>
      <br /></td>
    <td rowspan="2"><img src="plantillas/nuezindia/imagenes/redes.gif" border="0" usemap="#Map" /></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" bgcolor="#4B4B4D"><table width="917" height="97" align="center" style="color:#FFF; font-weight:bold; font-stretch:extra-condensed;">
        <tr>
          <td width="228"><ul class="enlacef">
              <li><a href="?lagc=com_contenidos&id=10&ver=adelgazamiento-y-dietas">Adelgazamiento y Dietas</a></li>
              <li><a href="?lagc=com_contenidos&id=11&ver=complementos-nutricionales">Complementos Nutricionales</a></li>
              <li><a href="?lagc=com_contenidos&id=5&ver=propiedades">Propiedades de la Nuez</a></li>
              <li><a href="?lagc=com_contenidos&id=14&ver=indicaciones-importantes">Recomendaciones</a></li>
            </ul></td>
          <td width="239"><ul class="enlacef">
              <li><a href="?lagc=com_contenidos&id=19&ver=anaisa">La verdadera Nuez de la India</a></li>
              <li><a href="?lagc=com_contenidos&id=2&ver=tratamiento">Tratamiento de la Nuez</a></li>
              <li><a href="?lagc=com_contenidos&id=3&ver=distribuidores">Distribuidores en el peru</a></li>
            </ul></td>
          <td width="210"><ul class="enlacef">
              <li><a href="?lagc=com_contenidos&id=7&ver=contraindicaciones">Indicaciones Importantes</a></li>
              <li><a href="?lagc=com_contactenos&id=1&ver=contacto">Contactenos</a></li>
              <li><a href=".">Inicio</a></li>
              <li><a href="?lagc=com_contenidos&id=15&ver=ejercicios">Ejercicios</a></li>
            </ul></td>
          <td width="203"><ul class="enlacef">
              <li><a href="?lagc=com_contenidos&id=6&ver=info-cientifica">Informacion Cientifica</a></li>
              <li><a href="http://nuezdelaindia-anaisa.blogspot.com/" target="_blank">Nuestro Blog</a></li>
              <li><a href="http://www.facebook.com/pages/Nuez-de-la-India/147035985356084" target="_blank">Facebook</a></li>
              <li><a href="http://twitter.com/nuezindiaperu" target="_blank">Twitter</a></li>
            </ul></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7"><div style="text-align:center; background:#000; color:#FFF; width:100%; height:65px">ANAISA - www.nuezdelaindiaperu.com - Telf: (054) 264821 Cel. (Claro) 959313183 - (Movistar) 9599616654<br/>
        RPC 054-959224671 RPM *818175 Cl. 13 de Abril N109, Urb. Selva Alegre - Arequipa<br/>
        Mail: anaisabelpt@hotmail.com - nuezdelaindiaperu@hotmail.com<br />
        &copy; Derechos reservados desde el 2008<br />
      </div></td>
  </tr>
  <tr>
    <td colspan="9"><div style="text-align:center; font-style:italic; font-family:fuenteinnova; font-size:16px;"> Que Dios Bendiga a todas las personas que visitaron esta pagina y siempre no te olvides que cuando tiramos el pan sobre
        las aguas, nunca sabras <br />cuando ser&aacute; devuelto a ti........... Dios es tan grande que puede cubrir todo el mundo con su amor, y
        a la vez tan peque&ntilde;o para entrar en tu coraz&oacute;n <br />
        Cuando Dios te lleva al borde del acantilado, confia en el plenamente y dejate llevar. Solo una de 2 cosas va a suceder, o<br />
        el te sostiene cuando t&uacute; te caes, o &eacute;l te va a ense&ntilde;ar a volar!!!!!! </div></td>
  </tr>
</table>
</body>
</html>