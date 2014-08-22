<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="iso-8859-1">
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<base href="<?=$config->lagcurl; ?>" target="_parent">
<link rel="shortcut icon" href="favicon.ico">
<?=Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?=$config->lagcdescription; ?>">
<meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="Lagc Peru">
<meta name="author" content="<?=$config->lagcnombre; ?>">
<meta property="og:title" content="<?=Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=$config->lagcurl.LGlobal::Tipo_URL($_GET['lagc'], $_GET['id'], $_GET['ver']);?>" />
<meta property="og:image" content="<?=$config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen; ?>" />
<meta property="og:site_name" content="<?=$config->lagcnombre; ?>" />
<meta property="fb:admins" content="100000476487163" />
<meta property="og:description" content="<?=$config->lagcdescription; ?>"/>
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?=$config->lagcnombre; ?> feed" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/estilos.css" type="text/css" media="all">
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/modernizr-latest.js"></script>
<script src="../../Scripts/swfobject_modified.js" type="text/javascript"></script>
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
<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=APP_ID";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>
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

		pauseTime:5000,

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
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/ie6_script_other.js"></script>
<![endif]-->
<!--
Desarrollado por: Luis Gago - luisgago@lagc-peru.com
http://www.lagc-peru.com/
-->
</head>
<body>
<div class="cabecera">
  <div class="bloquer1"><br><br><br>
  <center>
  <a href="index.php">HOME</a> / <a href="?lagc=com_programacion&id=4&ver=web-mail">WEB MAIL</a><br><a href="?lagc=com_programacion&id=5&ver=trabaja-con-nosotros">TRABAJA CON NOSOTROS</a>
  </center>
  </div>
  <div class="logo">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="240" height="130">
      <param name="movie" value="plantillas/mallkus/logo.swf">
      <param name="quality" value="high">
      <param name="wmode" value="opaque">
      <param name="swfversion" value="9.0.45.0">
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="plantillas/mallkus/logo.swf" width="240" height="130">
        <!--<![endif]-->
        <param name="quality" value="high">
        <param name="wmode" value="opaque">
        <param name="swfversion" value="9.0.45.0">
        <div>
          <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
  </div>
</div>
<div class="menu">
  <ul>
    <?php $LagcPeru->Modulos("menuprincipal"); ?>
  </ul>
</div>
<div class="contpagina">
	<div class="contenido">
    <?php Componente::Mostrar(); ?>
    </div>
    <div class="derecho">
    <?php $LagcPeru->Modulos("derecha"); ?>
    </div>
</div>
</body>
</html>