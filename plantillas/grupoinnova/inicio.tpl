<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es">
<link rel="shortcut icon" href="favicon.ico">
<meta name="language" content="es">
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="google-site-verification" content="<?php echo $config->lagcanalytics; ?>">
<meta name="copyright" content="© 2011 Grupo Innova Perú">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate" />
<script src="swfobject.js" type="text/javascript"></script>
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20450673-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body>
<table width="1000" border="0" align="center">
  <tr>
    <td colspan="2"><div class="cabecera1"></div>
      <div class="logo"></div>
      <div class="publicidad1"><marquee direction="left"><?php echo $config->lagclema; ?></marquee></div>
      <div class="fondobuscador">
      <form action="checkdomain2.php" method="post">
      <input name="domain" type="text" size="23" /><input type="submit" value="Buscar Dominio" />
      </form>
      </div>
      <div id="menuh">
        <ul>
          <li><a href=".">Inicio</a></li>
          <li><a href="?lagc=com_avisos">Avisos</a></li>
          <li><a href="?lagc=com_noticias">Noticias</a></li>
          <li><a href="?lagc=com_galeria">Galeria</a></li>
          <li><a href="?lagc=com_usuarios">Usuarios</a></li>
          <?php echo Componente::MenusContenido('cabecera', 'li', '4', 'primero', $_GET['id'], $_GET['ver']); ?>
          <?php echo Componente::MenusContactenos('cabecera', 'li', '1', 'primero', $_GET['id'], $_GET['ver']); ?>
        </ul>
      </div>
      <div class="cabecera2"></div>
      <div class="cabecera3"></div>
      <div class="barraverde"></div></td>
  </tr>
  <tr>
    <td width="730" class="contenido" valign="top"><br /><br />
    <?php echo Componente::Mostrar(); ?>
    </td>
    <td width="260" valign="top"><br /><br />
     <div class="modulo1"></div>
     <div class="modulo3">
    <?php if(!empty($_SESSION['lagc_usuario_sitio'])) { ?>
    Bienvenid@: <a href="?lagc=com_usuarios&usuario=<?php echo $_SESSION["lagc_ids_sitio"]; ?>&user=<?php echo $_SESSION["lagc_usuario_sitio"]; ?>"><?php echo $_SESSION["lagc_usuario_sitio"]; ?></a><br /><br />
    <a href="?lagc=com_usuarios&usuario=desconectar">Desconectar</a>
    <?php }
    else { ?>
    <form action="?lagc=com_usuarios&usuario=validar_usuario" method="post">
    <input name="url" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    Usuario ó E-mail:
    <input name="usuario" type="text" size="27" />
    Contrase&ntilde;a:
    <input name="password" type="password" size="27" /><br />
    <center><input type="submit" value="Entrar" class="frmcontac" /></center>
    </form>
    - <a href="?lagc=com_usuarios&usuario=registro" style="color:#FFF; text-decoration:none;">Registrate</a><br />
    - <a href="?lagc=com_usuarios&usuario=perdiocontra" style="color:#FFF; text-decoration:none;">¿Olvido su Contraseña?</a>
    <?php
    } ?>
     </div>
     <div class="modulo2"></div>
     <div class="modulo1"></div>
     <div class="modulo3" style="text-align:justify;">
     Contenido
     </div>
     <div class="modulo2"></div>
     <div class="modulo1"></div>
     <div class="modulo3" style="text-align:justify;">
     Contenido
     </div>
     <div class="modulo2"></div>
     </td>
  </tr>
  <tr>
    <td colspan="2">
    <div class="footer2"></div>
    <div class="footer3">
    <div class="footer4">
    <div style="text-align:left;">Todos los Derechos Reservados - Lagc Perú <div style="float:right;">© Copyright 2011</div><br />
    Email : info@lagc-peru.com - ventas@lagc-peru.com<br />
    Telf :  <div style="float:right;"><a href="?lagc=com_contactenos&id=1&ver=contactenos" style="color:#FFF; text-decoration:none;">Contactenos</a></div><br />
    Dirrección :</div>
    </div>
    </div>
    <div class="footer1"></div>
    </td>
  </tr>
</table>
</body>
</html>