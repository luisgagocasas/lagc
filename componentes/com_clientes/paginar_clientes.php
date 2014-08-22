<?php
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.lagc.php";
require "../../administrador/configuracion.lagc.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 12;//number of records per page
$query = "select * from cl_clientes where cl_activado='1' order by cl_nombre DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:''; 
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']); 
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('cl_nombre', 'cl_empresa', 'cl_web');
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
foreach($rows as $articulo){ ?>
	<div class="cont-footer">
<?php
echo "<a href=\"".LGlobal::Tipo_URL('com_clientes', $articulo['cl_id'], $articulo['cl_nombre'])."\" title=\"\">";
echo Clientes::VerThumb($articulo['cl_imagen'], $articulo['cl_nombre'])."</a>\n"; ?>
</div>
<?php
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>