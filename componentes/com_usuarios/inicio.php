<link href="componentes/com_usuarios/estilos.css" rel="stylesheet" type="text/css" />
<?php
include "componentes/com_usuarios/class.lagc.php";
if (!isset($_GET['id'])){ Usuarios::Inicio(21, $_GET['sexo'], $_GET['letra']); }
if ($_GET['id']=="validar_usuario") { Usuarios::Validar_Usuario($_POST['id'], $_POST["password"]); }
if ($_GET['id']=="desconectar") { Usuarios::Desconectar(); }
if ($_GET['id']=="registro") { Usuarios::Registro(); }
if ($_GET['id']=="perdiocontra") { Usuarios::PerdioContra(); }
if ($_GET['id'] && $_GET['restablecerpass'] && $_GET['extra'] && $_GET['mail']) { Usuarios::ConfirCambioPass($_GET['id'], $_GET['extra']); }
if ($_GET['id']=="entrar") { Usuarios::EntrarLogin(); }
if ($_GET['id'] && $_GET['ver']) { Usuarios::User($_GET['id'], $_GET['ver']); }
function VerContPerfil() {
	if ($_GET['id'] && $_GET['ver'] && $_GET['editperfil']) { echo "aqui para editar el perfil"; }
	if ($_GET['id'] && $_GET['ver'] && $_GET['camimg']) { Usuarios::CambiarImg($_GET['id'], $_GET['ver']); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['addamg']) { Usuarios::AgregarAmigos($_GET['id']); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['componente']=="blog") { Usuarios::MostrarmisBlog(); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['componente']=="videos") { echo "Proximamente"; }
	if ($_GET['id'] && $_GET['ver'] && $_GET['slam']) { Usuarios::slam($_GET['id'], $_GET['slam']); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['slamaprobar']) { Usuarios::slamAprobar($_COOKIE["user_lagc"]); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['amgaprobar']) { Usuarios::AmgAprobar($_COOKIE["user_lagc"]); }
	if ($_GET['id'] && $_GET['ver'] && $_GET['componente']=="amigos") { Usuarios::Amigos($_GET['id']); }
}
?>