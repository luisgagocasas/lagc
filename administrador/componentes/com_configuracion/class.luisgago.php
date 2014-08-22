<?php
class Configuracion{
	function ConfigSitio(){
		if (!isset($_POST['nombresitio'])) { $config = new LagcConfig(); ?>
		<form action="?lagc=com_configuracion" method="post">
		  <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
			  <td align="center" valign="top"><table>
				  <tr>
					<td class="table-header-repeat line-left" colspan="2"> <h3>Administrador</h3></td>
				  </tr>
				  <tr>
					<td align="right">Nombre del Sitio:</td>
					<td><input name="nombresitio" type="text" class="inp-form" value="<?=$config->lagcnombre; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Titulo del Sitio:</td>
					<td><input name="titulositio" type="text" class="inp-form" value="<?=$config->lagctitulo; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Lema:</td>
					<td><input name="lema" type="text" class="inp-form" value="<?=$config->lagclema; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Correo Principal:</td>
					<td><input name="correoprincipal" type="text" class="inp-form" value="<?=$config->lagcmail; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Versi&oacute;n:</td>
					<td><input name="version" type="text" class="inp-form" value="<?=$config->lagcversion; ?>" size="35" readonly="true" /></td>
				  </tr>
				  <tr>
					<td align="right">Url (Sitio):</td>
					<td><input name="url" type="text" class="inp-form" value="<?=$config->lagcurl; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Mysql:</td>
					<td><input name="mysql" type="text" class="inp-form" value="<?=$config->lagclocal; ?>" size="35" readonly="true"></td>
				  </tr>
				  <tr>
					<td align="right">BD:</td>
					<td><input name="bd" type="text" class="inp-form" value="<?=$config->lagcbd; ?>" size="35" readonly="true"></td>
				  </tr>
				  <tr>
					<td align="right">Usuario:</td>
					<td><input name="usuario" type="text" class="inp-form" value="<?=$config->lagcuser; ?>" size="35" readonly="true" /></td>
				  </tr>
				  <tr>
					<td align="right">Contrase&ntilde;a:</td>
					<td><input name="contrasenia" type="password" class="inp-form" value="<?=$config->lagcpass; ?>" readonly="true" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Plantilla Administrador:</td>
					<td align="center">
					<select name="plantillamin" class="styledselect_form_1">
					<?php
					if($gestor=opendir('plantillas')) {
						while (($archivo=readdir($gestor))!==false) {
						if ((!is_file($archivo))and($archivo!='.')and($archivo!='..'))
							if ($array_temas[$archivo]=$archivo==$config->lagctempladmin) {
								echo "<option value=\"".$array_temas[$archivo]=$archivo."\" selected=\"selected\">".$array_temas[$archivo]=$archivo."</option>"; 
							}
							else {
								echo "<option value=\"".$array_temas[$archivo]=$archivo."\">".$array_temas[$archivo]=$archivo."</option>"; 
							}
						}
					closedir($gestor); 
					}
					?>
					</select></td>
				  </tr>
				  <tr>
					<td align="right">&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				</table></td>
			  <td valign="top" align="center"><table>
				  <tr>
					<td  class="table-header-repeat line-left" colspan="2"> <h3>Sitio</h3></td>
				  </tr>
				  <tr>
					<td align="right">Palabras Principales:</td>
					<td><input name="palabras" type="text" class="inp-form" value="<?=$config->lagckeywords; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Descripci&oacute;n:</td>
					<td><input name="descripcion" type="text" class="inp-form" value="<?=$config->lagcdescription; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Tipo Url:</td>
					<td align="center">
					<?php
					$turl = array("1"=>"<label><input name=\"turl\" type=\"radio\" checked=\"checked\" value=\"1\">Normal</label><label><input type=\"radio\" name=\"turl\" value=\"2\">Con CEO</label>", "2"=>"<label><input name=\"turl\" type=\"radio\" value=\"1\">Normal</label><label><input type=\"radio\" name=\"turl\" checked=\"checked\" value=\"2\">Con CEO</label>");
					ksort($turl);
					foreach ($turl as $key => $val) {
						if ($config->lagctipourl==$key) {
							echo $val;
						}
					}
					?></td>
				  </tr>
				  <tr>
					<td align="right">Sitio activo:</td>
					<td align="center">
					<?php
					$acti = array("1"=>"<label><input name=\"activo\" type=\"radio\" checked=\"checked\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activo\" value=\"2\">Desactivado</label>", "2"=>"<label><input name=\"activo\" type=\"radio\" value=\"1\">Activado</label><label><input type=\"radio\" name=\"activo\" checked=\"checked\" value=\"2\">Desactivado</label>");
					ksort($acti);
					foreach ($acti as $key => $val) {
						if ($config->lagcactivo==$key) {
							echo $val;
						}
					}
					?></td>
				  </tr>
				  <tr>
					<td align="right">Mensaje si esta Desactivado:</td>
					<td><input name="mensajesitio" type="text" class="inp-form" value="<?=$config->lagcactivmensaje; ?>" size="35"></td>
				  </tr>
				  <tr>
					<td align="right">Componente Principal:</td>
					<td align="center">
					<select name="componenteprincipal" class="styledselect_form_1">
					<?php
					$respcom = mysql_query("select * from componentes where visible='1' order by nombre ASC");
					while($comp = mysql_fetch_array($respcom)) {
						if ($comp['id_com']!=1) {
							if ($config->lagccompopri==$comp['id_com']) {
								echo "<option value=\"".$comp['id_com']."\" selected=\"selected\">".$comp['nombre']."</option>";
							}
							else {
								echo "<option value=\"".$comp['id_com']."\">".$comp['nombre']."</option>";
							}
						}
					}
					?>
					</select></td>
				  </tr>
				  <tr>
					<td align="right">Plantilla Sitio</td>
					<td align="center">
					<select name="plantillasitio" class="styledselect_form_1">
					<?php
					if($gestor=opendir('../plantillas')) {
						while (($archivo=readdir($gestor))!==false) {
						if ((!is_file($archivo))and($archivo!='.')and($archivo!='..')) 
							if ($array_temas[$archivo]=$archivo==$config->lagctemplsite) {
								echo "<option value=\"".$array_temas[$archivo]=$archivo."\" selected=\"selected\">".$array_temas[$archivo]=$archivo."</option>"; 
							}
							else {
								echo "<option value=\"".$array_temas[$archivo]=$archivo."\">".$array_temas[$archivo]=$archivo."</option>"; 
							}
						}
					closedir($gestor); 
					}
					?>
					</select></td>
				  </tr>
                  <tr>
                  <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>Facebook</strong></td>
                  </tr>
                  <tr>
                  <td>App ID:</td>
                  <td><input name="fbid" type="text" class="inp-form" value="<?=$config->lagcfbid; ?>" size="35"></td>
                  </tr>
                  <tr>
                  <td>App Secret:</td>
                  <td><input name="fbsecret" type="text" class="inp-form" value="<?=$config->lagcfbsecret; ?>" size="35"></td>
                  </tr>
			  </table><br /></td>
			</tr>
			<tr>
			  <td colspan="2" align="center"><label>
				<input type="reset" value="Restablecer" class="form-reset" /> <input type="submit" value="Guardar" class="form-guardar" />
			  </label></td>
		</tr>
		  </table>
		</form>
		<?php
		}
		else{
			// El contenido del archivo
			$archi = "<?php\n";
			$archi .= "//*****************************************************************************************************\n";
			$archi .= "//*                  Este script permanece libre mientras estas lineas permanecen intactas\n";
			$archi .= "//*****************************************************************************************************\n";
			$archi .= "//Sistema desarrolldo por: Luis Gago - luisgago@lagc-peru.com\n";
			$archi .= "//Copyright (C) 2010 Luis Gago Casas\n";
			$archi .= "//-----------------------------------------------------------------------------------------------------\n";
			$archi .= "//Esta total mente prohibido cambiar la informacion del creador.\n";
			$archi .= "//Se permite crear componentes y modulos\n";
			$archi .= "//Cualquier pregunta a luisgago@lagc-peru.com\n";
			$archi .= "class LagcConfig {\n";
			$archi .= "    //Datos del Sitio\n";
			$archi .= "    var \$lagcnombre = '".$_POST['nombresitio']."';\n";
			$archi .= "    var \$lagctitulo = '".$_POST['titulositio']."';\n";
			$archi .= "    var \$lagclema = '".$_POST['lema']."';\n";
			$archi .= "    var \$lagcmail = '".$_POST['correoprincipal']."';\n";
			$archi .= "    var \$lagcversion = '".$_POST['version']."';\n";
			$archi .= "    var \$lagcurl = '".$_POST['url']."';\n";
			$archi .= "    //Mysql\n";
			$archi .= "    var \$lagclocal = '".$_POST['mysql']."';\n";
			$archi .= "    var \$lagcbd = '".$_POST['bd']."';\n";
			$archi .= "    var \$lagcuser = '".$_POST['usuario']."';\n";
			$archi .= "    var \$lagcpass = '".$_POST['contrasenia']."';\n";
			$archi .= "    //Sitio\n";
			$archi .= "    var \$lagckeywords = '".$_POST['palabras']."';\n";
			$archi .= "    var \$lagcdescription = '".$_POST['descripcion']."';\n";
			$archi .= "    var \$lagctipourl = '".$_POST['turl']."';\n";
			$archi .= "    var \$lagcactivo = '".$_POST['activo']."';\n";
			$archi .= "    var \$lagcactivmensaje = '".$_POST['mensajesitio']."';\n";
			$archi .= "    var \$lagccompopri = '".$_POST['componenteprincipal']."';\n";
			$archi .= "    //Gestion de Contenidos\n";
			$archi .= "    var \$lagctempladmin = '".$_POST['plantillamin']."';\n";
			$archi .= "    var \$lagctemplsite = '".$_POST['plantillasitio']."';\n";
			$archi .= "    //Facebook\n";
			$archi .= "    var \$lagcfbid = '".$_POST['fbid']."';\n";
			$archi .= "    var \$lagcfbsecret = '".$_POST['fbsecret']."';\n";
			$archi .= "}\n";
			$archi .= "    \$config = new LagcConfig();\n";
			$archi .= "    \$con = mysql_connect(\$config->lagclocal,\$config->lagcuser,\$config->lagcpass);\n";
			$archi .= "    mysql_select_db(\$config->lagcbd,\$con) or die(\"<center>No hay conexion.</center>\");\n";
			$archi .= "?>";
			
			// Se abre el archivo (si no existe se crea)
			$archivo = fopen('configuracion.lagc.php', 'w');
			$error = 0;
			if (!isset($archivo)) {
				$error = 1;
				print "No se ha podido crear/abrir el archivo.<br />";
			}elseif (!fwrite($archivo, $archi)) {
				$error = 1;
				print "No se ha podido escribir en el archivo.<br />";
			}
			
			fclose();
			if ($error == 0) {
				print "<center><h3>Datos actualizados...</h3>";
				print "<a href=\"?lagc=com_configuracion\"><h5>Volver</h5></a>";
				print "</center>";
				print "<script type=\"text/javascript\"> setTimeout(\"window.top.location='?lagc=com_configuracion'\", 1500) </script>";
			}
		}
	}
	function PhpInfo(){ ?>
		<style type="text/css">
		#phpinfo {}
		#phpinfo pre {}
		#phpinfo a:link {}
		#phpinfo a:hover {}
		#phpinfo table {}
		#phpinfo .center {}
		#phpinfo .center table {}
		#phpinfo .center th {}
		#phpinfo td, th {}
		#phpinfo h1 {}
		#phpinfo h2 {}
		#phpinfo .p {}
		#phpinfo .e {border: 1px #D6D6D6 solid; padding:10px 10px 10px 10px;}
		#phpinfo .h {}
		#phpinfo .v {border: 1px #D6D6D6 solid; padding:10px 10px 10px 10px;}
		#phpinfo .vr {}
		#phpinfo img {}
		#phpinfo hr {}
		</style>
		<div id="phpinfo">
		<?php
		ob_start ();
		phpinfo ();
		$pinfo = ob_get_contents ();
		ob_end_clean();
		echo (str_replace("module_Zend Optimizer", "module_Zend_Optimizer", preg_replace ( '%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo)));
		?>
		</div>
		<?php
	}
}
?>