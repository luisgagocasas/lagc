<script language="javascript" type="text/javascript">
function enviar(pagina){
	document.frmcont.action = pagina;
	document.frmcont.submit();
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_clientes">&laquo; Atras</a> | Editando: <em><?php echo $cont['cl_nombre']; ?></em></h3></div>
<form name="frmcont" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="img" value="<?php echo $cont['cl_imagen']; ?>" />
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Proyecto: *</th>
            <td><input name="titulo" type="text" maxlength="100" value="<?php echo $cont['cl_nombre']; ?>" class="inp-form" size="36"><br /><br /></td>
            <td rowspan="3" align="center" valign="top"><?php echo Clientes::VeriMG($cont['cl_imagen'], $cont['cl_nombre']); ?></td>
            </tr>
          <tr>
            <th align="right">Url: *</th>
            <td><input name="url" type="text" maxlength="255" value="<?php echo $cont['cl_web']; ?>" class="inp-form" size="36"><br /><br /></td>
            </tr>
          <tr>
            <th align="right">Empresa: *</th>
            <td><input name="empresa" type="text" maxlength="100" value="<?php echo $cont['cl_empresa']; ?>" class="inp-form" size="36"><br /><br /></td>
            </tr>
          <tr>
            <th align="right">Selecciona la Imagen:</th>
            <td colspan="2"><input name="archivo" type="file" class="file_1" /> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br /><br /></td>
          </tr>
          <tr>
            <th align="right">Descripci&oacute;n<br />
              Completa: </th>
            <td colspan="2" align="left">
            <textarea name="contenido" cols="68" rows="10"><?php echo $cont['cl_descipcion']; ?></textarea></td>
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
                <?php
                $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                    if ($cont['cl_activado']==$key) {
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_clientes'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('?lagc=com_clientes&cliente=<?php echo $id; ?>&editar=<?php echo $url; ?>&aplicar=continuar')">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>