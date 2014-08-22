<?php
include "componentes/com_catalogodeltron/class.marca.php";
include "componentes/com_catalogodeltron/class.linea.php";
include "componentes/com_catalogodeltron/class.locales.php";
include "componentes/com_catalogodeltron/class.sistema.php";
include "componentes/com_catalogodeltron/class.imagenes.php";
?>
<link href="componentes/com_catalogodeltron/estilos.css" rel="stylesheet" type="text/css">
<?php
if (!isset($_GET['catalogocompu'])) { Sistema::Inicio(); }
if(isset($_GET['catalogocompu']) && $_GET['tipos_producto']) { Sistema::Grupos($_GET['catalogocompu'], $_GET['tipos_producto']); }
if(isset($_GET['catalogocompu']) && $_GET['crear_producto']) { Sistema::Nuevo($_GET['catalogocompu'], $_GET['crear_producto']); }
//
if(isset($_GET['catalogocompu']) && $_GET['editar_producto']) { Sistema::EditarP($_GET['catalogocompu'], $_GET['editar_producto']); }
if(isset($_GET['catalogocompu']) && $_GET['borrar_producto']) { Sistema::BorrarP($_GET['catalogocompu'], $_GET['borrar_producto']); }
//
if(isset($_GET['catalogocompu']) && $_GET['crear_img_producto']) { Imagenes::NuevaImg($_GET['catalogocompu'], $_GET['crear_img_producto']); }
if(isset($_GET['catalogocompu']) && $_GET['editar_img_producto']) { Imagenes::EditarImg($_GET['catalogocompu'], $_GET['editar_img_producto']); }
if(isset($_GET['catalogocompu']) && $_GET['borrar_img_producto']) { Imagenes::BorrarImg($_GET['catalogocompu'], $_GET['borrar_img_producto']); }
/*Inicio Marcas*/
if(isset($_GET['catalogocompu']) && $_GET['inicio_marcas']) { Marca::Inicio(); }
if(isset($_GET['catalogocompu']) && $_GET['crear_marcas']) { Marca::Nuevo(); }
if(isset($_GET['catalogocompu']) && $_GET['editar_marcas']) { Marca::Editar($_GET['catalogocompu'], $_GET['editar_marcas']); }
if(isset($_GET['catalogocompu']) && $_GET['borrar_marcas']) { Marca::Borrar($_GET['catalogocompu'], $_GET['borrar_marcas']); }
/*Fin Marcas*/
/*Inicio Linea*/
if(isset($_GET['catalogocompu']) && $_GET['inicio_linea']) { Linea::Inicio(); }
if(isset($_GET['catalogocompu']) && $_GET['editar_linea']) { Linea::Editar($_GET['catalogocompu'], $_GET['editar_linea']); }
if(isset($_GET['catalogocompu']) && $_GET['borrar_linea']) { Linea::Borrar($_GET['catalogocompu'], $_GET['borrar_linea']); }
if(isset($_GET['catalogocompu']) && $_GET['crear_linea']) { Linea::Nuevo(); }
/*Fin Linea*/
/*Inicio Local*/
if(isset($_GET['catalogocompu']) && $_GET['inicio_locales']) { Locales::Inicio(); }
if(isset($_GET['catalogocompu']) && $_GET['editar_locales']) { Locales::Editar($_GET['catalogocompu'], $_GET['editar_locales']); }
if(isset($_GET['catalogocompu']) && $_GET['borrar_locales']) { Locales::Borrar($_GET['catalogocompu'], $_GET['borrar_locales']); }
if(isset($_GET['catalogocompu']) && $_GET['crear_locales']) { Locales::Nuevo(); }
/*Fin Local*/
?>