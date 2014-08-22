<!DOCTYPE html>
<html lang="es">
<head>
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta charset="iso-8859-1">
<base href="<?=$config->lagcurl; ?>" target="_parent">
<link rel="shortcut icon" href="<?=$config->lagcurl; ?>favicon.ico">
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
<link rel="stylesheet" href="plantillas/wilss/css/estilos.css" type="text/css" media="screen">
<link rel="stylesheet" href="plantillas/wilss/css/style.css" type="text/css" media="screen"/>
<style>
span.reference {
	position:fixed;
	left:10px;
	bottom:10px;
	font-size:12px;
}
span.reference a {
	color:#aaa;
	text-transform:uppercase;
	text-decoration:none;
	text-shadow:1px 1px 1px #000;
	margin-right:30px;
}
span.reference a:hover {
	color:#ddd;
}
ul.sdt_menu {
	margin-top:-10px;
}
</style>
<!--
Desarrollado por: Luis Gago - luisgago@lagc-peru.com
Empresa Encargada: Smart Soft Perú - http://www.smartsoftperu.com/
Mayo 2012
-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31436696-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body>
<div class="cabecera">
  <div style="float:left; width:225px; height:123px; padding:0px 0px; margin:5px 3px;">
    <video src="plantillas/wilss/animacion/logo.ogv" width="240" height="115" autoplay muted preload loop type='video/ogg; codecs="theora,vorbis"'>
      <!–-Este Navegador no Soporta Este Video-–>
    </video>
  </div>
</div>
<?php $LagcPeru->Modulos("menuprincipal"); ?>
<div class="contenidos">
  <?=Componente::Mostrar(); ?>
</div>
<?php $LagcPeru->Modulos("footer"); ?>
</body>
</html>