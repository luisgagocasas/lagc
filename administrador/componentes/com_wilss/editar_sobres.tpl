<script language="javascript" type="text/javascript">
function enviar(pagina){
	document.frmcont.action = pagina;
	document.frmcont.submit();
}
function Campo1($texto){ document.frmcont.img1.value = $texto; document.frmcont.img1.focus(); }
function Campo2($texto){ document.frmcont.img2.value = $texto; document.frmcont.img2.focus(); }
function Campo3($texto){ document.frmcont.img3.value = $texto; document.frmcont.img3.focus(); }
function Campo4($texto){ document.frmcont.img4.value = $texto; document.frmcont.img4.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=160","miventana","width=600,height=500,menubar=no");
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_wilss&wilss=<?=time(); ?>&sobres=<?=time(); ?>">&laquo; Atras</a> | Editar Sobres</h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top">
<table width="560" border="0">
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('1');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['so_img1']; ?>" name="img1" border="0" />
</div>
<input type="text" name="img1" value="<?=$cont['so_img1']; ?>" onfocus="document.images.img1.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('2');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['so_img2']; ?>" name="img2" border="0" />
</div>
<input type="text" name="img2" value="<?=$cont['so_img2']; ?>" onfocus="document.images.img2.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('3');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['so_img3']; ?>" name="img3" border="0" />
</div>
<input type="text" name="img3" value="<?=$cont['so_img3']; ?>" onfocus="document.images.img3.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('4');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['so_img4']; ?>" name="img4" border="0" />
</div>
<input type="text" name="img4" value="<?=$cont['so_img4']; ?>" onfocus="document.images.img4.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
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
              <h5>Titulo</h5><br />
              <input name="titulo" type="text" class="inp-form" size="36" value="<?=$cont['so_nombre']; ?>">
              </div>
              <div class="clear"></div>
              <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Fechas</h5><br />
                <ul class="greyarrow">
                  <li>Creado el <a><?=date("Y/m/d", $cont['so_creado']); ?></a></li>
                  <?php if (!empty($cont['so_modificado'])) { ?><li>Modificado el: <a><?=date("Y/m/d", $cont['so_modificado']); ?></a></li><?php } ?>
                </ul>
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
                    if ($cont['so_estado']==$key) {
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_wilss&wilss=<?=time(); ?>&sobres=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        <input type="button" value="Aplicar" class="form-aplicar" onClick="enviar('<?="?lagc=com_wilss&wilss=".$_GET['wilss']."&editar_sobres=".LGlobal::Url_Amigable($_GET['editar_sobres']); ?>&aplicar=continuar')">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>