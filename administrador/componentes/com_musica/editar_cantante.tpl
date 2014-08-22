<div class="botonesdemando"><h3><a href="?lagc=com_musica&musica=<?=time(); ?>&cantante_musica=<?=time(); ?>">&laquo; Atras</a> | Editando: <em><?=$cont['cantan_nombre']; ?></em></h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right">Nombre: *</th>
            <td><input name="titulo" type="text" value="<?=$cont['cantan_nombre']; ?>" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Generos: *</th>
            <td><table>
              <tr>
                <td>
                  <select name="generos[]" size="13" style="width:200px;" multiple="multiple">
                <?php Cantantes::_SelecGenero($cont['cantan_generos']); ?>
              </select>
                </td>
                <td style="padding:0px 15px;">*Puede seleccionar<br>varios generos</td>
              </tr>
            </table>
              <br /><br /></td>
          </tr>
          <tr>
            <th align="right">Historia: </th>
            <td><textarea name="resumen" class="form-textarea" cols="40" rows="5"><?=$cont['cantan_descripcion']; ?></textarea><br /><br /></td>
          </tr>
          <tr>
            <th align="right">A&ntilde;o Inicio: </th>
            <td><input name="anioinic" type="text" value="<?=$cont['cantan_anio']; ?>" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Pais de Origen: </th>
            <td><input name="paisori" type="text" value="<?=$cont['cantan_pais']; ?>" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Ultimos Premios: </th>
            <td><textarea name="premios" class="form-textarea" cols="40" rows="5"><?=$cont['cantan_premios']; ?></textarea><br /><br /></td>
          </tr>
          <tr>
            <th align="right">Css: *</th>
            <td><textarea name="css" class="form-textarea" cols="40" rows="5"><?=$cont['cantan_css']; ?></textarea><br /><br /></td>
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
                <?php
                $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\">Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                    if ($cont['cantan_activo']==$key) {
                    	echo $val;
                    }
                } ?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica&musica=<?=time(); ?>&cantante_musica=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>