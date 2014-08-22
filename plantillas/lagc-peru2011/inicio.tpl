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
<meta name="msvalidate.01" content="C60A604C898718954014E44913B725C2" />
<meta property="og:title" content="<?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?>" />
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
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/maxheight.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-replace.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.faded.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.jqtransform.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/script.js"></script>
<script type="text/javascript">
	$(function(){
		$("#faded").faded({
			speed: 500,
			crossfade: true,
			autoplay: 10000,
			autopagination:false
		});
		$('#domain-form').jqTransform({imgPath:'jqtransformplugin/img/'});
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
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/ie6_script_other.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/html5.js"></script>
<![endif]-->
</head>
<?php $LagcPeru->Modulos("internobody"); ?>
	<header>
		<div class="container">
			<div class="header-box">
				<div class="left">
					<div class="right">
						<nav>
                        <?php $LagcPeru->Modulos("menuprincipal"); ?>
						</nav>
						<h1><a href="."><span>Lagc</span>Perú</a></h1>
					</div>
				</div>
			</div>
			<span class="top-info">
            <div class="rotar-mensaje">
            <?php if (!empty($mensaje)) { echo $mensaje; } else { ?><marquee direction="left"><?php echo $config->lagclema; ?></marquee><?php }; ?>
            </div>
            </span>
            <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
            <span style="position:absolute; top:17px; right:0px;">
            Bienvenid@: <a href="<?=LGlobal::Tipo_URL('com_usuarios', $_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); ?>"><?php echo $_COOKIE["usuario_lagc"]; ?></a> | <a href="?logout=true">Desconectar</a>
            </span>
            <?php } else { ?>
			<form action="" method="post" id="login-form">
            <input name="url" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
				<fieldset>
					<span class="text">
						<input name="usuario" type="text" value="Usuario" onFocus="if(this.value=='Usuario'){this.value=''}" onBlur="if(this.value==''){this.value='Usuario'}">
					</span>
					<span class="text">
						<input name="password" type="password" value="Contrasenia" onFocus="if(this.value=='Contrasenia'){this.value=''}" onBlur="if(this.value==''){this.value='Contrasenia'}">
					</span>
					<a class="login" onClick="document.getElementById('login-form').submit()"><span><span>Entrar</span></span></a>
					<span class="links"><a href="?lagc=com_usuarios&id=perdiocontra">¿Olvido su Contraseña?</a><br/><a href="?lagc=com_usuarios&id=registro">Registrate</a></span>
				</fieldset>
			</form>
            <?php } ?>
		</div>
	</header>
	<section id="content"><div class="inner_copy">Saber mas en <a href="http://www.lagc-peru.com/">Lagc Peru</a></div>
		<div class="container">
        	<?php $LagcPeru->Modulos("cabecera"); ?>
			<div class="inside">
				<?php $LagcPeru->Modulos("cabecera2"); ?>
                <?php $LagcPeru->Modulos("contenido3"); ?>
					<div class="wrap row-2">
						<article class="col-1">
                        	<?php $LagcPeru->Modulos("izquierda"); ?>
						</article>
						<?php $LagcPeru->Modulos("contenido1"); ?>
                           <?php Componente::Mostrar(); ?>
						<?php $LagcPeru->Modulos("contenido2"); ?>
						<div class="clear"></div>
					</div>
                <?php $LagcPeru->Modulos("contenido4"); ?>
			</div>
		</div>
	</section>
<aside>
	<div class="container">
		<div class="inside">
			<div class="line-ver1">
				<div class="line-ver2">
					<div class="line-ver3">
						<div class="wrapper line-ver4">
							<ul class="list col-1">
								<li>Portafolio</li>
								<li><a href="clientes">Clientes</a></li>
							</ul>
							<ul class="list col-2">
								<li>Recursos</li>
                                <li><a href="catalogodeltron">Catalogo de Productos</a></li>
                                <li><a href="usuarios">Usuarios</a></li>
                                <li><a href="blog">Blog</a></li>
                                <li><a href="galeria">Fotos</a></li>
                                <li><a href="productos">Productos</a></li>
							</ul>
							<ul class="list col-3">
								<li>Recursos</li>
                                <li><a href="videos">Videos</a></li>
                                <li><a href="whois">Dominios y Hosting</a></li>
							</ul>
							<ul class="list col-4">
								<li>Soporte</li>
                                <li><a href="#">Preguntas Frecuentes</a></li>
                                <li><a href="#">Videos Tutoriales</a></li>
							</ul>
							<ul class="list col-5">
								<li>Menu Principal</li>
								<li><a href=".">inicio</a></li>
                                <li><a href="contenidos/que-es-lagc-peru-1">Que es Lagc Perú</a></li>
                                <li><a href="contenidos/servicios-2">Servicios</a></li>
                                <li><a href="clientes">Clientes</a></li>
                                <li><a href="blog">Blog</a></li>
                                <li><a href="contactenos/contactenos-1">Contactenos</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>
<footer>
	<div class="container">
		<div class="inside">
			©Todos los derechos reservados | informes, ventas y soporte tecnico a <a>info@lagc-peru.com</a><br>
            Rpc: 958106356 - Arequipa - Perú<br>
            2010 - 2011
		</div>
	</div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<a id="scroll-up" onClick="scrollTo(0,0);" style="display: none;"></a>
</body>
</html>