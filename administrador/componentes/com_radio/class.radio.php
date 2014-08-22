<?php
class RadioLG{
	function InicioR(){ ?>
		<br><br><br>
		<center>
		<div class="marco_about">
		<h4>Administrador de La Radio XtH</h4>
		</div>
		</center>
		<br><br><br><br>
		<center>
		<div class="botones_about">
		<a href="?lagc=com_radio&radiolg=<?=time(); ?>&lista_radio=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Lista Radios</a>
		</div>
		<div class="botones_about">
		<a href="?lagc=com_radio&radiolg=<?=time(); ?>&salu2_radio=<?=time(); ?>"><img src="plantillas/lagc-peru/imagenes/folder.gif" border="0" /> Saludos!</a>
		</div>
		</center>
		<br><br><br><br><br><br><br>
		<div class="marco_about">
		<strong>Desarrollado por:</strong> Lagc Per&uacute;<br>
		Soporte Tecnico : <a href="http://lagc-peru.com/programacion/1-contactenos" target="_blank">Clic Aqui</a>
		</div>
		<?php
	}
	function ListarRadios(){ ?>
		<div class="botones_about">
			<a href="?lagc=com_radio">&laquo; Atras</a>
		</div><br /><br />
		<p>Lista de Radios Disponibles</p>
		<a href="?lagc=com_radio&radiolg=<?=time(); ?>&crear_radio=<?=time(); ?>">Agregar</a>
		<ul class="listard">
			<?php RadioLG::EscogerURl(); ?>
		</ul>
		<?php
	}
	function EscogerURl(){
		$rptrd = mysql_query("select * from radio_emosoras order by rd_id DESC");
		while($radios = mysql_fetch_array($rptrd)) {
			echo "<li>".$radios['rd_nombre']."<a href=\"?lagc=com_radio&radiolg=".$radios['rd_id']."&editar_radio=".LGlobal::Url_Amigable($radios['rd_nombre'])."\" class=\"prord\">[Editar]</a><a href=\"?lagc=com_radio&radiolg=".$radios['rd_id']."&borrar_radio=".LGlobal::Url_Amigable($radios['rd_nombre'])."\" class=\"prord\">[Borrar]</a>".RadioLG::VerActual($radios['rd_estado'],$radios['rd_id'],$radios['rd_nombre'])."</li>\n";
		}
	}
	function VerActual($valor1,$id,$nombre){
		if($valor1==2) { $final = "<a href=\"?lagc=com_radio&radiolg=".$id."&usar_radio=".LGlobal::Url_Amigable($nombre)."\" class=\"prord\">[Usar]</a>"; }
		else { $final = "<span style=\"color:#0C0; font-weight:bold;\" class=\"prord\">En Linea</span>"; }
		return $final;
	}
	function Nuevo() {
		if (empty($_POST['nombre'])) { ?>
			<div class="botones_about">
				<a href="?lagc=com_radio&radiolg=<?=time(); ?>&lista_radio=<?=time(); ?>">&laquo; Atras</a>
			</div><br /><br />
			<strong>Creando Emisora:</strong>
			<form action="" method="post">
				<table border="0">
				<tr>
					<td>Nombre</td>
					<td><input name="nombre" class="inp-form" /></td>
				<tr>
				<tr>
					<td><br />Enlace</td>
					<td><br /><input name="enlace" class="inp-form" /></td>
				<tr>
					<td colspan="2" align="center">
					<input type="button" value="Cancelar" onclick="location.href='?lagc=com_radio&radiolg=<?=time(); ?>&lista_radio=<?=time(); ?>'" class="form-cancel">
					<input type="submit" value="Guardar" class="form-guardar" /></td>
				</tr>
				</table>
			</form>
			<?php
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "INSERT INTO radio_emosoras (rd_nombre, rd_url) VALUES ('".$_POST['nombre']."', '".$_POST['enlace']."')";
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&lista_radio=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['nombre'].".</h3><h4>Se creo correctamente...</h4></center>";
			mysql_query($sql,$con);
		}
	}
	function Editar($id, $url){
		if (empty($_POST['nombre'])) {
			$respcont = mysql_query("select * from radio_emosoras where rd_id='".$id."'"); $cont = mysql_fetch_array($respcont);
			if (!empty($cont['rd_id']) and $url==LGlobal::Url_Amigable($cont['rd_nombre'])) {
			?>
			<strong>Editando Emisora:</strong> <?=$cont['rd_nombre']; ?>
			<form action="" method="post">
				<table border="0">
				<tr>
					<td>Nombre</td>
					<td><input name="nombre" value="<?=$cont['rd_nombre']; ?>" class="inp-form" /></td>
				<tr>
				<tr>
					<td><br />Enlace</td>
					<td><br /><input name="enlace" value="<?=$cont['rd_url']; ?>" class="inp-form" /></td>
				<tr>
					<td colspan="2" align="center">
					<input type="button" value="Cancelar" onclick="location.href='?lagc=com_radio&radiolg=<?=time(); ?>&lista_radio=<?=time(); ?>'" class="form-cancel">
					<input type="submit" value="Guardar" class="form-guardar" /></td>
				</tr>
				</table>
			</form>
		<?php
			} else { echo "<br><center><h3>No existe el Articulo</h3></center>"; }
		}
		else {
			$config = new LagcConfig(); //Conexion
			$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			mysql_select_db($config->lagcbd,$con);
			$sql = "UPDATE radio_emosoras SET rd_nombre='".$_POST['nombre']."', rd_url='".$_POST['enlace']."' WHERE rd_id='".$id."'";
			$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
			echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&lista_radio=".time()."'\", 1500) </script>
			<br><br><center><h3>".$_POST['nombre'].".</h3><h4>Se Edito correctamente...</h4></center>";
			mysql_close($con);
		}
	}
	function Borrar($id, $titulo) {
		$contenidos = mysql_query("select * from radio_emosoras where rd_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['rd_id']) and $titulo==LGlobal::Url_Amigable($conte['rd_nombre'])) {
			if (empty($_POST['id'])) { ?><center>
			<form name="frmborrar" method="post" action="">
			<input type="hidden" name="id" value="<?=$conte['rd_id']; ?>">
			<input type="hidden" name="title" value="<?=$conte['rd_nombre']; ?>">
			<br /><h3>Esta seguro que desea borrar: <strong><?=$conte['rd_nombre']; ?></strong>?</h3><br>
			<input type="button" value="Cancelar" onclick="location.href='?lagc=com_radio&radiolg=<?=time(); ?>&lista_radio=<?=time(); ?>'" class="form-cancel">
			<input type="submit" value="Borrar" class="form-borrar">
			</form></center>
			<?php
			}
			else {
				$config = new LagcConfig(); //Conexion
				$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
				mysql_select_db($config->lagcbd,$con);
				$sql = "DELETE FROM radio_emosoras WHERE rd_id='".$_POST['id']."'";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				$sql = "ALTER TABLE radio_emosoras AUTO_INCREMENT=1";
				$Query = mysql_query ($sql, $con) or die ("Error: <b>" . mysql_error() . "</b>");
				mysql_close($con);
				echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&lista_radio=".time()."'\", 1500) </script><center><h4>Borrado Correctamente</h4> <h3><b><em>".$_POST['title']."</em></b>.</h3></center>";
			}
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
	function UsarEmisora($id, $titulo){
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		$contenidos = mysql_query("select * from radio_emosoras where rd_id='".$id."'"); $conte = mysql_fetch_array($contenidos);
		if (!empty($conte['rd_id']) and $titulo==LGlobal::Url_Amigable($conte['rd_nombre'])) {
			$allcont = mysql_query("select * from radio_emosoras order by rd_id DESC");
			while($conte = mysql_fetch_array($allcont)){
				if($id==$conte['rd_id']){
					$sql = "UPDATE radio_emosoras SET rd_estado='1' WHERE rd_id='".$id."'";
					mysql_query($sql, $con);
				}
				else if($id!=$conte['rd_id']){
					$sql = "UPDATE radio_emosoras SET rd_estado='2' WHERE rd_id='".$conte['rd_id']."'";
					mysql_query($sql, $con);
				}
			}
			mysql_close($con);
			echo "<br /><script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&lista_radio=".time()."'\", 1500) </script><center><h4>Radio Actual</h4> <h3><b><em>".$titulo."</em></b>.</h3></center>";
		} else { echo "<br><center><h3>No existe el articulo</h3></center>"; }
	}
	function MendarSalu2(){ ?>
    <center><h2>Enviar Saludos por la Radio</h2></center>
		<a href="?lagc=com_radio">&laquo; Atras</a>
		<?php
        $configurapla = "componentes/com_radio/config.xml";
        if (file_exists($configurapla)) {
            $plantillas = simplexml_load_file($configurapla);
            if($plantillas){
                foreach ($plantillas as $plantilla) { ?>
                <center>
        <table width="800" border="0" align="center">
          <tr>
            <td valign="top" align="center"><?php $archivos = "../componentes/com_radio/comentario.php"; ?>
              <?php if (!isset($_POST['contenido'])) { ?>
              <?php if ($plantilla->tipo==2) { echo LGlobal::Editor(); } elseif ($plantilla->tipo==1) { LGlobal::EditorCodigo('contenido', $plantilla->lenguaje,''); }
              if($fp = fopen($archivos, "r")){
                  $data = fread($fp, filesize($archivos));
                  fclose($fp);
              } else {
                  $data = "";
                  echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
              }
              ?>
              <form name="conteinicio" action="" method="post">
                <fieldset>
                  <legend><strong>Contenido</strong></legend>
                  <textarea name="contenido" id="contenido" cols="80" rows="30"><?=$data; ?></textarea>
                </fieldset>
                <br />
                <br />
                <input type="button" value="Cancelar" onclick="location.href='?lagc=com_radio'" class="form-cancel">
                <input type="reset" value="Restablecer" class="form-reset">
                <input type="submit" value="Guardar" class="form-guardar">
              </form>
              <div id="message-blue">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr>
              <td class="blue-left"><center>Agregar linea cuando salga los caracteres con sinbolos extraños. Al Principio de todo el codigo.<br /> <code>&lt;?php header('Content-Type: text/html; charset=iso-8859-1'); ?></code></center></td>
              <td class="blue-right"><a class="close-blue"><img src="plantillas/lagc-peru/imagenes/table/icon_close_blue.gif" /></a></td>
              </tr>
              </table>
              </div>
              <?php }
              else{
                  $newdata = $_POST['contenido'];
                  if(@$fp = fopen($archivos, "w")){
                      fwrite($fp, stripslashes($newdata));
                      fclose($fp);
                      echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&salu2_radio=".time()."'\", 1500) </script>";
                      echo "Se guardo correctamente.<br><br>";
                      echo "<a href=\"?lagc=com_radio\">< Regresar</a>";
                   }
                   else {
                       echo "<h1>Error</h1>\n<p>No se puede escribir el archivo, asegurate que los permisos son correctos(CHMOD 777).</p>";
                   }
              }
              ?></td>
            <td valign="top"><div id="related-activities">
                <div id="related-act-top"> <img src="plantillas/lagc-peru/imagenes/forms/header_related_act.gif" width="271" height="43" /> </div>
                <div id="related-act-bottom">
                  <div id="related-act-inner">
                    <div class="left"><a><img src="plantillas/lagc-peru/imagenes/forms/icon_plus.gif" width="21" height="21" /></a></div>
                     <form name="config" action="" method="post">
                     <div class="right">
                    <h5>Habilitar</h5>
                    <br />
                    <?php if (!isset($_POST['tipo'])) { ?>
                      <ul class="greyarrow">
                        <?php
                        $acti = array("1"=>"<li>Html:<input type=\"radio\" name=\"tipo\" checked=\"checked\" value=\"1\"></li><li>Editor:<input type=\"radio\" name=\"tipo\" value=\"2\"></li>", "2"=>"<li>Html:<input type=\"radio\" name=\"tipo\" value=\"1\"></li><li>Editor:<input type=\"radio\" name=\"tipo\" checked=\"checked\" value=\"2\"></li>");
                        ksort($acti);
                        foreach ($acti as $key => $val) {
                            if ($plantilla->tipo==$key) {
                                echo $val;
                            }
                        }
                        ?>
                      </ul>
                      </div>
                      <div class="clear"></div>
                      <div class="lines-dotted-short"></div>
                      <center>
                        <input type="button" value="Cancelar" onclick="location.href='?lagc=com_radio'" class="form-cancel">
                        <input type="reset" value="Restablecer" class="form-reset">
                        <input type="submit" value="Guardar" class="form-guardar">
                      </center>
                    </form>
                <?php
                }
                else{
                    // El contenido del archivo
                    $archi = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                    $archi .= "<configuracion>\n";
                    $archi .= "    <variables>\n";
                    $archi .= "       <tipo>".$_POST['tipo']."</tipo>\n";
                    $archi .= "    </variables>\n";
                    $archi .= "</configuracion>";
                    // Se abre el archivo (si no existe se crea)
                    $archivo = fopen('componentes/com_radio/config.xml', 'w');
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
                        echo "<a href=\"?lagc=com_radio\">< Regresar</a>";
                        echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_radio&radiolg=".time()."&salu2_radio=".time()."'\", 1500) </script>";
                    }
                }
                ?>
                  </div>
                  <div class="clear"></div>
                </div>
              </div></td>
          </tr>
          <tr>
            <td colspan="2" align="center"></td>
          </tr>
        </table>
        </center>
				<?php
              }
            } else { echo "Sintaxi XML inv&aacute;lida Revise el archivo: componentes/com_radio/config.xml\n"; }
        } else { echo "Error abriendo: <em>componentes/com_radio/config.xml</em>\n"; }
    }
}
?>