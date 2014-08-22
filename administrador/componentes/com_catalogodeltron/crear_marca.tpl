<div class="botonesdemando"><h3><a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_marcas=<?=time(); ?>">&laquo; Atras</a> | Crear nueva Marca</h3></div>
<script>
function revisar() {
	if(frmcont.titulo.value.length < 2) { alert('Ingrese El Titulo') ; return false ; }
	if(frmcont.archivo.value.length < 1) { alert('Seleccione una imagen') ; return false ; }
}
</script>
<form name="frmcont" method="post" enctype="multipart/form-data" action="" onSubmit="return revisar()">
<center>
  <table width="100%" border="0">
    <tr>
      <td valign="top"><table border="0" cellpadding="5">
          <tr>
            <th align="right" valign="top">Nombre: *</th>
            <td><input name="titulo" type="text" maxlength="255" class="inp-form" size="36"><br /><br /></td>
          </tr>
          <?php /*?><tr>
            <th align="right" valign="top">Grupos: *</th>
            <td>
            <select name="grupo" class="styledselect_form_1">
            <?php
            $respgrupo = mysql_query("select * from cp_grupo where cp_gactivo='1' order by cp_gnombre ASC");
            while($grupo = mysql_fetch_array($respgrupo)) {
            	echo "<option value=\"".$grupo['cp_gid']."\">".$grupo['cp_gnombre']."</option>";
            }
            ?>
            </select>
            <br /><br /></td>
          </tr><?php */?>
          <tr>
            <th align="right" valign="top">Selecciona la Imagen: </th>
            <td><input name="archivo" type="file" class="file_1" /> <br /><strong>Ojo:</strong> Solo archivos .jpg, .JPG, .gif, .GIF - Maximo tama&ntilde;o: 2 MB<br /><br /></td>
          </tr>
          <tr>
            <th colspan="3" align="center">
            </th>
          </tr>
        </table></td>
      <td valign="top" width="260">
        <div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
              <h5>Activado</h5><br />
                <label><input name="activado" type="radio" checked="checked" value="1">Activado</label>
                <label><input type="radio" name="activado" value="2">Desactivado</label>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <center>
        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_marcas=<?=time(); ?>'" class="form-cancel">
        <input type="reset" name="Reset" value="Restablecer" class="form-reset"><br />
        <input type="submit" value="Guardar" class="form-guardar">
        </center>
	</td>
    </tr>
  </table>
  </center>
</form>