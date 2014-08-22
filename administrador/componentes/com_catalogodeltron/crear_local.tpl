<div class="botonesdemando"><h3><a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_locales=<?=time(); ?>">&laquo; Atras</a> | Crear nuevo local</h3></div>
<?php $telefonos = explode('|', $cont['cp_ltelefonos']); ?>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Local: *</th>
            <td><input name="titulo" type="text" maxlength="255" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Dirección: *</th>
            <td><input name="direccion" type="text" maxlength="255" class="inp-form" size="36"><br /><br /></td>
          </tr>
           <tr>
            <th align="right" valign="top">Telefono 1: *</th>
            <td><input name="telef1" type="text" maxlength="100" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Telefono 2: *</th>
            <td><input name="telef2" type="text" maxlength="100" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Telefono 3: *</th>
            <td><input name="telef3" type="text" maxlength="100" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th colspan="3" align="center">
            </th>
          </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
                <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
                <label><input type="radio" name="activado" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_locales=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>