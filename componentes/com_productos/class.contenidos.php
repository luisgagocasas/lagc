<?php
if (empty($_GET['lagc'])) { exit(); }
class Productos {
	function Inicio($paginar) {
		echo "<h2>Productos</h2>";
		@include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from pro_productos where activo='1' order by p_id ASC");
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
				echo "<div class=\"contenido2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_productos', $articulo['p_id'], $articulo['p_titulo'])."\" title=\"".$articulo['p_titulo']."\">".$articulo['p_titulo']."</a><br>".Productos::__Imagen($articulo['p_imagen'])." <div style=\"float:right;\"><a href=\"".LGlobal::Tipo_URL('com_productos', $articulo['p_id'], $articulo['p_titulo'])."\" title=\"".$articulo['p_titulo']."\">Leer mas...</a></div><br></div>";
			}
			else {
				echo "<div class=\"contenido1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_productos', $articulo['p_id'], $articulo['p_titulo'])."\" title=\"".$articulo['p_titulo']."\">".$articulo['p_titulo']."</a><br>".Productos::__Imagen($articulo['p_imagen'])." <div style=\"float:right;\"><a href=\"".LGlobal::Tipo_URL('com_productos', $articulo['p_id'], $articulo['p_titulo'])."\" title=\"".$articulo['p_titulo']."\">Leer mas...</a></div><br></div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function Ver($articulo, $ver) {
		$respart = mysql_query("select * from pro_productos where p_id='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['p_id']) and $ver==LGlobal::Url_Amigable($articu['p_titulo'])) {
			if ($articu['activo']!=2) {
				echo "<h2>".$articu['p_titulo']."</h2>"; ?>
                <script type="text/javascript" src="componentes/com_productos/tabber.js"></script>
                <script type="text/javascript">
				document.write('<style type="text/css">.tabber{display:none;}<\/style>');
				</script>
                <br />
                <table width="100%" border="0">
                  <tr>
                    <td width="21%" valign="top"><div class="cont-imagen-pro"><?=Productos::__Imagen($articu['p_imagen']); ?></div></td>
                    <td width="79%" colspan="2" valign="top">
                      <div class="tabber">
                        <div class="tabbertab">
                          <h2>DESCRIPCIÓN</h2>
                          <div class="linea-producto"></div>
                          <div class="cont-productoo">
                          <h4>DESCRIPCIÓN</h4>
                          <?=$articu['p_contenido1']; ?>
                          </div>
                        </div>
                        <div class="tabbertab">
                          <h2>CARACTERISTICAS</h2>
                          <div class="linea-producto"></div>
                          <div class="cont-productoo">
                          <h4>CARACTERISTICAS</h4>
                          <?=$articu['p_contenido2']; ?>
                          </div>
                        </div>
                        <div class="tabbertab">
                          <h2>RECOMENDACIONES</h2>
                          <div class="linea-producto"></div>
                          <div class="cont-productoo">
                          <h4>RECOMENDACIONES</h4>
                          <?=$articu['p_contenido3']; ?>
                          </div>
                        </div>
                      </div></td>
                  </tr>
                </table>
                <?php
				echo "<br><br><br><center><a href=\"".LGlobal::Tipo_URL('com_productos')."\">Ver Todos</a></center>";
			}
		}
		else { echo "<em>No existe el producto</em>"; }
	}
	function __Imagen($val1){
		if (!empty($val1)) {	$final = "<img src=\"componentes/com_productos/imagenes/".$val1."\" border=\"0\" />";	}
		else {	$final = "<img src=\"componentes/com_productos/sin_imagen.png\" width=\"100\" border=\"0\" />";	}
		return $final;
	}
}
?>