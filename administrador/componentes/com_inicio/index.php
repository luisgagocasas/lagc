<?php
$configurapla = "componentes/com_inicio/config.xml";
if (file_exists($configurapla)) {
	$plantillas = simplexml_load_file($configurapla);
	if($plantillas){
		foreach ($plantillas as $plantilla) { ?>
        <center>
<table width="800" border="0" align="center">
  <tr>
    <td valign="top" align="center"><?php $archivos = "../componentes/com_inicio/".$plantilla->archivo.".tpl"; ?>
      <?php if (!isset($_POST['contenido'])) { ?>
      <?php if ($plantilla->tipo==2) { echo LGlobal::Editor(); } elseif ($plantilla->tipo==1) { LGlobal::EditorCodigo('contenido', $plantilla->lenguaje,''); }
	  if($fp = fopen($archivos, "r")){
		  $data = fread($fp, filesize($archivos));
		  fclose($fp);
	  } else {
		  $data = "";
		  echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
	  }
	  ?>
      <form name="conteinicio" action="" method="post">
        <fieldset>
          <legend><strong>Contenido</strong></legend>
          <textarea name="contenido" id="contenido" cols="80" rows="30"><?=$data; ?></textarea>
        </fieldset>
        <br />
        <br />
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_inicio'" class="form-cancel">
        <input type="reset" value="Restablecer" class="form-reset">
        <input type="submit" value="Guardar" class="form-guardar">
      </form>
      <?php }
      else{
		  $newdata = $_POST['contenido'];
		  if(@$fp = fopen($archivos, "w")){
			  fwrite($fp, stripslashes($newdata));
			  fclose($fp);
			  echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_inicio'\", 1500) </script>";
			  echo "Se guardo correctamente.<br><br>";
			  echo "<a href=\"?lagc=com_inicio\">< Regresar</a>";
		   }
		   else {
			   echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
		   }
      }
      ?></td>
    <td valign="top"><div id="related-activities">
        <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
        <div id="related-act-bottom">
          <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
            <div class="right">
            <h5>Habilitar</h5>
            <br />
            <?php if (!isset($_POST['archivo'])) { ?>
            <form name="config" action="" method="post">
              <ul class="greyarrow">
                <?php
				$lenguajes = array("html"=>"Html", "php"=>"Php", "css"=>"Css", "js"=>"Js", "xml"=>"Xml");
				$acti = array("1"=>"<li>Html:<input type=\"radio\" name=\"tipo\" checked=\"checked\" value=\"1\"></li><li>Editor:<input type=\"radio\" name=\"tipo\" value=\"2\"></li>", "2"=>"<li>Html:<input type=\"radio\" name=\"tipo\" value=\"1\"></li><li>Editor:<input type=\"radio\" name=\"tipo\" checked=\"checked\" value=\"2\"></li>");
				ksort($acti);
				foreach ($acti as $key => $val) {
					if ($plantilla->tipo==$key) {
						echo $val;
					}
				}
				?>
              </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Archivo:</h5>
                <br />
                <input name="archivo" type="text" style="text-align:right;" class="inp-form" value="<?=$plantilla->archivo; ?>" size="20">
                <br />
                <span style="color:#D2D2D2; font-size:11px;">Ejemplo: inicio.tpl</span> </div>
              <div class="clear"></div>
              <?php if ($plantilla->tipo==1) { ?>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Lenguaje:</h5>
                <select name="lenguaje" class="styledselect_form_2">
				<?php
                ksort($lenguajes);
                foreach ($lenguajes as $key => $val) {
                    if ($plantilla->lenguaje==$key) {
                        echo "<option value=\"$key\" selected>$val</option>"; }
                    else {
                        echo "<option value=\"$key\">$val</option>"; }
                }
                ?>
                </select>
              </div>
              <div class="clear"></div>
              <?php } else { ?>
              <input type="hidden" name="lenguaje" value="<?=$plantilla->lenguaje; ?>" />
              <?php } ?>
              <div class="lines-dotted-short"></div>
              <center>
                <input type="button" value="Cancelar" onclick="location.href='?lagc=com_inicio'" class="form-cancel">
                <input type="reset" value="Restablecer" class="form-reset">
                <input type="submit" value="Guardar" class="form-guardar">
              </center>
            </form>
            <?php
        }
        else{
		rename ("../componentes/com_inicio/".$plantilla->archivo.".tpl", "../componentes/com_inicio/".$_POST['archivo'].".tpl");
            // El contenido del archivo
            $archi = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $archi .= "<configuracion>\n";
            $archi .= "    <variables>\n";
            $archi .= "       <tipo>".$_POST['tipo']."</tipo>\n";
            $archi .= "       <archivo>".$_POST['archivo']."</archivo>\n";
			$archi .= "       <lenguaje>".$_POST['lenguaje']."</lenguaje>\n";
            $archi .= "    </variables>\n";
            $archi .= "</configuracion>";
            // Se abre el archivo (si no existe se crea)
            $archivo = fopen('componentes/com_inicio/config.xml', 'w');
            $error = 0;
            if (!isset($archivo)) {
                $error = 1;
                print "No se ha podido crear/abrir el archivo.<br />";
            }
            elseif (!fwrite($archivo, $archi)) {
                $error = 1;
                print "No se ha podido escribir en el archivo.<br />";
            }
            @fclose();
            if ($error == 0) {
                echo "Datos actualizados.<br />";
                echo "<a href=\"?lagc=com_inicio\">< Regresar</a>";
                echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_inicio'\", 1500) </script>";
            }
        }
        ?>
          </div>
          <div class="clear"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
</table>
</center>
<?php
		}
	} else { echo "Sintaxi XML inv&aacute;lida Revise el archivo: componentes/com_inicio/config.xml\n"; }
} else { echo "Error abriendo: <em>componentes/com_inicio/config.xml</em>\n"; }
?>