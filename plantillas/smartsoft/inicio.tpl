<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es-ES">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta http-equiv="Content-language" content="es" />
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="favicon.ico">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="© 2011 Lagc Perú">
<meta name="google-site-verification" content="<?php echo $config->lagcanalytics; ?>">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate">
<base href="<?php echo $config->lagcurl; ?>" target="_parent">
<link rel="alternate" type="application/atom+xml" href="<?php echo $config->lagcurl; ?>componentes/com_blog/rss.php" title="<?php echo $config->lagcnombre; ?> feed" />
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plantillas/<?php echo $config->lagctemplsite; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="plantillas/<?php echo $config->lagctemplsite; ?>/css/slimbox2.css" type="text/css" media="screen" />
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.min.js"></script>
<script type="text/JavaScript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/slimbox2.js"></script>
<script src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="http://connect.facebook.net/es_ES/all.js#appId=112894222141615&amp;xfbml=1"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es'}
</script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:6000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, 
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.5, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<!--
============================================
Lagc Perú -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com
Soporte: info@lagc-peru.com
============================================
Creado para la empresa Smart Soft
-->
</head>
<body>
<div style="background:url(plantillas/<?php echo $config->lagctemplsite; ?>/images/templatemo_bg.jpg) repeat-x; height:130px; margin:0 auto 0 auto; width:902px;">
<div id="templatemo_topheader">
  <div class="logo"></div>
  <div class="help"><a href="?lagc=com_contactenos&id=1&ver=ayuda-en-linea"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/templatemo_help.jpg" alt="Ayuda"  /></a></div>
  <div class="telefonos">Telef. +51 (054) 123456<br />
    RPM: 123456789<br />
    RPC: 123456789</div>
  <?php $LagcPeru->Modulos("menuprincipal"); ?>
</div>
</div>
<div id="slider_wrapper">
	<div id="slider">
    <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/02.jpg" alt="01" title="Descripcion de foto 1" /></a>
    <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/03.jpg" alt="02" title="Descripcion de foto 2" /></a>
    <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/04.jpg" alt="03" title="Descripcion de foto 3" /></a>
    <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/05.jpg" alt="04" title="Descripcion de foto 4" /></a>
    </div>
  </div>
<div style="margin:0 auto 0 auto; width:902px; height:10px; background:url(plantillas/<?php echo $config->lagctemplsite; ?>/images/slider_top.png); position:relative;">
</div>
<div style="margin:0 auto 0 auto; border:1px #FFF solid; width:900px; background:#FFF; position:relative;">
<table border="0" width="900" align="center">
<tr>
<td valign="top"><div id="templatemo_innercontents"> <?php echo Componente::Mostrar(); ?></div> </td>
<td width="230" valign="top"><div class="derechabloques"> <?php $LagcPeru->Modulos("izquierda"); ?></div> </td>
</tr>
</table>
</div>
<div id="templatemo_footer">
	<div class="links"> <a href=".">Inicio </a>| <a href="?lagc=com_contenidos&id=1&ver=quienes-somos">Quienes Somos</a> | <a href="?lagc=com_contenidos&id=2&ver=servicios">Servicios</a> | <a href="?lagc=com_contenidos&id=3&ver=clientes">Clientes</a> | <a href="?lagc=com_contenidos&id=4&ver=soporte">Soporte</a> | <a href="?lagc=com_contactenos&id=2&ver=contactenos">Contactanos</a> </div>
  <div class="copyright"> Copyright © 2011 Hosting Smart Soft - Todos los derechos reservados. <a href="?lagc=com_contenidos&id=5&ver=poltica-de-privacidad">Política de Privacidad</a><br />
  Cel. (054) 959375607 - E-mail: info@smartsoftperu.com<br />
	</div>
</div>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25130698-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>