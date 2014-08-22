<link href="componentes/com_catalogodeltron/estilos.css" rel="stylesheet" type="text/css" media="all" />
<?php
@include "administrador/utilidades/PHPPaging.lib.php";
@include "componentes/com_catalogodeltron/class.sistema.php";
?>
<?php if (!isset($_GET['id'])) { SistemaCatalogo::Inicio(); } ?>
<?php if($_GET['id'] && $_GET['ver']) { SistemaCatalogo::Ver($_GET['id'], $_GET['ver']); } ?>
<?php if($_GET['id'] && $_GET['grupos']) { SistemaCatalogo::Grupos($_GET['id'], $_GET['grupos']); } ?>
<?php if($_GET['id'] == "grupos") { SistemaCatalogo::TodosGrupos(); } ?>
<?php if($_GET['id'] && $_GET['marcas']) { SistemaCatalogo::Marcas($_GET['id'], $_GET['marcas']); } ?>
<?php if($_GET['id'] == "marcas") { SistemaCatalogo::TodosMarcas(); } ?>
<?php if($_GET['id'] && $_GET['lineas']) { SistemaCatalogo::Lineas($_GET['id'], $_GET['lineas']); } ?>
<?php if($_GET['id'] == "lineas") { SistemaCatalogo::TodosLineas(); } ?>
<?php if($_GET['id'] == "buscar") { SistemaCatalogo::Buscador(); } ?>