<?php
class Blog{
	function Inicib(){
		if(!empty($_GET['categoria'])){
			$filtrarcat = "where b_categoria='".$_GET['categoria']."'";
		} else { $filtrarcat=""; }
	?>
	<div class="botonesdemando"><a href="?lagc=com_musica&blog=<?=time(); ?>&categoria_musica=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Categorias</a> <a href="?lagc=com_blog&blog=<?=time(); ?>&comentarios=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/usuario.gif" border="0" /> Comentarios</a> <a href="?lagc=com_blog&blog=<?=time(); ?>&crear_blog=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Articulo</a></div><br />
    <h2><a href="?lagc=com_blog">Articulos</a><?php if(!empty($_GET['categoria'])){ echo " &raquo; ".Blog::VerCategoria($_GET['categoria']); } ?></h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Categoria</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado por:</a></th>
        <th class="table-header-repeat line-left"><a href="">Resumen</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Cre.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from blog_articulos $filtrarcat order by b_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['b_titulo'], 0, 20)); ?></strong></td>
        <td><center><?=Blog::VerCategoria($contenido['b_categoria']); ?></center></td>
        <td><img src="../componentes/com_imagenes/thumbnails/<?=$contenido['b_img']; ?>" border="0" /></td>
        <td><?=LGlobal::Url_Usuario($contenido['b_autor'], true, false, "_blank", "../"); ?></td>
        <td><?=ucfirst(substr($contenido['b_resumen'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['b_fecha'])){ echo date("Y/m/d", $contenido['b_fecha']); } ?></td>
        <td><?php if(!empty($contenido['b_fechamodi'])) { echo date("Y/m/d", $contenido['b_fechamodi']); } ?></td>
        <td><?=Blog::Activoc($contenido['b_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&editar_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&borrar_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&ver_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Visualizar" class="icon-5 info-tooltip"></a>
    </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['b_titulo'], 0, 20)); ?></strong></td>
        <td><center><?=Blog::VerCategoria($contenido['b_categoria']); ?></center></td>
        <td><img src="../componentes/com_imagenes/thumbnails/<?=$contenido['b_img']; ?>" border="0" /></td>
        <td><?=LGlobal::Url_Usuario($contenido['b_autor'], true, false, "_blank", "../"); ?></td>
        <td><?=ucfirst(substr($contenido['b_resumen'], 0, 20)); ?></td>
        <td><?php if(!empty($contenido['b_fecha'])){ echo date("Y/m/d", $contenido['b_fecha']); } ?></td>
        <td><?php if(!empty($contenido['b_fechamodi'])) { echo date("Y/m/d", $contenido['b_fechamodi']); } ?></td>
        <td><?=Blog::Activoc($contenido['b_activo']); ?></td>
        <td colspan="2"><a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&editar_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&borrar_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
    	<a href="?lagc=com_blog&blog=<?=$contenido['b_id']; ?>&ver_blog=<?=LGlobal::Url_Amigable($contenido['b_titulo']); ?>" title="Visualizar" class="icon-5 info-tooltip"></a>
    	</td>
      </tr>
    <?php } ?>
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
	function VerCategoria($id) {
		$respcont = mysql_query("select * from blog_categorias where cat_id='".$id."'"); $cont = mysql_fetch_array($respcont);
		if($cont['cat_id']==$id){
			return "<a href=\"?lagc=com_blog&categoria=".$id."\">".$cont['cat_nombre']."</a>";
		}
		else {
			return "no existe";
		}
	}
	function Ver_blog($id, $url){
		if (empty($_POST['activado'])) {
			$respcont = mysql_query("select * from blog_articulos where b_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['b_id']) and $url==LGlobal::Url_Amigable($cont['b_titulo'])) {
				include "componentes/com_blog/ver_blog.tpl";
			} else { echo "<br><center><h3>No existe el Articulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['resumen'])) { $resumen = "0"; } else { $resumen = "1"; }
			if (empty($_POST['formulario'])) { $formulario = "0"; } else { $formulario = "1"; }
			if (empty($_POST['comentario'])) { $comentario = "0"; } else { $comentario = "1"; }
			$sql = "UPDATE blog_articulos SET b_resumen_activar='".$resumen."', b_categoria='".$_POST['categoria']."', b_fechamodi='".time()."', b_form_coment_act='".$formulario."', b_coment_act='".$comentario."', b_activo='".$_POST['activado']."' WHERE b_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog'\", 3500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara a la lista de articulos.</h4></center>";
			mysql_close($con);
		}
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			LGlobal::Editor();
			include "componentes/com_blog/crear_blog.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO blog_articulos (b_autor, b_titulo, b_resumen, b_img, b_resumen_activar, b_contenido, b_categoria, b_palabras, b_fecha, b_form_coment_act, b_coment_act, b_activo) VALUES ('".$_COOKIE["user"]."', '".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['img1']."', '".$_POST['verresumen']."', '".$_POST['contenido']."', '".$_POST['categoria']."', '".$_POST['palabras']."', '".time()."', '".$_POST['verformcoment']."', '".$_POST['vermcoment']."', '".$_POST['activado']."')";
			$respcont = mysql_query("select * from blog_articulos"); $cantregistros = mysql_fetch_array($respcont);
			$cantregistros = $cantregistros['b_id']+1;
			if ($_GET['crear_blog']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".$cantregistros."&editar_blog=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from blog_articulos where b_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['b_id']) and $url==LGlobal::Url_Amigable($cont['b_titulo'])) {
				LGlobal::Editor();
				include "componentes/com_blog/editar_blog.tpl";
			} else { echo "<br><center><h3>No existe el Articulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['vertitulo'])) { $vertitu = "0"; } else { $vertitu = "1"; } if (empty($_POST['verresumen'])) { $verresu = "0"; } else { $verresu = "1"; } if (empty($_POST['verformcoment'])) { $verfrmcomen = "0"; } else { $verfrmcomen = "1"; }
			if (empty($_POST['vermcoment'])) { $vercoment = "0"; } else { $vercoment = "1"; }
			$sql = "UPDATE blog_articulos SET b_autor='".$_POST['usercreado']."', b_titulo='".$_POST['titulo']."', b_resumen='".$_POST['resumen']."', b_img='".$_POST['img1']."', b_resumen_activar='".$verresu."', b_contenido='".$_POST['contenido']."', b_categoria='".$_POST['categoria']."', b_palabras='".$_POST['palabras']."', b_fechamodi='".time()."', b_form_coment_act='".$verfrmcomen."', b_coment_act='".$vercoment."', b_activo='".$_POST['activado']."' WHERE b_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if ($_GET['editar_blog']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".$id."&editar_blog=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from blog_articulos where b_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['b_id']) and $titulo==LGlobal::Url_Amigable($conte['b_titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['b_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['b_titulo']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['b_titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM blog_articulos WHERE b_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE blog_articulos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
}
class Categorias{
	function Inicio() { ?>
    <div class="botonesdemando"><a href="?lagc=com_musica"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Canciones</a> <a href="?lagc=com_musica&blog=<?=time(); ?>&categoria_nuevo=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nueva Categoria</a></div><br />
    <h2>Categorias</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from blog_categorias order by cat_nombre DESC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['cat_nombre'], 0, 20)); ?></strong></td>
        <td><?=Blog::Activoc($contenido['cat_activado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_blog&blog=<?=$contenido['cat_id']; ?>&categoria_editar=<?=LGlobal::Url_Amigable($contenido['cat_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['cat_id']; ?>&categoria_borrar=<?=LGlobal::Url_Amigable($contenido['cat_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['cat_nombre'], 0, 20)); ?></strong></td>
        <td><?=Blog::Activoc($contenido['cat_activado']); ?></td>
        <td colspan="2"><a href="?lagc=com_blog&blog=<?=$contenido['cat_id']; ?>&categoria_editar=<?=LGlobal::Url_Amigable($contenido['cat_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['cat_id']; ?>&categoria_borrar=<?=LGlobal::Url_Amigable($contenido['cat_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			include "componentes/com_blog/crear_categoria.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO blog_categorias (cat_nombre, cat_descripcion, cat_activado) VALUES ('".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['activado']."')";
			$respcont = mysql_query("select * from blog_categorias"); $cantregistros = mysql_fetch_array($respcont);
			$cantregistros = $cantregistros['cat_id']+1;
			if ($_GET['categoria_nuevo']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".time()."&categoria_blog=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".$cantregistros."&categoria_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from blog_categorias where cat_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cat_id']) and $url==LGlobal::Url_Amigable($cont['cat_nombre'])) {
				include "componentes/com_blog/editar_categoria.tpl";
			} else { echo "<br><center><h3>No existe la categoria</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['vertitulo'])) { $vertitu = "0"; } else { $vertitu = "1"; } if (empty($_POST['verresumen'])) { $verresu = "0"; } else { $verresu = "1"; }
			$sql = "UPDATE blog_categorias SET cat_nombre='".$_POST['titulo']."', cat_descripcion='".$_POST['resumen']."', cat_activado='".$_POST['activado']."' WHERE cat_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			/*donde ira despues de guardar*/
			if ($_GET['categoria_editar']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".time()."&categoria_blog=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".$id."&categoria_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
			}
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from blog_categorias where cat_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cat_id']) and $titulo==LGlobal::Url_Amigable($conte['cat_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['cat_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['cat_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['cat_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog&blog=<?=time(); ?>&categoria_blog=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM blog_categorias WHERE cat_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE blog_categorias AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".time()."&categoria_blog=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
class Comentarios{
	function Inicio(){ ?>
    	<div class="botonesdemando"><a href="?lagc=com_blog"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Articulos</a></div><br />
    <h2>Comentarios</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Articulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Usuario</a></th>
        <th class="table-header-repeat line-left"><a href="">Comentario</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado el.</a></th>
        <th class="table-header-repeat line-left"><a href="">Aprobado el.</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from blog_comentarios order by comen_id DESC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=Comentarios::Articulo($contenido['comen_articulo']); ?></strong></td>
        <td><?=LGlobal::Url_Usuario($contenido['comen_usuario'], true, false, "_blank", "../"); ?></td>
        <td style="text-align:justify; padding:5px 5px;"><?=$contenido['comen_comentario']; ?></td>
        <td><?=date("Y/m/d", $contenido['comen_fcreado']); ?></td>
        <td><?=date("Y/m/d", $contenido['comen_faprobado']); ?></td>
        <td><?=Comentarios::Aprobado($contenido['comen_aprobado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_blog&blog=<?=$contenido['comen_id']; ?>&comentarios_aprobar=<?=LGlobal::Url_Amigable($contenido['comen_fcreado']); ?>" title="Editar" class="icon-5 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['comen_id']; ?>&comentarios_borrar=<?=LGlobal::Url_Amigable($contenido['comen_fcreado']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=Comentarios::Articulo($contenido['comen_articulo']); ?></strong></td>
        <td><?=LGlobal::Url_Usuario($contenido['comen_usuario'], true, false, "_blank", "../"); ?></td>
        <td style="text-align:justify; padding:5px 5px;"><?=$contenido['comen_comentario']; ?></td>
        <td><?=date("Y/m/d", $contenido['comen_fcreado']); ?></td>
        <td><?=date("Y/m/d", $contenido['comen_faprobado']); ?></td>
        <td><?=Comentarios::Aprobado($contenido['comen_aprobado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_blog&blog=<?=$contenido['comen_id']; ?>&comentarios_aprobar=<?=LGlobal::Url_Amigable($contenido['comen_fcreado']); ?>" title="Editar" class="icon-5 info-tooltip"></a>
        <a href="?lagc=com_blog&blog=<?=$contenido['comen_id']; ?>&comentarios_borrar=<?=LGlobal::Url_Amigable($contenido['comen_fcreado']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Aprobado($activo) {
		if ($activo==1) { $result = "Aprobado"; }
		else { $result = "Desaprobado"; }
		return $result;
	}
	function Articulo($id) {
		if (!empty($id)) {
			$resparticulos = mysql_query("select * from blog_articulos where b_id='".$id."'");
			$articulos = mysql_fetch_array($resparticulos);
			if (!empty($articulos['b_id'])) {
				$final = "<a href=\"../?lagc=com_blog&id=".$articulos['b_id']."&ver=".LGlobal::Url_Amigable($articulos['b_titulo'])."#lagc\" target=\"_blank\">".$articulos['b_titulo']."</a>";
			}
			else {
				$final = "<em>No existe el articulo</em>";
			}
		}
		else {
			$final = "<em>Instrodusca el codigo</em>";
		}
		return $final;
	}
	function Aprobarc($id, $titulo) {
		$contenidos = mysql_query("select * from blog_comentarios where comen_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['comen_id']) and $titulo==LGlobal::Url_Amigable($conte['comen_fcreado'])) {
			if (empty($_POST['comentario'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <table width="600" border="0">
            <tr>
            <td align="left" valign="top"><h3>Comentario de: </h3><?=LGlobal::Url_Usuario($conte['comen_usuario'], true, false, "_blank", "../"); ?></td>
            <td rowspan="3" align="left" valign="top"><h3>Dejo el siguiente Mensaje: </h3>
            <textarea name="comentario" cols="40" rows="8" style="text-align:justify; padding:5px 5px;"><?=$conte['comen_comentario']; ?></textarea>
            <br /><br />
            </td>
            </tr>
            <tr>
            <td align="left" valign="top">
            <h3>Se comento en:</h3> <?=Comentarios::Articulo($conte['comen_articulo']); ?></td>
            </tr>
            <tr>
            <td align="left" valign="top">
            <h3>Creado:</h3> <?=LGlobal::tiempohace($conte['comen_fcreado']); ?>
            <?php if (!empty($conte['comen_faprobado'])) { ?><h3>Modificado:</h3> <?=LGlobal::tiempohace($conte['comen_faprobado']); ?><?php } ?>
            </td>
            </tr>
            </table>
            <center>
            <?php
			$acti = array("1"=>"<label><input name=\"activado\" type=\"radio\" checked=\"checked\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" value=\"2\"> Desactivado</label>", "2"=>"<label><input name=\"activado\" type=\"radio\" value=\"1\"> Activado</label><label><input type=\"radio\" name=\"activado\" checked=\"checked\" value=\"2\"> Desactivado</label>");
			ksort($acti);
			foreach ($acti as $key => $val) {
				if ($conte['comen_aprobado']==$key) {
					echo $val;
				}
			} ?>
            </center>
            <br />
            <input type="reset" name="Reset" value="Restablecer" class="form-reset">
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog&blog=<?=time(); ?>&comentarios=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-guardar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE blog_comentarios SET comen_comentario='".$_POST['comentario']."', comen_faprobado='".time()."', comen_aprobado='".$_POST['activado']."' WHERE comen_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".time()."&comentarios=".time()."'\", 1500) </script>
				<br><br><center><h4>Se guardo correctamente...</h4></center>";
				mysql_close($con);
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
	function Borrar($id, $titulo) { ?>
    <h2>Comentarios</h2>
    <?php
		$contenidos = mysql_query("select * from blog_comentarios where comen_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['comen_id']) and $titulo==LGlobal::Url_Amigable($conte['comen_fcreado'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['comen_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['comen_comentario']; ?>"><br /><br />
            <h3>Usted desea eliminar el comentario: <em style="color:#000;"><u><?=$conte['comen_comentario']; ?></u></em> de <?=LGlobal::Url_Usuario($conte['comen_usuario'], true, false, "_blank", "../"); ?> creado <?=LGlobal::tiempohace($conte['comen_fcreado']); ?> <?php if (!empty($conte['comen_faprobado'])) { ?> y aprobado <?=LGlobal::tiempohace($conte['comen_faprobado']); ?><?php } ?>.</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog&blog=<?=time(); ?>&comentarios=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM blog_comentarios WHERE comen_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE blog_comentarios AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_blog&blog=".time()."&comentarios=".time()."'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
			}
		} else { echo "<br><center><h3>No existe el contenido</h3></center>"; }
	}
}
?>