<? if (empty($_GET['lagc'])) { exit(); } ?>
<?php include "componentes/com_productos/class.contenidos.php"; ?>
<link href="componentes/com_productos/estilos.css" rel="stylesheet" type="text/css" />
<?php if (!isset($_GET['id'])) { Productos::Inicio(10); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Productos::Ver($_GET['id'], $_GET['ver']); } ?>