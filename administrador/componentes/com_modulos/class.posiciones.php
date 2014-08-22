<?php
/*
Creado por Luis Gago ©
E-mail: webmaster@portuhermana.com
Soporte: luisgago@lagc-peru.com
*/
class Posiciones {
	function Inicio() { ?>
    <h3><img src="plantillas/lagc-peru/imagenes/forms/icon_list_arrow.gif" border="0" /> Posiciones</h3>
    <div class="botonesdemando">
    <a href="?lagc=com_modulos"><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" border="0" /> Modulos</a>
    <a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones_crear=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" border="0" /> Nueva Posici&oacute;n</a>
    </div><br />
    <table align="left" cellspacing="5" id="product-table">
      <tr>
        <th class="table-header-check"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>-El campo \'<strong>Nombre de la Posici&oacute;n</strong>\'. se usara en la plantilla como punto de referencia para cada posici&oacute;n.</p><p class=\'espacio-ventana\'>-Copiar y Pegar.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a></th>
        <th class="table-header-repeat line-left"><a href="">Nombre de la Posici&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Modificado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
      <?php $respmod = mysql_query("select * from mod_posiciones order by mod_id ASC");
	  while($mod = mysql_fetch_array($respmod)) {
		  $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td bgcolor="#666666" style="color:#FFF;"><strong><?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?></strong></td>
        <td><?php if(!empty($mod['fecha'])){ echo date("Y/m/d", $mod['fecha']); } ?></td>
        <td><?php if(!empty($mod['modificado'])) { echo date("Y/m/d", $mod['modificado']); } ?></td>
        <td><?php echo Posiciones::Activoc($mod['activado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&posiciones_editar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&posiciones_borrar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Copea y Pega \' <strong><?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?></strong> \' en una plantilla para que se intgre el modulo.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-5 info-tooltip"></a>
        </td>
      </tr>
      <?php }
	  else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td bgcolor="#666666" style="color:#FFF;"><strong><?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?></strong></td>
        <td><?php if(!empty($mod['fecha'])){ echo date("Y/m/d", $mod['fecha']); } ?></td>
        <td><?php if(!empty($mod['modificado'])) { echo date("Y/m/d", $mod['modificado']); } ?></td>
        <td><?php echo Posiciones::Activoc($mod['activado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&posiciones_editar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&posiciones_borrar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Copea y Pega \' <strong><?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?></strong> \' en una plantilla para que se intgre el modulo.</p>');return false;" title="Mas Informaci&oacute;n" class="icon-5 info-tooltip"></a>
        </td>
      </tr>
      <?php
	  }
	  } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "<strong>Desactivado</strong>"; }
		return $result;
	}
	function Crear() {
		if (empty($_POST['titulo'])) {
			@include "componentes/com_modulos/crear_posicion.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO mod_posiciones (mod_nombre, mod_codeinicio, mod_codefin, fecha, activado) VALUES ('".$_POST['titulo']."', '".$_POST['inicio']."', '".$_POST['fin']."', '".time()."', '".$_POST['activado']."')";
			$respcont = mysql_query("select * from mod_posiciones ORDER BY mod_id DESC");
			$cantregistros = mysql_fetch_array($respcont);
			$cantregistros = $cantregistros['mod_id']+1;
			if ($_GET['crear']!='continuar') {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&posiciones=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".$cantregistros."&posiciones_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from mod_posiciones where mod_id='".$id."'");
			$cont = mysql_fetch_array($respcont);
			if (!empty($cont['mod_id']) and $url==LGlobal::Url_Amigable($cont['mod_nombre'])) {
			@include "componentes/com_modulos/editar_posicion.tpl";
			} else { echo "<br><center><h3>No existe la posici&oacute;n</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['vertitulo'])) { $vertitu = "0"; } else { $vertitu = "1"; } if (empty($_POST['verresumen'])) { $verresu = "0"; } else { $verresu = "1"; }
			$sql = "UPDATE mod_posiciones SET mod_nombre='".$_POST['titulo']."', mod_codeinicio='".$_POST['inicio']."', mod_codefin='".$_POST['fin']."', modificado='".time()."', activado='".$_POST['activado']."' WHERE mod_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if (empty($_GET['aplicar'])) {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&posiciones=".time()."'\", 1500) </script>
			<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".$id."&posiciones_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from mod_posiciones where mod_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['mod_id']) and $titulo==LGlobal::Url_Amigable($conte['mod_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['mod_id']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['mod_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['mod_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones=<?php echo time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM mod_posiciones WHERE mod_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE mod_posiciones AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&posiciones=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
?>