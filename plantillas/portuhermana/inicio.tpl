<!DOCTYPE html>
<!--[if IE 7]><html class="ie7 no-js" lang="es"><![endif]-->
<!--[if lte IE 8]><html class="ie8 no-js" lang="es"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="not-ie no-js" lang="es">
<!--<![endif]-->
<head>
<meta charset="iso-8859-1">
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<base href="<?=$config->lagcurl; ?>" target="_parent" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="author" href="https://plus.google.com/114905549370121603172" />
<?=Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php Componente::CompoDescription($_GET['lagc'], $_GET['id']); ?>" />
<meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>" />
<meta name="copyright" content="Lagc Peru" />
<meta name="author" content="<?=$config->lagcnombre; ?>" />
<meta name="msvalidate.01" content="C60A604C898718954014E44913B725C2" />
<meta property="og:title" content="<?=Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=$config->lagcurl.LGlobal::Tipo_URL($_GET['lagc'], $_GET['id'], $_GET['ver']);?>" />
<meta property="og:image" content="<?php Componente::CompoImagen($_GET['lagc'], $_GET['id']); ?>" />
<meta property="og:site_name" content="<?=$config->lagcnombre; ?>" />
<meta property="fb:admins" content="100000476487163" />
<meta property="fb:app_id" content="<?=$config->lagcfbid; ?>" />
<meta property="fb:page_id" content="231895422917" />
<meta property="og:description" content="<?php Componente::CompoDescription($_GET['lagc'], $_GET['id']); ?>" />
<link rel="alternate" type="application/atom+xml" href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" title="<?=$config->lagcnombre; ?> feed" />
<link rel="stylesheet" type="text/css" href="plantillas/portuhermana/stylesheets/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--[if lt IE 9]>
    <script src="plantillas/portuhermana/js/modernizr.custom.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
    <script type="text/javascript" src="plantillas/portuhermana/js/ie.js"></script>
<![endif]-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5540084-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Desarrollado por Luis Gago Casas - luisgago@lagc-peru.com / www.lagc-peru.com -->
</head>
<body class="background-7 h-style-3 text-3 skin-2">
<div id="wrapper">
  <header class="clearfix">
    <nav id="navigation" class="navigation">
      <?=$LagcPeru->Modulos("superior");?>
      <div class="account-wrapper">
        <ul id="user-account-nav">
          <li><a href="?lagc=com_usuarios&id=entrar">Entrar</a></li>
          <li><a href="?lagc=com_usuarios&id=registro">Crear Cuenta</a></li>
        </ul>
      </div>
    </nav>
    <div id="logo">
      <div class="slogan"><?=$config->lagclema; ?></div>
    </div>
  </header>
  <div class="container">
    <!--<div class="search-container">
      <form action="" id="searchForm">
        <fieldset>
          <label for="term">Buscar</label>
          <input id="term" type="text" />
          <input type="submit" value="Submit" />
        </fieldset>
      </form>
    </div>-->
    <div class="search-container">
      <form action="" id="searchForm">
        <fieldset>
          <label for="term">Redes Sociales
          <a href="https://www.facebook.com/portuhermana" target="_blank"><img src="plantillas/portuhermana/images/icon1.jpg" width="16" border="0"></a>
          <a href="http://twitter.com/portuhermana" target="_blank"><img src="plantillas/portuhermana/images/icon2.jpg" width="16" border="0"></a>
          <a href="http://www.flickr.com/photos/82237574@N05/" target="_blank"><img src="plantillas/portuhermana/images/icon3.jpg" width="16" border="0"></a>
          <a href="<?=$config->lagcurl; ?>componentes/com_blog/rss.php" target="_blank"><img src="plantillas/portuhermana/images/icon4.jpg" width="16" border="0"></a>
          </label>
        </fieldset>
      </form>
    </div>
    <nav id="platform-menu" class="platform-menu"> <a href="." class="home">Inicio</a>
      <?php $LagcPeru->Modulos("menuprincipal"); ?>
    </nav>
    <?php $LagcPeru->Modulos("cabecera"); ?>
    <div class="entry clearfix">
        <?php
        if($_GET['lagc']=="com_musica") {
          Componente::Mostrar();
        }
        else { ?>
        <div id="content">
        <?php Componente::Mostrar(); ?>
        </div>
        <aside id="sidebar">
        <?php $LagcPeru->Modulos("derecha"); ?>
        </aside>
      <?php } ?>
    </div>
    <footer id="footer" class="clearfix">
      <section class="entry-footer clearfix">
        <div class="one-fourth">
          <h3>Twitteando...  </h3>@portuhermana
          <div id="jstwitter"></div>
          <div class="more text-align-right"><a href="http://twitter.com/portuhermana" target="_blank">Ver todos<span>&raquo;</span></a></div>
        </div>
        <!--/ .one-fourth-->
        <div class="one-fourth">
          <h3>Fotos en Flickr</h3>
          <ul id="flickr-badge" class="clearfix">
          </ul>
          <div class="more text-align-left"><a href="http://www.flickr.com/photos/82237574@N05/" target="_blank">Ver m&aacute;s fotos <span>&raquo;</span></a></div>
        </div>
        <!--/ .one-fourth-->
        <div class="one-fourth">
          <h3>Acerca de nosotros</h3>
          <div class="text">
            <p>Portuhermana.com es un proyecto del grupo XtH de Socabaya. con este queremos informar de las actividades en socabaya y apoyando a difundir nuestra riqueza de nuestra tierra.</p>
            <!-- <div class="more text-align-left"><a href="">Leer m&aacute;s <span>&raquo;</span></a></div> -->
          </div>
          <!--/ .text-->
        </div>
        <!--/ .one-fourth-->
        <div class="one-fourth last">
          <div id="tabs-footer">
            <ul class="tabs-nav clearfix">
              <li><a href="#tab9">Cat. Blog</a></li>
              <li><a href="#tab10">Cat. Videos</a></li>
            </ul>
            <div class="tabs-container">
              <div class="tab-content" id="tab9">
                <ul class="custom-formatting">
                <?php
                $rptblog = mysql_query("select cat_nombre,cat_id from blog_categorias where cat_activado='1' order by cat_id DESC limit 8");
                while($catblog = mysql_fetch_array($rptblog)){
                	echo "<li><a href=\"?lagc=com_blog&id=".$catblog['cat_id']."&categoria=".LGlobal::Url_Amigable($catblog['cat_nombre'])."\">".$catblog['cat_nombre']."</a></li>";
                }
                ?>
                </ul>
              </div>
              <div class="tab-content" id="tab10">
                <ul class="custom-formatting">
                <?php
                $rptvideo = mysql_query("select vi_ca_id,vi_ca_titulo from video_categorias where vi_ca_estado='1' order by vi_ca_id DESC limit 8");
                while($catvideo = mysql_fetch_array($rptvideo)){
                	echo "<li><a href=\"?lagc=com_videos&id=".$catvideo['vi_ca_id']."&categoria=".LGlobal::Url_Amigable($catvideo['vi_ca_titulo'])."\">".$catvideo['vi_ca_titulo']."</a></li>";
                }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="copyright"> Desarrollado por: <a href="http://www.lagc-peru.com/" target="_blank">Lagc Per&uacute;</a> <img src="plantillas/portuhermana/images/logo-lagc.gif" width="80" style="margin: 0px 0px -5px 0px;" border="0">
      <div style="float:right;">Copyright &copy; 2012. - Todos los derechos Reservados.</div>
      </div>
    </footer>
  </div>
</div>
<div id="control_panel"> <a href="#" id="control_label"></a> </div>
<script type="text/javascript" src="plantillas/portuhermana/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="plantillas/portuhermana/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="plantillas/portuhermana/js/general.js"></script>
</body>
</html>