<?php require ("configuracion.lagc.php"); require "componentes/com_sistema/class.componentes.php"; require "componentes/com_sistema/function.globales.php";
$login = new Login();
if ($_GET["logout"]) { $login->LogOut(); header("location: index.php"); die; }
if ($_POST) {
	if (!$login->Logon($_POST["usuario_lagc"],$_POST["password_lagc"])) {
	$mensaje = "<div class=\"mensaje-alerta\">El usuario y password son incorrectos</div>"; }
	else { header("location: index.php"); } }
if ($login->Check()) {
	$configurapla = "plantillas/".$config->lagctempladmin."/config.xml";
	if (file_exists($configurapla)) {
		$plantillas = simplexml_load_file($configurapla);
		if($plantillas){
			foreach ($plantillas as $plantilla) {
				header('Content-Type: text/html; charset=iso-8859-1');
				$archivo = "plantillas/".$config->lagctempladmin."/".$plantilla->archivo.".tpl";
				if (file_exists($archivo)) { include $archivo; }
				else { echo "Error abriendo \"plantillas/".$config->lagctempladmin."/".$plantilla->archivo.".tpl\n\""; }
			}
		} else { echo "Sintaxi XML inválida Revise el archivo \"plantillas/".$config->lagctempladmin."/config.xml\n"; }
	} else { echo "Error abriendo \"plantillas/".$config->lagctempladmin."/config.xml\n"; }
} else { include("plantillas/".$config->lagctempladmin."/entrar.tpl"); }
?>