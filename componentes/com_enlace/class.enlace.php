<?php
class Enlace{
	function Inicio(){
		echo "<h2>Enlaces</h2>";
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from url_enlaces where url_estado='1' order by url_id DESC";
		$recordsPerPage = 8;//articulos por pagina
		// page number, records per page, sql query, and the mysqli connection object
		$paginator = new AjaxPaginator('1',$recordsPerPage,$query,$conn);
		$paginator->debug = false;
		try{
			$rows = $paginator->paginate();
		}catch (Exception $e){
			echo $e->getMessage();
		}
		?>
		<script type="text/javascript" src="componentes/com_enlace/jquery.paginate.js"></script>
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
        <br class="clear" />
        <div id="listing_container">
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
                ".$articulo['b_resumen']."
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
        ?>
        <br />
        <?php
        $links = $paginator->getLinks();
        echo "<div class='paginator'>".$links;
        echo "<p>Pagina ".$paginator->pageId." de ".$paginator->totalPages . "</p>";
        echo "</div>";
        ?>
        </div>
	<?php
	}
	function Ver($id,$ver){
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$respart = mysql_query("select * from url_enlaces where url_id='".$id."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['url_id']) and $ver==LGlobal::Url_Amigable($articu['url_nombre'])) {
			$suma=$articu['url_visitas']+1;
			$sql = "UPDATE url_enlaces SET url_visitas='".$suma."' WHERE url_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".$articu['url_enlace']."'\", 0) </script>
			<br><br><center><h3>".$articu['url_enlace'].".</h3><h4>Se Abrira el enlace</h4></center>";
			echo "<center>Si no se abrio automaticamente el enlace <a href=\"".$articu['url_enlace']."\">Clic Aqui</a></center>";
		}
		else { echo "<em>No existe el Enlace</em>"; }
	}
}
?>