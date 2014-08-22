<?php
class Formulario {
	function iniciof() { ?>
	<div class="botonesdemando">
    <a href="?lagc=com_programacion&formulario=<?=time(); ?>&configurar=lenguaje"><img src="plantillas/lagc-peru/imagenes/config.gif" border="0" /> Configurar</a>
    <a href="?lagc=com_programacion&formulario=<?=time(); ?>&crear=formulario"><img src="plantillas/lagc-peru/imagenes/nuevo.gif" border="0" /> Nuevo</a>
    </div><br />
    <table border="0" width="70%" cellpadding="0" cellspacing="0" id="product-table">
      <tr>
        <th class="table-header-check">&nbsp;</th>
        <th class="table-header-repeat line-left"><a href="">Titulo</a></th>
        <th class="table-header-repeat line-left"><a href="">Archivo</a></th>
        <th class="table-header-repeat line-left"><a href="">Fecha de Creaci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Ultima Modificaci&oacute;n</a></th>
        <th class="table-header-repeat line-left"><a href="">Act./Desac</a></th>
        <th colspan="3" class="table-header-options line-left"><a href="">Opciones</a></th>
      </tr>
    <?php $respcont = mysql_query("select * from prog_archivos order by id_cont ASC"); while($contac = mysql_fetch_array($respcont)) { ?>
    <?php $c=$c+1; if($c%2==0) { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contac['nombre_cont'], 0, 30)); ?></strong></td>
        <td align="center"><strong><?=$contac['archivo_cont']; ?></strong>.php</td>
        <td align="center"><?=date("Y/m/d", $contac['fecha_cre']); ?></td>
        <td align="center"><?=date("Y/m/d", $contac['fecha_mod']); ?></td>
        <td align="center"><?=Formulario::Activoc($contac['activo']); ?></td>
        <td colspan="3" align="center">
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&editar=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Configurar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&editar_code=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Edit" class="icon-3 info-tooltip"></a>
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&borrar=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } else { ?>
      <tr onMouseover=this.bgColor="#D6D6D6" onMouseout=this.bgColor="#FFFFFF">
        <td><?=$c; ?></td>
        <td><strong><?=ucfirst(substr($contac['nombre_cont'], 0, 30)); ?></strong></td>
        <td align="center"><strong><?=$contac['archivo_cont']; ?></strong>.php</td>
        <td align="center"><?=date("Y/m/d", $contac['fecha_cre']); ?></td>
        <td align="center"><?=date("Y/m/d", $contac['fecha_mod']); ?></td>
        <td align="center"><?=Formulario::Activoc($contac['activo']); ?></td>
        <td colspan="3" align="center">
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&editar=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Configurar" class="icon-1 info-tooltip"></a>
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&editar_code=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Edit" class="icon-3 info-tooltip"></a>
        <a href="?lagc=com_programacion&formulario=<?=$contac['id_cont']; ?>&borrar=<?=LGlobal::Url_Amigable($contac['nombre_cont']); ?>" title="Borrar" class="icon-2 info-tooltip"></a>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </table>
    <?php
	}
	function Activoc($activo) {
		if ($activo==1) { $result = "Activo"; }
		else { $result = "Desactivado"; }
		return $result;
	}
	function editar($id, $url) {
		if (empty($_POST['archivo'])) {
			$respcont = mysql_query("select * from prog_archivos where id_cont='".$id."'");
			$cont = mysql_fetch_array($respcont);
			include "componentes/com_programacion/editar_contacto.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$respconta = mysql_query("select * from prog_archivos where id_cont='".$id."'");
			$contac = mysql_fetch_array($respconta);
			if ($_POST['archivo']=="inicio") { $nombarch = $id."_".time(); } else { $nombarch = $id."_".LGlobal::Url_Amigable($_POST['archivo']); }
			rename ("../componentes/com_programacion/".$contac['archivo_cont'].".php", "../componentes/com_programacion/".$nombarch.".php");
			$sql = "UPDATE contactenos SET nombre_cont='".$_POST['nombre']."', archivo_cont='".$nombarch."', fecha_mod='".time()."', activo='".$_POST['activado']."' WHERE id_cont='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			mysql_close($con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_programacion'\", 1500) </script>";
			echo "<br><br><center><h3>".$_POST['nombre'].".</h3><h4>Se guardo correctamente...</h4></center>";
		}
	}
	function borrar($id, $titulo) {
		$contenidos = mysql_query("select * from prog_archivos where id_cont='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['id_cont']) and $titulo==LGlobal::Url_Amigable($conte['nombre_cont'])) {
			if (empty($_POST['id'])) { ?><center>
            <form name="frmborrar" method="post" action="">
            <input type="hidden" name="id" value="<?=$conte['id_cont']; ?>">
            <input type="hidden" name="title" value="<?=$conte['nombre_cont']; ?>">
            <br /><h3>Esta seguro que desea borrar: <strong><?=$conte['nombre_cont']; ?></strong>?</h3><br>
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_programacion'" class="form-cancel">
            <input type="submit" value="Borrar" class="form-borrar">
            </form></center>
            <?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$respconta = mysql_query("select * from prog_archivos where id_cont='".$id."'");
				$contac = mysql_fetch_array($respconta);
				$archivo = '../componentes/com_programacion/'.$contac['archivo_cont'].'.php';
				unlink($archivo);
				$sql = "DELETE FROM prog_archivos WHERE id_cont='".$id."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE prog_archivos AUTO_INCREMENT =1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_programacion'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>Fue Borrado Correctamente ".$titulo."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el Formulario</h3></center>"; }
	}
	function crear() {
		$config = new LagcConfig(); //Conexion
		if (empty($_POST['archivo'])) {
			include "componentes/com_programacion/crear_contacto.tpl";
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$respconta = mysql_query("select * from contactenos");
			$total = mysql_num_rows($respconta); $total = $total+1;
			if ($_POST['archivo']=="inicio") { $nombarch = $total."_".time(); } else { $nombarch = $total."_".LGlobal::Url_Amigable($_POST['archivo']); }
			$sql = "INSERT INTO prog_archivos (nombre_cont, archivo_cont, fecha_cre, activo) VALUES ('".$_POST['nombre']."', '".$nombarch."', '".time()."','".$_POST['activado']."')";
			mysql_query($sql,$con);
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_programacion'\", 1500) </script><b>Se Creo Correctamente: <em>".$_POST['nombre'].".</em></b>";
			$archivo = '../componentes/com_programacion/'.$nombarch.'.php';
			$fp = fopen($archivo, "a");
			$string = $_POST['nombre'];
			$write = fputs($fp, $string);
			fclose($fp);
		}
	}
	function editar_code($id, $titulo) {
		$respcompo = mysql_query("select * from prog_archivos where id_cont='".$id."'"); $contacto = mysql_fetch_array($respcompo);
		if (!empty($contacto['id_cont']) and $titulo==LGlobal::Url_Amigable($contacto['nombre_cont'])) {
			$configurapla = "componentes/com_programacion/config.xml";
			$archivos = "../componentes/com_programacion/".$contacto['archivo_cont'].".php";
			if (file_exists($configurapla)) {
				$configura = simplexml_load_file($configurapla);
				if($configura){
					foreach ($configura as $configct) {
						LGlobal::EditorCodigo('contenido', $configct->lenguaje,'');
						if (!isset($_POST['contenido'])) {
						echo "<h2>Editando: ".$contacto['nombre_cont']."</h2><br>";
						if($fp = fopen($archivos, "r")){ $data = fread($fp, filesize($archivos)); fclose($fp); }
						else { $data = ""; echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos no son correctos(CHMOD 777).</p>"; }
						?>
                        <h3>Estas editando "<strong><?=$archivos; ?></strong>" y usando el lenguaje "<strong><?=$configct->lenguaje; ?></strong>" para editar el documento.</h3>
                        <center>
                        <form name="formcontac" action="" method="post">
                        <input type="hidden" name="nombrecontac" value="<?=$contacto['nombre_cont']; ?>" />
                        <fieldset><legend><strong>Contenido</strong></legend>
                        <textarea name="contenido" id="contenido" cols="125" rows="30" readonly="readonly"><?php $archivos = str_replace('<', "&lt;", utf8_decode($data)); echo $archivos; ?></textarea>
                        </fieldset>
                        <br /><br />
                        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_programacion'" class="form-cancel">
                        <input type="reset" value="Restablecer" class="form-reset">
                        <input type="submit" value="Guardar" class="form-guardar">
                        </form></center>
                        <?php
						}
						else{
							$newdata = $_POST['contenido'];
							if(@$fp = fopen($archivos, "w")){
								fwrite($fp, stripslashes($newdata));
								fclose($fp);
								echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_programacion'\", 1500) </script>";
								echo "<br><br><center><h3>".$_POST['nombrecontac'].".</h3><h4>Se guardo correctamente...</h4></center>";
							 }
							 else {
								 echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
							 }
						}
					}
				}else { echo "Sintaxi XML inv&aacute;lida Revise el archivo: componentes/com_inicio/config.xml\n"; }
			} else { echo "Error abriendo: <em>componentes/com_inicio/config.xml</em>\n"; }
		}
		else { echo "<em>No existe el Formulario</em>";}
	}
	function Configurar() {
		$configurapla = "componentes/com_programacion/config.xml";
		if (file_exists($configurapla)) {
			$plantillas = simplexml_load_file($configurapla);
			if($plantillas){
				foreach ($plantillas as $plantilla) { ?>
      <?php if (!isset($_POST['lenguaje'])) { ?>
      <form name="config" action="" method="post">
      <fieldset><legend><strong>Configurar Lenguaje</strong></legend>
      <table width="300">
			<?php
			$lenguajes = array("html"=>"Html", "php"=>"Php", "css"=>"Css", "js"=>"Js", "xml"=>"Xml", "sql"=>"Sql", "basic"=>"Basic");
            ?>
          <tr>
          	<th align="right">Lengaje:</th>
          	<td colspan="4">
            <select name="lenguaje">
			<?php
			ksort($lenguajes);
            foreach ($lenguajes as $key => $val) {
                if ($plantilla->lenguaje==$key) {
					echo "<option value=\"$key\" selected>$val</option>"; }
				else {
					echo "<option value=\"$key\">$val</option>"; }
            }
			?>
            </select>
            </td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <th colspan="4" align="center" valign="top">
            <input type="button" value="Cancelar" onclick="location.href='?lagc=com_programacion'" class="form-cancel">
            <input type="reset" value="Restablecer" class="form-reset">
            <input type="submit" value="Guardar" class="form-guardar">
			</th>
            </tr>
        </table>
        </fieldset>
        </form>
		<?php
        }
        else{
            // El contenido del archivo
            $archi = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $archi .= "<configuracion>\n";
            $archi .= "    <variables>\n";
			$archi .= "       <lenguaje>".$_POST['lenguaje']."</lenguaje>\n";
            $archi .= "    </variables>\n";
            $archi .= "</configuracion>";
            // Se abre el archivo (si no existe se crea)
            $archivo = fopen($configurapla, 'w');
            $error = 0;
            if (!isset($archivo)) {
                $error = 1;
                print "No se ha podido crear/abrir el archivo.<br />";
            }
            elseif (!fwrite($archivo, $archi)) {
                $error = 1;
                print "No se ha podido escribir en el archivo.<br />";
            }
            @fclose();
            if ($error == 0) {
                echo "Datos actualizados.<br />";
                echo "<a href=\"?lagc=com_inicio\">< Regresar</a>";
                echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_programacion'\", 1500) </script>";
            }
        }
		}
		  } else { echo "Sintaxi XML inv&aacute;lida Revise el archivo: componentes/com_programacion/config.xml\n"; }
	  } else { echo "Error abriendo: <em>componentes/com_programacion/config.xml</em>\n"; }
	}
}
?>