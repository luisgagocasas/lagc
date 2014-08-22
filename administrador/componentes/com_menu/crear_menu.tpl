<script language="javascript" type="text/javascript">
function enviar(pagina){
document.frmmenus.action = pagina;
document.frmmenus.submit();
}
function revisar() {
	if(frmmenus.titulo.value.length < 4) { alert('Ingrese el titulo') ; return false ; }
}
</script>
<h3>Creando nuevo enlace</h3>
<form name="frmmenus" method="post" action="" onSubmit="return revisar()">
<center>
<table border="0">
  <tr>
    <td valign="top">
    <table border="0" cellpadding="5">
    <tr>
      <th align="right" valign="top">Titulo: *</th>
      <td><input name="titulo" type="text" class="inp-form" value=""><br /><br /></td>
    </tr>
    <tr align="right">
      <th colspan="2"></th>
    </tr>
<tr>
      <th align="right" valign="top">Menus: *
      </th>
      <td colspan="3">
      <input type="hidden" name="posicion" value="<?=$_GET['enlaces_nuevo']; ?>" />
      <select name="otrosenlaces" size="10" style="width:200px;">
      <option value="" selected="selected">---------------[Superior]---------------</option>
      <?php echo Menu::MenusSelec($_GET['enlaces_nuevo']); ?>
      </select><br /><br />
      </td>
      </tr>
<tr>
  <th align="right" valign="top">Enlaces: *</th>
  <td colspan="3">
  <select name="enlaces" size="13" style="width:200px;">
  <?php Menu::Componentes_Selec_Com("-1|3"); ?>
  </select>
  <br /><br />
  </td>
  </tr>
<tr>
  <th align="right" valign="top">Destino:</th>
  <td colspan="3"><input name="como" type="text" maxlength="10" value="" class="inp-form" />
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
              <h5>Estilos (CSS)</h5><br />
              <h4>Lista < li ></h4>
                <table border="0">
              <tr>
              <td><select name="cstipoli"><option value="1">id</option><option value="2">class</option></select> </td>
              <td>&nbsp;&nbsp;<input name="cssli" type="text" maxlength="10" value="" class="inp-form1" /></td>
              </tr>
              </table>
                <span style="color:#999; font-size:10px;"><strong>Ejemplo:</strong>estilo1</span>
                <br /><br />
                <h4>Enlace < a ></h4>
              <table border="0">
              <tr>
              <td><select name="cstipoa"><option value="1">id</option><option value="2">class</option></select> </td>
              <td>&nbsp;&nbsp;<input name="cssa" type="text" maxlength="10" value="" class="inp-form1" /></td>
              </tr>
              </table>
                <span style="color:#999; font-size:10px;"><strong>Ejemplo:</strong>estilo1</span>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Orden</h5><br />
                <input name="orden" type="text" maxlength="3" value="" class="inp-form1" /><br />
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
              <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
              <label><input name="activado" type="radio" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        Ojo. Campos Marcados con <strong>*</strong> son Obligatorios<br />
        <input type="button" value="Cancelar" onclick="location.href='<?=Menu::PosicionMenuEnlace($_GET['enlaces_nuevo']); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('?lagc=com_menu&menus=continuar&enlaces_nuevo=<?=$_GET['enlaces_nuevo']; ?>')">
        </center>
	</td>
  </tr>
</table>
</center>
</form>