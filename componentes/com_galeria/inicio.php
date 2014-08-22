<?php class Galeria {
	function Inicios($paginar) {
		echo "<h2>Galerias de Fotos</h2>";
		@include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from fotos_album order by id_gal ASC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('#art');//#estados
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
				echo "<div class=\"contenido2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_galeria', $articulo['id_gal'], $articulo['titulo'])."\" title=\"".$articulo['titulo']."\">".$articulo['titulo']."</a><br>".$articulo['descripcion']."</div>";
			}
			else {
				echo "<div class=\"contenido1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_galeria', $articulo['id_gal'], $articulo['titulo'])."\" title=\"".$articulo['titulo']."\">".$articulo['titulo']."</a><br>".$articulo['descripcion']."</div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function Mostrar($valor, $texto) {
		if ($valor==1) {
			$final = $texto;
		}
		return $final;
	}
	function Ver($articulo, $ver) {
		$respgale = mysql_query("select * from fotos_album where id_gal='".$articulo."'");
		$galerias = mysql_fetch_array($respgale);
		if (!empty($galerias['id_gal']) and $ver==LGlobal::Url_Amigable($galerias['titulo'])) { ?>
        	<link href="componentes/com_galeria/shadowbox.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="componentes/com_galeria/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="componentes/com_galeria/shadowbox.js"></script>
            <script type="text/javascript"> Shadowbox.init({ language: "es", players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'] }); </script>
<h2><?=$galerias['titulo']; ?></h2>
<?php if (!empty($galerias['descripcion'])) { ?><div class="galeria-descripcion"><?=$galerias['descripcion']; ?></div><?php } ?>
<?php $respgale = mysql_query("select * from fotos_imagenes where categoria='".$galerias['id_gal']."' and activo='1'"); ?>
<table width="602" border="0" cellspacing="0" cellpadding="0" align="center">
<tr> 
<?php
$contador = 1;
while($galeria=mysql_fetch_array($respgale)){
	if ($contador > 6) {
		echo "</tr><tr>";
		$contador = 1;
	}
?>
<td align="center"><div class="foto-vista1">
<?php echo "<span>".Galeria::Mostrar($galeria['mostitle'], $galeria['titulo'])."</span><br>\n";
echo "<a href=\"componentes/com_galeria/fotos/".$galeria['imagen']."\" title=\"".Galeria::Mostrar($galeria['mostitle'], $galeria['descripcion'])."\" rel=\"shadowbox[1]\">";
echo "\n<img src=\"componentes/com_galeria/fotos/thumb/".$galeria['imagen']."\" title=\"".$galeria['descripcion']."\" /></a><br>\n"; ?>
</div></td>
<? $contador++; } ?>
</tr></table>
		<?php
		}
		else { echo "<em>No existe imagenes para mostrar</em>"; }
	}
}
?>
<link href="componentes/com_galeria/estilos.css" rel="stylesheet" type="text/css" />
<?php if (!isset($_GET['id'])) { Galeria::Inicios(10); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Galeria::Ver($_GET['id'], $_GET['ver']); } ?>