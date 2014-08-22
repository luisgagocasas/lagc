<?php include "componentes/com_modulos/class.modulos.php"; $modulos = new Modulos(); ?>
<?php include "componentes/com_modulos/class.posiciones.php"; $posiciones = new Posiciones(); ?>
<?php include "componentes/com_modulos/class.tipos.php"; $tipos = new Tipos(); ?>
<?php if(!isset($_GET['modulos'])) { $modulos->Inicio(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['modulo_primerpaso']) { $modulos->Paso1(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['modulo_nuevo']) { $modulos->Crear(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['modulo_editar']) { $modulos->Editar($_GET['modulos'], $_GET['modulo_editar']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['modulo_permisos']) { $modulos->Permisos($_GET['modulos'], $_GET['modulo_permisos']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['modulo_borrar']) { $modulos->Borrar($_GET['modulos'], $_GET['modulo_borrar']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['posiciones']) { $posiciones->Inicio(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['posiciones_crear']) { $posiciones->Crear(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['posiciones_editar']) { $posiciones->Editar($_GET['modulos'], $_GET['posiciones_editar']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['posiciones_borrar']) { $posiciones->Borrar($_GET['modulos'], $_GET['posiciones_borrar']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['tipos']) { $tipos->Inicio(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['tipos_crear']) { $tipos->Crear(); } ?>
<?php if(isset($_GET['modulos']) && $_GET['tipos_editar']) { $tipos->Editar($_GET['modulos'], $_GET['tipos_editar']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['tipos_editar_site']) { $tipos->Editar_Site($_GET['modulos'], $_GET['tipos_editar_site']); } ?>
<?php if(isset($_GET['modulos']) && $_GET['tipos_borrar']) { $tipos->Borrar($_GET['modulos'], $_GET['tipos_borrar']); } ?>