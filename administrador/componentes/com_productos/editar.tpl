<script language="javascript" type="text/javascript">
function enviar(pagina){
	document.frmcont.action = pagina;
	document.frmcont.submit();
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_productos">&laquo; Atras</a> | Editando: <em><?=$cont['p_titulo']; ?></em></h3></div>
<form name="frmcont" method="post" enctype="multipart/form-data" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo: *</th>
            <td colspan="2"><input name="titulo" type="text" value="<?=$cont['p_titulo']; ?>" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Selecciona la Imagen:</th>
            <td valign="top"><br />
            <input type="hidden" name="imagenbd" value="<?=$cont['p_imagen']; ?>" />
            <input name="archivo" type="file" class="file_1" />
              <br />
              <strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br />
              Si no deseas cambiar la imagen deja este cambio vacio.<br /><br />
              </td>
            <td valign="top">
            <img src="../componentes/com_productos/imagenes/<?=$cont['p_imagen']; ?>" width="100" border="0" />
            </td>
          </tr>
          <tr>
            <th align="right" valign="top">Contenido 1: </th>
            <td colspan="2" valign="top"><textarea name="contenido1" cols="40" rows="20"><?=$cont['p_contenido1']; ?></textarea><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Contenido 2: </th>
            <td colspan="2" valign="top"><textarea name="contenido2" cols="40" rows="20"><?=$cont['p_contenido2']; ?></textarea><br /></td>
          </tr>
           <tr>
            <th align="right" valign="top">Contenido 3: </th>
            <td colspan="2" valign="top"><textarea name="contenido3" cols="40" rows="20"><?=$cont['p_contenido3']; ?></textarea><br /></td>
          </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Fechas</h5><br />
                <ul class="greyarrow">
                  <li>Creado el <a><?php echo date("Y/m/d", $cont['p_fecha']); ?></a></li>
                  <?php if (!empty($cont['p_fechamodi'])) { ?><li>Modificado el: <a><?=date("Y/m/d", $cont['p_fechamodi']); ?></a></li><?php } ?>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
                <?php
                $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                    if ($cont['activo']==$key) {
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_productos'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('<?="?lagc=com_productos&productos=".$id."&editar=".$url."&aplicar=continuar"; ?>')">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>