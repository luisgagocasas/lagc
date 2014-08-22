<?php include "componentes/com_componentes/class.contenido.php"; ?>
<?php if (!isset($_GET['componentes'])) { Componentes::Inicio(); } ?>
<?php if(isset($_GET['componentes']) && $_GET['crear']) { Componentes::Crear(); } ?>
<?php if(isset($_GET['componentes']) && $_GET['editar']) { Componentes::Editar($_GET['componentes'], $_GET['editar']); } ?>
<?php if(isset($_GET['componentes']) && $_GET['borrar']) { Componentes::Borrar($_GET['componentes'], $_GET['borrar']); } ?>