<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<base href="<?=$config->lagcurl; ?>" target="_parent">
<link rel="shortcut icon" href="favicon.ico">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?=$config->lagcdescription; ?>">
<meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="Lagc Peru">
<meta name="author" content="<?=$config->lagcnombre; ?>">
<link href="plantillas/<?php echo $config->lagctemplsite; ?>/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plantillas/<?php echo $config->lagctemplsite; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="plantillas/<?php echo $config->lagctemplsite; ?>/css/slimbox2.css" type="text/css" media="screen" />
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.min.js"></script>
<script type="text/JavaScript" src="plantillas/<?php echo $config->lagctemplsite; ?>/js/slimbox2.js"></script>
<script src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/tabber.js"></script>
<script src="plantillas/<?php echo $config->lagctemplsite; ?>/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'fold',
		slices:15,
		animSpeed:500,
		pauseTime:6000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, 
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.5, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<script type="text/javascript">
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
<!--
============================================
Soporte: info@lagc-peru.com
============================================
-->
</head>
<body>
<div class="contenedorg">
  <div class="cabecera">
    <table width="1000" border="0">
      <tr>
        <td><div class="logo"></div></td>
        <td><div id="slider_wrapper">
            <div id="slider">
            <a><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/banner3.png" alt="01" /></a>
            <a><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/banner1.jpg" alt="02" /></a>
            <a><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/slideshow/banner2.jpg" alt="03" /></a>
            </div>
          </div></td>
      </tr>
    </table>
    <div class="linea"></div>
    <?php $LagcPeru->Modulos("menuprincipal"); ?>
  </div>
  <table width="980" border="0" align="center">
    <tr>
      <td valign="top">
      <div class="contenido-lagc">
      <?=Componente::Mostrar(); ?>
      </div>
      </td>
      <td width="300" valign="top"><br />
        <br />
        <table align="center">
          <tr>
            <td align="center"><?php $LagcPeru->Modulos("derecho1"); ?>
              <br /><br /><br /><br />
              <a href="http://www.youtube.com/user/agroindustriacorasil" target="_blank" title="Youtube"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/redes-sociales1.png" border="0" /></a><br />
              <br />
              <br />
              <a href="http://www.facebook.com/profile.php?id=100002913630515" target="_blank" title="Facebook"><img src="plantillas/<?php echo $config->lagctemplsite; ?>/imagenes/redes-sociales2.png" border="0" /></a><br />
              <br />
              <br />
              <br />
              <br /></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <div style="text-align:right; margin: 0px 225px;">
<?
// Archivo en donde se acumulará el numero de visitas
$archivo = "contador.txt";
// Abrimos el archivo para solamente leerlo (r de read)
$abre = fopen($archivo, "r");
// Leemos el contenido del archivo
$total = fread($abre, filesize($archivo));
// Cerramos la conexión al archivo
fclose($abre);
// Abrimos nuevamente el archivo
$abre = fopen($archivo, "w");
// Sumamos 1 nueva visita
$total = $total + 1;
// Y reemplazamos por la nueva cantidad de visitas 
$grabar = fwrite($abre, $total);
// Cerramos la conexión al archivo
fclose($abre);
// Imprimimos el total de visitas dándole un formato
echo "<span class=\"contador\">N&deg; Visitas:</span> <span class=\"contador-numeros\">".$total."</span>";
?>
</div>
</div>
<table align="center">
  <tr>
    <td align="center"><div class="piepagina"> HORACIO PATI&Ntilde;O 306 J L BUSTAMANTE Y RIVERO - AREQUIPA FONO:772145 / 981739347 </div></td>
  </tr>
</table>
</body>
</html>