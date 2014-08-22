<div class="botonesdemando"><h3><a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos=<?php echo time(); ?>">&laquo; Atras</a> | Editar Tipo <u><?php echo $cont['tip_nombre']; ?></u>.</h3></div>
<br /><br />
<?php LGlobal::EditorCodigo("contenido2_lagc", $cont['tip_lenguaje']); ?>
<center>
<?php
if($fp = fopen($archadmin, "r")){ $data = fread($fp, filesize($archadmin)); fclose($fp); }
else { $data = ""; echo "<h3>Error</h3>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
$nuevosvalores = explode('|', $cont['tip_tipvalor1']);
?>
<form name="frmcont" method="post" action="">
<input type="hidden" name="ubc_lagc" value="<?php echo $archadmin; ?>" />
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo: *</th>
            <td><input name="titulo_lagc" type="text" class="inp-form" value="<?php echo $cont['tip_nombre']; ?>" readonly="true" /><br /><br /></td>
          </tr>
          <tr>
          <th align="right" valign="top"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Este codigo es para mostrarlo en el sitio.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Codigo Cuerpo: </th>
          <td valign="top"><textarea name="codigocont_lagc" id="contenido2_lagc" cols="70" rows="40"><?php $archivos = str_replace('<', "&lt;", $data); echo $archivos; ?></textarea></td>
          </tr>
        </table></td>
      <td valign="top"><div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
            
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
            <h5>Lenguaje:</h5>
                <select name="lenguaje_lagc" class="styledselect_form_2">
            <?php
            $lenguajes = array("html"=>"Html", "php"=>"Php", "css"=>"Css", "js"=>"Js", "xml"=>"Xml");
			ksort($lenguajes);
            foreach ($lenguajes as $key => $val) {
                if ($cont['tip_lenguaje']==$key) {
					echo "<option value=\"$key\" selected>$val</option>"; }
				else {
					echo "<option value=\"$key\">$val</option>"; }
            }
			?>
                </select>
                </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5> Nombre del archivo</h5>
                <br />
                <ul class="greyarrow">
                    <li><?php echo $cont['tip_archivo']; ?></li>
                </ul>
              </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5> Fechas</h5>
                <br />
<ul class="greyarrow">
    <li>Creado el <a><?php echo date("Y/m/d", $cont['tip_fecha']); ?></a></li>
    <?php if (!empty($cont['tip_modificado'])) { ?><li>Modificado el: <a><?php echo date("Y/m/d", $cont['tip_modificado']); ?></a></li><?php } ?>
</ul>
              </div>
              <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5> Bd Campos</h5>
                <br />
                <table border="0" align="center">
                <tr>
                <td align="center">BD</td>
                <td align="center">Campo</td>
                </tr>
                <tr>
                <td><input name="bd1" type="text" disabled class="inp-form1" value="<?php echo $nuevosvalores[0]; ?>" readonly="true" /> - </td>
                <td> <input name="camp1" type="text" disabled class="inp-form1" value="<?php echo $nuevosvalores[1]; ?>" readonly="true" /></td>
                </tr>
                <tr>
                <td><br /><input name="bd2" type="text" disabled class="inp-form1" value="<?php echo $nuevosvalores[2]; ?>" readonly="true" /> - </td>
                <td><br /> <input name="camp2" type="text" disabled class="inp-form1" value="<?php echo $nuevosvalores[3]; ?>" readonly="true" /></td>
                </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
          <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos=<?php echo time(); ?>'" class="form-cancel">
          <input type="reset" name="Reset" value="Restablecer" class="form-reset">
          <br />
          <input type="submit" value="Guardar" class="form-guardar">
        </center></td>
    </tr>
  </table>
  </form>
</center>