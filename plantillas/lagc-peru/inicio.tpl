<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es-ES">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta http-equiv="Content-language" content="es" />
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="favicon.ico">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Peru v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="Lagc Peru">
<meta name="google-site-verification" content="<?php echo $config->lagcanalytics; ?>">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate">
<base href="<?php echo $config->lagcurl; ?>" target="_parent">
<link rel="alternate" type="application/atom+xml" href="<?php echo $config->lagcurl; ?>componentes/com_blog/rss.php" title="<?php echo $config->lagcnombre; ?> feed" />
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<!--
Lagc Peru -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com
Soporte: info@lagc-peru.com
-->
</head>
<body>
<div id="templatemo_main_wrapper">
  <div id="templatemo_wrapper">
    <div id="templatemo_header">
      <div id="site_title"> <a href=".">Lagc Peru<span>CMS - Gestor de Contenidos<br />
        Creacin de Paginas Web</span></a> </div>
      <div id="header_right">
        <?php
        $redes = array('<div id="twitter"> <a href="http://twitter.com/lagcperu" target="_blank">Sigueme en Twitter</a> </div>', '<div id="facebook"> <a href="http://facebook.com/lagc.peru" target="_blank">Visitanos en Facebook</a> </div>');
        $todos=(count($redes)-1);
        $num=rand(0,$todos);
        echo $redes[$num];
        ?>
        <div class="cleaner"></div>
        <?php
        $mensajes = array('<h1>Busca tu dominio aqui...</h1><p>Todo inicia registrando su nombre de dominio, consulte la disponibilidad del nombre que desea registrar.</p><div class="btn_more image_fr"><a href="?lagc=com_whois">Leer mas...<span> </span></a></div>', '<h1>Necesitas Hosting?...</h1><p>Tenemos los planes que se acomodan a lo que necesitas.<br>y si quieres puedes crear tu propio plan.</p><div class="btn_more image_fr"><a href="?lagc=com_whois&hosting=planes">Saber como<span> </span></a></div>');
        $todo=(count($mensajes)-1);
        $num=rand(0,$todo);
        echo $mensajes[$num];
        ?>
      </div>
      <div class="cleaner"></div>
    </div>
    <?php $LagcPeru->Modulos("menuprincipal"); ?>
    <div id="content_wrapper">
      <div id="content_left"> <?php echo Componente::Mostrar(); ?> </div>
      <div id="content_right">
        <?php $LagcPeru->Modulos("izquierda"); ?>
        <br />
        <br />
      </div>
      <div class="cleaner"></div>
    </div>
    <div id="templatemo_footer">
      <div class="col_w300">
        <h4>Menu Principal</h4>
        <ul>
          <li><a href=".">Inicio</a></li>
          <li><a href="?lagc=com_whois">Dominios</a></li>
          <li><a href="?lagc=com_whois&hosting=planes">Hosting</a></li>
          <li><a href="?lagc=com_blog">Blog</a></li>
          <li><a href="?lagc=com_contactenos&id=1&ver=contactenos">Contacto</a></li>
        </ul>
      </div>
      <div class="col_w300">
        <h4>Aplicaciones</h4>
        <ul>
          <li><a href="?lagc=com_usuarios">Usuarios</a></li>
          <li><a href="?lagc=com_avisos">Avisos</a></li>
          <li><a href="?lagc=com_galeria">Galeria</a></li>
          <li><a href="?lagc=com_videos">Videos</a></li>
          <li><a href="?lagc=com_noticias">Noticias</a></li>
        </ul>
      </div>
      <div class="col_w300">
        <h4>Mas Sobre Lagc Per</h4>
        <p><strong>Lagc Per</strong> es un CMS (Gestor de contenidos) sistema web que podras manipular tu pagina web como mas te guste sin la necesidad de programar.</p>
        <div class="btn_more"><a href="?lagc=com_blog&id=1&categoria=lagc-peru">Leer mas... <span></span></a></div>
      </div>
      <div class="cleaner"></div>
    </div>
    <div id="templatemo_copyright"> Copyright  2011 <a href=".">Lagc Per</a> | Arequipa, Per</div>
    <div class="cleaner"></div>
  </div>
</div>
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
</body>
</html>