<?php
class Plantillas{
	function Inicio(){
		echo "";
	}
	function Plantilla(){
		if (empty($_POST['contenido'])) {
			require "../../componentes/com_sistema/function.globales.php";
			LGlobal::EditorCodigo('contenido', 'html', '../../');
			$archivo = "../../".$_GET['ruta']."/".$_GET['plantillas-ver'];
			if($fp = fopen($archivo, "r")){ $data = fread($fp, filesize($archivo)); fclose($fp); }
			else { $data = ""; echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
			?>
            <h2>Editando: <?=$_GET['ruta']."/".$_GET['plantillas-ver']; ?></h2>
            <form name="formarchivo" action="" method="post">
            <input type="hidden" value="<?=$archivo; ?>" name="url" />
            <table width="100%" border="0" align="center">
            <tr>
            <td align="center" valign="top">
            <textarea name="contenido" id="contenido" cols="91" rows="30" readonly="readonly"><?php $archivos = str_replace('<', "&lt;", $data); echo $archivos; ?></textarea>
            </td>
            </tr>
            <tr>
            <td align="center" valign="top">
            <input type="button" value="Cancelar" onClick="window.close();" class="form-cancel">
            <input type="reset" name="Reset" value="Restablecer" class="form-reset">
            <input type="submit" value="Guardar" class="form-guardar">
            </td>
            </tr>
            </table>
            </form><?php
		}
		else {
			$newdata = $_POST['contenido'];
			if(@$fp = fopen($_POST['url'], "w")){
				fwrite($fp, stripslashes($newdata));
				fclose($fp);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.close()\", 2000) </script>";
				echo "<center><h3>".$_POST['url'].".</h3><h2>Se guardo correctamente...</h2></center>";
			 }
			 else {
				 echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
			 }
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editor de archivos</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../plantillas/lagc-peru/css/screen.css" type="text/css" media="screen" title="default" />
</head>
<body>
<?php
if (!empty($_COOKIE["username"])) {
	if (!isset($_GET['plantillas-ver'])) { Plantillas::Inicio(); }
	if(isset($_GET['plantillas-ver']) && $_GET['ruta']) { Plantillas::Plantilla(); }
}
else {
	echo "<center><h2>no debes estar aqui</h2></center>";
}
?>
</body>
</html>