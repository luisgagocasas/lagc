<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?php Componente::CompoTitulo($_GET['lagc']); ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es">
<link rel="shortcut icon" href="favicon.ico">
<meta name="language" content="es">
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="google-site-verification" content="<?php echo $config->lagcanalytics; ?>">
<meta name="copyright" content="© 2011 Grupo Innova Perú">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate" />
<script src="swfobject.js" type="text/javascript"></script>
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<script src="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->scrol; ?>.js" type="text/javascript"></script>
</head>
<body>
<div id="main">
  <div id="cabeza"></div>
  <div id="contenido">
    <div id="bartitulo">
      <div id="titulo"> <a href="."><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/boutiquedelMueble_r3_c2_r2_c2.jpg" border="0"></a> </div>
      <div id="icono"></div>
      <div id="facebook"><a href="#"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/boutiquedelMueble_r3_c2_r2_c6.jpg" /></a> </div>
    </div>
    <div id="linea"></div>
    <div id="centro" style="overflow:scroll; overflow-x: hidden; overflow-y: auto; border:0px;" class="flexcroll"> <?php echo Componente::Mostrar(); ?> </div>
    <div id="menu">
      <table align="center" cellpadding="5">
        <tr>
          <td align="right"><a href="?lagc=com_contenidos&id=1&ver=quienes-somos"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icono_r2_c2.jpg" border="0"/></a></td>
          <td align="left"><a href="?lagc=com_contenidos&id=1&ver=quienes-somos">Quienes Somos</a></td>
          <td align="right"><a href="?lagc=com_contenidos&id=2&ver=productos"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icono_r2_c4.jpg" border="0"/></a></td>
          <td align="left"><a href="?lagc=com_contenidos&id=2&ver=productos">Productos</a></td>
          <td align="right"><a href="?lagc=com_contenidos&id=3&ver=novedades"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icono_r2_c6.jpg" border="0"/></a></td>
          <td align="left"><a href="?lagc=com_contenidos&id=3&ver=novedades">Novedades</a></td>
          <td align="center"><a href="?lagc=com_contenidos&id=4&ver=distribuidores"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icono_r2_c8.jpg" border="0"/></a></td>
          <td align="left"><a href="?lagc=com_contenidos&id=4&ver=distribuidores">Distribuidores</a></td>
          <td align="right"><a href="?lagc=com_contactenos&id=1&ver=contactenos"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/icono_r2_c10.jpg" border="0"/></a></td>
          <td align="left"><a href="?lagc=com_contactenos&id=1&ver=contactenos">Contactenos</a></td>
        </tr>
      </table>
    </div>
    <div id="footer" style="text-align:center;">
      <p><strong>Direcci&oacute;n:</strong> Abelardo Quiñones F-22 - Los Cedros - Yanahuara<br />
      Arequipa - Peru<br />
      Teléfonos (054) 25-9393 – (054) 9910000 - (01) 94067830 - Nextel 406*7830</p>
      </div>
  </div>
  <div style="color:#000; position:relative; float:right; font-size:13px;">&copy; <a href="http://www.grupoinnovaperu.com" target="_blank" style="color:#000; text-decoration:none;">Grupo Innova Per&uacute;</a></div>
</div>
</body>
</html>