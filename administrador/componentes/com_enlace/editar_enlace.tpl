<script type="text/javascript">
function limita(elEvento, maximoCaracteres, nombre) {
  var elemento = document.getElementById(nombre);
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  // Permitir utilizar las teclas con flecha horizontal
  if(codigoCaracter == 37 || codigoCaracter == 39) {
    return true;
  }
  // Permitir borrar con la tecla Backspace y con la tecla Supr.
  if(codigoCaracter == 8 || codigoCaracter == 46) {
    return true;
  }
  else if(elemento.value.length >= maximoCaracteres ) {
    return false;
  }
  else {
    return true;
  }
}
 
function actualizaInfo(maximoCaracteres, nombre, notificar) {
  var elemento = document.getElementById(nombre);
  var info = document.getElementById(notificar);
 
  if(elemento.value.length >= maximoCaracteres ) {
    info.innerHTML = "M&aacute;ximo "+maximoCaracteres+" caracteres";
  }
  else {
    info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres adicionales";
  }
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_enlace">&laquo; Atras</a> | Editando enlace <?=$cont['url_nombre']; ?></h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo: *</th>
            <td><input name="titulo" type="text" class="inp-form" size="36" value="<?=$cont['url_nombre']; ?>"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Resumen: </th>
            <td><textarea id="form-textarea" name="resumen" onkeypress="return limita(event, 255, 'form-textarea');" onkeyup="actualizaInfo(255, 'form-textarea', 'info')" class="mceNoEditor" cols="40" rows="5"><?=$cont['url_descripcion']; ?></textarea><br />
              <div id="info">M&aacute;ximo 255 caracteres</div></td>
            </tr>
            <tr>
            <th align="right" valign="top">Enlace: </th>
            <td><input name="enlace" type="text" class="inp-form" value="<?=$cont['url_enlace']; ?>" size="36"></td>
            </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
              <div class="right">
                <h5>Fechas</h5><br />
                <ul class="greyarrow">
                  <li>Creado el <a><?=date("Y/m/d", $cont['url_creado']); ?></a></li>
                  <?php if (!empty($cont['url_editado'])) { ?><li>Modificado el: <a><?=date("Y/m/d", $cont['url_editado']); ?></a></li><?php } ?>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
              <div class="right">
                <h5>Visitas</h5><br />
                <ul class="greyarrow">
                  <li><?=$cont['url_visitas']; ?></a></li>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
               <?php
              $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
              ksort($acti);
              foreach ($acti as $key => $val) {
                  if ($cont['url_estado']==$key) {
                      echo $val;
                  }
              } ?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_enlace'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>