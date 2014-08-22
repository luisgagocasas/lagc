<?php
class Imagenes {
	function NuevaImg($idpro, $nombrepro) {
		$respcont = mysql_query("select * from cp_productos where cp_pid='".$idpro."'"); $cont = mysql_fetch_array($respcont);
		if (!empty($cont['cp_pid']) and $nombrepro==LGlobal::Url_Amigable($cont['cp_pcodigo'])) { ?>
    	<div class="botonesdemando">
    	<h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Tipo de Producto</h3>
        </div><br>
        <div class="subtitulo">Imagenes de : <?=$nombrepro; ?></div>
<table border="0" align="center">
  <tr>
    <td valign="top">
    <h2>Imagenes para <?=$nombrepro; ?></h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Creada.</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cp_imagenes where cp_imgproduc='".$_GET['catalogocompu']."' order by cp_imgid DESC"); while($product = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($product['cp_imgtitulo'], 0, 10)); ?></strong></td>
        <td><img src="<?php echo "../componentes/com_catalogodeltron/imagenes/thumb/".$product['cp_imgimg']; ?>" title="<?php echo $product['cp_imgtitulo']; ?>" border="0" /></td>
        <td><?php echo date("Y/m/d", $product['cp_imgfecha']); ?></td>
        <td><?php echo Sistema::Activoc($product['cp_imgactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo $product['cp_imgid']; ?>&editar_img_producto=<?php echo LGlobal::Url_Amigable($product['cp_imgtitulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo $product['cp_imgid']; ?>&borrar_img_producto=<?php echo LGlobal::Url_Amigable($product['cp_imgtitulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($product['cp_imgtitulo'], 0, 10)); ?></strong></td>
        <td><img src="<?php echo "../componentes/com_catalogodeltron/imagenes/thumb/".$product['cp_imgimg']; ?>" title="<?php echo $product['cp_imgtitulo']; ?>" border="0" /></td>
        <td><?php echo date("Y/m/d", $product['cp_imgfecha']); ?></td>
        <td><?php echo Sistema::Activoc($product['cp_imgactivo']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo $product['cp_imgid']; ?>&editar_img_producto=<?php echo LGlobal::Url_Amigable($product['cp_imgtitulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo $product['cp_imgid']; ?>&borrar_img_producto=<?php echo LGlobal::Url_Amigable($product['cp_imgtitulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    </td>
    <td valign="top">
			<?php
			if (!$_POST['titulo']) { @include"componentes/com_catalogodeltron/form_foto.tpl"; }
			else {
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(240, "width");
						$imagen->save('../componentes/com_catalogodeltron/imagenes/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_catalogodeltron/imagenes/'.$tiempo.'.jpg" width="200">';
						/*Thumb*/
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->crop(70, 50);
						$thumb->save('../componentes/com_catalogodeltron/imagenes/thumb/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_catalogodeltron/imagenes/thumb/'.$tiempo.'.jpg">';
						$config = new LagcConfig(); //Conexion
						$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
						mysql_select_db($config->lagcbd,$con);
						$sql = "INSERT INTO cp_imagenes (cp_imgproduc, cp_imgtitulo, cp_imgimg, cp_imgdescripcion, cp_imgfecha, cp_imgactivo) VALUES ('".$_GET['catalogocompu']."', '".$_POST['titulo']."', '".$tiempo.".jpg', '".$_POST['descripcion']."', '".$tiempo."', '".$_POST['activado']."')";
						mysql_query($sql,$con); ?>
						<script type="text/javascript"> setTimeout("window.top.location='?lagc=com_catalogodeltron&catalogocompu=<?php echo $_GET['catalogocompu']; ?>&crear_img_producto=<?php echo $_GET['crear_img_producto']; ?>'",1500) </script>
						<?php
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			} ?>
			</td>
		  </tr>
		</table>
        <?php
		} else { echo "<br><center><h3>No existe el Producto</h3></center>"; }
	}
	function _CantImages($idproduc) {
		$rptimg = mysql_query("select cp_imgid from cp_imagenes where cp_imgproduc='".$idproduc."'");
		$cantidad = mysql_num_rows($rptimg);
		return $cantidad;
	}
	function EditarImg($id, $titulo){
		$respcont = mysql_query("select * from cp_imagenes where cp_imgid='".$id."'"); $cont = mysql_fetch_array($respcont);
		$respprod = mysql_query("select * from cp_productos where cp_pid='".$cont['cp_imgproduc']."'"); $product = mysql_fetch_array($respprod); ?>
    <div class="botonesdemando">
    <h3><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&crear_img_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>">&laquo; Atras</a> | Editando Imagen de <?=$product['cp_pcodigo']; ?></h3>
    </div><br>
    <div class="subtitulo">Editando imagen : <?=$cont['cp_imgtitulo'];?></div>
    	<?php
		if (!empty($cont['cp_imgid']) and $titulo==LGlobal::Url_Amigable($cont['cp_imgtitulo'])) {
			if (!$_POST['titulo']) { @include"componentes/com_catalogodeltron/editar_imagen.tpl"; }
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE cp_imagenes SET cp_imgtitulo='".$_POST['titulo']."', cp_imgdescripcion='".$_POST['descripcion']."', cp_imgactivo='".$_POST['activado']."' WHERE cp_imgid='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".$product['cp_pid']."&crear_img_producto=".LGlobal::Url_Amigable($product['cp_pcodigo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo correctamente.</h4></center>";
			}
		} else { echo "<br><center><h3>No existe la imagen</h3></center>"; }
	}
	function BorrarImg($id, $nombre) {
		$contenidos = mysql_query("select * from cp_imagenes where cp_imgid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		$respprod = mysql_query("select * from cp_productos where cp_pid='".$conte['cp_imgproduc']."'"); $product = mysql_fetch_array($respprod);
		if (!empty($conte['cp_imgid']) and $nombre==LGlobal::Url_Amigable($conte['cp_imgtitulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cp_imgid']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['cp_imgtitulo']; ?>">
            <input type="hidden" name="idpro" value="<?=$product['cp_pid']; ?>">
            <input type="hidden" name="titulopro" value="<?=$product['cp_pcodigo']; ?>">
            <input type="hidden" name="img" value="<?php echo $conte['cp_imgimg']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cp_imgtitulo']; ?></strong>?</h3>
            <img src="../componentes/com_catalogodeltron/imagenes/thumb/<?php echo $conte['cp_imgimg']; ?>" border="0" /><br />
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&crear_img_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM cp_imagenes WHERE cp_imgid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cp_imagenes AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				$archivo = "../componentes/com_catalogodeltron/imagenes/".$_POST['img'];
				unlink($archivo);
				$archivo2 = "../componentes/com_catalogodeltron/imagenes/thumb/".$_POST['img'];
				unlink($archivo2);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".$_POST['idpro']."&crear_img_producto=".LGlobal::Url_Amigable($_POST['titulopro'])."'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
?>