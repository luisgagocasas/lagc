<style type="text/css">
.componente-articulos{
	padding:3px 5px;
	margin:14px 10px 2px 30px;
}
.componente-articulos:hover{
	background:#EBEBEB;
	-moz-box-shadow:0px 0px 5px 2px #DBDBDB;
	-webkit-box-shadow:0px 0px 5px 2px #DBDBDB;
}
.componente-articulosshec{
	padding:3px 5px;
	margin:14px 10px 2px 30px;
	-moz-box-shadow:0px 0px 10px 2px #C0C0C0;
	-webkit-box-shadow:0px 0px 10px 2px #C0C0C0;
	background:#EBEBEB;
}
.componente-art{
	border:1px #CCC solid;
	margin:5px 20px;
	width:200px;
}
.componente-titulo{
	/*border:1px #000 solid;*/
}
.componente-marcar{
	/*border:1px #666 solid;*/
}
</style>

<div class="botonesdemando"><h3><a href="?lagc=com_modulos">&laquo; Atras</a> | Editar permisos del modulo <u><?php echo $cont['mod_nombre']; ?></u></h3></div>
<br /><br />
<center>
<?php $respposi = mysql_query("select * from mod_tipo where tip_id='".$cont['mod_tipo_id']."'"); $posic = mysql_fetch_array($respposi); ?>
<form name="frmmodulo" method="post" action="">
<?php Modulos::__MarcadosJava(); ?>
<input name="titulo" type="hidden" value="<?php echo $cont['mod_nombre']; ?>" />
  <table border="0">
    <tr>
      <td valign="top">
<div id="message-yellow">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td class="yellow-left">Seleccione los permisos que desea asignar a <u><?=$cont['mod_nombre']; ?></u>.</td>
    <td class="yellow-right"><a class="close-yellow"><img src="plantillas/lagc-peru/imagenes/table/icon_close_yellow.gif" border="0" /></a></td>
  </tr>
</table>
</div>
<?php Modulos::_Permisos($cont['mod_permisosplus']); ?>
	</td>
      <td valign="top"><div id="related-activities">
          <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
          <div id="related-act-bottom">
            <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Titulo:</h5>
                <?=$cont['mod_nombre']; ?>
              </div>
              <div class="clear"></div>
                <div class="lines-dotted-short"></div>
              <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
              <div class="right">
                <h5>Tipo</h5>
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