<?php include "componentes/com_blog/class.contenidos.php"; ?>
<link href="componentes/com_blog/estilos.css" rel="stylesheet" type="text/css" />
<?php if (!isset($_GET['id'])) { Blog::AjaxInicio(); } ?>
<?php if($_GET['id'] && $_GET['ver']) { Blog::Ver($_GET['id'], $_GET['ver']); } ?>
<?php if($_GET['id']=="categorias") { Blog::Categorias(5); } ?>
<?php if($_GET['id'] && $_GET['categoria']) { Blog::VerCategoria($_GET['id'], $_GET['categoria'], "10"); } ?>
<?php if($_GET['id'] && $_GET['tags']) { Blog::VerTags($_GET['tags'], "10"); } ?>
<?php if($_GET['id']=="redactar") { if (!empty($_COOKIE["user_lagc"])) { Blog::Redactar(); } else { ?><script type="text/javascript"> setTimeout("window.top.location='index.php'", 0) </script><?php }} ?>
<?php if($_GET['id'] && $_GET['editar_articulo']) { if (!empty($_COOKIE["user_lagc"])) { Blog::Editar($_GET['id'], $_GET['editar_articulo']); } else { ?><script type="text/javascript"> setTimeout("window.top.location='index.php'", 0) </script><?php }} ?>