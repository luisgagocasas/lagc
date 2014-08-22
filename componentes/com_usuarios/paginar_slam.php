<?php
session_start();
header('Content-Type: text/html; charset=iso-8859-1');
include"../../administrador/utilidades/paginacion/ajaxpaginator.class.php";
require "../../administrador/componentes/com_sistema/function.globales.php";
include "class.lagc.php";
require "../../administrador/configuracion.lagc.php";
// instantiate mysqli connection
// CHANGE THESE SETTINGS
$config = new LagcConfig(); //Conexion
$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd) ;
$recPerPage = 10;//number of records per page
$idcart = $_GET['id'];
$query = "select * from usuarios_publicaciones where user_estado='1' and user_para='".$_SESSION['temporalpg']."' order by user_id DESC";
// if there is a a search query
$searchQuery = !empty($_GET['search'])?$searchQuery = $_GET['search']:'';
$pageId= empty($_GET['page'])? 1:$conn->real_escape_string($_GET['page']);
$paginator = new AjaxPaginator($pageId,$recPerPage,$query,$conn);
$paginator->searchQuery = $searchQuery;
// database field to search in
//$pagination->fields = 'name';
// or try array
// passing an array makes the search text to search in the name or the id
$paginator->fields = array('user_comentario');
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
           <div style="float:right;"><?=LGlobal::tiempohace($catego['user_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($catego['user_de'], true); ?></u> <?=Usuarios::_IconoMensaje($catego['user_visiblepor']); ?>
                <table width="340" border="0"><tr><td width="55">
                <?=Usuarios::FotoComent($catego['user_de'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="&raquo; ".$catego['user_comentario']; ?>
                </td></tr>
                <tr>
                    <td colspan="2" align="center">
                    <img src="componentes/com_usuarios/megusta.png" border="0" title="Me Gusta" />
                    <a href="?lagc=com_usuarios&id=<?=$_SESSION['temporalpg']; ?>&ver=<?=$_SESSION['temporalver']; ?>&slam=<?=$catego['user_id']; ?>">Me Gusta [<?=Usuarios::_VerMegustas($catego['user_id'], true); ?>]</a> &nbsp;&nbsp;
                    <img src="componentes/com_usuarios/comentario.png" border="0" title="Comentarios" />
                    <a href="?lagc=com_usuarios&id=<?=$_SESSION['temporalpg']; ?>&ver=<?=$_SESSION['temporalver']; ?>&slam=<?=$catego['user_id']; ?>">Comentarios [0]</a>
                    </td>
                </tr>
                </table>
        </div>
        <?php
		}
		else { ?>
        <div class="coment1">
            <div style="float:right;"><?=LGlobal::tiempohace($catego['user_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($catego['user_de'], true); ?></u> <?=Usuarios::_IconoMensaje($catego['user_visiblepor']); ?>
                <table width="340" border="0"><tr><td width="55">
                <?=Usuarios::FotoComent($catego['user_de'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="&raquo; ".$catego['user_comentario']; ?>
                </td></tr>
                <tr>
                    <td colspan="2" align="center">
                    <img src="componentes/com_usuarios/megusta.png" border="0" title="Me Gusta" />
                    <a href="?lagc=com_usuarios&id=<?=$_SESSION['temporalpg']; ?>&ver=<?=$_SESSION['temporalver']; ?>&slam=<?=$catego['user_id']; ?>">Me Gusta [<?=Usuarios::_VerMegustas($catego['user_id'], true); ?>]</a> &nbsp;&nbsp;
                    <img src="componentes/com_usuarios/comentario.png" border="0" title="Comentarios" />
                    <a href="?lagc=com_usuarios&id=<?=$_SESSION['temporalpg']; ?>&ver=<?=$_SESSION['temporalver']; ?>&slam=<?=$catego['user_id']; ?>">Comentarios [0]</a>
                    </td>
                </tr>
                </table>
        </div>
        <?php
	}
}
echo "<div class='paginator'>".$paginator->getLinks();
echo "<br /><p>Pagina ".$paginator->pageId." de ".$paginator->totalPages."</p>". "</div>";
?>