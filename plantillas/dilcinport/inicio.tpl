<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php Componente::CompoTitulo($_GET['lagc']); ?></title>
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
<link href="plantillas/dilcinport/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="1022" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="318"><a href="."><img src="plantillas/dilcinport/imagenes/logo.png" alt="Inicio" width="318" height="172" border="0" /></a></td>
    <td width="707" valign="top" background="plantillas/dilcinport/imagenes/banner_header.gif"><div style="margin:132px 10px; position:absolute; width:563px; overflow:hidden; height:18px; color:#FFF;"><?php echo $config->lagclema; ?></div>
      <div style="margin:122px 600px; float:right; position:absolute; color:#FFF;"><a href="#"><img src="plantillas/dilcinport/imagenes/face.gif" border="0" /></a></div>
      <div style="margin:121px 633px; float:right; position:absolute; color:#FFF;"><a href="#"><img src="plantillas/dilcinport/imagenes/twi.gif" border="0" /></a></div>
      <table width="400" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td width="166">&nbsp;</td>
          <td width="234">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="33">&nbsp;</td>
          <td><form name="Buscar" method="post" action="">
              <input name="buscador" type="text" size="30" />
            </form></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="1022" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="287" height="530" valign="top" background="plantillas/dilcinport/imagenes/menu_banner.png"><div id="menuv">
              <ul>
                <li><a href=".">Inicio</a></li>
                <?php echo Componente::MenusContenido('izquierda', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?> <?php echo Componente::MenusContactenos('izquierda', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?>
              </ul>
            </div></td>
          <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td background="plantillas/dilcinport/imagenes/contenido_head.png" width="733" height="37"></td>
              </tr>
              <tr>
                <td background="plantillas/dilcinport/imagenes/contenido_cuerpo.png" valign="top" style="padding:0px 20px;"><?php echo Componente::Mostrar(); ?></td>
              </tr>
              <tr>
                <td background="plantillas/dilcinport/imagenes/contenido_pie.png" width="733" height="37"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2" class="footer" width="318" height="116"><div id="menuh">
        <ul>
          <?php echo Componente::MenusContenido('pie', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?> <?php echo Componente::MenusContactenos('pie', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?>
        </ul>
      </div></td>
  </tr>
  <tr>
  <td colspan="2" align="right"><div style="color:#FFF; position:relative; font-size:13px;">&copy; <a href="http://www.grupoinnovaperu.com" target="_blank" style="color:#FFF; text-decoration:none;">Grupo Innova Per&uacute;</a></div>
  </td>
  </tr>
</table>

</body>
</html>