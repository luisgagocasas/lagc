<?php
/*
Creador de este codigo Luis Gago Casas para cualquier consulta en luisgago@lagc-peru.com
2012 Proyecto Lagc Perú
*/
class Blog {
	function AjaxInicio(){
		Blog::LineaTiempo('');
		echo "<h2>Blog</h2>";
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from blog_articulos where b_activo='1' order by b_id DESC";
		$recordsPerPage = 10;//articulos por pagina
		// page number, records per page, sql query, and the mysqli connection object
		$paginator = new AjaxPaginator('1',$recordsPerPage,$query,$conn);
		$paginator->debug = false;
		try{
			$rows = $paginator->paginate();
		}catch (Exception $e){
			echo $e->getMessage();
		}
		?>
		<script type="text/javascript" src="componentes/com_blog/jquery.paginate.js"></script>
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
		echo "\n<div class=\"blog-cont2\">
		<div class=\"titulo2\">&raquo;
				<a href=\"".LGlobal::Tipo_URL('com_blog', $articulo['b_id'], $articulo['b_titulo'])."\"><b>".$articulo['b_titulo']."</b></a>
		</div>
		<hr style=\"border: 0px;\">
		<div class=\"blog-resumen2\">
		".Blog::_imagen($articulo['b_img'])."
		".$articulo['b_resumen']."
		</div><br />
		<div class=\"blog-ladoderecho2\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['b_fecha'])."<br />
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['b_autor'], true, false, "_blank", "")."<br />
		<b>Categoria:</b> ".Blog::_Categoria($articulo['b_categoria'])."<br />
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
		<b>Categoria:</b> ".Blog::_Categoria($articulo['b_categoria'])."<br />
		<b>Visitas:</b> &nbsp;".Blog::_ContadorVisitas($articulo['b_id'])."
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
	function Ver($articulo, $ver) { $config = new LagcConfig(); ?>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=<?=$config->lagcfbid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php
		$respart = mysql_query("select * from blog_articulos where b_id='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['b_id']) and $ver==LGlobal::Url_Amigable($articu['b_titulo'])) {
			if ($articu['b_activo']!=2) {
				Blog::LineaTiempo($articu['b_categoria']);
				echo "<h2>".$articu['b_titulo']."</h2>\n";
				if ($articu['b_resumen_activar']=="1") {
					echo "<div class=\"blog-texto-descripcion\">";
					echo Blog::_imagen($articu['b_img']);
					echo "<p><b>".$articu['b_resumen']."</b></p>\n";
					echo "</div>";
				}
				?>
				<!-- Publicidad 1 -->
				<center>
				<script type="text/javascript"><!--
				google_ad_client = "ca-pub-8621184441253236";
				/* Portuhermana - 468x15 */
				google_ad_slot = "5924606100";
				google_ad_width = 468;
				google_ad_height = 15;
				//-->
				</script>
				<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
				</center>
				<?php
				echo "<div class=\"blog-texto-articulo\">";
				echo $articu['b_contenido'];
				echo "</div>";
				?>
				<!-- Publicidad 2 -->
				<center>
				<script type="text/javascript"><!--
				google_ad_client = "ca-pub-8621184441253236";
				/* Portuhermana - 468x60 */
				google_ad_slot = "3640716870";
				google_ad_width = 468;
				google_ad_height = 60;
				//-->
				</script>
				<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
				</center>
				<?php
				echo Blog::OtrosArticulos($articu['b_categoria'], $articu['b_autor'], $articu['b_fecha'], $articu['b_palabras']); ?>
				<div class="fb-comments" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver']); ?>" data-num-posts="10" data-width="645"></div>
				<?php
				//echo Blog::FormComent($articu['b_form_coment_act'], $articu['b_id'], $articu['b_autor']);
				//echo Blog::Comentarios($articu['b_id'], $articu['b_coment_act'], 6);
			}
			else { echo "<em>Este articulo esta desactivado</em>"; }
		}
		else { echo "<em>No existe el articulo</em>"; }
	}
	function Comentarios($categoria, $activo, $paginar) {
		if ($activo=="1") {
			$_SESSION['temporalpg'] = $categoria; //guardo en tmp el id del articulo
			include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from blog_comentarios where comen_aprobado='1' and comen_articulo=".$categoria." order by comen_id DESC";
		$recordsPerPage = $paginar;//articulos por pagina
		// page number, records per page, sql query, and the mysqli connection object
		$paginator = new AjaxPaginator('1',$recordsPerPage,$query,$conn);
		$paginator->debug = false;
		try{
			$rows = $paginator->paginate();
		}catch (Exception $e){
			echo $e->getMessage();
		}
		?>
		<script type="text/javascript" src="componentes/com_blog/jquery.paginacomen.js"></script>
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
        <br class="clear" />
<div id='search-box' class="search-box">
<form action="" method="get">
<!-- <input id="search" type="text" class="search" /> -->
<?php
$getArray = array();
parse_str($_SERVER['QUERY_STRING'],$getArray);
foreach($getArray as $key=>$value){
	echo "<input type='hidden' name='{$key}' id='{$key}' value='{$value}' />";
}
?>
<!-- <input id="srch_btn" type="submit" value="Filtrar" class="button" /> -->
</form>
</div>
<br class="clear" />
<div id="listing_container">
<?php
foreach($rows as $catego){
	$c=$c+1;
	if($c%2==0) { ?>
		<div class="coment2">
        <div style="float:right;"><?=LGlobal::tiempohace($catego['comen_fcreado']); ?></div>
        <?=LGlobal::Url_Usuario($catego['comen_usuario'], true, false, "", ""); ?>
        <table width="600" border="0"><tr><td width="55">
        <img src="<?=LGlobal::IMG_Usuario($catego['comen_usuario'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" style="margin:5px 5px 5px 5px;" />
        </td><td valign="top" style="text-align:justify; vertical-align:top;">
        <?="&raquo; ".$catego['comen_comentario']; ?>
        </td></tr></table>
        </div>
        <?php
    }
    else { ?>
        <div class="coment1">
        <div style="float:right;"><?=LGlobal::tiempohace($catego['comen_fcreado']); ?></div>
        <?=LGlobal::Url_Usuario($catego['comen_usuario'], true, false, "", ""); ?>
        <table width="600" border="0"><tr><td width="55">
        <img src="<?=LGlobal::IMG_Usuario($catego['comen_usuario'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" style="margin:5px 5px 5px 5px;" />
        </td><td valign="top" style="text-align:justify; vertical-align:top;">
        <?="&raquo; ".$catego['comen_comentario']; ?>
        </td></tr></table>
        </div>
        <?php
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
		else { echo "<em>Comentarios Ocultos</em>"; }
	}
	function FotoComent($id, $vertitu) {
		$config = new LagcConfig();
		$rspuserc = mysql_query("select * from usuarios where id='".$id."'"); $userc = mysql_fetch_array($rspuserc);
		if ($vertitu==true) {
			echo $userc['nombres'].", ".$userc['apellidos']." dijo:<br>";
		}
		else {
			if (!empty($userc['imagen'])) {
				echo "<a href=\"".LGlobal::Tipo_URL('com_usuarios', $userc['id'], $userc['usuario'])."\"><img align=\"texttop\" src=\"".$config->lagcurl."componentes/com_usuarios/imagenes/thumb/".$userc['imagen']."\" width=\"50\" height=\"50\" title=\"".$userc['nombres'].", ".$userc['apellidos']."\" border=\"0\" /></a>\n";
			}
			else {
				echo "<a href=\"".LGlobal::Tipo_URL('com_usuarios', $userc['id'], $userc['usuario'])."\"><img align=\"texttop\" src=\"".$config->lagcurl."componentes/com_usuarios/imagenes/thumb/no_disponible.jpg\" width=\"50\" height=\"50\" title=\"".$userc['nombres'].", ".$userc['apellidos']."\" border=\"0\" /></a>\n";
			}
		}
	}
	function OtrosArticulos($idcategoria, $iduser, $fecha, $palabras){
		$config = new LagcConfig();
		$palabra = str_replace(" ", "", $palabras);
		$palabra = explode(',', $palabra);
		?>
    <br /><br />
    <div style="height:225px;">
    	<div class="blog-url-relacionados">
        <h6 style="color:#666">Otros art&iacute;culos relacionados</h6>
        <ul>
        <?php
		$rspart = mysql_query("select * from blog_articulos where b_categoria='".$idcategoria."' and b_id!='".$_GET['id']."' ORDER BY RAND() LIMIT 4");
		while($enlaces = mysql_fetch_array($rspart)) {
			echo "<li style=\"list-style-type:none;\">&deg; <a href=\"".LGlobal::Tipo_URL('com_blog', $enlaces['b_id'], $enlaces['b_titulo'])."\">".substr($enlaces['b_titulo'], 0, 50)."</a></li>\n";
        } ?>
        </ul>
        </div>
        <div style="width: 72px; position: absolute; text-align:center; float: right; margin: 5px 433px; border:0px #000 solid; overflow:hidden; padding:0px 0px; line-height:5px;">
        <g:plusone href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver']);?>" size="tall"></g:plusone><br /><br />
        <a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="<?=$config->lagcnombre; ?>" data-text="<?=$config->lagctitulo; ?>">Tweet</a><br /><br />
        <div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div>
        </div>
        <div class="blog-creado-por">
        <h6 style="color:#666">Creado por</h6>
        <?=Blog::ExisteUserImg($iduser, $fecha); ?>
        </div>
        <div class="blog-tags-articulo">
        <span style="color:#666; font-weight:bold;">Palabras Clave</span>:
		<?php if(!empty($palabra[0])){ echo "<a href=\"?lagc=com_blog&id=".time()."&tags=".$palabra[0]."\" class=\"blog-palabra\">".$palabra[0]."</a>"; } ?>
		<?php if(!empty($palabra[1])){ echo ", <a href=\"?lagc=com_blog&id=".time()."&tags=".$palabra[1]."\" class=\"blog-palabra\">".$palabra[1]."</a>"; } ?>
		<?php if(!empty($palabra[2])){ echo ", <a href=\"?lagc=com_blog&id=".time()."&tags=".$palabra[2]."\" class=\"blog-palabra\">".$palabra[2]."</a>"; } ?>
		<?php if(!empty($palabra[3])){ echo ", <a href=\"?lagc=com_blog&id=".time()."&tags=".$palabra[3]."\" class=\"blog-palabra\">".$palabra[3]."</a>"; } ?>
        </div>
    </div>
    <?php
	}
	function ExisteUserImg($id, $fecha){
		$config = new LagcConfig();
		if (!empty($id)) {
			$rspuser = mysql_query("select * from usuarios where id='".$id."'"); $usuario = mysql_fetch_array($rspuser); ?>
            <table border="0">
            <tr><td>&deg; <a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuario['id'], $usuario['usuario']); ?>"><?=$usuario['nombres'].", ".$usuario['apellidos']; ?></a></td></tr>
            <tr><td>&nbsp;&nbsp;<img src="<?=LGlobal::IMG_Usuario($usuario['id'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" height="70" border="0" /></td></tr>
            <tr><td>&deg; <strong>Creado</strong></td></tr>
            <tr><td>&nbsp;&nbsp;<?=LGlobal::tiempohace($fecha); ?></td></tr>
            <tr><td>&deg; <strong>Visitas</strong></td></tr>
            <tr>
            <td>&nbsp;&nbsp;<?=Blog::_ContadorVisitasArticulo($_GET['id']); ?></td>
            </tr>
            </table>
            <?php
		}
		else {
			echo "<em>Usuario no existe</em>";
		}
	}
	function FormComent($activo, $id, $creadorid) { $config = new LagcConfig();
		if ($activo==1) { ?>
        <br /><br />
        <div style="background:#FFF; height:auto;">
        <div class="blog-dejacomentario">Dejanos tu Comentario ...</div>
        <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
        <div style="margin:10px 10px;">
        <?php $rspuserc = mysql_query("select * from usuarios where id='".$_COOKIE["user_lagc"]."'"); $userc = mysql_fetch_array($rspuserc); ?>
        <?php echo "Hola, ".$userc['nombres'].", ".$userc['apellidos']."<br>"; ?>
        <?php if (!$_POST['tmptxt']) { ?>
        <script>
		function revisar() {
			if(comentariolagc.comenlagc.value.length < 4) { alert('Escribe un comentario'); comentariolagc.comenlagc.focus(); return false; }
			if(comentariolagc.tmptxt.value.length < 4) { alert('Ingrese el codigo de seguridad'); comentariolagc.tmptxt.focus(); return false; }
		}
		</script>
        <script type="text/javascript">
		function limita(elEvento, maximoCaracteres, nombre) {
		  var elemento = document.getElementById(nombre);
		  // Obtener la tecla pulsada
		  var evento = elEvento || window.event;
		  var codigoCaracter = evento.charCode || evento.keyCode;
		  // Permitir utilizar las teclas con flecha horizontal
		  if(codigoCaracter == 37 || codigoCaracter == 39) {
			return true;
		  }
		  // Permitir borrar con la tecla Backspace y con la tecla Supr.
		  if(codigoCaracter == 8 || codigoCaracter == 46) {
			return true;
		  }
		  else if(elemento.value.length >= maximoCaracteres ) {
			return false;
		  }
		  else {
			return true;
		  }
		}
		function actualizaInfo(maximoCaracteres, nombre, notificar) {
		  var elemento = document.getElementById(nombre);
		  var info = document.getElementById(notificar);

		  if(elemento.value.length >= maximoCaracteres ) {
			info.innerHTML = "<strong>Llegastes al limite</strong>: "+maximoCaracteres+" caracteres";
		  }
		  else {
			info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres";
		  }
		}
		</script>
        <form name="comentariolagc" action="" method="post" onSubmit="return revisar()">
        <table width="540" height="60" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top" width="50" style="vertical-align:top;">
            <a href="<?=LGlobal::Tipo_URL('com_usuarios', $userc['id'], $userc['usuario']); ?>">
            <img src="<?=LGlobal::IMG_Usuario($_COOKIE["user_lagc"], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" height="50" border="0" /></a>
            </td>
            <td valign="top" width="250">
            <textarea tabindex="1" id="comentario" class="blog-frm-textarea" onkeypress="return limita(event, 255, 'comentario');" onkeyup="actualizaInfo(255, 'comentario', 'info')" name="comenlagc" cols="40" rows="3"></textarea>
            <div style="text-align:right;"><div id="info">M&aacute;ximo 255 caracteres</div></div>
            </td>
            <td valign="middle" align="center" style="vertical-align:top;">
            <img src="administrador/utilidades/exampleView.php" width="68" height="25" style="margin:-7px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" /><br />
            <input name="tmptxt" tabindex="2" title="Copiar codigo aqui" type="text" size="5" class="blog-frm-code" autocomplete="off" maxlength="5" /></td>
            <td valign="middle" align="center" style="vertical-align:top;">
			<?php if ($_COOKIE["tipo_lagc"]==3) { ?><input name="publicarfb" type="checkbox" title="Publicar tambien en Facebook" checked="checked" value="1" /><img src="componentes/com_blog/imagenes/fb.png" border="0" /><br /><?php } ?>
            <input type="submit" tabindex="3" value="Enviar" class="blog-frm-boton" /></td>
          </tr>
        </table>
        </form>
        <?php } else {
			include 'administrador/utilidades/Captcha.php';
			$options['sessionName'] = 'tmptxt';
			$options['fontPath'] = 'administrador/utilidades';
			$options['fontFile'] = 'anonymous.gdf';
			$options['imageWidth'] = 150;
			$options['imageHeight'] = 50;
			$options['allowedChars'] = '1234567890';
			$options['stringLength'] = 6;
			$options['charWidth'] = 40;
			$options['blurRadius'] = 3.0;
			$options['secretKey'] = 'mySecRetkEy';

			$captcha = new Captcha($options);
			if ($captcha->isKeyRight($_POST['tmptxt'])) {
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				if ($_COOKIE["tipo_lagc"]=="1" or $_COOKIE["user_lagc"]==$creadorid) {
					$sql = "INSERT INTO blog_comentarios (comen_articulo, comen_comentario, comen_fcreado, comen_usuario, comen_aprobado) VALUES ('".$_GET['id']."', '".$_POST['comenlagc']."', '".time()."', '".$_COOKIE["user_lagc"]."', '1')";
				}
				else {
					$sql = "INSERT INTO blog_comentarios (comen_articulo, comen_comentario, comen_fcreado, comen_usuario, comen_aprobado) VALUES ('".$_GET['id']."', '".$_POST['comenlagc']."', '".time()."', '".$_COOKIE["user_lagc"]."', '2')";
				}
				mysql_query($sql,$con);

				$rptart = mysql_query("select * from blog_articulos where b_id='".$_GET['id']."'");
				$fbmuro = mysql_fetch_array($rptart);
				?>
				<script type="text/javascript" src="<?=$config->lagcurl; ?>/componentes/com_blog/simpleFacebookGraph.js"></script>
				<script>
				var publish = function () {
				    fb.publish({
				      message : "<?=$_POST['comenlagc']; ?>",
				      picture : "<?=$config->lagcurl.Blog::__imagen($fbmuro['b_img']); ?>",
				      link : "<?=$config->lagcurl.LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver']); ?>",
				      name : "<?=$fbmuro['b_titulo']; ?>",
				      description : "<?=$fbmuro['b_resumen']; ?>"
				    },function(published){
				      if (published)
				       alert("publicado! en Facebook");
				      else
				       alert("No publicado :(, seguramente porque no estas identificado o no diste permisos");
				    });
				}
				</script>
				<?php
				if($_POST['publicarfb']==1) { echo "<script type=\"text/javascript\"> window.onload=publish; </script>"; }
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver'])."'\", 10000) </script>";
				echo "<br>
				<center>El comentario Fue enviado correctamente. espere su aprovacion por el administrador.</center><br><br>";
			}
			else {	echo "Codigo de seguridad Incorrecto. <a href=\"".LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver'])."\">Volver al Articulo</a>"; echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_blog', $_GET['id'], $_GET['ver'])."'\", 4000) </script>"; }
		} ?>
        </div>
        <?php } else { ?>
        <div style="margin:10px 10px;">
        identificate para comentar
        </div>
        <?php } ?>
        </div>
        <?php }
		else { echo "<br>*<em>Formulario Cerrado</em>"; }
	}
	function LineaTiempo($categoria) {
		if(!empty($categoria)) {
			if (!empty($_GET['id']) and !empty($_GET['ver'])) { /*primer caso*/
			$rsparticulo = mysql_query("select * from blog_categorias where cat_id='".$categoria."'"); $articu = mysql_fetch_array($rsparticulo);
				if (!empty($articu['cat_nombre'])) {
					echo "<h2><a href=\"".LGlobal::Tipo_URL('com_blog','','')."/\">Blog</a> &raquo; <a href=\"?lagc=com_blog&id=categorias\">Categorias</a> &raquo; <a href=\"".LGlobal::Tipo_URL_CATEG('com_blog',$articu['cat_id'],$articu['cat_nombre'])."\">".$articu['cat_nombre']."</a></h2>";
				}
				else { echo "<em>No existe la categoria para este articulo</em>"; }
			}
		}
		else { echo "<a href=\"?lagc=com_blog&id=categorias\">+ Categorias</a>"; }
	}
	function Categorias($paginar){ ?>
    <h2><a href="<?=LGlobal::Tipo_URL('com_blog','',''); ?>/">Blog</a> &raquo; Categorias</h2>
    <?php
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from blog_categorias where cat_activado='1' order by cat_id ASC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('');
		$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
		$paging->mostrarPrimera("|<", true);
		$paging->mostrarUltima(">|", true);
		$paging->mostrarAnterior(false);
		$paging->mostrarSiguiente(false);
		$paging->mostrarActual("<span class=\"navthis\"> {n} </span>");
		$paging->nombreVariable("verPagina");
		$paging->ejecutar();
		while($catego = $paging->fetchResultado()) {
			$c=$c+1;
			if($c%2==0) {
				echo "\n<div class=\"blog-cont2\">
					<div class=\"titulo2\">
						&raquo; <a href=\"".LGlobal::Tipo_URL_CATEG('com_blog',$catego['cat_id'],$catego['cat_nombre'])."\" title=\"".$catego['cat_descripcion']."\">".$catego['cat_nombre']."</a><hr style=\"border: 0px;\">
					</div>
					<div class=\"blog-resumen2\">
					".$catego['cat_descripcion']."
					</div><br />
					<div class=\"blog-ladoderecho2\">
					<b>Articulos</b>: ".Blog::__ContarArticulosCat($catego['cat_id'])."<br><br>
					<center><a href=\"".LGlobal::Tipo_URL_CATEG('com_blog',$catego['cat_id'],$catego['cat_nombre'])."\" title=\"".$catego['cat_descripcion']."\">Ver Articulos...</a>
					</center>
					</div>
				</div>";
			}
			else {
				echo "\n<div class=\"blog-cont1\">
					<div class=\"titulo2\">
						&raquo; <a href=\"".LGlobal::Tipo_URL_CATEG('com_blog',$catego['cat_id'],$catego['cat_nombre'])."\" title=\"".$catego['cat_descripcion']."\">".$catego['cat_nombre']."</a><hr style=\"border: 0px;\">
					</div>
					<div class=\"blog-resumen\">
					".$catego['cat_descripcion']."
					</div><br />
					<div class=\"blog-ladoderecho\">
					<b>Articulos</b>: ".Blog::__ContarArticulosCat($catego['cat_id'])."<br><br>
					<center><a href=\"".LGlobal::Tipo_URL_CATEG('com_blog',$catego['cat_id'],$catego['cat_nombre'])."\" title=\"".$catego['cat_descripcion']."\">Ver Articulos...</a>
					</center>
					</div>
				</div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function __ContarArticulosCat($id){
		$final = 0;
		$rptcatar = mysql_query("select b_categoria from blog_articulos where b_categoria='".$id."'");
		$final = mysql_num_rows($rptcatar);
		return $final;
	}
	function VerCategoria($id, $nombre, $paginar) {
		$rspcate = mysql_query("select * from blog_categorias where cat_id='".$id."'"); $categori = mysql_fetch_array($rspcate);
		if (!empty($categori['cat_id']) and $nombre==LGlobal::Url_Amigable($categori['cat_nombre'])) {
			echo "<h2><a href=\"".LGlobal::Tipo_URL('com_blog','','')."\">Blog</a> &raquo; <a href=\"?lagc=com_blog&id=categorias\">Categorias</a> &raquo; ".$categori['cat_nombre']."</h2>";
			echo "<h3>Articulos de ".$categori['cat_nombre']."</h3>";
			if (!empty($categori['cat_descripcion'])) {	echo "<div class=\"blog-descropcop\">".$categori['cat_descripcion']."</div>"; }
			include "administrador/utilidades/PHPPaging.lib.php";
			$paging = new PHPPaging;
			$paging->agregarConsulta("select * from blog_articulos where b_activo='1' and b_categoria='".$categori['cat_id']."' order by b_id DESC");
			$paging->porPagina($paginar);
			$paging->paginasAntes(4, 10, 30);
			$paging->paginasDespues(4, 10, 30);
			$paging->linkClase('nav');
			$paging->linkSeparador(false);
			$paging->linkSeparadorEspecial('...');
			$paging->linkAgregar('');
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
					echo "\n<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_blog', $articulo['b_id'], $articulo['b_titulo'])."\" title=\"".$articulo['b_resumen']."\"><b>".$articulo['b_titulo']."</b></a><hr style=\"border: 0px;\">
					<div class=\"blog-resumen2\">
					".Blog::_imagen($articulo['b_img'])."
					".$articulo['b_resumen']."
					</div><br />
					<div class=\"blog-ladoderecho2\">
					<b>Creado:</b> ".LGlobal::tiempohace($articulo['b_fecha'])."<br>
					<b>Visitas:</b> &nbsp;".Blog::_ContadorVisitas($articulo['b_id'])."<br>
					<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['b_autor'], true, false, "_blank", "")."
					</div>
					</div>";
				}
				else {
					echo "\n<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_blog', $articulo['b_id'], $articulo['b_titulo'])."\" title=\"".$articulo['b_resumen']."\"><b>".$articulo['b_titulo']."</b></a><hr style=\"border: 0px;\">
					<div class=\"blog-resumen\">
					".Blog::_imagen($articulo['b_img'])."
					".$articulo['b_resumen']."
					</div><br />
					<div class=\"blog-ladoderecho\">
					<b>Creado:</b> ".LGlobal::tiempohace($articulo['b_fecha'])."<br>
					<b>Visitas:</b> &nbsp;".Blog::_ContadorVisitas($articulo['b_id'])."<br>
					<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['b_autor'], true, false, "_blank", "")."
					</div>
					</div>";
				}
			}
			echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
		}
		else { echo "<em>La categoria no existe</em>"; }
	}
	function VerTags($palabra, $paginar) {
		echo "<h2>Articulos con la Palabra: ".$palabra."</h2>";
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from blog_articulos WHERE b_activo='1' and b_palabras LIKE '%$palabra%' OR b_contenido LIKE '%$palabra%' order by b_id ASC");
		$paging->porPagina($paginar);
		$paging->paginasAntes(4, 10, 30);
		$paging->paginasDespues(4, 10, 30);
		$paging->linkClase('nav');
		$paging->linkSeparador(false);
		$paging->linkSeparadorEspecial('...');
		$paging->linkAgregar('');
		$paging->linkTitulo('Pagina %1$s: Ver registros del %2$s al %3$s (Total: %4$s)');
		$paging->mostrarPrimera("|<", true);
		$paging->mostrarUltima(">|", true);
		$paging->mostrarAnterior(false);
		$paging->mostrarSiguiente(false);
		$paging->mostrarActual("<span class=\"navthis\"> {n} </span>");
		$paging->nombreVariable("verPagina");
		$paging->ejecutar();
		while($catego = $paging->fetchResultado()) {
			$c=$c+1;
			if($c%2==0) {
				echo "<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_blog', $catego['b_id'], $catego['b_titulo'])."\" title=\"".$catego['cat_descripcion']."\"><u>".$catego['b_titulo']."</u></a><br>".$catego['b_resumen']." <div style=\"float:right;\"><a href=\"".LGlobal::Tipo_URL('com_blog', $catego['b_id'], $catego['b_titulo'])."\" title=\"".$catego['b_resumen']."\">Leer mas...</a></div><br></div>";
			}
			else {
				echo "<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_blog', $catego['b_id'], $catego['b_titulo'])."\" title=\"".$catego['cat_descripcion']."\"><u>".$catego['b_titulo']."</u></a><br>".$catego['b_resumen']." <div style=\"float:right;\"><a href=\"".LGlobal::Tipo_URL('com_blog', $catego['b_id'], $catego['b_titulo'])."\" title=\"".$catego['b_resumen']."\">Leer mas...</a></div><br></div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function _ContadorVisitasArticulo($idart){
		$visitas = 0;
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$IP = $_SERVER['REMOTE_ADDR'];
		$hora = date("h:i:s");
		$segundos = time();
		$articulo = $idart;
		$can = "18000";
		$resta = $segundos-$can;
		//se asignan la variables
		$sql = "SELECT segundos, IP, articulo ";
		$sql.= "FROM blog_visitas WHERE segundos >= $resta AND IP LIKE '$IP' AND articulo=$articulo";
		$es = mysql_query($sql, $con);
		//se buscan los registros que num de seg mayor a num de seg hace una hora e IP
		if(mysql_num_rows($es)>0) {
			//no se cuenta la visita
		}
		else {
			$sql = "INSERT INTO blog_visitas (IP, articulo, hora, segundos) ";
			$sql.= "VALUES ('$IP','$idart','$hora','$segundos')";
			$es = mysql_query($sql, $con);
		}
		//creamos el condicionamiendo para loguearlo o no.
		$sql = "SELECT * ";
		$sql.= "FROM blog_visitas WHERE articulo='$articulo'";
		$es = mysql_query($sql, $con);
		$visitas = mysql_num_rows($es);
		return $visitas;
	}
	function _ContadorVisitas($id){
		$rptvisitas = mysql_query("select * from blog_visitas where articulo='".$id."'");
		$final = mysql_num_rows($rptvisitas);
		return $final;
	}
	function _Categoria($categoria) {
		if(!empty($categoria)) {
			$rsparticulo = mysql_query("select * from blog_categorias where cat_id='".$categoria."'");
			$articu = mysql_fetch_array($rsparticulo);
				if (!empty($articu['cat_nombre'])) {
					$final = "<a href=\"?lagc=com_blog&id=".$articu['cat_id']."&categoria=".LGlobal::Url_Amigable($articu['cat_nombre'])."\">".$articu['cat_nombre']."</a>";
				}
				else { $final = "Sin Categoria"; }
		}
		else { $final = "Sin Categoria"; }
		return $final;
	}
	function _imagen($val1){
		if(!empty($val1)){ $final = "<img src=\"componentes/com_imagenes/thumbnails/".$val1."\" border=\"0\">"; }
		else { $final = "<img src=\"componentes/com_blog/imagenes/sin_imagen.png\" width=\"100\" style=\"padding: 0px 4px 2px 2px;\" border=\"0\">"; }
		return $final;
	}
	function __imagen($val1){
		if(!empty($val1)){ $final = "componentes/com_imagenes/thumbnails/".$val1; }
		else { $final = "componentes/com_blog/imagenes/sin_imagen.png"; }
		return $final;
	}
	function Redactar(){ ?>
    	<h2>Redactar Articulo</h2>
    	<?php
		if (empty($_POST['titulo'])) {
			LGlobal::Editor("administrador/");
			include "componentes/com_blog/crear_blog.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			if($_COOKIE["tipo_lagc"]=="1" or $_COOKIE["user_lagc"]=="5" or $_COOKIE["user_lagc"]=="9"){
				$sql = "INSERT INTO blog_articulos (b_autor, b_titulo, b_resumen, b_img, b_resumen_activar, b_contenido, b_categoria, b_palabras, b_fecha, b_form_coment_act, b_coment_act, b_activo) VALUES ('".$_COOKIE["user_lagc"]."', '".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['img1']."', '1', '".$_POST['contenido']."', '".$_POST['categoria']."', '".$_POST['palabras']."', '".time()."', '1', '1', '1')";
			}
			else {
				$sql = "INSERT INTO blog_articulos (b_autor, b_titulo, b_resumen, b_img, b_resumen_activar, b_contenido, b_categoria, b_palabras, b_fecha, b_form_coment_act, b_coment_act, b_activo) VALUES ('".$_COOKIE["user_lagc"]."', '".$_POST['titulo']."', '".$_POST['resumen']."', '".$_POST['img1']."', '1', '".$_POST['contenido']."', '".$_POST['categoria']."', '".$_POST['palabras']."', '".time()."', '1', '1', '2')";
			}
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&componente=blog'\", 1500) </script>
			<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Se creo correctamente...<br />Espere su Aprobacion que sera notificado por E-mail</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $ver){
		$respart = mysql_query("select * from blog_articulos where b_id='".$id."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['b_id']) and $ver==LGlobal::Url_Amigable($articu['b_titulo']) and $articu['b_autor']==$_COOKIE["user_lagc"]) { ?>
	    	<h2>Editar Articulo: <strong><?=$articu['b_titulo']; ?></strong></h2>
	    	<?php
			if (empty($_POST['titulo'])) {
				LGlobal::Editor("administrador/");
				include "componentes/com_blog/editar_blog.tpl";
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);

				$sql = "UPDATE blog_articulos SET b_titulo='".$_POST['titulo']."', b_resumen='".$_POST['resumen']."', b_img='".$_POST['img1']."', b_contenido='".$_POST['contenido']."', b_categoria='".$_POST['categoria']."', b_palabras='".$_POST['palabras']."', b_fechamodi='".time()."' WHERE b_id='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");

				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&componente=blog'\", 4000) </script>
				<br><br><center><h3>".$_POST['titulo'].".</h3><h4>Fue Editado correctamente...</h4></center>";
				mysql_close($con);
			}
		}
		else {
			echo "Este articulo no existe o usted no es el que a creado este articulo.";
		}
	}
}
?>