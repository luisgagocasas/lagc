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
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?php echo $config->lagcnombre; ?> feed" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-replace.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/CabinSketch_700.font.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/EB_Garamond_400.font.js"></script>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/modernizr-latest.js"></script>
<script src="componentes/com_clientes/jquery.livetwitter.js" type="text/javascript"></script>
<?php if ($_GET['id']!="redactar") { ?>
<script src="plantillas/<?=$config->lagctemplsite; ?>/js/flexcroll.js" type="text/javascript"></script>
<?php } ?>
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
<script type="text/javascript">
$(function() {
  var offset = $("#flotante").offset();
  var topPadding = 10;
  $(window).scroll(function() {
	  if ($(window).scrollTop() > offset.top) {
		  $("#flotante").stop().animate({
			  marginTop: $(window).scrollTop() - offset.top + topPadding
		  });
	  } else {
		  $("#flotante").stop().animate({
			  marginTop: 0
		  });
	  };
  });
});
</script>
<!--[if lt IE 7]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/ie6_script_other.js"></script>
<![endif]-->
<!-- [if lt IE 9]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/html5.js"></script>
<style type="text/css">
.bg {behavior:url(plantillas/<?=$config->lagctemplsite; ?>/js/PIE.htc)}
</style>
<![endif]-->
<!--
Desarrollado por: Luis Gago - luisgago@lagc-peru.com
http://www.lagc-peru.com/
-->
</head>
<?php $LagcPeru->Modulos("bodycss"); ?>
<div id="fb-root"></div>
<div class="main">
	<header>
		<div class="wrapper">
			<nav>
				<ul id="menu">
                <?php $LagcPeru->Modulos("menuprincipal"); ?>
				</ul>
			</nav>
		</div>
		<h1><a href="." id="logo">Lagc Perú</a></h1>
	</header><div class="ic">Desarrollo Web Profesional - Lagc Perú - luisgago@lagc-peru.com</div>
	<section id="content">
		<div class="wrapper">
			<article class="col1">
            <div style="width:570px; height:860px; padding:0px 10px; overflow:scroll; overflow-x: hidden; overflow-y: auto; border:0px;" class="flexcroll">
                <?php Componente::Mostrar(); ?>
            </div>
    		</article>
			<article class="col2">
            	<?php $LagcPeru->Modulos("izquierda"); ?>
                <div class="bloqued">
				<div class="redesso">Twitteando ...</div>
                <span style="font-size:12px; color: #C8C; margin: -20px 2px; position: absolute;">Participa en Twitter con la Palabra <strong style="color:#F00; background:#000; padding:3px 3px; -border-radius: 2px 2px 2px 2px; moz-border-radius: 2px 2px 2px 2px; -webkit-border-radius: 2px 2px 2px 2px;">socabaya</strong></span>
	<div id="twitterSearch" class="tweets"></div>
  	  <script type="text/javascript">
		// Basic usage
		$('#twitterSearch').liveTwitter('socabaya', {limit: 6, rate: 5000});
		// Changing the query
		$('#searchLinks a').each(function(){
			var query = $(this).text();
			$(this).click(function(){
				// Update the search
				$('#twitterSearch').liveTwitter(query);
				// Update the header
				$('#searchTerm').text(query);
				return false;
			});
		});
	</script>
    </div>
    		</article>
		</div>
	</section>
	<footer>
		<div class="wrapper">
			<article class="col">
				<h5>Menu</h5>
				<ul class="list1">
					<li><a href=".">Inicio</a></li>
					<li><a href="/radio">Radio</a></li>
                    <li><a href="/usuarios">Usuarios</a></li>
					<li><a href="/blog">Blog</a></li>
                    <li><a href="/videos">Videos</a></li>
                    <li><a href="/programacion/1-contactenos">Contactanos</a></li>
				</ul>
			</article>
			<article class="col pad_left2">
				<h5>Web Amigas</h5>
				<ul class="list1">
					<li><a href="http://www.lagc-peru.com/" target="_blank">Lagc Perú</a></li>
					<li><a href="http://www.facebook.com/lagc.peru" target="_blank">Lagc en Facebook</a></li>
				</ul>
			</article>
			<article class="col pad_left2">
				<h5>Redes Sociales</h5>
				<ul class="icons">
					<li><a href="http://www.facebook.com/portuhermana"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/icon1.jpg" alt="">Facebook</a></li>
					<li><a href="http://twitter.com/portuhermana"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/icon3.jpg" alt="">Twitter</a></li>
					<li><a href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php"><img src="plantillas/<?=$config->lagctemplsite; ?>/imagenes/icon5.jpg" alt="">RSS Feed</a></li>
				</ul>
			</article>
			<!--<article id="newsletter">
				<h5>Suscribirse</h5>
				<form id="newsletter_form">
					<div class="wrapper">
						<input class="input" style="border:none;" type="text" value="Ingrese su E-mail" onBlur="if(this.value=='') this.value='Ingrese su E-mail'" onFocus="if(this.value =='Ingrese su E-mail' ) this.value=''" >
					</div>
					<a href="#" onClick="document.getElementById('newsletter_form').submit()">Suscribirse</a>
				</form>
			</article>-->
		</div><br><br>
		<article class="privacy">
			Desarrollado por <a rel="nofollow" href="http://www.lagc-peru.com/" target="_blank">Lagc-peru.com</a><br>
            <div style="margin:0px 25px;"><img src="plantillas/radio-xth/imagenes/logo-lagc.gif" border="0"></div>
		</article>
        <div style="color:#FFF; font-size:12px; margin:0px 165px; text-align:right;">Todos los Derechos reservados</div><br>
		<a href="." class="footer_logo">&copy; Portu<span>hermana</span>.com</a>
	</footer>
</div>
</body>
</html>