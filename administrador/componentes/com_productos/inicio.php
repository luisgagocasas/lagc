<?php include "componentes/com_productos/class.contenido.php"; ?>
<?php if (!isset($_GET['productos'])) { Productos::inicion(); } ?>
<?php if(isset($_GET['productos']) && $_GET['crear']) { Productos::crear(); } ?>
<?php if(isset($_GET['productos']) && $_GET['editar']) { Productos::editar($_GET['productos'], $_GET['editar']); } ?>
<?php if(isset($_GET['productos']) && $_GET['borrar']) { Productos::borrar($_GET['productos'], $_GET['borrar']); } ?>