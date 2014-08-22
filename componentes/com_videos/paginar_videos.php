<?php
header('Content-Type: text/html; charset=iso-8859-1');
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.video.php";
require "../../administrador/configuracion.lagc.php";
 include "youtube.class.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 10;//number of records per page
$query = "select * from video_videos where vi_estado='1' order by vi_id DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:'';
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']);
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('vi_titulo', 'vi_descripcion');
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
		echo "\n<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $articulo['vi_id'], $articulo['vi_titulo'])."\"><b>".substr($articulo['vi_titulo'], 0, 45)."</b></a><br>
		<div class=\"blog-resumen2\">
		<img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
		</div>
		<div class=\"blog-ladoderecho2\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['vi_creado'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['vi_autor'], true, false, "", "")."<br />
		<b>Categoria:</b> ".Videos::_Categoria($articulo['vi_categoria'])."
		</div>
		</div>";
	}
	else {
		echo "\n<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $articulo['vi_id'], $articulo['vi_titulo'])."\"><b>".substr($articulo['vi_titulo'], 0, 45)."</b></a><br>
		<div class=\"blog-resumen\">
		<img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
		</div>
		<div class=\"blog-ladoderecho\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['vi_creado'])."<br>
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['vi_autor'], true, false, "", "")."<br />
		<b>Categoria:</b> ".Videos::_Categoria($articulo['vi_categoria'])."
		</div>
		</div>";
	}
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>