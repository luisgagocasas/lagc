<script>
function Campo1($texto){ document.frmmodulo.img1.value = $texto; document.frmmodulo.img1.focus(); }
function Campo2($texto){ document.frmmodulo.img2.value = $texto; document.frmmodulo.img2.focus(); }
function Campo3($texto){ document.frmmodulo.img3.value = $texto; document.frmmodulo.img3.focus(); }
function Campo4($texto){ document.frmmodulo.img4.value = $texto; document.frmmodulo.img4.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=200","miventana","width=600,height=500,menubar=no");
}
</script>
<table width="560" border="0">
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('1');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['mod_tipvalor1']; ?>" name="img1" border="0" />
</div>
<input type="text" name="img1" value="<?=$cont['mod_tipvalor1']; ?>" onfocus="document.images.img1.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('2');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['mod_tipvalor2']; ?>" name="img2" border="0" />
</div>
<input type="text" name="img2" value="<?=$cont['mod_tipvalor2']; ?>" onfocus="document.images.img2.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('3');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['mod_tipvalor3']; ?>" name="img3" border="0" />
</div>
<input type="text" name="img3" value="<?=$cont['mod_tipvalor3']; ?>" onfocus="document.images.img3.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
<tr>
<td height="300" align="center" valign="middle">
<div class="fondoimg" style="width:680px; height:260px; cursor:pointer;" onclick="abrirventana('4');">
<img src="../../../componentes/com_imagenes/imagenes/<?=$cont['mod_tipvalor4']; ?>" name="img4" border="0" />
</div>
<input type="text" name="img4" value="<?=$cont['mod_tipvalor4']; ?>" onfocus="document.images.img4.src='../../../componentes/com_imagenes/imagenes/'+this.value" class="borderinputimg">
</td>
</tr>
</table>