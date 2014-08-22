<?php
class Enlace{
	function Inicie(){ ?>
	<div class="botonesdemando">
    <a href="?lagc=com_enlace&enlace=<?=time(); ?>&crear_enlace=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Enlace</a>
    </div><br />
    <h2>Enlaces</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Resumen</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Cre.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from url_enlaces order by url_id ASC"); while($enlace = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $enlace['url_id']; ?></td>
        <td><strong><?php echo ucfirst(substr($enlace['url_nombre'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($enlace['url_descripcion'], 0, 20)); ?></td>
        <td><?php if(!empty($enlace['url_creado'])){ echo date("Y/m/d", $enlace['url_creado']); } ?></td>
        <td><?php if(!empty($enlace['url_editado'])) { echo date("Y/m/d", $enlace['url_editado']); } ?></td>
        <td><?php echo Enlace::Activoc($enlace['url_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_enlace&enlace=<?=$enlace['url_id']; ?>&editar_enlace=<?=LGlobal::Url_Amigable($enlace['url_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_enlace&enlace=<?=$enlace['url_id']; ?>&borrar_enlace=<?=LGlobal::Url_Amigable($enlace['url_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="<?=$enlace['url_enlace']; ?>" target="_blank" title="Ver Enlace" class="icon-5 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_enlace/crear_enlace.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO url_enlaces (url_nombre, url_enlace, url_descripcion, url_creado, url_usuario, url_estado) VALUES ('".$_POST['titulo']."', '".$_POST['enlace']."', '".$_POST['resumen']."', '".time()."', '".$_COOKIE["user"]."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_enlace'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from url_enlaces where url_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['url_id']) and $url==LGlobal::Url_Amigable($cont['url_nombre'])) {
				include "componentes/com_enlace/editar_enlace.tpl";
			} else { echo "<br><center><h3>No existe el Enlace</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE url_enlaces SET url_nombre='".$_POST['titulo']."', url_enlace='".$_POST['enlace']."', url_descripcion='".$_POST['resumen']."', url_editado='".time()."', url_estado='".$_POST['activado']."' WHERE url_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_enlace'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from url_enlaces where url_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['url_id']) and $titulo==LGlobal::Url_Amigable($conte['url_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['url_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['url_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['url_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_enlace'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM url_enlaces WHERE url_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE url_enlaces AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_enlace'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
}
?>