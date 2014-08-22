<?php class Clientes {
	function Inicios($paginar) { ?>
    <h2>Clientes</h2>
    <?php
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from cl_clientes where cl_activado='1' order by cl_nombre DESC";
		$recordsPerPage = 12;//articulos por pagina
		// page number, records per page, sql query, and the mysqli connection object
		$paginator = new AjaxPaginator('1',$recordsPerPage,$query,$conn);
		$paginator->debug = false;
		try{
			$rows = $paginator->paginate();
		}catch (Exception $e){
			echo $e->getMessage();
		}
		?>
		<script type="text/javascript" src="componentes/com_clientes/jquery.pag.clientes.js"></script>
        <link href="administrador/utilidades/paginacion/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        $(document).ready (function () {
            $('#srch_btn').click(function () {
                $('#listing_container').Paginate();
                return false;
            });
            $('.paginator a').click(function () {
                $('#listing_container').Paginate(this.id);
                return false;
            });
        });
        </script>
<div id='search-box' class="search-box">
<form action="" method="get">
<input id="search" type="text" class="search" />
<?php
$getArray = array();
parse_str($_SERVER['QUERY_STRING'],$getArray);
foreach($getArray as $key=>$value){
	echo "<input type='hidden' name='{$key}' id='{$key}' value='{$value}' />";
}
?>
<input id="srch_btn" type="submit" value="Filtrar" class="button" />
</form>
</div>
<br class="clear" /><br class="clear" /><br class="clear" />
<div id="listing_container">
<?php foreach($rows as $articulo){ ?>
<div class="cont-footer">
<?php
echo "<a href=\"".LGlobal::Tipo_URL('com_clientes', $articulo['cl_id'], $articulo['cl_nombre'])."\" title=\"\">";
echo Clientes::VerThumb($articulo['cl_imagen'], $articulo['cl_nombre'])."</a>\n"; ?>
</div>
<? $contador++; ?>
<?php } ?>
<br /><br /><br />
<?php
$links = $paginator->getLinks();
echo "<div class='paginator'>".$links;
echo "<p>Pagina ".$paginator->pageId." de ".$paginator->totalPages . "</p>";
echo "</div>";
?>
</div>
<?php
	}
	function VerThumb($img, $nombre) {
		if (!empty($img)) {
			$final = "<img src=\"componentes/com_clientes/imagenes/thumb/".$img."\" width=\"60\" height=\"90\" title=\"".$nombre."\" />";
		} else {
			$final = "<img src=\"componentes/com_clientes/imagenes/thumb/no_disponible.jpg\" width=\"60\" height=\"90\" title=\"".$nombre."\" />";
		}
		return $final;
	}
	function VerFoto($img, $nombre) {
		if (!empty($img)) {
			$final = "<img src=\"componentes/com_clientes/imagenes/".$img."\" width=\"200\" title=\"".$nombre."\" />\n";
		} else {
			$final = "<img src=\"componentes/com_clientes/imagenes/no_disponible.jpg\" width=\"200\" title=\"".$nombre."\" />\n";
		}
		return $final;
	}
	function VerEnlace($enlace) {
		if (!empty($enlace)) {
			$final = "<img src=\"componentes/com_clientes/utilidades/enlace.gif\" border=\"0\"><a href=\"".$enlace."\" target=\"_blank\">Visitar Web</a>";
		}
		return $final;
	}
	function Ver($id, $ver) {
		$rptcli = mysql_query("select * from cl_clientes where cl_id='".$id."' and cl_activado='1'");
		$Cliente = mysql_fetch_array($rptcli);
		if (!empty($Cliente['cl_id']) and $ver==LGlobal::Url_Amigable($Cliente['cl_nombre'])) {
			echo "<h2>Proyecto: ".$Cliente['cl_nombre']."</h2>";
			include "componentes/com_clientes/vercliente.tpl";
		}
		else { echo "<em>No existe el Cliente.</em>"; }
	}
}
?>