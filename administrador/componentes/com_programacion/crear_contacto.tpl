<h4>Crear codigo de Formulario:</h4>
<form name="frmcat" method="post" action="">
<center>
<table border="0">
  <tr>
    <td valign="top">
    <table border="0" cellpadding="5">
    <tr>
      <th align="right">Nombre: *</th>
      <td colspan="3"><input name="nombre" type="text" value="" class="inp-form" size="55"><br /><br /></td>
    </tr>
    <tr>
      <th align="right">Archivo: *</th>
      <th colspan="3" align="left"><input name="archivo" class="inp-form" maxlength="20" type="text" value="" style="text-align:right;" size="15">
        .php</th>
    </tr>
  </table>
  </td>
    <td valign="top">
    <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Activado</h5><br />
                <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
                <label><input name="activado" type="radio" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_programacion'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset">
        <input type="submit" name="button2" value="Guardar" class="form-submit">
        </center>
    </td>
  </tr>
</table>
</center>
</form>