<?php
class Componentes {
	function Inicio() { ?>
	<div class="botonesdemando"><a href="?lagc=com_componentes&componentes=<?php echo time(); ?>&crear=componente"><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" border="0"> Nuevo Componente</a></div><br>
    <table border="0" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Url</a></th>
        <th class="table-header-repeat line-left"><a href="">Archivo de inicio</a></th>
        <th class="table-header-repeat line-left"><a href="">Campo BD</a></th>
        <th class="table-header-repeat line-left"><a href="">E-mail</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Instal.</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Des.</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from componentes order by nombre ASC"); while($component = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($component['nombre'], 0, 20)); ?></strong></td>
        <td><?php echo $component['url']; ?></td>
        <td><?php echo $component['archivo']; ?>.php <img src="plantillas/lagc-peru/imagenes/php.gif" border="0"></td>
        <td><?php echo $component['campobd']; ?></td>
        <td><?php echo substr($component['email'], 0, 15)."..."; ?></td>
        <td align="center"><?php echo date("Y/m/d", $component['fecha']); ?></td>
        <td align="center"><?php echo Componentes::Activoc($component['visible']); ?></td>
        <td align="center" colspan="2">
		<?php echo Componentes::Acti_Edid($component['id_com'], $component['url']); ?>
		<?php echo Componentes::Acti_Delet($component['id_com'], $component['url']); ?></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($component['nombre'], 0, 20)); ?></strong></td>
        <td><?php echo $component['url']; ?></td>
        <td><?php echo $component['archivo']; ?>.php <img src="plantillas/lagc-peru/imagenes/php.gif" border="0"></td>
        <td><?php echo $component['campobd']; ?></td>
        <td><?php echo substr($component['email'], 0, 15)."..."; ?></td>
        <td align="center"><?php echo date("Y/m/d", $component['fecha']); ?></td>
        <td align="center"><?php echo Componentes::Activoc($component['visible']); ?></td>
        <td align="center" colspan="2">
		<?php echo Componentes::Acti_Edid($component['id_com'], $component['url']); ?>
		<?php echo Componentes::Acti_Delet($component['id_com'], $component['url']); ?></td>
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
		if ($id!=1 and $id!=2 and $id!=3 and $id!=4 and $id!=5 and $id!=6 and $id!=7 and $id!=8 and $id!=9 and $id!=10) {
			if (empty($_POST['url'])) {
				$respcompo = mysql_query("select * from componentes where id_com='".$id."'"); $compo = mysql_fetch_array($respcompo);
				@include "componentes/com_componentes/editar.tpl";
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE componentes SET url='com_".$_POST['url']."', archivo='".$_POST['ainicio']."', campobd='".$_POST['tablab']."', campopalabras='".$_POST['palab']."', campodescrip='".$_POST['describ']."', campoid='".$_POST['idb']."', campotitulo='".$_POST['titulob']."', nombre='".$_POST['titulo']."', descripcion='".$_POST['descrip']."', email='".$_POST['email']."', licencia='".$_POST['licen']."', visible='".$_POST['activado']."' WHERE id_com='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_componentes'\", 1500) </script><br><br><center><h3>Se Guardo Correctamente</h3><h4><b>".$_POST['titulo']."</b></h4></center>";
				mysql_close($con);
			}
		}
		else {
			echo "<center><h2>noce puede editar este componente</h2><br><a href=\"?lagc=com_componentes\">< Regresar</a></center>";
		}
	}
	function Crear() {
		if (empty($_POST['url'])) {
			include "componentes/com_componentes/crear.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$rutacarpeta = "componentes/com_".$_POST['url'];
			if(!mkdir($rutacarpeta, 0755, true)) { echo "<em>Fallo al crear carpetas</em>"; }
			else {
				$rutacarpeta2 = "../".$rutacarpeta;
				mkdir($rutacarpeta2, 0755, true);
				$nombre_archivo = "archivo.php";
				fopen($rutacarpeta."/".$_POST['ainicio'].".php", 'w') or die("Error al Crear: <em>".$_POST['ainicio']."</em>, en el administrador.");
				fopen($rutacarpeta2."/".$_POST['ainicio'].".php", 'w') or die("Error al Crear: <em>".$_POST['ainicio']."</em>, en el sitio");
				fwrite($rutacarpeta2."/".$_POST['ainicio'].".php", $_POST['descrip']);
			$sql = "INSERT INTO componentes (url, archivo, campobd, campopalabras, campodescrip, campoid, campotitulo, nombre, descripcion, email, licencia, visible, fecha) VALUES ('com_".$_POST['url']."', '".$_POST['ainicio']."', '".$_POST['tablab']."', '".$_POST['palab']."', '".$_POST['describ']."', '".$_POST['idb']."', '".$_POST['titulob']."', '".$_POST['titulo']."', '".$_POST['descrip']."', '".$_POST['email']."', '".$_POST['licen']."', '".$_POST['activado']."', '".time()."')";
			mysql_query($sql,$con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_componentes'\", 3000) </script><br><br><center><h3>Se creo el componente correctamente</h3></center><h4><b>".$_POST['titulo']."</b></h4>";
			}
		}
	}
	function Borrar($id, $titulo) {
		if ($id!=1 and $id!=2 and $id!=3 and $id!=4 and $id!=5 and $id!=6 and $id!=7 and $id!=8 and $id!=9 and $id!=10) {
			$contenidos = mysql_query("select * from componentes where id_com='".$id."'"); $conte = mysql_fetch_array($contenidos);
			if (!empty($conte['id_com']) and $titulo==$conte['url']) {
				if (empty($_POST['id'])) { ?><center>
				<form name="frmborrar" method="post" action="">
				<input type="hidden" name="id" value="<?php echo $conte['id_com']; ?>">
				<input type="hidden" name="title" value="<?php echo $conte['nombre']; ?>">
				<br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['nombre']; ?></strong>?</h3><br>
				<input type="button" value="Cancelar" onclick="location.href='?lagc=com_componentes'" class="form-cancel">
				<input type="submit" value="Borrar" class="form-borrar">
				</form></center>
				<?php
				}
				else {
					$config = new LagcConfig(); //Conexion
					$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
					mysql_select_db($config->lagcbd,$con);
					$respcompo = mysql_query("select * from componentes where id_com='".$id."'"); $compdelet = mysql_fetch_array($respcompo);
					$sql = "DELETE FROM componentes WHERE id_com='".$id."'";
					$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
					$sql = "ALTER TABLE componentes AUTO_INCREMENT =1";
					$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
					mysql_close($con);
					$urldelet = "componentes/".$compdelet['url']; /*ruta*/
					Componentes::SacarDirectorio($urldelet); /*borro lo que este dentro de la carpeta*/
					rmdir($urldelet); /*borro carpeta*/
					Componentes::SacarDirectorio("../".$urldelet);
					rmdir("../".$urldelet);
					echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_componentes'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
				}
			} else { echo "<br><center><h3>No existe el Componente</h3></center>"; }
		} else { echo "<center><h2>noce puede borrar este componente</h2><br><a href=\"?lagc=com_componentes\">< Regresar</a></center>"; }
	}
	function SacarDirectorio($path) {
		$path = rtrim(strval($path ),'/');
		$d = dir($path);
		if(!$d)
			return false;
		while (false !== ($current = $d->read())) {
			if($current==='.' || $current==='..')
				continue;
				$file = $d->path.'/'.$current;
				if(is_dir($file))
				removeDirectory($file);
			if(is_file($file))
				unlink($file);
		}
		rmdir($d->path);
		$d->close();
		return true;
	}
	function Acti_Edid($id, $enlace) {
		if ($id!=1 and $id!=2 and $id!=3 and $id!=4 and $id!=5 and $id!=6 and $id!=7 and $id!=8 and $id!=9 and $id!=10) { $valor = "<a href=\"?lagc=com_componentes&componentes=".$id."&editar=".$enlace."\" title=\"Configurar\" class=\"icon-1 info-tooltip\"></a>"; }
		else { $valor = "<a title=\"Configuraci&oacute;n esta Desactivado\" class=\"icon-1-desac info-tooltip\"></a>"; }
		return $valor;
	}
	function Acti_Delet($id, $enlace) {
		if ($id!=1 and $id!=2 and $id!=3 and $id!=4 and $id!=5 and $id!=6 and $id!=7 and $id!=8 and $id!=9 and $id!=10) { $valor1 = "<a href=\"?lagc=com_componentes&componentes=".$id."&borrar=".$enlace."\" title=\"Borrar\" class=\"icon-2 info-tooltip\"></a>"; }
		else { $valor1 = "<a title=\"Borrar Desactivado\" class=\"icon-2-desac info-tooltip\"></a>"; }
		return $valor1;
	}
}
?>