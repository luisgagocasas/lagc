<div class="botonesdemando"><h3><a href="?lagc=com_blog">&laquo; Atras</a> | Visualizando: <em><?=$cont['b_titulo']; ?></em></h3></div>
<form name="frmcont" method="post" action="">
<input name="titulo" type="hidden" value="<?=$cont['b_titulo']; ?>">
<center>
  <table border="0">
    <tr>
      <td valign="top">
        <hr>
        <table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo:</th>
            <td colspan="2"><?=$cont['b_titulo']; ?><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Resumen: </th>
            <td><?=$cont['b_resumen']; ?><br />
            <br /></td>
            <td><div style="margin:0px 0px -20px 0px;"></div>
            <img src="../../../componentes/com_imagenes/thumbnails/<?=$cont['b_img']; ?>" name="img1" border="0" />
            </td>
          </tr>
          <tr>
            <th align="right" valign="top">Descripci&oacute;n<br />Completa:</th>
            <td colspan="2" align="left">
            <label><?=$cont['b_contenido']; ?></label>
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
                <label><input type="checkbox" name="resumen" <?=Blog::LGcheck($cont['b_resumen_activar']); ?> value="1" />
                Mostrar Resumen</label><br />
                <label><input type="checkbox" name="formulario" <?=Blog::LGcheck($cont['b_form_coment_act']); ?> value="1" />
                Mostrar Formulario de Comentarios</label><br />
                <label><input type="checkbox" name="comentario" <?=Blog::LGcheck($cont['b_coment_act']); ?> value="1" />
                Mostrar Comentarios</label>
              </div>
              <div class="clear"></div>
               <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Categoria</h5><br />
              <select name="categoria" size="5" style="width:200px;">
              <?php
              $respcat = mysql_query("select * from blog_categorias where cat_activado='1'");
              while($cat = mysql_fetch_array($respcat)) {
                if ($cont['b_categoria']==$cat['cat_id']) {
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
                <h5>Creado Por:</h5><br />
                <ul class="greyarrow">
                  <li>Redacto <a><?=LGlobal::Url_Usuario($cont['b_autor'], true, false, "_blank", "../"); ?></a></li>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Fechas</h5><br />
                <ul class="greyarrow">
                  <li>Creado el <a><?=date("Y/m/d", $cont['b_fecha']); ?></a></li>
                  <?php if (!empty($cont['b_fechamodi'])) { ?><li>Modificado el: <a><?=date("Y/m/d", $cont['b_fechamodi']); ?></a></li><?php } ?>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" /></a></div>
              <div class="right">
              <h5>Palabras Claves</h5><br />
                <?=$cont['b_palabras']; ?>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Estado del Articulo</h5><br />
                <?php
                $acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\"> Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\"> Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                    if ($cont['b_activo']==$key) {
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
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>