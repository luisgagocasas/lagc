<script>
function revisar() {
	if(addproducto.marcas.value.length < 1) { alert('Seleccione una Marca'); addproducto.marcas.focus(); return false; }
	if(addproducto.linea.value.length < 1) { alert('Seleccione la linea'); addproducto.linea.focus(); return false; }
	if(addproducto.codigo.value.length < 6) { alert('Ingrese el Codigo'); addproducto.codigo.focus(); return false; }
	if(addproducto.descripcion.value.length < 4) { alert('Ingrese una Descripcion'); addproducto.descripcion.focus(); return false; }
	if(addproducto.tipoproducto.value.length < 1) { alert('Seleccione Tipo de Producto'); addproducto.tipoproducto.focus(); return false; }
	if(addproducto.tipooperatividad.value.length < 1) { alert('Seleccione El Tipo de Operatividad'); addproducto.tipooperatividad.focus(); return false; }
}
</script>
<script type="application/javascript">
function oculta(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='none';
}
function muestra(id){
	var elDiv = document.getElementById(id);
	elDiv.style.display='block';
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
    info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres";
  }
}
</script>
<form name="addproducto" action="" method="post" onSubmit="return revisar()">
<center><div class="subtitulo" onClick="muestra('oculto'); oculta('oculto2');" style="cursor:pointer;">Informaci&oacute;n necesaria</div></center>
<center>
<div id="oculto">
  <table width="100%" align="center" border="0">
    <tr>
      <td valign="top" align="center"><table border="0">
          <tr>
            <th valign="top" class="textoform">Marca:</th>
            <td>
              <select name="marcas" id="provincia" poblacioattri="" style="width:200px;">
              <option value="">Seleccione Marca</option>
              <?php
              $B_BUSCAR= mysql_query ("SELECT * FROM cp_marcas order by cp_mnombre asc");
              $R_BUSCAR=mysql_fetch_assoc($B_BUSCAR);
              $C_BUSCAR=mysql_num_rows($B_BUSCAR);
              $suma=0;
              do{ ++$suma;
              	echo "<option value='".$R_BUSCAR['cp_mid']."'>".$R_BUSCAR['cp_mnombre']."</option>";
              }
              while($R_BUSCAR=mysql_fetch_assoc($B_BUSCAR));
              ?>
              </select>&nbsp;<span id='Buscando'></span>
              <br /><br /></td>
          </tr>
          <tr>
            <th valign="top" class="textoform">Linea:</th>
            <td>
              <select name="linea" id="poblacionList" style="width:200px;">
              	<option value="" selected="selected">Seleccionar Linea</option>
              </select>
              <br /><br /></td>
          </tr>
          <tr>
            <th valign="top" class="textoform">Codigo:</th>
            <td><input name="codigo" type="text" maxlength="100" class="inp-form">
              <br /><br /></td>
          </tr>
          <tr>
            <th valign="top" class="textoform">Descripci&oacute;n:</th>
            <td><textarea name="descripcion" cols="" rows="" class="mceNoEditor" id="textareaform" onkeypress="return limita(event, 255, 'textareaform');" onkeyup="actualizaInfo(255, 'textareaform', 'info')"></textarea>
              <br /><div id="info">M&aacute;ximo 255 caracteres</div><br /></td>
          </tr>
          <tr>
            <th valign="top" class="textoform">Tipo de Producto:</th>
            <td><select name="tipoproducto" style="width:150px;" class="styledselect_form_1">
                <?php Sistema::_TipoProducto(); ?>
              </select>
              <br /><br /></td>
          </tr>
        </table></td>
      <td valign="top" align="center"><table border="0">
          <tr>
            <td valign="middle" class="textoform">Locales con Stock:<br />
              <span style="font-size:10px;">Cantidad en Unidades</span></td>
            <td><div class="bloque_lugar">
                <?php Sistema::_Lugares("", "addproducto"); ?>
              </div></td>
          </tr>
          <tr>
            <th valign="top" class="textoform"><br />Tipo Operatividad:</th>
            <td><br />
            <select name="tipooperatividad" style="width:150px;" class="styledselect_form_1">
                <?php Sistema::_TipoProductividad(); ?>
            </select>
              <br /><br /></td>
          </tr>
        </table>
        </td>
      <td align="center" valign="top">
      <table border="0">
          <tr>
            <th valign="middle" class="textoform">Usuario:</th>
            <td><?php echo LGlobal::Url_Usuario($_COOKIE["user"], true, false, "_blank", "../"); ?></td>
          </tr>
          <tr>
            <th valign="top" class="textoform"><br /><br />Comentario:</th>
            <td><br /><br /><textarea name="comentario" cols="" rows="" class="mceNoEditor" id="textareaform2" onkeypress="return limita(event, 255, 'textareaform2');" onkeyup="actualizaInfo(255, 'textareaform2', 'info2')"></textarea><br />
            <div id="info2">M&aacute;ximo 255 caracteres</div>
             </td>
          </tr>
          <tr>
            <th valign="middle" class="textoform"><br /><br />Act./Desac.:</th>
            <td><br /><br />
              <label><input name="activado" type="radio" checked="checked" value="1">Activado</label><br />
              <label><input type="radio" name="activado" value="2">Desactivado</label></td>
          </tr>
          <tr>
            <th colspan="2" valign="middle"> <br /><br />
              <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&tipos_producto=<?=time(); ?>" class="botones">Cancelar</a>
              <input type="reset" class="botones" value="Restaurar" />
              <input type="submit" class="botones" value="Continuar" /></th>
          </tr>
        </table></td>
    </tr>
    </table>
    </div>
    </center>
    <center><div class="subtitulo" onClick="oculta('oculto'); muestra('oculto2');" style="cursor:pointer;">Caracteristicas</div></center>
    <center>
    <div id="oculto2" style="display: none;">
	<table border="0">
          <tr>
            <td class="textoform" valign="middle">Caracteristicas:</td>
            <td valign="top"><textarea name="caracteristicas" cols="68" rows="40"></textarea><br />
            * Ingrese las caracteristicas del producto.</td>
          </tr>
        </table>
  </div>
  </center>
</form>
<script>
jQuery('#provincia').change(function () {
var numero =document.getElementById("provincia").value; // valor de la id de Provincias
var poblacio = jQuery(this).attr("poblacioattri"); // este es el atributo que nos ayuda a encontrar la población cuando modificamos  el contenido
var to=document.getElementById("Buscando");
to.innerHTML="buscando....";
jQuery.ajax({
type: "POST", 
url: "componentes/com_catalogodeltron/busqueda.php",
data: 'idnumero='+numero+'&idpobla='+poblacio, // enviamos la id de la Porvincia + la id de la población
success: function(a) {
jQuery('#poblacionList').html(a);// el resultado de la busqueda la mostramos en  #poblacionList
var to=document.getElementById("Buscando");
to.innerHTML="";
}
});
})
.change();
</script> 