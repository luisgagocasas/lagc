<?php
session_start();
header('Content-Type: text/html; charset=iso-8859-1');
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.video.php";
require "../../administrador/configuracion.lagc.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 6;//number of records per page
$idcart = $_GET['id'];
$query = "select * from video_comentarios where coment_estado='1' and coment_video='".$_SESSION['temporalpg']."' order by coment_id DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:'';
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']);
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('coment_comentario');
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
foreach($rows as $catego){
	$c=$c+1;
	if($c%2==0) { ?>
		<div class="coment2">
            <div style="float:right;"><?=LGlobal::tiempohace($catego['coment_creado']); ?></div>
            <?=LGlobal::Url_Usuario($catego['coment_usuario'], true, false, "", ""); ?>
            <table width="600" border="0"><tr><td width="55">
            <img src="<?=LGlobal::IMG_Usuario($catego['coment_usuario'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" style="margin:5px 5px 5px 5px;" />
            </td><td valign="top" style="text-align:justify; vertical-align:top;">
            <?="&raquo; ".$catego['coment_comentario']; ?>
            </td></tr></table>
        </div>
        <?php
		}
		else { ?>
        <div class="coment1">
            <div style="float:right;"><?=LGlobal::tiempohace($catego['coment_creado']); ?></div>
            <?=LGlobal::Url_Usuario($catego['coment_usuario'], true, false, "", ""); ?>
            <table width="600" border="0"><tr><td width="55">
            <img src="<?=LGlobal::IMG_Usuario($catego['coment_usuario'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" style="margin:5px 5px 5px 5px;" />
            </td><td valign="top" style="text-align:justify; vertical-align:top;">
            <?="&raquo; ".$catego['coment_comentario']; ?>
            </td></tr></table>
        </div>
        <?php
	}
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>