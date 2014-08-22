<?php
class Locales {
	function Inicio() { ?>
	<div class="botonesdemando">
    	<h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Lista de locales</h3>
    </div>
    <div class="botonesdemando">
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo time(); ?>&crear_locales=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Local</a>
    </div><br />
    <h2>Locales</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Direcci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Telefonos</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cp_locales order by cp_lnombre ASC"); while($product = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $product['cp_lnombre']; ?></strong></td>
        <td><?php echo substr($product['cp_ldireccion'], 0, 20); ?></td>
        <td><?php $telefonos = explode('|', $product['cp_ltelefonos']);
		if (!empty($telefonos[0])) { echo "&deg; ".$telefonos[0]."<br>"; }
		if (!empty($telefonos[1])) { echo "&deg; ".$telefonos[1]."<br>"; }
		if (!empty($telefonos[2])) { echo "&deg; ".$telefonos[2]."<br>"; } ?></td>
        <td><?php echo Locales::Activoc($product['cp_lactivado']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_lid']; ?>&editar_locales=<?php echo LGlobal::Url_Amigable($product['cp_lnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_lid']; ?>&borrar_locales=<?php echo LGlobal::Url_Amigable($product['cp_lnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo $product['cp_lnombre']; ?></strong></td>
        <td><?php echo substr($product['cp_ldireccion'], 0, 20); ?></td>
        <td><?php $telefonos = explode('|', $product['cp_ltelefonos']);
		if (!empty($telefonos[0])) { echo "&deg; ".$telefonos[0]."<br>"; }
		if (!empty($telefonos[1])) { echo "&deg; ".$telefonos[1]."<br>"; }
		if (!empty($telefonos[2])) { echo "&deg; ".$telefonos[2]."<br>"; } ?></td>
        <td><?php echo Locales::Activoc($product['cp_lactivado']); ?></td>
        <td colspan="2"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_lid']; ?>&editar_locales=<?php echo LGlobal::Url_Amigable($product['cp_lnombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_lid']; ?>&borrar_locales=<?php echo LGlobal::Url_Amigable($product['cp_lnombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
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
			$respcont = mysql_query("select * from cp_locales where cp_lid='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cp_lid']) and $url==LGlobal::Url_Amigable($cont['cp_lnombre'])) {
				@include "componentes/com_catalogodeltron/editar_local.tpl";
			} else { echo "<br><center><h3>No existe el local</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE cp_locales SET cp_lnombre='".$_POST['titulo']."', cp_ldireccion='".$_POST['direccion']."', cp_ltelefonos='".$_POST['telef1']."|".$_POST['telef2']."|".$_POST['telef3']."', cp_lactivado='".$_POST['activado']."' WHERE cp_lid='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_locales=".time()."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo correctamente...</h4></center>";

			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from cp_locales where cp_lid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['cp_lid']) and $titulo==LGlobal::Url_Amigable($conte['cp_lnombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cp_lid']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['cp_lnombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cp_lnombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_blog'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM cp_locales WHERE cp_lid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cp_locales AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_locales=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
	function Nuevo() {
		if (empty($_POST['titulo'])) {
			@include "componentes/com_catalogodeltron/crear_local.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO cp_locales (cp_lnombre, cp_ldireccion, cp_ltelefonos, cp_lactivado) VALUES ('".$_POST['titulo']."', '".$_POST['direccion']."', '".$_POST['telef1']."|".$_POST['telef2']."|".$_POST['telef3']."', '".$_POST['activado']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron&catalogocompu=".time()."&inicio_locales=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
}
?>