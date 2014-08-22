<?php
class Sistema {
	function Inicio() { ?>
	<div class="botonesdemando">
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_marcas=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Marca</a>
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_linea=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Linea</a>
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?=time(); ?>&inicio_locales=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Locales</a>
    <a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo time(); ?>&tipos_producto=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Producto</a></div><br />
    <h2>Articulos</h2>
    <table align="center" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Codigo</a></th>
        <th class="table-header-repeat line-left"><a href="">Descripci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Usuario</a></th>
        <th class="table-header-repeat line-left"><a href="">Tipo</a></th>
        <th class="table-header-repeat line-left"><a href="">Marca</a></th>
        <th class="table-header-repeat line-left"><a href="">Linea</a></th>
        <th class="table-header-repeat line-left"><a href="">Imagenes</a></th>
        <th class="table-header-repeat line-left"><a href="">Estado</a></th>
        <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respconte = mysql_query("select * from cp_productos order by cp_pid DESC"); while($product = mysql_fetch_array($respconte)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($product['cp_pcodigo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($product['cp_pdescripcion'], 0, 20)); ?></td>
        <td><?php echo LGlobal::Url_Usuario($product['cp_pusuario'], true, false, "_blank", "../"); ?></td>
        <td><?php echo $product['cp_ptipo']; ?></td>
        <td><?php echo $product['cp_pmarca']; ?></td>
        <td><?php echo $product['cp_plinea']; ?></td>
        <td align="center" valign="middle"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&crear_img_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>"><img src="componentes/com_catalogodeltron/utilidades/camara.gif" border="0" title="Fotos" /></a> <?php echo Imagenes::_CantImages($product['cp_pid']); ?></td>
        <td><?php echo Sistema::Activoc($product['cp_pactivado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&editar_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&borrar_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?php echo $c; ?></td>
        <td><strong><?php echo ucfirst(substr($product['cp_pcodigo'], 0, 20)); ?></strong></td>
        <td><?php echo ucfirst(substr($product['cp_pdescripcion'], 0, 20)); ?></td>
        <td><?php echo LGlobal::Url_Usuario($product['cp_pusuario'], true, false, "_blank", "../"); ?></td>
        <td><?php echo $product['cp_ptipo']; ?></td>
        <td><?php echo $product['cp_pmarca']; ?></td>
        <td><?php echo $product['cp_plinea']; ?></td>
        <td align="center" valign="middle"><a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&crear_img_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>"><img src="componentes/com_catalogodeltron/utilidades/camara.gif" border="0" title="Fotos" /></a> <?php echo Imagenes::_CantImages($product['cp_pid']); ?></td>
        <td><?php echo Sistema::Activoc($product['cp_pactivado']); ?></td>
        <td colspan="2">
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&editar_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_catalogodeltron&catalogocompu=<?=$product['cp_pid']; ?>&borrar_producto=<?=LGlobal::Url_Amigable($product['cp_pcodigo']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
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
	function Grupos() { ?>
    <div class="botonesdemando">
    	<h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Grupos</h3>
    </div><br>
    <div class="titulo">Productos</div>
    <div style="margin:0 auto 0 auto; width:700px; min-height: 165px; position:relative;">
    <?php
	$rptgrupo = mysql_query("select * from cp_grupo where cp_gactivo='1' and cp_gtipo='1' order by cp_gnombre ASC");
	while($grupo = mysql_fetch_array($rptgrupo)) {
		echo "
		<div class=\"bloque\">
		<a href=\"?lagc=com_catalogodeltron&catalogocompu=".$grupo['cp_gid']."&crear_producto=".LGlobal::Url_Amigable($grupo['cp_gnombre'])."\">".$grupo['cp_gnombre']."</a>
		</div>";
	}
	?>
    </div>
    <div class="titulo">Componentes</div>
    <div style="margin:0 auto 0 auto; width:700px; min-height: 165px; position:relative;">
		<?php
		$rptgrupo = mysql_query("select * from cp_grupo where cp_gactivo='1' and cp_gtipo='2' order by cp_gnombre ASC");
		while($grupo = mysql_fetch_array($rptgrupo)) {
			echo "
			<div class=\"bloque\">
			<a href=\"?lagc=com_catalogodeltron&catalogocompu=".$grupo['cp_gid']."&crear_producto=".LGlobal::Url_Amigable($grupo['cp_gnombre'])."\">".$grupo['cp_gnombre']."</a>
			</div>";
		}
		?>
    </div>
    <div class="titulo">Suministros</div>
    <div style="margin:0 auto 0 auto; width:700px; min-height: 80px; position:relative;">
		<?php
		$rptgrupo = mysql_query("select * from cp_grupo where cp_gactivo='1' and cp_gtipo='3' order by cp_gnombre ASC");
		while($grupo = mysql_fetch_array($rptgrupo)) {
			echo "
			<div class=\"bloque\">
			<a href=\"?lagc=com_catalogodeltron&catalogocompu=".$grupo['cp_gid']."&crear_producto=".LGlobal::Url_Amigable($grupo['cp_gnombre'])."\">".$grupo['cp_gnombre']."</a>
			</div>";
		}
		?>
    </div>
    <div class="titulo">Servicios</div>
    <div style="margin:0 auto 0 auto; width:700px; min-height: 80px; position:relative;">
		<?php
		$rptgrupo = mysql_query("select * from cp_grupo where cp_gactivo='1' and cp_gtipo='4' order by cp_gnombre ASC");
		while($grupo = mysql_fetch_array($rptgrupo)) {
			echo "
			<div class=\"bloque\">
			<a href=\"?lagc=com_catalogodeltron&catalogocompu=".$grupo['cp_gid']."&crear_producto=".LGlobal::Url_Amigable($grupo['cp_gnombre'])."\">".$grupo['cp_gnombre']."</a>
			</div>";
		}
		?>
    </div>
    <?php
	}
	function Nuevo($id, $nombre) {
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$rptgrupo = mysql_query("select * from cp_grupo where cp_gid='".$id."'");
		$grupo = mysql_fetch_array($rptgrupo);
		?>
		<div class="botonesdemando">
        <h3><a href="?lagc=com_catalogodeltron&catalogocompu=<?php echo time(); ?>&tipos_producto=<?php echo time(); ?>">&laquo; Atras</a> | Creando nuevo Producto del GRUPO: <u><?=$grupo['cp_gnombre']; ?></u></h3>
        </div><br>
        <?php
		if (!empty($grupo['cp_gid']) and $nombre==LGlobal::Url_Amigable($grupo['cp_gnombre'])) {
			if (empty($_POST['codigo'])) {
				LGlobal::Editor();
				@include"componentes/com_catalogodeltron/nuevo_producto.tpl";
			}
			else {
				$sql = "INSERT INTO cp_productos (cp_pusuario, cp_ptipo, cp_pmarca, cp_plinea, cp_pcodigo, cp_pdescripcion, cp_ptipopro, cp_ptipoope, cp_plocales, cp_pcomentario, cp_pcaracteristicas, cp_pfecha, cp_pactivado) VALUES ('".$_COOKIE["user"]."', '".$_GET['catalogocompu']."', '".$_POST['marcas']."', '".$_POST['linea']."', '".$_POST['codigo']."', '".$_POST['descripcion']."', '".$_POST['tipoproducto']."', '".$_POST['tipooperatividad']."', '".Sistema::__LocalesEnviar()."', '".$_POST['comentario']."', '".$_POST['caracteristicas']."', '".time()."', '".$_POST['activado']."')";
				mysql_query($sql,$con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron'\", 1500) </script>
				<center><h3><b><em>".$_POST['codigo']."</em></b>.</h3><h4>Se Creo Correctamente</h4></center>";
			}
		}
		else { echo "<em>No Existe el Grupo</em>"; }
		?>
        <br>
        <?php
	}
	function _Lugares($idl, $nombreform) { ?>
	<script>
    function nueva_ventana(url, ancho, alto, barra) {
       izquierda = (screen.width) ? (screen.width-ancho)/2 : 100
       arriba = (screen.height) ? (screen.height-alto)/2 : 100
       opciones = 'toolbar=0, location=0, directories=0, status=0, menubar=0, resizable=0, scrollbars=' + barra + ', width=' + ancho + ', height=' + alto + ', left=' + izquierda + ',  top=' + arriba;
	   window.open(url, 'Cliente', opciones)
	}
	</script>
    <?php
		$idstock=explode("|",$idl);
		$rptlugar = mysql_query("select * from cp_locales order by cp_lnombre ASC");
		$rptlugar1 = mysql_query("select * from cp_locales order by cp_lnombre ASC");
		echo "\n<table border=0>";
		
		for($n=0;$n<count($idstock);$n++) {
			$lugares = mysql_fetch_array($rptlugar);
			$finalarray = explode('>', $idstock[$n]);
			if ($lugares['cp_lid']==$finalarray['0']) {
				if (!empty($finalarray['0'])) {
					if (!empty($finalarray['1'])) {
						echo "\n<tr><td valign=\"middle\" align=\"left\"><label><input name=\"lugar".$lugares['cp_lid']."\" type=\"checkbox\" value=\"".$lugares['cp_lid']."\" onclick=\"document.".$nombreform.".cantidad".$lugares['cp_lid'].".disabled=!document.".$nombreform.".cantidad".$lugares['cp_lid'].".disabled; document.".$nombreform.".cantidad".$lugares['cp_lid'].".focus();\" checked=\"checked\" /> ".substr($lugares['cp_lnombre'], 0, 11)."</label></td><td><input name=\"cantidad".$lugares['cp_lid']."\" type=\"text\"  maxlength=\"6\" class=\"inp-form1\" value=\"".$finalarray['1']."\" /> <a href=\"javascript:nueva_ventana('componentes/com_catalogodeltron/locales.php?lugar=".$lugares['cp_lid']."', 350, 130, 0);\">Mas...</a><br><br></td></tr>";
					}
					else {
						echo "\n<tr><td valign=\"middle\" align=\"left\"><label><input name=\"lugar".$lugares['cp_lid']."\" type=\"checkbox\" value=\"".$lugares['cp_lid']."\" onclick=\"document.".$nombreform.".cantidad".$lugares['cp_lid'].".disabled=!document.".$nombreform.".cantidad".$lugares['cp_lid'].".disabled; document.".$nombreform.".cantidad".$lugares['cp_lid'].".focus();\" /> ".substr($lugares['cp_lnombre'], 0, 11)."</label></td><td><input name=\"cantidad".$lugares['cp_lid']."\" disabled type=\"text\"  maxlength=\"6\" class=\"inp-form1\" value=\"\" /> <a href=\"javascript:nueva_ventana('componentes/com_catalogodeltron/locales.php?lugar=".$lugares['cp_lid']."', 350, 130, 0);\">Mas...</a><br><br></td></tr>";
					}
				}
			}
			else {
				while($lugares1 = mysql_fetch_array($rptlugar1)) {
					echo "\n<tr><td valign=\"middle\" align=\"left\"><label><input name=\"lugar".$lugares1['cp_lid']."\" type=\"checkbox\" value=\"".$lugares1['cp_lid']."\" onclick=\"document.".$nombreform.".cantidad".$lugares1['cp_lid'].".disabled=!document.".$nombreform.".cantidad".$lugares1['cp_lid'].".disabled; document.".$nombreform.".cantidad".$lugares1['cp_lid'].".focus();\" /> ".substr($lugares1['cp_lnombre'], 0, 11)."</label></td><td><input name=\"cantidad".$lugares1['cp_lid']."\" disabled type=\"text\"  maxlength=\"6\" class=\"inp-form1\" value=\"\" /> <a href=\"javascript:nueva_ventana('componentes/com_catalogodeltron/locales.php?lugar=".$lugares1['cp_lid']."', 350, 130, 0);\">Mas...</a><br><br></td></tr>";
				}
			}
		}
		echo "\n</table>";
	}
	function __LocalesEnviar() {
		$rptlugar = mysql_query("select * from cp_locales order by cp_lnombre ASC");
		while($lugares = mysql_fetch_array($rptlugar)) {
			$final .= $lugares['cp_lid'].">".$_POST['cantidad'.$lugares['cp_lid'].'']."|";
		}
		return $final;
	}
	function _Caracteristicas($archivoform) {
		@include "componentes/com_catalogodeltron/caracteristicas/".$archivoform;
	}
	function _Marcas($valor1) {
		$rptmarca = mysql_query("select * from cp_marcas where cp_mid='".$valor1."' order by cp_mid ASC");
		$marcas = mysql_fetch_array($rptmarca);
		if ($marcas['cp_mid']==$valor1) { $final = $marcas['cp_mnombre']; } else { $final = "No existe"; }
		return $final;
	}
	function _Lineas($valor2) {
		$rptmarca = mysql_query("select * from cp_linea where cp_tid='".$valor2."' order by cp_tnombre ASC");
		$lineas = mysql_fetch_array($rptmarca);
		if ($lineas['cp_tid']==$valor2) { $final = $lineas['cp_tnombre']; } else { $final = "No existe"; }
		return $final;
	}
	function _TipoProducto($valor1) {
		$tipoproductos = array("1"=>"Producto Final", "2"=>"Otros", "3"=>"Otros", "4"=>"Otros", "5"=>"Otros");
		ksort($tipoproductos);
		foreach ($tipoproductos as $key => $val) {
			if ($valor1==$key) {
				echo "<option value=\"".$key."\" selected>".$val."</option>\n";
			}
			else {
				echo "<option value=\"".$key."\">".$val."</option>\n";
			}
		}
	}
	function _TipoProductividad($valor1) {
		$tipoproductividad = array("1"=>"Nuevo", "2"=>"Saldo Operativo", "3"=>"Usado Operativo", "4"=>"Usado Operativo", "5"=>"Saldo Inoperativo", "6"=>"Usado Inoperativo");
		ksort($tipoproductividad);
		foreach ($tipoproductividad as $key => $val) {
			if ($valor1==$key) {
				echo "<option value=\"".$key."\" selected>".$val."</option>\n";
			}
			else {
				echo "<option value=\"".$key."\">".$val."</option>\n";
			}
		}
	}
	function EditarP($id, $url) {
		if (empty($_POST['codigo'])) {
			$respcont = mysql_query("select * from cp_productos where cp_pid='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['cp_pid']) and $url==LGlobal::Url_Amigable($cont['cp_pcodigo'])) { ?>
            	<div class="botonesdemando">
                <h3><a href="?lagc=com_catalogodeltron">&laquo; Atras</a> | Editando Producto: <?=$cont['cp_pcodigo']; ?></h3>
                </div><br>
                <?php
				LGlobal::Editor();
				include "componentes/com_catalogodeltron/editar_producto.tpl";
			} else { echo "<br><center><h3>No existe el Articulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (!empty($_POST['marcas'])) { $marcas = $_POST['marcas']; } else { $marcas = $_POST['marcas1']; }
			if (!empty($_POST['linea'])) { $linea = $_POST['linea']; } else { $linea = $_POST['linea1']; }
			$sql = "UPDATE cp_productos SET cp_pusuario='".$_COOKIE["user"]."', cp_ptipo='".$_POST['grupo']."', cp_pmarca='".$marcas."', cp_plinea='".$linea."', cp_pcodigo='".$_POST['codigo']."', cp_pdescripcion='".$_POST['descripcion']."', cp_ptipopro='".$_POST['tipoproducto']."', cp_ptipoope='".$_POST['tipooperatividad']."', cp_plocales='".Sistema::__LocalesEnviar()."', cp_pcomentario='".$_POST['comentario']."', cp_pcaracteristicas='".$_POST['caracteristicas']."', cp_pmodificado='".time()."', cp_pactivado='".$_POST['activado']."' WHERE cp_pid='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron'\", 1500) </script>
			<center><h3><b><em>".$_POST['codigo']."</em></b>.</h3><h4>Grabado Correctamente</h4></center>";
		}
	}
	function BorrarP($id, $nombre) {
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$contenidos = mysql_query("select * from cp_productos where cp_pid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		$imgpro = mysql_query("select * from cp_imagenes where cp_imgproduc='".$id."'");
		$cantidadimg = mysql_num_rows($imgpro);
		if (!empty($conte['cp_pid']) and $nombre==LGlobal::Url_Amigable($conte['cp_pcodigo'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['cp_pid']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['cp_pcodigo']; ?></strong>?</h3>
            <?php if ($cantidadimg!=0) { ?>
            <table align="center" cellpadding="7" cellspacing="7">
            <tr>
            <td colspan="2">El Articulo tambien tiene imagenes. ¿Desea Borrar todo?</td>
            </tr>
            <?php while($imgp = mysql_fetch_array($imgpro)){ ?>
            <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
            <td align="center" valign="middle"><input name="checkbox[]" type="checkbox" checked="checked" id="checkbox[]" value="<?=$imgp['cp_imgid']; ?>" /></td>
            <td align="center" valign="middle"><?=$imgp['cp_imgtitulo']; ?></td>
            <td align="center" valign="middle"><img src="../componentes/com_catalogodeltron/imagenes/thumb/<?=$imgp['cp_imgimg']; ?>" border="0" /></td>
            </tr>
            <?php } ?>
            </table>
            <?php } ?>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_catalogodeltron'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				if ($cantidadimg!=0) {
					while($imgp = mysql_fetch_array($imgpro)){
						$archivo.$imgp['cp_imgid'] = "../componentes/com_catalogodeltron/imagenes/".$imgp['cp_imgimg'];
						unlink($archivo.$imgp['cp_imgid']);
						$archivo.$imgp['cp_imgfecha'] = "../componentes/com_catalogodeltron/imagenes/thumb/".$imgp['cp_imgimg'];
						unlink($archivo.$imgp['cp_imgfecha']);
					}
					//
					for($i=0;$i<$cantidadimg;$i++){
						$del_id = $_POST['checkbox'][$i];
						$sql = "DELETE FROM cp_imagenes WHERE cp_imgid='".$del_id."'";
						$result = mysql_query($sql);
					}
					//
				}
				$sql = "DELETE FROM cp_productos WHERE cp_pid='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE cp_productos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				if ($cantidadimg!=0) {
					echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron'\", 6000) </script>
					<center><h3><b><em>".$nombre."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
				}
				else {
					echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_catalogodeltron'\", 1500) </script>
					<center><h3><b><em>".$nombre."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
				}
				$sqli = "ALTER TABLE cp_imagenes AUTO_INCREMENT=1";
				$Query = mysql_query ($sqli, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
			}
		} else { echo "<br><center><h3>No existe el Producto</h3></center>"; }
	}
}
?>