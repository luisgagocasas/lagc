<script language="javascript" type="text/javascript">
function enviar(pagina){
document.frmmenus.action = pagina;
document.frmmenus.submit();
}
function revisar() {
	if(frmmenus.titulo.value.length < 4) { alert('Ingrese el titulo') ; return false ; }
}
</script>
<h3>Editando sub menu: <em><?php echo $cont['m_subnombre']; ?></em></h3>
<form name="frmmenus" method="post" action="" onSubmit="return revisar()">
<center>
<table border="0">
  <tr>
    <td valign="top">
    <table border="0" cellpadding="5">
    <tr>
      <th align="right" valign="top">Titulo: *</th>
      <td><input name="titulo" type="text" class="inp-form" size="45" value="<?php echo $cont['m_subnombre']; ?>"><br /><br /></td>
    </tr>
    <tr align="right">
      <th colspan="2"></th>
    </tr>
<tr>
      <th align="right" valign="top">Menus: *
      </th>
      <td colspan="3">
    <input type="hidden" name="posicion" value="<?php echo $cont['m_subposi']; ?>" />
	<select name="otrosenlaces" multiple="multiple" size="10" style="width:200px;">
    <option value="">---------------[Superior]---------------</option>
    <?php echo Menu::MenusSelec($cont['m_subposi'], $cont['m_subidm'], $_GET['menus']); ?>
	</select><br /><br />
      </td>
      </tr>
<tr>
  <th align="right" valign="top">Enlaces: *</th>
  <td colspan="3">
  <select name="enlaces" size="13" style="width:200px;">
  <?php Menu::Componentes_Selec_Com($cont['m_subcomponente']); ?>
  </select>
  <br /><br />
  </td>
  </tr>
<tr>
  <th align="right" valign="top">Se abria como:</th>
  <td colspan="3"><input name="como" type="text" size="65" maxlength="10" value="<?php echo $cont['m_subtarget']; ?>" class="inp-form" />
  <br /><span style="color:#999; font-size:10px;"><strong>Ejemplo:</strong>_blank</span></td>
  </tr>
    </table>
  </td>
    <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Fechas</h5><br />
                <ul class="greyarrow">
                  <li>Creado el <a><?php echo date("Y/m/d", $cont['m_subfecha']); ?></a></li>
                  <?php if (!empty($cont['m_submodificado'])) { ?><li>Modificado el: <a><?php echo date("Y/m/d", $cont['m_submodificado']); ?></a></li><?php } ?>
                </ul>
              </div>

              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Estilo</h5><br />
                <input name="css" type="text" size="65" maxlength="10" value="<?php echo $cont['m_subcss']; ?>" class="inp-form" /><br />
                <span style="color:#999; font-size:10px;"><strong>Ejemplo:</strong>.estilo1</span>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Orden</h5><br />
                <input name="orden" type="text" size="65" maxlength="3" value="<?php echo $cont['m_suborden']; ?>" class="inp-form" /><br />
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
    if ($cont['activado']==$key) {
    	echo $val;
    }
}
?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='<?php echo Menu::PosicionMenuEnlace($cont['m_subposi']); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('<?php echo "?lagc=com_menu&menus=".$id."&enlaces_aplicarsub=".$url; ?>')">
        </center>
	</td>
  </tr>
</table>
</center>
</form>