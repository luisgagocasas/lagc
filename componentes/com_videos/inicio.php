<?php include "componentes/com_videos/class.video.php"; include "componentes/com_videos/youtube.class.php"; ?>
<link href="componentes/com_videos/estilos.css" rel="stylesheet" type="text/css" />
<?php if (!isset($_GET['id'])) { Videos::AjaxInicio(); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Videos::Ver($_GET['id'], $_GET['ver']); } ?>
<?php if($_GET['id'] && $_GET['categoria']) { Videos::VerCategoria($_GET['id'], $_GET['categoria']); } ?>