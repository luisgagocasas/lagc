<script>
function revisar() {
	if(frmfoto.titulo.value.length < 4) { alert('Ingrese El Titulo') ; return false ; }
	if(frmfoto.archivo.value.length < 1) { alert('Seleccione una imagen') ; return false ; }
}
</script>
<form name="frmfoto" method="post" enctype="multipart/form-data" action="" onSubmit="return revisar()">
  <h2>Cargar nueva Imagen</h2>
  <table border="0">
    <tr>
      <th scope="row" valign="middle" class="textoform">Titulo:</th>
      <td><input name="titulo" type="text" maxlength="100" class="inp-form">
        <br>
        <br></td>
    </tr>
    <tr>
      <th scope="row" valign="middle" class="textoform">Descripcion:</th>
      <td><textarea name="descripcion" cols="" rows="" id="textareaform"></textarea>
        <br>
        <br></td>
    </tr>
    <tr>
      <th scope="row" valign="middle" class="textoform">Imagen:</th>
      <td><input name="archivo" type="file" class="file_1" />
        <br />
        <strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br>
        <br></td>
    </tr>
    <tr>
      <th scope="row" valign="middle" class="textoform">Estado:</th>
      <td>
      <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
      <label><input name="activado" type="radio" value="2">Desactivado</label>
      </td>
    </tr>
    <tr>
      <th colspan="2" scope="row"> <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron'" class="form-cancel">
        <input type="reset" value="Restablecer" class="form-reset">
        <input type="submit" value="Crear" class="form-submit">
      </th>
    </tr>
  </table>
</form>