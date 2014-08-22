<script>
function revisar() {
	if(frmcompoe.titulo.value.length < 4) { alert('Ingrese El Titulo') ; return false ; }
	if(frmcompoe.url.value.length < 4) { alert('Ingrese La Direccion Del Componente') ; return false ; }
	if(frmcompoe.ainicio.value.length < 4) { alert('Ingrese El Archivo de Inicio') ; return false ; }
	if(frmcompoe.licen.value.length < 4) { alert('Ingrese La Licencia') ; return false ; }
	if(frmcompoe.email.value.length < 4) { alert('Ingrese El E-mail') ; return false ; }
}
</script><br /><br />
<h3>Editando: <em><?php echo $compo['nombre']; ?></em></h3>
<form name="frmcompoe" method="post" action="" onSubmit="return revisar()">
  <table border="0" cellpadding="5">
    <tr>
      <th></th>
      <th><label>Titulo: *&nbsp;&nbsp;<input name="titulo" type="text" class="inp-form" size="45" value="<?php echo $compo['nombre']; ?>"></label></th>

    </tr>
    <tr>
      <th colspan="2" align="left">
      <fieldset><legend>Archivos:</legend>
      <label>Url:  com_<input type="text" name="url" class="inp-form" value="<?php echo substr($compo['url'], 4); ?>" /></label>
      <div style="float:right;">Archivo Inicio: &nbsp;&nbsp;<label><input type="text" name="ainicio" style="text-align:right;" value="<?php echo $compo['archivo']; ?>" class="inp-form" />.php</label></div>
      </fieldset>
      </th>
    </tr>
    <tr>
      <th colspan="2" align="left">
      <fieldset><legend>BD:</legend>
      <div style="float:left;">
      <label>Nombre de Tabla:&nbsp;&nbsp;<input type="text" name="tablab" class="inp-form" value="<?php echo $compo['campobd']; ?>" /></label><br /><br />
      <label>Campo Titulo:&nbsp;&nbsp;<input type="text" name="titulob" class="inp-form" value="<?php echo $compo['campotitulo']; ?>" /></label>
      <br /><br />
      <label>Campo Descripcion:&nbsp;&nbsp;<input type="text" name="describ" class="inp-form" value="<?php echo $compo['campodescrip']; ?>" /></label>
      </div>
     <div style="float:right;"><label>Campo ID:&nbsp;&nbsp; <input type="text" name="idb" class="inp-form" value="<?php echo $compo['campoid']; ?>" /></label><br /><br />
     <label>Campo Palabras: &nbsp;&nbsp;<input type="text" name="palab" class="inp-form" value="<?php echo $compo['campopalabras']; ?>" /></label>
     </div>
      </fieldset>
      </th>
    </tr>
    <tr>
      <th>Descripcion:<br />
      <textarea name="descrip" cols="25" rows="5" class="form-textarea"><?php echo $compo['descripcion']; ?></textarea>
      </th>
      <th align="right">
      <label>E-mail: &nbsp;&nbsp;<input type="text" name="email" class="inp-form" value="<?php echo $compo['email']; ?>" /></label><br />
      <label>Licencia: &nbsp;&nbsp;<input type="text" name="licen" class="inp-form" value="<?php echo $compo['licencia']; ?>" /></label>
      </th>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td colspan="2" align="center">&nbsp;</td>
</tr>
    <tr>
      <td colspan="3" align="center"><strong>Activado</strong> :
      <?php
    $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
    ksort($acti);
    foreach ($acti as $key => $val) {
        if ($compo['visible']==$key) {
        	echo $val;
        }
    } ?></td>
    </tr>
<tr>
      <th colspan="4" align="center"><br /><br />
      <input type="button" value="Cancelar" onclick="location.href='?lagc=com_componentes'" class="form-cancel">
      <input type="reset" name="Reset" value="Restablecer" class="form-reset">
      <input type="submit" name="button2" value="Guardar" class="form-guardar">
      </th>
    </tr>
  </table>
</form>