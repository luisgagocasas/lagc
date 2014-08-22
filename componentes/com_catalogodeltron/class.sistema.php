<?php
class SistemaCatalogo {
	function Inicio() {
		$rptgrupo = mysql_query("select * from cp_grupo order by cp_gnombre ASC");
		?><br /><br />
        <div style="float:right;"><br />
        <form action="/" method="get">
        <center>
        <div class="radio-frm">
        <input name="lagc" type="hidden" value="com_catalogodeltron" />
        <input name="id" type="hidden" value="buscar" />
        <label><input type="radio" name="tb" value="1" checked="checked" />Codigo</label>
        <label><input type="radio" name="tb" value="2" />Mini Codigo</label>
        </div>
        </center>
        <input name="palabra" class="campo-texto">
        <input type="submit" value="Buscar" class="btn-buscar">
        </form><br />
        </div>
        <h2>Catalogo de Productos</h2>
		<table width="100%" border="0" class="vistag">
			<tr>
			<td class="titulos" width="200"><h2>Grupo</h2></td>
			<td class="titulos" width="127"><h2>Marcas</h2></td>
			<td class="titulos" width="171"><h2>Lineas</h2></td>
			<td class="titulos" width="111"><h2>Item</h2></td>
			<td class="titulos" width="224"><h2>Descripci&oacute;n</h2></td>
			<td class="titulos" width="104"><h2>Fecha</h2></td>
			</tr>
        <?php
		while($grupo = mysql_fetch_array($rptgrupo)) {
			echo "
			<tr>
			<td class=vista1 valign=\"middle\"><h2>".SistemaCatalogo::NombreGrupo($grupo['cp_gid'])."</h2></td>";
			echo "<td class=vista2 valign=\"middle\" colspan=\"5\">";
			echo SistemaCatalogo::__Marcas($grupo['cp_gid']);
			echo "</td>
			</tr>
			";
		}
		?>
        </table>
        <br /><br />
        <?php
	}
	function __Marcas($grupo) {
		$rspmarca = mysql_query("select * from cp_marcas where cp_mactivo='1' order by cp_mnombre ASC");
		while($marca = mysql_fetch_array($rspmarca)) { ?>
        <table width="100%" border="0" class="tabla2">
        <tr>
            <td align="center" width="125" valign="middle" nowrap="nowrap">
            <?=SistemaCatalogo::NombreMarca($marca['cp_mid'], "imagen"); ?>
            </td>
        <td align="center" valign="top" nowrap="nowrap">
            <table width="100%" class="tabla2">
              <?=SistemaCatalogo::__Linea($marca['cp_mid'], $grupo); ?>
            </table>
        </td>
        </tr>
        </table>
        <?php
		}
	}
	function __Linea($marca, $grupo){
		$rsplinea = mysql_query("select * from cp_linea where cp_tmarca='".$marca."' order by cp_tnombre ASC");
		while($linea = mysql_fetch_array($rsplinea)) {
			echo "
			<tr class=table3>
				<td align=\"center\" width=\"200\" valign=\"middle\"><div class=linea_tipo>".SistemaCatalogo::NombreLinea($linea['cp_tid'])."</div></td>";
				SistemaCatalogo::__productos($grupo, $marca, $linea['cp_tid']);
			echo "
			</tr>";
		}
	}
	function __productos($grupo, $marca, $linea) {
		$rspproductos = mysql_query("select * from cp_productos where cp_ptipo='".$grupo."' and cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		$rspproductos2 = mysql_query("select * from cp_productos where cp_ptipo='".$grupo."' and cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		$rspproductos3 = mysql_query("select * from cp_productos where cp_ptipo='".$grupo."' and cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		?>
        <td>
        <table border="0">
        <?php
		while($productos = mysql_fetch_array($rspproductos)) { ?>
        <tr>
        <td align="left" valign="middle">
        	<table width="110" border="0">
              <tr>
                <th colspan="2" align="center" valign="middle"><a href="<?=LGlobal::Tipo_URL('com_catalogodeltron', $productos['cp_pid'], $productos['cp_pcodigo']); ?>"><?=$productos['cp_pcodigo']; ?></a></th>
              </tr>
              <tr>
                <th align="center" valign="middle"><a href="<?=LGlobal::Tipo_URL('com_catalogodeltron', $productos['cp_pid'], $productos['cp_pcodigo']); ?>#imagenes"><img src="componentes/com_catalogodeltron/utilidades/camara.gif" border="0" /></a></th>
                <td align="center" valign="middle"><?=$productos['cp_pid']; ?></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
        <td>
        <table border="0">
        <?php while($producdescri = mysql_fetch_array($rspproductos2)) { ?>
        <tr>
        <td>
        	<table width="220" border="0">
              <tr>
                <td height="59"><div class="descripciongrilla"><?=ucfirst($producdescri['cp_pdescripcion']); ?></div></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
        <td>
        <table border="0">
        <?php
		while($producfecha = mysql_fetch_array($rspproductos3)) { ?>
        <tr>
        <td>
        	<table width="100" border="0">
              <tr>
                <td height="59" valign="middle" align="center"><?=LGlobal::tiempohace($producfecha['cp_pfecha']); ?></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
		<?php
	}
	function ___productos($marca, $linea) {
		$rspproductos = mysql_query("select * from cp_productos where cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		$rspproductos2 = mysql_query("select * from cp_productos where cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		$rspproductos3 = mysql_query("select * from cp_productos where cp_pmarca='".$marca."' and cp_plinea='".$linea."' order by cp_pid DESC");
		?>
        <td>
        <table border="0">
        <?php
		while($productos = mysql_fetch_array($rspproductos)) { ?>
        <tr>
        <td align="left" valign="middle">
        	<table width="110" border="0">
              <tr>
                <th colspan="2" align="center" valign="middle"><a href="<?=LGlobal::Tipo_URL('com_catalogodeltron', $productos['cp_pid'], $productos['cp_pcodigo']); ?>"><?=$productos['cp_pcodigo']; ?></a></th>
              </tr>
              <tr>
                <th align="center" valign="middle"><a href="<?=LGlobal::Tipo_URL('com_catalogodeltron', $productos['cp_pid'], $productos['cp_pcodigo']); ?>#imagenes"><img src="componentes/com_catalogodeltron/utilidades/camara.gif" border="0" /></a></th>
                <td align="center" valign="middle"><?=$productos['cp_pid']; ?></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
        <td>
        <table border="0">
        <?php while($producdescri = mysql_fetch_array($rspproductos2)) { ?>
        <tr>
        <td>
        	<table width="220" border="0">
              <tr>
                <td height="59"><div class="descripciongrilla"><?=ucfirst($producdescri['cp_pdescripcion']); ?></div></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
        <td>
        <table border="0">
        <?php
		while($producfecha = mysql_fetch_array($rspproductos3)) { ?>
        <tr>
        <td>
        	<table width="100" border="0">
              <tr>
                <td height="59" valign="middle" align="center"><?=LGlobal::tiempohace($producfecha['cp_pfecha']); ?></td>
              </tr>
            </table>
        </td>
        </tr>
        <?php } ?>
        </table>
        </td>
		<?php
	}
	function Ver($id, $titulo) {
		echo "<br /><br />";
		$rptpro = mysql_query("select * from cp_productos where cp_pid='".$id."'");
		$producto = mysql_fetch_array($rptpro);
		if (!empty($producto['cp_pid']) and $titulo==LGlobal::Url_Amigable($producto['cp_pcodigo'])) {
			$config = new LagcConfig();
			@include "componentes/com_catalogodeltron/formato_vista1.tpl";
		}
		else { echo "<em>El Producto no Existe</em>"; }
		echo "<br /><br />";
	}
	function ImgPrincipal($id) {
		$rptimgp = mysql_query("select * from cp_imagenes where cp_imgproduc='".$id."' ORDER BY rand() LIMIT 1");
		$imgpri = mysql_fetch_array($rptimgp);
		$cantidad = mysql_num_rows($rptimgp);
		if ($cantidad==0) { $final = "<img src=\"componentes/com_catalogodeltron/utilidades/sin_imagen.png\" id=\"imgp\">"; }
		else { $final = "<img src=\"componentes/com_catalogodeltron/imagenes/".$imgpri['cp_imgimg']."\" width=\"240\" id=\"imgp\" border=\"0\"><br>\n<div id=\"textolg\" class=\"img-descripcion\">".$imgpri['cp_imgdescripcion']."</div>"; }
		return $final;
	}
	function ImgLista($id) {
		$rptimgp = mysql_query("select * from cp_imagenes where cp_imgproduc='".$id."' ORDER BY cp_imgid DESC"); ?>
		<?php $cantidad = mysql_num_rows($rptimgp); ?>
        <script type="text/javascript">
		function CambiarImg($ruta) {
			document.getElementById('imgp').src = $ruta;
		}
		function Cambiartext($texto) {
			var info = document.getElementById('textolg');
			info.innerHTML = $texto;
		}
		</script>
        <div class="listaimagenes">
        <?php if ($cantidad==0) { echo "Sin Imagenes"; } else { ?>
        <?php SistemaCatalogo::PrecargarImg($id); ?>
			<?php while($imgpri = mysql_fetch_array($rptimgp)) { ?>
            <a href="#" onclick="CambiarImg('componentes/com_catalogodeltron/imagenes/<?=$imgpri['cp_imgimg']; ?>'); Cambiartext('<?=$imgpri['cp_imgdescripcion']; ?>'); return false;"><img src="componentes/com_catalogodeltron/imagenes/thumb/<?=$imgpri['cp_imgimg']; ?>" width="70" border="0"></a>
            <?php } } ?>
        </div>
        <?php
	}
	function NombreGrupo($id) {
		$rptgrupo = mysql_query("select cp_gnombre,cp_gid from cp_grupo where cp_gid='".$id."'");
		$ngrupo = mysql_fetch_array($rptgrupo);
		return "<a href=\"?lagc=com_catalogodeltron&id=".$ngrupo['cp_gid']."&grupos=".LGlobal::Url_Amigable($ngrupo['cp_gnombre'])."\">".ucfirst($ngrupo['cp_gnombre'])."</a>";
	}
	function NombreMarca($id, $tipo) {
		$rptmarca = mysql_query("select * from cp_marcas where cp_mid='".$id."'");
		$nmarca = mysql_fetch_array($rptmarca);
		if ($tipo=="nombre") {
			$final = ucfirst($nmarca['cp_mnombre']);
		}
		else if ($tipo=="imagen") {
			$final = "<img src=\"componentes/com_catalogodeltron/imagenes/logomarcas/".$nmarca['cp_mimagen']."\" height=\"30\" width=\"90\" border=\"0\">";
		}
		return "<a href=\"?lagc=com_catalogodeltron&id=".$nmarca['cp_mid']."&marcas=".LGlobal::Url_Amigable($nmarca['cp_mnombre'])."\">".$final."</a>";
	}
	function NombreLinea($id) {
		$rptlinea = mysql_query("select cp_tnombre,cp_tid from cp_linea where cp_tid='".$id."'");
		$nlinea = mysql_fetch_array($rptlinea);
		return "<a href=\"?lagc=com_catalogodeltron&id=".$nlinea['cp_tid']."&lineas=".LGlobal::Url_Amigable($nlinea['cp_tnombre'])."\">".ucfirst($nlinea['cp_tnombre'])."</a>";
	}
	function tipoproducto($valor) {
		$tipos = array(1=>"Producto Final", 2=>"Otro", 3=>"Otro", 4=>"Otro", 5=>"Otro", 6=>"Otro");
		ksort($tipos);
		foreach ($tipos as $key => $val) {
			if ($valor==$key) {
				$final = $val;
			}
		}
		return $final;
	}
	function tipooperatividad($valor) {
		$tipos = array(1=>"Nuevo", 2=>"Saldo Operativo", 3=>"Usado Operativo", 4=>"Usado Operativo", 5=>"Saldo Inoperativo", 6=>"Usado Inoperativo");
		ksort($tipos);
		foreach ($tipos as $key => $val) {
			if ($valor==$key) {
				$final = $val;
			}
		}
		return $final;
	}
	function ShowAlmacenes($val1) { ?>
    <script>  
    function nueva_ventana(url, ancho, alto, barra) {
       izquierda = (screen.width) ? (screen.width-ancho)/2 : 100
       arriba = (screen.height) ? (screen.height-alto)/2 : 100
       opciones = 'toolbar=0, location=0, directories=0, status=0, menubar=0, resizable=0, scrollbars=' + barra + ', width=' + ancho + ', height=' + alto + ', left=' + izquierda + ',  top=' + arriba;
	   window.open(url, 'Cliente', opciones)
	}
	</script>
    <?php
		$idstock=explode("|",$val1);
		$rptlocales = mysql_query("select * from cp_locales ORDER BY cp_lnombre DESC");
		echo "<table width=\"250\" border=0><tr class=\"stocktable\"><td width=\"100\">Departamento</td><td width=\"100\">Cantidad</td><td width=\"50\"></td></tr>\n";
		while ($locales = mysql_fetch_array($rptlocales)){
			for($n=0;$n<count($idstock);$n++) {
				$finalarray = explode('>', $idstock[$n]);
				if ($locales['cp_lid']==$finalarray['0'] & !empty($finalarray['1'])) {
					echo "<tr class=\"alamcenes-stockx\"><td valign=\"middle\">".$locales['cp_lnombre'].":</td><td valign=\"middle\">".$finalarray[1]."</td><td valign=\"middle\"><a href=\"javascript:nueva_ventana('componentes/com_catalogodeltron/locales.php?lugar=".$locales['cp_lid']."', 350, 130, 0);\" style=\"float:right;\">Ver Completo</a></td></tr>\n";
				}
			}
		}
		echo "</table>\n";
	}
	function PrecargarImg($id){ ?>
		<script type="text/javascript">
		var mis_imagenes = new Array();
		function precarga(){
			for (x=0; x<precarga.arguments.length; x++){
			mis_imagenes[x] = new Image();
			mis_imagenes[x].src = precarga.arguments[x];
			}
		}
		<?php
		$contar = 1;
		$rptimgp = mysql_query("select * from cp_imagenes where cp_imgproduc='".$id."' ORDER BY cp_imgid DESC"); ?> <?php $cantidad = mysql_num_rows($rptimgp); ?>
		precarga(<?php echo "\"";
				 while($imgpri = mysql_fetch_array($rptimgp)) {
				 	echo "componentes/com_catalogodeltron/imagenes/".$imgpri['cp_imgimg'];
					if ($contar<$cantidad) { echo "\",\""; }
					$contar++;
				}
				echo "\""; ?>);
		</script>
        <?php
	}
	//Grupos
	function TodosGrupos(){
		echo "<br /><br />";
		echo "<h2>Todas los Grupos</h2>";
		echo "<div class=\"lineaubicacion\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_catalogodeltron')."\">Inicio</a></div><br><br>";
		echo "<center>";
		echo "<table width=\"40%\" border=\"0\" align=\"center\" class=\"vistax\">";
		$rptpro = mysql_query("select * from cp_grupo where cp_gactivo='1'");
		while($grupos = mysql_fetch_array($rptpro)){
			echo "<tr><td class=\"vista1\" valign=\"middle\"><h2>\n";
			echo SistemaCatalogo::NombreGrupo($grupos['cp_gid']);
			echo "</h2></td></tr>\n";
		}
		echo "</table>";
		echo "</center>";
		echo "<br /><br />";
	}
	function Grupos($id, $titulo){
		echo "<br /><br />";
		$rptpro = mysql_query("select * from cp_grupo where cp_gid='".$id."' and cp_gactivo='1'");
		$grupo = mysql_fetch_array($rptpro);
		if (!empty($grupo['cp_gid']) and $titulo==LGlobal::Url_Amigable($grupo['cp_gnombre'])) {
			echo "<h2>".$grupo['cp_gnombre']."</h2>";
			@include "componentes/com_catalogodeltron/grupos.tpl";
		}
		else { echo "<em>El Grupo no Existe</em>"; }
		echo "<br /><br />";
	}
	//fin grupo
	//Marcas
	function TodosMarcas(){
		echo "<br /><br />";
		echo "<h2>Todas las Marcas</h2>";
		echo "<div class=\"lineaubicacion\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_catalogodeltron')."\">Inicio</a></div><br><br>";
		echo "<center>";
		echo "<table width=\"645\" border=\"0\" class=\"vistax\">
		<tr>
		<td class=\"vista2\" valign=\"middle\" colspan=\"4\">
		<table width=\"100%\" class=\"tabla2\">";
		$rptpro = mysql_query("select * from cp_marcas where cp_mactivo='1'");
		while ($nmarca = mysql_fetch_array($rptpro)){
			echo "<tr class=table3>
				<td width=\"200\" align=\"right\">
				<a href=\"?lagc=com_catalogodeltron&id=".$nmarca['cp_mid']."&marcas=".LGlobal::Url_Amigable($nmarca['cp_mnombre'])."\"><img src=\"componentes/com_catalogodeltron/imagenes/logomarcas/".$nmarca['cp_mimagen']."\" height=\"30\" width=\"90\" border=\"0\"></a></td>
				<td align=\"left\">".$nmarca['cp_mnombre']."</td>";
			echo "
			</tr>";
		}
		echo "</table>
		</td>
		</tr>
		</table>";
		echo "</center>";
		echo "<br /><br />";
	}
	function Marcas($id, $titulo){
		echo "<br /><br />";
		$rptpro = mysql_query("select * from cp_marcas where cp_mid='".$id."' and cp_mactivo='1'");
		$marcas = mysql_fetch_array($rptpro);
		if (!empty($marcas['cp_mid']) and $titulo==LGlobal::Url_Amigable($marcas['cp_mnombre'])) {
			echo "<table border=\"0\" width=\"200\" class=\"tabla2\"><tr><td>";
			echo "<img src=\"componentes/com_catalogodeltron/imagenes/logomarcas/".$marcas['cp_mimagen']."\" height=\"30\" width=\"90\" border=\"0\">";
			echo "</td><td>";
			echo " <h2>".$marcas['cp_mnombre']."</h2>";
			echo "</td></tr></table>";
			
			?>
			<div class="lineaubicacion">&raquo; <a href="<?=LGlobal::Tipo_URL('com_catalogodeltron'); ?>">Inicio</a> > <a href="?lagc=com_catalogodeltron&id=marcas"><?=$marcas['cp_mnombre']; ?></a></div><br><br>
<center>
<table width="645" border="0" class="vistax">
<tr>
<td class="vista2" valign="middle" colspan="4">
    <table width="100%" class="tabla2">
    <?php
	$rptpro = mysql_query("select * from cp_linea where cp_tmarca='".$marcas['cp_mid']."' and cp_tactivo='1'");
	while($nmarca = mysql_fetch_array($rptpro)){
		echo "<tr class=table3>
				<td width=\"200\" align=\"center\">
				<a href=\"?lagc=com_catalogodeltron&id=".$nmarca['cp_tid']."&lineas=".LGlobal::Url_Amigable($nmarca['cp_tnombre'])."\">".$nmarca['cp_tnombre']."</a></td>";
			echo "
			</tr>";
	}
	?>
    </table>
</td>
</tr>
</table>
</center>
			
			<?php
		}
		else { echo "<em>La Marca no Existe</em>"; }
		echo "<br /><br />";
	}
	//fin marcas
	//Lineas
	function TodosLineas(){
		echo "<br /><br />";
		echo "<h2>Todas las Lineas</h2>";
		echo "<div class=\"lineaubicacion\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_catalogodeltron')."\">Inicio</a></div><br><br>";
		echo "<center>";
		echo "<table width=\"40%\" border=\"0\" align=\"center\" class=\"vistax\">";
		$rptpro = mysql_query("select * from cp_linea where cp_tactivo='1'");
		while($grupos = mysql_fetch_array($rptpro)){
			echo "<tr><td class=\"vista1\" valign=\"middle\"><h2>\n";
			echo SistemaCatalogo::NombreLinea($grupos['cp_tid']);
			echo "</h2></td></tr>\n";
		}
		echo "</table>";
		echo "</center>";
		echo "<br /><br />";
	}
	function Lineas($id, $titulo){
		echo "<br /><br />";
		$rptpro = mysql_query("select * from cp_linea where cp_tid='".$id."' and cp_tactivo='1'");
		$lineas = mysql_fetch_array($rptpro);
		$rptmarca = mysql_query("select * from cp_marcas where cp_mid='".$lineas['cp_tmarca']."'");
		$marca = mysql_fetch_array($rptmarca);
		if (!empty($lineas['cp_tid']) and $titulo==LGlobal::Url_Amigable($lineas['cp_tnombre'])) {
			echo "<h2>Linea: ".$lineas['cp_tnombre']."</h2>";
			?>
			<div class="lineaubicacion"> <a href="<?=LGlobal::Tipo_URL('com_catalogodeltron'); ?>">Inicio</a> > <?=SistemaCatalogo::NombreMarca($lineas['cp_tmarca'], "nombre"); ?> > <a href="?lagc=com_catalogodeltron&id=lineas"><?=$lineas['cp_tnombre']; ?></a></div><br><br>
            <center>
            <table width="440" border="0" class="vistax">
            <tr>
            <td class="titulosx" width="111"><h2>Item</h2></td>
            <td class="titulosx" width="224"><h2>Descripci&oacute;n</h2></td>
            <td class="titulosx" width="104"><h2>Fecha</h2></td>
            </tr>
            <tr class="vista2">
            <?=SistemaCatalogo::___productos($marca['cp_mid'], $lineas['cp_tid']); ?>
            </tr>
            </table>
            <?php
		}
		else { echo "<em>La Linea no Existe</em>"; }
		echo "<br /><br />";
	}
	//buscador
	function Buscador(){ ?>
		<br /><br />
        <div class="lineaubicacion">&raquo; <a href="<?=LGlobal::Tipo_URL('com_catalogodeltron'); ?>">Inicio</a></div><br><br>
        <div style="float:right;">
        <form action="/" method="get">
        <center>
        <div class="radio-frm">
        <input name="lagc" type="hidden" value="com_catalogodeltron" />
        <input name="id" type="hidden" value="buscar" />
        <label><input type="radio" name="tb" value="1"<?=SistemaCatalogo::__Selectb(1); ?> />Codigo</label>
        <label><input type="radio" name="tb" value="2"<?=SistemaCatalogo::__Selectb(2); ?> />Mini Codigo</label>
        </div>
        </center>
        <input name="palabra" value="<?=$_GET['palabra']; ?>" class="campo-texto">
        <input type="submit" value="Buscar" class="btn-buscar">
        </form><br />
        </div>
        <h2>Buscando Productos</h2><br /><br />
        <?php
		if ($_GET['palabra']) {
			// Tomamos el valor ingresado
			$buscar = $_GET['palabra'];
			// Conexión a la base de datos y seleccion de registros
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if ($_GET['tb']=="1") { $campo = "cp_pcodigo"; } else if ($_GET['tb']=="2") { $campo = "cp_pid"; } else { $campo = "cp_pcodigo"; }
			$sql = "SELECT * FROM cp_productos WHERE $campo like '%$buscar%' ORDER BY cp_pid DESC";
			$result = mysql_query($sql, $con);
			// Tomamos el total de los resultados
			$total = mysql_num_rows($result);
			// Imprimimos los resultados
			if ($row = mysql_fetch_array($result)){
				echo "Resultados para: <b>$buscar</b>";
				do {
					$c=$c+1; if($c%2==0) {
						echo "<div class=\"resultados-cont2\">";
							echo "<a href=\"".LGlobal::Tipo_URL('com_catalogodeltron', $row['cp_pid'], $row['cp_pcodigo'])."\">".$row['cp_pcodigo']."</a><br>";
							echo SistemaCatalogo::ImgBusqueda($row['cp_pid']);
							echo "</div>";
						} else {
							echo "<div class=\"resultados-cont1\">";
							echo "<a href=\"".LGlobal::Tipo_URL('com_catalogodeltron', $row['cp_pid'], $row['cp_pcodigo'])."\">".$row['cp_pcodigo']."</a><br>";
							echo SistemaCatalogo::ImgBusqueda($row['cp_pid']);
							echo "</div>";
						}
					}
					while ($row = mysql_fetch_array($result));
						echo "<p>Resultados: $total</p>";
			} else {
				// En caso de no encontrar resultados
				echo "No se encontraron resultados para: <b>$buscar</b>";
			}
		}
		else { echo "<div style=\"float:right;\">Ingrese el codigo para buscar &raquo;&raquo;&raquo; </div>"; }
		echo "<br /><br />";
	}
	function __Selectb($valor) {
		if ($valor==$_GET['tb']) { $regresa = " checked=\"checked\""; }
		return $regresa;
	}
	function ImgBusqueda($id) {
		$rptimgp = mysql_query("select * from cp_imagenes where cp_imgproduc='".$id."' ORDER BY rand() DESC limit 8"); ?>
		<?php $cantidad = mysql_num_rows($rptimgp); ?>
        <?php if ($cantidad==0) { echo "Sin Imagenes"; } else { ?>
        	<div class="listaimgbusqueda">
			<?php while($imgpri = mysql_fetch_array($rptimgp)) { ?>            
            <a onclick="CambiarImg('componentes/com_catalogodeltron/imagenes/<?=$imgpri['cp_imgimg']; ?>'); Cambiartext('<?=$imgpri['cp_imgdescripcion']; ?>'); return false;"><img src="componentes/com_catalogodeltron/imagenes/thumb/<?=$imgpri['cp_imgimg']; ?>" width="70" border="0"></a>
            <?php } ?>
            </div>
		<?php }
	}
}
?>