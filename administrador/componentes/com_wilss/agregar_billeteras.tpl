<script>
function Campo1($texto){ document.frmcont.img1.value = $texto; document.frmcont.img1.focus(); }
function Campo2($texto){ document.frmcont.img2.value = $texto; document.frmcont.img2.focus(); }
function Campo3($texto){ document.frmcont.img3.value = $texto; document.frmcont.img3.focus(); }
function Campo4($texto){ document.frmcont.img4.value = $texto; document.frmcont.img4.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=160","miventana","width=600,height=500,menubar=no");
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_wilss&wilss=<?=time(); ?>&correas=<?=time(); ?>">&laquo; Atras</a> | Crear Nuevo Articulo de Billeteras</h3></div>
<form name="frmcont" method="post" action="">
<center>
  <table border="0">
    <tr>
      <td valign="top">
<table width="560" border="0">
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('1');">
<img src="" name="img1" border="0" />
</div>
<input type="text" name="img1" value="" onfocus="document.images.img1.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('2');">
<img src="" name="img2" border="0" />
</div>
<input type="text" name="img2" value="" onfocus="document.images.img2.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('3');">
<img src="" name="img3" border="0" />
</div>
<input type="text" name="img3" value="" onfocus="document.images.img3.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('4');">
<img src="" name="img4" border="0" />
</div>
<input type="text" name="img4" value="" onfocus="document.images.img4.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
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
              <input name="titulo" type="text" class="inp-form" size="36">
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
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_wilss&wilss=<?=time(); ?>&correas=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>