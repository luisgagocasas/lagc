<?php
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.enlace.php";
require "../../administrador/configuracion.lagc.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 8;//number of records per page
$query = "select * from url_enlaces where url_estado='1' order by url_id DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:''; 
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']); 
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('url_nombre', 'url_descripcion', 'url_usuario');
// Get the paginated rows
try{
	$rows = $paginator->paginate();
}catch (Exception $e){
	echo $e->getMessage();
}
?>
<script type="text/javascript">
	$('.paginator a').click(function () {
		$('#listing_container').Paginate(this.id);
		return false;	
	});
</script>
<?php
foreach($rows as $articulo){
	$c=$c+1;
	if($c%2==0) {
		echo "\n<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_enlace', $articulo['url_id'], $articulo['url_nombre'])."\" title=\"".$articulo['url_descripcion']."\"><b>".$articulo['url_nombre']."</b></a><br>
		<div class=\"blog-resumen2\">
		".$articulo['url_descripcion']."
		</div>
		<div class=\"blog-ladoderecho2\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['url_creado'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['url_usuario'], true, false, "_blank", "")."<br />
		<b>Visitas:</b> ".$articulo['url_visitas']."<br>
		<center><b><a href=\"".$articulo['url_enlace']."\" target=\"_blank\">Ir al Enlace</a></b></center>
		</div>
		</div>";
	}
	else {
		echo "\n<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_enlace', $articulo['url_id'], $articulo['url_nombre'])."\" title=\"".$articulo['url_descripcion']."\"><b>".$articulo['url_nombre']."</b></a><br>
		<div class=\"blog-resumen\">
		".$articulo['url_descripcion']."
		</div>
		<div class=\"blog-ladoderecho\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['url_creado'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['url_usuario'], true, false, "_blank", "")."<br />
		<b>Visitas:</b> ".$articulo['url_visitas']."<br>
		<center><b><a href=\"".$articulo['url_enlace']."\" target=\"_blank\">Ir al Enlace</a></b></center>
		</div>
		</div>";
	}
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>