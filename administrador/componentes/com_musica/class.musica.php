<?php
class Musica{
	function Inicib(){
		if(!empty($_GET['cantante'])){
			$filtrar = "where song_id_cantante='".$_GET['cantante']."'";
		}
		else if(!empty($_GET['servidor'])){
			$filtrar = "where song_id_servidor='".$_GET['servidor']."'";
		} else { $filtrar=""; }
	?>
	<div class="botonesdemando">
		<a href="?lagc=com_musica&musica=<?=time(); ?>&servidor_musica=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/servidor.png" border="0" /> Servidores</a>
		<a href="?lagc=com_musica&musica=<?=time(); ?>&genero_musica=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/musica2.gif" border="0" /> Generos</a>
		<a href="?lagc=com_musica&musica=<?=time(); ?>&cantante_musica=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/ico_visitas.gif" border="0" /> Cantantes o Grupos</a>
		<a href="?lagc=com_musica&musica=<?=time(); ?>&comentarios=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/usuario.gif" border="0" /> Comentarios</a>
		<a href="?lagc=com_musica&musica=<?=time(); ?>&selec_serv_musica=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/musica.png" border="0" /> Nueva Cancion</a>
	</div><br />
    <h2><a href="?lagc=com_musica">Canciones</a><?php if(!empty($_GET['cantante'])){ echo " &raquo; ".Musica::VerCantante($_GET['cantante']); } ?><?php if(!empty($_GET['servidor'])){ echo " &raquo; ".Musica::VerServidor($_GET['servidor']); } ?></h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Servidor</a></th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Cantante</a></th>
        <th class="table-header-repeat line-left"><a href="">Genero</a></th>
        <th class="table-header-repeat line-left"><a href="">Creado por:</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagen /YTB</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Cre.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from music_canciones $filtrar order by song_id ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$contenido['song_id']; ?></td>
        <td><center><?=Musica::VerServidor($contenido['song_id_servidor']); ?></center></td>
        <td><strong><?=ucfirst(substr($contenido['song_titulo'], 0, 25)); ?></strong></td>
        <td><center><?=Musica::VerCantante($contenido['song_id_cantante']); ?></center></td>
        <td><center><?=Musica::VerGenero($contenido['song_id_genero']); ?></center></td>
        <td><?=LGlobal::Url_Usuario($contenido['song_user'], true, false, "_blank", "../"); ?></td>
        <td><img src="http://i.ytimg.com/vi/<?=$contenido['song_video']; ?>/default.jpg" border="0" /></td>
        <td><?php if(!empty($contenido['song_creado'])){ echo date("Y/m/d", $contenido['song_creado']); } ?></td>
        <td><?php if(!empty($contenido['song_modificado'])) { echo date("Y/m/d", $contenido['song_modificado']); } ?></td>
        <td><?=Musica::Activoc($contenido['song_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['song_id']; ?>&editar_musica=<?=LGlobal::Url_Amigable($contenido['song_titulo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['song_id']; ?>&borrar_musica=<?=LGlobal::Url_Amigable($contenido['song_titulo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
    </td>
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
	function VerCantante($id) {
		$respcont = mysql_query("select * from music_cantantes where cantan_id='".$id."'"); $cont = mysql_fetch_array($respcont);
		if($cont['cantan_id']==$id){
			return "<a href=\"?lagc=com_musica&cantante=".$cont['cantan_id']."\">".$cont['cantan_nombre']."</a>";
		}
		else {
			return "no existe";
		}
	}
	function VerGenero($id) {
		$respcont = mysql_query("select * from music_genero where genero_id='".$id."'"); $cont = mysql_fetch_array($respcont);
		if($cont['genero_id']==$id){
			return $cont['genero_nombre'];
		}
		else {
			return "no existe";
		}
	}
	function VerServidor($id) {
		$respcont = mysql_query("select * from music_servidor where serv_id='".$id."'"); $cont = mysql_fetch_array($respcont);
		if($cont['serv_id']==$id){
			return "<a href=\"?lagc=com_musica&servidor=".$cont['serv_id']."\">".$cont['serv_nombre']."</a>";
		}
		else {
			return "no existe";
		}
	}
	function NuevoSelec(){
	$rptserver = mysql_query("select * from music_servidor where serv_activo=1 order by serv_id ASC"); ?>
	<div style="width: 650px; margin: 60px auto;">
	<h2>1) Seleccione el servidor que desea usar</h2><br>
	<form name="selectservidor" method="post" action="?lagc=com_musica&musica=<?=time(); ?>&crear_musica=<?=time(); ?>">
	<center>
		<table width="400" border="0" cellspacing="5" cellpadding="5" align="center">
			<tr>
				<?php $contador = 1;
				while($servidor = mysql_fetch_array($rptserver)) {
					if ($contador > 3) {
						echo "</tr><tr>"; $contador = 1;
					}
				echo "<td align=center valign=middle><label><input type='radio' name='servidor' value='".$servidor['serv_id']."'> ".$servidor['serv_nombre']."</label></td>";
				$contador++;
				} ?>
			</tr>
		</table><br>
		<input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica'" class="form-cancel">
		<input type="submit" value="Guardar" class="form-guardar">
	</center>
	</form>
	</div>
	<?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			LGlobal::MiniEditor();
			include "componentes/com_musica/crear_cancion.tpl";
		}
		else {
			include "componentes/com_videos/youtube.class.php";
			if(!empty($_POST['url'])){ $youtube = new Youtube($_POST['url']); $videoyt = $youtube->ID(); }
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO music_canciones (song_titulo, song_id_cantante, song_id_genero, song_id_servidor, song_letra, song_video, song_url, song_user, song_creado, song_activo) VALUES ('".$_POST['titulo']."', '".$_POST['cantante']."', '".$_POST['genero']."', '".$_POST['server']."', '".$_POST['letra']."', '".$videoyt."', '".$_POST['urlcancion']."', '".$_COOKIE["user"]."', '".time()."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica'\", 1300) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from music_canciones where song_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['song_id']) and $url==LGlobal::Url_Amigable($cont['song_titulo'])) {
				LGlobal::Editor();
				include "componentes/com_musica/editar_cancion.tpl";
			} else { echo "<br><center><h3>No existe la cancion</h3></center>"; }
		}
		else {
			include "componentes/com_videos/youtube.class.php";
			if(!empty($_POST['url'])){ $youtube = new Youtube($_POST['url']); }
			if ($youtube->ID()==$_POST['url']) { $videoyt = $_POST['url']; } else { $videoyt = $youtube->ID(); }
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE music_canciones SET song_titulo='".$_POST['titulo']."', song_id_cantante='".$_POST['cantante']."', song_id_genero='".$_POST['genero']."', song_id_servidor='".$_POST['servidor']."', song_letra='".$_POST['letra']."', song_video='".$videoyt."', song_url='".$_POST['urlcancion']."', song_modificado='".time()."', song_activo='".$_POST['activado']."' WHERE song_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se a editado correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from music_canciones where song_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['song_id']) and $titulo==LGlobal::Url_Amigable($conte['song_titulo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['song_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['song_titulo']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['song_titulo']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM music_canciones WHERE song_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE music_canciones AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
}
class Generos{
	function Inicio() { ?>
    <div class="botonesdemando"><a href="?lagc=com_musica"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Canciones</a> <a href="?lagc=com_musica&musica=<?=time(); ?>&genero_nuevo=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Genero</a></div><br />
    <h2>Generos</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Genero</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from music_genero order by genero_nombre ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['genero_nombre'], 0, 20)); ?></strong></td>
        <td><?=Musica::Activoc($contenido['genero_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['genero_id']; ?>&genero_editar=<?=LGlobal::Url_Amigable($contenido['genero_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['genero_id']; ?>&genero_borrar=<?=LGlobal::Url_Amigable($contenido['genero_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['genero_nombre'], 0, 20)); ?></strong></td>
        <td><?=Musica::Activoc($contenido['genero_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['genero_id']; ?>&genero_editar=<?=LGlobal::Url_Amigable($contenido['genero_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['genero_id']; ?>&genero_borrar=<?=LGlobal::Url_Amigable($contenido['genero_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_musica/crear_genero.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO music_genero (genero_nombre, genero_descripcion, genero_css, genero_activo) VALUES ('".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['css']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&genero_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from music_genero where genero_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['genero_id']) and $url==LGlobal::Url_Amigable($cont['genero_nombre'])) {
				include "componentes/com_musica/editar_genero.tpl";
			} else { echo "<br><center><h3>No existe el Genero</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE music_genero SET genero_nombre='".$_POST['titulo']."', genero_descripcion='".$_POST['resumen']."', genero_css='".$_POST['css']."', genero_activo='".$_POST['activado']."' WHERE genero_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&genero_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from music_genero where genero_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['genero_id']) and $titulo==LGlobal::Url_Amigable($conte['genero_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['genero_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['genero_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['genero_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica&musica=<?=time(); ?>&genero_musica=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM music_genero WHERE genero_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE music_genero AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&genero_musica=".time()."'\", 1500) </script><center><h4>Se borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el genero</h3></center>"; }
	}
}
class Cantantes{
	function Inicio() { ?>
    <div class="botonesdemando"><a href="?lagc=com_musica"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Canciones</a> <a href="?lagc=com_musica&musica=<?=time(); ?>&cantante_nuevo=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Cantante o Grupo</a></div><br />
    <h2>Cantantes o Agrupacion</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Genero</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from music_cantantes order by cantan_nombre ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['cantan_nombre'], 0, 20)); ?></strong></td>
        <td><?=Musica::Activoc($contenido['cantan_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['cantan_id']; ?>&cantante_editar=<?=LGlobal::Url_Amigable($contenido['cantan_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['cantan_id']; ?>&cantante_borrar=<?=LGlobal::Url_Amigable($contenido['cantan_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['cantan_nombre'], 0, 20)); ?></strong></td>
        <td><?=Musica::Activoc($contenido['cantan_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['cantan_id']; ?>&cantante_editar=<?=LGlobal::Url_Amigable($contenido['cantan_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['cantan_id']; ?>&cantante_borrar=<?=LGlobal::Url_Amigable($contenido['cantan_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_musica/crear_cantantes.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$generos = implode ('/', $_POST["generos"]);
			$sql = "INSERT INTO music_cantantes (cantan_nombre, cantan_generos, cantan_descripcion, cantan_anio, cantan_pais, cantan_premios, cantan_css, cantan_activo) VALUES ('".$_POST['titulo']."', '".$generos."', '".$_POST['resumen']."', '".$_POST['anioinic']."', '".$_POST['paisori']."', '".$_POST['premios']."', '".$_POST['css']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&cantante_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from music_cantantes where cantan_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cantan_id']) and $url==LGlobal::Url_Amigable($cont['cantan_nombre'])) {
				include "componentes/com_musica/editar_cantante.tpl";
			} else { echo "<br><center><h3>No existe el Cantante o grupo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$generos = implode ('/', $_POST["generos"]);
			$sql = "UPDATE music_cantantes SET cantan_nombre='".$_POST['titulo']."', cantan_generos='".$generos."', cantan_descripcion='".$_POST['resumen']."', cantan_anio='".$_POST['anioinic']."', cantan_pais='".$_POST['paisori']."', cantan_premios='".$_POST['premios']."', cantan_css='".$_POST['css']."', cantan_activo='".$_POST['activado']."' WHERE cantan_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&cantante_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from music_cantantes where cantan_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cantan_id']) and $titulo==LGlobal::Url_Amigable($conte['cantan_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['cantan_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['cantan_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['cantan_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica&musica=<?=time(); ?>&cantante_musica=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM music_cantantes WHERE cantan_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE music_cantantes AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&cantante_musica=".time()."'\", 1500) </script><center><h4>Se borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el genero</h3></center>"; }
	}
	private function _SelecGenero($compo){
		$respcomp = mysql_query("select * from music_genero where genero_activo='1' ORDER BY genero_nombre ASC");
		while($comp = mysql_fetch_array($respcomp)) {
			$permisoss=split("/",$compo);
			$var2 = 0;
			for($n=0;$n<count($permisoss);$n++) {
				if ($permisoss[$n] == $comp['genero_id']) {
					$var2 = 1;
					break;
				}
			}
			/**/
			if ($var2 == 1) {
				echo "<option value=\"".$comp['genero_id']."\" selected=\"selected\">".$comp['genero_nombre']."</option>\n";
			}
			else {
				echo "<option value=\"".$comp['genero_id']."\">".$comp['genero_nombre']."</option>\n";
			}
		}
	}
}
class Servidores{
	function Inicio() { ?>
    <div class="botonesdemando"><a href="?lagc=com_musica"><img src="plantillas/lagc-peru/imagenes/articulo.gif" border="0" /> Canciones</a> <a href="?lagc=com_musica&musica=<?=time(); ?>&servidor_nuevo=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Servidor</a></div><br />
    <h2>Servidores</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">URL</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from music_servidor order by serv_nombre ASC"); while($contenido = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['serv_nombre'], 0, 20)); ?></strong></td>
        <td><?=$contenido['serv_url']; ?></td>
        <td><?=Musica::Activoc($contenido['serv_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['serv_id']; ?>&servidor_editar=<?=LGlobal::Url_Amigable($contenido['serv_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['serv_id']; ?>&servidor_borrar=<?=LGlobal::Url_Amigable($contenido['serv_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contenido['serv_nombre'], 0, 20)); ?></strong></td>
        <td><?=$contenido['serv_url']; ?></td>
        <td><?=Musica::Activoc($contenido['serv_activo']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_musica&musica=<?=$contenido['serv_id']; ?>&servidor_editar=<?=LGlobal::Url_Amigable($contenido['serv_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_musica&musica=<?=$contenido['serv_id']; ?>&servidor_borrar=<?=LGlobal::Url_Amigable($contenido['serv_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) { include "componentes/com_musica/crear_servidor.tpl"; }
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO music_servidor (serv_nombre, serv_descripcion, serv_url, serv_acceso_user, serv_serv_acceso_pass, serv_serv_acceso_carpeta, serv_css, serv_activo) VALUES ('".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['url']."', '".$_POST['usuario']."', '".$_POST['pass']."', '".$_POST['carpeta']."', '".$_POST['css']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&servidor_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from music_servidor where serv_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['serv_id']) and $url==LGlobal::Url_Amigable($cont['serv_nombre'])) {
				include "componentes/com_musica/editar_servidor.tpl";
			} else { echo "<br><center><h3>No existe el Servidor</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE music_servidor SET serv_nombre='".$_POST['titulo']."', serv_descripcion='".$_POST['resumen']."', serv_url='".$_POST['url']."', serv_acceso_user='".$_POST['usuario']."', serv_serv_acceso_pass='".$_POST['pass']."', serv_serv_acceso_carpeta='".$_POST['carpeta']."', serv_css='".$_POST['css']."', serv_activo='".$_POST['activado']."' WHERE serv_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&servidor_musica=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from music_servidor where serv_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['serv_id']) and $titulo==LGlobal::Url_Amigable($conte['serv_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['serv_id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['serv_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['serv_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_musica&musica=<?=time(); ?>&servidor_musica=<?=time(); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM music_servidor WHERE serv_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE music_servidor AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_musica&musica=".time()."&servidor_musica=".time()."'\", 1500) </script><center><h4>Se borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el genero</h3></center>"; }
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