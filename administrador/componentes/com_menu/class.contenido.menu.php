<?php
class Menu {
	function InicioLista($posicion, $titulo) {
		$respposi = mysql_query("select * from m_posicion where m_pid='".$posicion."'"); $mposicion = mysql_fetch_array($respposi);
		if (!empty($mposicion['m_pid']) and $titulo==LGlobal::Url_Amigable($mposicion['m_pnombre'])) {
			echo "<h2>Menu: ".$mposicion['m_pnombre']."</h2><br>"; ?>
            <div><img src="plantillas/lagc-peru/imagenes/forms/icon_edit.gif" border="0" /> <a href="?lagc=com_menu">Posiciones</a> &raquo; <a href="?lagc=com_menu&menus=<?php echo time(); ?>&enlaces_nuevo=<?php echo $_GET['menus']; ?>"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo Enlace para <?php echo $mposicion['m_pnombre']; ?></a></div><br />
            <table align="left" id="product-table">
            <tr>
              <th class="table-header-check">&nbsp;</th>
              <th class="table-header-repeat line-left"><a href="">Titulo y Niveles</a></th>
              <th class="table-header-repeat line-left"><a href="">Orden</a></th>
              <th class="table-header-repeat line-left"><a href="">Componente y contenido</a></th>
              <th class="table-header-repeat line-left"><a href="">Creado</a></th>
              <th class="table-header-repeat line-left"><a href="">Modificado</a></th>
              <th class="table-header-repeat line-left"><a href="">Act./Desac.</a></th>
              <th colspan="2" class="table-header-options line-left"><a href="">Opciones</a></th>
            </tr>
            <?php
			$respmenu = mysql_query("select * from m_menus where m_posi='".$posicion."' ORDER BY m_orden ASC");
			while($menu=mysql_fetch_array($respmenu)){
				$respsubmenu = mysql_query("select * from m_submenus where m_subidm='".$menu['m_id']."' and m_subposi='".$posicion."' ORDER BY m_suborden ASC");
				$subcant = mysql_num_rows($respsubmenu);
				if ($subcant==0) {
					echo "<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\">\n";
					echo "<td>".$menu['m_id']."</td>\n";
					echo "<td>".$menu['m_nombre']."</td>\n";
					echo "<td>".$menu['m_orden']."</td>\n";
					echo "<td>".Menu::_VerEnlace($menu['m_componente'], "s")."</td>\n"; ?>
					<td><?php if(!empty($menu['m_fecha'])){ echo date("Y/m/d", $menu['m_fecha']); } ?></td>
                    <td><?php if(!empty($menu['m_modificado'])) { echo date("Y/m/d", $menu['m_modificado']); } ?></td>
                    <?php
					echo "<td>".Posicion::Activoe($menu['m_activo'])."</td>\n";
					echo "<td colspan=\"2\">
					<a href=\"?lagc=com_menu&menus=".$menu['m_id']."&enlaces_editar=".LGlobal::Url_Amigable($menu['m_nombre'])."\" title=\"Editar\" class=\"icon-1 info-tooltip\"></a>
					<a href=\"?lagc=com_menu&menus=".$menu['m_id']."&enlaces_borrar=".LGlobal::Url_Amigable($menu['m_nombre'])."\" title=\"Borrar\" class=\"icon-2 info-tooltip\"></a></td>\n";
					echo "</tr>\n";
				}
				else {
					echo "\n<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\">\n";
					echo "<td>".$menu['m_id']."</td>\n";
					echo "<td>".$menu['m_nombre']."</td>\n";
					echo "<td>".$menu['m_orden']."</td>\n";
					echo "<td>".Menu::_VerEnlace($menu['m_componente'])."</td>\n"; ?>
					<td><?php if(!empty($menu['m_fecha'])){ echo date("Y/m/d", $menu['m_fecha']); } ?></td>
                    <td><?php if(!empty($menu['m_modificado'])) { echo date("Y/m/d", $menu['m_modificado']); } ?></td>
                    <?php
					echo "<td>".Posicion::Activoe($menu['m_activo'])."</td>\n";
					echo "<td colspan=\"2\">
					<a href=\"?lagc=com_menu&menus=".$menu['m_id']."&enlaces_editar=".LGlobal::Url_Amigable($menu['m_nombre'])."\" title=\"Editar\" class=\"icon-1 info-tooltip\"></a>
					<a href=\"?lagc=com_menu&menus=".$menu['m_id']."&enlaces_borrar=".LGlobal::Url_Amigable($menu['m_nombre'])."\" title=\"Borrar\" class=\"icon-2 info-tooltip\"></a></td>\n";
					echo "</tr>\n";
					while($submenus=mysql_fetch_array($respsubmenu)){
						echo "\n<tr onMouseover=this.bgColor=\"#D6D6D6\" onMouseout=this.bgColor=\"#FFFFFF\">\n";
						echo "<td>".$submenus['m_subid']."</td>\n";
						echo "<td>&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$submenus['m_subnombre']."</td>\n";
						echo "<td>".$submenus['m_suborden']."</td>\n";
						echo "<td>".Menu::_VerEnlace($submenus['m_subcomponente'])."</td>\n";
						echo "<td>".date("Y/m/d", $submenus['m_subfecha'])."</td>\n";
						echo "<td>".date("Y/m/d", $submenus['m_submodificado'])."</td>\n";
						echo "<td>".Posicion::Activoe($submenus['activado'])."</td>\n";
						echo "<td colspan=\"2\">
						<a href=\"?lagc=com_menu&menus=".$submenus['m_subid']."&enlaces_editarsub=".LGlobal::Url_Amigable($submenus['m_subnombre'])."\" title=\"Editar\" class=\"icon-1 info-tooltip\"></a>
						<a href=\"?lagc=com_menu&menus=".$submenus['m_subid']."&enlaces_borrarsub=".LGlobal::Url_Amigable($submenus['m_subnombre'])."\" title=\"Borrar\" class=\"icon-2 info-tooltip\"></a></td>\n";
						echo "</tr>";
					}
				}
			}
			echo "</table>\n";
		}
		else { echo "<em>No existe el menu</em>"; }
	}
	function _VerEnlace($componente) {
		$compoarray = explode('|', $componente);
		$respcomp = mysql_query("select * from componentes where id_com='".$compoarray['0']."'");
		$compo = mysql_fetch_array($respcomp);
		if (empty($compoarray['1'])) {
			$final = "<a href=\"?lagc=".$compo['url']."\" target=\"_blank\">".$compo['nombre']."</a>";
		}
		else {
			if ($compoarray['0']=="-1") {
				$nenlaces = array("-1|1"=>"Inicio", "-1|2"=>"Administrador", "-1|3"=>"Vacio");
				ksort($nenlaces);
				foreach ($nenlaces as $key => $valor) {
					if ($componente==$key) {
						$final = "<a href=\"\">".$valor."</a>";
					}
				}
			}
			else {
				$rptcompt = mysql_query("select * from ".$compo['campobd']." where ".$compo['campoid']."='".$compoarray['1']."'");
				$rpt = mysql_fetch_array($rptcompt);
				$final = "<a href=\"../?lagc=".$compo['url']."\" target=\"_blank\">".$compo['nombre']."</a> &raquo; <a href=\"../?lagc=".$compo['url']."&id=".$rpt[$compo['campoid']]."&ver=".LGlobal::Url_Amigable($rpt[$compo['campotitulo']])."\" target=\"_blank\">".$rpt[$compo['campotitulo']]."</a>";
			}
		}
		return $final;
	}
	function Componentes_Selec_Com($compo){
		$respcomp = mysql_query("select * from componentes ORDER BY nombre ASC");
		//otros enlaces
				$nenlaces = array("-1|1"=>"Inicio", "-1|2"=>"Administrador", "-1|3"=>"Vacio");
				ksort($nenlaces);
				foreach ($nenlaces as $key => $valor) {
					if ($compo==$key) {
						echo "<option value=\"".$key."\" selected=\"selected\">".$valor."</option>\n";
					}
					else {
						echo "<option value=\"".$key."\">".$valor."</option>\n";
					}
				}
				echo "<option disabled=\"disabled\">--------------------------------------------</option>\n";
		while($comp = mysql_fetch_array($respcomp)) {
			if ($comp['id_com']!=1 and $comp['id_com']!=3 and $comp['id_com']!=4 and $comp['id_com']!=5 and $comp['id_com']!=6 and $comp['id_com']!=7 and $comp['id_com']!=8 and $comp['id_com']!=9 and $comp['id_com']!=10) {
				$componentes = explode('|', $compo);
				//echo $componentes['0']." - ".$componentes['1'];
				if (!empty($componentes['0']) and !empty($componentes['1'])) {
					if ($componentes['0']==$comp['id_com']) {
						echo "<option value=\"".$comp['id_com']."\" style=\"background:#316AC5;\">".$comp['nombre']."</option>\n";
						echo Menu::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com'], $componentes['1']);
					}
					else {
						echo "<option value=\"".$comp['id_com']."\">".$comp['nombre']."</option>\n";
						echo Menu::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com']);
					}
				}
				else {
					if ($componentes['0']==$comp['id_com']) {
						echo "<option value=\"".$comp['id_com']."\" selected=\"selected\">".$comp['nombre']."</option>\n";
						echo Menu::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com']);
					}
					else {
						echo "<option value=\"".$comp['id_com']."\">".$comp['nombre']."</option>\n";
						echo Menu::ComponentesSelecCont($comp['campoid'], $comp['campobd'], $comp['campotitulo'], $comp['id_com']);
					}
				}
			}
		}
	}
	function ComponentesSelecCont($id, $bd, $campo, $idcomp, $valor){
		$rptcompt = mysql_query("select ".$id.", ".$campo."  from ".$bd." ORDER BY ".$campo." ASC");
		while($rpt = mysql_fetch_array($rptcompt)) {
			if ($valor==$rpt[$id]) {
				echo "<option value=\"".$idcomp."|".$rpt[$id]."\" selected=\"selected\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$rpt[$campo]."</option>\n";
			}
			else {
				echo "<option value=\"".$idcomp."|".$rpt[$id]."\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$rpt[$campo]."</option>\n";
			}
		}
	}
	function MenusSelec($posicion, $dato1, $dato2) {
		if (empty($dato1)) { /*cuando sea para crear un enlace*/
			$respmenu = mysql_query("select * from m_menus where m_posi='".$posicion."' ORDER BY m_orden ASC");
			while($menu=mysql_fetch_array($respmenu)){
				$respsubmenu = mysql_query("select * from m_submenus where m_subidm='".$menu['m_id']."' and m_subposi='".$posicion."' ORDER BY m_suborden ASC");
				$subcant = mysql_num_rows($respsubmenu);
				if ($subcant==0) {
					echo "<option value=\"".$menu['m_id']."\">".$menu['m_nombre']."</option>\n";
				}
				else {
					echo "<option value=\"".$menu['m_id']."\">".$menu['m_nombre']."</option>\n";
					while($submenus=mysql_fetch_array($respsubmenu)){
						echo "<option value=\"\" disabled=\"disabled\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$submenus['m_subnombre']."</option>\n";
					}
				}
			}
		}
		else { /*para los enlaces normales primer nivel*/
			$respmenu = mysql_query("select * from m_menus where m_posi='".$posicion."' ORDER BY m_orden ASC");
			while($menu=mysql_fetch_array($respmenu)){
				$respsubmenu = mysql_query("select * from m_submenus where m_subidm='".$menu['m_id']."' and m_subposi='".$posicion."' ORDER BY m_suborden ASC");
				$subcant = mysql_num_rows($respsubmenu);
				if ($subcant==0) {
					if ($menu['m_id']==$dato1) {
						echo "<option value=\"\" selected=\"selected\">".$menu['m_nombre']."</option>\n";
					}
					else {
						echo "<option value=\"".$menu['m_id']."\">".$menu['m_nombre']."</option>\n";
					}
				}
				else {
					if ($menu['m_id']==$dato1) {
						echo "<option value=\"".$menu['m_id']."\" selected=\"selected\">".$menu['m_nombre']."</option>\n";
					}
					else {
						echo "<option value=\"".$menu['m_id']."\">".$menu['m_nombre']."</option>\n";
					}
					while($submenus=mysql_fetch_array($respsubmenu)){
						echo "<option value=\"\" disabled=\"disabled\">&nbsp;&nbsp;&nbsp;<sup>|_</sup>&nbsp;".$submenus['m_subnombre']."</option>\n";
					}
				}
			}
		}
	}
	function crear() {
		if (empty($_POST['titulo'])) {
			include "componentes/com_menu/crear_menu.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if (empty($_POST['otrosenlaces'])) {
				$sql = "INSERT INTO m_menus (m_nombre, m_componente, m_orden, m_target, m_cssa, m_cssli, m_tcssa, m_tcssli, m_fecha, m_posi, m_activo) VALUES ('".$_POST['titulo']."', '".$_POST['enlaces']."', '".$_POST['orden']."', '".$_POST['como']."', '".$_POST['cssa']."', '".$_POST['cssli']."', '".$_POST['cstipoa']."', '".$_POST['cstipoli']."', '".time()."', '".$_POST['posicion']."', '".$_POST['activado']."')";
			}
			else if (!empty($_POST['otrosenlaces'])) {
				$sql = "INSERT INTO m_submenus (m_subnombre, m_subidm, m_subcomponente, m_subtarget, m_subcss, m_suborden, m_subfecha, m_subposi, activado) VALUES ('".$_POST['titulo']."', '".$_POST['otrosenlaces']."', '".$_POST['enlaces']."', '".$_POST['como']."', '".$_POST['css']."', '".$_POST['orden']."', '".time()."', '".$_POST['posicion']."', '".$_POST['activado']."')";
			}
			if ($_GET['menus']!='continuar') {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_GET['enlaces_nuevo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...</h4></center>";
			}
			else {
				if (empty($_POST['otrosenlaces'])) {
					$respcont = mysql_query("select * from m_menus ORDER BY m_id DESC");
					$cantregistros = mysql_fetch_array($respcont);
					$cantregistros = $cantregistros['m_id']+1;
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$cantregistros."&enlaces_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				else if (!empty($_POST['otrosenlaces'])) {
					$respcont = mysql_query("select * from m_submenus ORDER BY m_subid DESC");
					$cantregistros = mysql_fetch_array($respcont);
					$cantregistros = $cantregistros['m_subid']+1;
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$cantregistros."&enlaces_editarsub=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
			}
			mysql_query($sql,$con);
		}
	}
	function editar($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from m_menus where m_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['m_id']) and $url==LGlobal::Url_Amigable($cont['m_nombre'])) {
				include "componentes/com_menu/editar_menu.tpl";
			} else { echo "<br><center><h3>No existe el enlace</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if(empty($_POST['otrosenlaces'])) { /*edita sub menu y opera*/
				$sql = "UPDATE m_menus SET m_nombre='".$_POST['titulo']."', m_componente='".$_POST['enlaces']."', m_orden='".$_POST['orden']."', m_target='".$_POST['como']."', m_cssa='".$_POST['cssa']."', m_cssli='".$_POST['cssli']."', m_tcssa='".$_POST['cstipoa']."', m_tcssli='".$_POST['cstipoli']."',  m_modificado='".time()."', m_posi='".$_POST['posicion']."', m_activo='".$_POST['activado']."' WHERE m_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				/*donde ira despues de guardar*/
				if (empty($_GET['enlaces_aplicar'])) {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posicion'])."'\", 1500) </script>
					<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
				}
				else {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$id."&enlaces_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
					<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				mysql_close($con);
			}
			else {
				/**/
				$respcont = mysql_query("select * from m_submenus ORDER BY m_subid DESC");
				$cantregistros = mysql_fetch_array($respcont);
				$cantregistros = $cantregistros['m_subid']+1;
				if (empty($_GET['enlaces_aplicar'])) {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posicion'])."'\", 1500) </script>
					<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
				}
				else {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$cantregistros."&enlaces_editarsub=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
					<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				/**/
				$sql = "DELETE FROM m_menus WHERE m_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE m_menus AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				$sql = "INSERT INTO m_submenus (m_subnombre, m_subcomponente, m_suborden, m_subtarget, m_subcss, m_subfecha, m_subposi, activado, m_subidm) VALUES ('".$_POST['titulo']."', '".$_POST['enlaces']."', '".$_POST['orden']."', '".$_POST['como']."', '".$_POST['css']."', '".time()."', '".$_POST['posicion']."', '".$_POST['activado']."', '".$_POST['otrosenlaces']."')";
				/*donde ira despues de guardar*/
				mysql_query($sql,$con);
			}
		}
	}
	function editarsub($id, $url) {
		if (empty($_POST['titulo'])) {
			$respcont = mysql_query("select * from m_submenus where m_subid='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['m_subid']) and $url==LGlobal::Url_Amigable($cont['m_subnombre'])) {
				include "componentes/com_menu/editar_menusub.tpl";
			} else { echo "<br><center><h3>No existe el enlace</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if(!empty($_POST['otrosenlaces'])) { /*edita sub menu y opera*/
				$sql = "UPDATE m_submenus SET m_subnombre='".$_POST['titulo']."', m_subidm='".$_POST['otrosenlaces']."', m_subcomponente='".$_POST['enlaces']."', m_subtarget='".$_POST['como']."', m_subcss='".$_POST['css']."', m_suborden='".$_POST['orden']."', m_submodificado='".time()."', m_subposi='".$_POST['posicion']."', activado='".$_POST['activado']."' WHERE m_subid='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				/*donde ira despues de guardar*/
				if (empty($_GET['enlaces_aplicarsub'])) {
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posicion'])."'\", 1500) </script>
				<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
				}
				else {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$id."&enlaces_editarsub=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				mysql_close($con);
			}
			else { /*pasando d sub menu a menu*/
				/**/
				$respcontya = mysql_query("select * from m_menus ORDER BY m_id DESC");
				$cantregistrosya = mysql_fetch_array($respcontya);
				$cantregistrosya = $cantregistrosya['m_id']+1;
				if (empty($_GET['enlaces_aplicarsub'])) {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posicion'])."'\", 1500) </script>
					<br><br><center><h4>Se Guardo Correctamente</h4><h3>".$_POST['titulo'].".</h3></center>";
				}
				else {
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_menu&menus=".$cantregistrosya."&enlaces_editar=".LGlobal::Url_Amigable($_POST['titulo'])."'\", 1500) </script>
					<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se guardo y regresara al editor</h4></center>";
				}
				/**/
				$sql = "DELETE FROM m_submenus WHERE m_subid='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE m_submenus AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				$sql = "INSERT INTO m_menus (m_nombre, m_componente, m_orden, m_target, m_css, m_fecha, m_posi, m_activo) VALUES ('".$_POST['titulo']."', '".$_POST['enlaces']."', '".$_POST['orden']."', '".$_POST['como']."', '".$_POST['css']."', '".time()."', '".$_POST['posicion']."', '".$_POST['activado']."')";
				/*donde ira despues de guardar*/
				mysql_query($sql,$con);
			}
		}
	}
	function borrar($id, $titulo) {
		$contenidos = mysql_query("select * from m_menus where m_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['m_id']) and $titulo==LGlobal::Url_Amigable($conte['m_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['m_id']; ?>">
            <input type="hidden" name="posi" value="<?php echo $conte['m_posi']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['m_nombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['m_nombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='<?php echo Menu::PosicionMenuEnlace($conte['m_posi']); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posi'])."'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
				$sql = "DELETE FROM m_menus WHERE m_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE m_menus AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
			}
		} else { echo "<br><center><h3>No existe el enlace</h3></center>"; }
	}
	function borrarsub($id, $titulo) {
		$contenidos = mysql_query("select * from m_submenus where m_subid='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['m_subid']) and $titulo==LGlobal::Url_Amigable($conte['m_subnombre'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $conte['m_subid']; ?>">
            <input type="hidden" name="posi" value="<?php echo $conte['m_subposi']; ?>">
            <input type="hidden" name="title" value="<?php echo $conte['m_subnombre']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?php echo $conte['m_subnombre']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='<?php echo Menu::PosicionMenuEnlace($conte['m_subposi']); ?>'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='".Menu::PosicionMenuEnlace($_POST['posi'])."'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
				$sql = "DELETE FROM m_submenus WHERE m_subid='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE m_submenus AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
			}
		} else { echo "<br><center><h3>No existe el enlace</h3></center>"; }
	}
	public function PosicionMenuEnlace($id) {
		if (!empty($id)) {
			$rptposi = mysql_query("select * from m_posicion where m_pid='".$id."'");
			$posirpt = mysql_fetch_array($rptposi);
			if (!empty($posirpt['m_pid'])) {
				$final = "?lagc=com_menu&menus=".$posirpt['m_pid']."&enlaces=".LGlobal::Url_Amigable($posirpt['m_pnombre']);
			}
			else {
				$final = "nada";
			}
		}
		else {
			$final = "index.php";
		}
		return $final;
	}
}
?>