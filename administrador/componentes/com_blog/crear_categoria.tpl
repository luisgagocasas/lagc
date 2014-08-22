<div class="botonesdemando"><h3><a href="?lagc=com_blog&blog=<?php echo time(); ?>&categoria_blog=<?php echo time(); ?>">&laquo; Atras</a> | Crear Nuevo Contenido</h3></h3>
<script language="javascript" type="text/javascript">
function enviar(pagina){
document.frmcont.action = pagina;
document.frmcont.submit();
}
</script>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Titulo: *</th>
            <td><input name="titulo" type="text" value="" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Resumen: </th>
            <td><textarea name="resumen" class="form-textarea" cols="40" rows="5"></textarea><br /><br /></td>
          </tr>
          <tr>
            <th align="right"></th>
            <td>
              </td>
          </tr>
          <tr>
            <th align="right"></th>
            <td align="center"></td>
          </tr>
          <tr>
            <th colspan="3" align="center">
              
            </th>
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog&blog=<?php echo time(); ?>&categoria_blog=<?php echo time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('?lagc=com_blog&blog=<?php echo time(); ?>&categoria_nuevo=continuar')">
        </center>
	</td>
    </tr>
  </table>
</center>
</form>