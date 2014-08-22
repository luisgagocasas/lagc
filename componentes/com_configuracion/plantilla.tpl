<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$titulo; ?> - Instalador de Lagc Perú</title>
<link href="componentes/com_configuracion/estilos.css" rel="stylesheet" type="text/css" />
<script type="application/javascript">
function oculta(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='none';
}
function muestra(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='block';
} 
</script>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td colspan="2" valign="top" class="titulosup"><h2><?=$titulo; ?></h2></td>
  </tr>
  <tr>
    <td width="200" valign="top" class="ladoiz">
    <ul>
    	<?=$menu; ?>
    </ul>
    </td>
    <td width="590" valign="top" class="lg-instalador-aviso">
    <?php if ($_GET['lg']=="finalizar") { echo $contenido; }
    else { InstaladorLG::__Formulario(); } ?><br />
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top" class="piepagina" align="center">
    &copy; <a href="http://www.lagc-peru.com/" target="_blank">Lagc Perú</a>
    <div style="float:right;">
    2011
    </div>
    </td>
  </tr>
</table>
</body>
</html>