<script>
function revisar() {
	if(frmcompoe.titulo.value.length < 4) { alert('Ingrese El Titulo') ; return false ; }
	if(frmcompoe.url.value.length < 4) { alert('Ingrese La Direccion Del Componente') ; return false ; }
	if(frmcompoe.ainicio.value.length < 4) { alert('Ingrese El Archivo de Inicio') ; return false ; }
	if(frmcompoe.licen.value.length < 4) { alert('Ingrese La Licencia') ; return false ; }
	if(frmcompoe.email.value.length < 4) { alert('Ingrese El E-mail') ; return false ; }
}
</script><br /><br />
<h3>Crear componente</h3>
<form name="frmcompoe" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th></th>
      <th><label>Titulo: *&nbsp;&nbsp;<input name="titulo" tabindex="1" type="text" class="inp-form" size="45"></label></th>

    </tr>
    <tr>
      <th colspan="2" align="left">
      <fieldset><legend>Archivos:</legend>
      <label>Url:  com_<input type="text" name="url" tabindex="2" class="inp-form" /></label>
      <div style="float:right;">Archivo Inicio: &nbsp;&nbsp;<label><input type="text" name="ainicio" tabindex="3" style="text-align:right;" class="inp-form" />.php</label></div>
      </fieldset>
      </th>
    </tr>
    <tr>
      <th colspan="2">
      <fieldset><legend>BD:</legend>
      <div style="float:left;">
      <label>Nombre de Tabla:&nbsp;&nbsp;<input type="text" name="tablab" tabindex="4" class="inp-form" /></label><br /><br />
      <label>Campo Titulo:&nbsp;&nbsp;<input type="text" name="titulob" tabindex="4" class="inp-form" /></label><br /><br />
      <label>Campo Descripcion:&nbsp;&nbsp;<input type="text" name="describ" tabindex="4" class="inp-form" /></label>
      </div>
     <div style="float:right;">
     <label>Campo ID: &nbsp;&nbsp;<input type="text" name="idb" tabindex="5" class="inp-form" /></label><br /><br />
     <label>Campo Palabras: &nbsp;&nbsp;<input type="text" name="palab" tabindex="6" class="inp-form" /></label>
     </div>
      </fieldset>
      </th>
    </tr>
    <tr>
      <th>Descripcion:<br />
      <textarea name="descrip" cols="25" tabindex="7" rows="5" class="form-textarea"></textarea>
      </th>
      <th align="right">
      <label>E-mail: &nbsp;&nbsp;<input type="text" tabindex="8" name="email" class="inp-form" /></label><br />
      <label>Licencia: &nbsp;&nbsp;<input type="text" tabindex="9" name="licen" class="inp-form" /></label>
      </th>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td colspan="2" align="center">&nbsp;</td>
</tr>
    <tr>
      <td colspan="3" align="center"><strong>Activado</strong> :
      <label><input name="activado" type="radio" checked="checked" value="1">Activado</label><label><input type="radio" name="activado" value="2">Desactivado</label></td>
    </tr>
<tr>
      <th colspan="4" align="center"><br /><br />
      <center>
      <input type="button" value="cancelar" onclick="location.href='?lagc=com_componentes'" class="form-cancel">
      <input type="reset" value="Restablecer" class="form-reset">
      <input type="submit" value="Guardar" class="form-submit">
      </center>
      </th>
    </tr>
  </table>
</form>