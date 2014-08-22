<?php
class Usuarios {
	function Inicio($paginar, $sexo, $letra) {
		if (!empty($sexo)){ $consultasql = " and sexo=".$sexo." "; }
		if (!empty($letra)){ $consultasql = " and nombres LIKE '%".$letra."%' "; }
		?>
		<link href="componentes/com_usuarios/plantillas/lagc/estilos.css" rel="stylesheet" type="text/css">
        <div style="float:right;">
        <center>Filtrar por Sexo</center>
            <a href="?lagc=com_usuarios&sexo=2">Mujeres</a> |
            <a href="?lagc=com_usuarios&sexo=1">Hombres</a><?php if (!empty($sexo)){ ?> |
            <a href="/usuarios/">Todos</a> <?php } ?>
        </div>
        <h2>Usuarios</h2>
        Filtrar: <a href="?lagc=com_usuarios&letra=a">A</a> | <a href="?lagc=com_usuarios&letra=b">B</a> | <a href="?lagc=com_usuarios&letra=c">C</a> | <a href="?lagc=com_usuarios&letra=d">D</a> | <a href="?lagc=com_usuarios&letra=e">E</a> | <a href="?lagc=com_usuarios&letra=f">F</a> | <a href="?lagc=com_usuarios&letra=g">G</a> | <a href="?lagc=com_usuarios&letra=h">H</a> | <a href="i">I</a> | <a href="?lagc=com_usuarios&letra=j">J</a> | <a href="?lagc=com_usuarios&letra=k">K</a> | <a href="?lagc=com_usuarios&letra=l">L</a> | <a href="?lagc=com_usuarios&letra=m">M</a> | <a href="?lagc=com_usuarios&letra=n">N</a> | <a href="?lagc=com_usuarios&letra=o">O</a> | <a href="?lagc=com_usuarios&letra=p">P</a> | <a href="?lagc=com_usuarios&letra=q">Q</a> | <a href="?lagc=com_usuarios&letra=r">R</a> | <a href="?lagc=com_usuarios&letra=s">S</a> | <a href="?lagc=com_usuarios&letra=t">T</a> | <a href="?lagc=com_usuarios&letra=w">W</a> | <a href="?lagc=com_usuarios&letra=x">X</a> | <a href="?lagc=com_usuarios&letra=y">Y</a> | <a href="?lagc=com_usuarios&letra=z">Z</a> | <a href="/usuarios">Todos</a>
        <br /><br />
        <?php
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from usuarios where activo='1' and id!='1'".$consultasql."order by nombres ASC");
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
		?>
<table width="650" border="0" cellspacing="5" cellpadding="5" align="center">
<tr>
<?php $contador = 1; while($usuarios = $paging->fetchResultado()) { if ($contador > 3) { echo "</tr><tr>"; $contador = 1; } ?>
<?php
$c=$c+1;
if($c%2==0) { ?>
<td align="center" width="50" valign="top" style="border-bottom: 1px #CCC solid; vertical-align:top; padding:5px 5px 5px 5px;">
<a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuarios['id'], $usuarios['usuario']); ?>">
<img src="<?=LGlobal::IMG_Usuario($usuarios['id'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" />
</a>
</td>
<td align="left" width="182" valign="top" style="border-bottom: 1px #CCC solid; vertical-align:top; padding:5px 5px 5px 5px;">
<img src="componentes/com_usuarios/estrella.png" border="0" /><a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuarios['id'], $usuarios['usuario']); ?>">
<?=ucwords($usuarios['nombres'])." ".ucwords($usuarios['apellidos']); ?></a><br />
<img src="componentes/com_usuarios/sexo.png" border="0" /><?=Usuarios::Sexo($usuarios['sexo']);?><br />
<img src="componentes/com_usuarios/grupo.png" border="0" />
</td>
<?php }
else { ?>
<td align="center" width="50" valign="top" style="border-bottom: 1px #CCC solid; vertical-align:top; padding:5px 5px 5px 5px;">
<a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuarios['id'], $usuarios['usuario']); ?>">
<img src="<?=LGlobal::IMG_Usuario($usuarios['id'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="50" border="0" />
</a>
</td>
<td align="left" width="182" valign="top" style="border-bottom: 1px #CCC solid; vertical-align:top; padding:5px 5px 5px 5px;">
<img src="componentes/com_usuarios/estrella.png" border="0" /><a href="<?=LGlobal::Tipo_URL('com_usuarios', $usuarios['id'], $usuarios['usuario']); ?>">
<?=ucwords($usuarios['nombres'])." ".ucwords($usuarios['apellidos']); ?></a><br />
<img src="componentes/com_usuarios/sexo.png" border="0" /><?=Usuarios::Sexo($usuarios['sexo']);?><br />
<img src="componentes/com_usuarios/grupo.png" border="0" />
</td>
<?php
}
$contador++; } ?>
</tr></table>
	<?php
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function _EnlaceActu($compo) {
		if (!empty($compo)) {
			if ($compo==$_GET['componente']) { $final = " id=\"primero\""; }
			else if($compo=="perfil" and empty($_GET['componente'])) { $final = " id=\"primero\""; }
		}
		return $final;
	}
	function User($id, $nombre){
		$config = new LagcConfig();
		$respuser = mysql_query("select * from usuarios where id='".$id."'");
		$usuario = mysql_fetch_array($respuser);
		if (!empty($usuario['id']) and $nombre==LGlobal::Url_Amigable($usuario['usuario'])) {
			$configpla = "componentes/com_usuarios/plantillas/config.xml";
			if (file_exists($configpla)) {
				$plantillas = simplexml_load_file($configpla);
				if($plantillas){
					foreach ($plantillas as $plantilla) {
						echo "<link href=\"componentes/com_usuarios/plantillas/".$plantilla->plantilla."/".$plantilla->estilos.".css\" rel=\"stylesheet\" type=\"text/css\">\n";
					}
				} else { echo "Sintaxi XML inválida Revise el archivo: ".$configpla."\n"; }
			} else { echo "Error abriendo: ".$configpla."\n"; }
			$respuser = mysql_query("select * from usuarios where id='".$id."'");
			$user = mysql_fetch_array($respuser); ?>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
            <script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang:'es'}</script>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_ES/all.js#appId=290331064315355&xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
            <h2>Perfil de <b><?=$usuario['nombres'].", ".$usuario['apellidos']; ?></b></h2>
            <?php if($usuario['activo']==2){ echo "<center><div style=\"float:right;\">Usuario: <strong>Desactivado</strong></div></center>"; } ?>
			<table width="650" border="0" cellpadding="5" cellspacing="5">
			<tr>
			<td width="175" valign="top">
            <?php
			if($usuario['id']=="1"){ ?>
            <div><img src="plantillas/portuhermana/images/webmaster.png" border="0" /></div>
            <?php
			}
			else if($usuario['id']=="2"){ ?>
            <div><img src="plantillas/portuhermana/images/administrador.png" border="0" /></div>
            <?php
			}
			else if($usuario['id']=="5" or $usuario['id']=="9"){ ?>
            <div><img src="plantillas/portuhermana/images/colaborador.png" border="0" /></div>
            <?php
			}
			?>
            <img src="<?=LGlobal::IMG_Usuario($usuario['id'], "componentes/com_usuarios/imagenes"); ?>" width="170" border="0" /><br />
            <img src="componentes/com_usuarios/sexo.png" border="0" title="Sexo" /> <strong><?=Usuarios::Sexo($usuario['sexo']); ?></strong><br>
            <img src="componentes/com_usuarios/grupo.png" border="0" title="Grupo" /><br />
            <img src="componentes/com_usuarios/cumple.png" border="0" title="Cumplea&ntilde;os" /> <?=$user['cump_dia']."/".$user['cump_mes']."/".$user['cump_anio']; ?><br />
            <?php if(!empty($_COOKIE["usuario_lagc"])) { Usuarios::VerCambios($_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); } ?>
            <div  id="menuv">
            <ul>
            	<li><a href="<?=LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver']); ?>"<?=Usuarios::_EnlaceActu("perfil"); ?>>Perfil</a></li>
            	<li><a href="?lagc=com_usuarios&id=<?=$_GET['id'] ?>&ver=<?=$_GET['ver']; ?>&componente=blog"<?=Usuarios::_EnlaceActu("blog"); ?>>Blog</a></li>
                <li><a href="?lagc=com_usuarios&id=<?=$_GET['id'] ?>&ver=<?=$_GET['ver']; ?>&componente=videos"<?=Usuarios::_EnlaceActu("videos"); ?>>Videos</a></li>
                <li><a href="?lagc=com_usuarios&id=<?=$_GET['id'] ?>&ver=<?=$_GET['ver']; ?>&componente=amigos"<?=Usuarios::_EnlaceActu("amigos"); ?>>Amigos</a></li>
            </ul>
            </div>
          <br />
          <center>
          <h2>Compartir</h2>
        <table border="0">
        <tr>
            <td align="left" valign="middle">Google +</td>
            <td align="center"><div style="padding: 5px 3px;">
            <g:plusone href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver']);?>" size="tall"></g:plusone></div>
            </td>
        </tr>
        <tr>
            <td align="left" valign="middle">Twitter</td>
            <td align="center"><div style="padding: 5px 3px;">
            <a href="http://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="vertical" data-related="lagcperu" data-text="<?=$config->lagctitulo; ?>">Tweet</a></div>
            </td>
        </tr>
        <tr>
        	<td align="left" valign="middle">Facebook</td>
        	<td align="center"><div style="padding: 5px 3px;">
            <div class="fb-like" data-href="<?=$config->lagcurl.LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver']);?>" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false"></div></div>
            </td>
        </tr>
        </table>
        </center>
              </td>
              <td width="470" valign="top" style="vertical-align:top;">
              	<div class="ctnprinci"><?=Usuarios::EligeMostrarEnPerfil($user['id']); ?></div>
              </td>
              </tr>
              </table>
		<?php
		}
		else { echo "<em>Usuario no Existe</em>"; }
	}
	function EligeMostrarEnPerfil($id) {
		if (!empty($_GET['editperfil']) or !empty($_GET['camimg']) or !empty($_GET['addamg']) or !empty($_GET['componente']) or !empty($_GET['slam']) or !empty($_GET['slamaprobar']) or !empty($_GET['amgaprobar']) or !empty($_GET['amigos'])) { VerContPerfil(); }
		else { Usuarios::InicioPerfil($id); }
	}
	function VerCambios($id, $usuario) {
		if ($_GET['id']==$id) { ?>
			&raquo; <a href="?lagc=com_usuarios&id=<?=$_GET['id'] ?>&ver=<?=$_GET['ver']; ?>&editperfil=<?=$id; ?>" id="primero">Editar Perfil</a><br />
            &raquo; <a href="?lagc=com_usuarios&id=<?=$_GET['id']; ?>&ver=<?=$_GET['ver']; ?>&camimg=<?=$id; ?>">Cambiar Imagen</a><br />
			<?php
		}
		else { ?>
			&raquo; <a href="?lagc=com_usuarios&id=<?=$_GET['id']; ?>&ver=<?=$_GET['ver']; ?>&addamg=<?=$id; ?>">Agregar Amigo</a>
            <?php
		}
	}
	function InicioPerfil($id) {
		$config = new LagcConfig();
		$respuser = mysql_query("select * from usuarios where id='".$id."'"); $user = mysql_fetch_array($respuser); ?>
		<strong>Perfil creado <?=LGlobal::tiempohace($user['fecha']); ?></strong>
        <div style="border-bottom: 3px #999 dashed;"></div>
        <strong>Acerca de <u><?=$user['nombres'].", ".$user['apellidos']; ?></u>: </strong><br />
		<!-- <strong>Situaci&oacute;n sentimental: </strong><br />
        <strong>Colegio: </strong><br />
        <strong>Universidad: </strong><br /> -->

<br />
<br />
		<!-- <strong>Mensaje Personal: </strong> -->
		<?=Usuarios::FormComent($user['activo'], $user['id'], $user['nombres'].", ".$user['apellidos']); ?>
        <h2>Slam</h2>
        <?=Usuarios::Comentarios($user['id'], 10, $user['usuario']);
	}
	function FormComent($activo, $id, $nombres) {
		$config = new LagcConfig();
		if ($activo==1) { ?>
        <div style="border-bottom: 3px #999 dashed; margin:0px 0px;"></div><a name="lagc"></a>
        <div style="background:#FFF; height:auto;">
        <div class="blog-dejacomentario">Publicar en <?php if ($id==$_COOKIE["user_lagc"]) { echo "mi perfil"; } else { echo $nombres; } ?>...
		</div>
        <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
        <div style="margin:10px 10px;">
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
        <form name="comentariolagc" action="<?=LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver']); ?>#lagc" method="post" onSubmit="return revisar()">
        <table width="430" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top">
            <textarea tabindex="1" id="comentario" class="blog-frm-textarea" onkeypress="return limita(event, 255, 'comentario');" onkeyup="actualizaInfo(255, 'comentario', 'info')" name="comenlagc" cols="50" rows="3"></textarea>
            <div style="text-align:right;"><div id="info">M&aacute;ximo 255 caracteres</div></div>
            </td>
         </tr>
         <tr>
            <td align="center" valign="middle">
            <select name="tipopublicacion" style="width:100px;" tabindex="2">
            	<option value="1">Publico</option>
                <optgroup label="Registrados"></optgroup>
                <optgroup label="Mis Amigos"></optgroup>
                <optgroup label="Solo Ambos"></optgroup>
            </select>
              <img src="administrador/utilidades/exampleView.php" width="68" height="25" style="margin:5px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" />
              <input name="tmptxt" tabindex="3" title="Copiar codigo aqui" type="text" size="1" class="blog-frm-code" autocomplete="off" maxlength="5" />
            <input type="submit" tabindex="4" value="Publicar" class="blog-frm-boton" /></td>
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
				if ($_COOKIE["tipo_lagc"]=="1" or $_COOKIE["user_lagc"]==$id) {
					$sql = "INSERT INTO usuarios_publicaciones (user_comentario, user_visiblepor, user_de, user_para, user_fecha, user_estado) VALUES ('".$_POST['comenlagc']."', '".$_POST['tipopublicacion']."', '".$_COOKIE["user_lagc"]."', '".$id."', '".time()."', '1')";
				}
				else {
					$sql = "INSERT INTO usuarios_publicaciones (user_comentario, user_visiblepor, user_de, user_para, user_fecha, user_estado) VALUES ('".$_POST['comenlagc']."', '".$_POST['tipopublicacion']."', '".$_COOKIE["user_lagc"]."', '".$id."', '".time()."', '2')";
				}
				mysql_query($sql,$con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."'\", 3000) </script><br>
				<center>El comentario Fue enviado correctamente. espere su aprobaci&oacute;n por el usuario.</center><br><br>";
			}
			else {	echo "Codigo de seguridad Incorrecto. <a href=\"".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."\">Volver al Articulo</a>"; echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."'\", 4000) </script>"; }
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
	function Comentarios($categoria, $paginar, $usuariolg) {
		$_SESSION['temporalpg'] = $categoria; //guardo en tmp el id del articulo
		$_SESSION['temporalver'] = $_GET['ver'];
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		// instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from usuarios_publicaciones where user_estado='1' and user_para=".$categoria." order by user_id DESC";
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
		<script type="text/javascript" src="componentes/com_usuarios/jquery.slam.js"></script>
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
        <form action="" method="get">
        <input id="search" type="hidden" class="search" />
        <?php
        $getArray = array();
        parse_str($_SERVER['QUERY_STRING'],$getArray);
        foreach($getArray as $key=>$value){
            echo "<input type='hidden' name='{$key}' id='{$key}' value='{$value}' />";
        }
        ?>
        </form>
        <br />
        <div id="listing_container">
        <?php
        foreach($rows as $catego){
            $c=$c+1;
            if($c%2==0) { ?>
                <div class="coment2">
                <div style="float:right; color:#09C; font-family:Arial;"><?=LGlobal::tiempohace($catego['user_fecha']); ?></div>
                <div style="color:#06F; font-family:Arial;"><?=Usuarios::FotoComent($catego['user_de'], true); ?> <?=Usuarios::_IconoMensaje($catego['user_visiblepor']); ?></div>
                <table width="430" border="0"><tr><td width="55">
                <img src="<?=LGlobal::IMG_Usuario($catego['user_de'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" />
                </td><td valign="top" style="text-align:justify; vertical-align:top;">
                <?="&raquo; ".$catego['user_comentario']; ?>
                </td></tr>
                <tr>
                    <td colspan="2">
                    <div style="float:left;">
                    <img src="componentes/com_usuarios/megusta.png" border="0" title="Me Gusta" />
                    <a href="?lagc=com_usuarios&id=<?=$categoria; ?>&ver=<?=$usuariolg; ?>&slam=<?=$catego['user_id']; ?>">Me Gusta [<?=Usuarios::_VerMegustas($catego['user_id'], true); ?>]</a></div>
                    <div style="float:right;">
                    <img src="componentes/com_usuarios/comentario.png" border="0" title="Comentarios" />
                    <a href="?lagc=com_usuarios&id=<?=$categoria; ?>&ver=<?=$usuariolg; ?>&slam=<?=$catego['user_id']; ?>">Comentarios [<?=Usuarios::_ContarComent($catego['user_id']); ?>]</a></div>
                    </td>
                </tr>
                </table>
                </div>
                <?php
            }
            else { ?>
                <div class="coment1">
                <div style="float:right; color:#09C; font-family:Arial;"><?=LGlobal::tiempohace($catego['user_fecha']); ?></div>
                <div style="color:#09C; font-family:Arial;"><?=Usuarios::FotoComent($catego['user_de'], true); ?> <?=Usuarios::_IconoMensaje($catego['user_visiblepor']); ?></div>
                <table width="430" border="0"><tr><td width="55">
                <img src="<?=LGlobal::IMG_Usuario($catego['user_de'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" />
                </td><td valign="top" style="text-align:justify; vertical-align:top;">
                <?="&raquo; ".$catego['user_comentario']; ?>
                </td></tr>
                <tr>
                    <td colspan="2">
                    <div style="float:left;">
                    <img src="componentes/com_usuarios/megusta.png" border="0" title="Me Gusta" />
                    <a href="?lagc=com_usuarios&id=<?=$categoria; ?>&ver=<?=$usuariolg; ?>&slam=<?=$catego['user_id']; ?>">Me Gusta [<?=Usuarios::_VerMegustas($catego['user_id'], true); ?>]</a></div>
                    <div style="float:right;">
                    <img src="componentes/com_usuarios/comentario.png" border="0" title="Comentarios" />
                    <a href="?lagc=com_usuarios&id=<?=$categoria; ?>&ver=<?=$usuariolg; ?>&slam=<?=$catego['user_id']; ?>">Comentarios [<?=Usuarios::_ContarComent($catego['user_id']); ?>]</a></div>
                    </td>
                </tr>
                </table>
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
	function slam($iduser, $idslam){ ?>
		&laquo; <a href="<?=LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver']); ?>">Regresar al perfil</a>
        <?php
		$rptslam = mysql_query("select * from usuarios_publicaciones where user_id='".$idslam."' and user_estado='1'"); $slam = mysql_fetch_array($rptslam);
		if ($idslam==$slam['user_id']) { ?>
            <div class="slam">
                <div style="float:right;"><?=LGlobal::tiempohace($slam['user_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($slam['user_de'], true); ?></u> <?=Usuarios::_IconoMensaje($slam['user_visiblepor']); ?>
                <table width="440" border="0"><tr><td width="55">
                <img src="<?=LGlobal::IMG_Usuario($slam['user_de'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" />
                </td><td valign="top" style="text-align:justify; vertical-align:top; padding:5px 5px 5px 5px;">
                <?="&raquo; ".$slam['user_comentario']; ?>
                </td></tr>
                <tr>
                    <td colspan="2" align="center">
                    <div style="border-bottom: 1px #999 dashed; margin:0px 0px;"></div>
                    <img src="componentes/com_usuarios/simegusta.png" border="0" title="Me Gusta" />
                    <?=Usuarios::_VerMegustas($slam['user_id'], true); ?> &nbsp;&nbsp;
                    <img src="componentes/com_usuarios/nomegusta.png" border="0" title="No me Gusta" />
                    <?=Usuarios::_VerMegustas($slam['user_id'], false); ?>
                    </td>
                </tr>
                </table>
            </div>
            <?php
            echo Usuarios::FormComentslam($slam['user_estado'], $slam['user_id']);
			echo Usuarios::Comentarios_Slam($slam['user_id'], 10);
		}
		else { echo "<br /><br /><div class=\"mensaje informar\">Noce pude mostrar.<br />El Slam.</div>"; }
	}
	function FormComentslam($activo, $id) {
		$config = new LagcConfig();
		if ($activo==1) { ?><a name="lagc"></a>
        <div style="border-bottom: 3px #999 dashed; margin:0px 0px;"></div>
        <div style="background:#FFF; height:auto;">
        <div class="blog-dejacomentario">Comentar ...
		</div>
        <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
        <div style="margin:10px 10px;">
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
        <form name="comentariolagc" action="?lagc=com_usuarios&id=<?=$_GET['id']; ?>&ver=<?=$_GET['ver']; ?>&slam=<?=$id; ?>#lagc" method="post" onSubmit="return revisar()">
        <table width="450" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top">
            <textarea tabindex="1" id="comentario" class="blog-frm-textarea" onkeypress="return limita(event, 255, 'comentario');" onkeyup="actualizaInfo(255, 'comentario', 'info')" name="comenlagc" cols="50" rows="3"></textarea>
            <div style="text-align:right;"><div id="info">M&aacute;ximo 255 caracteres</div></div>
            </td>
         </tr>
         <tr>
            <td align="center" valign="middle">
            <select name="tipopublicacion" style="width:100px;" tabindex="2">
            	<option value="">Valorar</option>
                <optgroup label="-----------------"></optgroup>
                <option value="1">Si Me Gusta</option>
                <option value="2">No Me Gusta</option>
            </select>
              <img src="administrador/utilidades/exampleView.php" width="65" height="25" style="margin:5px 0px; cursor:pointer;" onclick="this.src=this.src+'#'+Math.random()" title="Generar nuevo c&oacute;digo de seguridad" />
              <input name="tmptxt" tabindex="3" title="Copiar codigo aqui" type="text" size="1" class="blog-frm-code" autocomplete="off" maxlength="5" />
            <input type="submit" tabindex="4" value="Publicar" class="blog-frm-boton" /></td>
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
					$sql = "INSERT INTO usuarios_comentarios (com_user, com_idcoment, com_fecha, com_gusta, com_comentario) VALUES ('".$_COOKIE["user_lagc"]."', '".$id."', '".time()."', '".$_POST['tipopublicacion']."', '".$_POST['comenlagc']."')";
				mysql_query($sql,$con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slam=".$id."'\", 3000) </script><br>
				<center>El comentario Fue enviado correctamente.</center><br><br>";
			}
			else {	echo "Codigo de seguridad Incorrecto. <a href=\"?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slam=".$id."\">Volver al Articulo</a>"; echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slam=".$id."'\", 4000) </script>"; }
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
	function Comentarios_Slam($categoria, $paginar) {
		$_SESSION['temporalpg'] = $categoria; //guardo en tmp el id del articulo
		include('administrador/utilidades/paginacion/ajaxpaginator.class.php');
		//instantiate mysqli connection
		$config = new LagcConfig(); //Conexion
		$conn = new mysqli($config->lagclocal, $config->lagcuser, $config->lagcpass, $config->lagcbd);
		$query = "select * from usuarios_comentarios where com_idcoment='".$categoria."' order by com_id DESC";
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
		<script type="text/javascript" src="componentes/com_usuarios/jquery.comentario.js"></script>
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
        <form action="" method="get">
        <input id="search" type="hidden" class="search" />
        <?php
        $getArray = array();
        parse_str($_SERVER['QUERY_STRING'],$getArray);
        foreach($getArray as $key=>$value){
            echo "<input type='hidden' name='{$key}' id='{$key}' value='{$value}' />";
        }
        ?>
        </form>
        <br />
        <div id="listing_container">
        <?php
        foreach($rows as $catego){
            $c=$c+1;
            if($c%2==0) { ?>
                <div class="coment2">
                <div style="float:right;"><?=LGlobal::tiempohace($catego['com_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($catego['com_user'], true); ?></u>
                <table width="440" border="0"><tr><td width="55">
                <img src="<?=LGlobal::IMG_Usuario($catego['com_user'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" />
                </td><td valign="top" style="text-align:justify; vertical-align:top;">
                <?="&raquo; ".$catego['com_comentario']; ?>
                <div style="float:right;"><?=Usuarios::_VerMegustaUser($catego['com_gusta']); ?></div>
                </td>
                </table>
                </div>
                <?php
            }
            else { ?>
                <div class="coment1">
                <div style="float:right;"><?=LGlobal::tiempohace($catego['com_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($catego['com_user'], true); ?></u>
                <table width="440" border="0"><tr><td width="55">
                <img src="<?=LGlobal::IMG_Usuario($catego['com_user'], "componentes/com_usuarios/imagenes/thumb"); ?>" width="100" />
                </td><td valign="top" style="text-align:justify; vertical-align:top;">
                <?="&raquo; ".$catego['com_comentario']; ?>
                <div style="float:right;"><?=Usuarios::_VerMegustaUser($catego['com_gusta']); ?></div>
                </td>
                </table>
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
	function AgregarAmigos($id){
		$config = new LagcConfig(); //Conexion
		if(!empty($_COOKIE["usuario_lagc"])) { ?>
        <div style="margin:10px 10px;">
        <?php if (!$_POST['tmptxt']) {
			$rptamigo = mysql_query("select * from usuarios_amigos where amg_iduserpara='".$id."'"); $amigos = mysql_fetch_array($rptamigo);
			if ($amigos['amg_iduserde']==$_COOKIE["user_lagc"]) {
				echo "ya enviastes invitacion";
			}
			else {
				include "componentes/com_usuarios/agregaramigo.tpl";
			}
        } else {
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
				$sql = "INSERT INTO usuarios_amigos (amg_iduserde, amg_iduserpara, amg_fechasend) VALUES ('".$_COOKIE["user_lagc"]."', '".$_GET['id']."', '".time()."')";
				mysql_query($sql,$con);
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."'\", 5000) </script><br>
				<center>La invitacion fue enviada a ".LGlobal::Url_Usuario($_GET['id'], true, false, "", "").". espera su respuesta de confirmacion de amistad.</center><br><br>";
			}
			else {	echo "Codigo de seguridad Incorrecto. <a href=\"".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."\">Volver</a>"; echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_usuarios', $_GET['id'], $_GET['ver'])."'\", 4000) </script>"; }
		} ?>
        </div>
        <?php } else { ?>
        <div style="margin:10px 10px;">
        identificate para agregar.
        </div>
        <?php }
	}
	function slamAprobar($id){
		if ($id!=$_GET['id']) { echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&slamaprobar=true'\", 0) </script>"; }
		?>
    	<h2>Aprobar Publicaciones</h2>
    	<?php
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$rptgslama = mysql_query("select * from usuarios_publicaciones where user_para='".$id."' and user_estado='2'");
		$contarslamapro = mysql_num_rows($rptgslama);
		while($aprobar = mysql_fetch_array($rptgslama)){
			$c=$c+1;
            if($c%2==0) { ?>
                <div class="coment2">
                <div style="float:right;"><?=LGlobal::tiempohace($aprobar['user_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($aprobar['user_de'], true); ?></u> <?=Usuarios::_IconoMensaje($aprobar['user_visiblepor']); ?>
                <table width="340" border="0"><tr><td width="55">
                <?=Usuarios::FotoComent($aprobar['user_de'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="&raquo; ".$aprobar['user_comentario']; ?>
                <div style="float:right;"><br /><br />
                	<?php
					if (!empty($_POST['idapro'.$aprobar['user_id'].''])) {
						$sql = "UPDATE usuarios_publicaciones SET user_estado='1' WHERE user_id='".$_POST['idapro'.$aprobar['user_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slamaprobar=true'\", 2000) </script>";
						echo "Se Aprobo la Publicacion";
					}
					else { ?>
                	<form id="aprobar<?=$aprobar['user_id'];?>" action="" method="post">
                    <input type="hidden" name="idapro<?=$aprobar['user_id'];?>" value="<?=$aprobar['user_id'];?>" />
                    </form>
                    <? } ?>
                    <?php
					if (!empty($_POST['iddesa'.$aprobar['user_id'].''])) {
						$sql = "DELETE FROM usuarios_publicaciones WHERE user_id='".$_POST['iddesa'.$aprobar['user_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slamaprobar=true'\", 2000) </script>";
						echo "Se Borro la Publicacion";
					}
					else { ?>
                	<form id="desapro<?=$aprobar['user_id'];?>" action="" method="post">
                    <input type="hidden" name="iddesa<?=$aprobar['user_id'];?>" value="<?=$aprobar['user_id'];?>" />
                    </form>
                    <? } ?>
                    <a onClick="document.getElementById('aprobar<?=$aprobar['user_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/aprobar.png" border="0" title="Aprobar Publicacion" /></a>
                    <a onClick="document.getElementById('desapro<?=$aprobar['user_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/desaprobar.png" border="0" title="Desaprobar Publicacion" /></a>
                </div>
                </td>
                </table>
                </div>
                <?php
            }
            else { ?>
                <div class="coment1">
                <div style="float:right;"><?=LGlobal::tiempohace($aprobar['user_fecha']); ?></div>
                <u><?=Usuarios::FotoComent($aprobar['user_de'], true); ?></u> <?=Usuarios::_IconoMensaje($aprobar['user_visiblepor']); ?>
                <table width="340" border="0"><tr><td width="55">
                <?=Usuarios::FotoComent($aprobar['user_de'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="&raquo; ".$aprobar['user_comentario']; ?>
                <div style="float:right;"><br /><br />
                	<?php
					if (!empty($_POST['idapro'.$aprobar['user_id'].''])) {
						$sql = "UPDATE usuarios_publicaciones SET user_estado='1' WHERE user_id='".$_POST['idapro'.$aprobar['user_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slamaprobar=true'\", 2000) </script>";
						echo "Se Aprobo la Publicacion";
					}
					else { ?>
                	<form id="aprobar<?=$aprobar['user_id'];?>" action="" method="post">
                    <input type="hidden" name="idapro<?=$aprobar['user_id'];?>" value="<?=$aprobar['user_id'];?>" />
                    </form>
                    <? } ?>
                    <?php
					if (!empty($_POST['iddesa'.$aprobar['user_id'].''])) {
						$sql = "DELETE FROM usuarios_publicaciones WHERE user_id='".$_POST['iddesa'.$aprobar['user_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&slamaprobar=true'\", 2000) </script>";
						echo "Se Borro la Publicacion";
					}
					else { ?>
                	<form id="desapro<?=$aprobar['user_id'];?>" action="" method="post">
                    <input type="hidden" name="iddesa<?=$aprobar['user_id'];?>" value="<?=$aprobar['user_id'];?>" />
                    </form>
                    <? } ?>
                    <a onClick="document.getElementById('aprobar<?=$aprobar['user_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/aprobar.png" border="0" title="Aprobar Publicacion" /></a>
                    <a onClick="document.getElementById('desapro<?=$aprobar['user_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/desaprobar.png" border="0" title="Desaprobar Publicacion" /></a>
                </div>
                </td>
                </table>
                </div>
                <?php
            }
		}
		if($contarslamapro==0){
			echo "<br /><br />No existe ninguna publicacion por Aprobar";
		}
	}
	function AmgAprobar($id){
		if ($id!=$_GET['id']) { echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_COOKIE["user_lagc"]."&ver=".$_COOKIE["usuario_lagc"]."&amgaprobar=true'\", 0) </script>"; }
		?>
    	<h2>Aprobar Amistades</h2>
    	<?php
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$rptgslama = mysql_query("select * from usuarios_amigos where amg_iduserpara='".$id."' and amg_aprobado='2'");
		$contarslamapro = mysql_num_rows($rptgslama);
		while($aprobar = mysql_fetch_array($rptgslama)){
			$c=$c+1;
            if($c%2==0) { ?>
                <div class="coment2">
                <div style="float:right;"><?=LGlobal::tiempohace($aprobar['amg_fechasend']); ?></div>
                <?=LGlobal::Url_Usuario($aprobar['amg_iduserde'], true, false, "", ""); ?> Intenta agregarte
                <hr />
                <table width="340" border="0"><tr><td width="170">
                <?=Usuarios::FotoComent($aprobar['amg_iduserde'], false); ?><img src="componentes/com_usuarios/flechas.png" width="35" border="0" /><?=Usuarios::FotoComent($aprobar['amg_iduserpara'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="<strong>&raquo;</strong> ".$aprobar['amg_mensaje']; ?>
                <div style="float:right;"><br /><br />
                	<?php
					if (!empty($_POST['idapro'.$aprobar['amg_id'].''])) {
						$sql = "UPDATE usuarios_amigos SET amg_aprobado='1', amg_fechaapro='".time()."' WHERE amg_id='".$_POST['idapro'.$aprobar['amg_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&amgaprobar=true'\", 2000) </script>";
						echo "Se Aprobo la Publicacion";
					}
					else { ?>
                	<form id="aprobar<?=$aprobar['amg_id'];?>" action="" method="post">
                    <input type="hidden" name="idapro<?=$aprobar['amg_id'];?>" value="<?=$aprobar['amg_id'];?>" />
                    </form>
                    <? } ?>
                    <?php
					if (!empty($_POST['iddesa'.$aprobar['amg_id'].''])) {
						$sql = "DELETE FROM usuarios_amigos WHERE amg_id='".$_POST['iddesa'.$aprobar['amg_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&amgaprobar=true'\", 2000) </script>";
						echo "Se Borro la Publicacion";
					}
					else { ?>
                	<form id="desapro<?=$aprobar['amg_id'];?>" action="" method="post">
                    <input type="hidden" name="iddesa<?=$aprobar['amg_id'];?>" value="<?=$aprobar['amg_id'];?>" />
                    </form>
                    <? } ?>
                    <a onClick="document.getElementById('aprobar<?=$aprobar['amg_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/aprobar.png" border="0" title="Aprobar Publicacion" /></a>
                    <a onClick="document.getElementById('desapro<?=$aprobar['amg_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/desaprobar.png" border="0" title="Desaprobar Publicacion" /></a>
                </div>
                </td>
                </table>
                </div>
                <?php
            }
            else { ?>
                <div class="coment1">
                <div style="float:right;"><?=LGlobal::tiempohace($aprobar['amg_fechasend']); ?></div>
                <?=LGlobal::Url_Usuario($aprobar['amg_iduserde'], true, false, "", ""); ?> Intenta agregarte
                <hr />
                <table width="340" border="0"><tr><td width="170">
                <?=Usuarios::FotoComent($aprobar['amg_iduserde'], false); ?><img src="componentes/com_usuarios/flechas.png" width="35" border="0" /><?=Usuarios::FotoComent($aprobar['amg_iduserpara'], false); ?>
                </td><td valign="top" style="text-align:justify;">
                <?="<strong>&raquo;</strong> ".$aprobar['amg_mensaje']; ?>
                <div style="float:right;"><br /><br />
                	<?php
					if (!empty($_POST['idapro'.$aprobar['amg_id'].''])) {
						$sql = "UPDATE usuarios_amigos SET amg_aprobado='1', amg_fechaapro='".time()."' WHERE amg_id='".$_POST['idapro'.$aprobar['amg_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&amgaprobar=true'\", 2000) </script>";
						echo "Se Aprobo la Publicacion";
					}
					else { ?>
                	<form id="aprobar<?=$aprobar['amg_id'];?>" action="" method="post">
                    <input type="hidden" name="idapro<?=$aprobar['amg_id'];?>" value="<?=$aprobar['amg_id'];?>" />
                    </form>
                    <? } ?>
                    <?php
					if (!empty($_POST['iddesa'.$aprobar['amg_id'].''])) {
						$sql = "DELETE FROM usuarios_amigos WHERE amg_id='".$_POST['iddesa'.$aprobar['amg_id'].'']."'";
						$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=".$_GET['id']."&ver=".$_GET['ver']."&amgaprobar=true'\", 2000) </script>";
						echo "Se Borro la Publicacion";
					}
					else { ?>
                	<form id="desapro<?=$aprobar['amg_id'];?>" action="" method="post">
                    <input type="hidden" name="iddesa<?=$aprobar['amg_id'];?>" value="<?=$aprobar['amg_id'];?>" />
                    </form>
                    <? } ?>
                    <a onClick="document.getElementById('aprobar<?=$aprobar['amg_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/aprobar.png" border="0" title="Aprobar Publicacion" /></a>
                    <a onClick="document.getElementById('desapro<?=$aprobar['amg_id'];?>').submit()" style="cursor:pointer;">
                    <img src="componentes/com_usuarios/desaprobar.png" border="0" title="Desaprobar Publicacion" /></a>
                </div>
                </td>
                </table>
                </div>
                <?php
            }
		}
		if($contarslamapro==0){
			echo "<br /><br />No existe ninguna publicacion por Aprobar";
		}
	}
	function _ContarComent($id){
		$rptcomen = mysql_query("select * from usuarios_comentarios where com_idcoment='".$id."'");
		$comentarios = mysql_num_rows($rptcomen);
		return $comentarios;
	}
	function _VerMegustas($id, $cual){
		$megusta = 0;
		$nomegusta = 0;
		$rptgustas = mysql_query("select * from usuarios_comentarios where com_idcoment='".$id."'");
		while($gusta = mysql_fetch_array($rptgustas)){
			if ($gusta['com_gusta']==1){
				$megusta = $megusta+1;
			}
			else if ($gusta['com_gusta']==2) {
				$nomegusta = $nomegusta+1;
			}
		}
		if ($cual==true) { return $megusta; } else { return $nomegusta; }
	}
	function _VerMegustaUser($id){
		$rptgustas = mysql_query("select * from usuarios_comentarios where com_gusta='".$id."'"); $gusta = mysql_fetch_array($rptgustas);
		if ($gusta['com_gusta']==1){ $megusta = "<img src=\"componentes/com_usuarios/simegusta.png\" border=\"0\" title=\"Me Gusta\" />"; }
		else if ($gusta['com_gusta']==2) { $megusta = "<img src=\"componentes/com_usuarios/nomegusta.png\" border=\"0\" title=\"No me Gusta\" />"; }
		if ($cual==true) { return $megusta; } else { return $megusta; }
	}
	function FotoComent($id, $vertitu) {
		$config = new LagcConfig();
		$rspuserc = mysql_query("select * from usuarios where id='".$id."'"); $userc = mysql_fetch_array($rspuserc);
		if ($vertitu==true) {
			echo $userc['nombres'].", ".$userc['apellidos']." dijo:";
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
	function _IconoMensaje($val){
		if($val==1){
			$fin = "<img src=\"componentes/com_usuarios/vpublico.png\" border=\"0\" title=\"Todos lo pueden Ver\" />";
		}
		else if ($val==2) {
			$fin = "<img src=\"componentes/com_usuarios/vregistrado.png\" border=\"0\" title=\"Solo Usuarios Registrados\" />";
		}
		else if ($val==3) {
			$fin = "<img src=\"componentes/com_usuarios/vamigos.png\" border=\"0\" title=\"Solo mis Amigos\" />";
		}
		else if ($val==4) {
			$fin = "<img src=\"componentes/com_usuarios/vambos.png\" border=\"0\" title=\"Solo tu y yo\" />";
		}
		return $fin;
	}
	function TipoDoc($tipo) {
		$tipdoc = array("1"=>"DNI", "2"=>"CE", "3"=>"LM", "4"=>"PAS");
		ksort($tipdoc);
		foreach ($tipdoc as $key => $val) {
			if ($tipo==$key) {
				$valor = $val;
			}
		}
		return $valor;
	}
	function Sexo($valor) {
		if ($valor==1) { $result = "Hombre"; }
		else if ($valor==2) { $result = "Mujer"; }
		else { $result = "<em>No definido</em>"; }
		return $result;
	}
	function Activou($activo) {
		if ($activo==1) { $result = "Activo"; }
		else if ($valor==2) { $result = "Desactivado"; }
		else { $result = "<em>No definido</em>"; }
		return $result;
	}
	function CambiarImg($id, $usuario){
		$respuser = mysql_query("select * from usuarios where id='".$id."'"); $user = mysql_fetch_array($respuser);
		echo "<h2>Cambiar Imagen</h2>";
		if (!$_POST['tmptxt']) {
			include "componentes/com_usuarios/cambiarimagen.tpl";
		}
		else {
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
				$tamano = $_FILES['archivo']['size']; //tamaño del archivo
				$tipo = $_FILES['archivo']['type']; //tipo de archivo
				$fecha = time();
				if($tipo=='image/jpeg' or $tipo=='image/gif' or $tipo=='image/png'){
					if($tamano < 7340032){ // Comprovamos el tamaño
						/*Imagen*/
						$archivo1 = "componentes/com_usuarios/imagenes/".$user['imagen'];
						unlink($archivo1);
						$imagen = new thumb();
						$imagen->loadImage($_FILES['archivo']['tmp_name']);
						$imagen->resize(170, "width");
						$imagen->save('componentes/com_usuarios/imagenes/'.$user['usuario'].'_'.$fecha.'.jpg');
						echo '<img src="componentes/com_usuarios/imagenes/'.$user['usuario'].'_'.$fecha.'.jpg">';
						/*Thumb*/
						$archivo2 = "componentes/com_usuarios/imagenes/thumb/".$user['imagen'];
						unlink($archivo2);
						$thumb = new thumb();
						$thumb->loadImage($_FILES['archivo']['tmp_name']);
						$thumb->crop(50, 50);
						$thumb->save('componentes/com_usuarios/imagenes/thumb/'.$user['usuario'].'_'.$fecha.'.jpg');
						//
						$config = new LagcConfig();
						$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
						mysql_select_db($config->lagcbd,$con);
						//
						$sqlk = "UPDATE usuarios SET imagen='".$user['usuario']."_".$fecha.".jpg', fechamodi='".time()."' WHERE id='".$id."'";
						mysql_query($sqlk, $con);
						echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".LGlobal::Tipo_URL('com_usuarios', $user['id'], $user['usuario'])."'\",2000) </script>";
					} else { echo "<em>El tamaño es superior al permitido</em>"; }
				} else { echo "<b>$tipo</b>: <em>Tipo de imagen incorecto</em>"; }
			}
			else { echo "Codigo de seguridad Incorrecto <a href=\"javascript:history.back(1);\">< Atras</a>"; }
		}
	}
	function ExisteImg($tipo, $link, $nombre, $apellidos){
		$config = new LagcConfig();
		if ($tipo==1) {
			if (!empty($link)) {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/".$link."\" width=\"170\" height=\"200\" title=\"".$nombre.", ".$apellidos."\" />";
			} else {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/no_disponible.jpg\" width=\"170\" height=\"200\" title=\"".$nombre.", ".$apellidos."\" />";
			}
		}
		else if ($tipo==2) {
			if (!empty($link)) {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/thumb/".$link."\" width=\"50\" height=\"50\" title=\"".$nombre.", ".$apellidos."\" />";
			} else {
				$imagen = "<img src=\"".$config->lagcurl."/componentes/com_usuarios/imagenes/thumb/no_disponible.jpg\" width=\"50\" height=\"50\" title=\"".$nombre.", ".$apellidos."\" />";
			}
		}
		return $imagen;
	}
	function Registro() {
		if (empty($_POST['correoxth']) and empty($_POST['tmptxt'])) {
			if (!empty($_COOKIE["user_lagc"])) {
				 echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 0) </script>";
			}
			else { include "componentes/com_usuarios/crear.tpl"; }
		}
		else {
			/**/
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
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				$respconte = mysql_query("select * from usuarios where email='".$_POST['correoxth']."'"); $usuarios = mysql_fetch_array($respconte);
				$respconte1 = mysql_query("select * from usuarios where usuario='".$_POST['usuarioxth']."'"); $usuarios1 = mysql_fetch_array($respconte1);
				if ($usuarios['email']==$_POST['correoxth']) {
					echo "El <strong>Email</strong> ya esta registrado. <a href=\"?lagc=com_usuarios&id=registro\">Vuelvalo a intentar</a>";
				}
				else if ($usuarios1['usuario']==$_POST['usuarioxth']) {
					echo "El <strong>Usuario</strong> ya esta registrado. <a href=\"?lagc=com_usuarios&id=registro\">Vuelvalo a intentar</a>";
				}
				else if (empty($_POST['nombre']) and empty($_POST['apellidos']) and empty($_POST['usuarioxth']) and empty($_POST['tmptxt'])) {
					echo "Uno de los campos esta vacio <a href=\"?lagc=com_usuarios&id=registro\">Vuelvalo a intentar</a>";
				}
				else if ($_POST['contra1']==$_POST['contra2']) {
						$sql = "INSERT INTO usuarios (usuario, email, nombres, apellidos, doc_tipo, doc_num, sexo, cump_dia, cump_mes, cump_anio, activo, password, fecha) VALUES ('".strtolower($_POST['usuarioxth'])."', '".strtolower($_POST['correoxth'])."', '".$_POST['nombre']."', '".$_POST['apellidos']."', '".$_POST['documentotipo']."', '".$_POST['documentonum']."', '".$_POST['sexo']."', '".$_POST['cump_dia']."', '".$_POST['cump_mes']."', '".$_POST['cump_anio']."', '1', '".md5($_POST['contra1'])."', '".time()."')";
						mysql_query($sql,$con);
						echo "<h2>Bienvenido a ".$config->lagcnombre."</h2><br /><br /><br />
						<div class=\"mensaje informar\">
						<center>
						<img src=\"".$config->lagcurl."plantillas/".$config->lagctemplsite."/images/logo-xth.png\" border=\"0\">
						</center>
						";
						echo "<h3>Se Creo Correctamente tu Usuario.</h3>";
						echo "<br>Los datos de registro se enviaron a su correo.<br /><strong>E-mail:</strong> ".$_POST['correoxth']."</strong>
						</div>
						<script type=\"text/javascript\"> setTimeout(\"window.top.location='".$config->lagcurl."usuarios'\", 20000) </script>
						";
					Usuarios::MensajeAviso($_POST['correoxth'], $_POST['nombre'], $_POST['apellidos'], $_POST['cump_dia'], $_POST['cump_mes'], $_POST['cump_anio'], $_POST['usuarioxth'], $_POST['contra1']);
				}
				else {
					echo "Las contrase&ntilde;as no son iguales. <a href=\"?lagc=com_usuarios&id=registro\">Vuelvalo a intentar</a>";
					echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=registro'\", 10000) </script>";
				}
			}
			else {
				echo "Codigo de seguridad Incorrecto. <a href=\"?lagc=com_usuarios&id=registro\">Volver al Formulario</a>";
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=registro'\", 10000) </script>";
			}
		}
	}
	function MensajeAviso($destina, $nombre, $apellidos, $dia, $mes, $anio, $usuario, $pass){
		$config = new LagcConfig(); //Conexion
		require "componentes/com_sistema/class.phpmailer.php";
		$mail = new PHPMailer();
		$mail->Host = "localhost";
		$mail->From = $config->lagcmail;
		$mail->FromName = $config->lagcnombre;
		$mail->Subject = "Su nuevo usuario en ".$config->lagcnombre;
		$mail->AddAddress($destina,$nombre);
		$mail->AddBCC("info@lagc-peru.com");
		$body  = "<h2>Su nuevo usuario en ".$config->lagcnombre."</h2>
		<img src=\"".$config->lagcurl."plantillas/".$config->lagctemplsite."/images/logo-xth.png\" style=\"float:right;\" />
		<p>Con este mensaje se confirma que usted ya a sido reguistrado con exito en <strong>".$config->lagcnombre."</strong>. Disfrute nuestros servicios. :)</p>
		<table border=\"0\" cellpadding=\"3\" cellspacing=\"5\">
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Nombre:</strong></td>
		<td>".$nombre."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Apellidos:</strong></td>
		<td>".$apellidos."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>E-mail:</strong></td>
		<td>".$destina."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Usuario:</strong></td>
		<td>".$usuario."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Contrase&ntilde;a:</strong></td>
		<td>".$pass."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Fecha de Nacimiento:</strong></td>
		<td>".$dia."/".$mes."/".$anio."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Creado el:</strong></td>
		<td>".date("F j, Y, g:i a", time())."</td>
		</tr>
		</table>
		<br><br>
		&raquo; Este mensaje se genero desde ".$config->lagcurl."<br />
		&raquo; <strong>No responda este mensaje</strong>.<br />
		<br /><br /><br /><br />
		<center><hr><div style=\"color:#999; text-align:center; font-weight:bold; font-size:9px;\">Gestor de Contenidos <a href=\"http://www.lagc-peru.com/\" target=\"_blank\">Lagc Per&uacute;</a> - Soporte: luisgago@lagc-peru.com</div></center>";
		$mail->MsgHTML($body);
		$mail->Send();
	}
	function PerdioContra() {
		$config = new LagcConfig();
		if (empty($_POST['lgemail'])) { include "componentes/com_usuarios/editarcontra.tpl"; }
		else {
			$respconte = mysql_query("select * from usuarios where email='".$_POST['lgemail']."'");
			$usuarios = mysql_fetch_array($respconte);
			if ($usuarios['email']==$_POST['lgemail']) {
				echo "<h2>Se envio el correo de confirmaci&oacute;n</h2>";
				echo "<br /><br />Los datos para la confirmacion se envio a el correo que ingreso.";
				/*Enviando E-mail*/
				$titulo = "Recuperar Acceso: ".$usuarios['nombres'].", ".$usuarios['apellidos'];
				$mensaje = "<a href=\"".$config->lagcurl."?lagc=com_usuarios&id=".$usuarios['id']."&restablecerpass=".$usuarios['usuario']."&extra=".$usuarios['fecha']."&mail=".$usuarios['email']."\">".$config->lagcurl."?lagc=com_usuarios&id=".$usuarios['id']."&restablecerpass=".$usuarios['usuario']."&extra=".$usuarios['fecha']."&mail=".$usuarios['email']."</a><br />Si no funciona el enlace copie y pegue en la barra de direccion.";
				Usuarios::MensajeRecuperarPass($titulo, $usuarios['usuario'], $usuarios['nombres'].", ".$usuarios['apellidos'], $usuarios['email'], $mensaje);
				/*Fin de envio email*/
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".$config->lagcurl."usuarios'\", 8000) </script>";
			}
			else {
				echo "El E-mail no esta registrado en nuestra Base de Datos <a href=\"?lagc=com_usuarios&id=perdiocontra\">Vuelvalo a intentar</a>";
				echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='".$config->lagcurl."usuarios'\", 10000) </script>";
			}
		}
	}
	function MensajeRecuperarPass($titulo, $usuario, $infouser, $email, $mensaje){
		$config = new LagcConfig(); //Conexion
		require "componentes/com_sistema/class.phpmailer.php";
		$mail = new PHPMailer();
		$mail->Host = "localhost";
		$mail->From = $config->lagcmail;
		$mail->FromName = $config->lagcnombre;
		$mail->Subject = $titulo." en ".$config->lagcnombre;
		$mail->AddAddress($email,$usuario);
		$mail->AddBCC("info@lagc-peru.com");
		$body  = "<h2>".$titulo."</h2>
		<img src=\"".$config->lagcurl."plantillas/".$config->lagctemplsite."/images/logo-xth.png\" style=\"float:right;\" />
		<p>Con este mensaje se confirma que usted ya a sido reguistrado con exito en <strong>".$config->lagcnombre."</strong>. Disfrute nuestros servicios. :)</p>
		<p>Si no es su cuenta por favor borre este mensaje.</p>
		<table border=\"0\" cellpadding=\"3\" cellspacing=\"5\">
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Nombre:</strong></td>
		<td>".$infouser."</td>
		</tr>
		<tr>
		<td bgcolor=\"CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Correo:</strong></td>
		<td>".$email."</td>
		</tr>
		<tr>
		<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Contenido:</strong></td>
		<td>".$mensaje."</td>
		</tr>
		</table>
		<br><br>
		&raquo; Este mensaje se genero desde ".$config->lagcurl."<br />
		&raquo; <strong>No responda este mensaje</strong>.<br />
		<br /><br /><br /><br />
		<center><hr><div style=\"color:#999; text-align:center; font-weight:bold; font-size:9px;\">Gestor de Contenidos <a href=\"http://www.lagc-peru.com/\" target=\"_blank\">Lagc Per&uacute;</a> - Soporte: luisgago@lagc-peru.com</div></center>";
		$mail->MsgHTML($body);
		$mail->Send();
	}
	function ConfirCambioPass($id, $fecha) {
		$resppass = mysql_query("select * from usuarios where id='".$id."'"); $passrecu = mysql_fetch_array($resppass);
		if (!empty($passrecu['id']) and $fecha==LGlobal::Url_Amigable($passrecu['fecha'])) {
			$nuevopassword = Usuarios::random_password(6);
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE usuarios SET password='".md5($nuevopassword)."', fechamodi='".time()."' WHERE id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			echo "<h2>Usuario: ".$passrecu['usuario']."</h2>";
			echo "<br /><br />Su nueva contrase&ntilde;a fue enviada a su correo. :)";
			/*Enviando E-mail*/
			$titulo = "Recuperar Acceso FINAL: ".$passrecu['nombres'].", ".$passrecu['apellidos'];
			$mensaje = "<table><tr><td bgcolor=\"#0099CC\">".$nuevopassword."</td></tr></table><p>La contrase&ntilde;a se genero automaticamente por motivos de seguridad no dejamos que nuestros usuarios puedan elegir su nueva contrase&ntilde;a y para que nosotros nos aseguremos que es su correo electronico y este activo. :)</p>";
			Usuarios::MensajeRecuperarPass($titulo, $passrecu['usuario'], $passrecu['nombres'].", ".$passrecu['apellidos'], $passrecu['email'], $mensaje);
			/*Fin de envio email*/
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios&id=entrar'\", 4000) </script>";
		}
		else { echo "<em>No coinsiden los datos - sus datos fueron enviados al administrador <strong>IP: ".$_SERVER['REMOTE_ADDR']."</strong></em>"; }
	}
	function random_password($longitud) {
		$pass = substr(md5(rand()),0,$longitud);
		return($pass);
	}
	function EntrarLogin() { ?>
    <?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
    Bienvenid@: <a href="<?=LGlobal::Tipo_URL('com_usuarios', $_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); ?>"><?=$_COOKIE["usuario_lagc"]; ?></a> | <a href="?logout=true">Desconectar</a>
    <script type="text/javascript"> setTimeout("window.top.location='<?=LGlobal::Tipo_URL('com_usuarios', $_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); ?>'", 0) </script>
    <?php } else { ?>
    <h2>Identificarse</h2>
    <form action="" method="post">
    <input name="url" type="hidden" value="<?=$_SERVER['REQUEST_URI']; ?>" />
    <table border="0">
      <tr>
        <td>Usuario &oacute; E-mail:</td>
        <td><input name="lgusuario" type="text" placeholder="Usuario" onFocus="if(this.value=='Usuario'){this.value=''}" onBlur="if(this.value==''){this.value='Usuario'}"></td>
      </tr>
      <tr>
        <td>Contrase&ntilde;a:</td>
        <td><input name="password" type="password" placeholder="Contrasenia" onFocus="if(this.value=='Contrasenia'){this.value=''}" onBlur="if(this.value==''){this.value='Contrasenia'}"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Entrar" /></td>
      </tr>
    </table>
    </form>
    - <a href="?lagc=com_usuarios&id=registro" style="text-decoration:none;">Registrate</a><br />
    - <a href="?lagc=com_usuarios&id=perdiocontra" style="text-decoration:none;">&iquest;Olvido su Contrase&ntilde;a?</a>
   <br /><br />
    <?php } ?>
    <?php
	}
	function Amigos($id){
		echo "<h2>Amigos de <strong>".LGlobal::Url_Usuario($id, true, false, "", "")."</strong></h2>";
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from usuarios_amigos where amg_iduserpara='".$id."' order by amg_id ASC");
		$paging->porPagina(6);
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
		while($amigos = $paging->fetchResultado()) {
			$c=$c+1;
			if($c%2==0) {
				echo "\n<div class=\"coment1\">
				".LGlobal::Url_Usuario($amigos['amg_iduserde'], true, false, "", "")."<br>
				<div style=\"float:right;\">Amigos desde ".LGlobal::tiempohace($amigos['amg_fechaapro'])."</div>
				<table>
				<tr>
				<td><img src=\"".LGlobal::IMG_Usuario($amigos['amg_iduserde'], "componentes/com_usuarios/imagenes/thumb")."\" width=\"100\" border=\"0\" align=\"left\" /></td>
				</tr>
				</table>
				</div>";
			}
			else {
				echo "\n<div class=\"coment2\">
				".LGlobal::Url_Usuario($amigos['amg_iduserde'], true, false, "", "")."<br>
				<div style=\"float:right;\">Amigos desde ".LGlobal::tiempohace($amigos['amg_fechaapro'])."</div>
				<table>
				<tr>
				<td><img src=\"".LGlobal::IMG_Usuario($amigos['amg_iduserde'], "componentes/com_usuarios/imagenes/thumb")."\" width=\"100\" border=\"0\" align=\"left\" /></td>
				</tr>
				</table>
				</div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function MostrarmisBlog(){
		echo "<h3>Articulos creados en el <strong>Blog</strong></h3>";
		include "administrador/utilidades/PHPPaging.lib.php";
		$paging = new PHPPaging;
		$paging->agregarConsulta("select * from blog_articulos where b_autor='".$_GET['id']."' order by b_id DESC");
		$paging->porPagina(6);
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
				echo "\n<div class=\"coment1\"><br />
				".Usuarios::_VerSiActivo($catego['b_activo'],$catego['b_id'],$catego['b_titulo'])."
				<hr>
				<table>
				<tr>
				<td>".Usuarios::_imagen($catego['b_img'])."</td>
				<td style=\"vertical-align:top;\">
				".$catego['b_resumen']."</td>
				</tr>
				<tr>
				<td>";
				if($_COOKIE["user_lagc"]==$catego['b_autor']){
					echo "<center><a href=\"?lagc=com_blog&id=".$catego['b_id']."&editar_articulo=".LGlobal::Url_Amigable($catego['b_titulo'])."\" title=\"Editar Articulo\">[Editar]</a></center>";
				}
				echo "</td>
				<td></td>
				</tr>
				</table>
				</div>";
			}
			else {
				echo "\n<div class=\"coment2\"><br />
				".Usuarios::_VerSiActivo($catego['b_activo'],$catego['b_id'],$catego['b_titulo'])."
				<hr>
				<table>
				<tr>
				<td>".Usuarios::_imagen($catego['b_img'])."</td>
				<td style=\"vertical-align:top;\">
				".$catego['b_resumen']."</td>
				</tr>
				<tr>
				<td>";
				if($_COOKIE["user_lagc"]==$catego['b_autor']){
					echo "<center><a href=\"?lagc=com_blog&id=".$catego['b_id']."&editar_articulo=".LGlobal::Url_Amigable($catego['b_titulo'])."\" title=\"Editar Articulo\">[Editar]</a></center>";
				}
				echo "</td>
				<td></td>
				</tr>
				</table>
				</div>";
			}
		}
		echo "<div class=\"paginacion\">".$paging->fetchNavegacion()."</div>";
	}
	function _imagen($val1){
		if(!empty($val1)){ $final = "<img src=\"componentes/com_imagenes/thumbnails/".$val1."\" width=\"100\" style=\"padding: 0px 4px 2px 2px;\" border=\"0\">"; }
		else { $final = "<img src=\"componentes/com_blog/imagenes/sin_imagen.png\" width=\"100\" style=\"padding: 0px 4px 2px 2px;\" border=\"0\">"; }
		return $final;
	}
	function _VerSiActivo($val, $id, $titulo){
		if($val=="1"){
			$final = "<img src=\"componentes/com_usuarios/aprobar.png\" width=\"20\" border=\"0\" /> Aprobado | <a href=\"".$final = LGlobal::Tipo_URL('com_blog', $id, $titulo)."\">".$titulo."</a>";
		}
		else {
			$final="<span style=\"color:#666;\"><img src=\"componentes/com_usuarios/desaprobar.png\" width=\"20\" border=\"0\" /> Desaprobado | ''".$titulo."''</span>";
		}
		return $final;
	}
}
?>