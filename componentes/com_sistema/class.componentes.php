<?php //clase para los componentes
/*
Creado por Luis Gago ©
E-mail: webmaster@portuhermana.com
Soporte: luisgago@lagc-peru.com
*/
class Componente {
	function existe($componente) {
		if (!empty($componente)) {
			$respcompo = mysql_query("select * from componentes where url='".$componente."'");
			$compo = mysql_fetch_array($respcompo);
			if ($compo['url']!=$_GET['lagc']) { $final = "El Componente no existe"; }
		}
		return $final;
	}
	function primercompo($id) {
		$respcompo = mysql_query("select * from componentes where id_com='".$id."'");
		$compo = mysql_fetch_array($respcompo);
		include "componentes/".$compo['url']."/".$compo['archivo'].".php";
	}
	function componentes() {
		$respcompo = mysql_query("select * from componentes where visible='1'");
		while($compo = mysql_fetch_array($respcompo)) {
			if (!empty($compo['archivo']) and !empty($compo['url'])) {
				if ($_GET['lagc']==$compo['url']) { include "componentes/".$compo['url']."/".$compo['archivo'].".php"; }
			}
			else {	echo "<div id=\"alerta_comp\">error en un componente</div>"; }
		}
	}
	function Mostrar() { //mostrar componentes y alertas de errores
		$config = new LagcConfig();
		if (empty($_COOKIE["user_lagc"])) {
			if ($config->lagcactivo==2) { echo "<script type=\"text/javascript\"> setTimeout(\"window.top.location='index.php'\",0) </script>"; exit; }
			//si esta logeado puede acceder aqui
		}
		if (!empty($alerta)) { echo "<div id=\"alerta_comp\">".$alerta."</div>"; } //alerta
		if (!isset($_GET['lagc'])){ Componente::primercompo($config->lagccompopri); } //muestra primer componente
		Componente::existe($_GET['lagc']); //si un componente no existe
		Componente::componentes(); //muestra todos los componentes
	}
	function SiteDesactivo() {
		$config = new LagcConfig();
		$configurapla = "plantillas/".$config->lagctemplsite."/config.xml";
	if (file_exists($configurapla)) {
		$plantillas = simplexml_load_file($configurapla);
		if($plantillas){
			foreach ($plantillas as $plantilla) {
				$archivo = "plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl";
				if (file_exists($archivo)) {
		?>
<!DOCTYPE html>
<html lang="es">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=Componente::CompoTitulo($_GET['lagc'], $_GET['id']); ?></title>
<meta name="rating" content="general">
<meta name="audience" content="all">
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="favicon.ico">
<?=Componente::CompoKeywords($_GET['lagc'], $_GET['id']); ?>
<meta name="description" content="<?=$config->lagcdescription; ?>">
<meta name="generator" content="Lagc Peru v.<?=base64_decode($config->lagcversion); ?>">
<meta name="copyright" content="<?=date("Y", time()); ?> Lagc Peru">
<meta name="revisit-after" content="7 days">
<meta name="google" content="notranslate" />
<link href="plantillas/<?=$config->lagctemplsite; ?>/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<table align="center"><tr><td>
<div class="SiteBloqueado">
<h1><b><?=$config->lagcnombre; ?></b></h1>
<p><?=$config->lagcactivmensaje; ?></p>
<?php include"componentes/com_sistema/form_logeo.tpl"; ?>
</div>
</td></tr></table>
</body>
</html><?php
				}
				else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl\n"; }
			}
		} else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
	} else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
	}
	function __ConexionTemporal($val1){
		if (!empty($_COOKIE["user_lagc"])) { if ($val1==2) { $final = 1; } else { $final = 2; } }
		else { $final = 2; }
		return $final;
	}
	function CompoTitulo($compo, $id) {
		$config = new LagcConfig();
		if (!empty($_GET['lagc'])) {
			/*Leendo informacion de componentes*/
			$respcomp = mysql_query("select * from componentes where url='".$compo."'"); $comp = mysql_fetch_array($respcomp);
			/*leendo contenidos de componentes*/
			if (empty($comp['campobd'])) { echo $comp['nombre']." - ".$config->lagctitulo; }
			else {
				$rptcomp = mysql_query("select * from ".$comp['campobd']." where ".$comp['campoid']."='".$id."'");
				$rpt = mysql_fetch_array($rptcomp);
				if (!empty($id)) {
					if (!empty($rpt[$comp['campoid']]) and $_GET['ver']==LGlobal::Url_Amigable($rpt[$comp['campotitulo']])) {
						echo ucwords($rpt[$comp['campotitulo']])." - ";
					}
				}
				if ($comp['url']==$compo) { echo ucwords($comp['nombre'])." - ".$config->lagctitulo; }
				else { echo "Error. noce encontro el Componentes."; }
			}
		}//else { echo "Bienvenid@, a ".$config->lagctitulo.""; }
		else { echo $config->lagctitulo; }
	}
	function CompoDescription($compo, $id) {
		$config = new LagcConfig();
		if (!empty($_GET['lagc'])) {
			/*Leendo informacion de componentes*/
			$respcomp = mysql_query("select * from componentes where url='".$compo."'"); $comp = mysql_fetch_array($respcomp);
			/*leendo contenidos de componentes*/
			if (empty($comp['campobd'])) { echo $config->lagcdescription; }
			else {
				$rptcomp = mysql_query("select * from ".$comp['campobd']." where ".$comp['campoid']."='".$id."'");
				$rpt = mysql_fetch_array($rptcomp);
				if (!empty($id)) {
					if (!empty($rpt[$comp['campoid']]) and $_GET['ver']==LGlobal::Url_Amigable($rpt[$comp['campotitulo']])) {
						if(!empty($rpt[$comp['campodescrip']])){
							echo ucwords($rpt[$comp['campodescrip']])." - ";
						}
						else {
							echo ucwords($rpt[$comp['campotitulo']])." - ";
						}
					}
				}
				if ($comp['url']==$compo) {
					if(empty($comp['descripcion'])){ echo $config->lagcnombre; }
					else { echo $comp['descripcion']; }
				}
				else { echo "Error. noce encontro el Componentes."; }
			}
		}
		else {
			echo $config->lagcdescription;
		}
	}
	function CompoImagen($compo, $id) {
		$config = new LagcConfig();
		$configurapla = "plantillas/".$config->lagctemplsite."/config.xml";
		if (file_exists($configurapla)) {
			$plantillas = simplexml_load_file($configurapla);
			if($plantillas){
				foreach ($plantillas as $plantilla) { //
		if (!empty($_GET['lagc'])) {
			/*Leendo informacion de componentes*/
			$respcomp = mysql_query("select * from componentes where url='".$compo."'"); $comp = mysql_fetch_array($respcomp);
			/*leendo contenidos de componentes*/
			if (empty($comp['campoimagen'])) { echo $config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen; }
			else {
				$rptcomp = mysql_query("select * from ".$comp['campobd']." where ".$comp['campoid']."='".$id."'");
				$rpt = mysql_fetch_array($rptcomp);
				if (!empty($id)) {
					if (!empty($rpt[$comp['campoid']]) and $_GET['ver']==LGlobal::Url_Amigable($rpt[$comp['campotitulo']])) {
						if(!empty($rpt[$comp['campoimagen']])){
							echo $config->lagcurl.$comp['rutaimagen'].$rpt[$comp['campoimagen']];
						}
						else {
							echo $config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen;
						}
					}
				}
				else if ($comp['url']==$compo) {
					if(!empty($comp['campoimagen'])){ echo $config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen; }
				}
				else { echo "Error. noce encontro el Componentes."; }
			}
		}
		else {
			echo $config->lagcurl."plantillas/".$config->lagctemplsite."/".$plantilla->imagen;
		}
				//
				}
			} else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
		} else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
	}
	function CompoKeywords($compo, $id) {
		$config = new LagcConfig();
		if (!empty($_GET['lagc'])) {
			/*Leendo informacion de componentes*/
			$respcomp = mysql_query("select * from componentes where url='".$compo."'");
			$comp = mysql_fetch_array($respcomp);
			/*leendo contenidos de componentes*/
			if (empty($comp['campobd'])) { $keywords = $config->lagckeywords; }
			else {
				$rptcomp = mysql_query("select * from ".$comp['campobd']." where ".$comp['campoid']."='".$id."'");
				$rpt = mysql_fetch_array($rptcomp);
				if ($comp['url']==$compo) {
					if(empty($rpt[$comp['campopalabras']])){ $keywords = strtolower($comp['nombre']); }
					else { $keywords = strtolower($rpt[$comp['campopalabras']]); }
				}
				else { $keywords = "Error. noce encontro el Componente."; }
			}
		}
		else { $keywords = $config->lagckeywords; }
		return "<meta name=\"keywords\" content=\"".$keywords."\">\n";
	}
}
class Login {
    public function Logon($user,$password,$id=false) {
        $user = strtolower(trim($user));
        if (!ereg("^[a-z]+$",$user)) {
            return false;
        }
        if ($id===false) {
            $password = md5($password);
            $sql = mysql_query("SELECT usuario,password,id,tipo FROM usuarios
            WHERE usuario = '$user' AND password = '$password'");
        }
		else {
            if (!ereg("^[0-9]+$",$id)) {
                $id = 0;
            }
            $password = mysql_real_escape_string($password);
            $sql = mysql_query("SELECT usuario,password,id,tipo FROM usuarios
            WHERE usuario = '$user' AND password = '$password' AND id = $id");
        }
		if (mysql_num_rows($sql)>=1) {
            $row=mysql_fetch_assoc($sql);
            mysql_free_result($sql);
            $this->SetSession($row);
            return true;
        }
        $this->LogOut();
        return false;
    }
    private function SetSession($array) {
		setcookie("usuario_lagc", $array["usuario"], time() + 3600, "/");
		setcookie("hash_lagc", $array["password"], time() + 3600, "/");
		setcookie("user_lagc", $array["id"], time() + 3600, "/");
		setcookie("tipo_lagc", $array["tipo"], time() + 3600, "/");
        return true;
    }
    public function LogOut() {
		setcookie("usuario_lagc", $array["usuario"], time() - 3600, "/");
		setcookie("hash_lagc", $array["password"], time() - 3600, "/");
		setcookie("user_lagc", $array["id"], time() - 3600, "/");
		setcookie("tipo_lagc", $array["tipo"], time() - 3600, "/");
		setcookie("tmpmsj", "", time() - 1, "/");
        return true;
    }
    public function Check() {
		if ($this->Logon($_COOKIE["usuario_lagc"],$_COOKIE["hash_lagc"],$_COOKIE["user_lagc"],$_COOKIE["tipo_lagc"])) {
            return true;
        }
        return false;
    }
	public function ProcesoLoGIN($usuario, $email, $sexo, $nombre, $apellido, $id, $idioma, $cumple, $imagen){
		$rptuser = mysql_query("select * from usuarios where usuario like '%$usuario%'"); $fbuser = mysql_fetch_array($rptuser);
		$usertmp = LGlobal::Url_AmigableUser($usuario);
		$rptfb = mysql_query("select usuario,password,id,tipo,idredes from usuarios where idredes='".$id."'"); $fb = mysql_fetch_array($rptfb);
		if (!empty($fb['idredes'])){ $this->SetSession($fb); }
		else if (!empty($id) and empty($fb['idredes'])) {
			  $config = new LagcConfig(); //Conexion
			  $con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
			  mysql_select_db($config->lagcbd,$con);
			  $password = $this->GenerarPass();
			  if ($usertmp==$fbuser['usuario']) { $tmpapellido=substr(strtolower($apellido), 0, 1); } else { $tmpapellido=""; } //apellido temporal si es se repite el usuario
			  $sql = "INSERT INTO usuarios (usuario, password, email, tipo, activo, sexo, nombres, apellidos, idredes, idioma, cump_dia, cump_mes, cump_anio, imagen, fecha) VALUES ('".LGlobal::Url_AmigableUser($tmpapellido.$usuario)."', '".md5($password)."', '".$email."', '3', '1', '".$this->TipoSexo($sexo)."', '".$nombre."', '".$apellido."', '".$id."', '".$idioma."', '".$this->EdadFuct($cumple, 0)."', '".$this->EdadFuct($cumple, 1)."', '".$this->EdadFuct($cumple, 2)."', '".$imagen."', '".time()."')";
			  mysql_query($sql,$con);
			  LagcPeru::MensajeAviso($email,$usuario,LGlobal::Url_AmigableUser($tmpapellido.$usuario),$password);
		}
	}
	private function GenerarPass(){
		$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$longpalabra=6;
		for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
			$x = rand(0,$n);
			$pass.= $caracteres[$x];
		}
		return $pass;
	}
	private function TipoSexo($val){
		if($val=="male"){ $sexo = 1; }
		else { $sexo = 2; }
		return $sexo;
	}
	private function EdadFuct($val, $cual){
		switch($cual) {
			case 0:
				$edad = substr($val, 0, 2);
				break;
			case 1:
				$edad = substr($val, 3, 2);
				break;
			case 2:
				$edad = substr($val, 6, 4);
				break;
		}
		return $edad;
	}
}
class LagcPeru extends Componente {
	public function Modulos($modulo) {
		$config = new LagcConfig(); //Conexion
		$con = mysql_connect($config->lagclocal,$config->lagcuser,$config->lagcpass);
		mysql_select_db($config->lagcbd,$con);
		if (!empty($modulo)) {
			$respposici = mysql_query("select * from mod_posiciones where mod_nombre='".$modulo."' and activado='1'"); $posici = mysql_fetch_array($respposici);
			/*inicio codigo adicional*/
			if ($posici['mod_nombre']==$modulo) { echo "\n".$posici['mod_codeinicio']."\n"; }
			/*$contar_reg_modu = mysql_num_rows($respmodu);*/
			/*inicio codigo adicional*/
			$respmodu = mysql_query("select * from mod_modulos where mod_posicion_id='".$posici['mod_id']."' and mod_activo='1' order by mod_orden ASC");
			/*nuevo*/
			$respcomp = mysql_query("select * from componentes where url='".$_GET['lagc']."' and visible='1'");
			$comp = mysql_fetch_array($respcomp); /*leyendo los componentes creados*/
			/*nuevo*/
			while($modu = mysql_fetch_array($respmodu)) {
				$resptipo = mysql_query("select * from mod_tipo where tip_id='".$modu['mod_tipo_id']."' and tip_activo='1'");
				$tipo = mysql_fetch_array($resptipo);
				/*nuevo*/
				$permisos=split("/",$modu['mod_permisos']);
				if (!empty($comp['url'])) {
					/*inicio reglas plus*/
						$reglasplus=explode("|", $modu['mod_permisosplus']);
						$varplus = 0;
						for($p=0;$p<count($reglasplus);$p++) {
							if ($reglasplus[$p] == $comp['id_com']) {
								$varplus = 1;
								break;
							}
						}
						if ($varplus == 1) {
							/*cuando los permisos plus esta activo para 1 componente y se vera para todos sus enlaces internos : caso 4*/
							if ($posici['mod_nombre']==$modulo) {
								if ($modu['mod_vertitu']=="1") { echo "<h3>".$modu['mod_nombre']."</h3>"; }
								include "componentes/com_modulos/".$tipo['tip_archivo'];
							}
							else { echo "esta posicion no existe"; }
						}
						else {
							if (!empty($_GET['id']) and !empty($_GET['ver'])) {
								$var3 = 0;	/*cuando esta en un articulo de un componente : caso 3*/
								for($n=0;$n<count($permisos);$n++) {
									if ($permisos[$n] == $comp['id_com']."|".$_GET['id']) {
										$var3 = 1;
										break;
									}
								}
								if ($var3 == 1) {
									if ($posici['mod_nombre']==$modulo) {
										if ($modu['mod_vertitu']=="1") { echo "<h3>".$modu['mod_nombre']."</h3>"; }
										include "componentes/com_modulos/".$tipo['tip_archivo'];
									}
									else { echo "esta posicion no existe"; }
								}
							}
							else {
								$var2 = 0;	/*cuando es la raiz de un componente : caso 2*/
								for($n=0;$n<count($permisos);$n++) {
									if ($permisos[$n] == $comp['id_com']) {
										$var2 = 1;
										break;
									}
								}
								if ($var2 == 1) {
									if ($posici['mod_nombre']==$modulo) {
										if ($modu['mod_vertitu']=="1") { echo "<h3>".$modu['mod_nombre']."</h3>"; }
										include "componentes/com_modulos/".$tipo['tip_archivo'];
									}
									else { echo "esta posicion no existe"; }
								}
							}

					}
					/*fin reglas plus*/
				}
				else {
					$var1 = 0; /*Cuando esta en el inicio : caso 1*/
					$nenlaces = array("-1|1"=>"Inicio");
					ksort($nenlaces);
					foreach ($nenlaces as $key => $valor) {
					/**/
						for($n=0;$n<count($permisos);$n++) {
							if ($permisos[$n] == $key) {
								$var1 = 1;
								break;
							}
						}
						if ($var1 == 1) {
							if ($posici['mod_nombre']==$modulo) {
								if ($modu['mod_vertitu']=="1") { echo "<h3>".$modu['mod_nombre']."</h3>"; }
								include "componentes/com_modulos/".$tipo['tip_archivo'];
							}
							else { echo "esta posicion no existe"; }
						}
					}
				}
				/*nuevo*/
			}
			/*final codigo adicional*/
			if ($posici['mod_nombre']==$modulo) { echo "\n".$posici['mod_codefin']."\n"; }
			/*final codigo adicional*/
		}
		else { echo "seleccione la posicion"; }
	}
	function MensajeAviso($destina, $nombre, $user, $pass){
		$config = new LagcConfig(); //Conexion
		require "componentes/com_sistema/class.phpmailer.php";
		$mail = new PHPMailer();
		$mail->Host = "localhost";
		$mail->From = $config->lagcmail;
		$mail->FromName = $config->lagcnombre;
		$mail->Subject = "Su nuevo usuario en ".$config->lagcnombre;
		$mail->AddAddress($destina,$nombre);
		$mail->AddBCC("info@lagc-peru.com");

		$body  = "
		<h2>Su nuevo usuario en ".$config->lagcnombre."</h2>
		<img src=\"".$config->lagcurl."plantillas/".$config->lagctemplsite."/imagenes/logo.png\" style=\"float:right;\" />
		<p>Con este mensaje se confirma que usted ya a sido reguistrado con exito en <strong>".$config->lagcnombre."</strong>. Disfrute nuestros servicios. :)</p>
		<table border=\"0\" cellpadding=\"3\" cellspacing=\"5\">
		<tr>
			<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Nombre:</strong></td>
			<td>".$nombre."</td>
		</tr>
		<tr>
			<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>E-mail:</strong></td>
			<td>".$destina."</td>
		</tr>
		<tr>
			<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Usuario:</strong></td>
			<td>".$user."</td>
		</tr>
		<tr>
			<td bgcolor=\"#CCCCCC\" align=\"right\" nowrap=\"nowrap\"><strong>Contraseña:</strong></td>
			<td>".$pass."</td>
		</tr>
		</table>
		<br><br>
		&raquo; Este mensaje se genero desde ".$config->lagcurl."<br />
		&raquo; La contraseña se genero automaticamente. y solo es para usarla con el formulario nativo del sistema. ya que solo usamos los datos del facebook.com para conectar a este sitio.<br />
		&raquo; <strong>No responda este mensaje</strong>.<br />
		<br /><br /><br /><br />
		<center><hr><div style=\"color:#999; text-align:center; font-weight:bold; font-size:9px;\">Gestor de Contenidos <a href=\"http://www.lagc-peru.com/\" target=\"_blank\">Lagc Perú</a> - Soporte: luisgago@lagc-peru.com</div></center>
		";
		$mail->MsgHTML($body);
		$mail->Send();
	}
}
class MenusLG{
	function menus($posicion, $css) {
		if (!empty($css)) { echo "<div id=\"".$css."\">\n"; }
		//echo "<ul>\n";
		$respmenu = mysql_query("select * from m_menus where m_posi='".$posicion."' and m_activo='1' ORDER BY m_orden ASC");
		while($menu=mysql_fetch_array($respmenu)){
			$respsubmenu = mysql_query("select * from m_submenus where m_subidm='".$menu['m_id']."' and m_subposi='".$posicion."' and activado='1' ORDER BY m_suborden ASC");
			$subcant = mysql_num_rows($respsubmenu);
			if ($subcant==0) {
				echo "<li".MenusLG::_VerCss(1, $menu['m_cssa'], $menu['m_cssli'], $menu['m_tcssa'], $menu['m_tcssli']).">".MenusLG::_VerEnlace($menu['m_componente'], $menu['m_nombre'], $menu['m_cssa'], $menu['m_cssli'], $menu['m_tcssa'], $menu['m_tcssli'])."</li>\n";
			}
			else {
				echo "<li".MenusLG::_VerCss(1, $menu['m_cssa'], $menu['m_cssli'], $menu['m_tcssa'], $menu['m_tcssli']).">".MenusLG::_VerEnlace($menu['m_componente'], $menu['m_nombre'], $menu['m_cssa'], $menu['m_cssli'], $menu['m_tcssa'], $menu['m_tcssli'])."\n<ul class=\"sub-menu\">\n";
				while($submenus=mysql_fetch_array($respsubmenu)){
					echo "<li>".MenusLG::_VerEnlace($submenus['m_subcomponente'], $submenus['m_subnombre'], $submenus['m_subcss'],'','','')."</li>\n";
				}
				echo "</ul>\n</li>\n";
			}
		}
		//echo "</ul>\n";
		if (!empty($css)) { echo "</div>\n"; }
	}
	function _EnlaceOn($compo, $id, $ver, $activo=true) {
		if ($activo==true)
			if ($_GET['lagc']==$compo) {
				if (!empty($_GET['id']) and !empty($_GET['ver'])) {
					if ($_GET['id']==$id or $_GET['ver']==$ver) { $volver = " id=\"mactual\""; }
				}
				else if (empty($_GET['id']) and empty($_GET['ver'])) {
					if ($_GET['id']==$id or $_GET['ver']==$ver) { $volver = " id=\"mactual\""; }
				}
			} else { $volver = ""; }
			return $volver;
	}
	function _VerEnlace($componente, $nombre, $cssa, $cssli, $tcssa, $tcssli) {
		$compoarray = explode('|', $componente);
		$respcomp = mysql_query("select * from componentes where id_com='".$compoarray['0']."' and visible='1'");
		$compo = mysql_fetch_array($respcomp);
		if (empty($compoarray['1'])) {
			$final = "<a href=\"".LGlobal::Tipo_URL($compo['url'],'','')."/\"".MenusLG::_VerCss(2, $cssa, $cssli, $tcssa, $tcssli)."".MenusLG::_EnlaceOn($compo['url'],'','','').">".$nombre."</a>";
		}
		else {
			if ($compoarray['0']=="-1") {
				$nenlaces = array("-1|1"=>".", "-1|2"=>"administrador/", "-1|3"=>$_SERVER["REQUEST_URI"]."#");
				ksort($nenlaces);
				foreach ($nenlaces as $key => $valor) {
					if ($componente==$key) {
						$final = "<a href=\"".$valor."\"".MenusLG::_VerCss(2, $cssa, $cssli, $tcssa, $tcssli)."".MenusLG::_EnlaceOn('','','').">".$nombre."</a>";
					}
				}
			}
			else {
				$rptcompt = mysql_query("select * from ".$compo['campobd']." where ".$compo['campoid']."='".$compoarray['1']."'");
				$rpt = mysql_fetch_array($rptcompt);
				$final = "<a href=\"".LGlobal::Tipo_URL($compo['url'], $rpt[$compo['campoid']], $rpt[$compo['campotitulo']])."\"".MenusLG::_VerCss(2, $cssa, $cssli, $tcssa, $tcssli)."".MenusLG::_EnlaceOn($compo['url'], $rpt[$compo['campoid']], $rpt[$compo['campotitulo']]).">".$nombre."</a>";
			}
		}
		return $final;
	}
	function _VerCss($cdcss, $cssa, $cssli, $tcssa, $tcssli){
		if ($cdcss==1) { //los de tipo lista (li)
			if (!empty($cssli)) {
				$tpclassli = array(1=>"id", 2=>"class");
				ksort($tpclassli);
				foreach ($tpclassli as $key => $val) {
					if ($tcssli==$key) { $final = " ".$val."=\"".$cssli."\""; }
				}
			}
		}
		else if ($cdcss==2) { //aqui los q son enlaces (a)
			if (!empty($cssa)) {
				$tpclassa = array("1"=>"id", "2"=>"class");
				ksort($tpclassa);
				foreach ($tpclassa as $key => $val) {
					if ($tcssa==$key) { $final = " ".$val."=\"".$cssa."\""; }
				}
			}
		}
		return $final;
	}
}
?>