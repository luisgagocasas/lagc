<link href="componentes/com_wilss/estilos.css" rel="stylesheet" type="text/css" />
<?php
include "componentes/com_wilss/class.wilss.php";
include "componentes/com_wilss/class.correas.php"; $correas = new Correas();
include "componentes/com_wilss/class.billeteras.php"; $billeteras = new Billeteras();
include "componentes/com_wilss/class.carteras.php"; $carteras = new Carteras();
include "componentes/com_wilss/class.sobres.php"; $sobres = new Sobres();
if (!isset($_GET['wilss'])) { Wilss::InicioW(); }
if(isset($_GET['wilss']) && $_GET['correas']) { $correas->InicioC(); }
if(isset($_GET['wilss']) && $_GET['agregar_correas']) { $correas->Nuevo($_GET['wilss'],$_GET['agregar_correas']); }
if(isset($_GET['wilss']) && $_GET['editar_correas']) { $correas->Editar($_GET['wilss'],$_GET['editar_correas']); }
if(isset($_GET['wilss']) && $_GET['borrar_correas']) { $correas->Borrar($_GET['wilss'],$_GET['borrar_correas']); }
if(isset($_GET['wilss']) && $_GET['billeteras']) { $billeteras->InicioB(); }
if(isset($_GET['wilss']) && $_GET['agregar_billeteras']) { $billeteras->Nuevo($_GET['wilss'],$_GET['agregar_billeteras']); }
if(isset($_GET['wilss']) && $_GET['editar_billeteras']) { $billeteras->Editar($_GET['wilss'],$_GET['editar_billeteras']); }
if(isset($_GET['wilss']) && $_GET['borrar_billeteras']) { $billeteras->Borrar($_GET['wilss'],$_GET['borrar_billeteras']); }
if(isset($_GET['wilss']) && $_GET['carteras']) { $carteras->InicioCa(); }
if(isset($_GET['wilss']) && $_GET['agregar_carteras']) { $carteras->Nuevo($_GET['wilss'],$_GET['agregar_carteras']); }
if(isset($_GET['wilss']) && $_GET['editar_carteras']) { $carteras->Editar($_GET['wilss'],$_GET['editar_carteras']); }
if(isset($_GET['wilss']) && $_GET['borrar_carteras']) { $carteras->Borrar($_GET['wilss'],$_GET['borrar_carteras']); }
if(isset($_GET['wilss']) && $_GET['sobres']) { $sobres->InicioS(); }
if(isset($_GET['wilss']) && $_GET['agregar_sobres']) { $sobres->Nuevo($_GET['wilss'],$_GET['agregar_sobres']); }
if(isset($_GET['wilss']) && $_GET['editar_sobres']) { $sobres->Editar($_GET['wilss'],$_GET['editar_sobres']); }
if(isset($_GET['wilss']) && $_GET['borrar_sobres']) { $sobres->Borrar($_GET['wilss'],$_GET['borrar_sobres']); }
?>