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
<script type="text/javascript">
function filtro(evt) { 
	var keyCode = evt.which || evt.keyCode;
	keychar = String.fromCharCode(keyCode); 
	return /^\w$/.test(keychar) || keyCode == 8; 
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones=<?php echo time(); ?>">&laquo; Atras</a> | Crear nueva Posici&oacute;n</h3></div>
<br /><br />
<center>
<form name="frmcont" method="post" action="">
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>-Este campo solo puede tener texto, numeros y sin espacios.</p><p class=\'espacio-ventana\'>-Este nombre se usara en la plantilla para colocar el modulo.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Titulo: *</th>
            <td><input name="titulo" type="text" maxlength="100" onkeypress="return filtro(event)" class="inp-form"><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top"><br />Codigo de Inicio:</th>
            <td><br /><textarea id="texto" name="inicio" onkeypress="return limita(event, 255, 'texto');" onkeyup="actualizaInfo(255, 'texto', 'info')" rows="6" cols="30"></textarea>
            <div id="info">M&aacute;ximo 255 caracteres</div>
</td>
          </tr>
          <tr>
            <th align="right" valign="top"><br />Codigo al final:</th>
            <td><br /><textarea id="texto1" name="fin" onkeypress="return limita(event, 255, 'texto1');" onkeyup="actualizaInfo(255, 'texto1', 'info2')" rows="6" cols="30"></textarea>
            <div id="info2">M&aacute;ximo 255 caracteres</div>
</td>
          </tr>
        </table></td>
      <td valign="top"><div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Activado</h5>
                <br />
                <label>
                  <input name="activado" type="radio" checked="checked" value="1">
                  Activado</label>
                <label>
                  <input name="activado" type="radio" value="2">
                  Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
          <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones=<?php echo time(); ?>'" class="form-cancel">
          <input type="reset" name="Reset" value="Restablecer" class="form-reset">
          <br />
          <input type="submit" value="Guardar" class="form-guardar">
          <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones_crear=<?php echo time(); ?>&crear=continuar')">
        </center></td>
    </tr>
  </table>
  </form>
</center>
