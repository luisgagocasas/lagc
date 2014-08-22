<?php include "componentes/com_contenidos/class.contenido.php"; ?>
<?php if (!isset($_GET['contenido'])) { Contenido::inicioc(); } ?>
<?php if(isset($_GET['contenido']) && $_GET['crear']) { Contenido::crear(); } ?>
<?php if(isset($_GET['contenido']) && $_GET['editar']) { Contenido::editar($_GET['contenido'], $_GET['editar']); } ?>
<?php if(isset($_GET['contenido']) && $_GET['aplicar']) { Contenido::editar($_GET['contenido'], $_GET['aplicar']); } ?>
<?php if(isset($_GET['contenido']) && $_GET['borrar']) { Contenido::borrar($_GET['contenido'], $_GET['borrar']); } ?>