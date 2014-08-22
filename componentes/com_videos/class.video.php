<?php
class Videos{
	function AjaxInicio(){
		echo "<h2>Videos</h2>";
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from video_videos where vi_estado='1' order by vi_id DESC";
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
		<script type="text/javascript" src="componentes/com_videos/jquery.paginate.js"></script>
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
		echo "\n<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $articulo['vi_id'], $articulo['vi_titulo'])."\"><b>".substr($articulo['vi_titulo'], 0, 45)."</b></a><br>
		<div class=\"blog-resumen2\">
		<img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
		</div>
		<div class=\"blog-ladoderecho2\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['vi_creado'])."<br />
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['vi_autor'], true, false, "", "")."<br />
		<b>Categoria:</b> ".Videos::_Categoria($articulo['vi_categoria'])."
		</div>
		</div>";
	}
	else {
		echo "\n<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $articulo['vi_id'], $articulo['vi_titulo'])."\"><b>".substr($articulo['vi_titulo'], 0, 45)."</b></a><br />
		<div class=\"blog-resumen\">
		<img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
        <img src=\"http://i.ytimg.com/vi/".$articulo['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
		</div>
		<div class=\"blog-ladoderecho\">
		<b>Creado:</b> ".LGlobal::tiempohace($articulo['vi_creado'])."<br />
		<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($articulo['vi_autor'], true, false, "", "")."<br />
		<b>Categoria:</b> ".Videos::_Categoria($articulo['vi_categoria'])."
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
	function _Categoria($categoria) {
		if(!empty($categoria)) {
			$rsparticulo = mysql_query("select * from video_categorias where vi_ca_id='".$categoria."'");
			$articu = mysql_fetch_array($rsparticulo);
				if (!empty($articu['vi_ca_titulo'])) {
					$final = "<a href=\"?lagc=com_videos&id=".$articu['vi_ca_id']."&categoria=".LGlobal::Url_Amigable($articu['vi_ca_titulo'])."\">".$articu['vi_ca_titulo']."</a>";
				}
				else { echo "Sin Categoria"; }
		}
		else { echo "Sin Categoria"; }
		return $final;
	}
	function Ver($articulo, $ver) { $config = new LagcConfig();
		$respart = mysql_query("select * from video_videos where vi_id='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['vi_id']) and $ver==LGlobal::Url_Amigable($articu['vi_titulo'])) {
			echo "<h2>".$articu['vi_titulo']."</h2>\n"; ?><br />
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=117397565009018";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
            <span style="font-size:14px; color:#999; font-weight:bold;">&laquo; <a href="<?=LGlobal::Tipo_URL('com_videos','',''); ?>">Ver todos los Videos</a></span><br />
            <center>
            <object style="height: 450px; width: 650px">
            <param name="movie" value="https://www.youtube.com/v/<?=$articu['vi_enlace']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0">
            <param name="allowFullScreen" value="true">
            <param name="allowScriptAccess" value="always">
            <embed src="https://www.youtube.com/v/<?=$articu['vi_enlace']; ?>?version=3&feature=player_embedded&autohide=1&autoplay=0&controls=0&enablejsapi=1&fs=1&loop=1&rel=0" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="650" height="450">
            </object></center>
            <center><span style="font-size:10px; color:#999;">Doble Clic para la pantalla completa | Clic para poner Pausa</span></center><br />
            <center>
            <table align="center" border="0" style="margin:0px auto;">
			<tr>
				<td><div style="margin:-12px 30px;"></div><g:plusone href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver']);?>" size="tall"></g:plusone></td>
				<td><div style="margin:0px 40px;"></div><a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="portuhermana" data-text="#portuhermana">Tweet</a></td>
				<td><div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false"></div></td>
				<td><div style="margin:0px 5px;"><div class="fb-like" data-send="false" data-layout="box_count" data-width="80" data-show-faces="false" data-action="recommend"></div></div>
				</td>
			</tr>
			</table>
			</center>
			<br />
			<center>
			<table width="650">
				<tr>
					<td valign="top" style="text-align:justify; vertical-align:top;">
						<div class="video-url-relacionados">
							<h6 style="color:#666">Descripci&oacute;n</h6>
							<div class="descripcion"><?=$articu['vi_descripcion']; ?></div>
						</div>
					</td>
					<td valign="top" style="text-align:justify; vertical-align:top;">
						<div class="video-creado-por">
						<h6 style="color:#666">Creado por</h6>
						<?php Videos::ExisteUserImg($articu['vi_autor'], $articu['vi_creado']); ?>
						</div>
					</td>
				</tr>
			</table>
			</center>
    	<?php
			echo Videos::FormComent($articu['vi_comentarios'], $articu['vi_id']);
			echo Videos::Comentarios($articu['vi_id'], 6);
			echo "<br /><br /><br /><br />";
		}
		else { echo "<em>No existe el video</em>"; }
	}
	function ExisteUserImg($id, $fecha){
		$config = new LagcConfig();
		if (!empty($id)) {
			$rspuser = mysql_query("select * from usuarios where id='".$id."'");
			$usuario = mysql_fetch_array($rspuser); ?>
            <table border="0">
            <tr>
            <td>&deg; <a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuario['id'], $usuario['usuario']); ?>"><?=$usuario['nombres'].", ".$usuario['apellidos']; ?></a></td>
            </tr>
            <tr>
            <td>&nbsp;&nbsp;<img src="<?=LGlobal::IMG_Usuario($usuario['id'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" height="70" border="0" /></td>
            </tr>
            <tr>
            <td>&deg; <strong>Creado</strong></td>
            </tr>
            <tr>
            <td>&nbsp;&nbsp;<?=LGlobal::tiempohace($fecha); ?></td>
            </tr>
            </table>
            <?php
		}
		else {
			echo "<em>Usuario no existe</em>";

		}
		return $imagen;
	}
	function VerCategoria($articulo, $ver){
		$respart = mysql_query("select * from video_categorias where vi_ca_id='".$articulo."'");
		$articu = mysql_fetch_array($respart);
		if (!empty($articu['vi_ca_id']) and $ver==LGlobal::Url_Amigable($articu['vi_ca_titulo'])) {
			echo "<h2>".$articu['vi_ca_titulo']."</h2>";
			if (!empty($articu['vi_ca_imagen'])) { echo "<br /><p><img src=\"componentes/com_imagenes/thumbnails/".$articu['vi_ca_imagen']."\" border=\"0\"></p>"; }
			echo "<p>".$articu['vi_ca_descripcion']."</p>";
        	echo "<br /><br />";
        	include "administrador/utilidades/PHPPaging.lib.php";
            $paging = new PHPPaging;
            $paging->agregarConsulta("select * from video_videos where vi_estado='1' and vi_categoria='".$articulo."' order by vi_id ASC");
            $paging->porPagina(3);
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
            while($catego = $paging->fetchResultado()) {
                $c=$c+1;
                if($c%2==0) {
                    echo "\n<div class=\"blog-cont2\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $catego['vi_id'], $catego['vi_titulo'])."\"><b>".$catego['vi_titulo']."</b></a><br>
					<div class=\"blog-resumen2\">
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
					</div>
					<div class=\"blog-ladoderecho2\">
					<b>Creado:</b> ".LGlobal::tiempohace($catego['vi_creado'])."<br />
					<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($catego['vi_autor'], true, false, "", "")."<br />
					<b>Categoria:</b> ".Videos::_Categoria($catego['vi_categoria'])."
					</div>
					</div>";
                }
                else {
                    echo "\n<div class=\"blog-cont1\">&raquo; <a href=\"".LGlobal::Tipo_URL('com_videos', $catego['vi_id'], $catego['vi_titulo'])."\"><b>".$catego['vi_titulo']."</b></a><br />
					<div class=\"blog-resumen\">
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/default.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/1.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/2.jpg\" border=\"0\" class=\"imgthum\" />
					<img src=\"http://i.ytimg.com/vi/".$catego['vi_enlace']."/3.jpg\" border=\"0\" class=\"imgthum\" />
					</div>
					<div class=\"blog-ladoderecho\">
					<b>Creado:</b> ".LGlobal::tiempohace($catego['vi_creado'])."<br />
					<b>Autor:</b> &nbsp;&nbsp;&nbsp;&nbsp;".LGlobal::Url_Usuario($catego['vi_autor'], true, false, "", "")."<br />
					<b>Categoria:</b> ".Videos::_Categoria($catego['vi_categoria'])."
					</div>
					</div>";
                }
            }
            echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
		}
		else { echo "<em>No existe la Categoria</em>"; }
	}
	function FormComent($activo, $id) {
		$config = new LagcConfig();
		if ($activo==1) { ?>
        <br /><a name="lagc"></a>
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
        <form name="comentariolagc" action="<?=LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver']); ?>#lagc" method="post" onSubmit="return revisar()">
        <table width="540" height="60" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top" width="50" style="vertical-align:top;">
            <a href="<?=LGlobal::Tipo_URL('com_usuarios', $userc['id'], $userc['usuario']); ?>">
            <img src="<?=LGlobal::IMG_Usuario($_COOKIE["user_lagc"], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" height="50" border="0" /></a>
            </td>
            <td valign="top" width="250">
            <textarea tabindex="1" id="comentario" class="blog-frm-textarea" onkeypress="return limita(event, 255, 'comentario');" onkeyup="actualizaInfo(255, 'comentario', 'info')" name="comenlagc" cols="30" rows="3"></textarea>
            <div style="text-align:right;"><div id="info">M&aacute;ximo 255 caracteres</div></div>
            </td>
            <td valign="middle" align="center" style="vertical-align:top;">
            <img src="administrador/utilidades/exampleView.php" width="68" height="25" style="margin:-7px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" /><br />
            <input name="tmptxt" tabindex="2" title="Copiar codigo aqui" type="text" size="5" class="blog-frm-code" autocomplete="off" maxlength="5" /></td>
            <td valign="middle" align="center"><input type="submit" tabindex="3" value="Enviar" class="blog-frm-boton" /></td>
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
				if ($_COOKIE["tipo_lagc"]=="1") {
					$sql = "INSERT INTO video_comentarios (coment_video, coment_comentario, coment_creado, coment_usuario, coment_estado) VALUES ('".$_GET['id']."', '".$_POST['comenlagc']."', '".time()."', '".$_COOKIE["user_lagc"]."', '1')";
				}
				else {
					$sql = "INSERT INTO video_comentarios (coment_video, coment_comentario, coment_creado, coment_usuario, coment_estado) VALUES ('".$_GET['id']."', '".$_POST['comenlagc']."', '".time()."', '".$_COOKIE["user_lagc"]."', '2')";
				}
				mysql_query($sql,$con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver'])."'\", 3000) </script><br>
				<center>El comentario Fue enviado correctamente. espere su aprovacion por el administrador.</center><br><br>";
			}
			else {	echo "Codigo de seguridad Incorrecto. <a href=\"".LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver'])."\">Volver al Articulo</a>"; echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_videos', $_GET['id'], $_GET['ver'])."'\", 4000) </script>"; }
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
	function Comentarios($categoria, $paginar) {
		$_SESSION['temporalpg'] = $categoria; //guardo en tmp el id del articulo
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from video_comentarios where coment_estado='1' and coment_video=".$categoria." order by coment_id DESC";
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
		<script type="text/javascript" src="componentes/com_videos/jquery.paginacomen.js"></script>
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
        <input id="search" type="hidden" class="search" />
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
        <h3>Comentarios</h3>
        <div id="listing_container">
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
}
?>