<?php
class whois{
	function Inicio() { ?>
    <br /><br />
    <h2>Servicios</h2>
    <center>
    <table border="0" width="70%" align="center">
    <tr>
    <td align="center" valign="middle"><div class="btn-servicios"><a href="?lagc=com_whois&id=dominios">Ver estado de un Dominio</a></div></td>
    <td align="center" valign="middle"><div class="btn-servicios"><a href="?lagc=com_whois&id=planes">Ver Planes de Hosting</a></div></td>
    </tr>
    </table>
    </center>
    <br /><br />
    <?php
	}
	function PlanesHost() { ?><br /><br />
    <h2>&raquo; <a href="<?=LGlobal::Tipo_URL('com_whois'); ?>">Servicios</a> &raquo; Planes de Hosting</h2><br />
        <h2 class="extra" id="planeshostinglg">Planes de Hosting</h2>
        <div class="box extra">
					<div class="border-right">
						<div class="border-bot">
							<div class="border-left">
								<div class="left-top-corner1">
									<div class="right-top-corner1">
										<div class="right-bot-corner">
											<div class="left-bot-corner">
												<div class="inner">
													<div class="left-indent line-ver1">
														<div class="line-ver2">
															<div class="line-ver3">
																<div class="wrap line-ver4">
																	<article class="col-1 indent">
																		<h4>Caracteristicas</h4>
																		<ul class="info-list1">
																			<li>Espacio</li>
																			<li>Tr&aacute;fico Mensual</li>
																			<li>Cuentas de Correo</li>
																			<li>MySQL</li>
																			<li>Subdominios</li>
																			<li>FTP</li>
                                                                            <li class="price">Precio:</li>
																		</ul>
																	</article>
																	<article class="col-2 indent">
																		<h4 class="aligncenter">B&aacute;sico</h4>
																		<ul class="info-list1 alt">
																			<li>100 MB</li>
																			<li>1GB</li>
																			<li>5</li>
																			<li>1</li>
																			<li>No</li>
																			<li>1</li>
                                                                            <li class="price">S/. 50</li>
																		</ul>
																		<div class="aligncenter"><a href="?lagc=com_whois&id=enviar_orden&selectplanes=basico" class="link3"><span><span>Ordenar Plan</span></span></a></div>
																	</article>
																	<article class="col-3 indent">
																		<h4 class="aligncenter">Pyme</h4>
																		<ul class="info-list1 alt">
																			<li>200Mb</li>
																			<li>3GB</li>
																			<li>10</li>
																			<li>4</li>
																			<li>1</li>
																			<li>3</li>
                                                                            <li class="price">S/. 90</li>
																		</ul>
																		<div class="aligncenter"><a href="?lagc=com_whois&id=enviar_orden&selectplanes=pyme" class="link3"><span><span>Ordenar Plan</span></span></a></div>
																	</article>
																	<article class="col-4 indent">
																		<h4 class="aligncenter">Avanzado</h4>
																		<ul class="info-list1 alt">
																			<li>400Mb</li>
																			<li>6GB</li>
																			<li>500</li>
																			<li>10</li>
																			<li>6</li>
																			<li>6</li>
                                                                            <li class="price">S/. 170</li>
																		</ul>
																		<div class="aligncenter"><a href="?lagc=com_whois&id=enviar_orden&selectplanes=avanzado" class="link3"><span><span>Ordenar Plan</span></span></a></div>
																	</article>
																	<article class="col-5 indent">
																		<h4 class="aligncenter">Profesional</h4>
																		<ul class="info-list1 alt">
																			<li>700Mb</li>
																			<li>10GB</li>
																			<li>500</li>
																			<li>Ilimitados</li>
																			<li>Ilimitados</li>
																			<li>Ilimitados</li>
                                                                            <li class="price">S/. 250</li>
																		</ul>
																		<div class="aligncenter"><a href="?lagc=com_whois&id=enviar_orden&selectplanes=profesional" class="link3"><span><span>Ordenar Plan</span></span></a></div>
																	</article>
																	<div class="clear"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="border-top">
														<div class="inner1">
															<h4 class="extra aligncenter">Incluye</h4>
															<div class="">
																<div class="line-ver1 left-indent">
																	<div class="line-ver2">
																		<div class="line-ver3">
																			<div class="wrap line-ver4">
																				<article class="col-1 indent1">
																					<ul class="info-list1">
																						<li>SSL en el Cpanel</li>
																						<li>Frontpage</li>
																						<li>PHP</li>
                                                                                        <li>Gestor de archivos</li>
                                                                                        <li>Copias de Seguridad</li>
                                                                                        <li>Auto Respuestas de Email</li>
                                                                                        <li>Redirectores de Email</li>
                                                                                        <li>Detector de SPAM</li>
                                                                                        <li>SMTP, IMAP, POP</li>
                                                                                        <li>WebMail</li>
                                                                                        <li>Gmail</li>
                                                                                        <li>Hotmail</li>
                                                                                        <li>Fantastico</li>
                                                                                        <li>Estad&iacute;sticas</li>
																					</ul>
																				</article>
																				<article class="col-2 indent1">
																					<ul class="info-list1 alt">
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
                                                                                        <li>No</li>
                                                                                        <li>No</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
																					</ul>
																				</article>
																				<article class="col-3 indent1">
																					<ul class="info-list1 alt">
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>No</li>
                                                                                        <li>Si</li>
                                                                                        <li>No</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
																					</ul>
																				</article>
																				<article class="col-4 indent1">
																					<ul class="info-list1 alt">
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>No</li>
                                                                                        <li>No</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
																					</ul>
																				</article>
																				<article class="col-5 indent1">
																					<ul class="info-list1 alt">
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>Si</li>
																						<li>No</li>
                                                                                        <li>No</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
                                                                                        <li>Si</li>
																					</ul>
																				</article>
																				<div class="clear"></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<h2 class="extra">Tener en Cuenta que:</h2>
        <ul>
        <li>&raquo; El hosting esta trabajando en Linux.</li>
        <li>&raquo; Los Precios son en Soles (S/.).</li>
        <li>&raquo; Los Precios no incluyen Dominio tan solo Hosting.</li>
        <li>&raquo; Para ayuda en linea usted puede ir <a href="contactenos/contactenos-1">Aqui</a>.</li>
        </ul>
        <br /><br /><br />
        <?php
	}
	function EnvioCopiaPlanB(){
		if (!empty($_COOKIE["user_lagc"])) { $idlg = $_COOKIE["user_lagc"]; } else { $idlg="0"; }
		$rptuseer = mysql_query("select * from usuarios where id='".$idlg."'"); $usuario = mysql_fetch_array($rptuseer);
		$config = new LagcConfig();
		if (empty($_POST['mail'])) { ?>
	  <script>
	  function revisar() {
		  if(formcontac.nombre.value.length < 4) { alert('Excribe tu nombre'); formcontac.nombre.focus(); return false ; }
		  else if(formcontac.apellidos.value.length < 3) { alert('Excribe tus apellidos'); formcontac.apellidos.focus(); return false ; }
		  else if(formcontac.direccion.value.length < 10) { alert('Excribe tu direccion'); formcontac.direccion.focus(); return false ; }
		  else if(formcontac.telefono.value.length < 6) { alert('Excribe tu telefono'); formcontac.telefono.focus(); return false ; }
		  else if(formcontac.mail.value.length < 8) { alert('Excribe tu E-mail'); formcontac.mail.focus(); return false ; }
		  else if(formcontac.dni.value.length < 7) { alert('Excribe tu DNI'); formcontac.dni.focus(); return false ; }
		  else if(formcontac.dominio.value.length < 7) { alert('Excriba el Dominio'); formcontac.dominio.focus(); return false ; }
		  else { document.getElementById('contacts-form').submit(); }
	  }
	  </script>
	  <br /><br />
      <h2>&raquo; <a href="<?=LGlobal::Tipo_URL('com_whois'); ?>">Servicios</a> &raquo; <a href="?lagc=com_whois&id=planes#planeshostinglg">Planes de Hosting</a> &raquo; Ingrese sus datos</h2>
      <center>
	  <table border="0" align="center">
		<tr>
		  <td valign="top">
          <form action="" method="post" name="formcontac" id="contacts-form" onSubmit="return revisar()">
			  <table border="0" cellpadding="0" cellspacing="10">
              <tr>
              	<th align="right" nowrap="nowrap"><label>Usuario:</label></th>
                <td><?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
                Registrado &raquo; <a href="<?=LGlobal::Tipo_URL('com_usuarios', $_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); ?>" target="_blank"><?php echo $_COOKIE["usuario_lagc"]; ?></a>
                <input type="hidden" name="iduser" value="<?=$usuario['id'];?>" /><?php } else { ?>Nuevo &raquo; <a href="?lagc=com_usuarios&id=registro">Registrate</a><?php } ?><br /><br /></td>
                <td></td>
                <td></td>
              </tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>Nombre:</label> *</th>
				  <td><div class="field text"><input type="text" name="nombre" value="<?=$usuario['nombres'];?>"></div></td>
                  <th align="right" nowrap="nowrap"><label>Apellidos:</label> *</th>
				  <td><div class="field text"><input type="text" name="apellidos" value="<?=$usuario['apellidos'];?>"></div></td>
				</tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>Direcci&oacute;n</label> *</th>
				  <td><div class="field text"><input type="text" name="direccion"></div></td>
                  <th align="right" nowrap="nowrap"><label>Telefono:</label> *</th>
				  <td><div class="field text"><input type="text" name="telefono"></div></td>
				</tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>E-mail:</label> *</th>
				  <td><div class="field text"><input type="text" name="mail" value="<?=$usuario['email'];?>"></div></td>
                  <th align="right" nowrap="nowrap"><label>DNI:</label> *</th>
				  <td><div class="field text"><input type="text" name="dni" value="<?=$usuario['doc_num'];?>"></div></td>
				</tr>
                <tr>
				  <th align="right" nowrap="nowrap"><label>Plan:</label> *</th>
				  <td>
                  <select name="planes" style="width:300px; padding:3px 3px;">
                  	<option value="1"<?=whois::__SelecPlan("basico"); ?>>B&aacute;sico</option>
				    <option value="2"<?=whois::__SelecPlan("pyme"); ?>>Pyme</option>
                    <option value="3"<?=whois::__SelecPlan("avanzado"); ?>>Avanzado</option>
                    <option value="4"<?=whois::__SelecPlan("profesional"); ?>>Profesional</option>
				  </select>
                  </td>
                  <th align="right" nowrap="nowrap"><label>Dominio:</label> *</th>
				  <td><input type="text" name="dominio" /></td>
				</tr>
                <tr>
                	<td colspan="4"><br /><br />
                    <center>
                    <div class="nota-descripcion">
                    <strong>Nota:</strong><br />
                    &raquo; El precio de Hosting es en soles.<br />
                    &raquo; Al enviar estos datos le llegaran a su correo el siguiente paso para continuar.
                    </div>
                    </center>
                    </td>
                </tr>
				<tr>
				  <td colspan="4" align="center"><br /><br />
                  	<a href="?lagc=com_whois&id=planes#planeshostinglg" class="link4"><span><span>Cancelar</span></span></a>
                    <a class="link4" onClick="document.getElementById('contacts-form').reset()"><span><span>Limpiar</span></span></a>
                    <a class="link2" onClick="revisar();"><span><span>Enviar</span></span></a>
				  </td>
				</tr>
			  </table>
			</form><br /><br /><br />
            </td>
		  <td valign="top" align="center"></td>
		</tr>
	  </table>
      </center>
	  <?php } else { ?><br /><br />
		  <script type="text/javascript"> setTimeout("window.top.location='index.php'",2000) </script>
          <center>
            <div style="width:300px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border:1px #CCC solid;">
              <h4>Se envio Correctamente</h4>
              Recibiras una copia en <?php echo $_POST['mail']; ?>
            </div>
          </center>
          <br /><br /><br />
          <?php
          if($_POST['planes']=="1"){ $precio="50"; $nombrehos="Básico"; }
          if($_POST['planes']=="2"){ $precio="90"; $nombrehos="Pyme"; }
          if($_POST['planes']=="3"){ $precio="170"; $nombrehos="Avanzado"; }
          if($_POST['planes']=="4"){ $precio="250"; $nombrehos="Profesional"; }
          $to  = $config->lagctitulo.' <'.$config->lagcmail.'>' . ', ';// para
          $subject = $_POST['nombre'].', Confirmación de datos personales.';
          $message = '
          <html>
          <head>
            <title>Confirmación de datos personales de '.$_POST['nombre'].'</title>
          </head>
          <body>
          <style type="text/css">
            .nota-descripcion{
                margin:0px auto 0px auto;
                width:55%;
                text-align:justify;
                text-transform:capitalize;
                padding:10px 10px;
                background:#FFF;
                -moz-border-radius:2px 2px 2px 2px;
                -webkit-border-radius:2px 2px 2px 2px;
                border-radius:5px 5px 5px 5px;
            }
            </style>
          <h3>Información rellenada en <u>'.$config->lagcnombre.'</u>: Confirmación de datos personales</h3>
            <p>Hola, <b>'.$_POST['nombre'].'</b>. Este mensaje de genero a partir de los datos que ingreso en <u>'.$config->lagcnombre.'</u> si usted no reconoce que son sus datos por favor elimine este mensaje y no continue leyendo.</p>
          <table border="0" cellpadding="3" cellspacing="5">
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Nombre:</strong></td>
              <td>'.$_POST['nombre'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Apellidos:</strong></td>
              <td>'.$_POST['apellidos'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dirección</strong></td>
              <td>'.$_POST['direccion'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Telefono:</strong></td>
              <td>'.$_POST['telefono'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>E-mail:</strong></td>
              <td>'.$_POST['mail'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dni:</strong></td>
              <td>'.$_POST['dni'].'</td>
            </tr>
            <tr>
              <td><br></td>
              <td><br></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Plan de Hosting</strong></td>
              <td>'.$nombrehos.' - <strong>Precio:</strong>'.$precio.'</td>
            </tr>
			<tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dominio</strong></td>
              <td>'.$_POST['dominio'].'</td>
            </tr>
            <tr>
              <td colspan="2"><div class="nota-descripcion"><strong>Nota:</strong><br>Espera que nuestro personal se comunique con tigo.</div></td>
            </tr>
          </table>
            <br>
            <br>
            <center><div style="color:#999; text-align:center; font-weight:bold; font-size:9px;">Este mensaje se genero automaticamente no responda ni reenvie el mensaje. Este mensaje se genero en <a href="'.$config->lagcurl.'" target="_blank">'.$config->lagcnombre.'</a></div></center>
          </body>
          </html>';// message
          
          // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
          // Additional headers
          $headers .= 'To: '.$_POST['nombre'].' <'.$_POST['mail'].'>' . "\r\n";
          $headers .= 'From: '.$config->lagctitulo.' <'.$config->lagcmail.'>' . "\r\n";
          // Mail it
          mail($to, $subject, $message, $headers);
		}
	}
	function ConfirmarOrden($orden){
		echo $orden;
		echo "<br><br><br>";
	}
	function __SelecPlan($valor) {
		if ($valor==$_GET['selectplanes']) { $regresa = " selected=\"selected\""; }
		return $regresa;
	}
	function DominiosInicio(){ ?>
    <script>
var jump = 10;//saltos en pixels
var speed = 50;// milisegundos
function change(limit, tmp){
   tmp+= (!tmp) ? parseInt(document.getElementById('tuiframe').height) + jump : jump;
   document.getElementById('tuiframe').height=tmp;
 if (tmp <= limit) {
  setTimeout('change('+limit+','+tmp+')', speed);
 } else if (tmp!=limit) {
  document.getElementById('tuiframe').height=limit;
 }
}
</script><br /><br />
<h2>&raquo; <a href="<?=LGlobal::Tipo_URL('com_whois'); ?>">Servicios</a> &raquo; Estado de un dominio</h2>
<iframe id="tuiframe" name="tuiframe" src="componentes/com_whois/checkdomain3.php" height="300" width="100%" marginwidth="0" marginheight="0" scrolling="no" border="0" frameborder="0" onload="change(this.offsetParent.clientHeight, 0);"></iframe>
    <?php
	}
	function Comprar_Dominio($articulo, $ver) { ?>
    	<br /><br />
        <h2>&raquo; <a href="<?=LGlobal::Tipo_URL('com_whois'); ?>">Servicios</a> &raquo; <a href="?lagc=com_whois&id=dominios">Estado de un dominio</a> &raquo; Ingrese sus datos </h2>
        <?php
		if (!empty($_COOKIE["user_lagc"])) { $idlg = $_COOKIE["user_lagc"]; } else { $idlg="0"; }
		$rptuseer = mysql_query("select * from usuarios where id='".$idlg."'"); $usuario = mysql_fetch_array($rptuseer);
		$config = new LagcConfig();
		if (empty($_POST['mail'])) { ?>
	  <script>
	  function revisar() {
		  if(formcontac.nombre.value.length < 4) { alert('Excribe tu nombre'); formcontac.nombre.focus(); return false ; }
		  else if(formcontac.apellidos.value.length < 3) { alert('Excribe tus apellidos'); formcontac.apellidos.focus(); return false ; }
		  else if(formcontac.direccion.value.length < 10) { alert('Excribe tu direccion'); formcontac.direccion.focus(); return false ; }
		  else if(formcontac.telefono.value.length < 6) { alert('Excribe tu telefono'); formcontac.telefono.focus(); return false ; }
		  else if(formcontac.mail.value.length < 8) { alert('Excribe tu E-mail'); formcontac.mail.focus(); return false ; }
		  else if(formcontac.dni.value.length < 7) { alert('Excribe tu DNI'); formcontac.dni.focus(); return false ; }
		  else if(formcontac.dominio.value.length < 4) { alert('Retrocede para validar el Domminio'); formcontac.dominio.focus(); return false ; }
		  else { document.getElementById('contacts-form').submit(); }
	  }
	  </script>
      <script type="application/javascript">
	  function oculta(id){
		  var elDiv = document.getElementById(id);
		  elDiv.style.display='none';
	  }
	  function muestra(id){
		  var elDiv = document.getElementById(id);
		  elDiv.style.display='block';
	  }
	  </script>
      <center>
	  <table border="0" align="center">
		<tr>
		  <td valign="top">
          <form action="" method="post" name="formcontac" id="contacts-form" onSubmit="return revisar()">
			  <table border="0" cellpadding="0" cellspacing="10">
              <tr>
              	<th align="right" nowrap="nowrap"><label>Usuario:</label></th>
                <td><?php if(!empty($_COOKIE["usuario_lagc"])) { ?>
                Registrado &raquo; <a href="<?=LGlobal::Tipo_URL('com_usuarios', $_COOKIE["user_lagc"], $_COOKIE["usuario_lagc"]); ?>" target="_blank"><?php echo $_COOKIE["usuario_lagc"]; ?></a>
                <input type="hidden" name="iduser" value="<?=$usuario['id'];?>" /><?php } else { ?>Nuevo &raquo; <a href="?lagc=com_usuarios&id=registro">Registrate</a><?php } ?><br /><br /></td>
                <td></td>
                <td></td>
              </tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>Nombre:</label> *</th>
				  <td><div class="field text"><input type="text" name="nombre" value="<?=$usuario['nombres'];?>"></div></td>
                  <th align="right" nowrap="nowrap"><label>Apellidos:</label> *</th>
				  <td><div class="field text"><input type="text" name="apellidos" value="<?=$usuario['apellidos'];?>"></div></td>
				</tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>Direcci&oacute;n</label> *</th>
				  <td><div class="field text"><input type="text" name="direccion"></div></td>
                  <th align="right" nowrap="nowrap"><label>Telefono:</label> *</th>
				  <td><div class="field text"><input type="text" name="telefono"></div></td>
				</tr>
				<tr>
				  <th align="right" nowrap="nowrap"><label>E-mail:</label> *</th>
				  <td><div class="field text"><input type="text" name="mail" value="<?=$usuario['email'];?>"></div></td>
                  <th align="right" nowrap="nowrap"><label>DNI:</label> *</th>
				  <td><div class="field text"><input type="text" name="dni" value="<?=$usuario['doc_num'];?>"></div></td>
				</tr>
                <tr>
				  <th align="right" nowrap="nowrap"><label>Dominio:</label> *</th>
				  <td>
                  <input name="dominio" type="text" value="<?=$_GET['dominio']; ?>" readonly="true" />
                  </td>
                  <th></th>
				  <td></td>
				</tr>
                <tr>
				  <th colspan="2" align="center"><br /><br />&iquest;Tambien quiere comprar Hosting?<br /><br />
                  <center>
                  <table border="0" width="100">
                  <tr>
                  <td><input type="radio" style="width:20px;" name="pregunta" value="1" onClick="muestra('oculto'); oculta('oculto2'); oculta('oculto3'); oculta('oculto4'); oculta('oculto5'); oculta('oculto6'); muestra('oculto7'); muestra('oculto8');" checked="checked"></td>
                  <td>Si</td>
                  <td><input type="radio" style="width:20px;" name="pregunta" value="2" onClick="oculta('oculto'); muestra('oculto2'); muestra('oculto3'); muestra('oculto4'); muestra('oculto5'); muestra('oculto6'); oculta('oculto7'); oculta('oculto8');"></td>
                  <td>No</td>
                  </tr>
                  </table>
                  </center>
                  </th>
				  <th colspan="2">
                  </th>
			    </tr>
                <tr>
				  <th colspan="2" rowspan="2" align="right"><div id="oculto6" style="display: none; font-weight:normal;"><br />Ingrese las DNS del Hosting para este Dominio &raquo;</div></th>
				  <th align="right" nowrap="nowrap"><div id="oculto2" style="display: none;">DNS 1*</div></th>
                  <th>
                  <div id="oculto3" style="display: none;">
                  <input type="text" name="dns1"><br /><br />
                  </div>
                  </th>
			    </tr>
                <tr>
				  <th align="right" nowrap="nowrap"><div id="oculto4" style="display: none;">DNS 2*</div></th>
                  <th>
                  <div id="oculto5" style="display: none;">
                  <input type="text" name="dns2"><br />
                  </div>
                  </th>
			    </tr>
                <tr>
				  <th colspan="2" align="right"><div id="oculto" style="font-weight:normal;"><br />Selecciona el plan de Hosting para este Dominio &raquo;</div></th>
				  <th align="right" nowrap="nowrap"><div id="oculto8">Planes:*</div></th>
                  <th align="left">
                  <div id="oculto7">
                  <select name="planes" style="width:300px; padding:3px 3px;">
                  	<option value="1"<?=whois::__SelecPlan("basico"); ?>>B&aacute;sico</option>
				    <option value="2"<?=whois::__SelecPlan("pyme"); ?>>Pyme</option>
                    <option value="3"<?=whois::__SelecPlan("avanzado"); ?>>Avanzado</option>
                    <option value="4"<?=whois::__SelecPlan("profesional"); ?>>Profesional</option>
				  </select>
                  <div style="text-align:left;">
                  <a href="?lagc=com_whois&id=planes#planeshostinglg" target="_blank">Ver Detalle de Planes</a>
                  </div>
                  </div>
                  </th>
                </tr>
                <tr>
                	<td colspan="4"><br /><br />
                    <center>
                    <div class="nota-descripcion">
                    <strong>Nota:</strong><br />
                    &raquo; Los presios del Hosting son en soles y el precio del Dominio es en Dolares. Los cuales se enviaran al continuar<br />
                    &raquo; Si no quiere Hosting noce cobrara por tal. solo se cobrara por el Dominio.<br />
                    &raquo; Al enviar estos datos le llegaran a su correo el siguiente paso para continuar.
                    </div>
                    </center>
                    </td>
                </tr>
				<tr>
				  <td colspan="4" align="center"><br /><br />
                  	<a href="?lagc=com_whois&id=dominios" class="link4"><span><span>Cancelar</span></span></a>
                    <a class="link4" onClick="document.getElementById('contacts-form').reset()"><span><span>Limpiar</span></span></a>
                    <a class="link2" onClick="revisar();"><span><span>Enviar</span></span></a>
				  </td>
				</tr>
			  </table>
			</form><br /><br /><br />
          </td>
		  <td valign="top" align="center"></td>
		</tr>
	  </table>
      </center>
	  <?php } else { ?><br /><br />
		  <script type="text/javascript"> setTimeout("window.top.location='index.php'",2000) </script>
          <center>
            <div style="width:300px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border:1px #CCC solid;">
              <h4>Se envio Correctamente</h4>
              Recibiras una copia en <?php echo $_POST['mail']; ?>
            </div>
          </center>
          <br /><br /><br />
          <?php
          if($_POST['planes']=="1"){ $precio="50"; $nombrehos="Básico"; }
          if($_POST['planes']=="2"){ $precio="90"; $nombrehos="Pyme"; }
          if($_POST['planes']=="3"){ $precio="170"; $nombrehos="Avanzado"; }
          if($_POST['planes']=="4"){ $precio="250"; $nombrehos="Profesional"; }
		  
          $to  = $config->lagctitulo.' <'.$config->lagcmail.'>' . ', ';// para
          $subject = $_POST['nombre'].', Confirmación de datos personales.';
          $message = '
          <html>
          <head>
            <title>Confirmación de datos personales de '.$_POST['nombre'].'</title>
          </head>
          <body>
          <style type="text/css">
            .nota-descripcion{
                margin:0px auto 0px auto;
                width:55%;
                text-align:justify;
                text-transform:capitalize;
                padding:10px 10px;
                background:#FFF;
                -moz-border-radius:2px 2px 2px 2px;
                -webkit-border-radius:2px 2px 2px 2px;
                border-radius:5px 5px 5px 5px;
            }
            </style>
          <h3>Información rellenada en <u>'.$config->lagcnombre.'</u>: Confirmación de datos personales</h3>
            <p>Hola, <b>'.$_POST['nombre'].'</b>. Este mensaje de genero a partir de los datos que ingreso en <u>'.$config->lagcnombre.'</u> si usted no reconoce que son sus datos por favor elimine este mensaje y no continue leyendo.</p>
          <table border="0" cellpadding="3" cellspacing="5">
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Nombre:</strong></td>
              <td>'.$_POST['nombre'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Apellidos:</strong></td>
              <td>'.$_POST['apellidos'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dirección</strong></td>
              <td>'.$_POST['direccion'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Telefono:</strong></td>
              <td>'.$_POST['telefono'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>E-mail:</strong></td>
              <td>'.$_POST['mail'].'</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dni:</strong></td>
              <td>'.$_POST['dni'].'</td>
            </tr>
            <tr>
              <td><br></td>
              <td><br></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Dominio</strong></td>
              <td>'.$nombrehos.' - <strong>Precio:</strong>$ 9.99</td>
            </tr>';
			if ($_POST['pregunta']=="1") {
				$message .= '
				<tr>
				  <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>Plan de Hosting</strong></td>
				  <td>'.$_POST['dominio'].' - <strong>Precio:</strong> S/. '.$precio.'</td>
				</tr>';
			}
			else  if ($_POST['pregunta']=="2") {
				$message .= '
				<tr>
				  <td bgcolor="#CCCCCC" align="right" nowrap="nowrap"><strong>DNS del Hosting</strong></td>
				  <td>'.$_POST['dns1'].' - '.$_POST['dns2'].'</td>
				</tr>';
			}
			$message .= '
            <tr>
              <td colspan="2"><div class="nota-descripcion"><strong>Nota:</strong><br>Espera que nuestro personal se comunique con tigo.</div></td>
            </tr>
          </table>
            <br>
            <br>
            <center><div style="color:#999; text-align:center; font-weight:bold; font-size:9px;">Este mensaje se genero automaticamente no responda ni reenvie el mensaje. Este mensaje se genero en <a href="'.$config->lagcurl.'" target="_blank">'.$config->lagcnombre.'</a></div></center>
          </body>
          </html>';// message
          
          // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
          // Additional headers
          $headers .= 'To: '.$_POST['nombre'].' <'.$_POST['mail'].'>' . "\r\n";
          $headers .= 'From: '.$config->lagctitulo.' <'.$config->lagcmail.'>' . "\r\n";
          // Mail it
          mail($to, $subject, $message, $headers);
		}
	}
}
?>