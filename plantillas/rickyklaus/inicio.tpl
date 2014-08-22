<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="es" />
<title><?php Componente::CompoTitulo($_GET['lagc']); ?></title>
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="favicon.ico">
<?php echo Componente::CompoKeywords($_GET['lagc'],$_GET['id']); ?>
<meta name="description" content="<?php echo $config->lagcdescription; ?>">
<meta name="generator" content="Lagc Perú v.<?php echo base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="© 2011 Lagc Perú">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate">
<base href="<?php echo $config->lagcurl; ?>" target="_parent">
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="plantillas/<?php echo $config->lagctemplsite; ?>/swfobject.js"></script>
<script src="plantillas/<?php echo $config->lagctemplsite; ?>/flexcroll.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="shadowbox.js"></script>
<script type="text/javascript"> Shadowbox.init({ language: "es", players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'] }); </script>
<!--
Lagc Perú -> Es Creado por: Luis Gago Casas
Contacto a webmaster@portuhermana.com
-->
</head>
<body>
<table width="1000" border="0" align="center">
  <tr>
    <td align="center"><div class="cabecerafondosup"></div>
      <div style="position: relative; top: -48px; left: -30px; z-index:1;">
        <object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,32,18" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" type="application/x-shockwave-flash" height="100" width="960" style="z-index:1;">
          <param name="allowScriptAccess" value="sameDomain" />
          <param name="allowFullScreen" value="false" />
          <param name="quality" value="high" />
          <param name="wmode" value="transparent" />
          <param name="meru" value="false" />
          <param name="src" value="menu.swf" />
          <embed height="100" width="960" src="menu.swf" meru="false" wmode="transparent" quality="high" allowfullscreen="false" allowscriptaccess="sameDomain" type="application/x-shockwave-flash"></embed>
        </object>
      </div>
      <div class="cabecerafondo"></div>
      <div style="position: relative; right: 30px; top: -98px; margin: -68px 0px; float: right; z-index: 0;">
      <div id="flashcontent">
		<script type="text/javascript">
			var so = new SWFObject("banner.swf", "mymovie", "356", "262", "8");
			so.addParam("menu", "false");
			so.addParam("wmode", "transparent");
			so.write("flashcontent");
		</script>
      </div>
      </div>
      </td>
  </tr>
  <tr>
    <td align="center" valign="top"><div class="contenedor">
    <div style="padding:0px 6px; margin:15px 0px; width:790px; height:470px; overflow:scroll; overflow-x: hidden; overflow-y: auto; border:0px;" class="flexcroll">
    <?php echo Componente::Mostrar(); ?></div>
    <br /><br /><br /><br /></div></td>
  </tr>
  <tr>
  <td align="center">
  <div class="contenedor">
  <center>
  <a href="plantillas/rickyklaus/footer/00002.jpg" title="Algodón de Azucar" rel="shadowbox[0]"><img src="plantillas/rickyklaus/footer/bottom_algodon.png" class="footerimg" border="0" /></a>
  <a href="plantillas/rickyklaus/footer/00001.jpg" title="Queso Helado Arequipeño" rel="shadowbox[0]"><img src="plantillas/rickyklaus/footer/bottom_helado.png" class="footerimg" border="0" /></a>
  <a href="plantillas/rickyklaus/footer/00003.jpg" title="Pop Corn" rel="shadowbox[0]"><img src="plantillas/rickyklaus/footer/bottom_popcorn.png" class="footerimg" border="0" /></a>
  <a href="plantillas/rickyklaus/footer/00004.jpg" title="Sandwich a la Parrilla" rel="shadowbox[0]"><img src="plantillas/rickyklaus/footer/bottom_sandwich.png" class="footerimg" border="0" /></a>
  </center>
  <br /><br /><br /></div></td>
  </tr>
  <tr>
    <td align="center"><div class="footer"></div></td>
  </tr>
</table>
</body>
</html>