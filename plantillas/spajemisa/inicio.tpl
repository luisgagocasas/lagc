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
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css"></script>
</head>
<body>
<br /><br />
<table width="900" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td>
    <div class="pagina">
    <div class="title">www.escuelaspajemisa.com</div>
    <div class="logo">Escuela Talleres<br />Spa Jemisa</div>
    <div class="menu"><a href=".">Inicio</a></div>
    <div class="menu"><a href="?lagc=com_contactenos&id=1&ver=contactenos">Contactenos</a></div>
    <div class="contenido">
    <?php echo Componente::Mostrar(); ?>
    </div>
    <div class="pie">
    Calle Cruz Verde 222 - Cercado<br />
    Telf. 211801 / 959899220
    </div>
    </div>
    </td>
  </tr>
</table>
</body>
</html>