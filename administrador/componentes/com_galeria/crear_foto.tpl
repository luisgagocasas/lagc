<script>
function revisar() {
	if(frmfoto.titulo.value.length < 4) { alert('Ingrese El Titulo') ; return false ; }
	if(frmfoto.categoria.value.length < 1) { alert('Seleccione una Galeria') ; return false ; }
	if(frmfoto.archivo.value.length < 1) { alert('Seleccione una imagen') ; return false ; }
}
</script>
<h3>Subir Nueva Foto</h3>
<center>
<form name="frmfoto" method="post" enctype="multipart/form-data" action="" onSubmit="return revisar()">
  <table border="0" align="center" cellpadding="10" cellspacing="10">
    <tr>
      <td valign="top">
      <table border="0" cellpadding="5">
          <tr>
            <th align="right">Titulo: *</th>
            <td><input name="titulo" type="text" size="43" class="inp-form">
              <br />
              <br /></td>
          </tr>
          <tr>
            <th align="right">Descripci&oacute;n:</th>
            <td valign="middle"><textarea name="descr" maxlength="200" class="form-textarea" cols="45" rows="5"></textarea></td>
          </tr>
          <tr>
            <th align="right">Selecciona la Imagen:</th>
            <td colspan="2"><br />
            <input name="archivo" type="file" class="file_1" />
              <br />
              <strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br />
              Si no deseas cambiar la imagen deja este cambio vacio.</td>
          </tr>
          <tr>
            <th align="center" valign="top">
              <br />
              Categorias:
                <br /></th>
            <th colspan="3" align="left"><br />
            <select name="categoria" size="10" style="width:250px;">
         <?php
        $respcat = mysql_query("select * from fotos_album");
        while($cat = mysql_fetch_array($respcat)) {
            if ($cont['categoria']==$cat['id_gal']) {
                echo "<option value=\"".$cat['id_gal']."\" selected=\"selected\">".$cat['titulo']."</option>";
            }
            else {
                echo "<option value=\"".$cat['id_gal']."\">".$cat['titulo']."</option>";
            }
        }
        ?>
            </select></th>
            </tr>
        </table>
        </td>
      <td valign="top"><div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
              <div class="right">
                <h5>Habilitar</h5>
                <br />
                <label>
                  <input type="checkbox" name="vertitulo" value="1" />
                  Mostrar Titulo</label>
                <br />
                <label>
                  <input type="checkbox" name="verdescr" value="1" />
                  Mostrar Descripci&oacute;n</label>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Activado</h5>
                <br />
                <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
                <label><input type="radio" name="activado" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="right">
              <center>
              <input type="button" value="Cancelar" onclick="location.href='?lagc=com_galeria'" class="form-cancel">
              <input type="reset" value="Restablecer" class="form-reset">
              <input type="submit" value="Crear" class="form-guardar">
              </center>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div></td>
    </tr>
  </table>
</form>
</center>