<script>
function revisar() {
	if(frmfoto.titulo.value.length < 4) { alert('Ingrese El Titulo') ; return false ; }
}
</script>
<form name="frmfoto" method="post" action="" onSubmit="return revisar()">
  <table border="0">
    <tr>
      <th scope="row" valign="middle" class="textoform">Titulo:</th>
      <td colspan="2"><input name="titulo" type="text" value="<?=$cont['cp_imgtitulo']; ?>" maxlength="100" class="inp-form">
        <br>
        <br></td>
    </tr>
    <tr>
      <th scope="row" valign="middle" class="textoform">Descripcion:</th>
      <td><textarea name="descripcion" class="textareaform"><?=$cont['cp_imgdescripcion']; ?></textarea>
        <br>
        <br></td>
      <td valign="top"><img src="<?php echo "../componentes/com_catalogodeltron/imagenes/thumb/".$cont['cp_imgimg']; ?>" title="<?php echo $cont['cp_imgtitulo']; ?>" border="0" /></td>
    </tr>
    <tr>
      <th scope="row" valign="middle" class="textoform">Estado:</th>
      <td colspan="2">
        <?php
        $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
        ksort($acti);
        foreach ($acti as $key => $val) {
            if ($cont['cp_imgactivo']==$key) {
                echo $val;
            }
        } ?>
      </td>
    </tr>
    <tr>
      <th colspan="3" scope="row"> <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&crear_img_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>'" class="form-cancel">
        <input type="reset" value="Restablecer" class="form-reset">
        <input type="submit" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>