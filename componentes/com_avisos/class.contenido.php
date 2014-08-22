<?php
class Avisos {
	function Inicio($paginar) {
		@include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from av_avisos where activo='1' order by id ASC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('#avisos');//#estados
		$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
		$paging->mostrarPrimera("|<", true);
		$paging->mostrarUltima(">|", true);
		$paging->mostrarAnterior(false);
		$paging->mostrarSiguiente(false);
		$paging->mostrarActual("<span class=\"navthis\">{n}</span>");
		$paging->nombreVariable("pag");
		$paging->ejecutar();
		while($articulo = $paging->fetchResultado()) {
			$c=$c+1;
			if($c%2==0) {
				echo "<div class=\"contenido2\">&raquo; ".Avisos::Categorias($articulo['categoria'])." | <a href=\"?lagc=com_avisos&id=".$articulo['id']."&ver=".LGlobal::Url_Amigable($articulo['titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['titulo']."</a></div>";
			}
			else {
				echo "<div class=\"contenido1\">&raquo; ".Avisos::Categorias($articulo['categoria'])." | <a href=\"?lagc=com_avisos&id=".$articulo['id']."&ver=".LGlobal::Url_Amigable($articulo['titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['titulo']."</a></div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function Ver($id, $ver) {
	$respart = mysql_query("select * from av_avisos where id='".$id."'");
	$articu = mysql_fetch_array($respart);
	if (!empty($articu['id']) and $ver==LGlobal::Url_Amigable($articu['titulo'])) {
		if ($articu['activo']!=2) {
				echo "<h2>".$articu['titulo']."</h2>";
			if ($articu['resu_act']==1) { echo "<p>".$articu['resumen']."</p>"; }
				echo $articu['descripcion'];
		}
	}
	else { echo "<em>No existe el Aviso</em>"; }
	}
	function Categorias($id) {
		$rescate = mysql_query("select * from av_categorias where id_cat='".$id."'"); $categ = mysql_fetch_array($rescate);
		$num_cat = mysql_num_rows($rescate);
		if ($num_cat>0) { $fincat="<a href=\"?lagc=com_avisos&id=".$categ['id_cat']."&cat=".LGlobal::Url_Amigable($categ['titulo_cat'])."\"\">".$categ['titulo_cat']."</a>"; }
		else { $fincat="<em>Categoria no existe</em>"; }
		return $fincat;
	}
	function LineaTiempo() {
		if (!empty($_GET['id']) and !empty($_GET['cat'])) {
			$rescate = mysql_query("select * from av_categorias where id_cat='".$_GET['id']."'"); $categ = mysql_fetch_array($rescate);
			$num_cat = mysql_num_rows($rescate);
			if ($num_cat>0) { $catretur = "&raquo; ".$categ['titulo_cat'].", <a href=\"?lagc=com_avisos&id=1&categorias=1\">Mas Categorias</a>"; }
			else { $catretur = "&raquo; <em>Categoria no existe</em>"; }
			return $catretur;
		}
		else if (!empty($_GET['id']) and !empty($_GET['ver'])) {
			$resaviso = mysql_query("select * from av_avisos where id='".$_GET['id']."'"); $aviso = mysql_fetch_array($resaviso);
			$num_avi = mysql_num_rows($resaviso);
			if ($num_avi>0) { echo "&raquo; ".Avisos::Categorias($aviso['categoria'])." &raquo; ".ucfirst($aviso['titulo']); }
			else { echo "&raquo; <em>No existe el Aviso</em>"; }
		}
		else { echo ", <a href=\"?lagc=com_avisos&id=1&categorias=1\">Categorias</a>"; /*echo "Lista de Avisos";*/ }
	}
	function CatVer($id, $categoria) {
		$rescate = mysql_query("select * from av_categorias where id_cat='".$id."'"); $categ = mysql_fetch_array($rescate);
		$num_cat = mysql_num_rows($rescate);
		if ($num_cat>0) {
			$resavi = mysql_query("select * from av_avisos where categoria='".$categ['id_cat']."'"); $num_rows = mysql_num_rows($resavi);
			if ($num_rows>0) {
				echo "<h2>".$categ['titulo_cat']."</h2>";
				@include "administrador/utilidades/PHPPaging.lib.php";
				$paging = new PHPPaging;
				$paging->agregarConsulta("select * from av_avisos where activo='1' and categoria='".$categ['id_cat']."' order by id ASC");
				$paging->porPagina($paginar);
				$paging->paginasAntes(4, 10, 30);
				$paging->paginasDespues(4, 10, 30);
				$paging->linkClase('nav');
				$paging->linkSeparador(false);
				$paging->linkSeparadorEspecial('...');
				$paging->linkAgregar('#avisos');//#estados
				$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
				$paging->mostrarPrimera("|<", true);
				$paging->mostrarUltima(">|", true);
				$paging->mostrarAnterior(false);
				$paging->mostrarSiguiente(false);
				$paging->mostrarActual("<span class=\"navthis\">{n}</span>");
				$paging->nombreVariable("pag");
				$paging->ejecutar();
				while($articulo = $paging->fetchResultado()) {
					$c=$c+1;
					if($c%2==0) {
						echo "<div class=\"contenido2\">&raquo; ".Avisos::Categorias($articulo['categoria'])." | <a href=\"?lagc=com_avisos&id=".$articulo['id']."&ver=".LGlobal::Url_Amigable($articulo['titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['titulo']."</a></div>";
					}
					else {
						echo "<div class=\"contenido1\">&raquo; ".Avisos::Categorias($articulo['categoria'])." | <a href=\"?lagc=com_avisos&id=".$articulo['id']."&ver=".LGlobal::Url_Amigable($articulo['titulo'])."\" title=\"".$articulo['cont_resumen']."\">".$articulo['titulo']."</a></div>";
					}
				}
				echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
			}
			else { echo "categoria sin noticias"; }
		}
		else { echo "<em>Categoria no existe</em>"; }
	}
	function CategoriVer($paginar) {
		echo "<h2>Categorias</h2>";
		$rescat = mysql_query("select * from av_categorias"); $num_cat = mysql_num_rows($rescat);
		if ($num_cat>0) {
			@include "administrador/utilidades/PHPPaging.lib.php";
			$paging = new PHPPaging;
			$paging->agregarConsulta("select * from av_categorias order by id_cat ASC");
			$paging->porPagina($paginar);
			$paging->paginasAntes(4, 10, 30);
			$paging->paginasDespues(4, 10, 30);
			$paging->linkClase('nav');
			$paging->linkSeparador(false);
			$paging->linkSeparadorEspecial('...');
			$paging->linkAgregar('#avisos');//#estados
			$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
			$paging->mostrarPrimera("|<", true);
			$paging->mostrarUltima(">|", true);
			$paging->mostrarAnterior(false);
			$paging->mostrarSiguiente(false);
			$paging->mostrarActual("<span class=\"navthis\">{n}</span>");
			$paging->nombreVariable("pag");
			$paging->ejecutar();
			while($articulo = $paging->fetchResultado()) {
				$c=$c+1;
				if($c%2==0) {
					echo "<div class=\"contenido2\">&raquo; <a href=\"?lagc=com_avisos&id=".$articulo['id_cat']."&cat=".LGlobal::Url_Amigable($articulo['titulo_cat'])."\">".$articulo['titulo_cat']."</a></div>";
				}
				else {
					echo "<div class=\"contenido1\">&raquo; <a href=\"?lagc=com_avisos&id=".$articulo['id_cat']."&cat=".LGlobal::Url_Amigable($articulo['titulo_cat'])."\">".$articulo['titulo_cat']."</a></div>";
				}
			}
			echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
		}
		else { echo "Sin categorias"; }
	}
}
?>