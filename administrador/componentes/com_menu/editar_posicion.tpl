<script>
function revisar() {
	if(frmmenus.titulo.value.length < 4) { alert('Ingrese el titulo') ; return false ; }
}
</script>
<h3>Editando menu: <em><?php echo $mposicion['m_pnombre']; ?></em></h3>
<form name="frmmenus" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th>Titulo: *</th>
      <td><input name="titulo" type="text" class="inp-form" size="45" value="<?php echo $mposicion['m_pnombre']; ?>"><br /><br /></td>
    </tr>
    <tr>
      <th colspan="2"></th>
    </tr>
    <tr>
    <td><strong>Activado</strong> : </td>
      <td colspan="2">
<?php
$acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
ksort($acti);
foreach ($acti as $key => $val) {
    if ($mposicion['m_pactivo']==$key) {
    	echo $val;
    }
}
?>
		</td>
    </tr>
<tr>
      <th colspan="4" align="center"><br /><br />
      <input type="button" value="Cancelar" onclick="location.href='?lagc=com_menu'" class="form-cancel">
      <input type="reset" name="Reset" value="Restablecer" class="form-reset">
      <input type="submit" name="button2" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>