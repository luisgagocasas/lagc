<?php
class Productos {
	function inicion() { ?>
	<div class="botonesdemando"><a href="?lagc=com_productos&productos=<?php echo time(); ?>&crear=producto"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Producto</a></div><br />
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
    <?php $respconte = mysql_query("select * from pro_productos order by p_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['p_titulo'], 0, 20)); ?></strong></td>
        <td><?=Productos::__Imagen($contenido['p_imagen']); ?></td>
        <td><?=date("Y/m/d", $contenido['p_fecha']); ?></td>
        <td><?=date("Y/m/d", $contenido['p_fechamodi']); ?></td>
        <td><?=Productos::Activoc($contenido['activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_productos&productos=<?php echo $contenido['p_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['p_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_productos&productos=<?php echo $contenido['p_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['p_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['p_titulo'], 0, 20)); ?></strong></td>
        <td><?=Productos::__Imagen($contenido['p_imagen']); ?></td>
        <td><?=date("Y/m/d", $contenido['p_fecha']); ?></td>
        <td><?=date("Y/m/d", $contenido['p_fechamodi']); ?></td>
        <td><?=Productos::Activoc($contenido['activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_productos&productos=<?php echo $contenido['p_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['p_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_productos&productos=<?php echo $contenido['p_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['p_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
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
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from pro_productos where p_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['p_id']) and $url==LGlobal::Url_Amigable($cont['p_titulo'])) {
				LGlobal::Editor();
				@include "componentes/com_productos/editar.tpl";
			} else { echo "<br><center><h3>No existe el Producto</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE pro_productos SET p_titulo='".$_POST['titulo']."', p_contenido1='".$_POST['contenido1']."', p_contenido2='".$_POST['contenido2']."', p_contenido3='".$_POST['contenido3']."', p_fechamodi='".time()."', activo='".$_POST['activado']."' WHERE p_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			//
			if (!empty($_FILES['archivo']['tmp_name'])){ /*pregunto si existe archivo en el file*/
				$archivo = "../componentes/com_productos/imagenes/".$_POST['imagenbd'];
				@unlink($archivo);
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(150, "width");
						$imagen->save('../componentes/com_productos/imagenes/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_productos/imagenes/'.$tiempo.'.jpg">';
						$sqll = "UPDATE pro_productos SET p_imagen='".$tiempo.".jpg' WHERE p_id='".$id."'";
						$Query = mysql_query ($sqll, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_productos'\",1500) </script>";
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			//
			/*donde ira despues de guardar*/
			if (empty($_GET['aplicar'])) {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_productos'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Guardo Correctamente</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_productos&productos=".$id."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function borrar($id, $titulo) {
			$contenidos = mysql_query("select * from pro_productos where p_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['p_id']) and $titulo==LGlobal::Url_Amigable($conte['p_titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['p_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['p_titulo']; ?>">
            <input type="hidden" name="img" value="<?=$conte['p_imagen']; ?>">
            <center><?=Productos::__Imagen($conte['p_imagen']); ?></center>
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['p_titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				if (!empty($_POST['img'])) {
					$archivo = "../componentes/com_productos/imagenes/".$conte['p_imagen'];
					@unlink($archivo);
				}
				$sql = "DELETE FROM pro_productos WHERE p_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE pro_productos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_productos'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el producto</h3></center>"; }
	}
	function crear() {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor();
			@include "componentes/com_productos/crear.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			//
			if (!empty($_FILES['archivo']['tmp_name'])){ /*pregunto si existe archivo en el file*/
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(150, "width");
						$imagen->save('../componentes/com_productos/imagenes/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_productos/imagenes/'.$tiempo.'.jpg">';
						$sql = "INSERT INTO pro_productos (p_titulo, p_contenido1, p_contenido2, p_contenido3, p_imagen, p_fecha, activo) VALUES ('".$_POST['titulo']."', '".$_POST['contenido1']."', '".$_POST['contenido2']."', '".$_POST['contenido3']."', '".$tiempo.".jpg', '".time()."', '".$_POST['activado']."')";
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			else {
				$sql = "INSERT INTO pro_productos (p_titulo, p_contenido1, p_contenido2, p_contenido3, p_fecha, activo) VALUES ('".$_POST['titulo']."', '".$_POST['contenido1']."', '".$_POST['contenido2']."', '".$_POST['contenido3']."', '".time()."', '".$_POST['activado']."')";
			}
			//
			mysql_query($sql,$con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_productos'\", 1500) </script>";
			echo "<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente.</h4></center>";
		}
	}
	function __Imagen($val1){
		if (!empty($val1)) {	$final = "<img src=\"../componentes/com_productos/imagenes/".$val1."\" width=\"100\" border=\"0\" />";	}
		else {	$final = "<img src=\"../componentes/com_productos/sin_imagen.png\" width=\"100\" border=\"0\" />";	}
		return $final;
	}
}
?>