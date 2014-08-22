<?php include "componentes/com_usuarios/class.function.php"; ?>
<?php if (!isset($_GET['usuarios'])){ usuarios::iniciou(); } ?>
<?php if(isset($_GET['usuarios']) && $_GET['editar']) { usuarios::editar($_GET['usuarios'], $_GET['editar']); } ?>
<?php if(isset($_GET['usuarios']) && $_GET['borrar']) { usuarios::borrar($_GET['usuarios'], $_GET['borrar']); } ?>
<?php if(isset($_GET['usuarios']) && $_GET['contrasenia']) { usuarios::contrasenia($_GET['usuarios'], $_GET['contrasenia']); } ?>
<?php if(isset($_GET['usuarios']) && $_GET['crear']) { usuarios::crear(); } ?>