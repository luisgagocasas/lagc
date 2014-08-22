<?php
LGlobal::EditorCodigo('contenido', 'html');
if($fp = fopen($rutaarchivo, "r")){ $data = fread($fp, filesize($rutaarchivo)); fclose($fp); }
else { $data = ""; echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
?>
<script language="javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',noresizable'
	win = window.open(mypage,myname,settings)
}
</script>
<div class="botonesdemando"><h3><a href="?lagc=com_plantillas">&laquo; Atras</a> | Se esta editando <u><?=utf8_decode($plantilla->nombre); ?></u></h3></div>
<form name="formarchivo" action="" method="post">
<input type="hidden" name="nombreplan" value="<?=utf8_decode($plantilla->nombre); ?>" />
<input type="hidden" name="archivopla" value="<?=$rutaarchivo; ?>" />
<table width="100%" border="0" align="center">
  <tr>
    <td rowspan="2" align="center" valign="top">
    <br />
    <textarea name="contenido" id="contenido" cols="105" rows="60" readonly="readonly"><?php $archivos = str_replace('<', "&lt;", $data); echo $archivos; ?></textarea>
    </td>
    <td width="270" valign="top">
    <div id="related-activities">
        <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_bloque.gif" width="271" height="24" /> </div>
        <div id="related-act-bottom">
          <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" /></a></div>
            <div class="right">
              <h5>Datos de la Plantilla</h5>
              <br />
              <strong>Nombre Plantilla</strong>
              <ul class="greyarrow">
                <li><a><?=utf8_decode($plantilla->nombre); ?></a></li>
              </ul>
              <strong>Creador</strong>
              <ul class="greyarrow">
                <li><a><?=$plantilla->creador; ?></a></li>
              </ul>
               <strong>Logo</strong>
              <ul class="greyarrow">
                <li><a><img src="<?=$enableimg; ?>" width="100" border="0" /></a></li>
              </ul>
              <strong>Archivo de Inicio</strong>
              <ul class="greyarrow">
                <li><a><?=$plantilla->archivo; ?>.tpl</a></li>
              </ul>
              <strong>Hoja de estilos</strong>
              <ul class="greyarrow">
                <li><a><?=$plantilla->estilos; ?>.css</a></li>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <td valign="top">
    <div id="related-activities">
        <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_bloque.gif" width="271" height="24" /> </div>
        <div id="related-act-bottom">
          <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" /></a></div>
            <div class="right">
              <h5>Posicion de modulos existentes </h5>
            </div>
            <div class="clear"></div>
            <div class="lines-dotted-short"></div>
            <div style="overflow:scroll; overflow-x:hidden; height:230px; width:230px; float:left;">
            <?php
            $respposi = mysql_query("select * from mod_posiciones");
            while($posic = mysql_fetch_array($respposi)) {
                echo "&lt;?="."$"."LagcPeru"."->"."Modulos"."(\""."".$posic['mod_nombre'].""."\")".";"." ?>";
                echo "<div class=\"clear\"></div>";
                echo "<div class=\"lines-dotted-short\"></div>";
            }
            ?>
            </div>
            <div class="left"><br />
            <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>-Ingrese la posicion en el editor de la plantilla para cambiar la ubicacion de los modulos.</p><p class=\'espacio-ventana\'>-Estas posiciones solo estan disponibles para el sitio aun no para el administrador.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ayuda</a>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div id="related-activities">
        <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_bloque.gif" width="271" height="24" /> </div>
        <div id="related-act-bottom">
          <div id="related-act-inner">
            <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" width="21" height="21" /></a></div>
            <div class="right">
              <h5>Archivos de la Plantilla</h5>
            </div>
            <br />
            <div class="clear"></div>
            <div class="lines-dotted-short"></div>
            <div style="overflow:scroll; overflow-x:hidden; height:230px; width:230px; float:left;">
            <?php Plantillas::_ArchivosPlantilla($ruta, "?lagc=com_plantillas&plantillas=".$_GET['plantillas']."&editar_plantilla=".$_GET['editar_plantilla'].""); ?>
            </div>
            <div class="clear"></div>
            <div class="lines-dotted-short"></div>
            <div class="left">
            <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>-Archivos de la plantilla.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ayuda</a>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <input type="button" value="Cancelar" onclick="location.href='?lagc=com_plantillas'" class="form-cancel" />
    <input type="reset" name="Reset" value="Restablecer" class="form-reset" />
    <input type="submit" value="Guardar" class="form-guardar" />
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>