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
<form name="frmcont" method="post" action="">
  <center>
    <table border="0" cellpadding="5">
      <tr>
        <td colspan="2">
        <table>
        <tr>
        <td>
        <h4>Titulo</h4>
          <input name="titulo" type="text" class="inp-form" maxlength="225" size="36">
          </td>
          <td>
         <h4>Usuario</h4>
         &nbsp;&nbsp; <input type="text" class="inp-form1" disabled="disabled" readonly="readonly" style="text-align:center;" value="<?=$_COOKIE["usuario_lagc"]; ?>" size="36">
          </td>
          </tr>
          </table>
          </td>
      </tr>
      <tr>
        <td><h4>Resumen</h4>
          <textarea id="form-textarea" name="resumen" onkeypress="return limita(event, 255, 'form-textarea');" onkeyup="actualizaInfo(255, 'form-textarea', 'info')" class="mceNoEditor" cols="40" rows="5"></textarea>
          <br />
          <div id="info" style="color:#999;">M&aacute;ximo 255 caracteres</div></td>
        <td><h4>Imagen</h4>
          <div style="margin:0px 0px 0px 0px;"></div>
          <div class="fondoimg" style="width:160px; height:100px; cursor:pointer;" onclick="abrirventana('1');"> <img src="" name="img1" border="0" /> </div>
          <input type="text" name="img1" value="" onfocus="document.images.img1.src='componentes/com_imagenes/thumbnails/'+this.value" class="borderinputimg"></td>
      </tr>
      <tr>
        <td><h4>Palabras Claves</h4>
          <input name="palabras" type="text" size="65" class="inp-form" /><br />
          <span style="font-size:10px; color:#999;">accidente, carros, <?=date(Y); ?></span></td>
        <td><h4>Categorias</h4>
          <select name="categoria" size="7" style="width:160px;">
            <?php
          $respcat = mysql_query("select * from blog_categorias where cat_id!=1 and cat_activado='1'");
          while($cat = mysql_fetch_array($respcat)) {
              if("2"==$cat['cat_id']) {
                    echo "<option value=\"".$cat['cat_id']."\" selected=\"selected\">&raquo; ".$cat['cat_nombre']."</option>";
               }
               else {
                  echo "<option value=\"".$cat['cat_id']."\">&raquo; ".$cat['cat_nombre']."</option>";
              }
          }
          ?>
          </select></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><h4>Descripción Completa</h4>
          <label><textarea name="contenido" cols="60" rows="30"></textarea></label>
          </td>
      </tr>
    </table>
  </center><br />
  <blockquote>
  	<ul>
    	<li>&raquo; Este contenido sera revisado antes de aprobarse por nuestros administradores.</li>
        <li>&raquo; Por favor modere su vocabulario.</li>
        <li>&raquo; Si es que a copiado desde otro lugar la noticia. Escriba la Fuente en la parte inferior del articulo.</li>
    </ul>
  </blockquote>
  <center>
    <input type="reset" name="Reset" value="Restablecer" class="form-reset">
    <input type="submit" value="Guardar" class="form-guardar">
  </center><br />
<br />
<br />
</form>