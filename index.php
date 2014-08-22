<?php require ("componentes/com_configuracion/class.lg.php"); require ("administrador/configuracion.lagc.php"); require "componentes/com_sistema/class.componentes.php"; require "administrador/componentes/com_sistema/function.globales.php"; session_start(); date_default_timezone_set('America/Lima');
$login = new Login(); /*inicio del login fb*/
require 'componentes/com_sistema/facebook.php';
$facebook = new Facebook(array('appId'  => $config->lagcfbid,'secret' => $config->lagcfbsecret));
$user = $facebook->getUser();
if ($user) {
	try { $user_profile = $facebook->api('/me'); } catch (FacebookApiException $e) { $user = null; }
	$login->ProcesoLoGIN($user_profile['name'],$user_profile['email'],$user_profile['gender'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['id'],$user_profile['locale'], $user_profile['birthday'], "https://graph.facebook.com/".$user_profile['username']."/picture?type=large");
}
else { $login->LogOut(); } /*fin login fb*/
$accesotmp = Componente::__ConexionTemporal($config->lagcactivo);
if ($_GET["logout"]) { $login->LogOut(); setcookie("tmpmsj", "Usted se desconecto correctamente", time() + 1, "/"); header("location: /"); die; }
if ($_POST["lgusuario"]) {
	if (!$login->Logon($_POST["lgusuario"],$_POST["password"])) {
		setcookie("tmpmsj", "El usuario ó password son incorrectos", time() + 1, "/");
		header("location: /");
	} else { header("location: ".$_POST['url'].""); } }
if ($login->Check()) { /*si esta logeado*/
	if ($config->lagcactivo!=$accesotmp) { /*sitio activo o desactivado*/
		$configurapla = "plantillas/".$config->lagctemplsite."/config.xml";
		if (file_exists($configurapla)) {
			$plantillas = simplexml_load_file($configurapla);
			if($plantillas){
				foreach ($plantillas as $plantilla) {
					$archivo = "plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl";
					if (file_exists($archivo)) {
						header('Content-Type: text/html; charset=iso-8859-1');
						$LagcPeru = new LagcPeru();
						include $archivo;
					}
					else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl\n"; }
				}
			} else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
		} else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
	} else { Componente::SiteDesactivo(); }
}
else { /*si no esta logeado*/
	if ($config->lagcactivo!=$accesotmp) { /*sitio activo o desactivado*/
		$configurapla = "plantillas/".$config->lagctemplsite."/config.xml";
		if (file_exists($configurapla)) {
			$plantillas = simplexml_load_file($configurapla);
			if($plantillas){
				foreach ($plantillas as $plantilla) {
					$archivo = "plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl";
					if (file_exists($archivo)) {
						header('Content-Type: text/html; charset=iso-8859-1');
						$LagcPeru = new LagcPeru();
						include $archivo;
					}
					else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/".$plantilla->archivo.".tpl\n"; }
				}
			} else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
		} else { echo "Error abriendo \"plantillas/".$config->lagctemplsite."/config.xml\n"; }
	} else { Componente::SiteDesactivo(); }
}
?>