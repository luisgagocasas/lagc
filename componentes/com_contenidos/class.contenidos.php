<?php class Articulos {
	function Inicio($paginar) {
		echo "<h2>Contenidos</h2>";
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from contenidos where activo='1' order by cont_id DESC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('');//#estados
		$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
		$paging->mostrarPrimera("|<", true);
		$paging->mostrarUltima(">|", true);
		$paging->mostrarAnterior(false);
		$paging->mostrarSiguiente(false);
		$paging->mostrarActual("<span class=\"navthis\">{n}</span>");
		$paging->nombreVariable("verPagina");
		$paging->ejecutar();
		while($articulo = $paging->fetchResultado()) {
			$c=$c+1;
			if($c%2==0) {
				echo "<div class=\"contenido2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_contenidos', $articulo['cont_id'], $articulo['cont_titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['cont_titulo']."</a><br />".$articulo['cont_resumen']."</div>";
			}
			else {
				echo "<div class=\"contenido1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_contenidos', $articulo['cont_id'], $articulo['cont_titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['cont_titulo']."</a><br />".$articulo['cont_resumen']."</div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function Ver($articulo, $ver) {
		$respart = mysql_query("select * from contenidos where cont_id='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['cont_id']) and $ver==LGlobal::Url_Amigable($articu['cont_titulo'])) {
			if ($articu['activo']!=2) {
				if ($articu['cont_titulo_activo']==1) { echo "<h2>".$articu['cont_titulo']."</h2>"; }
				if ($articu['cont_resumen_activar']==1) { echo "<p><strong>".$articu['cont_resumen']."</strong></p>"; }
				echo $articu['cont_contenido'];
			}
		}
		else { echo "<em>No Existe el Articulo</em>"; }
	}
}
?>