<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="es" />
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
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
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
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
  _gaq.push(['_setAccount', 'UA-24515163-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--
Esta pagina usa el cms ->Lagc Perú <-> Es Creado por: Luis Gago Casas
Contacto en el messenger: webmaster@portuhermana.com
Soporte: info@lagc-peru.com
-->
</head>
<body>
<div id="templatemo_wrapper">
  <div id="templatemo_header">
    <div id="site_title">
      <h1><a href=".">Extrem Callalli</a></h1>
    </div>
    <div id="twitter"><a href="http://www.facebook.com/pages/Extrem-Callalli/218305531538936" target="_blank">Síguenos en </a></div>
  </div>
  <?php $LagcPeru->Modulos("menuprincipal"); ?>
  <div id="slider_wrapper">
    <div id="slider"> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/01.jpg" alt="01" title="Descripcion de foto 1" /></a> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/02.jpg" alt="02" title="Descripcion de foto 2" /></a> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/01.jpg" alt="03" title="Descripcion de foto 3" /></a> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/03.jpg" alt="04" title="Descripcion de foto 4" /></a> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/01.jpg" alt="05" title="Descripcion de foto 5" /></a> <a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/images/slideshow/04.jpg" alt="06" title="Descripcion de foto 6" /></a> </div>
  </div>
  <div id="templatemo_main">
    <div class="col_w900 col_w900_last">
      <div class="col_w580 float_l"> <?php echo Componente::Mostrar(); ?> </div>
      <div class="col_w280 float_r">
      <a href="?lagc=com_eventos"><img src="plantillas/extremcallalli/images/inscribirse.gif" border="0" /></a>
        <br />
        <div class="cleaner h30"></div>
        <div id="fb-root"></div>
        <script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script>
        <fb:like-box href="https://www.facebook.com/pages/Extrem-Callalli/218305531538936" width="280" show_faces="true" border_color="" stream="false" header="true"></fb:like-box>
        <div class="cleaner"></div>
        <br />
        <?php $LagcPeru->Modulos("izquierda"); ?>
        <br />
      </div>
      <div class="cleaner"></div>
    </div>
    <div class="cleaner"></div>
    <span class="bottom"></span> </div>
</div>
<div id="templatemo_footer"> Copyright © 2011 <a>Extrem Callalli</a> - Desarollado por: <a href="http://www.facebook.com/pages/Smart-Soft/220132278031539" target="_blank">Smartsoft</a></div>
</body>
</html>