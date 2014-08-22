<?php
class Videos{
	function Inicib(){ ?>
    <center>
    	<div class="marco_about">
        <h3>Gestor de Video</h3>
        </div>
    </center>
	<div class="botonesdemando">
    <a href="?lagc=com_videos&videos=<?=time(); ?>&categorias=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Categorias</a>
    <a href="?lagc=com_videos&videos=<?=time(); ?>&comentarios=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/usuario.gif" border="0" /> Comentarios</a>
    <a href="?lagc=com_videos&videos=<?=time(); ?>&crear_procesa_video=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Video</a>
    </div><br />
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
    <?php $respconte = mysql_query("select * from video_videos order by vi_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$contenido['vi_id']; ?></td>
        <td><strong><?=ucfirst(substr($contenido['vi_titulo'], 0, 20)); ?></strong></td>
        <td><img src="<?=$contenido['vi_imagen']; ?>" border="0" /></td>
        <td><?php if(!empty($contenido['vi_creado'])){ echo date("Y/m/d", $contenido['vi_creado']); } ?></td>
        <td><?php if(!empty($contenido['vi_modificado'])) { echo date("Y/m/d", $contenido['vi_modificado']); } ?></td>
        <td><?php echo Videos::Activoc($contenido['vi_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_videos&videos=<?=$contenido['vi_id']; ?>&editar_video=<?=LGlobal::Url_Amigable($contenido['vi_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_videos&videos=<?=$contenido['vi_id']; ?>&borrar_video=<?=LGlobal::Url_Amigable($contenido['vi_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "<strong>Desactivado</strong>"; }
		return $result;
	}
	function LGcheck($valor) {
		if ($valor=='1') { $checked=" checked"; }
		else { $checked=""; }
		return $checked;
	}
	function NuevoPaso1(){ ?>
    	<div class="botonesdemando"><h3><a href="?lagc=com_videos">&laquo; Atras</a> | <strong> Paso 2 | </strong>Creando Video </h3></div>
        <br /><br /><br /><br /><br />
		<form name="frmcont" method="post" action="?lagc=com_videos&videos=<?=time(); ?>&crear_video=<?=time(); ?>">
        <center>
        <table  border="0" align="center">
        <tr>
        <th align="center" valign="middle" nowrap="nowrap">Ingrese el Enlace<br />"Solo Youtube"</th>
        <td align="center" valign="middle">
        <span style="color:#CCC; font-size:10px;">http://www.youtube.com/watch?v=HzEl9sv77BU</span><br />
        <input type="text" name="enlace" class="inp-form" />
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center"><input type="submit" value="Enviar" class="form-guardar" /></td>
        </tr>
        </table>
        </center>
        </form>
        <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			$youtube = new Youtube($_POST['enlace']);
			include "componentes/com_videos/crear_video.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO video_videos (vi_titulo, vi_categoria, vi_enlace, vi_autor, vi_descripcion, vi_tags, vi_imagen, vi_creado, vi_estado, vi_comentarios) VALUES ('".$_POST['titulo']."', '".$_POST['categoria']."', '".$_POST['urlvideo']."', '".$_COOKIE['user']."', '".$_POST['resumen']."', '".$_POST['palabras']."', '".$_POST['imgsend']."', '".time()."', '".$_POST['activado']."', '".$_POST['comentario']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from video_videos where vi_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['vi_id']) and $url==LGlobal::Url_Amigable($cont['vi_titulo'])) {
				$youtube = new Youtube($cont['vi_enlace']);
				include "componentes/com_videos/editar_video.tpl";
			} else { echo "<br><center><h3>No existe el Video</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE video_videos SET vi_titulo='".$_POST['titulo']."', vi_categoria='".$_POST['categoria']."', vi_enlace='".$_POST['urlvideo']."', vi_autor='".$_COOKIE["user"]."', vi_descripcion='".$_POST['resumen']."', vi_tags='".$_POST['palabras']."', vi_imagen='".$_POST['imgsend']."', vi_modificado='".time()."', vi_comentarios='".$_POST['comentario']."', vi_estado='".$_POST['activado']."' WHERE vi_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if ($_GET['aplicar']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se Edito correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".$id."&editar_video=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from video_videos where vi_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['vi_id']) and $titulo==LGlobal::Url_Amigable($conte['vi_titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['vi_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['vi_titulo']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['vi_titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_videos'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM video_videos WHERE vi_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE video_videos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el Video</h3></center>"; }
	}
	function Comentarios(){
		echo "aqui comentarios px";
	}
}
class Categorias{
	function IniciC() { ?>
    <div class="botonesdemando">
    <a href="?lagc=com_videos"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Ver Videos</a>
    <a href="?lagc=com_videos&videos=<?=time(); ?>&crear_categorias=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva Categoria</a>
    </div><br />
    <h2>Categorias de videos</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from video_categorias order by vi_ca_titulo ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$contenido['vi_ca_id']; ?></td>
        <td><strong><?php echo ucfirst(substr($contenido['vi_ca_titulo'], 0, 20)); ?></strong></td>
        <td><?php echo Videos::Activoc($contenido['vi_ca_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_videos&videos=<?=$contenido['vi_ca_id']; ?>&editar_categorias=<?=LGlobal::Url_Amigable($contenido['vi_ca_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_videos&videos=<?=$contenido['vi_ca_id']; ?>&borrar_categorias=<?=LGlobal::Url_Amigable($contenido['vi_ca_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			include "componentes/com_videos/crear_categoria.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO video_categorias (vi_ca_titulo, vi_ca_descripcion, vi_ca_imagen, vi_ca_estado) VALUES ('".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['img1']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".time()."&categorias=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from video_categorias where vi_ca_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['vi_ca_id']) and $url==LGlobal::Url_Amigable($cont['vi_ca_titulo'])) {
				include "componentes/com_videos/editar_categoria.tpl";
			} else { echo "<br><center><h3>No existe la categoria</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE video_categorias SET vi_ca_titulo='".$_POST['titulo']."', vi_ca_descripcion='".$_POST['resumen']."', vi_ca_imagen='".$_POST['img1']."', vi_ca_estado='".$_POST['activado']."' WHERE vi_ca_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".time()."&categorias=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from video_categorias where vi_ca_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['vi_ca_id']) and $titulo==LGlobal::Url_Amigable($conte['vi_ca_titulo'])) {
			if (empty($_POST['id'])) { ?>
            <center>
            <form name="frmborrar" method="post" action="">
                <input type="hidden" name="id" value="<?=$conte['vi_ca_id']; ?>">
                <input type="hidden" name="title" value="<?=$conte['vi_ca_titulo']; ?>">
                <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['vi_ca_titulo']; ?></strong>?</h3><br>
                <input type="button" value="Cancelar" onclick="location.href='?lagc=com_videos&videos=<?=time(); ?>&categorias=<?=time(); ?>'" class="form-cancel">
                <input type="submit" value="Borrar" class="form-borrar">
            </form>
            </center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM video_categorias WHERE vi_ca_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE video_categorias AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".time()."&categorias=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
class Comentarios{
	function Inicio(){ ?>
    	<div class="botonesdemando"><a href="?lagc=com_videos"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Videos</a></div><br />
    <h2>Comentarios</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Articulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Usuario</a></th>
        <th class="table-header-repeat line-left"><a href="">Comentario</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado el.</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from video_comentarios order by coment_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=Comentarios::VideoC($contenido['coment_video']); ?></strong></td>
        <td><?=LGlobal::Url_Usuario($contenido['coment_usuario'], true, false, "_blank", "../"); ?></td>
        <td style="text-align:justify; padding:5px 5px;"><?=$contenido['coment_comentario']; ?></td>
        <td><?php echo date("Y/m/d", $contenido['coment_creado']); ?></td>
        <td><?php echo Comentarios::Aprobado($contenido['coment_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_videos&videos=<?=$contenido['coment_id']; ?>&comentarios_aprobar=<?=LGlobal::Url_Amigable($contenido['coment_creado']); ?>" title="Editar" class="icon-5 info-tooltip"></a>
        <a href="?lagc=com_videos&videos=<?=$contenido['coment_id']; ?>&comentarios_borrar=<?=LGlobal::Url_Amigable($contenido['coment_creado']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=Comentarios::VideoC($contenido['coment_video']); ?></strong></td>
        <td><?=LGlobal::Url_Usuario($contenido['coment_usuario'], true, false, "_blank", "../"); ?></td>
        <td style="text-align:justify; padding:5px 5px;"><?=$contenido['coment_comentario']; ?></td>
        <td><?php echo date("Y/m/d", $contenido['coment_creado']); ?></td>
        <td><?php echo Comentarios::Aprobado($contenido['coment_estado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_videos&videos=<?=$contenido['coment_id']; ?>&comentarios_aprobar=<?=LGlobal::Url_Amigable($contenido['coment_creado']); ?>" title="Editar" class="icon-5 info-tooltip"></a>
        <a href="?lagc=com_videos&videos=<?=$contenido['coment_id']; ?>&comentarios_borrar=<?=LGlobal::Url_Amigable($contenido['coment_creado']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Aprobado($activo) {
		if ($activo==1) { $result = "Aprobado"; }
		else { $result = "<strong>Desaprobado</strong>"; }
		return $result;
	}
	function VideoC($id) {
		if (!empty($id)) {
			$resparticulos = mysql_query("select * from video_videos where vi_id='".$id."'");
			$articulos = mysql_fetch_array($resparticulos);
			if (!empty($articulos['vi_id'])) {
				$final = "<a href=\"../?lagc=com_blog&id=".$articulos['b_id']."&ver=".LGlobal::Url_Amigable($articulos['b_titulo'])."#lagc\" target=\"_blank\">".$articulos['vi_titulo']."</a>";
			}
			else { $final = "<em>No existe el articulo</em>"; }
		}
		else { $final = "<em>Instrodusca el codigo</em>"; }
		return $final;
	}
	function Aprobarc($id, $titulo) {
		$contenidos = mysql_query("select * from video_comentarios where coment_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['coment_id']) and $titulo==LGlobal::Url_Amigable($conte['coment_creado'])) {
			if (empty($_POST['comentario'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <table width="600" border="0">
            <tr>
            <td align="left" valign="top"><h3>Comentario de: </h3><?=LGlobal::Url_Usuario($conte['coment_usuario'], true, false, "_blank", "../"); ?></td>
            <td rowspan="3" align="left" valign="top"><h3>Dejo el siguiente Mensaje: </h3>
            <textarea name="comentario" cols="40" rows="8" style="text-align:justify; padding:5px 5px;"><?=$conte['coment_comentario']; ?></textarea>
            <br /><br />
            </td>
            </tr>
            <tr>
            <td align="left" valign="top">
            <h3>Se comento en:</h3> <?=Comentarios::VideoC($conte['coment_video']); ?></td>
            </tr>
            <tr>
            <td align="left" valign="top">
            <h3>Creado:</h3> <?=LGlobal::tiempohace($conte['coment_creado']); ?>
            </td>
            </tr>
            </table>
            <center>
            <?php
			$acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\"> Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\"> Desactivado</label>");
			ksort($acti);
			foreach ($acti as $key => $val) {
				if ($conte['coment_estado']==$key) {
					echo $val;
				}
			} ?>
            </center>
            <br />
            <input type="reset" name="Reset" value="Restablecer" class="form-reset">
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_videos&videos=<?=time(); ?>&comentarios=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-guardar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE video_comentarios SET coment_comentario='".$_POST['comentario']."', coment_estado='".$_POST['activado']."' WHERE coment_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".time()."&comentarios=".time()."'\", 1500) </script>
				<br><br><center><h4>Se guardo correctamente...</h4></center>";
				mysql_close($con);
			}
		} else { echo "<br><center><h3>No existe el comentario</h3></center>"; }
	}
	function Borrar($id, $titulo) { ?>
    <h2>Comentarios</h2>
    <?php
		$contenidos = mysql_query("select * from video_comentarios where coment_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['coment_id']) and $titulo==LGlobal::Url_Amigable($conte['coment_creado'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['coment_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['coment_comentario']; ?>"><br /><br />
            <h3>Usted desea eliminar el comentario: <em style="color:#000;"><u><?=$conte['coment_comentario']; ?></u></em> de <?=LGlobal::Url_Usuario($conte['coment_usuario'], true, false, "_blank", "../"); ?> creado <?=LGlobal::tiempohace($conte['coment_creado']); ?>.</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_videos&videos=<?=time(); ?>&comentarios=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM video_comentarios WHERE coment_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE video_comentarios AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_videos&videos=".time()."&comentarios=".time()."'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
?>