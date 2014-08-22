<?php include "componentes/com_programacion/class.contenido.php"; ?>
<?php if (!isset($_GET['formulario'])) { Formulario::iniciof(); } ?>
<?php if(isset($_GET['formulario']) && $_GET['crear']) { Formulario::crear(); } ?>
<?php if(isset($_GET['formulario']) && $_GET['editar']) { Formulario::editar($_GET['formulario'], $_GET['editar']); } ?>
<?php if(isset($_GET['formulario']) && $_GET['editar_code']) { Formulario::editar_code($_GET['formulario'], $_GET['editar_code']); } ?>
<?php if(isset($_GET['formulario']) && $_GET['borrar']) { Formulario::borrar($_GET['formulario'], $_GET['borrar']); } ?>
<?php if(isset($_GET['formulario']) && $_GET['configurar']) { Formulario::Configurar(); } ?>