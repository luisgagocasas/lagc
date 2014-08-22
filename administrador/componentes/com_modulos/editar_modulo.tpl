<script language="javascript" type="text/javascript">
function enviar(pagina){
document.frmmodulo.action = pagina;
document.frmmodulo.submit();
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_modulos">&laquo; Atras</a> | Editando el modulo <u><?php echo $cont['mod_nombre']; ?></u></h3></div>
<br /><br />
<center>
<?php $respposi = mysql_query("select * from mod_tipo where tip_id='".$cont['mod_tipo_id']."'"); $posic = mysql_fetch_array($respposi);
$nuevosvalores = explode('|', $posic['tip_tipvalor1']);
?>
<?php echo "\n".$posic['tip_cabecera']."\n"; ?>
<form name="frmmodulo" enctype="multipart/form-data" method="post" action="">
<input name="tipo" type="hidden" value="<?php echo $cont['mod_tipo_id']; ?>" />
  <table border="0">
    <tr>
      <td valign="top">
<div id="message-yellow">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td class="yellow-left"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Proximamente</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Programacion del Tipo <u><?php echo $posic['tip_nombre']; ?></u>.</td>
    <td class="yellow-right"><a class="close-yellow"><img src="plantillas/lagc-peru/imagenes/table/icon_close_yellow.gif" border="0" /></a></td>
  </tr>
</table>
</div>
<?php
$archivo = "componentes/com_modulos/tipos/".$posic['tip_archivo'];
if($fp = fopen($archivo, "r")){ @include $archivo; } /*incluimos el archivo*/
else { echo "<h3>Error</h3>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
?>
	</td>
      <td valign="top"><div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Nombre del Modulo</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Titulo: *</h5>
                <input name="titulo_lagc" type="text" value="<?php echo $cont['mod_nombre']; ?>" class="inp-form">
              </div>
              <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5> Opciones Para Mostrar</h5>
                <input type="checkbox" name="vertitulo" <?php echo Modulos::LGcheck($cont['mod_vertitu']); ?> value="1" /> Mostrar Titulo
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Tipo</h5>
                <?php $respposi = mysql_query("select * from mod_tipo where tip_id='".$cont['mod_tipo_id']."'"); $posic = mysql_fetch_array($respposi); ?>
                <ul class="greyarrow">
                	<li><?php echo "<strong>".$posic['tip_nombre']."</strong>"; ?></li>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Fechas</h5>
                <ul class="greyarrow">
                  <li>Creado el <a><?php echo date("Y/m/d", $cont['mod_fecha']); ?></a></li>
                  <?php if (!empty($cont['mod_modificado'])) { ?><li>Modificado el: <a><?php echo date("Y/m/d", $cont['mod_modificado']); ?></a></li><?php } ?>
                </ul>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Orden</h5>
               <input type="text" name="orden" class="inp-form1" value="<?php echo $cont['mod_orden']; ?>" />
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Posiciones</h5>
               <select name="posiciones" class="styledselect_form_1">
                <?php
                $respposi = mysql_query("select * from mod_posiciones");
                while($posic = mysql_fetch_array($respposi)) {
                    if ($posic['mod_id']==$cont['mod_posicion_id']) {
                        echo "<option value=\"".$posic['mod_id']."\" selected=\"selected\">".$posic['mod_nombre']."</option>";
                    }
                    else {
                        echo "<option value=\"".$posic['mod_id']."\">".$posic['mod_nombre']."</option>";
                    }
                }
                ?>
                </select>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Permisos</h5>
                <select name="permisos[]" size="13" style="width:200px;" multiple="multiple">
                	<?php Modulos::Componentes_Selec_Com($cont['mod_permisos']); ?>
                </select>
              </div>
              <div style="float:right;">
              <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>.-Los <b>Permisos</b> Corresponde a donde se visualizara este modulo. Segun cada componente y cada articulo creado.</p><p class=\'espacio-ventana\'>.-Para mas opciones de permisos <a href=\'#\'>Clic Aqui</a>.</p>');return false;" title="Mas Informaci&oacute;n">Saber Mas...</a>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Activado</h5>
                <?php
                $acti = array("1"=>"<label><input name=\"activado_lagc\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado_lagc\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activado_lagc\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activado_lagc\" checked=\"checked\" value=\"2\">Desactivado</label>");
                ksort($acti);
                foreach ($acti as $key => $val) {
                	if ($cont['mod_activo']==$key) {
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
          <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos'" class="form-cancel">
          <input type="reset" name="Reset" value="Restablecer" class="form-reset">
          <br />
          <input type="submit" value="Guardar" class="form-guardar">
        </center></td>
    </tr>
  </table>
  </form>
</center>