<?php
class Carteras{
	function InicioCa(){ ?><br />
    <div class="botones_about">
    <a href="?lagc=com_wilss"> &laquo; Atras</a>
    </div>
    <div class="botones_about">
    <a href="?lagc=com_wilss&wilss=<?=time(); ?>&agregar_carteras=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Crear Nuevo</a>
    </div><br /><br />
    <h2>Carteras</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Cre.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from wilss_carteras order by ca_id ASC"); while($carteras = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$carteras['ca_id']; ?></td>
        <td><strong><?=ucfirst(substr($carteras['ca_nombre'], 0, 20)); ?></strong></td>
        <td><?=$carteras['ca_img1']; ?></td>
        <td><?php if(!empty($carteras['ca_creado'])){ echo date("Y/m/d", $carteras['ca_creado']); } ?></td>
        <td><?php if(!empty($carteras['ca_modificado'])) { echo date("Y/m/d", $carteras['ca_modificado']); } ?></td>
        <td><?php echo Carteras::Activoc($carteras['ca_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_wilss&wilss=<?=$carteras['ca_id']; ?>&editar_carteras=<?=LGlobal::Url_Amigable($carteras['ca_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_wilss&wilss=<?=$carteras['ca_id']; ?>&borrar_carteras=<?=LGlobal::Url_Amigable($carteras['ca_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_wilss/agregar_carteras.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO wilss_carteras (ca_nombre, ca_img1, ca_img2, ca_img3, ca_img4, ca_creado, ca_estado) VALUES ('".$_POST["titulo"]."', '".$_POST['img1']."', '".$_POST['img2']."', '".$_POST['img3']."', '".$_POST['img4']."', '".time()."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&carteras=".time()."'\", 1000) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from wilss_carteras where ca_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['ca_id']) and $url==LGlobal::Url_Amigable($cont['ca_nombre'])) {
				include "componentes/com_wilss/editar_carteras.tpl";
			} else { echo "<br><center><h3>No existe la Cartera</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE wilss_carteras SET ca_nombre='".$_POST['titulo']."', ca_img1='".$_POST['img1']."', ca_img2='".$_POST['img2']."', ca_img3='".$_POST['img3']."', ca_img4='".$_POST['img4']."', ca_modificado='".time()."', ca_estado='".$_POST['activado']."' WHERE ca_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if ($_GET['aplicar']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&carteras=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".$_GET['wilss']."&editar_carteras=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from wilss_carteras where ca_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['ca_id']) and $titulo==LGlobal::Url_Amigable($conte['ca_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['ca_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['ca_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['ca_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_wilss&wilss=<?=time(); ?>&carteras=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM wilss_carteras WHERE ca_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE wilss_carteras AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&carteras=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe la Cartera</h3></center>"; }
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "<strong>Desactivado</strong>"; }
		return $result;
	}
}
?>