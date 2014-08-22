<?php
require ("../../administrador/configuracion.lagc.php");
require "../com_sistema/class.componentes.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
$config = new LagcConfig(); //Conexion
$login = new Login();
class Img{
	function Inicio(){ $tipos = array ("png","gif","jpg","jpeg","JPG"); ?>
    <link href="../../administrador/componentes/com_imagenes/estilos.css" rel="stylesheet" type="text/css">
        <div class="ruta-imagenespo">
        <form name="selecimg" method="post">
        <table>
        <tr>
        <td align="left"><img src="" name="imgpreviw" width="60" border="0" /></td>
        <td align="right"><input type="text" name="url<?=$_GET['lagc']; ?>" value="" size="50"><input type="button" value="Usar Imagen" onClick="Ventana<?=$_GET['lagc']; ?>()"></td>
        </tr>
        </table>
        </form>
        </div>
        <div class="ruta-imagenespo">
        <table border="0">
        <tr>
        <?php if (empty($_FILES['archivos']['size'])) { ?>
        <h3>Cargar imagen al servidor</h3>
        <td>
        <form name="frmimg" method="post" enctype="multipart/form-data" action="">
        	<input type="file" name="archivos" />
            <input type="submit" value="Guardar" id="envia" name="envia" class="form-guardar">
        </form>
        </td>
			<?php
		}
		else {
			if(!empty($_FILES['archivos']) && $_FILES['archivos']['error'] == UPLOAD_ERR_OK) {
				$image = new ModifiedImage($_FILES['archivos']['tmp_name'], true);
				$image->resizeToWidth($image->getWidth());
				$tipofin = substr($_FILES['archivos']['name'], -3);
				$nombrefinal = time();
				
				$original = "imagenes/".$_COOKIE["usuario_lagc"]."/".$nombrefinal.".".$tipofin;
				$image->save($original);
				
				
				if($image->getWidth() > $_GET['thumwidth']){
					$image->resizeToWidth($_GET['thumwidth']);
					$thumbnails = "thumbnails/".$_COOKIE["usuario_lagc"]."/".$nombrefinal.".".$tipofin;
					$image->save($thumbnails);
				}
				?>
                <td>
                <h2>Imagen grabada:</h2><br />
                <img src="<?=$thumbnails; ?>" />
                <a href="<?=$original;?>" target="_blank">Ver Original</a>
                </td>
                <?php
echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='class.upload.php?lagc=".$_GET['lagc']."&selec=".$nombrefinal.".".$tipofin."'\", 1000) </script>";
			}
		}
		?>
        </tr>
        </table>
        </div>
        <h2>Imagenes en el servidor de : <em><?=$_COOKIE["usuario_lagc"]; ?></em></h2>
        <?=Img::listar_ficheros($tipos, "imagenes/".$_COOKIE["usuario_lagc"]."/", 4);
	}
	function listar_ficheros($tipos, $carpeta, $imgw){
		//Comprobamos que la carpeta existe
		if (is_dir($carpeta)){
			//Escaneamos la carpeta usando scandir
			$scanarray = scandir($carpeta);
			echo "<form name=\"subirimagen\" action=\"javascript:Ventana".$_GET['lagc']."();\">";
			echo "<div class=\"cont-totalpo\">\n";
			echo "<table width=\"400\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\" align=\"center\"><tr>\n";
			$contador = 1;
			for ($i = 0; $i < count ($scanarray); $i++){
				//Eliminamos  "." and ".." del listado de ficheros
				if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
					//No mostramos los subdirectorios
					if (is_file($carpeta . "/" . $scanarray[$i])){
						//Verificamos que la extension se encuentre en $tipos
						$thepath = pathinfo($carpeta . "/" . $scanarray[$i]);
						//add variables
						$arraysize = getimagesize($carpeta."/".$scanarray[$i]);
						//fin
						if (in_array ($thepath['extension'], $tipos)){
							//
							if ($contador > $imgw) {
								echo "</tr>\n<tr>\n";
								$contador = 1;
							}
							echo "<td align=\"center\" valign=\"middle\">\n";
							//
							echo "<div class=\"cont-imagen-espaciopo\"".Img::__VerUltimaIMgCss($_GET['selec'],$scanarray[$i]).">";
							echo "<a href=\"#\" onClick=\"insertImg('".$_COOKIE["usuario_lagc"]."/$scanarray[$i]')\"><img src=\"".$carpeta."".$scanarray[$i]."\" width=\"".Img::__TamaniosImg($carpeta."/".$scanarray[$i])."\" border=\"0\"></a>";
							echo "</div>\n";
							$contador++;
							echo "</td>\n";
						}
					}
				}
				
			}
			echo "</tr></table>\n";
			echo "</div>";
			echo "</form>";
		} else {
			echo "La carpeta no existe";
		}
	}
	function __TamaniosImg($ruta){
		$rutafinal = getimagesize($ruta);
		if ($rutafinal[0]>'95') { $width = '95'; }
		else { $width = $rutafinal[0]; }
		return $width;
	}
	function __AreglarUrlImg($ruta){
		$config = new LagcConfig();
		$rutafinal = substr($ruta, 3);
		$rutafinal = $config->lagcurl.$rutafinal;
		return $rutafinal;
	}
	function __VerUltimaIMgCss($valor,$valor1){
		if($valor==$valor1){
			$end = "id=\"ultimaimg\"";
		}
		return $end;
	}
}
?>
<?php
if (!$login->Check()) { echo "no debes estar aqui"; die(); } ini_set('memory_limit', '300M'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subir Imagenes - <?=$_GET['lagc']; ?> - <?=$config->lagcnombre; ?></title>
<script type="application/x-javascript"> 
function Ventana<?=$_GET['lagc']; ?>(){ window.opener.Campo<?=$_GET['lagc']; ?>(document.selecimg.url<?=$_GET['lagc']; ?>.value); setTimeout(window.close, 0); }
function centrar() {
    iz=(screen.width-document.body.clientWidth)/2;
    de=(screen.height-document.body.clientHeight)/2;
    moveTo(iz,de);
}
function insertImg($valor){
	document.selecimg.url<?=$_GET['lagc']; ?>.value = $valor;
	document.selecimg.imgpreviw.src = 'imagenes/'+$valor;
}
</script>
</head>
<body onLoad="centrar()">
<?php
if(!is_dir("imagenes/".$_COOKIE["usuario_lagc"]) and !is_dir("thumbnails/".$_COOKIE["usuario_lagc"])) {
	if(mkdir("imagenes/".$_COOKIE["usuario_lagc"]) and mkdir("thumbnails/".$_COOKIE["usuario_lagc"])){
		echo "Directorio Creado!";
	}
}
?>
<?php Img::Inicio(); ?>
</body>
</html>