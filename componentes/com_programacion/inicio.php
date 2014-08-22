<?php class Contacto {
	function Inicios($paginar) {
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from prog_archivos where activo='1' order by id_cont ASC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('');
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
				echo "<div class=\"contenido2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_programacion', $articulo['id_cont'], $articulo['nombre_cont'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['nombre_cont']."</a></div>";
			}
			else {
				echo "<div class=\"contenido1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_programacion', $articulo['id_cont'], $articulo['nombre_cont'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['nombre_cont']."</a></div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function Ver($articulo, $ver) {
		$respart = mysql_query("select * from prog_archivos where id_cont='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['id_cont']) and $ver==LGlobal::Url_Amigable($articu['nombre_cont'])) {
			//echo "<h2>".$articu['nombre_cont']."</h2>";
			include "componentes/com_programacion/".$articu['archivo_cont'].".php";
		}
		else { echo "<em>No existe el archivo.</em>"; }
	}
}
?>
<?php if (!isset($_GET['id'])) { Contacto::Inicios(10); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Contacto::Ver($_GET['id'], $_GET['ver']); } ?>