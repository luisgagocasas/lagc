<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="iso-8859-1">
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<base href="<?=$config->lagcurl; ?>" target="_parent">
<link rel="shortcut icon" href="favicon.ico">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
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
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?=$config->lagcnombre; ?> feed" />
<link href="plantillas/<?=$config->lagctemplsite; ?>/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.min.js"></script>
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/slimbox2.css" type="text/css" media="screen" />
<script type="text/JavaScript" src="plantillas/<?=$config->lagctemplsite; ?>/js/slimbox2.js"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:3000,
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
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17007958-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/ie6_script_other.js"></script>
<![endif]-->
<!--
Programador: Luis Gago - luisgago@lagc-peru.com
Desarrollado para la empresa "Smart soft Perú"
-->
</head>
<body>
<div id="templatemo_wrapper">
  <div id="templatemo_header">
    <div id="header_left"></div>
      <div id="slider_wrapper">
    	<div id="slider">
        <?php $LagcPeru->Modulos("cabecera"); ?>
    	</div>
    </div>
    <div class="cleaner"></div>
  </div>
  <div id="templatemo_menu">
    <?php $LagcPeru->Modulos("menuprincipal"); ?>
  </div>
  <!-- end of templatemo_menu -->
  <div id="content_wrapper">
    <div id="content">
    <?php Componente::Mostrar(); ?>
    </div>
    <div id="sidebar_wrapper">
    <ul id="social_box">
        <li><a href="#"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/facebook.png" alt="facebook" /></a></li>
        <li><a href="#"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/twitter.png" alt="twitter" /></a></li>
        <li><a href="#"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/linkedin.png" alt="linkin" /></a></li>
        <li><a href="#"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/technorati.png" alt="technorati" /></a></li>
        <li><a href="#"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/myspace.png" alt="myspace" /></a></li>
      </ul>
      <br><br>
      <div id="sidebar_top"></div>
      <div id="sidebar">
        <?php $LagcPeru->Modulos("derecha"); ?>
        <div class="cleaner_h30"></div>
        <h2>Blog: Categorias</h2>
        <ul class="templatemo_list col_w260">
        <?php
        $rptcatblog = mysql_query("select * from blog_categorias where cat_activado='1' ORDER BY cat_nombre ASC");
        while ($contcate=mysql_fetch_array($rptcatblog)) {
        	echo "<li><a href=\"?lagc=com_blog&id=".$contcate['cat_id']."&categoria=".LGlobal::Url_Amigable($contcate['cat_nombre'])."\">".$contcate['cat_nombre']."</a></li>\n";
        }
        ?>
        </ul>
      </div>
      <div id="sidebar_bottom"></div>
    </div>
    <div class="cleaner"></div>
  </div>
  <div id="templatemo_footer">
    <div class="footer_box">
      <h4>Menu Principal</h4>
      <ul>
        <li><a href=".">Inicio</a></li>
        <li><a href="contenidos/1-quienes-somos">Quienes Somos</a></li>
        <li><a href="contenidos/2-servicios">Servicios</a></li>
        <li><a href="galeria">Galeria</a></li>
        <li><a href="programacion/1-contactenos" class="last">Contactenos</a></li>
      </ul>
    </div>
    <div class="footer_box">
      <h4>Paginas Amigas</h4>
      <ul>
        <li><a href="http://www.smartsoftperu.com/" target="_blank">Smart Soft Perú</a></li>
        <li><a href="http://www.lagc-peru.com/" target="_blank">Lagc Perú</a></li>
      </ul>
    </div>
    <div class="footer_box last">
    <?php $rptcont = mysql_query("select * from contenidos where cont_id='1' limit 1"); $cont1=mysql_fetch_array($rptcont); ?>
      <h4><?=$cont1['cont_titulo']; ?></h4>
      <p>
      <?=$cont1['cont_resumen']; ?>
       <a href="<?=LGlobal::Tipo_URL('com_contenidos', $cont1['cont_id'], $cont1['cont_titulo']); ?>">leer Mas...</a></p>
    </div>
    <div class="cleaner"></div>
  </div>
  <div id="templatemo_copyright"> Copyright © 2012 <a href=".">Pc-Lima</a> | 
    Desarrollado por <a href="http://www.smartsoftperu.com/" target="_parent">Smart Soft Perú</a> </div>
</div>
</body>
</html>