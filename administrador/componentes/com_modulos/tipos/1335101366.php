<?php LGlobal::Editor(); ?>
<script>
function Campo1($texto){ document.frmmodulo.img1.value = $texto; document.frmmodulo.img1.focus(); }
function abrirventana($cual){
	window.open("componentes/com_imagenes/class.upload.php?lagc="+$cual+"&thumwidth=300","miventana","width=600,height=500,menubar=no");
}
</script>
<table border="0">
  <tr>
    <th align="right" valign="top">Descripción: </th>
    <td><textarea name="contenido"><?=$cont[mod_tipvalor1]; ?></textarea><br />
<br /></td>
    </tr>
    <tr>
    <th align="right" valign="top">Imagen: </th>
      <td><div class="fondoimg" style="width:160px; height:100px; cursor:pointer;" onclick="abrirventana('1');"> <img src="../../../componentes/com_imagenes/thumbnails/<?=$cont[mod_tipvalor2]; ?>" name="img1" border="0" /> </div>
      <input type="text" name="img1" value="<?=$cont[mod_tipvalor2]; ?>" onfocus="document.images.img1.src='../../../componentes/com_imagenes/thumbnails/'+this.value" class="borderinputimg"></td>
  </tr>
  <tr>
    <th align="right" valign="top">Enlace:</th>
    <td><input name="enlace" class="inp-form" value="<?=$cont[mod_tipvalor3]; ?>" type="text" /></td>
  </tr>
</table>