<?php
class Marca {
	function Inicio() { ?>
	<div class="botonesdemando">
    	<h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Marcas</h3>
    </div>
    <div class="botonesdemando">
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&crear_marcas=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva Marca</a>
    </div><br />
    <h2>Marcas</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <?php /*?><th class="table-header-repeat line-left"><a href="">Grupo</a></th><?php */?>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cp_marcas order by cp_mnombre ASC"); while($product = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <?php /*?><td><?=Marca::VerGrupo($product['cp_mgrupo']); ?></td><?php */?>
        <td><strong><?php echo $product['cp_mnombre']; ?></strong></td>
        <td><img src="../componentes/com_catalogodeltron/imagenes/logomarcas/<?=$product['cp_mimagen']; ?>" border="0" /></td>
        <td><?php echo Marca::Activoc($product['cp_mactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_mid']; ?>&editar_marcas=<?php echo LGlobal::Url_Amigable($product['cp_mnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_mid']; ?>&borrar_marcas=<?php echo LGlobal::Url_Amigable($product['cp_mnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <?php /*?><td><?=Marca::VerGrupo($product['cp_mgrupo']); ?></td><?php */?>
        <td><strong><?php echo $product['cp_mnombre']; ?></strong></td>
        <td><img src="../componentes/com_catalogodeltron/imagenes/logomarcas/<?=$product['cp_mimagen']; ?>" border="0" /></td>
        <td><?php echo Marca::Activoc($product['cp_mactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_mid']; ?>&editar_marcas=<?php echo LGlobal::Url_Amigable($product['cp_mnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_mid']; ?>&borrar_marcas=<?php echo LGlobal::Url_Amigable($product['cp_mnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function VerGrupo($id){
		$respcont = mysql_query("select * from cp_grupo where cp_gid='".$id."'"); $cont = mysql_fetch_array($respcont);
		if (!empty($cont['cp_gid'])) {
			return $cont['cp_gnombre'];
		}
		//return $cont['cp_grupo'];
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from cp_marcas where cp_mid='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cp_mid']) and $url==LGlobal::Url_Amigable($cont['cp_mnombre'])) {
				@include "componentes/com_catalogodeltron/editar_marca.tpl";
			} else { echo "<br><center><h3>No existe la marca</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (!empty($_FILES['archivo']['size'])) {/*si cargo algo*/
			$archivo2 = "../componentes/com_catalogodeltron/imagenes/logomarcas/".$_POST['img'];
			unlink($archivo2);
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Thumb*/
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->resize(150, "width");
						$thumb->save('../componentes/com_catalogodeltron/imagenes/logomarcas/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_catalogodeltron/imagenes/logomarcas/'.$tiempo.'.jpg">';
						$sql = "UPDATE cp_marcas SET cp_mnombre='".$_POST['titulo']."', cp_mimagen='".$tiempo.".jpg', cp_mactivo='".$_POST['activado']."' WHERE cp_mid='".$id."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						mysql_close($con);
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_marcas=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Guardo Correctamente</h4></center>";
			}
			else {
				$sql = "UPDATE cp_marcas SET cp_mnombre='".$_POST['titulo']."', cp_mactivo='".$_POST['activado']."' WHERE cp_mid='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_marcas=".time()."'\",1500) </script><br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Guardo Correctamente</h4></center>";
			}
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from cp_marcas where cp_mid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cp_mid']) and $titulo==LGlobal::Url_Amigable($conte['cp_mnombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="img" value="<?=$conte['cp_mimagen']; ?>" />
            <input type="hidden" name="id" value="<?=$conte['cp_mid']; ?>">
            <input type="hidden" name="title" value="<?=$conte['cp_mnombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['cp_mnombre']; ?></strong>?</h3>
            <img src="../componentes/com_catalogodeltron/imagenes/logomarcas/<?=$conte['cp_mimagen']; ?>" border="0" /><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_marcas=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$archivo2 = "../componentes/com_catalogodeltron/imagenes/logomarcas/".$_POST['img'];
				unlink($archivo2);
				$sql = "DELETE FROM cp_marcas WHERE cp_mid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cp_marcas AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_marcas=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			@include "componentes/com_catalogodeltron/crear_marca.tpl";
		}
		else {
			$tamano = $_FILES['archivo']['size']; //tamaño del archivo
			$tipo = $_FILES['archivo']['type']; //tipo de archivo
			$tiempo = time();
			if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
				if($tamano <= 7340032){ // Comprovamos el tamaño
					/*Thumb*/
					$thumb = new thumb();
					$thumb->loadImage($_FILES['archivo']['tmp_name']);
					$thumb->resize(150, "width");
					$thumb->save('../componentes/com_catalogodeltron/imagenes/logomarcas/'.$tiempo.'.jpg');
					echo '<img src="../componentes/com_catalogodeltron/imagenes/logomarcas/'.$tiempo.'.jpg">';
					$config = new LagcConfig(); //Conexion
					$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
					mysql_select_db($config->lagcbd,$con);
					$sql = "INSERT INTO cp_marcas (cp_mnombre, cp_mimagen, cp_mactivo) VALUES ('".$_POST['titulo']."', '".$tiempo.".jpg', '".$_POST['activado']."')";
					mysql_query($sql,$con);
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_marcas=".time()."'\",1500) </script>";
				} else { echo "<em>El tamaño es superior al permitido</em>"; }
			} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_marcas=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Guardo Correctamente</h4></center>";
		}
	}
}
?>