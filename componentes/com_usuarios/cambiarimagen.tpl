<script>
function revisar() {
	if(camimg.archivo.value.length < 4) { alert('Seleccione una imagen') ; return false ; }
	if(camimg.tmptxt.value.length < 5) { alert('Ingrese el codigo de seguridad') ; return false ; }
}
</script>
<form name="frmfoto" method="post" enctype="multipart/form-data" action="" onSubmit="return revisar()">
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td><input name="archivo" type="file" /><br /><br /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><img src="administrador/utilidades/exampleView.php" width="68" height="25" style="margin:-7px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" />
        <input name="tmptxt" title="Copiar codigo aqui" type="text" size="5" style="text-align:center;" autocomplete="off" maxlength="5" /></td>
      <td></td>
    </tr>
  </table><center><input type="submit" value="Guardar" /></center>
  <br />
  <br />
</form>
<center>
<div style="color:#FFF; background:#FC3; text-align:left; border: 1px #FC0 solid; width:350px; padding:5px 5px;">
<b>Nota:</b><br />
-Solo esta permitido formato .Jpg, .Gif<br />
-Maximo tama&ntilde;o de la imagen 7MB
</div>
</center>