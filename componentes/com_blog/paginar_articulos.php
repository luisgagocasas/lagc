<?php
header('Content-Type: text/html; charset=iso-8859-1');
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.contenidos.php";
require "../../administrador/configuracion.lagc.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 10;//number of records per page
$query = "select * from blog_articulos where b_activo='1' order by b_id DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:'';
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']);
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('b_titulo', 'b_resumen', 'b_contenido');
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
		echo "\n<div class=\"blog-cont2\">
		<div class=\"titulo2\">&raquo;
				<a href=\"".LGlobal::Tipo_URL('com_blog', $articulo['b_id'], $articulo['b_titulo'])."\"><b>".$articulo['b_titulo']."</b></a>
		</div>
		<div class=\"blog-resumen2\">
		".Blog::_imagen($articulo['b_img'])."
		".$articulo['b_resumen']."
		</div><br />
		<div class=\"blog-ladoderecho2\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['b_fecha'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['b_autor'], true, false, "_blank", "")."<br />
		<b>Categoria:</b> ".Blog::_Categoria($articulo['b_categoria'])."<br>
		<b>Visitas:</b> &nbsp;".Blog::_ContadorVisitas($articulo['b_id'])."
		</div>
		</div>";
	}
	else {
		echo "\n<div class=\"blog-cont1\">
		<div class=\"titulo1\">&raquo;
				<a href=\"".LGlobal::Tipo_URL('com_blog', $articulo['b_id'], $articulo['b_titulo'])."\"><b>".$articulo['b_titulo']."</b></a>
		</div>
		<div class=\"blog-resumen\">
		".Blog::_imagen($articulo['b_img'])."
		".$articulo['b_resumen']."
		</div><br />
		<div class=\"blog-ladoderecho\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['b_fecha'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['b_autor'], true, false, "_blank", "")."<br />
		<b>Categoria:</b> ".Blog::_Categoria($articulo['b_categoria'])."<br>
		<b>Visitas:</b> &nbsp;".Blog::_ContadorVisitas($articulo['b_id'])."
		</div>
		</div>";
	}
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>