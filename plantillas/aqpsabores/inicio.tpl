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
Lagc Perú -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com
Soporte: info@lagc-peru.com
-->
</head>
<body>
<div class="cuerpo">
<div class="cabecera-fondo1">
    <div class="cabecera-fondo2">
        <div class="cabecera-fondo3">
        <div class="logo">
        </div>
        <div id="slider_wrapper">
            <div id="slider">
            <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/04.jpg" alt="03" /></a>
            <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/03.jpg" alt="02" /></a>
            <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/05.jpg" alt="04" /></a>
            <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/02.jpg" alt="01" /></a>
            </div>
          </div>
        <div class="menu">
            <a href="." class="enlace">Inicio</a>
            <a href="?lagc=com_contenidos&id=1&ver=nosotros" class="enlace">Nosotros</a>
            <a href="?lagc=com_contenidos&id=2&ver=la-carta" class="enlace">La Carta</a>
            <a href="?lagc=com_contactenos&id=2&ver=reservas" class="enlace">Reservas</a>
            <a href="?lagc=com_contactenos&id=3&ver=ubicacin" class="enlace">Ubicación</a>
            <a href="?lagc=com_contactenos&id=1&ver=contactenos" class="enlace">Contactanos</a>
        </div>
        
        </div>
    </div>
</div>
<div class="contenido-cabecera1"></div>
<div class="contenido-cabecera2"></div>
<div class="contenido-cabecera3"></div>
<div class="contenido-contenido3">
	<div class="contenido-contenido2">
    	<div class="contenido-contenido1">
        <table border="0" class="contenedor">
        <tr>
        <td width="260" valign="top">
        <div class="bloque-izquierdo">
        <div class="titulob">Participa en el Blog</div>
        <div class="contenido-izquierdo">
        &raquo; <a href="#">Comida arequipeña en la Noche de la Comida Peruana</a><br /><br />
        &raquo; <a href="#">Buscan romper mito sobre gastronomía arequipeña</a><br /><br />
        &raquo; <a href="#">Festival de comida de arequipeña en el Dorado Plaza Hotel</a><br /><br />
        &raquo; <a href="#">reportajes de la comida arequipeña </a>
        </div>
        </div>
        <br />
        <center><a href="#"><img src="plantillas/aqpsabores/imagenes/redes-sociales.png" border="0" /></a></center>
        </td>
        <td valign="top" class="contenido">
        <?php echo Componente::Mostrar(); ?>
        </td>
        </tr>
        </table>
        <div class="footer1"></div>
        </div>
        <div class="footer2"></div>
    </div>
    <div class="footer3"></div>
</div>
</div>
</body>
</html>