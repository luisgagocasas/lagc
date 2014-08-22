<?php require "plantillas/".$config->lagctemplsite."/class.usuarios.php"; ?>
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
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?php echo $config->lagcnombre; ?> feed" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/layout.css" type="text/css" media="screen">
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-replace.js"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/NewsGoth_400.font.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/NewsGoth_700.font.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/Vegur_300.font.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/FF-cash.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/tms-0.3.js" type="text/javascript"></script>
<script src="componentes/com_clientes/jquery.livetwitter.js" type="text/javascript"></script><!--twitter-->
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/tms_presets.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() { 
	$('.close').bind('click', function(){
		$(this).parent().show().fadeOut(500);
	});
}); 
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/ie6_script_other.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/html5.js"></script>
<![endif]-->
</head>
<?=$LagcPeru->Modulos("body"); ?>
<header>
  <div class="main">
    <div class="wrapper">
      <h1><a></a></h1>
      <nav>
        <?php $LagcPeru->Modulos("menuprincipal"); ?>
      </nav>
    </div>
  </div>
  <div class="ic">Desarrollado por Luis Gago Casas - Lagc-peru.com</div>
</header>
<section id="content">
  <div class="main">
    <?=$LagcPeru->Modulos("cabecera"); ?>
    <?=$LagcPeru->Modulos("separador1"); ?>
    <?=$LagcPeru->Modulos("frace"); ?>
    <?=$LagcPeru->Modulos("separador2"); ?>
    <div class="wrapper">
      <article class="col-1">
      	<?=$LagcPeru->Modulos("izquierda"); ?>
      </article>
      <article class="col-2">
        <?=Componente::Mostrar(); ?>   
      </article>
    </div>
  </div>
</section>
<footer>
  <div class="main">
    <div class="wrapper border-bot2 margin-bot">
      <article class="fcol-1">
        <div class="indent-left">
          <h3 class="color-1">Comunidades!</h3>
          <ul class="list-services">
            <li><a href="https://www.facebook.com/pages/SmartSoft-Per%C3%BA/220132278031539" target="_blank">Facebook</a></li>
            <li><a class="it-2" href="https://twitter.com/" target="_blank">Twitter</a></li>
            <li><a class="it-3" href="http://pe.linkedin.com/" target="_blank">Linked In</a></li>
            <li><a class="it-4" href="http://youtube.com/" target="_blank">Youtube</a></li>
          </ul>
        </div>
      </article>
      <article class="fcol-2">
        <h3 class="color-1">Amigos!</h3>
<table border="0">
<tr>
<?php
$ctdart = 1;
$rptcliente = mysql_query("select * from usuarios where id!=1 ORDER BY rand() LIMIT 8");
while($usuarios = mysql_fetch_array($rptcliente)) {
if ($ctdart > 4) {
	echo "</tr><tr>";
	$ctdart = 1;
}
?>
<td style="padding:5px 5px; text-align:justify; width:350px;">
<a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuarios['id'], $usuarios['usuario']); ?>"><?=FC_LAGC_USER::IMGUSER(2, $usuarios['imagen'], $usuarios['nombres'], $usuarios['apellidos']); ?></a>
</td>
<?php $ctdart++; } ?>
</tr>
</table>
<center>
<a href="?lagc=com_usuarios&id=registro" class="button">Registrarse</a> | <a href="?lagc=com_usuarios&id=entrar" class="button">Entrar</a></center>
     </article>
      <article class="fcol-3">
      <?=$LagcPeru->Modulos("footerttwitter"); ?>
      </article>
    </div>
    <div class="aligncenter"> <strong>SmartSoft</strong> Todos los derechos reservados / 2010 - 2012 </div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
$(window).load(function() {
	$('.slider')._TMS({
		duration:800,
		easing:'easeOutQuart',
		preset:'diagonalExpand',
		slideshow:7000,
		pagNums:false,
		pagination:'.pagination',
		banners:'fade',
		pauseOnHover:true,
		waitBannerAnimation:true
	});
});
</script>
</body>
</html>