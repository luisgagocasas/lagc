<?php
class Plantillas{
	function Inicio(){ ?><br />
    <table align="center" width="100%">
    <tr>
    <td align="left"><h2>Plantillas Administrador</h2></td>
    </tr>
    <tr>
    <td align="left" valign="top">
    <table cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Creador</a></th>
        <th class="table-header-repeat line-left"><a href="">Ruta</a></th>
        <th class="table-header-repeat line-left"><a href="">Logo</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
      <?php
	  if($gestor=opendir('plantillas')) {
		  while (($archivo=readdir($gestor))!==false) {
			  $c=0;
			  if ((!is_file($archivo))and($archivo!='.')and($archivo!='..')) {
				  $c=$c+1; if($c%2==0) {
					  echo Plantillas::_Plantilla($archivo, "", $c, $archivo);
				  } else {
					  echo Plantillas::_Plantilla($archivo, "", $c, $archivo);
				  }
			  }
		  }
		  closedir($gestor);
	  }
	  ?>
    </table>
    </td>
    </tr>
    <tr>
    <td align="left"><h2>Plantillas del Sitio</h2></td>
    </tr>
    <td>
    <table cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Creador</a></th>
        <th class="table-header-repeat line-left"><a href="">Ruta</a></th>
        <th class="table-header-repeat line-left"><a href="">Logo</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
      <?php
	  if($gestor=opendir('../plantillas')) {
		  $c=0;
		  while (($archivo=readdir($gestor))!==false) {
			  if ((!is_file($archivo))and($archivo!='.')and($archivo!='..')) {
				  $c=$c+1; if($c%2==0) {
					  echo Plantillas::_Plantilla($archivo, "../", $c, $archivo);
				  } else {
					  echo Plantillas::_Plantilla($archivo, "../", $c, $archivo);
				  }
			  }
		  }
		  closedir($gestor);
	  }
	  ?>
    </table>
    </td>
    </tr>
    <tr>
    <td>
    <div id="message-yellow">
    <table border="0" width="700" cellpadding="0" cellspacing="0">
    <tr>
    <td class="yellow-left">
    <strong>Nota:</strong><br />Color verde: Plantilla usada actualmente</td>
    <td class="yellow-right"><a class="close-yellow"><img src="plantillas/lagc-peru/imagenes/table/icon_close_yellow.gif" /></a></td>
    </tr>
    </table>
    </div>
    </td>
    </tr>
    </table>
    <?php
	}
	function _Plantilla($ruta, $raiz, $row, $archivo){
		$configurapla = $raiz."plantillas/".$ruta."/config.xml";
		if (file_exists($configurapla)) {
			$plantillas = simplexml_load_file($configurapla);
			if($plantillas){
				foreach ($plantillas as $plantilla) {
					$rutaimg = $raiz."plantillas/".$ruta."/".$plantilla->imagen;
					if (file_exists($rutaimg)) { $enableimg=$raiz."plantillas/".$ruta."/".$plantilla->imagen; } else { $enableimg="componentes/com_plantillas/utilidades/sin_img.gif"; }
					echo "<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\">\n";
					echo "<td>".$row."</td>\n";
					echo "<td>".utf8_decode(substr($plantilla->nombre, 0, 30))."</td>\n";
					echo "<td>".$plantilla->creador."</td>\n";
					echo "<td>/".$archivo."/</td>";
					echo "<td><img src=\"".$enableimg."\" width=\"100\" border=\"0\"></td>\n";
					echo "<td><a href=\"?lagc=com_plantillas&plantillas=".$raiz."plantillas/".$archivo."&editar_plantilla=".LGlobal::Url_Amigable(utf8_decode($plantilla->nombre))."\" title=\"Editar\" class=\"icon-1 info-tooltip\"></a>
					<a href=\"\" title=\"Borrar\" class=\"icon-2 info-tooltip\"></a></td>";
					echo "</tr>";
				}
			} else { echo "<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\"><td>".$row."</td><td colspan=\"5\">Sintaxi XML inv&aacute;lida Revise el archivo \"plantillas/".$archivo."/config.xml</td></tr>\n"; }
		} else { echo "<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\"><td>".$row."</td><td colspan=\"5\">Error abriendo \"plantillas/".$archivo."/config.xml</td></tr>\n"; }
	}
	function Editar_Plantilla($ruta, $nombreget) {
		if (empty($_POST['contenido'])) {
			$configurapla = $ruta."/config.xml";
			if (file_exists($configurapla)) {
				$plantillas = simplexml_load_file($configurapla);
				if($plantillas){
					foreach ($plantillas as $plantilla) {
						$rutaimg = $ruta."/".$plantilla->imagen;
						$rutaarchivo = $ruta."/".$plantilla->archivo.".tpl";
						if (file_exists($rutaimg)) { $enableimg=$rutaimg; } else { $enableimg="componentes/com_plantillas/utilidades/sin_img.gif"; }
						if (file_exists($rutaarchivo)) { $artchivoplantilla=true; } else { $artchivoplantilla=false; }
						if ($artchivoplantilla==true and $nombreget==LGlobal::Url_Amigable(utf8_decode($plantilla->nombre))) {
							@include "componentes/com_plantillas/editar_plantilla.tpl";
						} else { echo "<br><center><h3>No existe la Plantilla<br>ó noce puede abrir el archivo</h3></center>"; }
					}
				} else { echo "Sintaxi XML inv&aacute;lida Revise el archivo ".$configurapla; }
			} else { echo "Error abriendo ".$configurapla; }
		}
		else {
			$newdata = $_POST['contenido'];
			if(@$fp = fopen($_POST['archivopla'], "w")){
				fwrite($fp, stripslashes($newdata));
				fclose($fp);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_plantillas'\", 1500) </script>";
				echo "<br><br><center><h3>".$_POST['nombreplan'].".</h3><h4>Se guardo correctamente...</h4></center>";
			 }
			 else {
				 echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
			 }
		}
	}
	function _ArchivosPlantilla($ruta, $rutaurlactual){
		$dir = (isset($_GET['dir']))?$_GET['dir']:$ruta;
		$directorio=opendir($dir);
		echo "<b>Directorio actual:</b><br>$dir<br>";
		echo "<b>Archivos:</b><br>";
		$cont = 0;
		while ($archivo = readdir($directorio)) {
			if($archivo=='.'){}
			else if($archivo=='..'){
				$carpetas = split("/",$dir);
				array_pop($carpetas);
				$dir2 = join("/",$carpetas);
				if ($ruta!=$dir){
					echo "<a href=\"".$rutaurlactual."&dir=$dir2\">$archivo</a><br>";
				}
			}
			elseif(is_dir("$dir/$archivo")) {
				echo "<div class=\"carpetasptl\">";
				echo "<a href=\"".$rutaurlactual."&dir=$dir/$archivo\">$archivo</a><br>";
				echo "</div>";
			}
			else {
				$tipos = array ("html","tpl","xml","css");
				$scanarray = scandir($dir);
				$thepath = pathinfo($dir . "/" . $scanarray[$cont]);
				if (in_array ($thepath['extension'], $tipos)){
					echo "<div class=\"archivosptl\">";
					echo "<a href=\"componentes/com_plantillas/ver-archivos.php?plantillas-ver=".$scanarray[$cont]."&ruta=".$ruta."\" onclick=\"NewWindow(this.href,'name','850','600','false'); return false\">".$scanarray[$cont]."</a><br>";
					echo "</div>";
				}
			}
			$cont++;
		}
		closedir($directorio);
	}
}
?>