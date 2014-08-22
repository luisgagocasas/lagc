<?php include "plantillas/lagc-peru/funciones.lagc-peru.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
<title><?php Componente::CompoTitulo($_GET['lagc']); ?></title>
<link rel="shortcut icon" href="utilidades/favicon.ico">
<meta name="generator" content="Lagc Perú">
<meta name="author" content="Luis Gago - webmater@portuhermana.com">
<meta name="copyright" content="© Luis Gago Casas">
<link rel="stylesheet" href="plantillas/lagc-peru/css/screen.css" type="text/css" media="screen" title="default" />
<script src="plantillas/lagc-peru/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="plantillas/lagc-peru/js/custom_jquery.js" type="text/javascript"></script>
<script src="plantillas/lagc-peru/js/jquery.filestyle.js" type="text/javascript"></script>
<script src="plantillas/lagc-peru/js/jquery.tooltip.js" type="text/javascript"></script>
<!--ventana flotante-->
<script type="text/javascript" src="plantillas/lagc-peru/jQuery/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="plantillas/lagc-peru/jQuery/sexyalertbox.v1.2.jquery.js"></script>
<script type="text/javascript" src="plantillas/lagc-peru/jQuery/jquery.selectbox-0.5_style_2.js"></script>
<link rel="stylesheet" href="plantillas/lagc-peru/jQuery/sexyalertbox.css" type="text/css" media="all" />
<!--ventana flotante-->
<script type="text/javascript" charset="iso-8859-1">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "plantillas/lagc-peru/imagenes/forms/choose-file.gif",
          imageheight : 25,
          imagewidth : 78,
          width : 300
      });
  });
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="plantillas/lagc-peru/js/ie6_script_other.js"></script>
<![endif]-->
<!--
Lagc Perú -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com - luisgago@lagc-peru.com
http://www.lagc-peru.com/
-->
</head>
<body>
<div id="page-top-outer">
  <div id="page-top">
    <div id="logo"> <a href="index.php" title="Bienvenido a <?php echo $config->lagcnombre; ?>"><img src="plantillas/lagc-peru/imagenes/shared/logo.png" width="156" height="40" alt="Lagc Perú" /></a></div>
    <div id="top-search">
     <div class="top-search"><a href="../" target="_blank"><h3>(Previsualizar) <img src="plantillas/lagc-peru/imagenes/enlace.gif" border="0" /></h3></a></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="clear">&nbsp;</div>
<div class="nav-outer-repeat">
  <div class="nav-outer">
    <div id="nav-right">
      <div class="nav-divider">&nbsp;</div>
      <div class="showhide-account"><img src="plantillas/lagc-peru/imagenes/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
      <div class="nav-divider">&nbsp;</div>
      <a href="index.php?logout=true" id="logout"><img src="plantillas/lagc-peru/imagenes/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
      <div class="clear">&nbsp;</div>
      <div class="account-content">
        <div class="account-drop-inner"> <a href="?lagc=com_configuracion" id="acc-settings">Configuración</a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a href="?lagc=com_usuarios&usuarios=<?=$_COOKIE["user"]; ?>&editar=<?=time(); ?>" id="acc-details">Detalles de usuario </a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a href="" id="acc-inbox">Mensajes</a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a href="" id="acc-stats">Rendimiento del sitio</a> </div>
      </div>
    </div>
    <div class="nav">
      <div class="table">
      <div class="nav-divider">&nbsp;</div>
        <ul <?php echo Menus::Inicio($_GET['lagc']); ?>>
          <li><a href="index.php"><b>Inicio</b></a>
            <div class="select_sub show">
              <ul class="sub">
                <li<?php echo Menus::Enlaces("com_usuarios", $_GET['lagc']); ?>><a href="?lagc=com_usuarios">Usuarios</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <ul <?php echo Menus::Configuracion($_GET['lagc']); ?>>
          <li><a href="#nogo"><b>Configuración</b></a>
            <div class="select_sub show">
              <ul class="sub">
                <li<?php echo Menus::Enlaces("com_configuracion", $_GET['lagc']); ?>><a href="?lagc=com_configuracion">Sitio</a></li>
                <li><a href="?lagc=com_configuracion&lg=<?=time(); ?>&phpinfo=<?=time(); ?>">Php Info</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul <?php echo Menus::Componentes($_GET['lagc']); ?>>
          <li><a href="#nogo"><b>Componentes</b></a>
            <div class="select_sub show">
              <ul class="sub">
              <?php Componente::CompoMenu(); ?>
              </ul>
            </div>
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul <?php echo Menus::Herramientas($_GET['lagc']); ?>>
          <li><a href="#nogo"><b>Herramientas</b></a>
            <div class="select_sub show">
              <ul class="sub">
                <li<?php echo Menus::Enlaces("com_componentes", $_GET['lagc']); ?>><a href="?lagc=com_componentes">Componentes</a></li>
                <li<?php echo Menus::Enlaces("com_modulos", $_GET['lagc']); ?>><a href="?lagc=com_modulos">Modulos</a></li>
                <li<?php echo Menus::Enlaces("com_menu", $_GET['lagc']); ?>><a href="?lagc=com_menu">Menus</a></li>
                <li<?php echo Menus::Enlaces("com_imagenes", $_GET['lagc']); ?>><a href="?lagc=com_imagenes">Imagenes</a></li>
                <li<?php echo Menus::Enlaces("com_idiomas", $_GET['lagc']); ?>><a href="?lagc=com_idiomas">Idiomas</a></li>
                <li<?php echo Menus::Enlaces("com_plantillas", $_GET['lagc']); ?>><a href="?lagc=com_plantillas">Plantillas</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select">
          <li><a href="http://www.lagc-peru.com/" target="_blank"><b>Ayuda</b></a>
            <div class="select_sub">
              <ul class="sub">
                <li><a href="#nogo">Foro de Ayuda</a></li>
                <li><a href="#nogo">Blog de Ayuda</a></li>
                <li><a href="#nogo">Contactanos</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<div id="content-outer">
  <div id="content">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
      <tr>
        <th rowspan="3" class="sized"><img src="plantillas/lagc-peru/imagenes/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="plantillas/lagc-peru/imagenes/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
      </tr>
      <tr>
        <td id="tbl-border-left"></td>
        <td>
          <div id="content-table-inner">
            <div id="table-content">
              <?php echo Componente::Mostrar(); ?>
             </div>
            <div class="clear"></div>
          </div>
          </td>
        <td id="tbl-border-right"></td>
      </tr>
      <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
      </tr>
    </table>
    <div class="clear">&nbsp;</div>
  </div>
  <div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
<div id="footer">
  <div id="footer-left">
  <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">Lagc Per&uacute;</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.lagc-peru.com/" property="cc:attributionName" rel="cc:attributionURL">Luis Gago</a> se encuentra bajo una Licencia <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Atribuci&oacute;n-NoComercial-LicenciarIgual 3.0 Unported</a>.<br />Permisos que vayan m&aacute;s all&aacute; de lo cubierto por esta licencia pueden encontrarse en <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.lagc-peru.com/" rel="cc:morePermissions">http://www.lagc-peru.com/</a>.
  <div style="float:right;">
  Bienvenid@ <strong><?php echo $_COOKIE["username"]; ?></strong><br />
  V. Lagc Per&uacute; <strong><?=base64_decode($config->lagcversion); ?></strong>
  <br />
  </div>
  </div>
  <div class="clear">&nbsp;</div>
</div>
<a id="scroll-up" onClick="scrollTo(0,0);" style="display: none;"></a>
</body>
</html>