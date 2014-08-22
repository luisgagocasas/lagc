<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="es" />
<title><?php Componente::CompoTitulo($_GET['lagc']); ?></title>
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="© 2011 Lagc Perú">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate">
<base href="<?php echo $config->lagcurl; ?>" target="_parent">
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<!--
Lagc Perú -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com
-->
</head>
<body>
<table width="810" border="0" align="center">
  <tr>
    <td><div class="logo"></div></td>
  </tr>
  <tr>
    <td>
    <div class="fondocont"><?php echo Componente::Mostrar(); ?></div>
    <div class="footertext" style="float:left;">Calle Abelardo Quiñones, F-22 - Urb. Los Cedros yanahuara - Arequipa</div> 
    <div class="footertext" style="float:right;"> Tlf.(054) 25-9393</div>
    </td>
  </tr>
</table>
</body>
</html>