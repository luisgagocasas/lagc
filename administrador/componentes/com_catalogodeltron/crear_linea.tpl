<div class="botonesdemando"><h3><a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_linea=<?=time(); ?>">&laquo; Atras</a> | Editando local: <em><?php echo $cont['cp_tnombre']; ?></em></h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Marcas: *</th>
            <td>
            <select name="grupo" class="styledselect_form_1">
            <?php
            $respgrupo = mysql_query("select * from cp_marcas order by cp_mnombre ASC");
            while($grupo = mysql_fetch_array($respgrupo)) {
            	if ($cont['cp_tmarca']==$grupo['cp_mid']) {
                	echo "<option value=\"".$grupo['cp_mid']."\" selected=\"selected\">".$grupo['cp_mnombre']."</option>";
                }
                else {
                	echo "<option value=\"".$grupo['cp_mid']."\">".$grupo['cp_mnombre']."</option>";
                }
            }
            ?>
            </select>
            <br /><br /></td>
          </tr>
           <tr>
            <th align="right" valign="top">Linea: *</th>
            <td><input name="titulo" type="text" maxlength="255" value="<?php echo $cont['cp_tnombre']; ?>" class="inp-form" size="36"><br /><br /></td>
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_linea=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>