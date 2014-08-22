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
		pauseTime:4000,
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
<script language="javascript" type="text/javascript">
function clearText(field) {
	if (field.defaultValue == field.value) field.value = '';
	else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28858421-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--
Gestor de contenidos -> Lagc Perú -> Creado por: Luis Gago Casas
Desarrollo del sitio: Lagc Peru (Luis Gago Casas) http://www.lagc-peru.com/
-->
</head>
<body>
<div id="templatemo_wrapper">
  <div id="templatemo_site_title_bar">
    <div id="site_title">
      <h1><a href="."><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/logo.png" alt="Light Space" /></a></h1>
    </div>
    <ul class="social_network">
      <li><a href="https://www.facebook.com/pages/HA-Computer-EIRL/100577510060870" target="_blank"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/facebook_icon.png" alt="facebook" /></a></li>
      <li><a href="" target="_blank"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/linkin_icon.png" alt="linkin" /></a></li>
      <li><a href="" target="_blank"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/twitter_icon.png" alt="twitter" /></a></li>
    </ul>
  </div>
  <div id="templatemo_menu">
  <?php $LagcPeru->Modulos("menuprincipal"); ?>
  </div>
  <div id="templatemo_search">
    <div id="search_box">
      <form action="/" method="get">
        <input name="lagc" type="hidden" value="com_catalogodeltron" />
        <input name="id" type="hidden" value="buscar" />
        <input type="hidden" name="tb" value="1" />
        <input type="text" value="Introduzca el codigo..." name="palabra" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
        <input type="submit" value="" alt="Search" id="searchbutton" title="Search" />
      </form>
    </div>
  </div>
  <div id="templatemo_banner">
    <div id="banner_left">
    <div id="slider_wrapper">
            	<div id="slider">
            		<?php $LagcPeru->Modulos("bannercabecera"); ?>
           	 	</div>
          	</div>
    </div>
    <div id="banner_right">
      <div class="banner_button"> <a href="contactenos/contactenos-1">Contáctenos</a> </div>
      <div class="banner_button"> <a href="contactenos/ubicacion-3">Ubicación</a> </div>
      <div class="banner_button"> <a href="contactenos/soporte-online-2">Soporte Online</a> </div>
    </div>
  </div>
  <div id="templatemo_content_top"></div>
  <div id="templatemo_content">
    <div class="section_w940">
      <?php Componente::Mostrar(); ?>
      <div class="cleaner"></div>
    </div>
  </div>
  <div id="templatemo_content_bottom"></div>
  <div id="templatemo_footer">
    <div class="section_w240">
      <h3>Paginas Amigas</h3>
      <div class="sub_content">
        <ul class="footer_list">
          <li><a href="http://smartsoftperu.com/" target="_blank">Smart Soft</a></li>
        </ul>
      </div>
    </div>
    <div class="section_w240">
      <h3>Redes Sociales</h3>
      <div class="sub_content">
        <ul class="footer_list">
          <li><a href="https://www.facebook.com/pages/HA-Computer-EIRL/100577510060870">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Youtube</a></li>
        </ul>
      </div>
    </div>
    <div class="section_w240">
      <h3>La Empresa</h3>
      <div class="sub_content">
        <ul class="footer_list">
          <li><a href="/contenidos/la-empresa-1">Quines Somos</a></li>
          <li><a href="/contenidos/la-empresa-1">Visión</a></li>
          <li><a href="/contenidos/la-empresa-1">Misión</a></li>
        </ul>
      </div>
    </div>
    <div class="section_w240">
      <h3>Ubicación</h3>
      <div class="sub_content">
        <p>&raquo; Plataforma Andrés Avelino Cáceres.<br />
Asociación Ferial Siglo XX.<br />
Pasillo 7 (Arequipa) – Stand 8-9</p>
<p>&raquo; Teléfono: 421409</p>
<p>&raquo; Fax: 054 -421409</p>
      </div>
    </div>
    <div class="cleaner_h40"></div>
    <center>
      Copyright &copy; <?=date('Y'); ?> <a href=".">Ha Computer</a> | Creado por <a href="http://smartsoftperu.com/" target="_blank">Smart Soft</a>
    </center>
  </div>
</div>
</body>
</html>