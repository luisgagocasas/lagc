<?php
class Linea {
	function Inicio() { ?>
	<div class="botonesdemando">
    	<h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Linea de producto  (Tipo)</h3>
    </div>
    <div class="botonesdemando">
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&crear_linea=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva linea</a>
    </div><br />
    <h2>Linea</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Marcas</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cp_linea order by cp_tnombre ASC"); while($product = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $product['cp_tnombre']; ?></strong></td>
        <td><?php echo Linea::__MostrarMarca($product['cp_tmarca']); ?></td>
        <td><?php echo Linea::Activoc($product['cp_tactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_tid']; ?>&editar_linea=<?php echo LGlobal::Url_Amigable($product['cp_tnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_tid']; ?>&borrar_linea=<?php echo LGlobal::Url_Amigable($product['cp_tnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $product['cp_tnombre']; ?></strong></td>
        <td><?php echo Linea::__MostrarMarca($product['cp_tmarca']); ?></td>
        <td><?php echo Linea::Activoc($product['cp_tactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_tid']; ?>&editar_linea=<?php echo LGlobal::Url_Amigable($product['cp_tnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_tid']; ?>&borrar_linea=<?php echo LGlobal::Url_Amigable($product['cp_tnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
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
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from cp_linea where cp_tid='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cp_tid']) and $url==LGlobal::Url_Amigable($cont['cp_tnombre'])) {
				@include "componentes/com_catalogodeltron/editar_linea.tpl";
			} else { echo "<br><center><h3>No existe el local</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE cp_linea SET cp_tnombre='".$_POST['titulo']."', cp_tmarca='".$_POST['grupo']."', cp_tactivo='".$_POST['activado']."' WHERE cp_tid='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_linea=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo correctamente...</h4></center>";

			mysql_close($con);
		}
	}
	function __MostrarMarca($id){
		$respgrupo = mysql_query("select * from cp_marcas where cp_mid='".$id."'");
		$grupo = mysql_fetch_array($respgrupo);
		return $grupo['cp_mnombre'];
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from cp_linea where cp_tid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cp_tid']) and $titulo==LGlobal::Url_Amigable($conte['cp_tnombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cp_tid']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['cp_tnombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cp_tnombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_linea=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM cp_linea WHERE cp_tid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cp_linea AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_linea=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			@include "componentes/com_catalogodeltron/crear_linea.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO cp_linea (cp_tnombre, cp_tmarca, cp_tactivo) VALUES ('".$_POST['titulo']."', '".$_POST['grupo']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_linea=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
}
?>