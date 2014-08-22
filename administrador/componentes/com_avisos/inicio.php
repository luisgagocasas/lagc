<?php include "componentes/com_avisos/class.contenidos.php"; ?>
<?php if (!isset($_GET['aviso'])) { Avisos::Inicio(); } ?>
<?php if($_GET['aviso']) { Avisos::Ver($_GET['aviso']); } ?>