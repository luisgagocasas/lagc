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
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/cufon-replace.js"></script>  
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/Myriad_Pro_600.font.js"></script>


<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="plantillas/<?=$config->lagctemplsite; ?>/css/slimbox2.css" type="text/css" media="screen" />
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/jquery.min.js"></script>
<script type="text/JavaScript" src="plantillas/<?=$config->lagctemplsite; ?>/js/slimbox2.js"></script>
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
<!--[if lt IE 9]>
<script type="text/javascript" src="plantillas/<?=$config->lagctemplsite; ?>/js/html5.js"></script>
<![endif]-->
</head>
<body id="page2">
<div class="extra">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1><a href="." id="logo">Around the World</a></h1>
				<div class="right">
					<div class="wrapper"><br>
						<a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/twitter.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/facebook.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/rsscopy.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/rsscopy.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/rsscopy.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/rsscopy.png" border="0"></a>
                        <a href=""><img src="plantillas/<?=$config->lagctemplsite; ?>/images/rsscopy.png" border="0"></a>
                        <br><br>
					</div>
					<div class="wrapper">
						<nav>
							<ul id="top_nav">
								<li><a href="?lagc=com_usuarios&id=registro">Registrate</a></li>
								<li><a href="#">Entrar</a></li>
								<li><a href="#">Soporte</a></li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>
			<nav>
            	<?php $LagcPeru->Modulos("menuprincipal"); ?>
			</nav>
			<div class="text">
				
                
                <div id="slider_wrapper">
            	<div id="slider">
            <img src="plantillas/<?=$config->lagctemplsite; ?>/images/slideshow/b1.jpg" alt="01" />
            <img src="plantillas/<?=$config->lagctemplsite; ?>/images/slideshow/b1.jpg" alt="02" />
           	 	</div>
          	</div>
            
            
			</div>
		</header><div class="ic">Desarrollado por Lagc Perú! www.lagc-peru.com</div>
<!-- / header -->
<!-- content -->
		<section id="content">
			<article class="col1">
				<h3>Hot Travel</h3>
				<div class="pad">
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="plantillas/<?=$config->lagctemplsite; ?>/images/page1_img1.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Italy<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper under">
						<figure class="left marg_right1"><img src="plantillas/<?=$config->lagctemplsite; ?>/images/page1_img2.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Philippines<br>Travel</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
					<div class="wrapper">
						<figure class="left marg_right1"><img src="plantillas/<?=$config->lagctemplsite; ?>/images/page1_img3.jpg" alt=""></figure>
						<p class="pad_bot2"><strong>Cruise<br>Holidays</strong></p>
						<p class="pad_bot2">Lorem ipsum dolor sit amet, consect etuer adipiscing.</p>
						<a href="#" class="marker_1"></a>
					</div>
				</div>
       		</article>
			<article class="col1 pad_left1">
				<?=Componente::Mostrar(); ?>
        	</article>
		</section>
<!-- / content -->
	</div>
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<a rel="nofollow" href="http://www.templatemonster.com/" target="_blank">Website template</a> designed by TemplateMonster.com<br>
			<a href="http://www.templates.com/product/3d-models/" target="_blank">3D Models</a> provided by Templates.com
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>