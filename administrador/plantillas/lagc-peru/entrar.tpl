<?php
$configurapla = "../plantillas/".$config->lagctemplsite."/config.xml";
if (file_exists($configurapla)) {
    $plantillas = simplexml_load_file($configurapla);
    if($plantillas){
        foreach ($plantillas as $plantilla) { $archivo = "../plantillas/".$config->lagctemplsite."/".$plantilla->imagen; }
    } else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctemplsite."/config.xml\n"; die(); }
} else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/config.xml\n"; die(); }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Área de Administraci&oacute;n - <?php echo $config->lagcnombre; ?></title>
<meta http-equiv="content-language" content="es">
<link rel="shortcut icon" href="utilidades/favicon.ico">
<meta name="language" content="es">
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<meta name="keywords" content="<?=$config->lagckeywords; ?>">
<meta name="description" content="<?=$config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú">
<meta name="author" content="Luis Gago - webmater@portuhermana.com">
<meta name="copyright" content="© Luis Gago Casas">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate" />
<link href="plantillas/<?=$config->lagctempladmin; ?>/css/screen.css" rel="stylesheet" type="text/css" media="screen" title="default" />
<script src="plantillas/<?=$config->lagctempladmin; ?>/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctempladmin; ?>/js/custom_jquery.js" type="text/javascript"></script>
<!--
Sistema Creado por: © Luis Gago Casas
E-mail: webmaster@portuhermana.com, luisgago@lagc=peru.com
Url: http://www.lagc-peru.com/
Diciembre 2010 <-> Julio 2011 |- LG 
-->
</head>
<body id="login-bg" onLoad="javascript:document.getElementById('usuario').focus();">
<div id="login-holder">
  <div id="logo-login"><a href="http://www.lagc-peru.com/" title="Gestor de Contenidos Lagc Perú" target="_blank"><img src="plantillas/<?=$config->lagctempladmin; ?>/imagenes/shared/logo.png" width="156" height="40" alt="Lagc Perú" /></a></div>
  <div style="float: right; margin:135px 0px 0px 0px; border:0px; width:160px; height:40px;"><a href="../" title="Administrador de <?=$config->lagcnombre; ?>" target="_blank"><img src="<?=$archivo; ?>" width="118" height="50" alt="Lagc Perú" /></a></div>
  <div class="clear"></div>
  <div id="loginbox">
    <div id="login-inner">
      <form class="form" action="" method="post">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center"><?php echo $mensaje; ?><br>
            <h4>Administrador de: <?=$config->lagcnombre; ?></h4>
            </td>
          </tr>
          <tr>
            <th><label for="usuario">Usuario</label></th>
            <td><input type="text" name="usuario_lagc" id="usuario" tabindex="1" class="login-inp" /></td>
          </tr>
          <tr>
            <th><label for="contrasenia">Contrase&ntilde;a</label></th>
            <td><input type="password" name="password_lagc" id="contrasenia" tabindex="2" class="login-inp" /></td>
          </tr>
          <tr>
            <th></th>
            <td valign="top"><input type="checkbox" tabindex="4" class="checkbox-size" id="login-check" />
              <label for="login-check">&iquest;Recordarme?</label></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" tabindex="3" class="submit-login" /></td>
          </tr>
        </table>
      </form>
</div>
    <div class="clear"></div>
    <a href="" class="forgot-pwd">Ayuda</a> </div>
  <div id="forgotbox">
    <!--<div id="forgotbox-text">Si usted tiene un problema en conectarse.</div>-->
    <div id="forgot-inner"> Informaci&oacute;n del Sistema y Ayuda en:<br>
      <br>
      <ul>
        <li>http://www.lagc-peru.com/ &oacute; info@lagc-peru.com</li>
      </ul>
    </div>
    <br>
    <div id="forgot-inner"> Lo que debe de saber de <b>Lagc Per&uacute;</b><br>
    <br>
    <ul>
    	<li><strong>Lagc Per&uacute;</strong> Esta Creado por <b>Luis Gago Casas</b>.</li>
        <li><strong>Lagc Per&uacute;</strong> Es un Gestor de contenidos (CMS) <strong>gratuito</strong>.</li>
        <li>Versi&oacute;n del Sistema [<strong><?=base64_decode($config->lagcversion); ?></strong>]</li>
    </ul>
    </div>
    <div class="clear"></div>
    <a href="" class="back-login">Volver al inicio de sesi&oacute;n</a>
    </div>
</div>
</body>
</html>