<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<base href="<?=$config->lagcurl; ?>" target="_parent">
<link rel="shortcut icon" href="favicon.ico">
<?=Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?=$config->lagcdescription; ?>">
<meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="Lagc Peru">
<meta name="author" content="<?=$config->lagcnombre; ?>">
<meta property="og:title" content="<?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=$config->lagcurl.LGlobal::Tipo_URL($_GET['lagc'], $_GET['id'], $_GET['ver']);?>" />
<meta property="og:image" content="<?=$config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen; ?>" />
<meta property="og:site_name" content="<?=$config->lagcnombre; ?>" />
<meta property="fb:admins" content="100000476487163" />
<meta property="og:description" content="<?=$config->lagcdescription; ?>"/>
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?php echo $config->lagcnombre; ?> feed" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/estilos.css" type="text/css" media="all">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/slimbox2.css" type="text/css" media="screen" />
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.min.js"></script>
<script type="text/JavaScript" src="plantillas/<?=$config->lagctemplsite; ?>/js/slimbox2.js"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:300,
		pauseTime:7000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, 
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/ie6_script_other.js"></script>
<![endif]-->
<!--
Gestor de contenidos -> Lagc Perú -> Creado por: Luis Gago Casas
Desarrollo del sitio: Lagc Peru (Luis Gago Casas)
-->
</head>
<body>
    <div id="wrapper">
      <div id="header">
      	<div class="redes">
        <center>
        <a href="http://www.facebook.com/" target="_blank"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/facebook.png" border="0" /></a>
        <a href="http://twitter.com/" target="_blank"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/twitter.png" border="0" /></a>
        <a href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/rsscopy.png" border="0" /></a>
        </center>
        <br />
        <form action="http://www.google.com.pe/webhp?hl=es&tab=ww" target="_blank" method="get">
        <input type="text" name="q" class="camposeash" />
        <input type="submit" value="Buscar" style="width:70px;" class="btnbusca" />
        </form>
        </div>
        <div class="logo"></div>
        <div class="logo-text"></div>
      </div>
      <div class="menu">
      <?php $LagcPeru->Modulos("menuprincipal"); ?>
      </div>
          <div id="banner">
            <div id="slider_wrapper">
            	<div id="slider">
            <img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/01.jpg" alt="01" />
            <img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/02.jpg" alt="02" />
            <img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/04.jpg" alt="03" />
            <img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/05.jpg" alt="04" />
            <img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/06.jpg" alt="05" />
           	 	</div>
          	</div>
      </div>
      <div id="leftcolumn">
      <?=Componente::Mostrar(); ?>
      </div>
      <div id="rightcolumn">
      <?php $LagcPeru->Modulos("derecha"); ?>
		<div class="cont-right">
        <a href="http://www.tvunsa.com.pe/" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-1.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.unsa.edu.pe/index.php?option=com_content&view=article&id=298&Itemid=336" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-2.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.unsa.edu.pe/images/pdf_old/libro.pdf" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-3.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://virtual.unsa.edu.pe/auladigital/" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-4.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.unsa.edu.pe/convocatoria/list_cas.html" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-5.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.unsa.edu.pe/convocatoria/of_personal.html" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-6.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.rpu.edu.pe/" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-7.jpg" border="0" /></a>
        </div>
        <div class="cont-right">
        <a href="http://www.unsa.edu.pe/index.php?option=com_content&view=article&id=771&Itemid=377" target="_blank"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icon-8.jpg" border="0" /></a>
        </div>
      </div>
      <div id="footer">
      
	<div class="cont-footer">
    <ul>
    	<li><a href=".">Inicio</a></li>
        <li><a href="?lagc=com_contenidos&id=1&ver=vision">Visión</a></li>
        <li><a href="?lagc=com_contenidos&id=2&ver=mision">Misión</a></li>
        <li><a href="?lagc=com_contactenos&id=2&ver=ubicacion">Ubicación</a></li>
        <li><a href="?lagc=com_contactenos&id=1&ver=contactenos">Contactenos</a></li>
    </ul>
    </div>
	<div class="cont-footer">
    <strong>Investigaciones</strong>
    <ul>
    	<li><a href="contenidos/area-de-turismo-7">Area Turismo</a></li>
        <li><a href="">Area de Antropología</a></li>
    </ul>
    </div>
    <div class="cont-footer">
    <strong>Usuarios</strong>
    <ul>
    	<li><a href="?lagc=com_usuarios&id=registro">Crear Cuenta</a></li>
        <li><a href="?lagc=com_usuarios&id=perdiocontra">¿Olvido su Contraseña?</a></li>
        <li><a href="?lagc=com_usuarios">Usuarios</a></li>
    </ul>
    </div>
	<div class="cont-footer-unsa">
    <div class="footer-unsa"><br />Instituto de Investigación Sociales es una proyecto de la Universidad Nacional de San Agustin (UNSA).<br /><br />Desde el 2010</div>
    <div style="background:url(plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/logo-insa.png) no-repeat center; width:100px; height:123px;"></div>
    
    </div>
    <div style="width:100%; height:20px; margin:145px 0px;"><center>&copy; Todos los Derechos Reservados</center></div>
      </div>
    </div>
</body>
</html>