<script>
function revisar() {
	if(frmgal.titulo.value.length < 4) { alert('Ingrese El Titulo'); frmgal.titulo.focus(); return false; }
}
</script>
<h3>Editar Galeria:</h3>
<form name="frmgal" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th align="right">Titulo: *</th>
      <td><input name="titulo" type="text" size="55" class="inp-form" value="<?php echo $cont['titulo']; ?>">
        <br />
        <br /></td>
    </tr>
    <tr>
      <th align="center">Descripci&oacute;n</th>
      <th colspan="2" align="center"><textarea name="descri" cols="40" rows="6" class="form-textarea"><?php echo $cont['descripcion']; ?></textarea></th>
    </tr>
    <tr>
      <td>Activo:</td>
      <td><?php
    $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
    ksort($acti);
    foreach ($acti as $key => $val) {
        if ($cont['activar']==$key) {
        	echo $val;
        }
    } ?></td>
    </tr>
    <tr>
      <th colspan="3" align="center"><input type="button" value="Cancelar" onclick="location.href='?lagc=com_galeria&galerias=<?php echo time(); ?>&lista=<?php echo time(); ?>'" class="form-cancel" />
        <input type="reset" value="Restablecer" class="form-reset" />
        <input type="submit" value="Guardar" class="form-guardar" /></th>
    </tr>
  </table>
</form>