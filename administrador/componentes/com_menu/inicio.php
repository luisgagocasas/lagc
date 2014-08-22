<?php
include "componentes/com_menu/class.contenido.posicion.php";
if (!isset($_GET['menus'])) { Posicion::Inicio(); }
if(isset($_GET['menus']) && $_GET['crear']) { Posicion::Crear_M(); }
if(isset($_GET['menus']) && $_GET['editar']) { Posicion::Editar_M($_GET['menus'], $_GET['editar']); }
if(isset($_GET['menus']) && $_GET['borrar']) { Posicion::Borrar_M($_GET['menus'], $_GET['borrar']); }
include "componentes/com_menu/class.contenido.menu.php";
if(isset($_GET['menus']) && $_GET['enlaces']) { Menu::InicioLista($_GET['menus'], $_GET['enlaces']); }
if(isset($_GET['menus']) && $_GET['enlaces_nuevo']) { Menu::crear($_GET['menus'], $_GET['enlaces_nuevo']); }
if(isset($_GET['menus']) && $_GET['enlaces_editar']) { Menu::editar($_GET['menus'], $_GET['enlaces_editar']); }
if(isset($_GET['menus']) && $_GET['enlaces_editarsub']) { Menu::editarsub($_GET['menus'], $_GET['enlaces_editarsub']); }
if(isset($_GET['menus']) && $_GET['enlaces_aplicar']) { Menu::editar($_GET['menus'], $_GET['enlaces_aplicar']); }
if(isset($_GET['menus']) && $_GET['enlaces_aplicarsub']) { Menu::editarsub($_GET['menus'], $_GET['enlaces_aplicarsub']); }
if(isset($_GET['menus']) && $_GET['enlaces_borrar']) { Menu::borrar($_GET['menus'], $_GET['enlaces_borrar']); }
if(isset($_GET['menus']) && $_GET['enlaces_borrarsub']) { Menu::borrarsub($_GET['menus'], $_GET['enlaces_borrarsub']); }
?>