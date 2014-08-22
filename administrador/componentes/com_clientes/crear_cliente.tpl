<script language="javascript" type="text/javascript">
function enviar(pagina){
	document.frmcliente.action = pagina;
	document.frmcliente.submit();
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_clientes">&laquo; Atras</a> | Creando Cliente</h3></div>
<form name="frmcliente" method="post" enctype="multipart/form-data" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Proyecto: *</th>
            <td><input name="titulo" type="text" maxlength="100" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Url: *</th>
            <td><input name="url" type="text" maxlength="255" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Empresa: *</th>
            <td><input name="empresa" type="text" maxlength="100" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Selecciona la Imagen:</th>
            <td><input name="archivo" type="file" class="file_1" /> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br /><br /></td>
          </tr>
          <tr>
            <th align="right">Descripci&oacute;n<br />
              Completa: </th>
            <td align="left">
            <textarea name="contenido" cols="68" rows="10"></textarea><br />
            <span style="font-size:11px;">Maximo 250 caracteres</span></td>
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_clientes'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('?lagc=com_clientes&cliente=<?php echo time(); ?>&crear=continuar')">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>