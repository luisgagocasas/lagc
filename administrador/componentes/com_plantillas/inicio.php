<link href="componentes/com_plantillas/estilos.css" rel="stylesheet" type="text/css" />
<?php include "componentes/com_plantillas/class.funciones.php"; ?>
<?php
if (!isset($_GET['plantillas'])) { Plantillas::Inicio(); }
if(isset($_GET['plantillas']) && $_GET['editar_plantilla']) { Plantillas::Editar_Plantilla($_GET['plantillas'], $_GET['editar_plantilla']); }
?>