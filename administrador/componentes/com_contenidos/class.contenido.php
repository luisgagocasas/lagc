<?php
class Contenido {
	function inicioc() { ?>
	<div class="botonesdemando"><a href="?lagc=com_contenidos&contenido=<?php echo time(); ?>&crear=contenido"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Contenido</a></div><br />
    <table border="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Resumen</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Modificado el</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from contenidos order by cont_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($contenido['cont_titulo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($contenido['cont_resumen'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['cont_fecha'])){ echo date("Y/m/d", $contenido['cont_fecha']); } ?></td>
        <td><?php if(!empty($contenido['cont_fechamodi'])) { echo date("Y/m/d", $contenido['cont_fechamodi']); } ?></td>
        <td><?php echo Contenido::Activoc($contenido['activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_contenidos&contenido=<?php echo $contenido['cont_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['cont_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_contenidos&contenido=<?php echo $contenido['cont_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['cont_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($contenido['cont_titulo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($contenido['cont_resumen'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['cont_fecha'])){ echo date("Y/m/d", $contenido['cont_fecha']); } ?></td>
        <td><?php if(!empty($contenido['cont_fechamodi'])) { echo date("Y/m/d", $contenido['cont_fechamodi']); } ?></td>
        <td><?php echo Contenido::Activoc($contenido['activo']); ?></td>
        <td colspan="2" align="center" class="options-width">
        <a href="?lagc=com_contenidos&contenido=<?php echo $contenido['cont_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['cont_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_contenidos&contenido=<?php echo $contenido['cont_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['cont_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function Categoria($valor) {
		$respcat = mysql_query("select * from posiciones where mod_id='".$valor."'");
		$cat = mysql_fetch_array($respcat);
		if (!empty($cat['mod_id'])) { $cat = $cat['mod_nombre']; } else { $cat = "<em>No Existe</em>"; }
		return $cat;
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor(); /*editor*/
			$respcont = mysql_query("select * from contenidos where cont_id='".$id."'");
			$cont = mysql_fetch_array($respcont);
			include "componentes/com_contenidos/editar_contenido.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['vertitulo'])) { $vertitu = "0"; } else { $vertitu = "1"; } if (empty($_POST['verresumen'])) { $verresu = "0"; } else { $verresu = "1"; }
			$sql = "UPDATE contenidos SET cont_titulo='".$_POST['titulo']."', cont_resumen='".$_POST['resumen']."', cont_contenido='".$_POST['contenido']."', cont_fechamodi='".time()."', activo='".$_POST['activado']."', cont_titulo_activo='".$vertitu."', cont_resumen_activar='".$verresu."', palabras='".$_POST['palabras']."' WHERE cont_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if (empty($_GET['aplicar'])) {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_contenidos'\", 1500) </script>
			<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_contenidos&contenido=".$id."&editar=".$url."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function borrar($id, $titulo) {
		$contenidos = mysql_query("select * from contenidos where cont_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cont_id']) and $titulo==LGlobal::Url_Amigable($conte['cont_titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cont_id']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['cont_titulo']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cont_titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_contenidos'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM contenidos WHERE cont_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE contenidos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_contenidos'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
	function crear() {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor();
			include "componentes/com_contenidos/crear_contenido.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO contenidos (cont_titulo, cont_resumen, cont_contenido, cont_fecha, activo, cont_titulo_activo, cont_resumen_activar, palabras) VALUES ('".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['contenido']."', '".time()."', '".$_POST['activado']."', '".$_POST['vertitulo']."', '".$_POST['verresumen']."', '".$_POST['palabras']."')";
			$respcont = mysql_query("select * from contenidos ORDER BY cont_id DESC");
			$cantregistros = mysql_fetch_array($respcont);
			$cantregistros = $cantregistros['cont_id']+1;
			if ($_GET['crear']!='continuar') {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_contenidos'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_contenidos&contenido=".$cantregistros."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_query($sql,$con);
		}
	}
	function LGcheck($valor) {
		if ($valor=='1') { $checked=" checked"; }
		else { $checked=""; }
		return $checked;
	}
}
?>