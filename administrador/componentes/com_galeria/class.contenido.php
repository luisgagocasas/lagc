<?php
class Fotos {
	function inicioc() {
		$config = new LagcConfig(); //Conexion
		?>
	<div class="botonesdemando"><a href="?lagc=com_galeria&galerias=<?php echo time(); ?>&lista=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Galeria</a>  <a href="?lagc=com_galeria&galerias=<?php echo time(); ?>&crear=foto"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva Foto</a></div><br />
    <table border="0" width="65%" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Thumb</a></th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Descripci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Cre.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Galeria</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from fotos_imagenes order by id_ga ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td align="center"><img src="<?php echo "../componentes/com_galeria/fotos/thumb/".$contenido['imagen']; ?>" title="<?php echo $contenido['imagen']; ?>" border="0" width="70px" height="100px" /></td>
        <td><strong><?php echo ucfirst(substr($contenido['titulo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($contenido['descripcion'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['fechacre'])){ echo date("Y/m/d", $contenido['fechacre']); } ?></td>
        <td><?php if(!empty($contenido['fechamod'])) { echo date("Y/m/d", $contenido['fechamod']); } ?></td>
        <td><?php echo Fotos::Galeria($contenido['categoria']); ?></td>
        <td><?php echo Fotos::Activoc($contenido['activo']); ?></td>
        <td colspan="2" align="center">
        <a href="?lagc=com_galeria&galerias=<?php echo $contenido['id_ga']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_galeria&galerias=<?php echo $contenido['id_ga']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td align="center"><img src="<?php echo "../componentes/com_galeria/fotos/thumb/".$contenido['imagen']; ?>" title="<?php echo $contenido['imagen']; ?>" border="0" width="70px" height="100px" /></td>
        <td><strong><?php echo ucfirst(substr($contenido['titulo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($contenido['descripcion'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['fechacre'])){ echo date("Y/m/d", $contenido['fechacre']); } ?></td>
        <td><?php if(!empty($contenido['fechamod'])) { echo date("Y/m/d", $contenido['fechamod']); } ?></td>
        <td><?php echo Fotos::Galeria($contenido['categoria']); ?></td>
        <td><?php echo Fotos::Activoc($contenido['activo']); ?></td>
        <td colspan="2" align="center">
         <a href="?lagc=com_galeria&galerias=<?php echo $contenido['id_ga']; ?>&editar=<?php echo LGlobal::Url_Amigable($contenido['titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_galeria&galerias=<?php echo $contenido['id_ga']; ?>&borrar=<?php echo LGlobal::Url_Amigable($contenido['titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function Galeria($valor) {
		$respcat = mysql_query("select * from fotos_album where id_gal='".$valor."'");
		$cat = mysql_fetch_array($respcat);
		if (!empty($cat['id_gal'])) { $cat = $cat['titulo']; }
		else { $cat = "<em>No Existe</em>"; }
		return $cat;
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from fotos_imagenes where id_ga='".$id."'");
			$cont = mysql_fetch_array($respcont);
			include "componentes/com_galeria/editar_foto.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['vertitulo'])) { $vertitu = "2"; } else { $vertitu = "1"; }
			if (empty($_POST['verdescr'])) { $verresu = "2"; } else { $verresu = "1"; }
			$sql = "UPDATE fotos_imagenes SET titulo='".$_POST['titulo']."', descripcion='".$_POST['descr']."', fechamod='".time()."', categoria='".$_POST['categoria']."', mostitle='".$vertitu."', mosdesc='".$verresu."', activo='".$_POST['activado']."' WHERE id_ga='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*Creo y Borro nueva imagen*/
			if (!empty($_FILES['archivo']['tmp_name'])){ /*pregunto si existe archivo en el file*/
				$archivo = "../componentes/com_galeria/fotos/".$_POST['imagenbd'];
				@unlink($archivo);
				$archivo2 = "../componentes/com_galeria/fotos/thumb/".$_POST['imagenbd'];
				@unlink($archivo2);
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(600, "width");
						$imagen->save('../componentes/com_galeria/fotos/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_galeria/fotos/'.$tiempo.'.jpg">';
						/*Thumb*/
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->crop(70, 100);
						$thumb->save('../componentes/com_galeria/fotos/thumb/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_galeria/fotos/thumb/'.$tiempo.'.jpg">';
						$config = new LagcConfig(); //Conexion
						$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
						mysql_select_db($config->lagcbd,$con);
						$sqll = "UPDATE fotos_imagenes SET imagen='".$tiempo.".jpg' WHERE id_ga='".$id."'";
						$Query = mysql_query ($sqll, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria'\",1500) </script>";
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			/*Fin Creo y Borro nueva imagen*/
			/*donde ira despues de guardar*/
			if (empty($_GET['aplicar'])) {
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Guardo Correctamente</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria&galerias=".$id."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function borrar($id, $nombre) {
		$contenidos = mysql_query("select * from fotos_imagenes where id_ga='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['id_ga']) and $nombre==LGlobal::Url_Amigable($conte['titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['id_ga']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['titulo']; ?>">
            <input type="hidden" name="img" value="<?php echo $conte['imagen']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['titulo']; ?></strong>?</h3>
            <img src="../componentes/com_galeria/fotos/thumb/<?php echo $conte['imagen']; ?>" border="0" /><br />
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_galeria'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM fotos_imagenes WHERE id_ga='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE fotos_imagenes AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				$archivo = "../componentes/com_galeria/fotos/".$_POST['img'];
				unlink($archivo);
				$archivo2 = "../componentes/com_galeria/fotos/thumb/".$_POST['img'];
				unlink($archivo2);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
	function crear(){
		if (!$_POST['titulo']) {
			include "componentes/com_galeria/crear_foto.tpl";
		}
		else {
			$tamano = $_FILES['archivo']['size']; //tamaño del archivo
			$tipo = $_FILES['archivo']['type']; //tipo de archivo
			$tiempo = time();
			if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
				if($tamano <= 7340032){ // Comprovamos el tamaño
					/*Imagen*/
					$imagen = new thumb();
					$imagen->loadImage($_FILES['archivo']['tmp_name']);
					$imagen->resize(600, "width");
					$imagen->save('../componentes/com_galeria/fotos/'.$tiempo.'.jpg');
					echo '<img src="../componentes/com_galeria/fotos/'.$tiempo.'.jpg">';
					/*Thumb*/
					$thumb = new thumb();
					$thumb->loadImage($_FILES['archivo']['tmp_name']);
					$thumb->crop(70, 100);
					$thumb->save('../componentes/com_galeria/fotos/thumb/'.$tiempo.'.jpg');
					echo '<img src="../componentes/com_galeria/fotos/thumb/'.$tiempo.'.jpg">';
					$config = new LagcConfig(); //Conexion
					$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
					mysql_select_db($config->lagcbd,$con);
					$sql = "INSERT INTO fotos_imagenes (titulo, imagen, descripcion, fechacre, categoria, mostitle, mosdesc, activo) VALUES ('".$_POST['titulo']."', '".$tiempo.".jpg', '".$_POST['descr']."', '".$tiempo."', '".$_POST['categoria']."', '".$_POST['vertitulo']."', '".$_POST['verdescr']."', '".$_POST['activado']."')";
					mysql_query($sql,$con);
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria'\",1500) </script>";
				} else { echo "<em>El tamaño es superior al permitido</em>"; }
			} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
		}
	}
	function LGcheck($valor) {
		if ($valor=='1') { $checked=" checked"; }
		else { $checked=""; }
		return $checked;
	}
}
?>
<?php
class Galerias {
	function inicioct() { ?>
	<div><a href="?lagc=com_galeria"><img src="plantillas/lagc-peru/imagenes/fotos.gif" border="0" /> Fotos</a>  <a href="?lagc=com_galeria&galerias=<?php echo time(); ?>&crear_gal=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva Galeria</a></div><br />
    <table border="0" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Descripci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Activo</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respcat = mysql_query("select * from fotos_album order by id_gal ASC"); while($cat = mysql_fetch_array($respcat)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF" class="alternate-row">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst($cat['titulo']); ?></strong></td>
        <td><strong><?php echo substr($cat['descripcion'], 0, 50)."..."; ?></strong></td>
        <td align="center"><?php echo Galerias::Activoc($cat['activar']); ?></td>
        <td colspan="2"><a href="?lagc=com_galeria&galerias=<?php echo $cat['id_gal']; ?>&editar_gal=<?php echo LGlobal::Url_Amigable($cat['titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a><a href="?lagc=com_galeria&galerias=<?php echo $cat['id_gal']; ?>&borrar_gal=<?php echo LGlobal::Url_Amigable($cat['titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr>
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst($cat['titulo']); ?></strong></td>
        <td><strong><?php echo substr($cat['descripcion'], 0, 50)."..."; ?></strong></td>
        <td align="center"><?php echo Galerias::Activoc($cat['activar']); ?></td>
        <td colspan="2"><a href="?lagc=com_galeria&galerias=<?php echo $cat['id_gal']; ?>&editar_gal=<?php echo LGlobal::Url_Amigable($cat['titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a><a href="?lagc=com_galeria&galerias=<?php echo $cat['id_gal']; ?>&borrar_gal=<?php echo LGlobal::Url_Amigable($cat['titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
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
			$respcont = mysql_query("select * from fotos_album where id_gal='".$id."'");
			$cont = mysql_fetch_array($respcont);
			include "componentes/com_galeria/editar_galeria.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE fotos_album SET titulo='".$_POST['titulo']."', descripcion='".$_POST['descri']."', activar=".$_POST['activado']." WHERE id_gal='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria&galerias=".time()."&lista=".time()."'\", 1500) </script>
			<center><h4>Se Guardo Correctamente </h4><h3>".$_POST['titulo']."</h3></center>";
			mysql_close($con);
		}
	}
	function borrar($id, $titulo) {
			$contenidos = mysql_query("select * from fotos_album where id_gal='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['id_gal']) and $titulo==LGlobal::Url_Amigable($conte['titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['id_gal']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['titulo']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_galeria&galerias=<?php echo time(); ?>&lista=<?php echo time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM fotos_album WHERE id_gal='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE fotos_album AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria&galerias=".time()."&lista=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe la galeria</h3></center>"; }
	}
	function crear() {
		if (empty($_POST['titulo'])) {
			include "componentes/com_galeria/crear_galeria.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO fotos_album (titulo, descripcion, activar) VALUES ('".$_POST['titulo']."', '".$_POST['descri']."', '".$_POST['activado']."')";
			mysql_query($sql,$con);
			echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_galeria&galerias=".time()."&lista=".time()."'\", 1500) </script>
			<center><h4>Se creo correctamente.</h4><h3>".$_POST['titulo']."</h3></center>";
		}
	}
}
?>