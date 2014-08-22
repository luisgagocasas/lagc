<?php
/*
Creado por Luis Gago © http://lagc-peru.com/
E-mail: webmaster@portuhermana.com
Soporte: luisgago@lagc-peru.com
*/
class Modulos {
	function Inicio() { ?>
<div> <a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&posiciones=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" border="0" /> Posiciones</a>
<a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&tipos=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" border="0" /> Tipos</a>
<a href="?lagc=com_modulos&modulos=<?php echo time(); ?>&modulo_primerpaso=<?php echo time(); ?>"><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" border="0" /> Nuevo Modulo</a> </div>
<br />
<table align="left" cellspacing="5" id="product-table">
  <tr>
    <th class="table-header-check">&nbsp;</th>
    <th class="table-header-repeat line-left"><a href="">Nombre del Modulo</a></th>
    <th class="table-header-repeat line-left"><a href="">Orden</a></th>
    <th class="table-header-repeat line-left"><a href="">Posiciones</a></th>
    <th class="table-header-repeat line-left"><a href="">Tipo</a></th>
    <th class="table-header-repeat line-left"><a href="">Creado el</a></th>
    <th class="table-header-repeat line-left"><a href="">Modificado el</a></th>
    <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
    <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
  </tr>
  <?php $respmod = mysql_query("select * from mod_modulos order by mod_id ASC");
	  while($mod = mysql_fetch_array($respmod)) {
		  $c=$c+1; if($c%2==0) { ?>
  <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
    <td><?php echo $c; ?></td>
    <td><strong><?php echo $mod['mod_nombre']; ?></strong></td>
    <td><?php echo $mod['mod_orden']; ?></td>
    <td><?php echo Modulos::QuePosi($mod['mod_posicion_id']); ?></td>
    <td><?php echo Modulos::QueTipo($mod['mod_tipo_id']); ?></td>
    <td><?php if(!empty($mod['mod_fecha'])){ echo date("Y/m/d", $mod['mod_fecha']); } ?></td>
    <td><?php if(!empty($mod['mod_modificado'])) { echo date("Y/m/d", $mod['mod_modificado']); } ?></td>
    <td><?php echo Posiciones::Activoc($mod['mod_activo']); ?></td>
    <td colspan="2"><a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_editar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a> <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_permisos=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Permisos" class="icon-5 info-tooltip"></a> <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_borrar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
  </tr>
  <?php }
	  else { ?>
  <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
    <td><?php echo $c; ?></td>
    <td><strong><?php echo $mod['mod_nombre']; ?></strong></td>
    <td><?php echo $mod['mod_orden']; ?></td>
    <td><?php echo Modulos::QuePosi($mod['mod_posicion_id']); ?></td>
    <td><?php echo Modulos::QueTipo($mod['mod_tipo_id']); ?></td>
    <td><?php if(!empty($mod['mod_fecha'])){ echo date("Y/m/d", $mod['mod_fecha']); } ?></td>
    <td><?php if(!empty($mod['mod_modificado'])) { echo date("Y/m/d", $mod['mod_modificado']); } ?></td>
    <td><?php echo Posiciones::Activoc($mod['mod_activo']); ?></td>
    <td colspan="2"><a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_editar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Editar" class="icon-1 info-tooltip"></a> <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_permisos=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Permisos" class="icon-5 info-tooltip"></a> <a href="?lagc=com_modulos&modulos=<?php echo $mod['mod_id']; ?>&modulo_borrar=<?php echo LGlobal::Url_Amigable($mod['mod_nombre']); ?>" title="Borrar" class="icon-2 info-tooltip"></a></td>
  </tr>
  <?php
	  }
	  } ?>
</table>
<?php
	}
	function Editar($id, $url) {
		if (empty($_POST['titulo_lagc'])) {
			$respcont = mysql_query("select * from mod_modulos where mod_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['mod_id']) and $url==LGlobal::Url_Amigable($cont['mod_nombre'])) {
				include "componentes/com_modulos/editar_modulo.tpl";
			} else { echo "<br><center><h3>No existe el modulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$resptipo = mysql_query("select * from mod_tipo where tip_id='".$_POST['tipo']."'"); $tipos = mysql_fetch_array($resptipo);
			$respmodu = mysql_query("select mod_archivo from mod_modulos where mod_id='".$id."'"); $modu = mysql_fetch_array($respmodu);
			$nuevosvalores = explode('|', $tipos['tip_tipvalor1']);
			$permisoss = implode ('/', $_POST["permisos"]);
			if ($tipos['tip_savetipo']=="1") {
				$sql = "UPDATE mod_modulos SET mod_nombre='".$_POST['titulo_lagc']."', mod_orden='".$_POST['orden']."', mod_posicion_id ='".$_POST['posiciones']."', mod_modificado='".time()."', mod_permisos='".$permisoss."', mod_vertitu='".$_POST['vertitulo']."', mod_activo='".$_POST['activado_lagc']."', mod_tipvalor1='".$_POST[$nuevosvalores[0]]."', mod_tipvalor2='".$_POST[$nuevosvalores[1]]."', mod_tipvalor3='".$_POST[$nuevosvalores[2]]."', mod_tipvalor4='".$_POST[$nuevosvalores[3]]."' WHERE mod_id='".$id."'";
			}
			else if ($tipos['tip_savetipo']=="2") {
				$archivos = "../componentes/com_modulos/modulos/".$modu['mod_archivo'];
				$contenido = $_POST[$nuevosvalores[0]];
				if(@$fp = fopen($archivos, "w")){
					fwrite($fp, stripslashes($contenido));
					fclose($fp);
					$sql = "UPDATE mod_modulos SET mod_nombre='".$_POST['titulo_lagc']."', mod_orden='".$_POST['orden']."', mod_posicion_id='".$_POST['posiciones']."', mod_modificado='".time()."', mod_permisos='".$permisoss."', mod_vertitu='".$_POST['vertitulo']."', mod_activo='".$_POST['activado_lagc']."', mod_tipvalor1='".$_POST[$nuevosvalores[0]]."', mod_tipvalor2='".$_POST[$nuevosvalores[1]]."', mod_tipvalor3='".$_POST[$nuevosvalores[2]]."', mod_tipvalor4='".$_POST[$nuevosvalores[3]]."' WHERE mod_id='".$id."'";
					//echo "<br><br><center><h3>Se pudo escribir correctamente.</h3></center>";
				}
				else { echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
				}
			}
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos'\", 1500) </script>
			<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo_lagc'].".</h3></center>";
			mysql_close($con);
		}
	}
	function Paso1() { ?>
    <br /><br />
        <div id="step-holder">
          <div class="step-no">1</div>
          <div class="step-dark-left">Seleccione un Tipo</div>
          <div class="step-dark-right">&nbsp;</div>
          <div class="step-no-off">2</div>
          <div class="step-light-left">Finalizar</div>
          <div class="step-light-round">&nbsp;</div>
          <div class="clear"></div>
        </div>
        * Seleccione un tipo para continuar...
        <ul class="greyarrow">
        <?php
        $resptipo = mysql_query("select * from mod_tipo order by tip_id ASC");
		while($tipo = mysql_fetch_array($resptipo)) {
			echo "<li><a href=\"?lagc=com_modulos&modulos=".$tipo['tip_id']."&modulo_nuevo=".LGlobal::Url_Amigable($tipo['tip_nombre'])."\"><h4>".$tipo['tip_nombre']."</h4></a></li>";
		}
		?>
        </ul>
        <br />
		<div id="step-holder">
          <div class="step-no">1</div>
          <div class="step-dark-left">Seleccione un Tipo</div>
          <div class="step-dark-right">&nbsp;</div>
          <div class="step-no-off">2</div>
          <div class="step-light-left">Finalizar</div>
          <div class="step-light-round">&nbsp;</div>
          <div class="clear"></div>
        </div>
<?php
	}
	function Crear() {
		if (empty($_POST['titulo_lagc'])) {
			include "componentes/com_modulos/crear_modulo.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$resptipo = mysql_query("select * from mod_tipo where tip_id='".$_POST['tipo_lagc']."'");
			$tipos = mysql_fetch_array($resptipo);
			$nuevosvalores = explode('|', $tipos['tip_tipvalor1']);
			$permisoss = implode ('/', $_POST["permisos"]);
			$fecha = time();
			if ($_POST['saveen_lagc']=="1") {
				$sql = "INSERT INTO mod_modulos (mod_nombre, mod_orden, mod_posicion_id, mod_tipo_id, mod_fecha, mod_permisos, mod_vertitu, mod_activo, mod_tipvalor1, mod_tipvalor2, mod_tipvalor3, mod_tipvalor4) VALUES ('".$_POST['titulo_lagc']."', '".$_POST['orden_lagc']."', '".$_POST['posiciones_lagc']."', '".$_POST['tipo_lagc']."', '".$fecha."', '".$permisoss."', '".$_POST['vertitulo']."','".$_POST['activado_lagc']."', '".$_POST[$nuevosvalores[0]]."', '".$_POST[$nuevosvalores[1]]."', '".$_POST[$nuevosvalores[2]]."', '".$_POST[$nuevosvalores[3]]."')";
			}
			else if ($_POST['saveen_lagc']=="2") {
				$archivos = "../componentes/com_modulos/modulos/".$fecha.".tpl";
				$contenido = $_POST[$nuevosvalores[0]];
				if(@$fp = fopen($archivos, "w")){
					fwrite($fp, stripslashes($contenido));
					fclose($fp);
					$sql = "INSERT INTO mod_modulos (mod_nombre, mod_orden, mod_posicion_id, mod_tipo_id, mod_fecha, mod_permisos, mod_vertitu, mod_activo, mod_archivo, mod_tipvalor1, mod_tipvalor2, mod_tipvalor3, mod_tipvalor4) VALUES ('".$_POST['titulo_lagc']."', '".$_POST['orden_lagc']."', '".$_POST['posiciones_lagc']."', '".$_POST['tipo_lagc']."', '".$fecha."', '".$permisoss."', '".$_POST['vertitulo']."','".$_POST['activado_lagc']."', '".$fecha.".tpl', '".$_POST[$nuevosvalores[0]]."', '".$_POST[$nuevosvalores[1]]."', '".$_POST[$nuevosvalores[2]]."', '".$_POST[$nuevosvalores[3]]."')";
					echo "<br><br><center><h3>Se pudo escribir correctamente.</h3></center>";
				}
				else { echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
				}
			}
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo_lagc'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from mod_modulos where mod_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['mod_id']) and $titulo==LGlobal::Url_Amigable($conte['mod_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <?php
			if (!empty($conte['mod_id'])) {
				echo "<input type=\"hidden\" name=\"saveen\" value=\"2\">\n";
				echo "<input type=\"hidden\" name=\"savearchivo\" value=\"".$conte['mod_archivo']."\">\n";
			}
			?>
            <input type="hidden" name="id" value="<?php echo $conte['mod_id']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['mod_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['mod_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_modulos'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				if ($_POST['saveen']=="2") { unlink("../componentes/com_modulos/modulos/".$_POST['savearchivo']); }
				$sql = "DELETE FROM mod_modulos WHERE mod_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE mod_modulos AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el modulo</h3></center>"; }
	}
	/*aditando permisos para todo el componente y si tiene articulos*/
	function Permisos($id, $url){
		if (empty($_POST['cantcompo'])) {
			$respcont = mysql_query("select * from mod_modulos where mod_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['mod_id']) and $url==LGlobal::Url_Amigable($cont['mod_nombre'])) {
				include "componentes/com_modulos/editar_permisos.tpl";
			} else { echo "<br><center><h3>No existe el modulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			//falta agregar aqui
			$sql = "UPDATE mod_modulos SET mod_permisosplus='".Modulos::__JuntarValoresCheck($_POST['caloresid'])."', mod_modificado='".time()."' WHERE mod_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_modulos'\", 1500) </script><center><h4>Gravado Correctamente los Permisos de </h4> <h3><b><em>".$_POST['titulo']."</em></b>.</h3></center>";
			//fin falta
		}
	}
	function __JuntarValoresCheck($array){
		$valor1 = explode('|', $array);
		for($n=0;$n<count($valor1);$n++) {
			if (!empty($_POST['permiso'.$valor1[$n].''])) {
				$final .= $_POST['permiso'.$valor1[$n].'']."|";
			}
		}
		return $final;
	}
	/*inicio permisos*/
	function _Permisos($marcados) {
		$respcomp = mysql_query("select * from componentes where visible='1' ORDER BY nombre ASC");
		while($comp = mysql_fetch_array($respcomp)) {
			if ($comp['id_com']!=1 and $comp['id_com']!=3 and $comp['id_com']!=4 and $comp['id_com']!=5 and $comp['id_com']!=6 and $comp['id_com']!=7 and $comp['id_com']!=8 and $comp['id_com']!=9 and $comp['id_com']!=10) {
				$marcado=explode("|",$marcados);
				$var2 = 0;
				for($n=0;$n<count($marcado);$n++) {
					if ($marcado[$n] == $comp['id_com']) {
						$var2 = 1;
						break;
					}
				}
				if ($var2 == 1) {
					echo "<div class=\"componente-articulosshec\" id=\"compo".$comp['id_com']."\">";
					echo "\n<table><tr>\n";
					echo "<td width=\"230\"><div class=\"componente-titulo\"><strong>".$comp['nombre']."</strong></div></td>\n";
					echo "<td width=\"100\" align=\"center\" valign=\"middle\"".Modulos::__Permisos($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com'])."><div class=\"componente-marcar\"><label><input type=\"checkbox\" name=\"permiso".$comp['id_com']."\" checked value=\"".$comp['id_com']."\" onClick=\"ShowTodos();\"> Ver en Todos</label></div>\n</td>\n";
					echo "</tr>\n";
					echo Modulos::ComponentesArticulos($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com']);
					echo "</table>\n</div>\n";
				}
				else {
					echo "<div class=\"componente-articulos\" id=\"compo".$comp['id_com']."\">";
					echo "\n<table><tr>\n";
					echo "<td width=\"230\"><div class=\"componente-titulo\"><strong>".$comp['nombre']."</strong></div></td>\n";
					echo "<td width=\"100\" align=\"center\" valign=\"middle\"".Modulos::__Permisos($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com'])."><div class=\"componente-marcar\"><label><input type=\"checkbox\" name=\"permiso".$comp['id_com']."\" value=\"".$comp['id_com']."\" onClick=\"ShowTodos();\"> Ver en Todos</label></div>\n</td>\n";
					echo "</tr>\n";
					echo Modulos::ComponentesArticulos($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com']);
					echo "</table>\n</div>\n";
				}
			}
		}
	}
	function ComponentesArticulos($id, $bd, $campo, $idcomp){
		$rptcompt = mysql_query("select ".$id.", ".$campo."  from ".$bd." ORDER BY ".$campo." ASC");
		while($rpt = mysql_fetch_array($rptcompt)) {
			echo "<tr><td><div class=\"componente-art\"><sup>|_</sup>&nbsp;".$rpt[$campo]."</div></td></tr>\n";
		}
	}
	function __Permisos($id, $bd, $campo, $idcomp){
		$rptcompt = mysql_query("select ".$id.", ".$campo."  from ".$bd." ORDER BY ".$campo." ASC");
		$cantidad = mysql_num_rows($rptcompt);
		if (!empty($cantidad)) {
			$cantidad = $cantidad+1;
			$final = " rowspan=\"".$cantidad."\"";
		}
		else {
			$final = "";
		}
		return $final;
	}
	function __MarcadosJava(){ ?>
	<?php $rptcomponentes = mysql_query("select id_com from componentes where visible='1' ORDER BY nombre ASC"); ?>
<script type="text/javascript">
function ShowTodos() {
	<?php
	$cont = 0;
	while($comp = mysql_fetch_array($rptcomponentes)) {
		if ($comp['id_com']!=1 and $comp['id_com']!=3 and $comp['id_com']!=4 and $comp['id_com']!=5 and $comp['id_com']!=6 and $comp['id_com']!=7 and $comp['id_com']!=8 and $comp['id_com']!=9 and $comp['id_com']!=10) { ?>
if(document.frmmodulo.permiso<?=$comp['id_com']; ?>.checked) { document.getElementById('compo<?=$comp['id_com']; ?>').className = "componente-articulosshec"; }
	else { document.getElementById('compo<?=$comp['id_com']; ?>').className = "componente-articulos"; }
	<?php
		$cont = $cont+1;
		$valorid .= $comp['id_com']."|";
		}
	} ?>
}
</script>
<input name="cantcompo" type="hidden" value="<?php echo $cont; ?>" />
<input name="caloresid" type="hidden" value="<?php echo $valorid; ?>" />
    <?php
	}
	/*fin permisos*/
	function Componentes_Selec_Com($compo){
		$respcomp = mysql_query("select * from componentes where visible='1' ORDER BY nombre ASC");
		//otros enlaces
				$nenlaces = array("-1|1"=>"Inicio");
				ksort($nenlaces);
				foreach ($nenlaces as $key => $valor) {
					/**/
					$permisos=split("/",$compo);
					$var1 = 0;
					for($n=0;$n<count($permisos);$n++) {
						if ($permisos[$n] == $key) {
							$var1 = 1;
							break;
						}
					}
					/**/
					if ($var1 == 1) {
						echo "<option value=\"".$key."\" selected=\"selected\">".$valor."</option>\n";
					}
					else {
						echo "<option value=\"".$key."\">".$valor."</option>\n";
					}
				}
				echo "<option disabled=\"disabled\">--------------------------------------------</option>\n";
		while($comp = mysql_fetch_array($respcomp)) {
			if ($comp['id_com']!=1 and $comp['id_com']!=3 and $comp['id_com']!=4 and $comp['id_com']!=5 and $comp['id_com']!=6 and $comp['id_com']!=7 and $comp['id_com']!=8 and $comp['id_com']!=9 and $comp['id_com']!=10) {
				/**/
				$permisoss=split("/",$compo);
				$var2 = 0;
				for($n=0;$n<count($permisoss);$n++) {
					if ($permisoss[$n] == $comp['id_com']) {
						$var2 = 1;
						break;
					}
				}
				/**/
				if ($var2 == 1) {
					echo "<option value=\"".$comp['id_com']."\" selected=\"selected\">".$comp['nombre']."</option>\n";
					echo Modulos::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com'], $compo);
				}
				else {
					echo "<option value=\"".$comp['id_com']."\">".$comp['nombre']."</option>\n";
					echo Modulos::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com'], $compo);
				}
			}
		}
	}
	function ComponentesSelecCont($id, $bd, $campo, $idcomp, $compo){
		$rptcompt = mysql_query("select ".$id.", ".$campo."  from ".$bd." ORDER BY ".$campo." ASC");
		while($rpt = mysql_fetch_array($rptcompt)) {
				/**/
				$permisos=split("/",$compo);
				$var1 = 0;
				for($n=0;$n<count($permisos);$n++) {
					if ($permisos[$n] == $idcomp."|".$rpt[$id]) {
						$var1 = 1;
						break;
					}
				}
				/**/
			if ($var1 == 1) {
				echo "<option value=\"".$idcomp."|".$rpt[$id]."\" selected=\"selected\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$rpt[$campo]."</option>\n";
			}
			else {
				echo "<option value=\"".$idcomp."|".$rpt[$id]."\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$rpt[$campo]."</option>\n";
			}
		}
	}
	function LGcheck($valor) {
		if ($valor=='1') { $checked=" checked"; }
		else { $checked=""; }
		return $checked;
	}
	function QueTipo($id) {
		$rpttipo = mysql_query("select * from mod_tipo where tip_id='".$id."'"); $tipo = mysql_fetch_array($rpttipo);
		return $tipo['tip_nombre'];
	}
	function QuePosi($id) {
		$rptposi = mysql_query("select * from mod_posiciones where mod_id='".$id."'"); $posi = mysql_fetch_array($rptposi);
		return LGlobal::Url_Amigable($posi['mod_nombre']);
	}
}
?>