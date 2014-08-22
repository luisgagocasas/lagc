<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php Componente::CompoTitulo($_GET['lagc']); ?></title>
<meta http-equiv="content-language" content="es">
<link rel="shortcut icon" href="favicon.ico">
<meta name="language" content="es">
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="<?php echo $config->lagcgenerator; ?>">
<meta name="author" content="Luis Gago - webmater@portuhermana.com">
<meta name="google-site-verification" content="<?php echo $config->lagcanalytics; ?>">
<meta name="copyright" content="© 2011 Grupo Innova Perú">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate" />
<link href="plantillas/gip/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="principal">
<div class="principal1">
  <div class="fondoverde">
    <div class="textofondoverde"></div>
  </div>
  <div class="logo"></div>
  <!--<ul id="menuh">
  	<li><a href=".">Inicio</a></li>
    <?php echo Componente::MenusContenido('cabecera', 'li', '5', 'primero', $_GET['id'], $_GET['ver']); ?>
  </ul>-->
</div>
<div class="principal2">
<div class="principal2-1"><?php echo Componente::Mostrar(); ?></div>

<div class="principal2-2">
  <div class="principal2-2-1">
    <p class="textonotas">Gran experiencia nos avala,<br/>
      m&aacute;s de 2 a&ntilde;os trabajando <br/>
      en la comunicaci&oacute;n y el<br/>
      dise&ntilde;o de paginas web.</p>
  </div>
  <div class="principal2-2-2">
    <p class="textonotas"> Dise&ntilde;o web de &uacute;ltima <br/>
      generaci&oacute;n 2.0,desarrollo<br/>
      interactivo y exclusivo, <br/>
      P&aacute;ginas web perfectas. </p>
  </div>
  <div class="principal2-2-3">
    <p class="textonotas"> Dise&ntilde;o web rentable,<br/>
      optimizado para buscadores,<br/>
      triplique sus ingresos <br/>
      con sus p&aacute;ginas web.</p>
  </div>
</div>
</div>
<div class="principal3">
  <p class="piedepagina">Todos los Derechos Reservados - Grupo Innova Per&uacute;<br/>
   &copy; Copyright 2010 - 2011<br/>
    Email : info@grupoinnovaperu.com - Telf : 231782 - Dirrecci&oacute;n : Calle Nueva #209 2do piso int. 222</p>
</div>
</div>
</body></html>