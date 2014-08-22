<?php include "componentes/com_avisos/class.contenido.php"; ?>
<br />
<a href="?lagc=com_avisos">+ Avisos</a> <?php echo Avisos::LineaTiempo(); ?>
<br /><br />
<?php if (!isset($_GET['id'])) { Avisos::Inicio(10); } ?>
<?php if ($_GET['id'] && $_GET['ver']) { Avisos::Ver($_GET['id'], $_GET['ver']); } ?>
<?php if ($_GET['id'] && $_GET['cat']) { Avisos::CatVer($_GET['id'], $_GET['cat']); } ?>
<?php if ($_GET['id'] && $_GET['categorias']) { Avisos::CategoriVer(10); } ?>