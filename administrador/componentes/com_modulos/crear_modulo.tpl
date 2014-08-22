<script>
function revisar() {
	if(frmmodulo.titulo_lagc.value.length < 4) { alert('Ingrese el Titulo. Minimo 4 caracteres') ; return false ; }
}
</script>
<br />
<br />
<div id="step-holder">
  <div class="step-no-off">1</div>
  <div class="step-light-left"><a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&modulo_primerpaso=<?php echo time(); ?>">Seleccione un Tipo</a></div>
  <div class="step-light-right">&nbsp;</div>
  <div class="step-no">2</div>
  <div class="step-dark-left">Finalizar</div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>
<br />
<br />
<center>
<?php $respposi = mysql_query("select * from mod_tipo where tip_id='".$_GET['modulos']."'"); $posic = mysql_fetch_array($respposi);
$nuevosvalores = explode('|', $posic['tip_tipvalor1']);
?>
  <?php echo "\n".$posic['tip_cabecera']."\n"; ?>
  <form name="frmmodulo" method="post" action="" onSubmit="return revisar()">
    <input name="tipo_lagc" type="hidden" value="<?=$_GET['modulos']; ?>" />
    <?php
    if ($posic['tip_savetipo']=="1") {
    	echo "<input name=\"saveen_lagc\" type=\"hidden\" value=\"".$posic['tip_savetipo']."\" />\n";
    }
    else if ($posic['tip_savetipo']=="2") {
    	echo "<input name=\"saveen_lagc\" type=\"hidden\" value=\"".$posic['tip_savetipo']."\" />\n";
    }
    ?>
    <table border="0">
      <tr>
        <td valign="top"><div id="message-yellow">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td class="yellow-left"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Proximamente</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Programacion del Tipo <u><?php echo $posic['tip_nombre']; ?></u>.</td>
                <td class="yellow-right"><a class="close-yellow"><img src="plantillas/lagc-peru/imagenes/table/icon_close_yellow.gif" border="0" /></a></td>
              </tr>
            </table>
          </div>
          <?php
$archivo = "componentes/com_modulos/tipos/".$posic['tip_archivo'];
if($fp = fopen($archivo, "r")){ include $archivo; } /*incluimos el archivo*/
else { echo "<h3>Error</h3>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
?></td>
        <td valign="top"><div id="related-activities">
            <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
            <div id="related-act-bottom">
              <div id="related-act-inner">
                <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                  <h5><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Nombre del Modulo</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a> Titulo: *</h5>
                  <br />
                  <input name="titulo_lagc" maxlength="255" type="text" class="inp-form">
                </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5> Opciones Para Mostrar</h5>
                <br />
                <input type="checkbox" name="vertitulo" value="1" /> Mostrar Titulo
              </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
                <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                  <h5>Tipo</h5>
                  <br />
                  <?php $respposi = mysql_query("select * from mod_tipo where tip_id='".$_GET['modulos']."'"); $posic = mysql_fetch_array($respposi); ?>
                  <ul class="greyarrow">
                    <li><?php echo "<strong>".$posic['tip_nombre']."</strong>"; ?></li>
                  </ul>
                </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
                <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                  <h5>Orden</h5>
                  <br />
                  <input type="text" name="orden_lagc" class="inp-form1" />
                </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
                <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                  <h5>Posiciones</h5>
                  <br />
                  <select name="posiciones_lagc" class="styledselect_form_1">
                <?php
                $respposi = mysql_query("select * from mod_posiciones");
                while($posic = mysql_fetch_array($respposi)) {
                	echo "<option value=\"".$posic['mod_id']."\">".$posic['mod_nombre']."</option>";
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
                	<?php Modulos::Componentes_Selec_Com(); ?>
                </select>
              </div>
                <div class="clear"></div>
                <div class="lines-dotted-short"></div>
                <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                <div class="right">
                  <h5>Activado</h5>
                  <br />
                 <label><input name="activado_lagc" type="radio" checked="checked" value="1">Activado</label>
                 <label><input type="radio" name="activado_lagc" value="2">Desactivado</label>
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
<br />
<br />
<div id="step-holder">
  <div class="step-no-off">1</div>
  <div class="step-light-left"><a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&modulo_primerpaso=<?php echo time(); ?>">Seleccione un Tipo</a></div>
  <div class="step-light-right">&nbsp;</div>
  <div class="step-no">2</div>
  <div class="step-dark-left">Finalizar</div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>