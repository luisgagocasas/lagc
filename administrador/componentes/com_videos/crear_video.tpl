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
    info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres adicionales";
  }
}
</script>
<script>
function Campo1($texto){ document.frmcont.img1.value = $texto; document.frmcont.img1.focus(); }
function Campo2($texto){ document.frmcont.img2.value = $texto; document.frmcont.img2.focus(); }
function Campo3($texto){ document.frmcont.img3.value = $texto; document.frmcont.img3.focus(); }
function Campo4($texto){ document.frmcont.img4.value = $texto; document.frmcont.img4.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=120","miventana","width=600,height=500,menubar=no");
}
function ver($ver) {
	document.getElementById('verimg').src = $ver;
	document.getElementById('imgvideo').value = $ver;
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_videos&videos=<?=time(); ?>&crear_procesa_video=<?=time(); ?>">&laquo; Atras</a> | <strong> Paso 2 | </strong>Creando Video </h3></div>
<form name="frmcont" method="post" action="">
<input name="urlvideo" type="hidden" value="<?=$youtube->ID(); ?>">
<center>
  <table border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Titulo: *</th>
            <td><input name="titulo" type="text" class="inp-form" value="<?=$youtube->getTitle()?>" size="36"><br /><br /></td>
          </tr>
          <tr>
            <th align="right" valign="top">Descripción: </th>
            <td><textarea id="form-textarea" name="resumen" onkeypress="return limita(event, 255, 'form-textarea');" onkeyup="actualizaInfo(255, 'form-textarea', 'info')" class="mceNoEditor" cols="40" rows="5"><?=$youtube->getDescription()?></textarea><br />
              <div id="info">M&aacute;ximo 255 caracteres</div><br />            </td>
            </tr>
            <tr>
            <th align="right" valign="top">Url del Video (Youtube): *</th>
            <td><div style="border:1px #000 solid; height:12px; padding:5px 5px;">http://www.youtube.com/watch?v=<?=$youtube->ID(); ?></div><br /><br /></td>
          </tr>
          <tr>
            <th colspan="2" align="right" valign="top">
            <?php $options = array('autoplay' => 2);?>
            <?=$youtube->getEmbeb($options);?>
            </th>
            </tr>
        </table></td>
      <td valign="top">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
            <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Imagen</h5><br />
			<div style="margin:0px 0px 10px 0px;"></div>
            <div class="fondoimg" style="width:160px; height:100px; cursor:pointer;" onclick="abrirventana('1');">
            <img src="<?=$youtube->getImageUrl('default')?>" name="img1" id="verimg" border="0" />
            </div>
            <input type="text" name="imgsend" id="imgvideo" value="<?=$youtube->getImageUrl('default')?>" onfocus="document.images.img1.src='../../../componentes/com_imagenes/thumbnails/'+this.value" class="borderinputimg"><br />
            <img src="<?=$youtube->getImageUrl(0);?>" onClick="ver('<?=$youtube->getImageUrl(0);?>');" name="img2" border="0" width="80" height="50" />
            <img src="<?=$youtube->getImageUrl(1);?>" onClick="ver('<?=$youtube->getImageUrl(1);?>');" name="img3" border="0" width="80" height="50" /><br />
            <img src="<?=$youtube->getImageUrl(2);?>" onClick="ver('<?=$youtube->getImageUrl(2);?>');" name="img4" border="0" width="80" height="50" />
            <img src="<?=$youtube->getImageUrl(3);?>" onClick="ver('<?=$youtube->getImageUrl(3);?>');" name="img5" border="0" width="80" height="50" />
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Categorias</h5><br />
                <select name="categoria" size="5" style="width:200px;">
                <?php
                $respcat = mysql_query("select * from video_categorias where vi_ca_estado='1'");
                while($cat = mysql_fetch_array($respcat)) {
                	if("1"==$cat['vi_ca_id']) {
                    	echo "<option value=\"".$cat['vi_ca_id']."\" selected=\"selected\">".$cat['vi_ca_titulo']."</option>";
                    }
                    else {
                    	echo "<option value=\"".$cat['vi_ca_id']."\">".$cat['vi_ca_titulo']."</option>";
                    }
                }
                ?>
                </select>
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Palabras Claves</h5><br />
              <span style="color:#CCC; font-size:10px;">Cada palabra separada por (,)</span>
                <input name="palabras" type="text" size="65" class="inp-form" />
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
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Comentarios</h5><br />
              <label><input name="comentario" type="radio" value="1">Activado</label>
              <label><input name="comentario" type="radio" checked="checked" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_videos&videos=<?=time(); ?>&categorias=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>