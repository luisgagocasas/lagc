<?php include "componentes/com_clientes/class.contenido.php"; ?>
<?php if (!isset($_GET['cliente'])) { Clientes::inicioc(); } ?>
<?php if(isset($_GET['cliente']) && $_GET['crear']) { Clientes::crear(); } ?>
<?php if(isset($_GET['cliente']) && $_GET['editar']) { Clientes::editar($_GET['cliente'], $_GET['editar']); } ?>
<?php if(isset($_GET['cliente']) && $_GET['borrar']) { Clientes::borrar($_GET['cliente'], $_GET['borrar']); } ?>