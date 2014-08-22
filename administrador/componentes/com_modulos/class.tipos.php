<?php
/*
Creado por Luis Gago ©
E-mail: webmaster@portuhermana.com
Soporte: luisgago@lagc-peru.com
*/
class Tipos {
	function Inicio() {?>
    <h3><img src="plantillas/lagc-peru/imagenes/forms/icon_list_arrow.gif" border="0" /> Tipos</h3>
    <div class="botonesdemando">
    <a href="?lagc=com_modulos"><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" border="0" /> Modulos</a>
    <a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos_crear=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" border="0" /> Nuevo Tipo</a>
    </div><br />
    <table align="left" cellspacing="5" id="product-table">
      <tr>
        <th class="table-header-check"><a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>- Proximamente...</p>');return false;" title="Mas Informaci&oacute;n" class="icon-6 info-tooltip"></a></th>
        <th class="table-header-repeat line-left"><a href="">Titulo del Componente</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Modificado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
      <?php $respmod = mysql_query("select * from mod_tipo order by tip_id ASC");
	  while($mod = mysql_fetch_array($respmod)) {
		  $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $mod['tip_nombre']; ?></strong></td>
        <td><?php if(!empty($mod['tip_fecha'])){ echo date("Y/m/d", $mod['tip_fecha']); } ?></td>
        <td><?php if(!empty($mod['tip_modificado'])) { echo date("Y/m/d", $mod['tip_modificado']); } ?></td>
        <td><?php echo Posiciones::Activoc($mod['tip_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_editar=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Editar Administrador" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_editar_site=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Editar Web" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_borrar=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
      <?php }
	  else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $mod['tip_nombre']; ?></strong></td>
        <td><?php if(!empty($mod['tip_fecha'])){ echo date("Y/m/d", $mod['tip_fecha']); } ?></td>
        <td><?php if(!empty($mod['tip_modificado'])) { echo date("Y/m/d", $mod['tip_modificado']); } ?></td>
        <td><?php echo Posiciones::Activoc($mod['tip_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_editar=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Editar Administrador" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_editar_site=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Editar Web" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_modulos&modulos=<?php echo $mod['tip_id']; ?>&tipos_borrar=<?php echo LGlobal::Url_Amigable($mod['tip_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
      <?php
	  }
	  } ?>
    </table>
    <?php
	}
	function Crear() {
		if (empty($_POST['titulo_lagc'])) {
			@include "componentes/com_modulos/crear_tipo.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$tiemposv = time();
			$sql = "INSERT INTO mod_tipo (tip_nombre, tip_lenguaje, tip_cabecera, tip_archivo, tip_savetipo, tip_fecha, tip_activo, tip_tipvalor1) VALUES ('".$_POST['titulo_lagc']."', '".$_POST['lenguaje_lagc']."', '".$_POST['codcabe_lagc']."', '".$tiemposv.".php', '".$_POST['saveusofin_lagc']."', '".time()."', '".$_POST['activado_lagc']."', '".$_POST['camp1']."|".$_POST['camp2']."|".$_POST['camp3']."|".$_POST['camp4']."')";
			$archivo = 'componentes/com_modulos/tipos/'.$tiemposv.'.php';
			$fp = fopen($archivo, "a");
			$string = $_POST['contenido_lagc'];
			fwrite($fp, $string);
			$archivo2 = '../componentes/com_modulos/'.$tiemposv.'.php';
			fopen($archivo2, "a");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".$tiemposv."&tipos=".$tiemposv."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo_lagc'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo_lagc'])) {
			$respcont = mysql_query("select * from mod_tipo where tip_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['tip_id']) and $url==LGlobal::Url_Amigable($cont['tip_nombre'])) {
				$archadmin = "componentes/com_modulos/tipos/".$cont['tip_archivo'];
				if (file_exists($archadmin)) {
					@include "componentes/com_modulos/editar_tipo.tpl";
				} else { echo "Error abriendo\n"; }
			} else { echo "<center><h3>noce pudo encontrar el tipo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$archivos = $_POST['ubc_lagc'];
			$newdata = $_POST['codigocont_lagc'];
			  if(@$fp = fopen($archivos, "w")){
				  fwrite($fp, stripslashes($newdata));
				  fclose($fp);
				  echo "<br><br><center><h3>Se pudo escribir correctamente.</h3></center>";
			  }
			  else {
			  	echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
			  }
			$sql = "UPDATE mod_tipo SET tip_nombre='".$_POST['titulo_lagc']."', tip_lenguaje='".$_POST['lenguaje_lagc']."', tip_cabecera='".$_POST['codigoccabecera_lagc']."', tip_savetipo='".$_POST['saveusofin_lagc']."', tip_modificado='".time()."', tip_activo='".$_POST['activado_lagc']."', tip_tipvalor1='".$_POST['camp1']."|".$_POST['camp2']."|".$_POST['camp3']."|".$_POST['camp4']."' WHERE tip_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>".mysql_error()."</b>");
			/*donde ira despues de guardar*/
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&tipos=".time()."'\", 1500) </script>
			<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo_lagc'].".</h3></center>";
			mysql_close($con);
		}
	}
	function Editar_Site($id, $url) {
		if (empty($_POST['titulo_lagc'])) {
			$respcont = mysql_query("select * from mod_tipo where tip_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['tip_id']) and $url==LGlobal::Url_Amigable($cont['tip_nombre'])) {
				$archadmin = "../componentes/com_modulos/".$cont['tip_archivo'];
				if (file_exists($archadmin)) {
					@include "componentes/com_modulos/editar_code_tipo.tpl";
				} else { echo "Error abriendo\n"; }
			} else { echo "<center><h3>noce pudo encontrar el tipo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$archivos = $_POST['ubc_lagc'];
			$newdata = $_POST['codigocont_lagc'];
			  if(@$fp = fopen($archivos, "w")){
				  fwrite($fp, stripslashes($newdata));
				  fclose($fp);
				  echo "<br><br><center><h3>Se pudo escribir correctamente.</h3></center>";
			  }
			  else {
			  	echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
			  }
			$sql = "UPDATE mod_tipo SET tip_lenguaje='".$_POST['lenguaje_lagc']."', tip_modificado='".time()."' WHERE tip_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>".mysql_error()."</b>");
			/*donde ira despues de guardar*/
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&tipos=".time()."'\", 1500) </script>
			<br><center><h4>Se guardo correctamente</h4><h3>".$_POST['titulo_lagc'].".</h3></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from mod_tipo where tip_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['tip_id']) and $titulo==LGlobal::Url_Amigable($conte['tip_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['tip_id']; ?>">
            <input type="hidden" name="rta" value="<?php echo $conte['tip_archivo']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['tip_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['tip_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos=<?php echo time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				@unlink("componentes/com_modulos/tipos/".$_POST['rta']);
				@unlink("../componentes/com_modulos/".$_POST['rta']);
				$sql = "DELETE FROM mod_tipo WHERE tip_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE mod_tipo AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos&modulos=".time()."&tipos=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el tipo</h3></center>"; }
	}
}
?>