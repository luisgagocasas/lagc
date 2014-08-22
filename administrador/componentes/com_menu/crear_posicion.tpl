<script>
function revisar() {
	if(frmmenus.titulo.value.length < 4) { alert('Ingrese el titulo') ; return false ; }
}
</script>
<h4>Crear nuevo Menu</h4>
<form name="frmmenus" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th>Titulo: *</th>
      <td><input name="titulo" type="text" class="inp-form" size="45"><br /><br /></td>
    </tr>
    <tr>
      <th colspan="2"></th>
    </tr>
    <tr>
      <td><strong>Activado</strong> : </td>
      <td colspan="2"><label>
          <input name="activado" type="radio" checked="checked" value="1">
          Activado</label>
        <label>
          <input type="radio" name="activado" value="2">
          Desactivado</label></td>
    </tr>
    <tr>
      <th colspan="4" align="center"><br />
        <br />
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_menu'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset">
        <input type="submit" name="button2" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>
