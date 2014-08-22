<?php
class Img{
	function Inicio(){ $tipos = array ("png","gif","jpg","jpeg","JPG"); ini_set('memory_limit', '300M');
		if (empty($_FILES['archivos']['size'])) { ?>
        <div class="ruta-imagenes">
        <h3>Cargar imagen al servidor</h3>
        <form name="frmimg" method="post" enctype="multipart/form-data" action="">
        	<input type="file" name="archivos" />
            <input type="submit" value="Guardar" id="envia" name="envia" class="form-guardar">
        </form>
		</div>
			<?php
		}
		else {
			if(!empty($_FILES['archivos']) && $_FILES['archivos']['error'] == UPLOAD_ERR_OK) {
				$image = new ModifiedImage($_FILES['archivos']['tmp_name'], true);
				$image->resizeToWidth($image->getWidth());
				$tipofin = substr($_FILES['archivos']['name'], -3);
				$nombrefinal = time();
				$original = "../componentes/com_imagenes/imagenes/".$nombrefinal.".".$tipofin;
				$image->save($original);
				
				if($image->getWidth() > 200){
					$image->resizeToWidth(200);
					$thumbnails = "../componentes/com_imagenes/thumbnails/".$nombrefinal.".".$tipofin;
					$image->save($thumbnails);
				}
				?>
                <h2>Imagen grabada:</h2><br />
                <img src="<?=$thumbnails; ?>" />
                <?php
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_imagenes&selec=".$nombrefinal.".".$tipofin."'\", 1000) </script>";
			}
		}
		?>
        <link href="componentes/com_imagenes/estilos.css" rel="stylesheet" type="text/css">
        <h2>Imagenes en el servidor</h2>
		<style type="text/css">
            html, body { height: 100%; overflow: hidden; width: 100%; margin: 0; padding: 0; }
            body { overflow-y: auto; }
            .lightbox { left: -999em; position: absolute; }
            .lightbox { left: -999em; position: absolute; }
            .lightbox:target { bottom: 0; left: 0; right: 0; top: 0; position: absolute; }
            .lightbox:target .close a { background: rgba(0, 0, 0, 0.75); bottom: 0; left: 0; right: 0; top: 0; position: absolute; z-index: 999; }
            .close span { color: #FFFFFF; font-size: 2em; text-indent: 0; position: absolute; right: 0.5em; top: 0.5em; }
            .close {text-indent: -999em;}
            .lightbox:target div { background: #FFFFFF; text-align:left; padding:10px 10px; position: absolute; left: 50%; top: 50%; z-index: 9999; }
            .w60p { margin-left: -30%; width: 60%; } .w300 { margin-left: -150px; width: 300px; } .w640 { margin-left: -320px; width: 640px; }
            .h60 { height: 60px; margin-top: -30px; } .h400 { height: 400px; margin-top: -200px; } .h386 { height: 386px; margin-top: -193px; }
            .scroll { overflow-y: scroll; padding: 0 1em; }
            .boxfocus { bottom: 0; left: 0; right: 0; top: 0; position: absolute; }
            .boxfocus div {	background: #FFFFFF; position: absolute; left: 50%; top: 50%; z-index: 99; }
            .boxfocus .close a { bottom: 0; left: 0; right: 0; top: 0; position: absolute; z-index: 1; }
        </style>
        <script type="text/javascript">
        <!--
            /*@cc_on @if (@_jscript_version > 5.6)
            function bootup(){
                var tds = document.getElementsByTagName("a"); lightbox();
                for( var x=0; x < tds.length; x++ ){tds[x].onclick = function(){setTimeout(lightbox, 1);};}
            }
            function lightbox(){
                var counted = document.getElementsByTagName("div");
                for( var x=0; x < counted.length; x++ ){ if ( counted[x].className == "boxfocus" ) { counted[x].className = "lightbox"; } }
                if (location.hash.substr(1) == "") {} else { document.getElementById(location.hash.substr(1)).className = "boxfocus"; }
            }
            window.onload=bootup;
            @end @*/
        // -->
        </script>
        <?php echo Img::listar_ficheros($tipos, "../componentes/com_imagenes/imagenes", 8); ?>
        <?php
	}
	function listar_ficheros($tipos, $carpeta, $imgw){ ?>
		<?php
		//Comprobamos que la carpeta existe
		if (is_dir($carpeta)){
			//Escaneamos la carpeta usando scandir
			$scanarray = scandir($carpeta);
			echo "<div class=\"cont-total\">\n";
			echo "<table width=\"1000\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\"><tr>\n";
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
							echo "<div class=\"cont-imagen-espacio\"".Img::__VerUltimaIMgCss($_GET['selec'],$scanarray[$i]).">";
							echo "<a href=\"#".LGlobal::Url_Amigable($scanarray[$i])."\"><img src=\"".$carpeta."/".$scanarray[$i]."\" width=\"".Img::__TamaniosImg($carpeta."/".$scanarray[$i])."\" border=\"0\"></a>";
							echo "</div>\n";
							echo "<div class=\"lightbox\" id=\"".LGlobal::Url_Amigable($scanarray[$i])."\"><div class=\"w300 h386 scroll\">\n";
							echo "<center><h2>".$scanarray[$i]."</h2></center><br>";
							echo "<u>Tamaños:</u> ".$arraysize[0]." x ".$arraysize[1]." px<br>";
							echo "<u>Imagen:</u> <img src=\"".$carpeta."/".$scanarray[$i]."\" width=\"".Img::__TamaniosImg($carpeta."/".$scanarray[$i])."\" border=\"0\">";
							echo "<br><br><u>Imagen con html</u><br><textarea cols=\"33\" rows=\"4\" readonly=\"readonly\"><img src=\"".Img::__AreglarUrlImg($carpeta."/".$scanarray[$i])."\" border=\"0\"></textarea>";
							echo "<br><br><u>Url de Imagen</u><br><textarea cols=\"33\" rows=\"4\" readonly=\"readonly\">".Img::__AreglarUrlImg($carpeta."/".$scanarray[$i])."</textarea>";
							echo "<br><br><u>Imagen con enlace en html</u><br><textarea cols=\"33\" rows=\"7\" readonly=\"readonly\"><a href=\"".Img::__AreglarUrlImg($carpeta."/".$scanarray[$i])."\" target=\"_blank\"><img src=\"".Img::__AreglarUrlImg($carpeta."/".$scanarray[$i])."\" border=\"0\"></a></textarea>";
							echo "<br><br><a href=\"?lagc=com_imagenes&img=".$scanarray[$i]."&borrar_img=".$carpeta."/".$scanarray[$i]."\"><center><h4>borrar</h4></center></a><br><br>";
							echo "\n</div><p class=\"close\"><a href=\"#\" title=\"Clic para cerrar\">Cerrar<span>X</span></a></p></div>\n";
							$contador++;
							echo "</td>\n";
						}
					}
				}
				
			}
			echo "</tr></table>\n";
			echo "</div>";
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
		if($valor==$valor1){ $end = "id=\"ultimaimg\""; }
		return $end;
	}
	function BorrarImg($nombre, $rutac){
		unlink($rutac);
		unlink("../componentes/com_imagenes/thumbnails/".$nombre);
		echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_imagenes'\", 1000) </script>";
		echo "<br><br><center><h2>".$nombre."</h2><h3>Fue borrado correctamente.</h3></center>";
	}
}
?>