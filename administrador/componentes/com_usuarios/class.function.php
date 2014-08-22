<?php
class usuarios {
	function iniciou() { ?>
    <div class="botonesdemando"><a href="?lagc=com_usuarios&usuarios=<?=time(); ?>&crear=usuario" title="Aqui Puede Crear un nuevo Usuario" class="info-tooltip"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Crear Nuevo</a></div><br />
    <table border="0" id="product-table">
      <tr>
        <td class="table-header-check">&nbsp;</td>
        <th class="table-header-repeat line-left"><a href="">Usuario</a></th>
        <th class="table-header-repeat line-left"><a href="">E-mail</a></th>
        <th class="table-header-repeat line-left"><a href="">Nombre</a></th>
        <th class="table-header-repeat line-left"><a href="">Apellidos</a></th>
        <th class="table-header-repeat line-left"><a href="">Documento</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Crea.</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha Mod.</a></th>
        <th class="table-header-repeat line-left"><a href="">Activo</a></th>
        <th class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respuser = mysql_query("select * from usuarios where id!=1 order by id ASC"); while($usuarios = mysql_fetch_array($respuser)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=$usuarios['usuario']; ?></strong></td>
        <td><?=$usuarios['email']; ?></td>
        <td><?=$usuarios['nombres']; ?></td>
        <td><?=$usuarios['apellidos']; ?></td>
        <td><?=usuarios::TipoDoc($usuarios['doc_tipo'])." ".$usuarios['doc_num']; ?></td>
        <td><?=date("Y/m/d", $usuarios['fecha']); ?></td>
        <td><?=date("Y/m/d", $usuarios['fechamodi']); ?></td>
        <td><?=usuarios::activou($usuarios['activo']); ?></td>
        <td>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&editar=<?=$usuarios['email']; ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&borrar=<?=$usuarios['usuario']; ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&contrasenia=<?=$usuarios['email']; ?>" title="Cambiar Contrase&ntilde;a" class="icon-3 info-tooltip"></a>
        <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>Mas datos Importantes de <b><?=$usuarios['nombres']." ".$usuarios['apellidos']; ?></b>.</p><p class=\'espacio-ventana\'>&nbsp;</p><p class=\'espacio-ventana\'><b>Id:</b> <?=$usuarios['id']; ?></p><p class=\'espacio-ventana\'><b>Componentes:</b> <?=$usuarios['componentes']; ?></p>');return false;" title="Mas Informaci&oacute;n" class="icon-5 info-tooltip"></a>
        </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=$usuarios['usuario']; ?></strong></td>
        <td><?=$usuarios['email']; ?></td>
        <td><?=$usuarios['nombres']; ?></td>
        <td><?=$usuarios['apellidos']; ?></td>
        <td><?=usuarios::TipoDoc($usuarios['doc_tipo'])." ".$usuarios['doc_num']; ?></td>
        <td><?=date("Y/m/d", $usuarios['fecha']); ?></td>
        <td><?=date("Y/m/d", $usuarios['fechamodi']); ?></td>
        <td><?=usuarios::activou($usuarios['activo']); ?></td>
        <td>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&editar=<?=$usuarios['email']; ?>" title="Editar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&borrar=<?=$usuarios['usuario']; ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        <a href="?lagc=com_usuarios&usuarios=<?=$usuarios['id']; ?>&contrasenia=<?=$usuarios['email']; ?>" title="Cambiar Contrase&ntilde;a" class="icon-3 info-tooltip"></a>
        <a href="#" onclick="Sexy.info('<p class=\'espacio-ventana\'>Mas datos Importantes de <b><?=$usuarios['nombres']." ".$usuarios['apellidos']; ?></b>.</p><p class=\'espacio-ventana\'>&nbsp;</p><p class=\'espacio-ventana\'><b>Id:</b> <?=$usuarios['id']; ?></p><p class=\'espacio-ventana\'><b>Componentes:</b> <?=$usuarios['componentes']; ?></p>');return false;" title="Mas Informaci&oacute;n" class="icon-5 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function activou($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
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
	function editar($id, $email) {
		if (empty($_POST['email'])) {
			$respuser = mysql_query("select * from usuarios where id='".$id."'");
			$user = mysql_fetch_array($respuser);
			include "componentes/com_usuarios/editar_usuario.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE usuarios SET nombres='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', doc_tipo='".$_POST['documentotipo']."', doc_num='".$_POST['documentonum']."', cump_dia='".$_POST['cump_dia']."', cump_mes='".$_POST['cump_mes']."', cump_anio='".$_POST['cump_anio']."', fechamodi='".time()."', email='".$_POST['email']."', tipo='".$_POST['tipo']."', sexo='".$_POST['sexo']."', activo='".$_POST['activar']."' WHERE id='".$_POST['id']."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 1500) </script><br><center><h3>Se Guardo Correctamente.</h3></center>";
			mysql_close($con);
			if ($_POST['tipo']==1) {
				$componentes = implode ('|', $_POST["componentes"]);
				$sql = "UPDATE usuarios SET componentes='".$componentes."', fechamodi='".time()."' WHERE id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			}
		}
	}
	function borrar($id, $titulo) {
		$contenidos = mysql_query("select * from usuarios where id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['id']) and $titulo==LGlobal::Url_Amigable($conte['usuario'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['id']; ?>">
            <input type="hidden" name="title" value="<?=$conte['usuario']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['usuario']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_usuarios'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				if ($id!=1) {
					$config = new LagcConfig(); //Conexion
					$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
					mysql_select_db($config->lagcbd,$con);
					$sql = "DELETE FROM usuarios WHERE id='".$_POST['id']."'";
					$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
					$sql = "ALTER TABLE usuarios AUTO_INCREMENT=1";
					$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
					mysql_close($con);
					echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 1500) </script><center><h3><b><em>".$_POST['title']."</em></b>.</h3><h4>Borrado Correctamente</h4></center>";
				}
				else { echo "<br><center><h3>El Usuario Principal No es Posible Borrar!!!</h3></center> <div style=\"float:right;\"><a href=\"?lagc=com_usuarios\"><br><h3>< Atras</h3></center></a></div>";
				}
			}
		} else { echo "<br><center><h3>No existe el Usuario</h3></center>"; }
	}
	function contrasenia($id, $email) {
		if (empty($_POST['passport'])) {
			$respuser = mysql_query("select id, usuario from usuarios where id='".$id."'");
			$user = mysql_fetch_array($respuser);
			include "componentes/com_usuarios/contrasenia_usuario.tpl";
		}
		else {
			if ($_POST['passport']==$_POST['passport2']) {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "UPDATE usuarios SET fechamodi='".time()."', password='".md5($_POST['passport'])."' WHERE id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 1500) </script><br><center><h3>Se Guardo Correctamente la Contrase&ntilde;a.</h3></center>";
				mysql_close($con);
			}
			else { echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 1500) </script><br><center><h3>Las contrase&ntilde;as no coinciden.</h3></center>"; }
		}
	}
	function crear() {
		if (empty($_POST['email'])) {
			include "componentes/com_usuarios/crear_usuario.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			$respconte = mysql_query("select * from usuarios where email='".$_POST['email']."'"); $usuarios = mysql_fetch_array($respconte);
			$respconte1 = mysql_query("select * from usuarios where usuario='".$_POST['usuario']."'"); $usuarios1 = mysql_fetch_array($respconte1);
			if ($usuarios['email']==$_POST['email']) {
				echo "<br><center><h3>El <strong>Email</strong> ya esta registrado. <a href=\"?lagc=com_usuarios&usuarios=".time()."&crear=usuario\">Vuelvalo a intentar</a></h3></center>";
			}
			else if ($usuarios1['usuario']==$_POST['usuario']) {
				echo "<br><center><h3>El <strong>Usuario</strong> ya esta registrado. <a href=\"?lagc=com_usuarios&usuarios=".time()."&crear=usuario\">Vuelvalo a intentar</a></h3></center>";
			}
			else {
				if ($_POST['contra1']==$_POST['contra2']) {
					$sql = "INSERT INTO usuarios (usuario, email, nombres, apellidos, doc_tipo, doc_num, sexo, cump_dia, cump_mes, cump_anio, activo, password, fecha) VALUES ('".strtolower($_POST['usuario'])."', '".strtolower($_POST['email'])."', '".strtolower($_POST['nombre'])."', '".strtolower($_POST['apellidos'])."', '".$_POST['documentotipo']."', '".$_POST['documentonum']."', '".$_POST['sexo']."', '".$_POST['cump_dia']."', '".$_POST['cump_mes']."', '".$_POST['cump_anio']."', '1', '".md5($_POST['contra1'])."', '".time()."')";
					mysql_query($sql,$con);
					echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_usuarios'\", 2500) </script>
					<br><center><h3>Se creo correctamente.</h3></center>";
					echo "<br><h4><strong>E-mail:</strong> ".$_POST['email']."</h4>";
					echo "<br><h4>Los datos de registro se enviaron a su correo.</h4>";
				/*Enviando E-mail*/
				$to  = strtolower($_POST['nombre']).' <'.strtolower($_POST['email']).'>' . ', ';// para
				$subject = "Nuevo Usuario: ".strtolower($_POST['nombre']).", ".strtolower($_POST['apellidos']);
				$message = '
				<html>
				<head>
				<title>Nuevo Usuario: '.strtolower($_POST['nombre']).', '.strtolower($_POST['apellidos']).'</title>
				</head>
				<body><!--'.$_POST['contra1'].'-->
				<p>Nuevo Usuario: <b>'.$_POST['nombre'].', '.$_POST['apellidos'].'</b></p>
				<table border="0" cellpadding="3" cellspacing="5">
				<tr>
				<td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Nombre:</strong></td>
				<td>'.strtolower($_POST['nombre']).'</td>
				</tr>
				<tr>
				<td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Apellidos:</strong></td>
				<td>'.strtolower($_POST['apellidos']).'</td>
				</tr>
				<tr>
				<td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>E-mail:</strong></td>
				<td>'.$_POST['email'].'</td>
				</tr>
				<tr>
				<td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Fecha de Nacimiento:</strong></td>
				<td>'.$_POST['cump_dia'].'/'.$_POST['cump_mes'].'/'.$_POST['cump_anio'].'</td>
				</tr>
				<tr>
				<td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Creado el:</strong></td>
				<td>'.date("F j, Y, g:i a", $_POST['fecha']).'</td>
				</tr>
				</table>
				<br><br>
				<center><div style="color:#999; text-align:center; font-weight:bold; font-size:9px;">Gestor de Contenidos <a href="http://www.lagc-peru.com/" target="_blank">Lagc Per&uacute;</a> - Contacto: luisgago@lagc-peru.com</div></center>
				</body>
				</html>';// message
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	// Additional headers
	$headers .= 'To: '.$config->lagcnombre.' <'.$config->lagcmail.'>' . "\r\n";
	$headers .= 'From: '.$config->lagcnombre.' <'.$config->lagcmail.'>' . "\r\n";
	// Mail it
	mail($to, $subject, $message, $headers);
			/*Fin de envio email*/
			
				}
				else { echo "<br><center><h3>Las contrase&ntilde;as no son iguales. <a href=\"?lagc=com_usuarios&usuarios=".time()."&crear=usuario\">Vuelvalo a intentar</a></h3></center>"; }
			}
		}
	}
}
?>