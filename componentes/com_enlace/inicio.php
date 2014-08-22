<?php include "componentes/com_enlace/class.enlace.php"; ?>
<link href="componentes/com_enlace/estilos.css" rel="stylesheet" type="text/css" />
<?php
if (!isset($_GET['id'])) { Enlace::Inicio(); }
if($_GET['id'] && $_GET['ver']) { Enlace::Ver($_GET['id'], $_GET['ver']); } ?>