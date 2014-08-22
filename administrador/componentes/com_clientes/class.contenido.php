<?php
class Clientes {
	function inicioc() { ?>
	<div class="botonesdemando"><a href="?lagc=com_clientes&cliente=<?php echo time(); ?>&crear=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Cliente</a></div><br />
    <table border="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Proyecto</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen</a></th>
        <th class="table-header-repeat line-left"><a href="">Web</a></th>
        <th class="table-header-repeat line-left"><a href="">La empresa</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cl_clientes order by cl_id ASC"); while($clientes = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $clientes['cl_nombre']; ?></strong></td>
        <td><?php echo Clientes::VerThumb($clientes['cl_imagen'], $clientes['cl_nombre']); ?></td>
        <td><?php echo Clientes::VerEnlace($clientes['cl_web']); ?></td>
        <td><?php echo $clientes['cl_empresa']; ?></td>
        <td><?php echo Clientes::Activoc($clientes['cl_activado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_clientes&cliente=<?php echo $clientes['cl_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($clientes['cl_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_clientes&cliente=<?php echo $clientes['cl_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($clientes['cl_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $clientes['cl_nombre']; ?></strong></td>
        <td><?php echo Clientes::VerThumb($clientes['cl_imagen'], $clientes['cl_nombre']); ?></td>
        <td><?php echo Clientes::VerEnlace($clientes['cl_web']); ?></td>
        <td><?php echo $clientes['cl_empresa']; ?></td>
        <td><?php echo Clientes::Activoc($clientes['cl_activado']); ?></td>
        <td colspan="2" align="center" class="options-width">
        <a href="?lagc=com_clientes&cliente=<?php echo $clientes['cl_id']; ?>&editar=<?php echo LGlobal::Url_Amigable($clientes['cl_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_clientes&cliente=<?php echo $clientes['cl_id']; ?>&borrar=<?php echo LGlobal::Url_Amigable($clientes['cl_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor(); /*editor*/
			$respcont = mysql_query("select * from cl_clientes where cl_id='".$id."'");
			$cont = mysql_fetch_array($respcont);
			@include "componentes/com_clientes/editar_cliente.tpl";
		}
		else {
			if (!empty($_FILES['archivo']['size'])) { /*Primer caso guardar con imagen*/
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$archivo = "../componentes/com_clientes/imagenes/".$_POST['img'];
						unlink($archivo);
						$archivo2 = "../componentes/com_clientes/imagenes/thumb/".$_POST['img'];
						unlink($archivo2);
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(200, "width");
						$imagen->save('../componentes/com_clientes/imagenes/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_clientes/imagenes/'.$tiempo.'.jpg">';
						/*Thumb*/
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->crop(70, 100);
						$thumb->save('../componentes/com_clientes/imagenes/thumb/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_clientes/imagenes/thumb/'.$tiempo.'.jpg">';
						$config = new LagcConfig(); //Conexion
						$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
						mysql_select_db($config->lagcbd,$con);
						$sql = "UPDATE cl_clientes SET cl_nombre='".$_POST['titulo']."', cl_imagen='".$tiempo.".jpg', cl_descipcion='".$_POST['contenido']."', cl_web='".$_POST['url']."', cl_empresa='".$_POST['empresa']."', cl_activado='".$_POST['activado']."' WHERE cl_id='".$id."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						/*donde ira despues de guardar*/
						if ($_GET['aplicar']!="continuar") {
							echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes'\", 1500) </script>
							<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
						}
						else {
							echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes&cliente=".$id."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
							<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
						}
						mysql_close($con);
						/*fin de guardar*/
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			else { /*otro caso guardando sin imagen*/
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE cl_clientes SET cl_nombre='".$_POST['titulo']."', cl_descipcion='".$_POST['contenido']."', cl_web='".$_POST['url']."', cl_empresa='".$_POST['empresa']."', cl_activado='".$_POST['activado']."' WHERE cl_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				/*donde ira despues de guardar*/
				if ($_GET['aplicar']!="continuar") {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes'\", 1500) </script>
					<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
				}
				else {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes&cliente=".$id."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
					<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				mysql_close($con);
			/*fin de guardar*/
			}
		}
	}
	function borrar($id, $nombre) {
		$contenidos = mysql_query("select * from cl_clientes where cl_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cl_id']) and $nombre==LGlobal::Url_Amigable($conte['cl_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cl_id']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['cl_nombre']; ?>">
            <input type="hidden" name="img" value="<?php echo $conte['cl_imagen']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cl_nombre']; ?></strong>?</h3>
            <?php echo Clientes::VerThumb($conte['cl_imagen'], $conte['cl_nombre']); ?><br />
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_clientes'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM cl_clientes WHERE cl_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cl_clientes AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
					if (!empty($_POST['img'])) {
						$archivo = "../componentes/com_clientes/imagenes/".$_POST['img'];
						unlink($archivo);
						$archivo2 = "../componentes/com_clientes/imagenes/thumb/".$_POST['img'];
						unlink($archivo2);
					}
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
			}
		} else { echo "<br><center><h3>No existe el cliente</h3></center>"; }
	}
	function crear() {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor();
			@include "componentes/com_clientes/crear_cliente.tpl";
		}
		else {
			if (!empty($_FILES['archivo']['size'])) { /*Primer caso guardar con imagen*/
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$tiempo = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano <= 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(200, "width");
						$imagen->save('../componentes/com_clientes/imagenes/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_clientes/imagenes/'.$tiempo.'.jpg">';
						/*Thumb*/
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->crop(70, 100);
						$thumb->save('../componentes/com_clientes/imagenes/thumb/'.$tiempo.'.jpg');
						echo '<img src="../componentes/com_clientes/imagenes/thumb/'.$tiempo.'.jpg">';
						$config = new LagcConfig(); //Conexion
						$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
						mysql_select_db($config->lagcbd,$con);
						$sql = "INSERT INTO cl_clientes (cl_nombre, cl_imagen, cl_descipcion, cl_web, cl_empresa, cl_activado) VALUES ('".$_POST['titulo']."', '".$tiempo.".jpg', '".$_POST['contenido']."', '".$_POST['url']."', '".$_POST['empresa']."', '".$_POST['activado']."')";
						mysql_query($sql,$con);
						/*guardando*/
						$respcont = mysql_query("select * from cl_clientes ORDER BY cl_id DESC");
						$cantregistros = mysql_fetch_array($respcont);
						$cantregistros = $cantregistros['cl_id'];
							if ($_GET['crear']!='continuar') {
								echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes'\",1500) </script><br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
							}
							else {
								echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes&cliente=".$cantregistros."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\",1500) </script><br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
							}
						/*fin de guardar*/
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			else { /*otro caso guardando sin imagen*/
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "INSERT INTO cl_clientes (cl_nombre, cl_descipcion, cl_web, cl_empresa, cl_activado) VALUES ('".$_POST['titulo']."', '".$_POST['contenido']."', '".$_POST['url']."', '".$_POST['empresa']."', '".$_POST['activado']."')";
				mysql_query($sql,$con);
				/*guardando*/
				$respcont = mysql_query("select * from cl_clientes ORDER BY cl_id DESC");
				$cantregistros = mysql_fetch_array($respcont);
				$cantregistros = $cantregistros['cl_id'];
					if ($_GET['crear']!='continuar') {
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes'\",1500) </script><br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
					}
					else {
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_clientes&cliente=".$cantregistros."&editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\",1500) </script><br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
					}
				/*fin de guardar*/
			}
		}
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function VerThumb($img, $nombre) {
		$config = new LagcConfig();
		if (!empty($img)) {
			$final = "<img src=\"".$config->lagcurl."componentes/com_clientes/imagenes/thumb/".$img."\" width=\"50\" height=\"50\" title=\"".$nombre."\" />";
		} else {
			$final = "<img src=\"".$config->lagcurl."componentes/com_clientes/imagenes/thumb/no_disponible.jpg\" width=\"50\" height=\"50\" title=\"".$nombre."\" />";
		}
		return $final;
	}
	function VeriMG($img, $nombre) {
		$config = new LagcConfig();
		if (!empty($img)) {
			$final = "<img src=\"".$config->lagcurl."componentes/com_clientes/imagenes/".$img."\" title=\"".$nombre."\" />";
		} else {
			$final = "<img src=\"".$config->lagcurl."componentes/com_clientes/imagenes/no_disponible.jpg\" title=\"".$nombre."\" />";
		}
		return $final;
	}
	function VerEnlace($enlace) {
		if (!empty($enlace)) {
			$final = "<img src=\"../componentes/com_clientes/utilidades/enlace.gif\" border=\"0\"><a href=\"".$enlace."\" target=\"_blank\">Visitar Web</a>";
		}
		return $final;
	}
}
?>