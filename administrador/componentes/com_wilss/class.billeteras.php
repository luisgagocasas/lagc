<?php
class Billeteras{
	function InicioB(){ ?><br />
    <div class="botones_about">
    <a href="?lagc=com_wilss"> &laquo; Atras</a>
    </div>
    <div class="botones_about">
    <a href="?lagc=com_wilss&wilss=<?=time(); ?>&agregar_billeteras=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Crear Nuevo</a>
    </div><br /><br />
    <h2>Billeteras</h2>
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
    <?php $respconte = mysql_query("select * from wilss_billeteras order by bi_id ASC"); while($billeteras = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$billeteras['bi_id']; ?></td>
        <td><strong><?=ucfirst(substr($billeteras['bi_nombre'], 0, 20)); ?></strong></td>
        <td><?=$billeteras['bi_img1']; ?></td>
        <td><?php if(!empty($billeteras['bi_creado'])){ echo date("Y/m/d", $billeteras['bi_creado']); } ?></td>
        <td><?php if(!empty($billeteras['bi_modificado'])) { echo date("Y/m/d", $billeteras['bi_modificado']); } ?></td>
        <td><?php echo Billeteras::Activoc($billeteras['bi_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_wilss&wilss=<?=$billeteras['bi_id']; ?>&editar_billeteras=<?=LGlobal::Url_Amigable($billeteras['bi_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_wilss&wilss=<?=$billeteras['bi_id']; ?>&borrar_billeteras=<?=LGlobal::Url_Amigable($billeteras['bi_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_wilss/agregar_billeteras.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO wilss_billeteras (bi_nombre, bi_img1, bi_img2, bi_img3, bi_img4, bi_creado, bi_estado) VALUES ('".$_POST["titulo"]."', '".$_POST['img1']."', '".$_POST['img2']."', '".$_POST['img3']."', '".$_POST['img4']."', '".time()."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&billeteras=".time()."'\", 1000) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from wilss_billeteras where bi_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['bi_id']) and $url==LGlobal::Url_Amigable($cont['bi_nombre'])) {
				include "componentes/com_wilss/editar_billeteras.tpl";
			} else { echo "<br><center><h3>No existe la Billetera</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE wilss_billeteras SET bi_nombre='".$_POST['titulo']."', bi_img1='".$_POST['img1']."', bi_img2='".$_POST['img2']."', bi_img3='".$_POST['img3']."', bi_img4='".$_POST['img4']."', bi_modificado='".time()."', bi_estado='".$_POST['activado']."' WHERE bi_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if ($_GET['aplicar']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&billeteras=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".$_GET['wilss']."&editar_billeteras=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from wilss_billeteras where bi_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['bi_id']) and $titulo==LGlobal::Url_Amigable($conte['bi_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['bi_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['bi_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['bi_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_wilss&wilss=<?=time(); ?>&billeteras=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM wilss_billeteras WHERE bi_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE wilss_billeteras AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_wilss&wilss=".time()."&billeteras=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe la Billetera</h3></center>"; }
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "<strong>Desactivado</strong>"; }
		return $result;
	}
}
?>