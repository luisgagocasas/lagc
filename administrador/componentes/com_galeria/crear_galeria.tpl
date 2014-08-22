<script>
function revisar() {
	if(frmgal.titulo.value.length < 4) { alert('Ingrese El Titulo'); frmgal.titulo.focus(); return false; }
}
</script>
<h4>Crear Galeria:</h4>
<form name="frmgal" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">Titulo: *</th>
      <td><input name="titulo" type="text" size="55" class="inp-form">
        <br />
        <br /></td>
    </tr>
    <tr>
      <th align="center">Descripci&oacute;n:</th>
      <th colspan="2" align="center"><textarea name="descri" cols="40" rows="6" class="form-textarea"></textarea></th>
    </tr>
    <tr>
      <th>Activo:</th>
      <td align="center"><label>
          <input name="activado" type="radio" checked="checked" value="1">
          Activado</label>
        <label>
          <input type="radio" name="activado" value="2">
          Desactivado</label></td>
    </tr>
    <tr>
      <th colspan="3" align="center"><input type="button" value="Cancelar" onclick="location.href='?lagc=com_galeria&galerias=<?php echo time(); ?>&galerias=<?php echo time(); ?>&lista=<?php echo time(); ?>'" class="form-cancel" />
        <input type="reset" name="Reset" value="Restablecer" class="form-reset" />
        <input type="submit" name="button2" value="Crear" class="form-submit" /></th>
    </tr>
  </table>
</form>