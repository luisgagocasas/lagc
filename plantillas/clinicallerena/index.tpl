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
<link href="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->estilos; ?>.css" rel="stylesheet" type="text/css">
<script src="plantillas/<?php echo $config->lagctemplsite."/".$plantilla->scriscroll; ?>.js" type="text/javascript"></script>
</head>
<body>
<div class="pagina">
  <div align="right" style="background:url(plantillas/clinicallerena/imagenes/img1.gif) no-repeat; padding:0px 15px;">
    <table width="600" height="24" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="separador"><a href=".">Inicio</a></td>
        <td class="separador"><a href="#">Mapa de Sitio</a></td>
        <td class="separador"><a href="?lagc=com_contenidos&id=12&ver=sugerencias">Sugerencias</a></td>
        <td class="separador"><a href="?lagc=com_contactenos&id=1&ver=contactenos">Contacto</a></td>
        <td class="separador"><a href="http://correo.labllerenaames.com" target="_blank">Correo</a></td>
        <td></td>
        <td align="center"><form action="" method="post">
            <input name="texto" type="text" style="background:url(plantillas/clinicallerena/imagenes/buscar.jpg) no-repeat; padding:2px 10px; border:none;" size="15" />
            <input name="buscar" type="image" src="plantillas/clinicallerena/imagenes/lupa.jpg" />
          </form></td>
      </tr>
    </table>
  </div>
  <div style="background:url(plantillas/clinicallerena/imagenes/img2.gif) repeat-y;">
    <table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><img src="plantillas/clinicallerena/imagenes/f1.jpg" width="147" height="123" /></td>
        <td align="center"><img src="plantillas/clinicallerena/imagenes/laboratorioLlerena-logo.jpg" width="592" height="127" /></td>
        <td align="center"><img src="plantillas/clinicallerena/imagenes/f2.jpg" width="126" height="126" /></td>
      </tr>
    </table>
    <table width="100%" height="35" border="0" align="center" cellpadding="0" cellspacing="0" id="menu">
      <tr>
        <td width="23%"></td>
        <td width="68%" align="center">
        <ul>
            <?php echo Componente::MenusContenido('cabecera', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?>
        </ul>
        </td>
        <td width="9%"></td>
      </tr>
    </table>
    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="265" rowspan="3" valign="top"><br />
          <div class="menu_title">especialidades</div>
          <div id="menuh">
            <ul>
              <?php echo Componente::MenusContenido('izquierda', 'li', '10', 'primero', $_GET['id'], $_GET['ver']); ?>
            </ul>
          </div></td>
        <td width="512" height="400" valign="top"><div id="gran-conten" style="overflow:scroll; width:500px; height:400px; overflow-x: hidden; overflow-y: auto; border:0px;" class="flexcroll"> <?php echo Componente::Mostrar(); ?> </div></td>
        <td width="10" rowspan="3" valign="top"><img src="plantillas/clinicallerena/imagenes/linea-vertical-naranja.jpg" width="4" height="332" /></td>
        <td width="163" rowspan="3" valign="top"><div class="medio-titulo">Visita Nuestro Facebook</div>
          <div class="medio-conten">
            <p align="center"><a href="http://www.minsa.gob.pe/" target="_blank"><img src="plantillas/clinicallerena/imagenes/f.jpg" width="55" height="55" border="0" /></a></p>
          </div>
          <p align="center"><img src="plantillas/clinicallerena/imagenes/minsa.jpg" width="140" height="66" /></p>
          <div class="medio-titulo">Nuestra Ubicacion</div>
          <div class="medio-conten">
            <p align="center"><img src="plantillas/clinicallerena/imagenes/map.jpg" width="148" height="100" /></p>
          </div></td>
      </tr>
      <tr>
        <td valign="top"><br />
          <div class="footer">Av. Cayma Nº 730 - Edificio Scotiabank<br />
            Telf. 259269 - 255232 </div></td>
      </tr>
    </table>
  </div>
  <div style="background:url(plantillas/clinicallerena/imagenes/img3.gif) no-repeat; width:1000px; height:35px;"> </div>
  <div style="color:#FFF; float:right; position:relative; font-size:13px;">&copy; <a href="http://www.grupoinnovaperu.com" target="_blank" style="color:#FFF; text-decoration:none;">Grupo Innova Per&uacute;</a></div>
</div>
</body>
</html>