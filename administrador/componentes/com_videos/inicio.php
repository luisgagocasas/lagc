<link href="componentes/com_wilss/estilos.css" rel="stylesheet" type="text/css" />
<?php
include "componentes/com_videos/class.contenidos.php";
include "componentes/com_videos/youtube.class.php";
if (!isset($_GET['videos'])) { Videos::Inicib(); }
if(isset($_GET['videos']) && $_GET['crear_procesa_video']) { Videos::NuevoPaso1(); }
if(isset($_GET['videos']) && $_GET['crear_video']) { Videos::Nuevo(); }
if(isset($_GET['videos']) && $_GET['editar_video']) { Videos::Editar($_GET['videos'], $_GET['editar_video']); }
if(isset($_GET['videos']) && $_GET['borrar_video']) { Videos::Borrar($_GET['videos'], $_GET['borrar_video']); }
if(isset($_GET['videos']) && $_GET['categorias']) { Categorias::IniciC(); }
if(isset($_GET['videos']) && $_GET['crear_categorias']) { Categorias::Nuevo(); }
if(isset($_GET['videos']) && $_GET['editar_categorias']) { Categorias::Editar($_GET['videos'], $_GET['editar_categorias']); }
if(isset($_GET['videos']) && $_GET['borrar_categorias']) { Categorias::Borrar($_GET['videos'], $_GET['borrar_categorias']); }
if(isset($_GET['videos']) && $_GET['comentarios']) { Comentarios::Inicio(); }
if(isset($_GET['videos']) && $_GET['comentarios_aprobar']) { Comentarios::Aprobarc($_GET['videos'], $_GET['comentarios_aprobar']); }
if(isset($_GET['videos']) && $_GET['comentarios_borrar']) { Comentarios::Borrar($_GET['videos'], $_GET['comentarios_borrar']); }
?>