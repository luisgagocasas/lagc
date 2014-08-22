<link href="componentes/com_clientes/estilos.css" rel="stylesheet" type="text/css" />
<?php include "componentes/com_clientes/class.lagc.php"; ?>
<?php if (!isset($_GET['id'])) { Clientes::Inicios(12); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Clientes::Ver($_GET['id'], $_GET['ver']); } ?>