<div class="botonesdemando"><h3><a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos=<?php echo time(); ?>">&laquo; Atras</a> | Editar Tipo <u><?php echo $cont['tip_nombre']; ?></u>.</h3></div>
<br /><br />
<?php LGlobal::EditorCodigo("contenido2_lagc", $cont['tip_lenguaje']); ?>
<script language="Javascript" type="text/javascript">
editAreaLoader.init({
	id: "contenido_lagc"	// id of the textarea to transform		
	,start_highlight: true	// if start with highlight
	,allow_resize: "both"
	,allow_toggle: true
	,word_wrap: true
	,language: "es"
	,syntax: "html"
	,toolbar: "search, go_to_line, |, undo, redo"
});
</script>
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
            <th align="right" valign="top"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>-Este campo solo puede tener texto, numeros y sin espacios.</p><p class=\'espacio-ventana\'>-Este nombre se usara en la plantilla para colocar el modulo.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Titulo: *</th>
            <td><input name="titulo_lagc" type="text" value="<?php echo $cont['tip_nombre']; ?>" class="inp-form"><br /><br /></td>
          </tr>
          <tr>
          <th align="right" valign="top"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Aqui Codigo para la cabecera del editor de modulos.</p><p class=\'espacio-ventana\'>Por Ejemplo: Javascript, css</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Codigo Cabecera: </th>
          <td valign="top"><textarea name="codigoccabecera_lagc" id="contenido_lagc" cols="70" rows="15"><?php $archicabe = str_replace('<', "&lt;", $cont['tip_cabecera']); echo $archicabe; ?></textarea></td>
          </tr>
          <tr>
          <th align="right" valign="top"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Aqui todo el codigo PHP</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Codigo Cuerpo: </th>
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
            <h5>&iquest;Al usar se guardara en?</h5>
                <select name="saveusofin_lagc" class="styledselect_form_2">
            <?php
            $saveuso = array("1"=>"BD", "2"=>"Archivo");
			ksort($saveuso);
            foreach ($saveuso as $key => $val) {
                if ($cont['tip_savetipo']==$key) {
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
                <td><input disabled="disabled" type="text" value="mod_tipvalor1" class="inp-form1"> - </td>
                <td> <input name="camp1" type="text" maxlength="15" value="<?php echo $nuevosvalores[0]; ?>" class="inp-form1"></td>
                </tr>
                <tr>
                <td><br /><input disabled="disabled" type="text" value="mod_tipvalor2" class="inp-form1"> - </td>
                <td> <input name="camp2" type="text" maxlength="15" value="<?php echo $nuevosvalores[1]; ?>" class="inp-form1"></td>
                </tr>
                <tr>
                <td><br /><input disabled="disabled" type="text" value="mod_tipvalor3" class="inp-form1"> - </td>
                <td> <input name="camp3" type="text" maxlength="15" value="<?php echo $nuevosvalores[2]; ?>" class="inp-form1"></td>
                </tr>
                <tr>
                <td><br /><input disabled="disabled" type="text" value="mod_tipvalor4" class="inp-form1"> - </td>
                <td> <input name="camp4" type="text" maxlength="15" value="<?php echo $nuevosvalores[3]; ?>" class="inp-form1"></td>
                </tr>
                </table>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Activado</h5>
                <br />
<?php
$acti = array("1"=>"<label><input name=\"activado_lagc\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado_lagc\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado_lagc\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado_lagc\" checked=\"checked\" value=\"2\">Desactivado</label>");
ksort($acti);
foreach ($acti as $key => $val) {
    if ($cont['tip_activo']==$key) {
        echo $val;
    }
}
?>
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