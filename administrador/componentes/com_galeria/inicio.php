<?php include "componentes/com_galeria/class.contenido.php"; ?>
<!--Contenido-->
<?php if (!isset($_GET['galerias'])) { Fotos::inicioc(); } ?>
<?php if(isset($_GET['galerias']) && $_GET['crear']) { Fotos::crear(); } ?>
<?php if(isset($_GET['galerias']) && $_GET['editar']) { Fotos::editar($_GET['galerias'], $_GET['editar']); } ?>
<?php if(isset($_GET['galerias']) && $_GET['aplicar']) { Fotos::editar($_GET['galerias'], $_GET['aplicar']); } ?>
<?php if(isset($_GET['galerias']) && $_GET['borrar']) { Fotos::borrar($_GET['galerias'], $_GET['borrar']); } ?>
<!--Categoria-->
<?php if($_GET['galerias'] && $_GET['lista']) { Galerias::inicioct(); } ?>
<?php if($_GET['galerias'] && $_GET['crear_gal']) { Galerias::crear(); } ?>
<?php if($_GET['galerias'] && $_GET['editar_gal']) { Galerias::editar($_GET['galerias'], $_GET['editar_gal']); } ?>
<?php if($_GET['galerias'] && $_GET['borrar_gal']) { Galerias::borrar($_GET['galerias'], $_GET['borrar_gal']); } ?>