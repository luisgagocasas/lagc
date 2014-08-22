<script language="javascript" type="text/javascript">
function enviar(pagina){
	document.frmcont.action = pagina;
	document.frmcont.submit();
}
</script>
<script type="text/javascript">
function limita(elEvento, maximoCaracteres, nombre) {
  var elemento = document.getElementById(nombre);
  // Obtener la tecla pulsada
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  // Permitir utilizar las teclas con flecha horizontal
  if(codigoCaracter == 37 || codigoCaracter == 39) {
    return true;
  }
  // Permitir borrar con la tecla Backspace y con la tecla Supr.
  if(codigoCaracter == 8 || codigoCaracter == 46) {
    return true;
  }
  else if(elemento.value.length >= maximoCaracteres ) {
    return false;
  }
  else {
    return true;
  }
}
function actualizaInfo(maximoCaracteres, nombre, notificar) {
  var elemento = document.getElementById(nombre);
  var info = document.getElementById(notificar);
  if(elemento.value.length >= maximoCaracteres ) {
    info.innerHTML = "M&aacute;ximo "+maximoCaracteres+" caracteres";
  }
  else {
    info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres adicionales";
  }
}
</script>
<script>
function Campo1($texto){ document.frmcont.img1.value = $texto; document.frmcont.img1.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=160","miventana","width=600,height=500,menubar=no");
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_blog">&laquo; Atras</a> | Crear nuevo Articulo</h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo: *</th>
            <td colspan="2"><input name="titulo" type="text" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Resumen: </th>
            <td><textarea id="form-textarea" name="resumen" onkeypress="return limita(event, 255, 'form-textarea');" onkeyup="actualizaInfo(255, 'form-textarea', 'info')" class="mceNoEditor" cols="40" rows="5"></textarea><br />
            <div id="info">M&aacute;ximo 255 caracteres</div><br /></td>
            <td>
            <div style="margin:0px 0px -20px 0px;"></div>
            <div class="fondoimg" style="width:160px; height:100px; cursor:pointer;" onclick="abrirventana('1');">
            <img src="" name="img1" border="0" />
            </div>
            <input type="text" name="img1" value="" onfocus="document.images.img1.src='../../../componentes/com_imagenes/thumbnails/'+this.value" class="borderinputimg">
            </td>
          </tr>
          <tr>
            <th align="right" valign="top">Descripci&oacute;n<br />Completa: </th>
            <td colspan="2" align="left">
            <label><textarea name="contenido" cols="68" rows="40"></textarea></label>
            </td>
          </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
              <div class="right">
                <h5>Habilitar</h5><br />
                <label><input name="verresumen" type="checkbox" value="1" checked="checked" />
                Mostrar Resumen</label><br />
                <label><input name="verformcoment" type="checkbox" value="1" checked="checked" />
                Mostrar Formulario de Comentarios</label><br />
                <label><input name="vermcoment" type="checkbox" value="1" checked="checked" />
                Mostrar Comentarios</label>
              </div>
              <div class="clear"></div>
               <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Categorias</h5><br />
                <select name="categoria" size="5" style="width:200px;">
                <?php
                $respcat = mysql_query("select * from blog_categorias where cat_activado='1'");
                while($cat = mysql_fetch_array($respcat)) {
                    if("1"==$cat['cat_id']) {
                        echo "<option value=\"".$cat['cat_id']."\" selected=\"selected\">".$cat['cat_nombre']."</option>";
                    }
                    else {
                        echo "<option value=\"".$cat['cat_id']."\">".$cat['cat_nombre']."</option>";
                    }
                }
                ?>
                </select>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
               <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
               <label><input type="radio" name="activado" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Palabras Claves</h5><br />
                <input name="palabras" type="text" size="65" class="inp-form" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('<?="?lagc=com_blog&blog=".$id."&crear_blog=continuar"; ?>')">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>